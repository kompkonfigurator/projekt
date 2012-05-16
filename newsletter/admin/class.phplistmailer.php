<?php
require_once dirname(__FILE__).'/accesscheck.php';

## update to phpmailer v2 is not finished yet
# require( dirname(__FILE__) . '/phpmailer2/class.phpmailer.php');

require( dirname(__FILE__) . '/phpmailer/class.phpmailer.php');

class PHPlistMailer extends PHPMailer {
    var $isText = false;
    var $WordWrap = 75;
    var $encoding = 'base64';
    var $image_types = array(
                  'gif'  => 'image/gif',
                  'jpg'  => 'image/jpeg',
                  'jpeg'  => 'image/jpeg',
                  'jpe'  => 'image/jpeg',
                  'bmp'  => 'image/bmp',
                  'png'  => 'image/png',
                  'tif'  => 'image/tiff',
                  'tiff'  => 'image/tiff',
                  'swf'  => 'application/x-shockwave-flash'
                  );

    function PHPlistMailer($messageid,$email) {
    #  parent::PHPMailer();
      parent::SetLanguage('en', dirname(__FILE__) . '/phpmailer/language/');
      $this->addCustomHeader("X-Mailer: phplist v".VERSION);
      $this->addCustomHeader("X-MessageID: $messageid");
      $this->addCustomHeader("X-ListMember: $email");
#      $this->addCustomHeader("Precedence: bulk"); #http://mantis.phplist.com/view.php?id=15562
      $this->CharSet = getConfig("html_charset");

      if (defined('PHPMAILERHOST') && PHPMAILERHOST != '') {
        //logEvent('Sending email via '.PHPMAILERHOST);
        $this->Helo = getConfig("website");
        $this->Host = PHPMAILERHOST;
        if ( isset($GLOBALS['phpmailer_smtpuser']) && $GLOBALS['phpmailer_smtpuser'] != ''
             && isset($GLOBALS['phpmailer_smtppassword']) && $GLOBALS['phpmailer_smtppassword']) {
          $this->SMTPAuth = true;
          $this->Username = $GLOBALS['phpmailer_smtpuser'];
          $this->Password = $GLOBALS['phpmailer_smtppassword'];
        }
        $this->Mailer = "smtp";
      } else{
         #  logEvent('Sending via mail');
         $this->Mailer = "mail";
      }

      //$ip = gethostbyname($this->Host);

      if ($GLOBALS["message_envelope"]) {
        $this->Sender = $GLOBALS["message_envelope"];
        $this->addCustomHeader("Errors-To: ".$GLOBALS["message_envelope"]);
      }
    }

    function add_html($html,$text = '',$templateid = 0) {
      $this->Body = $html;
      $this->IsHTML(true);
      if ($text) {
        $this->add_text($text);
      }
      $this->find_html_images($templateid);
    }

    function add_timestamp()
    {
      #0013076: Yellow Moon Baker Ross - New phpList Development
      # Add a line like Received: from [10.1.2.3] by website.example.com with HTTP; 01 Jan 2003 12:34:56 -0000
      # more info: http://www.spamcop.net/fom-serve/cache/369.html
      $ip_address = $_SERVER['REMOTE_ADDR'];
      if ( $_SERVER['REMOTE_HOST'] ) {
        $ip_domain = $_SERVER['REMOTE_HOST'];        
      } else {
        $ip_domain = gethostbyaddr($ip_address);
      }
      $hostname = $_SERVER["HTTP_HOST"];
      $request_time = date('r',$_SERVER['REQUEST_TIME']);
      $sTimeStamp = "from $ip_domain [$ip_address] by $hostname with HTTP; $request_time";
    	$this->addTimeStamp($sTimeStamp);      
    }
    
   function add_text($text) {
      if (!$this->Body) {
        $this->IsHTML(false);
        $this->Body = html_entity_decode($text ,ENT_QUOTES, getConfig("text_charset") ); #$text;
#        $this->Body = $text;
       } else {
        $this->AltBody = html_entity_decode($text ,ENT_QUOTES, getConfig("text_charset") );#$text;
      }
    }

    function append_text($text) {
      if ($this->AltBody) {
        $this->AltBody .= html_entity_decode($text ,ENT_QUOTES, getConfig("text_charset") );#$text;
      } else {
        $this->Body .= html_entity_decode($text."\n" ,ENT_QUOTES, getConfig("text_charset") );#$text;
      }
    }

    function build_message() {
    }

    function send($to_name = "", $to_addr, $from_name, $from_addr, $subject = '', $headers = '',$envelope = '') {
      $this->From = $from_addr;
      $this->FromName = $from_name;
      if (strstr(VERSION, "dev")) {
        # make sure we are not sending out emails to real users
        # when developing
        $this->AddAddress($GLOBALS["developer_email"]);
      } else {
        $this->AddAddress($to_addr);
      }
      $this->Subject = $subject;
      if(!parent::Send()) {
        #echo "Message was not sent <p>";
        logEvent("Mailer Error: " . $this->ErrorInfo);
        return 0;
      }#
      return 1;
    }

    function add_attachment($contents,$filename,$mimetype) {
      ## phpmailer 2.x
      if (method_exists($this,'AddStringAttachment')) {
        $this->AddStringAttachment($contents,$filename,'base64', $mimetype);
      } else {
        ## old phpmailer
        // Append to $attachment array
        $cur = count($this->attachment);
        $this->attachment[$cur][0] = base64_encode($contents);
        $this->attachment[$cur][1] = $filename;
        $this->attachment[$cur][2] = $filename;
        $this->attachment[$cur][3] = $this->encoding;
        $this->attachment[$cur][4] = $mimetype;
        $this->attachment[$cur][5] = false; // isStringAttachment
        $this->attachment[$cur][6] = "attachment";
        $this->attachment[$cur][7] = 0;
      }
    }

     function find_html_images($templateid) {
      #if (!$templateid) return;
      // Build the list of image extensions
      while(list($key,) = each($this->image_types))
        $extensions[] = $key;

      preg_match_all('/"([^"]+\.('.implode('|', $extensions).'))"/Ui', $this->Body, $images);

      for($i=0; $i<count($images[1]); $i++) {
        if($this->image_exists($templateid,$images[1][$i])){
          $html_images[] = $images[1][$i];
          $this->Body = str_replace($images[1][$i], basename($images[1][$i]), $this->Body);
        }
          ## addition for filesystem images
        if (EMBEDUPLOADIMAGES) {
          if($this->filesystem_image_exists($images[1][$i])){
            $filesystem_images[] = $images[1][$i];
            $this->Body = str_replace($images[1][$i], basename($images[1][$i]), $this->Body);
          }
        }
        ## end addition
      }
      if(!empty($html_images)){
        // If duplicate images are embedded, they may show up as attachments, so remove them.
        $html_images = array_unique($html_images);
        sort($html_images);
        for($i=0; $i<count($html_images); $i++){
          if($image = $this->get_template_image($templateid,$html_images[$i])){
            $content_type = $this->image_types[substr($html_images[$i], strrpos($html_images[$i], '.') + 1)];
            $cid = $this->add_html_image($image, basename($html_images[$i]), $content_type);
            $this->Body = str_replace(basename($html_images[$i]), "cid:$cid", $this->Body);#@@@
          }
        }
      }
        ## addition for filesystem images
      if(!empty($filesystem_images)){
        // If duplicate images are embedded, they may show up as attachments, so remove them.
        $filesystem_images = array_unique($filesystem_images);
        sort($filesystem_images);
        for($i=0; $i<count($filesystem_images); $i++){
          if($image = $this->get_filesystem_image($filesystem_images[$i])){
            $content_type = $this->image_types[strtolower(substr($filesystem_images[$i], strrpos($filesystem_images[$i], '.') + 1))];
            $cid = $this->add_html_image($image, basename($filesystem_images[$i]), $content_type);
            $this->Body = str_replace(basename($filesystem_images[$i]), "cid:$cid", $this->Body);#@@@
          }
        }
      }
        ## end addition
    }

    function add_html_image($contents, $name = '', $content_type='application/octet-stream') {
      // Append to $attachment array
      $cid = md5(uniqid(time()));
      $cur = count($this->attachment);
      $this->attachment[$cur][0] = $contents;
      $this->attachment[$cur][1] = '';#$filename;
      $this->attachment[$cur][2] = $name;
      $this->attachment[$cur][3] = $this->encoding;
      $this->attachment[$cur][4] = $content_type;
      $this->attachment[$cur][5] = false; // isStringAttachment
      $this->attachment[$cur][6] = "inline";
      $this->attachment[$cur][7] = $cid;

      return $cid;
    }

        ## addition for filesystem images
    function filesystem_image_exists($filename) {
      ##  find the image referenced and see if it's on the server
      $elements = parse_url($filename);
      $localfile = basename($elements['path']);
      return 
        is_file($_SERVER['DOCUMENT_ROOT'].$GLOBALS['pageroot'].'/'.FCKIMAGES_DIR.'/image/'.$localfile) 
        || is_file($_SERVER['DOCUMENT_ROOT'].$GLOBALS['pageroot'].'/'.FCKIMAGES_DIR.'/'.$localfile)
        ## commandline
        || is_file('../'.FCKIMAGES_DIR.'/image/'.$localfile) 
        || is_file('../'.FCKIMAGES_DIR.'/'.$localfile);
    }

    function get_filesystem_image($filename) {
      ## get the image contents
      $elements = parse_url($filename);
      $localfile = basename($elements['path']);
      if (is_file($_SERVER['DOCUMENT_ROOT'].$GLOBALS['pageroot'].'/'.FCKIMAGES_DIR.'/'.$localfile)) {
        return base64_encode( file_get_contents($_SERVER['DOCUMENT_ROOT'].$GLOBALS['pageroot'].'/'.FCKIMAGES_DIR.'/'.$localfile));
      } elseif (is_file($_SERVER['DOCUMENT_ROOT'].$GLOBALS['pageroot'].'/'.FCKIMAGES_DIR.'/image/'.$localfile)) {
        return base64_encode( file_get_contents($_SERVER['DOCUMENT_ROOT'].$GLOBALS['pageroot'].'/'.FCKIMAGES_DIR.'/image/'.$localfile));
      } elseif (is_file('../'.FCKIMAGES_DIR.'/'.$localfile)) {   ## commandline
        return base64_encode( file_get_contents('../'.FCKIMAGES_DIR.'/'.$localfile));
      } elseif (is_file('../'.FCKIMAGES_DIR.'/image/'.$localfile)) {
        return base64_encode( file_get_contents('../'.FCKIMAGES_DIR.'/image/'.$localfile));
      }
      return 0;
    }
    ## end addition

    function image_exists($templateid,$filename) {
      $req = Sql_Query(sprintf('select * from %s where template = %d and (filename = "%s" or filename = "%s")',
        $GLOBALS["tables"]["templateimage"],$templateid,$filename,basename($filename)));
      return Sql_Affected_Rows();
    }

     function get_template_image($templateid,$filename){
      $req = Sql_Fetch_Row_Query(sprintf('select data from %s where template = %d and (filename = "%s" or filename = "%s")',
        $GLOBALS["tables"]["templateimage"],$templateid,$filename,basename($filename)));
      return $req[0];
    }

    function EncodeFile ($path, $encoding = "base64") {
      # as we already encoded the contents in $path, return $path
      return chunk_split($path, 76, $this->LE);
    }
}
