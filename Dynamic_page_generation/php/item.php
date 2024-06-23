<?
	$conn = new PDO("mysql:host=localhost; dbname=lab1_function", "root", "root");
	$arrayMAIN = array();
	$arrayALL_DB = array();
	
	$result = $conn->query("SELECT * FROM attractions");
	foreach ($result as $value) {
		array_push($arrayMAIN, $value[0].": ".$value[1]);
		array_push($arrayALL_DB, $value[0].": ".$value[1].": ".$value[2]);
	}

	require_once('HTMLPage.php');
	$index_file = new HTMLPage('Достопримечательности Тюмени', $arrayMAIN, $arrayALL_DB);
	$index_file->write();
?>