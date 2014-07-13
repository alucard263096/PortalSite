<?php
require '../include/common.inc.php';

$lang=$_SESSION["lang"];
session_destroy();
WindowRedirect("login.php?lang=".$lang);

?>