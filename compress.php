<?php
// if (function_exists('imagecr,eatefrompng')) {
//     echo "functions are available.<br />\n";
// } else {
//     echo "functions are not available.<br />\n";
// }
function compress($source, $destination, $quality) {

    $info = getimagesize($source);

    if ($info['mime'] == 'image/jpeg') 
        $image = imagecreatefromjpeg($source);

    elseif ($info['mime'] == 'image/gif') 
        $image = imagecreatefromgif($source);

    elseif ($info['mime'] == 'image/png') 
        $image = imagecreatefrompng($source);

    imagejpeg($image, $destination, $quality);

    return $destination;
}
// $files = scandir('images/slider/');
// foreach($files as $file){
//     if($file != '.' and $file != '..' ){
//     $img = 'images/slider/'.$file;
//     $size = explode('.',filesize($img)/1024)[0];
//     if($size>180)
//         compress($img, $img, 90);
//     echo 'done : '.$img.'<br>';
//     }
// }
?>