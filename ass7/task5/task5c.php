<?php

$im = imagecreatefromjpeg('screen.jpg');

$stamp = imagecreatetruecolor(500, 100);
imagefilledrectangle($stamp, 0, 0, 499, 99, 0x0000FF);
imagefilledrectangle($stamp, 9, 9, 490, 90, 0xFFFFFF);
$im = imagecreatefromjpeg('screen.jpg');
imagestring($stamp, 5, 20, 20, 'ISIT301', 0x0000FF);
imagestring($stamp, 3, 20, 40, 'Assignment 7 - Matthew Saliba', 0x0000FF);

$marge_right = 10;
$marge_bottom = 10;
$sx = imagesx($stamp);
$sy = imagesy($stamp);

imagecopymerge($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp), 50);

imagepng($im, 'photo_stamp.png');
imagedestroy($im);

?>