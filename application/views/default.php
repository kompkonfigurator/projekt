<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo __('Configurator') ?></title>

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
        	<div class="sitename"><?php echo __('Config')?><span>urator</span>
        	<br/>
    </div>
        	
      </div>
        
       <div class="log">
<a href="/kohana/form">	<img src="http://icons.iconarchive.com/icons/icons-land/vista-hardware-devices/128/Home-Server-icon.png" alt="comp" border="0"/></a>
<a href="/kohana/auth/twitter"><img src="http://icons.iconarchive.com/icons/iconshock/free-social/128/twitter-icon.png" alt="twitter" border="0" /> </a>
<a href="/kohana/auth/facebook">	<img src="http://icons.iconarchive.com/icons/iconshock/free-social/128/facebook-icon.png" alt="facebook" border="0"/> </a> 


       
          
        </div>
        
        
        
    </div>
    
    
    <div class="templatemo_content_top"></div>
    <div id="templatemo_content">
	   
    	<div class="banner">
        	<h3><?php echo __('Only using our application');?></h3>
            <ul>
                <li><?php echo __('you can easily');?></li>
                <li><?php echo __('create your own personal computer');?></li>
                <li><?php echo __('for the lowest price on the market');?></li>
            </ul>      
			
        </div>
        
       	<div id="templatemo_menu">
            <div class="menuleft"></div>
                <ul>
                                        <li><?php echo html::anchor('/', ''); ?></li>
					<li><?php echo HTML::anchor('/', __('<img src="http://icons.iconarchive.com/icons/artua/mac/16/Home-icon.png" alt="comp" border="0"/> - Home'), ($top_tab=="home" ? array('class'=>'current') : NULL)) ;?></li>
					
					<li><?php echo HTML::anchor('/form', __('<img src="http://icons.iconarchive.com/icons/icons-land/vista-hardware-devices/16/Home-Server-icon.png" alt="comp" border="0"/> - Form'), ($top_tab=="form" ? array('class'=>'current') : NULL));?></li>
					
					<li><?php echo HTML::anchor('/user/create', __('<img src="http://icons.iconarchive.com/icons/webiconset/application/16/Register-icon.png" alt="comp" border="0"/> - Register'), ($top_tab=="/user/create" ? array('class'=>'current') : NULL));?></li>
					
                 <li><?php echo HTML::anchor('/user/login', __('<img src="http://icons.iconarchive.com/icons/gakuseisean/ivista-2/16/Alarm-Padlock-icon.png" alt="comp" border="0"/> - Login'), ($top_tab=="/user/login" ? array('class'=>'current') : NULL));?></li>
                   

					<li><?php
                foreach($langs as $key => $lang){
                    echo HTML::anchor('lang/'.$key, $lang);
                    echo $key!='pl-pl' ? ' ' : '';
                }?></li>
                </ul>
            <div class="menuright"></div>    	
        </div>
        
      <div id="templatemo_boxarea">
		  <?=$content;?>

        </div>
            </div>
    <div class="templatemo_content_bottom"></div>
    
    	<div id="templatemo_footer">
		<a href="/kohana"><?php echo __('Main page')?></a> | <a href="../"><?php echo __('About')?></a> | <a href="../"><?php echo __('Shops')?></a> | <a href="../"><?php echo __('Contact')?> </a>| <a href="/kohana/newsletter?p=subscribe">Newsletter</a>
		<br />
        Copyright © 2012 <a href="#"><b><?php echo __('Configurator')?></b></a> | <a href="" target="_parent">Website Templates</a> by <a href="http://www.templatemo.com" target="_blank"><b>templatemo.com</b></a></div>
   
    
</div>
</body>
</html>
