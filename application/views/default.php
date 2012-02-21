<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title ?></title>

<meta name="description" content="<?php echo $description?>" />
<?php foreach ($styles as $file => $type) echo HTML::style($file, array('media' => $type)), "\n" ?>
<?php foreach ($scripts as $file) echo HTML::script($file), "\n" ?>
<style type="text/css">
<!--
.style1 {
	font-size: 22px;
	color: #fb6e26;
}
-->
</style></head>
<body>
<div id="templatemo_container">
<div id="templatemo_top">
    	<div class="sitename_panel">
        	<div class="sitename"><span>Web</span> Hosting</div>
      </div>
        
        <div class="livechat_panel">
        	<a href="#"><?php echo html::image('media/img/templatemo_livechat.gif'); ?></a>
        </div>
        
        <div class="freecall_panel">
        	<div class="bigfont">Sales &amp; Support</div>
            <div class="phoneno">Toll Free <span>(100) 200-3000</span></div>
        </div>
        
    </div>
    
    
    <div class="templatemo_content_top"></div>
    <div id="templatemo_content">
	   
    	<div class="banner">
        	<h3>Special Reseller Package</h3>
            <ul>
                <li>2,000 GB disk space</li>
                <li>100,000 GB premium bandwidth</li>
                <li>Unlimited hosting accounts</li>
            </ul>      
			<div class="readmore_black"><a href="#">Learn more</a></div>
        </div>
        
       	<div id="templatemo_menu">
            <div class="menuleft"></div>
                <ul>
                    <li><?php echo html::anchor('/', 'Home'); ?></li>
                    <li><?php echo html::anchor('/form', 'Formularz'); ?></li>
                </ul>
            <div class="menuright"></div>    	
        </div>
        
      <div id="templatemo_boxarea">
<?php include Kohana::find_file('views', $content);?>
        </div>
            </div>
    <div class="templatemo_content_bottom"></div>
    
    	<div id="templatemo_footer">
		<a href="#">Home</a> | <a href="#">Hosting Features</a> | <a href="#">Help Center</a> | <a href="#">Resellers</a> | <a href="#"> Our Company</a> | <a href="#">Contact Us</a><br />
        Copyright © 2048 <a href="#"><b>Your Company Name</b></a> | <a href="http://www.iwebsitetemplate.com" target="_parent">Website Templates</a> by <a href="http://www.templatemo.com" target="_blank"><b>templatemo.com</b></a></div>
   
    
</div>
</body>
</html>