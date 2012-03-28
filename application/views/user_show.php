<h2><?php echo $title?></h2>
<div class="form">
    <label><?php echo __('Nick')?>: </label><span><?php echo $user->username?></span><br />
    <label><?php echo __('E-mail')?>: </label><span><?php echo $user->email?></span><br />
    <label><?php echo __('Articles')?>: </label><span><?php echo HTML::anchor('article/user/'.$user->id, __('Show'))?></span><br />
    <?php if(Auth::instance()->logged_in()){?>
    <label><?php echo __('Location')?>: </label><br /><img src="<?php echo $staticmap?>" alt="" />
    <?php }?>
</div>
