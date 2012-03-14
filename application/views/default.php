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
        	<div class="sitename">Konfig<span>urator</span> </div>
      </div>
        
       <div class="log">

<a href="/auth/twitter"><img src="../../twitter.png" alt="twitter" /></a>
<a href="/auth/facebook"><img src="facebook.png" alt="facebook" /></a>


       
          
        </div>
        
        
        
    </div>
    
    
    <div class="templatemo_content_top"></div>
    <div id="templatemo_content">
	   
    	<div class="banner">
        	<h3>Tylko dzięki naszej aplikacji</h3>
            <ul>
                <li>w bardzo łatwy sposób</li>
                <li>złożysz swój wymarzony kompute</li>
                <li>za najniższą cenę na rynku</li>
            </ul>      
			<div class="readmore_black"><a href="#">Learn more</a></div>
        </div>
        
       	<div id="templatemo_menu">
            <div class="menuleft"></div>
                <ul>
                    <li><?php echo html::anchor('/', 'Strona Główna'); ?></li>
                    <li><?php echo html::anchor('/form', 'Formularz'); ?></li>
                    <li><?php echo html::anchor('/auth/login', 'Logowanie'); ?></li>

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
