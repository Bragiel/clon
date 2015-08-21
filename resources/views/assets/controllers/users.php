<?php 

include 'db.php';

connectDB('COSYSA');

$business = run('EXEC spSalBDEmpresaNombre', 'ASSOC');



foreach ($business as $key) {
	$business_options[] = "<option value='".$key["BD"]."'>".$key["Nombre"]."</option>";
	
}

// printArray($business_options);

?>