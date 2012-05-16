
<SCRIPT LANGUAGE="JavaScript">
function addNetscapePanel() {
  if ((typeof window.sidebar == "object") && (typeof window.sidebar.addPanel == "function")) {
      window.sidebar.addPanel ("PHPlist <?php echo $GLOBALS["installation_name"]?>",
      "http://<?php echo $website?><?php echo $adminpages?>/?page=sidebar&view=mozilla&max=5&d=0","");
    } else {
      var rv = window.confirm ("This page is enhanced for use with Mozilla.  " + "Would you like to learn more?");
      if (rv)
          document.location.href = "http://www.mozilla.org";
    }
}
</SCRIPT>
<a href="javascript:addNetscapePanel();">Add Mozilla Sidebar</a>
