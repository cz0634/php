<?php
require_once "Connect2.1/qqConnectAPI.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php if(!isset($_COOKIE['qq_accesstoken']) || !isset($_COOKIE['qq_openid']) ){
   ?>
    <a href="qqlogin.php">qq登录</a>
<?php
}else{
    ?>
    <a href="qqlogout.php">qq退出</a>
    <?php
    //用户详细信息
    $qc=new QC($_COOKIE['qq_accesstoken'],$_COOKIE['qq_openid']);
    $userinfo=$qc->get_user_info();
    print_r($userinfo);
}
?>
</body>
</html>
