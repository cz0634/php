<?php
public static function png($text, $outfile=false, $level=QR_ECLEVEL_L, $size=3, $margin=4,
                           $saveandprint=false)

{

    $enc = QRencode::factory($level, $size, $margin);

    return $enc->encodePNG($text, $outfile, $saveandprint=false);

}


//调用PHP QR Code非常简单，如下代码即可生成一张内容为"http://www.jb51.net"的二维码.
//Php代码
include 'phpqrcode.php';
QRcode::png('http://www.jb51.net');

//那么实际应用中，我们会在二维码的中间加上自己的LOGO，已增强宣传效果。那如何生成含有logo的二维码呢？其实原理很简单，先使用PHP QR Code生成一张二维码图片，然后再利用php的image相关函数，将事先准备好的logo图片加入到刚生成的原始二维码图片中间，然后重新生成一张新 的二维码图片。

include 'phpqrcode.php';
$value = 'http://www.jb51.net'; //二维码内容

$errorCorrectionLevel = 'L';//容错级别

$matrixPointSize = 6;//生成图片大小

//生成二维码图片

QRcode::png($value, 'qrcode.png', $errorCorrectionLevel, $matrixPointSize, 2);

$logo = 'logo.png';//准备好的logo图片

$QR = 'qrcode.png';//已经生成的原始二维码图



if ($logo !== FALSE) {

    $QR = imagecreatefromstring(file_get_contents($QR));

    $logo = imagecreatefromstring(file_get_contents($logo));

    $QR_width = imagesx($QR);//二维码图片宽度

    $QR_height = imagesy($QR);//二维码图片高度

    $logo_width = imagesx($logo);//logo图片宽度

    $logo_height = imagesy($logo);//logo图片高度

    $logo_qr_width = $QR_width / 5;

    $scale = $logo_width/$logo_qr_width;

    $logo_qr_height = $logo_height/$scale;

    $from_width = ($QR_width - $logo_qr_width) / 2;

    //重新组合图片并调整大小

    imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width,

        $logo_qr_height, $logo_width, $logo_height);

}

//输出图片

imagepng($QR, 'helloweba.png');

echo '<img src="helloweba.png">';


//下面是参考上面的代码，不生产图片文件，方便调用的，将下面的代码保存为img.php

include 'phpqrcode.php';

$value = $_GET['url'];//二维码内容

$errorCorrectionLevel = 'L';//容错级别

$matrixPointSize = 6;//生成图片大小

//生成二维码图片

QRcode::png($value, 'qrcode.png', $errorCorrectionLevel, $matrixPointSize, 2);

$logo = 'jb51.png';//准备好的logo图片

$QR = 'qrcode.png';//已经生成的原始二维码图



if ($logo !== FALSE) {

    $QR = imagecreatefromstring(file_get_contents($QR));

    $logo = imagecreatefromstring(file_get_contents($logo));

    $QR_width = imagesx($QR);//二维码图片宽度

    $QR_height = imagesy($QR);//二维码图片高度

    $logo_width = imagesx($logo);//logo图片宽度

    $logo_height = imagesy($logo);//logo图片高度

    $logo_qr_width = $QR_width / 5;

    $scale = $logo_width/$logo_qr_width;

    $logo_qr_height = $logo_height/$scale;

    $from_width = ($QR_width - $logo_qr_width) / 2;

    //重新组合图片并调整大小

    imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width,

        $logo_qr_height, $logo_width, $logo_height);

}

//输出图片

Header("Content-type: image/png");

ImagePng($QR);