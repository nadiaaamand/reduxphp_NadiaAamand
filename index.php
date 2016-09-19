<?php require_once("db_const.php");  
$connection = new MySQLi(HOSTNAME, MYSQLUSER, MYSQLPASS, MYSQLDB); 
$connection->set_charset("utf8");  ?> 
<!doctype html> 
<html> 
<head> 
<meta charset="utf-8"> 
<title>Chuck Norris Facts</title> 
<link rel="stylesheet" type="text/css" href="css/styles.css">	
</head>  
<body>     	
<header> <h1>Chuck Norris Facts</h1><?php 
		 
		 if ($connection->connect_error) {
			die('Connect Error: ' . $connection->connect_error);
			} else {
			echo '<span class="hint">[Successful connection to MySQL database!]</span>';
			}
		 
		 ?>
         </header>
         <?php 
		 $data = $connection->query("SELECT * FROM jokes");
		 while($result = $data->fetch_assoc()){
			 echo '<div class="joke">';
			 //inserting image
			 if($result['img']){
			echo '<img class="img" src="' . $result['img'] . '" alt="' . '" width="200px">';
			} else {
			echo 'no image'; 
			};
	 echo '<h2>' . $result['joke'] . '</h2>';
		echo'</div>';
		 }
	?> 
</body> 
</html>
