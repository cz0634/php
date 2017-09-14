<?php
//回调页面
require_once "Connect2.1/qqConnectAPI.php";
$oauth=new OAuth();
$qq_accesstoken=$oauth->qq_callback();
$qq_openid=$oauth->get_openid();
setcookie('qq_accesstoken',$qq_accesstoken,time()+86400);
setcookie('qq_openid',$qq_openid,time()+86400);
header("Location:index.php");