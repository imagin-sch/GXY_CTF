<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>莫得感情的计算器</title>
<?php
session_start();
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">";
echo "<center style='margin-top:300'>";
include "config.php";
include "flag.php";
if(!isset($_SESSION['login'])){
	$_SESSION['login'] = "GXY" . (string)time() . (string)rand(100, 1000);
}

$r_r = mysqli_query($con, "select count, result from user where token = '". $_SESSION['login'] ."' ");
$r_res = mysqli_fetch_row($r_r);
$count = $r_res[0];

$a = rand(10000000,100000000);
$b = rand(10000000,100000000);
$opt = rand(0,1);
if($opt == 0){
	$o = "+";
}
else{
	$o = "-";
}
$result = $opt == 0 ? $a + $b : $a - $b;

if(isset($_POST['answer'])){
	if($r_res[1] == $_POST['answer']){
		$count = $count + 1;
		echo "<br>bingo!<br>";
		mysqli_query($con, "update user set count = $count where token = '". $_SESSION['login'] ."' ");
		mysqli_query($con, "update user set result = $result where token = '". $_SESSION['login'] ."' ");
		
	}
	else{
		echo "<br>算错了呀，重新来吧！<br>";
		$count = 0;
		mysqli_query($con, "update user set count = 0 where token = '". $_SESSION['login'] ."' ");
		mysqli_query($con, "update user set result = $result where token = '". $_SESSION['login'] ."' ");		
	}
}

$c = isset($count) ? $count : 0;
echo "<br>第 " . $c . " 次成功啦<br>第一千次给flag呦<br>";

echo "<br>".$a." $o ".$b."<br><br>";
echo "<form action=\"index.php\" method=\"post\"><input style=\"width:500px\" class=\"form-control\" type=\"text\" name=\"answer\" placeholder=\"Answer\" required></form>";



// echo $result."<br>";


if(!isset($r_res[1])){
	$sql = "insert into user values('". $_SESSION['login'] ."', 0, $result)";
	mysqli_query($con, $sql);
	$count = 0;
}
else{
	$count = $r_res[0];
}

if($count >= 1000){
	echo "<br><br>Congraduations! ".$flag;
}



?>

