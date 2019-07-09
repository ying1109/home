<?php

$MODULE      = substr(ltrim($_SERVER['REQUEST_URI'], '/'), 0, 5);
$CONTROLLER  = strrchr(strstr(ltrim($_SERVER['REQUEST_URI'], '/'), '/'), '/');
$CONTROLLER1 = ltrim(str_replace($CONTROLLER, '', strstr(ltrim($_SERVER['REQUEST_URI'], '/'), '/')), '/');
$METHOD      = ltrim($CONTROLLER, '/');

$MOD_CON     = $MODULE . '/' . $CONTROLLER1;
$MOD_MET     = $MODULE . '/' . $METHOD;
$CON_MET     = $CONTROLLER1 . '/' . $METHOD;
$MOD_CON_MET = $MODULE . '/' . $CONTROLLER1 . '/' . $METHOD;

define('MODULE', $MODULE);
define('CONTROLLER', $CONTROLLER1);
define('METHOD', $METHOD);
define('MOD_CON', $MOD_CON);
define('MOD_MET', $MOD_MET);
define('CON_MET', $CON_MET);
define('MOD_CON_MET', $MOD_CON_MET);



?>