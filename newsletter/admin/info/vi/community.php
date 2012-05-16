
<h3>C&#7897;ng &#273;&#7891;ng  PHPlist</h3>
<p><b>Phi&ecirc;n b&#7843;n m&#7899;i nh&#7845;t</b><br/>
Xin h&atilde;y &#273;&#7843;m b&#7843;o l&agrave; b&#7841;n d&ugrave;ng phi&ecirc;n b&#7843;n m&#7899;i nh&#7845;t khi th&ocirc;ng b&aacute;o l&#7895;i v&agrave; y&ecirc;u c&#7847;u tr&#7907; gi&uacute;p.
<p>  <?php
ini_set("user_agent",NAME. " (PHPlist version ".VERSION.")");
ini_set("default_socket_timeout",5);
if ($fp = @fopen ("http://www.phplist.com/files/LATESTVERSION","r")) {
  $latestversion = fgets ($fp);
  $thisversion = VERSION;
  $thisversion = str_replace("-dev","",$thisversion);
  if (versionCompare($thisversion,$latestversion)) {
    print '<span class="highlight">Xin ch&uacute;c m&#7915;ng, b&#7841;n &#273;ang d&ugrave;ng phi&ecirc;n b&#7843;n m&#7899;i nh&#7845;t!</span>';
  } else {
    print '<span class="highlight">B&#7841;n ch&#432;a d&ugrave;ng phi&ecirc;n b&#7843;n m&#7899;i nh&#7845;t</span>';
    print "<br/>Phi&ecirc;n b&#7843;n &#273;ang d&ugrave;ng: <b>".$thisversion."</b>";
    print "<br/>Phi&ecirc;n b&#7843;n m&#7899;i nh&#7845;t: <b>".$latestversion."</b>  ";
    print '<a href="http://www.phplist.com/files/changelog">Xem nh&#7919;ng thay &#273;&#7893;i trong phi&ecirc;n b&#7843;n m&#7899;i</a>&nbsp;&nbsp;';
    print '<a href="http://www.phplist.com/files/phplist-'.$latestversion.'.tgz">T&#7843;i v&#7873;</a>';
  }
} else {
  print "<br/>Xem phi&ecirc;n b&#7843;n m&#7899;i: <a href=http://www.phplist.com/files>t&#7841;i &#273;&acirc;y</a>";
}
?>
  
<p>PHPlist b&#7855;t &#273;&#7847;u ra m&#7855;t v&agrave;o &#273;&#7847;u n&#259;m 2000 nh&#432; l&agrave; m&#7897;t &#7913;ng d&#7909;ng &#273;&#417;n gi&#7843;n c&#7911;a <a href="http://www.nationaltheatre.org.uk" target="_blank">National Theatre</a>. Theo th&#7901;i gian n&oacute; &#273;&atilde; &#273;&#432;&#7907;c ph&aacute;t tri&#7875;n tr&#7903; th&agrave;nh h&#7879; th&#7889;ng g&#7917;i B&#7843;n tin (newsletter) kh&aacute; to&agrave;n di&#7879;n v&#7899;i s&#7889; l&#432;&#7907;ng s&#7917; d&#7909;ng t&#259;ng v&#7899;i t&#7889;c &#273;&#7897; nhanh ch&oacute;ng. M&#7863;c d&ugrave; ban &#273;&#7847;u c&aacute;c &#273;o&#7841;n m&atilde;  ch&#7881; do m&#7897;t ng&#432;&#7901;i ph&aacute;t tri&#7875;n, cho &#273;&#7871;n nay n&oacute; &#273;&atilde; tr&#7903; n&ecirc;n &#273;a d&#7841;ng h&#417;n v&agrave; c&oacute; s&#7921; &#273;&#7843;m b&#7843;o v&#7873; t&iacute;nh &#7893;n &#273;&#7883;nh v&#7899;i s&#7921; tham gia c&#7911;a r&#7845;t nhi&#7873;u ng&#432;&#7901;i kh&aacute;c.</p>
<p>&#272;&#7875; gi&uacute;p cho c&aacute;c nh&agrave; ph&aacute;p tri&#7875;n s&#7843;n ph&#7849;m ti&#7871;p t&#7909;c ph&aacute;t tri&#7875;n h&#7879; th&#7889;ng b&#7841;n kh&ocirc;ng n&ecirc;n g&#7917;i y&ecirc;u c&#7847;u tr&#7921;c ti&#7871;p t&#7899;i <a href="http://tincan.co.uk" target="_blank">Tincan</a>, &#273;i&#7873;u n&agrave;y s&#7869; gi&uacute;p cho vi&#7879;c x&acirc;y d&#7921;ng c&#417; s&#7903; d&#7919; li&#7879;u c&aacute;c c&acirc;u h&#7887;i m&#7897;t c&aacute;ch c&oacute; h&#7879; th&#7889;ng, v&#7899;i c&aacute;ch l&agrave;m nh&#432; v&#7853;y s&#7869; gi&uacute;p cho ng&#432;&#7901;i m&#7899;i l&agrave;m quen v&#7899;i h&#7879; th&#7889;ng nhanh h&#417;n.</p>
<p>Hi&#7879;n t&#7841;i C&#7897;ng &#273;&#7891;ng PHPlist community c&oacute; m&#7897;t s&#7889; h&#7895; tr&#7907; sau (b&#7857;ng ti&#7871;ng Anh) :
<ul>
<li><a href="http://docs.phplist.com" target="_blank">The Documentation Wiki</a>. Trang t&agrave;i li&#7879;u n&agrave;y d&ugrave;ng &#273;&#7875; tham kh&#7843;o l&agrave; ch&iacute;nh. B&#7841;n kh&ocirc;ng n&ecirc;n d&ugrave;ng &#273;&#7875; g&#7917;i c&aacute;c c&acirc;u h&#7887;i.<br/>
  <br/></li>
<li><a href="http://www.phplist.com/forums/" target="_blank">Forums</a>. Di&#7877;n &#273;&agrave;n, n&#417;i c&oacute; th&#7875; g&#7917;i v&agrave; tr&#7843; l&#7901;i c&aacute;c c&acirc;u h&#7887;i v&#7873; PHPList <br/><br/></li>
<li><a href="#bugtrack">Mantis</a>. Mantis l&agrave; c&ocirc;ng c&#7909; theo d&otilde;i c&aacute;c v&#7845;n &#273;&#7873; li&ecirc;n quan . C&oacute; th&#7875; &#273;&#432;&#7907;c d&ugrave;ng &#273;&#7875; g&#7917;i y&ecirc;u c&#7847;u ch&#7913;c n&#259;ng m&#7899;i ho&#7863;c th&ocirc;ng b&aacute;o l&#7895;i. N&oacute; kh&ocirc;ng &#273;&#432;&#7907;c d&ugrave;ng nh&#432; l&agrave; n&#417;i cung c&#7845;p c&aacute;c tr&#7907; gi&uacute;p (helpdesk).<br/><br/></li>
</ul>
</p><hr/>
<h3>&#272;i&#7873;u b&#7841;n c&oacute; th&#7875; gi&uacute;p</h3>
<p>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="donate@phplist.com">
<input type="hidden" name="item_name" value="phplist version <?php echo VERSION?> for <?php echo $_SERVER['HTTP_HOST']?>">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="currency_code" value="GBP">
<input type="hidden" name="tax" value="0">
<input type="hidden" name="bn" value="PP-DonationsBF">
<input type="image" src="images/paypal.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
</form></p>
<p>N&#7871;u b&#7841;n l&agrave; m&#7897;t <b>ng&#432;&#7901;i th&#7841;o PHPlist</b> v&agrave; b&#7841;n th&#7845;y c&oacute; th&#7875; hi&#7875;u v&agrave; gi&uacute;p <a href="http://www.phplist.com/forums/" target="_blank">tr&#7843; l&#7901;i c&aacute;c c&acirc;u h&#7887;i cho ng&#432;&#7901;i kh&aacute;c</a>. ho&#7863;c tham gia vi&#7871;t t&agrave;i li&#7879;u  tr&ecirc;n <a href="#docscontrib">trang web cung c&#7845;p t&agrave;i li&#7879;u</a>.</p>
<p>N&#7871;u b&#7841;n m&#7899;i d&ugrave;ng PHPList v&agrave; b&#7841;n g&#7863;p v&#7845;n &#273;&#7873; c&agrave;i &#273;&#7863;t tr&ecirc;n h&#7879; th&#7889;ng, tr&#432;&#7899;c ti&ecirc;n b&#7841;n th&#7917;  t&igrave;m  c&aacute;c gi&#7843;i ph&aacute;p &#7903; c&aacute;c m&#7909;c tr&#7907; gi&uacute;p n&ecirc;u tr&ecirc;n tr&#432;&#7899;c khi g&#7917;i th&ocirc;ng b&aacute;o l&agrave; &quot;n&oacute; kh&ocirc;ng l&agrave;m vi&#7879;c&quot;. Th&#432;&#7901;ng th&igrave; v&#7845;n &#273;&#7873; b&#7841;n g&#7863;p ph&#7843;i hay li&ecirc;n quan t&#7899;i h&#7879; th&#7889;ng m&agrave; b&#7841;n &#273;ang c&agrave;i PHPList.</p>
<p>S&#7921; tham gia c&#7911;a b&#7841;n s&#7869; gi&uacute;p cho vi&#7879;c th&#7917; nghi&#7879;m PHPList m&ocirc;t c&aacute;ch k&#7929; l&#432;&#7905;ng tr&ecirc;n c&aacute;c h&#7879; th&#7889;ng kh&aacute;c nhau v&#7899;i nh&#7919;ng phi&ecirc;n b&#7843;n PHP kh&ocirc;ng gi&#7889;ng nhau .</p>
<h3>Ngo&agrave;i ra</h3>
<ul>
<li>
  <p>N&#7871;u b&#7841;n th&#7845;y r&#7857;ng PHPList &#273;&atilde; &#273;em l&#7841;i hi&#7879;u qu&#7843; cho b&#7841;n, t&#7841;o sao kh&ocirc;ng gi&uacute;p qu&#7843;ng b&aacute; s&#7843;n ph&#7849;m n&agrave;y cho nh&#7919;ng ng&#432;&#7901;i d&ugrave;ng kh&aacute;c. C&oacute; th&#7875; b&#7841;n &#273;&atilde; m&#7845;t c&ocirc;ng t&igrave;m ki&#7871;m, quy&#7871;t &#273;&#7883;nh s&#7917; d&#7909;ng PHPList sau nh&#7919;ng &#273;&aacute;nh gi&aacute; v&agrave; so s&aacute;ch PHPList v&#7899;i nh&#7919;ng s&#7843;n ph&#7849;m t&#432;&#417;ng t&#7921;, do v&#7853;y b&#7841;n c&oacute; th&#7875; chia s&#7869; nh&#7919;ng kinh nghi&#7879;m qu&yacute; b&aacute;u c&#7911;a b&#7841;n.</p>

  <p>&#272;&#7875; gi&uacute;p cho &#273;i&#7873;u &#273;&oacute;, b&#7841;n c&oacute; th&#7875; <?php echo PageLink2("vote","b&igrave;nh ch&#7885;n")?> cho PHPlist, ho&#7863;c vi&#7871;t nh&#7853;n x&eacute;t cho c&aacute;c trang web gi&#7899;i thi&#7879;u c&aacute;c &#7913;ng d&#7909;ng. B&#7841;n c&#361;ng c&oacute; th&#7875; n&oacute;i v&#7899;i ng&#432;&#7901;i kh&aacute;c v&#7873; &#273;i&#7873;u n&agrave;y.<br/>
  </li>
<li>
  <p>B&#7841;n c&oacute; th&#7875; <b>d&#7883;ch</b>  PHPlist sang ng&ocirc;n ng&#7919; c&#7911;a b&#7841;n v&agrave; g&#7917;i n&oacute; cho ch&uacute;ng t&ocirc;i.
n&#7871;u b&#7841;n c&oacute; th&#7875; gi&uacute;p h&atilde;y gh&eacute; th&#259;m<a href="http://docs.phplist.com/PhplistTranslation"> m&#7909;c bi&ecirc;n d&#7883;nh</a> tr&ecirc;n trang web  Wiki.
</p>
</li>
<li>
<p>B&#7841;n c&oacute; th&#7875; <b>th&#7917;</b> nh&#7919;ng ch&#7913;c n&#259;ng kh&aacute;c nhau c&#7911;a  PHPlist v&agrave; xem m&#7913;c &#273;&#7897; l&agrave;m vi&#7879;c c&#7911;a n&oacute; th&#7871; n&agrave;o.
Xin h&atilde;y g&#7917;i nh&#7919;ng nh&#7853;n x&eacute;t ho&#7863;c nh&#7919;ng ph&aacute;t hi&#7879;n c&#7911;a b&#7841;n l&ecirc;n <a href="http://www.phplist.com/forums/" target="_blank">Di&#7877;n &#273;&agrave;n</a>.</p>
</li>
<li>
<p>B&#7841;n c&oacute; th&#7875; d&ugrave;ng  PHPlist cho nh&#7919;ng kh&aacute;ch h&agrave;ng tr&#7843; ti&#7873;n (v&iacute; d&#7909; b&#7841;n l&agrave; ng&#432;&#7901;i kinh doanh tr&ecirc;n web) v&agrave; h&atilde;y thuy&#7871;t ph&#7909;c h&#7885; r&#7857;ng PHPList l&agrave; m&#7897;t c&ocirc;ng c&#7909; tuy&#7879;t v&#7901;i gi&uacute;p &#273;&#7841;t &#273;&#432;&#7907;c m&#7909;c ti&ecirc;u &#273;&#7873; ra. N&#7871;u h&#7885; mu&#7889;n m&#7897;t v&agrave;i thay &#273;&#7893;i b&#7841;n c&oacute; th&#7875; <b>&#273;&#7863;t mua nh&#7919;ng ch&#7913;c n&#259;ng m&#7899;i &#273;&oacute;</b> v&agrave; d&#297; nhi&ecirc;n s&#7869; do kh&aacute;ch h&agrave;ng c&#7911;a b&#7841;n tr&#7843; ti&#7873;n. N&#7871;u b&#7841;n mu&#7889;n bi&#7871;t c&#7847;n ph&#7843;i tr&#7843; bao nhi&ecirc;u cho nh&#7919;ng ch&#7913;a n&#259;ng &#273;&oacute;, <a href="mailto:phplist2@tincan.co.uk?subject=request for quote to change PHPlist">h&atilde;y li&ecirc;n h&#7879; v&#7899;i ch&uacute;ng t&ocirc;i</a>.
H&#7847;u h&#7871;t nh&#7919;ng ch&#7913;c n&#259;ng m&#7899;i c&#7911;a PHPList &#273;&#432;&#7907;c th&ecirc;m v&agrave;o l&agrave; do y&ecirc;u c&#7847;u c&#7911;a nh&#7919;ng kh&aacute;ch h&agrave;ng tr&#7843; ti&#7873;n. B&#7841;n ch&#7881; c&#7847;n tr&#7843; m&#7897;t s&#7889; ti&#7873;n nh&#7887; cho nh&#7919;ng m&#7909;c &#273;&iacute;ch l&#7899;n c&#7911;a m&igrave;nh, &#273;i&#7873;u &#273;&oacute; c&#361;ng c&oacute; &iacute;ch cho c&#7897;ng &#273;&#7891;ng PHPList c&oacute; &#273;&#432;&#7907;c h&#7919;ng ch&#7913;c n&#259;ng m&#7899;i, v&agrave; n&oacute; c&#361;ng gi&uacute;p th&ecirc;m thu nh&#7853;p cho nh&#7919;ng nh&agrave; ph&aacute;t tri&#7875;n PHPList :-)</p>
</li>
<li>
  <p>N&#7871;u b&#7841;n th&#432;&#7901;ng xuy&ecirc;n d&ugrave;ng  PHPlist v&agrave; b&#7841;n c&oacute; <b>kh&aacute; nhi&#7873;u h&#7897;i vi&ecirc;n (subscribers)</b>  (tr&ecirc;n 1000), ch&uacute;ng t&ocirc;i r&#7845;t quan t&acirc;m &#273;&#7871;n c&#7845;u h&igrave;nh h&#7879; th&#7889;ng c&#7911;a b&#7841;n, v&agrave; c&aacute;c th&ocirc;ng tin th&#7889;ng k&ecirc; vi&#7879;c g&#7917;i th&#432; qua PHPList. Theo m&#7863;c &#273;&#7883;nh PHPlist s&#7869; g&#7917;i th&#7889;ng k&ecirc; t&#7899;i <a href="mailto:phplist-stats@tincan.co.uk">phplist-stats@tincan.co.uk</a>, nh&#432;ng s&#7869; kh&ocirc;ng g&#7917;i th&ocirc;ng tin chi ti&#7871;t h&#7879; th&#7889;ng. N&#7871;u b&#7841;n mu&#7889;n cho PHPList ng&agrave;y c&agrave;ng &#273;&#432;&#7907;c ph&aacute;t tri&#7875;n h&#417;n xin h&atilde;y g&#7917;i th&ocirc;ng tin v&#7873; c&#7845;u h&igrave;nh h&#7879; th&#7889;ng cho ch&uacute;ng t&ocirc;i v&#7899;i c&aacute;c gi&aacute; tr&#7883; m&#7863;c &#273;&#7883;nh t&#7899;i &#273;&#7883;a ch&#7881; tr&ecirc;n.
S&#7869; kh&ocirc;ng c&oacute; ai &#273;&#7885;c th&ocirc;ng tin c&#7911;a b&#7841;n v&agrave; ch&uacute;ng t&ocirc;i ch&#7881; d&ugrave;ng &#273;&#7875; ph&acirc;n t&iacute;ch PHPList &#273;&atilde; v&#7853;n h&agrave;nh t&#7889;t nh&#432; th&#7871; n&agrave;o.</p>
</li>
</ul>

</p>
<p><b><a name="bugtrack"></a>Mantis</b><br/>
<a href="http://mantis.tincan.co.uk/" target="_blank">Mantis</a> l&agrave; n&#417;i b&#7841;n c&oacute; th&#7875; th&ocirc;ng b&aacute;o v&#7845;n &#273;&#7873; g&#7863;p ph&#7843;i v&#7899;i phplist. V&#7845;n &#273;&#7873; c&oacute; th&#7875; l&agrave; b&#7845;t k&#7923; &#273;i&#7873;u g&igrave; li&ecirc;n quan t&#7899;i phplist, nh&#7919;ng l&#7901;i b&igrave;nh lu&#7853;n hay nh&#7919;ng g&#7907;i &yacute; &#273;&#7875; ho&agrave;n thi&#7879;n PHPList  ho&#7863;c l&agrave; th&ocirc;ng b&aacute;o l&#7895;i. N&#7871;u b&#7841;n th&ocirc;ng b&aacute;o l&#7895;i, b&#7841;n c&#7847;n g&#7917;i c&agrave;ng nhi&#7873;u th&ocirc;ng tin li&ecirc;n quan c&agrave;ng t&#7889;t &#273;&#7875; gi&uacute;p cho nh&oacute;m ph&aacute;t tri&#7875;n c&oacute; th&#7875; s&#7917;a nh&#7919;ng l&#7895;i &#273;&oacute;.</p>
<p>Th&ocirc;ng tin t&#7889;i thi&#7875;u &#273;&#7875; g&#7917;i th&ocirc;ng b&aacute;o l&#7895;i l&agrave; th&ocirc;ng tin h&#7879; th&#7889;ng:</p>

<?php if (!stristr($_SERVER['HTTP_USER_AGENT'],'firefox')) { ?>
<p>N&#7871;u b&#7841;n g&#7863;p ph&#7843;i v&#7845;n &#273;&#7873;, h&atilde;y th&#7917; d&ugrave;ng Firefox xem v&#7845;n &#273;&#7873; c&oacute; &#273;&#432;&#7907;c gi&#7843;i quy&#7871;t hay kh&ocirc;ng.</p>
<p>  <a href="http://www.spreadfirefox.com/?q=affiliates&amp;id=131358&amp;t=81"><img border="0" alt="Get Firefox!" title="Get Firefox!" src="images/getff.gif"/></a>
  <?php } ?>
  
</p>
<p>Th&ocirc;ng tin chi ti&#7871;t h&#7879; th&#7889;ng c&#7911;a b&#7841;n:</p>

<ul>
<li>PHPlist version: <?php echo VERSION?></li>
<li>PHP version: <?php echo phpversion()?></li>
<li>Browser: <?php echo $_SERVER['HTTP_USER_AGENT']?></li>
<li>Webserver: <?php echo $_SERVER['SERVER_SOFTWARE']?></li>
<li>Website: <a href="http://<?php echo getConfig("website")."$pageroot"?>"><?=getConfig("website")."$pageroot"?></a></li>
<li>Mysql Info: <?php echo mysql_get_server_info();?></li>
<li>PHP Modules:<br/><ul>
<?php
$le = get_loaded_extensions();
foreach($le as $module) {
    print "<LI>$module\n";
}
?>
</ul></li>
</ul>
<p>L&#432;u &yacute;, emails kh&ocirc;ng d&ugrave;ng h&#7879; th&#7889;ng n&agrave;y, n&#7871;u kh&ocirc;ng Di&#7877;n &#273;&agrave;n s&#7869; b&#7883; b&#7887; qu&ecirc;n.</p>

<p><b><a name="docscontrib"></a>&#272;&oacute;ng g&oacute;p cho ph&aacute;t tri&#7875;n t&agrave;i li&#7879;u</b><br/>
N&#7871;u b&#7841;n c&oacute; th&#7875; gi&uacute;p vi&#7871;t t&agrave;i li&#7879;u, h&atilde;y &#273;&#259;ng k&yacute; v&#7899;i <a href="http://tincan.co.uk/?lid=878">Developers Mailinglist</a>. Hi&#7879;n t&#7841;i nh&oacute;m ph&aacute;t tri&#7875;n v&agrave; nh&oacute;m vi&#7871;t t&agrave;i li&#7879;u &#273;ang d&ugrave;ng chung m&#7897;t &#273;&#7883;a ch&#7881; th&#432;, b&#7903;i v&igrave; c&aacute;c v&#7845;n &#273;&#7873; th&#432;&#7901;ng li&ecirc;n quan &#273;&#7871;n nhau n&ecirc;n r&#7845;t c&#7847;n s&#7921; chia s&#7867; th&ocirc;ng tin. <br/>
Tr&#432;&#7899;c khi l&agrave;m m&#7897;t &#273;i&#7873;u g&igrave; &#273;&oacute; cho PHPList, h&atilde;y  b&agrave;n lu&#7853;n qua &#273;&#7883;a ch&#7881; tr&ecirc;n, m&#7897;t khi &yacute; t&#432;&#7903;ng &#273;&atilde; r&otilde; r&agrave;ng b&#7841;n c&oacute; th&#7875; b&#7855;t tay v&agrave;o vi&#7879;c.

<br/>
