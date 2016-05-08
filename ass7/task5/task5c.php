<?php

$image = new imagick( "screen.png" );
$draw = new imagickdraw();
$degrees = array( 180, 45, 100, 20 );
$image->setimagebackgroundcolor("#fad888");
$image->setImageVirtualPixelMethod( imagick::VIRTUALPIXELMETHOD_BACKGROUND );
$image->distortImage( Imagick::DISTORTION_ARC, $degrees, TRUE );
header( "Content-Type: image/png" );
echo $image;
?>