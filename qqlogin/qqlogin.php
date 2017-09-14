<?php
require_once "Connect2.1/qqConnectAPI.php";
//访问qq登录页
$oauth=new OAuth();
$oauth->qq_login();