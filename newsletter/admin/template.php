
<script language="Javascript" src="js/jslib.js" type="text/javascript"></script>
<?php
require_once dirname(__FILE__).'/accesscheck.php';

if (!empty($_FILES['file_template']) && is_uploaded_file($_FILES['file_template']['tmp_name'])) {
  $content = file_get_contents($_FILES['file_template']['tmp_name']);
} elseif (isset($_POST['content'])) {
  $content = $_POST['content'];
} else {
  $content = '';
}

if (file_exists("./FCKeditor/fckeditor.php") && USEFCK) {
  include("./FCKeditor/fckeditor.php") ;

  // Create the editor object here so we can check to see if *it* wants us to use it (this
  // does a browser check, etc.
  $oFCKeditor = new FCKeditor('content') ;
  $usefck = $oFCKeditor->IsCompatible();
  unset($oFCKeditor); // This object is *very* short-lived.  Thankfully, it's also light-weight
} else {
  $usefck = 0;
}

// Verify that TinyMCE is available
$useTinyMCE = 0;
if (USETINYMCETEMPL && file_exists(TINYMCEPATH)) {
  $useTinyMCE = 1;
}
if (isset($_REQUEST['id'])) {
  $id = sprintf('%d',$_REQUEST['id']);
} else {
  $id = 0;
}

function getTemplateImages($content) {
  $html_images = array();
  $image_types = array(
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
  // Build the list of image extensions
  while(list($key,) = each($image_types))
    $extensions[] = $key;
  preg_match_all('/"([^"]+\.('.implode('|', $extensions).'))"/Ui', stripslashes($content), $images);
  while (list($key,$val) = each ($images[1])) {
    if (isset($html_images[$val])) {
      $html_images[$val]++;
    } else {
      $html_images[$val] = 1;
    }
  }
  return $html_images;
}

function getTemplateLinks($content) {
  preg_match_all('/href="([^"]+)"/Ui', stripslashes($content), $links);
  return $links[1];
}
$msg = '';
$checkfullimages = !empty($_POST['checkfullimages']) ? 1 : 0;
$checkimagesexist = !empty($_POST['checkimagesexist']) ? 1 : 0;
$checkfulllinks = !empty($_POST['checkfulllinks']) ? 1 : 0;
$baseurl = '';

if (!empty($_POST['action']) && $_POST['action'] == "addimages") {
  if (!$id)
    $msg = $GLOBALS['I18N']->get("No such template");
  else {
    $content_req = Sql_Fetch_Row_Query("select template from {$tables["template"]} where id = $id");
    $images = getTemplateImages($content_req[0]);
    if (sizeof($images)) {
      include "class.image.inc";
      $image = new imageUpload();
      while (list($key,$val) = each ($images)) {
       # printf('Image name: <b>%s</b> (%d times used)<br />',$key,$val);
        $image->uploadImage($key,$id);
      }
      $msg = $GLOBALS['I18N']->get("Images stored");
    } else
      $msg = $GLOBALS['I18N']->get("No images found");
  }
  print '<p class="error">'.$msg.'</p>';
  return;
} elseif (!empty($_POST['save'])) {
  $templateok = 1;
  $title = removeXss($_POST['title']);
  if ($title && ereg("\[CONTENT\]",$content)) {
    $images = getTemplateImages($content);

    $cantestremoteimages = ini_get('allow_url_fopen');
    if (($checkfullimages || $checkimagesexist) && sizeof($images)) {
      foreach ($images as $key => $val) {
        if (!preg_match("#^https?://#i",$key)) {
          if ($checkfullimages) {
            print $GLOBALS['I18N']->get("Image")." $key => ".$GLOBALS['I18N']->get("not full URL")."<br/>\n";
            $templateok = 0;
           }
        } else {
          if ($checkimagesexist) {
            if ($cantestremoteimages) {
              $fp = @fopen($key,"r");
              if (!$fp) {
                print $GLOBALS['I18N']->get("Image")." $key => ".$GLOBALS['I18N']->get("does not exist")."<br/>\n";
                $templateok = 0;
              }
              @fclose($fp);
            } else {
              print $GLOBALS['I18N']->get("Image")." $key => ".$GLOBALS['I18N']->get('cannot check, "allow_url_fopen" disabled in PHP settings')."<br/>\n";
            }
          }
        }
      }
    }
    if ($checkfulllinks) {
      $links = getTemplateLinks($content);
      foreach ($links as $key => $val) {
        if (!preg_match("#^https?://#i",$val) && !preg_match("#^mailto:#i",$val)) {
           print $GLOBALS['I18N']->get("Not a full URL:")." $val<br/>\n";
           $templateok = 0;
         }
      }
    }
  } else {
    if (!$title) print $GLOBALS['I18N']->get("No Title")."<br/>";
    else print $GLOBALS['I18N']->get("Template does not contain the [CONTENT] placeholder")."<br/>";
    $templateok = 0;
  }
  if ($templateok) {
    if (!$id) {
      Sql_Query("insert into {$tables["template"]} (title) values(\"$title\")");
      $id = Sql_Insert_id();
    }
    Sql_Query(sprintf('update %s set title = "%s",template = "%s" where id = %d',
       $tables["template"],$title,addslashes($content),$id));
    Sql_Query(sprintf('select * from %s where filename = "%s" and template = %d',
      $tables["templateimage"],"powerphplist.png",$id));
    if (!Sql_Affected_Rows())
      Sql_Query(sprintf('insert into %s (template,mimetype,filename,data,width,height)
      values(%d,"%s","%s","%s",%d,%d)',
      $tables["templateimage"],$id,"image/png","powerphplist.png",
      $newpoweredimage,
      70,30));
    print '<p class="error">'.$GLOBALS['I18N']->get("Template saved").'</p>';

    if (sizeof($images)) {
      include dirname(__FILE__) . "/class.image.inc";
      $image = new imageUpload();
      print "<h3>".$GLOBALS['I18N']->get("Images")."</h3><p>".$GLOBALS['I18N']->get("Below is the list of images used in your template. If an image is currently unavailable, please upload it to the database.")."</p>";
      print "<p>".$GLOBALS['I18N']->get("This includes all images, also fully referenced ones, so you may choose not to upload some. If you upload images, they will be included in the emails that use this template.")."</p>";
      print formStart('enctype="multipart/form-data"');
      print '<input type=hidden name="id" value="'.$id.'">';
      ksort($images);
      reset($images);
      while (list($key,$val) = each ($images)) {
        printf($GLOBALS['I18N']->get("Image name:").' <b>%s</b> (%d '.$GLOBALS['I18N']->get("times used").')<br/>',$key,$val);
        print $image->showInput($key,$val,$id);
      }

      print '<input type=hidden name="id" value="'.$id.'"><input type=hidden name="action" value="addimages"><input type=submit name="addimages" value="'.$GLOBALS['I18N']->get("Save Images").'"></form>';
      return;
    } else {
      print "<p>".$GLOBALS['I18N']->get("Template does not contain local images")."</p>";
      return;
    }
  } else {
    print '<p class="error">'.$GLOBALS['I18N']->get("Some errors were found, template NOT saved!").'</p>';
    $data["title"] = $title;
    $data["template"] = $content;
  }
} else {
  if ($id) {
    $req = Sql_Query("select * from {$tables["template"]} where id = $id");
    $data = Sql_Fetch_Array($req);
  }
}
?>

<p class="error"><?php echo $msg?></p>
<?php echo PageLink2("templates",$GLOBALS['I18N']->get("List of Templates"));?>
<p>
<?php echo formStart(' enctype="multipart/form-data"')?>
<input type=hidden name="id" value="<?php echo $id?>">
<table>
<tr>

  <td><?php echo $GLOBALS['I18N']->get('Title of this template')?></td>
  <td><input type=text name="title" value="<?php echo stripslashes(htmlspecialchars($data["title"]))?>" size=30></td>
</tr>
<tr>
  <td colspan=2><?php echo $GLOBALS['I18N']->get('Content of the template.')?><br /><?php echo $GLOBALS['I18N']->get('The content should at least have <b>[CONTENT]</b> somewhere.')?><br/><?php echo $GLOBALS['I18N']->get('You can upload a template file or paste the text in the box below'); ?></td>
</tr>
<tr>
  <td><?php echo $GLOBALS['I18N']->get('Template file.')?></td>
    <td><input type=file name="file_template" /></td>
    </tr>
<tr>
  <td colspan=2>

<?php

if ($usefck) {
  $oFCKeditor = new FCKeditor('content') ;
  $w = 600;
  $h = 800;

  # version 1.4
  //$oFCKeditor->ToolbarSet = 'Accessibility' ;
#  $oFCKeditor->ToolbarSet = 'Default' ;
#  $oFCKeditor->Value = stripslashes($data["template"]);
#  $oFCKeditor->CreateFCKeditor( 'content', $w.'px', $h.'px' ) ;

  # version 2.0
  $oFCKeditor->BasePath = './FCKeditor/';
  $oFCKeditor->ToolbarSet = 'Default' ;
  $oFCKeditor->Height = $h;
  $oFCKeditor->Width = $w;
  $oFCKeditor->Value = stripslashes($data["template"]);
  $oFCKeditor->Create() ;

  print '</td></tr>';

} elseif ($useTinyMCE) {

  $tinyMCE_path = TINYMCEPATH;
  $tinyMCE_lang = TINYMCELANG;
  $tinyMCE_theme = TINYMCETHEME;
  $tinyMCE_opts = TINYMCEOPTS;
?>
<script language="javascript" type="text/javascript" src="<?php echo $tinyMCE_path;?>"></script>
<script language="javascript" type="text/javascript">
tinyMCE.init({
  mode : "exact",
  elements : "content",
  language : "<?php echo $tinyMCE_lang;?>",
  theme : "<?php echo $tinyMCE_theme;?>"
  <?php echo $tinyMCE_opts;?>
});
</script>
<textarea name="content" id="content" cols="65" rows="20"><?php echo stripslashes(htmlspecialchars($data["template"]))?></textarea>
<?php

} else {

?>

<textarea name="content" cols="70" rows="40" wrap="virtual"><?php echo stripslashes(htmlspecialchars($data["template"]))?></textarea>

<?php

}

?>
</td>
</tr>

<!--tr>
  <td>Make sure all images<br/>start with this URL (optional)</td>
  <td><input type=text name="baseurl" size=40 value="<?php echo htmlspecialchars($baseurl)?>"></td>
</tr-->
<tr>
  <td><?php echo $GLOBALS['I18N']->get('Check that all links have a full URL')?></td>
  <td><input type=checkbox name="checkfulllinks" <?php echo $checkfulllinks?"checked":""?>></td>
</tr>
<tr>
  <td><?php echo $GLOBALS['I18N']->get('Check that all images have a full URL')?></td>
  <td><input type=checkbox name="checkfullimages" <?php echo $checkfullimages?"checked":""?>></td>
</tr>
<tr>
  <td><?php echo $GLOBALS['I18N']->get('Check that all external images exist')?></td>
  <td><input type=checkbox name="checkimagesexist" <?php echo $checkimagesexist?"checked":""?>></td>
</tr>

<tr>
  <td colspan=2><input type=submit name="save" value="<?php echo $GLOBALS['I18N']->get('Save Changes')?>"></td>
</tr>
</table>
</form>
