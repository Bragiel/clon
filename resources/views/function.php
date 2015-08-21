<?php 
include "server1.php";


if($_POST['param']){
	$param=$_POST['param'];
	$db=$param[0];
	$rfc=$param[1];
	$moneda=$param[2];

	$connectDB=connectDB($db);

	switch ($db) {
		case 'COSYSA':
				
				$totalFlete=$param[3];
				$shipment = $param[4];

				$results=fleteros($rfc, $moneda, $totalFlete, $shipment);
				$consigna=consigna($results[0]["ModuloID"]);

				if ($consigna['error']!='no') {

				}
				

				if(count($results)!=0){

				?>
					<div id="xmlData">
						<table class="xmlTable">
							<thead>
								<tr>
									<td>Embarque</td>
									<td>Empresa</td>
									<td>Destino Nombre</td>
									<td>Población</td>
									<td>Estado</td>
									
									<td>Peso</td>
									<td>Movimiento</td>
									<td>Folio</td>
									<td>Almacen</td>
									<td>Importe</td>
									<td>Impuestos</td>
									<td>Retenciones</td>
									<td>Total</td>
								
								</tr>
							</thead>
							<tbody>
								<?php 
									
									foreach($results as $key => $row){ 

										$fleteroD = fleterosD($row["ModuloID"]);
										// printArray($results);
										
								 ?>
									<tr>
										<th><?php echo $results[0]["EmbarqueID"]?></th>
										<th><?php echo $row["Empresa"]?></th>
										
										<?php 
											if($consigna!='no'){
												?>
												<th><?php echo $row["NombreEnvio"]?></th>
												<th><?php echo strtoupper($row["Poblacion"])?></th>
												<th><?php echo strtoupper($row["Estado"])?></th>
												
												<?php
											}else{
												?>
												<th><?php echo $consigna["results"]["Nombre"]?></th>
												<th><?php echo strtoupper($consigna["results"]["Estado"])?></th>
												<th><?php echo $consigna["results"]["Poblacion"]?></th>
												<?php
											}
										 ?>		
										

										
										<th><?php echo $row["Peso"]?></th>
										<th><?php echo $row["vMov"]?></th>
										<th><?php echo $row["Folio"]?></th>
										<th><?php echo $row["Almacen"]?></th>
										
										<th class="num"><?php echo number_format($row["Subtotal"],2)?></th>
										<th class="num"><?php echo number_format($row["Impuestos"],2)?></th>
										<th class="num"><?php echo number_format($row["Retencion"],2)?></th>
										<th class="num"><?php echo number_format($row["Importe"],2)?></th>
										
										<input  type="hidden" name="document" data-module='<?php echo $row["Modulo"]?>' data-total='<?php echo $row["Importe"]?>' value="<?php echo $row[0]?>">
									</tr>
									<tr>
										<th></th>
										
										<th  bgcolor='white'>Fletera:</th>
										<th colspan = "2"><?php echo $fleteroD["identity"]["Nombre"]?></th>
										<th bgcolor='white'>Placas:</th>
										<th colspan = "2"><?php echo $fleteroD["identity"]["Placas"]?></th>
										<th bgcolor='white'>Chofer:</th>
										<th colspan = "5"><?php echo $fleteroD["identity"]["Operador"]?></th>
										
										
									</tr>
								<?php 
									}										
								 ?>
							</tbody>
						</table>
						<div style='diplay: block;'>

							<input class="myBtn" name="process" type="button" value="Procesar" >
						</div>
						
						<div>
							<img src="assets/img/loader.gif" alt="loader">
						</div>
						
					</div>

				<?php
				}else{
					echo '<span class="errorMsg">No hay documentos que coincidan con la base de datos.</span>';
				}


			break;//END CASE COSYSA
		
		case 'ISYSAINF':
				$origenId=$param[3];
				$fecha = $param[4];
				$doc_type = $param[5];

				switch ($doc_type) {
					case 'bill':
						$results=cuentasXPagar($rfc, $moneda, $origenId);

						// printArray($results);
						$headerId = $results["id"];
						$origen=$results["origen"];
						$origenID=$results["origenID"];
						// $broadcastDate = new DateTime(substr($results["FechaEmision"],0,10));
						// $limitDate = new DateTime('2015-01-28');
						$broadcastDate = substr($results["FechaEmision"],0,11);

						$validateDate = validateDate($fecha, $broadcastDate, $rfc);

						if(!$validateDate['validate']){

						// if($broadcastDate>$limitDate){
								$sql2="SELECT a.Origen , a.OrigenID,  b.*, c.Descripcion1 from Compra a, CompraD b, Art c where a.ID=b.id and b.Articulo = c.Articulo and a.Mov='$origen' and a.MovID='$origenID'";

								$stmt2 = mssql_query( $sql2 );

								while ($row2 = mssql_fetch_array($stmt2)) {
									$results2[] = $row2;
								}

								if(count($results2)!=0){

								?>
									<div id="xmlData">
										<table class="xmlTable" data-xmlDate='<?php echo $fecha?>' data-burOrderDate='<?php echo $broadcastDate?>'>
											<thead>
												<tr>
													<td>Orden de Compra</td>
													<td>Articulo</td>
													<td>Descripcion</td>
													<td>Unidad</td>
													<td>Cantidad</td>
													
													<td>Cantidad Inv.</td>
													<td>Valor Unitario</td>
													<td>Importe</td>
													
												</tr>
											</thead>
											<tbody>
												<tr>
											<?php 
													
												$flag=$results2[0][1];
												$i=0;
												foreach($results2 as $key => $row){ 
													if($flag!=$row["OrigenID"]||$i==0){
											 ?>
														<th id="origenId"><?php echo $row["OrigenID"]?><input type="hidden" name="origenId" value=<?php echo $headerId?>></th>

											<?php 
													}else{
														echo "<th id='origenId'></th>";
													}
											?>
													<th><?php echo $row["Articulo"]?></th>
													<th style="text-align: left"><?php echo utf8_encode($row["Descripcion1"])?></th>
													<th><?php echo $row["Unidad"]?></th>
													<th class="num"><?php echo $row["Cantidad"]?></th>
													
													<th class="num"><?php echo $row["CantidadInventario"]?></th>
													<th class="num"><?php echo number_format($row["Costo"],2)?></th>
													<th class="num"><?php echo number_format($row["Costo"]*$row["Cantidad"],2)?></th>
												<?php
													$subTotal=$subTotal+$row["Costo"]*$row["Cantidad"];
													$descuentos = $descuentos+$row["DescuentoImporte"];
													$impuestos = $impuestos+$row["Costo"]*$row["Cantidad"]*$row['Impuesto1']/100;
													$total=$subTotal-$descuentos+$impuestos;
													
												  ?>
												</tr>	
												
											<?php 
												}
											?>
												<tr>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th>Subtotal</th>
													<th class="num"><?php echo number_format($subTotal, 2)?></th>
													
												</tr>
												<tr>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th>Descuentos</th>
													<th class="num"><?php echo number_format($descuentos, 2)?></th>
													
												</tr>
												<tr>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th>Impuestos</th>
													<th class="num"><?php echo number_format($impuestos, 2)?></th>
													
												</tr>
												<tr>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th>Total</th>
													<th id="buyOrderTotal" class="num"><?php echo number_format($total,2)?></th>
													
												</tr>
											</tbody>
										</table>
										<div style='diplay: block;'>

											<input class="myBtn" name="process" type="button" value="Procesar">
										</div>
										
										<div>
											<img src="assets/img/loader.gif" alt="loader">
										</div>
										
									</div>

								<?php
								}else{
									echo '<span class="errorMsg">No hay documentos que coincidan con la base de datos.</span>';
								}
							// }else{
							// 	echo '<span class="errorMsg">Este portal solo funciona con Entradas Compra emitidas después del 28 de Enero del 2015.</span>';
							// }

						}else{
							echo '<span class="errorMsg">'.$validateDate['message'].'</span>';

						}

					break;//END CASE BILL
					
					case 'service':
						$results=service($rfc, $moneda, $origenId);

						// printArray($results);
						$headerId = $results[0]["id"];
						$origen=$results[0]["Mov"];
						$origenID=$results["MovID"];
						// $broadcastDate = new DateTime(substr($results["FechaEmision"],0,10));
						// $limitDate = new DateTime('2015-01-28');
						$broadcastDate = substr($results["FechaEmision"],0,11);

						$validateDate = validateDate($fecha, $broadcastDate, $rfc);

						if(!$validateDate['validate']){

						// if($broadcastDate>$limitDate){
							//printArray($results);

							if(count($results)!=0){

							?>
								<div id="xmlData">
									<table class="xmlTable" data-xmlDate='<?php echo $fecha?>' data-burOrderDate='<?php echo $broadcastDate?>'>
										<thead>
											<tr>
												<td>Número de Servicio</td>
												<td>Concepto</td>
												<td>Cantidad</td>
												<td>Importe</td>
												<td>Retencion</td>
												
												<td>Impuestos</td>
												<td>Total</td>
												
												
											</tr>
										</thead>
										<tbody>
											<tr>
										<?php 
												
											$flag=$results[0]['MovID'];
											$i=0;
											foreach($results as $key => $row){ 
												if($flag!=$row["MovID"]||$i==0){
										 ?>
													<th id="origenId"><?php echo $row["MovID"]?><input type="hidden" name="origenId" value=<?php echo $headerId?>></th>

										<?php 
												}else{
													echo "<th id='origenId'></th>";
												}
										?>
												<th style="text-align: left"><?php echo utf8_encode($row["Concepto"])?></th>
												<th style="text-align: left"><?php echo utf8_encode($row["Cantidad"])?></th>
												
												<th class="num"><?php echo number_format($row["Importe"],2)?></th>
												<th class="num"><?php echo number_format($row["Retencion"],2)?></th>
												<th class="num"><?php echo number_format($row["Impuestos"],2)?></th>
											<?php
												$subTotal=$subTotal+$row["Importe"];
												$retencion = $descuentos+$row["Retencion"];
												$impuestos = $impuestos+$row["Impuestos"];
												$total=$subTotal-$retencion+$impuestos;
												
											  ?>
											  	<th class="num"><?php echo number_format($total,2)?></th>
											</tr>	
											
										<?php 
											}
										?>
											<tr>
												<th></th>
												<th></th>
												<th></th>
												<th></th>
												<th></th>
												<th>Subtotal</th>
												<th class="num"><?php echo number_format($subTotal, 2)?></th>
												
											</tr>
											<tr>
												<th></th>
												<th></th>
												<th></th>
												<th></th>
												<th></th>
												<th>Retencion</th>
												<th class="num"><?php echo number_format($retencion, 2)?></th>
												
											</tr>
											<tr>
												<th></th>
												<th></th>
												<th></th>
												<th></th>
												<th></th>
												<th>Impuestos</th>
												<th class="num"><?php echo number_format($impuestos, 2)?></th>
												
											</tr>
											<tr>
												<th></th>
												<th></th>
												<th></th>
												<th></th>
												<th></th>
												<th>Total</th>
												<th id="buyOrderTotal" class="num"><?php echo number_format($total,2)?></th>
												
											</tr>
										</tbody>
									</table>
									<div style='diplay: block;'>

										<input class="myBtn" name="process" type="button" value="Procesar">
									</div>
									
									<div>
										<img src="assets/img/loader.gif" alt="loader">
									</div>
									
								</div>

							<?php
							}else{
								echo '<span class="errorMsg">No hay documentos que coincidan con la base de datos.</span>';
							}
							

						}else{
							echo '<span class="errorMsg">'.$validateDate['message'].'</span>';

						}
					break;//END CASE SERVICE
				}

				

				

				
			break;//END CASE ISYSAINF
	}
	
	

	
	
	
}

if($_POST['xmlData']){
	$params=$_POST['xmlData'];
	
	 
	
	?>
	<div id = "xmlDetail">
		<table class="xmlTable">
				<thead>
					<tr>
						<td>Identificador</td>
						<td>Descripcion</td>
						<td>Unidad</td>
						
						<td>Cantidad</td>
						<td>Valor Unitario</td>
						<td>Importe</td>
						
						
					</tr>
				</thead>
				<tbody>
					
					<?php
						foreach ($params["Conceptos"] as $param) {

							echo "<tr>";
							echo "<td>".$param["identificador"]."</td>";
							echo "<td>".$param["descripcion"]."</td>";
							echo "<td>".$param["unidad"]."</td>";
							
							echo "<td class='num'>".$param["cantidad"]."</td>";
							echo "<td class='num'>".number_format($param["valorUnitario"], 2)."</td>";
							echo "<td class='num'>".number_format($param["importe"], 2)."</td>";
							echo "</tr>";
						}
					?>
					<tr>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th>Subtotal</th>
						<th class="num"><?php echo number_format($params['subTotal'],2) ?></th>
					</tr>
					<tr>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th>Impuestos</th>
						<th class="num"><?php echo number_format($params['impuestos'],2) ?></th>
					</tr>
					<tr>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th>Descuentos</th>
						<th class="num"><?php echo number_format($params['descuento'],2) ?></th>
					</tr>
					<tr>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th>Retencion IVA</th>
						<th class="num"><?php echo number_format($params['retencionIVA'],2) ?></th>
					</tr>
					<tr>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th>Retencions ISR</th>
						<th class="num"><?php echo number_format($params['retencionISR'],2) ?></th>
					</tr>
					<tr>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th>Total</th>
						<th id="xmlTotal" class="num"><?php echo number_format($params['total'],2) ?></th>
					</tr>
				</tbody>
		</table>
		
		<input type="hidden" name="pathXml" value="<?php echo $params["destination"]?>">
		<input type="hidden" name="pathPdf" value="">
		<input type="hidden" name="pathEvi" value="">
		<input type="hidden" name="rfc" value=<?php echo $params["rfc_receptor"]?>>
		<input type="hidden" name="subTotal" value=<?php echo $params["subTotal"]?>>
		<input type="hidden" name="impuestos" value=<?php echo $params["impuestos"]?>>
		<input type="hidden" name="nameXml" value='<?php echo str_replace(".xml", "", $params["nameXml"])?>'>
		<input type="hidden" name="UUID" value=<?php echo $params["UUID"]?>>
		<input type="hidden" name="descuento" value=<?php echo $params["descuento"]?>>
	</div>
	<div id='addNewXml'>
		<label for="addNewXml">Agregar nuevo documento</label>
		<input type="button" value=" + " name="addNewXml" disabled>
		<input class="myBtn" name="search" type="button" value="Procesar" data-fecha='<?php echo $params["fecha"]?>' disabled>
	</div>


	<?php
	
}

if($_POST['register_bill']){
		$data = $_POST['register_bill'];
		$db = $data[0];
	?>

	<div class="placeHolder">
		<ul class="billMenu">
			<li>
				<h3>Registro Facturas</h3>
			</li>
		<?php 
			switch ($db){
				case 'ISYSAINF':
					?>
					<li class="coin">
						<label for="change">Moneda:</label>
						<select name="change" id="change">
							<option value=""></option>
							<option value="Pesos">MXN</option>
							<option value="Dolares">USD</option>
						</select>
					</li>
				<?php
				break;
			}
				?>
			<li>
				<label for="xml">Archivo XML</label>
				<input class="file" type="file" name="xml" accept="text/xml" id="" >
			</li>
			<li>
				<label for="pdf" >Archivo PDF</label>
				<input class="file" type="file" name="pdf" id="filePdf" accept="application/pdf" disabled>
				<input type="button" name="preview" value="Vista Previa" disabled>
			</li>
		<?php 
			switch ($db){
				case 'COSYSA':
					?>
					<li>
						<label for="evidence">Evidencia</label>
						<input class="file" type="file" name="evidence" id="fileEvi" disabled>
						<input type="button" name="preview" value="Vista Previa" disabled>
						
					</li>
					<li>
						<label for="shipment">Embarque </label><input type="text" name="shipment" disabled>
					</li>
					<?php
				break;
				case 'ISYSAINF':
					?>
					<li>
						<label for="buyEntry">Entrada Compra </label><input type="text" name="buyEntry" disabled>
					</li>
					<?php
				break;
			}
		?>
			
		</ul>
	</div>

	<?php
	
}

if($_POST['register_service']){
		$data = $_POST['register_service'];
		$db = $data[0];
	?>

	<div class="placeHolder">
		<ul class="billMenu">
			<li>
				<h3>Registro Servicio</h3>
			</li>
		<?php 
			switch ($db){
				case 'ISYSAINF':
					?>
					<li class="coin">
						<label for="change">Moneda:</label>
						<select name="change" id="change">
							<option value=""></option>
							<option value="Pesos">MXN</option>
							<option value="Dolares">USD</option>
						</select>
					</li>
				<?php
				break;
			}
				?>
			<li>
				<label for="xml">Archivo XML</label>
				<input class="file" type="file" name="xml" accept="text/xml" id="" >
			</li>
			<li>
				<label for="pdf" >Archivo PDF</label>
				<input class="file" type="file" name="pdf" id="filePdf" accept="application/pdf" disabled>
				<input type="button" name="preview" value="Vista Previa" disabled>
			</li>
		<?php 
			switch ($db){
				case 'COSYSA':
					?>
					<!-- <li>
						<label for="evidence">Evidencia</label>
						<input class="file" type="file" name="evidence" id="fileEvi" disabled>
						<input type="button" name="preview" value="Vista Previa" disabled>
						
					</li> -->
					<li>
						<label for="shipment">Embarque </label><input type="text" name="shipment" disabled>
					</li>
					<?php
				break;
				case 'ISYSAINF':
					?>
					<li>
						<label for="service_num">Número de Servicio </label><input type="text" name="buyEntry" disabled>
					</li>
					<?php
				break;
			}
		?>
			
		</ul>
	</div>

	<?php
	
}

if($_POST['changePassView']){
	?>

	<div class="placeHolder">
		<ul>
			<li>
				<h3>Cambio de Contraseña</h3>
			</li>
			<li>
				<label for="change">Contraseña actual:</label>
				<input type="password" name="oldPass">
			</li>
			<li>
				<label for="change">Nueva contraseña:</label>
				<input type="password" name="newPass">
			</li>
			<li>
				<label for="change">Confirmar contraseña:</label>
				<input type="password" name="confirmNewPass">
			</li>
			<li style = "height:50px">
				<input type="button" class="myBtn" name="confirmPass" value="Confirmar" disabled>
			</li>
			
		</ul>
	</div>

	<?php
	
}//END changePass

if($_POST['changeEmailView']){
	$param = $_POST['changeEmailView'];
	$db = $param[0];
	$rfc = $param[1];

	connectDB($db);
	$email = getEmail($rfc);
	
	?>


	<div class="placeHolder">
		<ul>
			<li>
				<h3>Correo Electrónico</h3>
			</li>
			<li>
				<label for="actualEmail">Correo actual:</label>
			<?php 
				if(!$email[0]){
					echo '<span class="errorMsg">No hay correo registrado.</span>';
				}else{
					echo '<span> '.$email['email1'].'</span>';
				}
			?>
			</li>
			<li>
				<label for="change">Nueva correo:</label>
				<input type="text" name="newEmail">
			</li>
			<li style = "height:50px">
				<input type="button" class="myBtn" name="confirmEmail" value="Confirmar" disabled>
			</li>
			
		</ul>
	</div>

	<?php
	
}//END changePass

if($_POST['historialView']){
	$param = $_POST['historialView'];
	$db = $param[0];
	$rfc = $param[1];
	connectDB($db);
	$dateStart =  date("d")-5 ."-".date("m-Y");
	$dateEnd =  date("d-m-Y");
	
?>

	<div class="placeHolder">
		<ul>
			<li>
				<h3>Sus documentos:</h3>
			</li>
			<li>
				<label for="change">De:</label>
				<input type="text" name="from" value="<?php echo $dateStart; ?>">
			</li>
			<li>
				<label for="change">Al:</label>
				<input type="text" name="to" value="<?php echo $dateEnd; ?>">
			</li>
			<li style = "height:50px">
				<input type="button" class="myBtn" name="filter" value="Filtrar" >
			</li>
			<li>
				<?php 
					get_historial($dateStart, $dateEnd, $rfc);
				 ?>
				
			</li>
		</ul>
	</div>
<?php
	
}//END HistorialView

if($_POST['historialData']){
	$param = $_POST['historialData'];
	$db = $param[0];
	connectDB($db);
	$rfc = $param[1];
	$from = $param[2];
	$to = $param[3];

	get_historial($from, $to, $rfc);
}//END changePass

if($_POST['changePassData']){
	$param = $_POST['changePassData'];
	$db = $param[0];
	$oldPass = $param[1];
	$newPass = $param[2];
	$usrName = $param[3];

	//$connectDB=connectPruebasDB($db);
	$connectDB=connectDB($db);

	$sql="SELECT Contrasena FROM PROV WHERE rfc = '$usrName' AND contrasena = '$oldPass'";
	$stmt = mssql_query( $sql );
	$row = mysql_fetch_array($stmt);

	while ($row = mssql_fetch_array($stmt)) {
		$results = $row;
	}

	if($results["Contrasena"]){
		$sql="UPDATE PROV SET Contrasena = '$newPass' WHERE rfc = '$usrName' AND contrasena = '$oldPass'";
		$stmt = mssql_query( $sql );
		
		if($stmt==true){
			$response=array(
				'error'=>'no',
				'message'=> 'Su contraseña fue actualizada con éxito.'
				);

			echo json_encode($response);
		}else{
			$response=array(
				'error'=>'si',
				'message'=>'SQL Error UPDATE. Por favor reporte al Administrador.',
				'con'=>$sql);
			echo json_encode($response);
		}
		
	}else{
		$response=array(
			'error'=>'si',
			'message'=>'Su contraseña actual no es correcta.',
			'con'=>$sql);
		echo json_encode($response);
	}



}//END changePassData

if($_POST['changeEmail']){
	$param = $_POST['changeEmail'];
	$db = $param[0];
	$rfc = $param[1];
	$email = $param[2];

	//$connectDB=connectPruebasDB($db);
	$connectDB=connectDB($db);

	$sql="UPDATE PROV SET email1 = '$email' WHERE rfc = '$rfc'";
	$stmt = mssql_query( $sql );
	
	if($stmt==true){
		$response=array(
			'error'=>'no',
			'message'=> 'Su correo fue actualizado con éxito.'
			);

		echo json_encode($response);
	}else{
		$response=array(
			'error'=>'si',
			'message'=>'SQL Error UPDATE. Por favor reporte al Administrador.',
			'con'=>$sql);
		echo json_encode($response);
	}

}//END changeEmail

if($_FILES){

	if(isset($_FILES['xml'])){ 
                
        $file = $_FILES['xml'];

        if($file['type'] == 'text/xml'){

        	$destination = uploadXML($file); 

        	if($destination){
				
				$valores = validarSAT($destination, $file);

				if($valores['estado']=='Vigente'){

					$rfc_receptor = getVariableXML('//cfdi:Comprobante//cfdi:Emisor', 'rfc', $destination);
					//Total
					$total= getVariableXML('//cfdi:Comprobante', 'total', $destination);
					//subTotal
					$subTotal= getVariableXML('//cfdi:Comprobante', 'subTotal', $destination);
					//descuentos
					$descuento= getVariableXML('//cfdi:Comprobante', 'descuento', $destination);
					//fecha
					$fecha= getVariableXML('//cfdi:Comprobante', 'fecha', $destination);

					if(empty($descuento)){
						$descuento = 0;
					}
					//Retenciones
					$retenciones=getMultipleXML('//cfdi:Comprobante//cfdi:Impuestos//cfdi:Retenciones//cfdi:Retencion', 'impuesto', $destination);
					$importes=getMultipleXML('//cfdi:Comprobante//cfdi:Impuestos//cfdi:Retenciones//cfdi:Retencion', 'importe', $destination);
					$i=0;
					$retencionIVA=0;
					$retencionISR=0;
					foreach ($retenciones as $retencion) {
						if($retencion=='IVA'){
							$retencionIVA=$importes[$i];
						}
						$i++;
					}
					$i=0;
					foreach ($retenciones as $retencion) {
						if($retencion=='ISR'){
							$retencionISR=$importes[$i];
						}
						$i++;
					}

					//Impuestos
					$impuestos= getVariableXML('//cfdi:Comprobante//cfdi:Impuestos', 'totalImpuestosTrasladados', $destination);

					// $validateDate = validateDate($fecha);

					// if($validateDate){
						$cantidades = getMultipleXML('//cfdi:Comprobante//cfdi:Conceptos//cfdi:Concepto', 'cantidad', $destination);
						$unidades = getMultipleXML('//cfdi:Comprobante//cfdi:Conceptos//cfdi:Concepto', 'unidad', $destination);
						$identificadores = getMultipleXML('//cfdi:Comprobante//cfdi:Conceptos//cfdi:Concepto', 'noIdentificacion', $destination);
						$descripciones = getMultipleXML('//cfdi:Comprobante//cfdi:Conceptos//cfdi:Concepto', 'descripcion', $destination);
						$valoresUnitarios = getMultipleXML('//cfdi:Comprobante//cfdi:Conceptos//cfdi:Concepto', 'valorUnitario', $destination);
						$importes = getMultipleXML('//cfdi:Comprobante//cfdi:Conceptos//cfdi:Concepto', 'importe', $destination);

						for ($i=0; $i < count($cantidades)  ; $i++) { 
							$results["Conceptos"][]= array(
								'cantidad'=>''.$cantidades[$i],
								'unidad'=>''.$unidades[$i],
								'identificador'=>''.$identificadores[$i],
								'descripcion'=> ''.$descripciones[$i],
								'valorUnitario'=> ''.$valoresUnitarios[$i],
								'importe'=>''.$importes[$i]);
						}

						$results['rfc_receptor'] = ''.$rfc_receptor.'';
						$results['subTotal'] = ''.$subTotal.'';
						$results['total'] = ''.$total.'';
						$results['impuestos'] = ''.$impuestos.'';
						$results['nameXml'] = ''.$file['name'].'';
						$results['UUID'] = ''.$valores['UUID'].'';
						$results['descuento'] = ''.$descuento.'';
						$results['retencionIVA'] = ''.$retencionIVA.'';
						$results['retencionISR'] = ''.$retencionISR.'';
						$results['destination'] = ''.$destination.'';
						$results['fecha'] = ''.$fecha.'';
						$results['error'] = 'no';
					// }else{
					// 	$results = array(
					// 		"error"=>'si',
					// 		"errorMsg"=>"Factura fuera de periodo. Favor de refacturar.");
					// }

					


					
					echo json_encode($results);

				}else{
					$error = array(
						'error' => 'si',
						'errorMsg' => 'XML no encontrado en el servicio del SAT. Estado: '.$valores['estado']
					);
					$valores = json_encode($error);
					echo $valores;
				}

			}else{
				$error = array(
					'error' => 'si',
					'errorMsg' => 'No se pudo subir el archivo XML',
					'console' => $destination
				);
				$valores = json_encode($error);
				echo $valores;
			}
        }else{
        	$error = array(
				'error' => 'si',
				'errorMsg' => 'Tipo de archivo inválido.'
			);
			$valores = json_encode($error);
			echo $valores;
        }

        

    }

    if(isset($_FILES['pdf'])){ 
                
        $file = $_FILES['pdf'];


        if($file['type'] == 'application/pdf'){

        	

        	// if(!$corrupted){
        	 	$destination = uploadXML($file); 

	        	if($destination){

	        		//$corrupted = corrupted($destination);

	     //    		if(!$corrupted){
	        			$success = array(
								'error' => 'no',
								'destination'=>$destination);

						echo json_encode($success);
	     //    		}else{
	     //    			$error = array(
						// 	'error' => 'si',
						// 	'errorMsg' => 'Error: El archivo puede estar corrupto.'
						// );
						// $valores = json_encode($error);
						// echo $valores;
	     //    		}	

	        		

				}else{
					$error = array(
						'error' => 'si',
						'errorMsg' => 'Error: No se pudo subir el archivo PDF'
					);
					$valores = json_encode($error);
					echo $valores;
				}
    //     	}else{
    //     		$error = array(
				// 	'error' => 'si',
				// 	'errorMsg' => 'El archivo puede estar corrupto.'
				// );
				// $valores = json_encode($error);
				// echo $valores;
    //     	}
	
        }else{
        	$error = array(
				'error' => 'si',
				'errorMsg' => 'Tipo de archivo inválido.'
			);
			$valores = json_encode($error);
			echo $valores;
        	
        }
       

    }

    if(isset($_FILES['evidence'])){ 
                
        $file = $_FILES['evidence'];

    	$destination = uploadXML($file); 

    	if($file['type'] == 'image/jpg'||$file['type'] == 'image/jpeg'){

    		if($file['size']<=250000){
    			if($destination){
					$success = array(
							'error' => 'no',
							'destination'=>$destination);

					echo json_encode($success);
				}else{
					$error = array(
						'error' => 'si',
						'errorMsg' => 'No se pudo subir el archivo PDF'
					);
					$valores = json_encode($error);
					echo $valores;
				} 
    		}else{
    			$error = array(
					'error' => 'si',
					'errorMsg' => 'Error: El tamaño del archivo es superior al límite.  ' 
				);
				$valores = json_encode($error);
				echo $valores;
    		}

	    	

		 }else{
        	$error = array(
				'error' => 'si',
				'errorMsg' => 'Tipo de archivo inválido. '.$file['type'] 
			);
			$valores = json_encode($error);
			echo $valores;
        }

    }
}//end $_FILES

if($_POST['insertHeader']){
	$param = $_POST['insertHeader'];
	$db = $param[0];
	$id = $param[1];
	$modulo = $param[2];

	
	$connectDB=connectDB($db);

	$response = insertBuyOrderProv($id, $modulo);

	echo json_encode($response);

}

if($_POST['insertDetail']){
	$param = $_POST['insertDetail'];
	$db = $param[0];
	$id = $param[1];
	$pathXml = $param[2];
	$pathPdf = $param[3];
	$supplier = $param[4];
	$empresa = $param[5];
	$pathEvi = $param[6];
	$uuid = $param[7];

	//$connectDB=connectPruebasDB($db);
	$connectDB=connectDB($db);
	$response = insertDetailProv($id, $pathXml, $pathPdf, $supplier, $empresa, $db, $pathEvi, $uuid);

	if($response['error']=='no'){
		//$response = spSalConfirmaOrdComProv($id);
		
		echo json_encode($response);
	}else{
		

		echo json_encode($response);
	}

	

}

if($_POST['confirmOrder']){
	$param = $_POST['confirmOrder'];
	$db = $param[0];
	$id = $param[1];
	$xml = $param[2];
	$pdf = $param[3];
	$evi = $param[4];

	$connectDB=connectDB($db);

	$response = spSalConfirmaOrdComProv($id);
		
	if($response['error']=='si'){
		unlink($xml);
		unlink($pdf);
		unlink($evi);
	}
	echo json_encode($response);
	
}



?>