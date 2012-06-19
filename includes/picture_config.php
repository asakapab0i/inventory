<?php
/* 
1 = Check if the file uploaded is actually an image no matter what extension it has
2 = The uploaded files must have a specific image extension
*/

$validation_type = 1;

if($validation_type == 1)
{
	$mime = array('image/gif' => 'gif',
                  'image/jpeg' => 'jpeg',
                  'image/png' => 'png',
                  'application/x-shockwave-flash' => 'swf',
                  'image/psd' => 'psd',
                  'image/bmp' => 'bmp',
                  'image/tiff' => 'tiff',
                  'image/tiff' => 'tiff',
                  'image/jp2' => 'jp2',
                  'image/iff' => 'iff',
                  'image/vnd.wap.wbmp' => 'bmp',
                  'image/xbm' => 'xbm',
                  'image/vnd.microsoft.icon' => 'ico');
}
else if($validation_type == 2) // Second choice? Set the extensions
{
	$image_extensions_allowed = array('jpg', 'jpeg', 'png', 'gif','bmp');
}

$upload_image_to_folder = '../images/';
?>