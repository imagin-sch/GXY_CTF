<?php
session_start();
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" /> 
<title>Upload</title>
<form action=\"\" method=\"post\" enctype=\"multipart/form-data\">
上传文件<input type=\"file\" name=\"uploaded\" />
<input type=\"submit\" name=\"submit\" value=\"上传\" />
</form>";
error_reporting(0);
if(!isset($_SESSION['user'])){
    $_SESSION['user'] = md5((string)time() . (string)rand(100, 1000));
}
if(isset($_FILES['uploaded'])) {
    $target_path  = getcwd() . "/upload/" . md5($_SESSION['user']);
    $t_path = $target_path . "/" . basename($_FILES['uploaded']['name']);
    $uploaded_name = $_FILES['uploaded']['name'];
    $uploaded_ext  = substr($uploaded_name, strrpos($uploaded_name,'.') + 1);
    $uploaded_size = $_FILES['uploaded']['size'];
    $uploaded_tmp  = $_FILES['uploaded']['tmp_name'];
 
    if(preg_match("/ph/i", strtolower($uploaded_ext))){
        die("后缀名不能有ph！");
    }
    else{
        if ((($_FILES["uploaded"]["type"] == "
            ") || ($_FILES["uploaded"]["type"] == "image/jpeg") || ($_FILES["uploaded"]["type"] == "image/pjpeg")) && ($_FILES["uploaded"]["size"] < 2048)){
            $content = file_get_contents($uploaded_tmp);
            if(preg_match("/\<\?/i", $content)){
                die("诶，别蒙我啊，这标志明显还是php啊");
            }
            else{
                mkdir(iconv("UTF-8", "GBK", $target_path), 0777, true);
                move_uploaded_file($uploaded_tmp, $t_path);
                echo "{$t_path} succesfully uploaded!";
            }
        }
        else{
            die("上传类型也太露骨了吧！");
        }
    }
}
?>
