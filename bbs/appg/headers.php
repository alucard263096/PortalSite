<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+


// PREVENT PAGE CACHING
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header ('Cache-Control: no-cache, must-revalidate'); // HTTP/1.1
header ('Pragma: no-cache'); // HTTP/1.0

// PROPERLY ENCODE THE CONTENT
header ('content-type: text/html; charset='.$Configuration['CHARSET']);

// REPORT ALL ERRORS
//error_reporting(E_ERROR);

// DO NOT ALLOW PHP_SESS_ID TO BE PASSED IN THE QUERYSTRING
ini_set('session.use_only_cookies', 1);
// Track errors so explicit error messages can be reported should errors be encountered
@ini_set('track_errors', 1);
?>