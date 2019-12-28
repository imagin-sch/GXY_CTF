
<?php
DEFINE('DB_USER','123');
DEFINE('DB_PASSWORD','123');
DEFINE('db_host','127.0.0.1');
DEFINE('DB_NAME','web_sqli');
$con=@mysqli_connect(db_host,DB_USER,DB_PASSWORD,DB_NAME) OR die ('couldnt connect'.mysqli_connect_error());

?>


