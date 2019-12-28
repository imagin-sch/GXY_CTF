<!--MMZFM422K5HDASKDN5TVU3SKOZRFGQRRMMZFM6KJJBSG6WSYJJWESSCWPJNFQSTVLFLTC3CJIQYGOSTZKJ2VSVZRNRFHOPJ5-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>Do you know who am I?</title>
<?php
require "config.php";
require "flag.php";

// 去除转义
if (get_magic_quotes_gpc()) {
	function stripslashes_deep($value)
	{
		$value = is_array($value) ?
		array_map('stripslashes_deep', $value) :
		stripslashes($value);
		return $value;
	}

	$_POST = array_map('stripslashes_deep', $_POST);
	$_GET = array_map('stripslashes_deep', $_GET);
	$_COOKIE = array_map('stripslashes_deep', $_COOKIE);
	$_REQUEST = array_map('stripslashes_deep', $_REQUEST);
}

mysqli_query($con,'SET NAMES UTF8');
$name = $_POST['name'];
$password = $_POST['pw'];
$t_pw = md5($password);
$sql = "select * from user where username = '".$name."'";
// echo $sql;
$result = mysqli_query($con, $sql);


if(preg_match("/\(|\)|\=|or/", $name)){
	die("do not hack me!");
}
else{
	if (!$result) {
		printf("Error: %s\n", mysqli_error($con));
		exit();
	}
	else{
		// echo '<pre>';
		$arr = mysqli_fetch_row($result);
		// print_r($arr);
		if($arr[1] == "admin"){
			if(md5($password) == $arr[2]){
				echo $flag;
			}
			else{
				die("wrong pass!");
			}
		}
		else{
			die("wrong user!");
		}
	}
}

?>

