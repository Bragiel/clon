<?php
	function test($db){
		$db="pruebas".$db;
		return $db;
	}

	function connectDB($db){

		// $db= test($db);
		if($db=="ISYSAINF"){
			$db = "ISYSA";
		}

		if($db=="pruebasISYSAINF"){
			$db = "pruebasISYSA";
		}
	 	$serverName = "intelisis"; //serverName\instanceName
	 	$connectionInfo = array( "Database"=>$db, "UID"=>"intelisis", "PWD"=>"");
	 	$conn = mssql_connect( $serverName, "intelisis", "");
	 	mssql_select_db($db, $conn);

	 	$con1="set dateformat dmy";
 		$con1= mssql_query($con1);

		$con2="SET DATEFIRST 7";
 		$con2= mssql_query($con2);

 		$con3="SET ANSI_NULLS OFF";
 		$con3= mssql_query($con3);

 		$con4="SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED";
 		$con4= mssql_query($con4);

 		$con5="SET LOCK_TIMEOUT -1";
 		$con5= mssql_query($con5);

 		$con6="SET QUOTED_IDENTIFIER OFF";
 		$con6= mssql_query($con6);

 		$con7="SET LANGUAGE spanish";
 		$con7= mssql_query($con7);

	 	if (!$conn ) {

	 	    die('Something went wrong while connecting to MSSQL');
	 	    $response = "Error in conection of ".$db;
	 	    return $response;
	 	}else{
	 		 $response = "sucess";
	 	    return $response;
	 	}

	}

	function run($qry, $mode){

		switch ($mode) {
			case 'ASSOC':
				$mode = MSSQL_ASSOC;
				break;

			case 'NUM':
				$mode = MSSQL_NUM;
				break;

			case 'BOTH':
				$mode = MSSQL_BOTH;
				break;
		}

		$qry1=mssql_query($qry);

		while ($row = mssql_fetch_array($qry1, $mode)) {
			$results[] = $row;
		}

		return $results;
	}

	function printArray($value){
		echo "<pre>", print_r($value), "</pre>";
	}

	// ini_set('mssql.charset', 'UTF-8');


?>
