<?php
// 自定义公共方法

error_reporting(1);
error_reporting(2);

$url_arr = explode('/', ltrim($_SERVER['REQUEST_URI'], '/'));

$MODULE     = $url_arr['0'];
$CONTROLLER = $url_arr['1'];
$METHOD     = $url_arr['2'];

$MOD_CON     = $MODULE . '/' . $CONTROLLER;
$MOD_MET     = $MODULE . '/' . $METHOD;
$CON_MET     = $CONTROLLER . '/' . $METHOD;
$MOD_CON_MET = $MODULE . '/' . $CONTROLLER . '/' . $METHOD;

define('MODULE', $MODULE);
define('CONTROLLER', $CONTROLLER);
define('METHOD', $METHOD);
define('MOD_CON', $MOD_CON);
define('MOD_MET', $MOD_MET);
define('CON_MET', $CON_MET);
define('MOD_CON_MET', $MOD_CON_MET);


