<?php
set_time_limit(0);
define('ffmpeg', '/usr/bin/ffmpeg');
define('FFMPEG_BINARY', '/usr/bin/ffmpeg');
define('FFMPEG_movie', '/usr/bin/ffmpeg_movie');
define('flvtool2Path', '/usr/bin/flvtool2');


$submit = $_POST['submitted'];       //Get value form submitted Field
$video_file = $_FILES['vfile'];       // Uploaded video file
$videoTitle = $_REQUEST['vTitle'];      // upload file title

if (isset($submit)) {
    function getName($name)
    {
        $type = $name;
        $type = str_replace(' ', '_', $type);
        return ($type);
    }

    function getImageName($name)
    {
        $occur = strrpos($name, '.');
        //echo $occur;
        $name = substr($name, 0, $occur);
        return ($name);
    }


    function getFileExtension($fileName)
    {

        $fileNameParts = explode(".", $fileName);
        $fileExtension = end($fileNameParts);

        $fileExtension = strtolower($fileExtension);


        return ($fileExtension);

    }

    $videoDirName = $_SERVER['DOCUMENT_ROOT'] . "/assets/uploads/files/video/video/";  //Folder name where video will save
    $videoThumDir = $_SERVER['DOCUMENT_ROOT'] . "/assets/uploads/files/video/thum/";  //folder name for where upload video cut thum will save


    $newFileName = getName(getImageName($_FILES['videoUpload']['name'])); //Get new file for video file will save with that name

    $destinationThum = $videoThumDir . getName(getImageName($_FILES['videoUpload']['name'])) . '.jpg'; // complete path for save video cut thum

    if (getFileExtension($_FILES['videoUpload']['name']) != "flv") {
        $tempUpload = $_SERVER['DOCUMENT_ROOT'] . "/totalbhakti/files/video/temp/" . $newFileName . '.' . getFileExtension($_FILES['videoUpload']['name']);
    } else {
        $tempUpload = $destinationVideo;

    }

    function create_thumbnail($source, $destination, $thum_width, $thum_height)
    {
//echo $source.'<br>';
        $size = getimagesize($source);
//echo $size[0];
        $width = $size[0];
        echo 'width-' . $width;
        $height = $size[1];
        $x = 0;
        $y = 0;
        /*if($width>$height){
        $x=ceil(($width-$height)/2);
        $width=$height;
        }if($width<$height){
        $x=ceil(($height-$width)/2);
        $height=$width;
        }*/
        echo '<br>' . $thum_width . '--' . $thum_height;
        $new_image = imagecreatetruecolor($thum_width, $thum_height) or die('Cannot Initialize new GD image stream');
        $extension = getExtension($source);
        echo '<br>Exten:-' . $extension . '<br>';

        if ($extension == 'jpg' || $extension == 'jpeg') {

            $image = imagecreatefromjpeg($source);
        }

        imagecopyresampled($new_image, $image, 0, 0, $x, $y, $thum_width, $thum_height, $width, $height);

        if ($extension == 'jpg' || $extension == 'jpeg') {

            imagejpeg($new_image, $destination, 40);

        }

    }

    function getExtension($name)
    {

        return ('jpg');
    }


    if (move_uploaded_file($_FILES['videoUpload']['tmp_name'], $tempUpload)) {


        shell_exec("ffmpeg -i $tempUpload -ar 22050 -ab 32 -f flv -s 450×370 $destinationVideo");

        $img = shell_exec("ffmpeg -i $destinationVideo -f mjpeg -t 0.050 $destinationThum");

        create_thumbnail($destinationThum, $destinationFirstThum, 124, 100);

        $mov = new ffmpeg_movie($destinationVideo);
        $totTime = ceil($mov->getDuration());
        $fps = $mov->getFrameRate();
        echo '<div style="height:150px; display:block; border:#006600 solid 2px; height:20px; background-color:#66CC99 ">
Your Video Information<br>Uploaded Video Length:-' . ($totTime / 60) . '</div><br>';
    } else {
        echo 'not uploaded';
    }
}

if ($_FILES['videoUpload']['error'] > 0) {
    echo '<p class="error">The file could not be uploaded because: <strong>';
    switch ($_FILES['videoUpload']['error']) {

        case 1:
            echo 'The file exceeds the upload_max_filesize setting in php.ini.';
            break;
        case 2:

            echo 'The file exceeds the MAX_FILE_SIZE setting in the HTML form.';
            break;
        case 3:

            echo 'The file was only partially uploaded.';
            break;

        case 4:
            echo 'No file was uploaded.';
            break;

        case 6:
            echo 'No temporary folder was available.';
            break;

        case 7:
            echo 'Unable to write to the disk.';
            break;

        case 8:
            echo 'File upload stopped.';
            break;

        default:
            echo 'A system error occurred.' . $_FILES['videoUpload']['error'];
            break;
    }
    echo '</strong></p>';
}
}

?>