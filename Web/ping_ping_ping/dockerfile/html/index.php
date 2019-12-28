<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>I can ping you!</title>
<center>
	<h2 style="margin-top: 300">听说php可以执行系统函数？我来康康<br></h2>
	<form action="" method="get" >
		<input type="text" name="ip" placeholder="Why not try bjut.edu.cn" required>
		<button style="margin-left:20;" type="submit">确定</button>
	</form>

	<?php
	if(isset($_GET['ip'])){
		$ip = $_GET['ip'];
		if(preg_match("/\&|\/|\?|\*|\<|[\x{00}-\x{1f}]|\>|\'|\"|\\|\(|\)|\[|\]|\{|\}/", $ip, $match)){
			print_r($match);
			print($ip);
			echo preg_match("/\&|\/|\?|\*|\<|[\x{00}-\x{20}]|\>|\'|\"|\\|\(|\)|\[|\]|\{|\}/", $ip, $match);
			die("fxck your symbol!");
		}
		else if(preg_match("/ /", $ip)){
			die("fxck your space!");
		}
		else if(preg_match("/bash/", $ip)){
			die("fxck your bash!");
		}
		else if(preg_match("/.*f.*l.*a.*g.*/", $ip)){
			die("fxck your flag!");
		}
		$a = shell_exec("ping -c 4 ".$ip);
		echo "<pre>";
		print_r($a);
	}

	?>

</center>



