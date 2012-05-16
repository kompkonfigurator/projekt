
<h1>Default plugin Main page </h1>

<p>The <i>Hello World page</i> is more interesting</p>

<?php

$plugin = $GLOBALS["plugins"][$_GET["pi"]];
$menu = $plugin->adminmenu();
foreach ($menu as $page => $desc) {
  print PageLink2($page,$desc);
}


