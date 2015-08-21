<?php echo ('<?xml version="1.0" encoding="UTF-8"?>'. " ");
header('Content-Type: text/html; charset=UTF-8');  ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 <title>::..Anexos..::</title>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <style type="text/css">
    .results{
        margin: auto;
        text-align: center;
        border-spacing: 2px;
        border-color: gray;
        height: 50px;
        outline: 0;
        font-family: 'Helvetica', Arial, sans-serif;
        font-size: 10px;
        width:100%;
    }

    .results th{
        font-weight: bold;
        background: rgb(206,220,231); /* Old browsers */
        background: -moz-linear-gradient(top,  rgba(206,220,231,1) 0%, rgba(89,106,114,1) 100%); /* FF3.6+ */
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(206,220,231,1)), color-stop(100%,rgba(89,106,114,1))); /* Chrome,Safari4+ */
        background: -webkit-linear-gradient(top,  rgba(206,220,231,1) 0%,rgba(89,106,114,1) 100%); /* Chrome10+,Safari5.1+ */
        background: -o-linear-gradient(top,  rgba(206,220,231,1) 0%,rgba(89,106,114,1) 100%); /* Opera 11.10+ */
        background: -ms-linear-gradient(top,  rgba(206,220,231,1) 0%,rgba(89,106,114,1) 100%); /* IE10+ */
        background: linear-gradient(to bottom,  rgba(206,220,231,1) 0%,rgba(89,106,114,1) 100%); /* W3C */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#cedce7', endColorstr='#596a72',GradientType=0 ); /* IE6-9 */

        display: table-cell;
        vertical-align: inherit;
        width:25%;
    }

    .results td{
        width:25%;
    }

    .results input{
        padding: 5px 10px;
        width: 90%;
        margin: 0;
        outline: 0;
        text-align: center!important;
    }
    .aprobado{
        font-weight: bold;
        font-size: 12px;
        background: rgb(230,240,163); /* Old browsers */
        background: -moz-linear-gradient(top,  rgba(230,240,163,1) 0%, rgba(210,230,56,1) 50%, rgba(195,216,37,1) 51%, rgba(219,240,67,1) 100%); /* FF3.6+ */
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(230,240,163,1)), color-stop(50%,rgba(210,230,56,1)), color-stop(51%,rgba(195,216,37,1)), color-stop(100%,rgba(219,240,67,1))); /* Chrome,Safari4+ */
        background: -webkit-linear-gradient(top,  rgba(230,240,163,1) 0%,rgba(210,230,56,1) 50%,rgba(195,216,37,1) 51%,rgba(219,240,67,1) 100%); /* Chrome10+,Safari5.1+ */
        background: -o-linear-gradient(top,  rgba(230,240,163,1) 0%,rgba(210,230,56,1) 50%,rgba(195,216,37,1) 51%,rgba(219,240,67,1) 100%); /* Opera 11.10+ */
        background: -ms-linear-gradient(top,  rgba(230,240,163,1) 0%,rgba(210,230,56,1) 50%,rgba(195,216,37,1) 51%,rgba(219,240,67,1) 100%); /* IE10+ */
        background: linear-gradient(to bottom,  rgba(230,240,163,1) 0%,rgba(210,230,56,1) 50%,rgba(195,216,37,1) 51%,rgba(219,240,67,1) 100%); /* W3C */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e6f0a3', endColorstr='#dbf043',GradientType=0 ); /* IE6-9 */

    }

    .rechazado{
        font-weight: bold;
        color: white;
        font-size: 12px;
        background: rgb(255,48,25); /* Old browsers */
        background: -moz-linear-gradient(top,  rgba(255,48,25,1) 0%, rgba(207,4,4,1) 100%); /* FF3.6+ */
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,48,25,1)), color-stop(100%,rgba(207,4,4,1))); /* Chrome,Safari4+ */
        background: -webkit-linear-gradient(top,  rgba(255,48,25,1) 0%,rgba(207,4,4,1) 100%); /* Chrome10+,Safari5.1+ */
        background: -o-linear-gradient(top,  rgba(255,48,25,1) 0%,rgba(207,4,4,1) 100%); /* Opera 11.10+ */
        background: -ms-linear-gradient(top,  rgba(255,48,25,1) 0%,rgba(207,4,4,1) 100%); /* IE10+ */
        background: linear-gradient(to bottom,  rgba(255,48,25,1) 0%,rgba(207,4,4,1) 100%); /* W3C */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ff3019', endColorstr='#cf0404',GradientType=0 ); /* IE6-9 */

        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ff1a00', endColorstr='#ff1a00',GradientType=0 ); /* IE6-9 */

    }
 </style>
 </head>
<body>
 <table align="center" cellpadding="0" cellspacing="0" height="100%" width="100%">
 <tr>
 	<td valign="top">
    	<table width="90%" height="80%" align="center" >
        	<tr>
            	<td>
                     <p align="center"><font size="5" face="Verdana, Tahoma, Arial"><strong><em>
                    Anexos
                     </em></strong></font></p>
                     <p><font face="Verdana, Tahoma, Arial">

                    <?php

                    function constructor($re, $nre, $rr, $nrr, $uuid, $fechaEmision, $fechaTimbrado, $metodoPago, $tt, $tipoComp, $Edocfdi,  $rrresult, $reresult, $mpresult){
                        //Contrucción de la tabla de resultados.
                                echo '<table class="results">';
                                echo '<thead>';
                                echo '<tr>';
                                echo '<th>RFC del Emisor</th>';
                                echo '<th>Nombre del Emisor</th>';
                                echo '<th>RFC del Receptor</th>';
                                echo '<th>Nombre del Emisor</th>';
                                echo '</tr>';
                                echo '</thead>';
                                echo '<tbody>';
                                if($reresult==1){
                                    echo "<td><input class='aprovado' type='text' value='".$re."' disabled='true'></td>";
                                }else{
                                    echo "<td><input class='rechazado' type='text' value='".$re."' disabled='true'></td>";
                                }

                                echo "<td><input type='text' value='".$nre."' disabled='disabled'></td>";
                                if($rrresult==1){
                                    echo "<td><input class='aprovado' type='text' value='".$rr."' disabled='true'></td>";
                                }else{
                                    echo "<td><input class='rechazado' type='text' value='".$rr."' disabled='true'></td>";
                                }
                                echo "<td><input type='text' value='".$nrr."' disabled='disabled'></td>";
                                echo "</tbody>";
                                echo "</table>";
                                echo '<table class="results">';
                                echo '<thead>';
                                echo '<tr>';
                                echo '<th>Folio Fiscal</th>';
                                echo '<th>Fecha de expedición</th>';
                                echo '<th>Fecha de Cerrtificación SAT</th>';
                                echo '<th>Método de Pago</th>';
                                echo '</tr>';
                                echo '</thead>';
                                echo '<tbody>';
                                echo "<td><input type='text' value='".$uuid."' disabled='disabled'></td>";
                                echo "<td><input type='text' value='".$fechaEmision."' disabled='disabled'></td>";
                                echo "<td><input type='text' value='".$fechaTimbrado."' disabled='disabled'></td>";
                                if($mpresult==1){
                                    echo "<td><input class='aprovado' type='text' value='".$metodoPago."' disabled='disabled'></td>";
                                }else{
                                    echo "<td><input class='rechazado' type='text' value='".$metodoPago."' disabled='disabled'></td>";
                                }

                                echo "</tbody>";
                                echo "</table>";
                                echo '<table class="results">';
                                echo '<thead>';
                                echo '<tr>';
                                echo '<th>Total del CFDI</th>';
                                echo '<th>Efecto del Comprobante</th>';
                                echo '<th>Estado del CFDI</th>';
                                echo '</tr>';
                                echo '</thead>';
                                echo '<tbody>';
                                echo "<td><input type='text' value='$".number_format(floatval($tt),2)."' disabled='disabled'></td>";
                                echo "<td><input type='text' value='".$tipoComp."' disabled='disabled'></td>";
                                if($Edocfdi=='Vigente'){
                                    echo "<td><input class='aprobado' type='text' value='".$Edocfdi."' disabled='disabled'></td>";
                                }else{
                                    echo "<td><input class='rechazado' type='text' value='".$Edocfdi."' disabled='disabled'></td>";
                                }

                                echo "</tbody>";
                                echo "</table>";


                    }//End constructor

                    include('inc/ftpfunc.php'); //Incluye el archivo de funciones
                    include('inc/mssql.php');
                    setlocale(LC_MONETARY, 'en_US');
                    $id= $_GET["id"];
                    $modulo=ltrim(rtrim($_GET["modulo"]));
                    $usuario=$_GET["usuario"];
                    $mes=$_GET["mes"];
                    $ano=$_GET["ano"];
                    $myDB = $_GET["bd"];
                    $empresa = $_GET["empresa"];
                        //$provcte = $_GET["id_provcte"];
                    if(!empty($_FILES["archivo"])){

                        //SE CREA LA SESION FTP CON EL SERVIDOR
                        $id_ftp=ConectarFTP();
                        //SE CAMBIA EL DIRECTORIO DE ANEXOS
                        ftp_chdir($id_ftp,"anexos");
                        //SE CREA EL DIRECTORIO DE BD
                        if(!empty($myDB)){
                            if(ftp_mkdir($id_ftp,$myDB)){
                                // SE CAMBIA AL DIRECTOIO BD, SI SE CREA
                                ftp_chdir($id_ftp,$myDB);
                            }else{
                                //SI YA EXISTE, SE CAMBIA AL DIRECTORIO
                                ftp_chdir($id_ftp,$myDB);
                            }
                        }
                        if(!empty($empresa)){
                            if(ftp_mkdir($id_ftp,$empresa)){
                                // SE CAMBIA AL DIRECTOIO EMPRESA, SI SE CREA
                                ftp_chdir($id_ftp,$empresa);
                            }else{
                                //SI YA EXISTE, SE CAMBIA AL DIRECTORIO
                                ftp_chdir($id_ftp,$empresa);
                            }
                        }
                        //SI EL MODULO NO ESTA VACIO..
                        if(!empty($modulo)){
                            if(ftp_mkdir($id_ftp,$modulo)){
                                //SI SE CREA, SE CAMBIA AL DIRECTORIO
                                ftp_chdir($id_ftp,$modulo);
                            }else{
                                //SI YA EXISTE, SE CAMBIA AL DIRECTORIO
                                ftp_chdir($id_ftp,$modulo);
                            }
                        }
                        //SE CREA EL DIRECTORIO DE ANIO
                        if(ftp_mkdir($id_ftp,$ano)){
                            ftp_chdir($id_ftp,$ano);
                           //SE CREA EL DIRECTORIO DE MES
                            ftp_mkdir($id_ftp,$mes);
                            ftp_chdir($id_ftp,$mes);
                        }else{
                       //SI YA EXISTE EL ANIO; SE CREA EL DIRECTORIO DE MES

                            ftp_chdir($id_ftp,$ano);
                            if(ftp_mkdir($id_ftp,$mes)){
                                ftp_chdir($id_ftp,$mes);
                            }else{

                            //SI YA EXISTE EL MES, SE CAMBIA AL DIRECTORIO DE MES

                            ftp_chdir($id_ftp,$mes);
				            }
                        }
	                }



                    $file = $_FILES["archivo"]["tmp_name"];

                    $base_archivo = basename($_FILES["archivo"]["name"]);
                    //$upload = ftp_put($id_ftp, $base_archivo, $file, FTP_BINARY);
                    /*if (!$upload) {
                        $status = "Error al guardar: " . $base_archivo;
                    } else {
                            $status = "Exito al guardar: " . $base_archivo;
                        }*/
                    //SELECCIONAR LA BASE
                    $selected = mssql_select_db($myDB, $dbhandle)
                    or die("Couldn't open database $myDB");

                    //Directorio
                    if (!empty($base_archivo)){
                        $base_archivo=$id.$base_archivo;
                        if($modulo == 'VTAS' || $modulo == 'COMS' || $modulo == 'GAS' || $modulo == 'CXP'){
				            switch($modulo) {
                                        case "COMS":
                                                $query = "SELECT Proveedor FROM Compra WHERE ID =".$id;
                                                break;
                                        case "VTAS":
                                                $query = "SELECT Cliente FROM Venta WHERE ID =".$id;
                                                break;
                                        case "GAS":
                                                $query = "SELECT Acreedor FROM Gasto WHERE ID =".$id;
                                                break;
					                    case "CXP":
                        						$query = "SELECT Proveedor FROM Cxp WHERE ID =".$id;
                        						break;
                            }
                            $consulta = mssql_query($query);
                            $row = mssql_fetch_array($consulta);
				            $ident = ltrim(rtrim(str_replace('.', '', $row[0])));
				            if(!empty($ident)){
                                if(ftp_mkdir($id_ftp,$ident)){
                                    //SI SE CREA SE CAMBIA AL DIRECTORIO
                                    ftp_chdir($id_ftp,$ident);
                                }else{
						            //SI YA EXISTE SOLO SE CAMBIA DE DIRECTORIO
                                    ftp_chdir($id_ftp,$ident);
					            }

                            }
				            $directorio = "\\\intelisis\Anexos\Comprobantes\\".$myDB."\\".$empresa."\\".$modulo."\\".$ano."\\".$mes."\\".$ident."\\".$base_archivo;
			            }else{
				            $directorio = "\\\intelisis\Anexos\Comprobantes\\".$myDB."\\".$empresa."\\".$modulo."\\".$ano."\\".$mes."\\".$base_archivo;
			            }




                        //$query = "INSERT INTO AnexoMov(Rama,ID,Nombre,Direccion,Icono,Tipo,Usuario) VALUES('$modulo',$id,'$base_archivo','$directorio','17','Archivo','$usuario')";
                        //$result = mssql_query($query);

    			        //$file = $_FILES["archivo"]["tmp_name"];
                        //$base_archivo = basename($_FILES["archivo"]["name"]);
                        //********************************************************
                        if($_FILES['archivo']['type']== 'text/xml'){

                            move_uploaded_file($file, 'uploads/' . $_FILES['archivo']['name']);

                            $ruta = 'uploads/' . $_FILES['archivo']['name'];
                            $xml = simplexml_load_file($ruta);

                                foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor') as $emisor):
                                    $re = $emisor['rfc'];
                                    //echo "Rfc Emisor =" . $re . "<br>";
                                endforeach;

                                foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor') as $nomemisor):
                                    $nre = $nomemisor['nombre'];
                                    //echo "Rfc Emisor =" . $nre . "<br>";
                                endforeach;

                                foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Receptor') as $receptor):
                                    $rr = $receptor['rfc'];
                                    //echo "Rfc Receptor =" . $rr . "<br>";
                                endforeach;

                                foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Receptor') as $nomreceptor):
                                    $nrr = $nomreceptor['nombre'];
                                    //echo "Rfc Receptor =" . $nrr . "<br>";
                                endforeach;

                                $tt = $xml['total'];
                                //echo "Total" . $tt . "<br>";

                                $tipoComp=$xml['tipoDeComprobante'];

                                $fechaEmision = $xml['fecha'];

                                $metodoPago = $xml['metodoDePago'];

                                foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Complemento//@FechaTimbrado') as $fech):
                                    $fechaTimbrado = $fech['FechaTimbrado'];

                                endforeach;

                                foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Complemento//@UUID') as $timbre):
                                    $uuid = $timbre['UUID'];
                                    //echo "ID =" . $uuid . "<br>";
                                endforeach;

                                $cadena = "re=" . $re . "&rr=" . $rr . "&tt=" . $tt . "&id=" . $uuid;

                                $param = array(
                                    'expresionImpresa'=>$cadena
                                );

                                // echo "Error: No se puede anexar XML, el WEBSERVICE del SAT no se encuentra disponible. Por favor intente mas tarde. Codigo:";

                                function test($x)
                                {
                                    return new SoapFault("Server", "Some error message");
                                }

                                $server = new SoapServer(null, array('uri' => "https://consultaqr.facturaelectronica.sat.gob.mx/ConsultaCFDIService.svc?wsd"));
                                $server->addFunction("test");
                                $server->handle();

                                if($server){
                                     // echo "Error: No se puede anexar XML, el WEBSERVICE del SAT no se encuentra disponible. Por favor intente mas tarde. Codigo:".$server;

                                }






                                try {
                                   $client = new SoapClient("https://consultaqr.facturaelectronica.sat.gob.mx/ConsultaCFDIService.svc?wsdl");
                                } catch (Exception $e) {
                                    echo 'Excepcion capturada: ',  $e->getMessage(), "\n";
                                }

                                $valores = $client->Consulta($param);
                                $Edocfdi=   $valores->ConsultaResult->Estado;

                                // $Edocfdi = "Vigente";

                                $Resultados['re'] = $re;
                                $Resultados['nre'] = $nre;
                                $Resultados['rr'] = $rr;
                                $Resultados['nrr'] = $nrr;
                                $Resultados['tt'] = $tt;



                                $qryrr= mssql_query("SELECT dbo.fn_SalModValidaDatosXML('Receptorrfc','".utf8_decode($rr)."','".$modulo."',".$id.")");
                                $qryre= mssql_query("SELECT dbo.fn_SalModValidaDatosXML('Emisorrfc','".utf8_decode($re)."','".$modulo."',".$id.")");
                                $qrymp= mssql_query("SELECT dbo.fn_SalModValidaDatosXML('metodoDePago','".rtrim(utf8_decode($metodoPago))."','".$modulo."',".$id.")");

                                 $rrresult = mssql_fetch_array($qryrr);
                                 $reresult = mssql_fetch_array($qryre);
                                 $mpresult = mssql_fetch_array($qrymp);





                            if($Edocfdi=='Vigente'&& $rrresult[0]==1 && $reresult[0]==1 && $mpresult[0]==1){
                        //********************************************************

                                constructor($re, $nre, $rr, $nrr, $uuid, $fechaEmision, $fechaTimbrado, $metodoPago, $tt, $tipoComp, $Edocfdi, $rrresult[0], $reresult[0], $mpresult[0]);
                                //echo 'XML Valido<br>';
                                //echo 'idftp=>'.$id_ftp.'base_archivo=>'.$base_archivo.'file=>'.$file;

                                $upload = ftp_put($id_ftp, $base_archivo, $ruta, FTP_BINARY);
                                if (!$upload) {

                                    $status = "Error al guardar: " . $base_archivo;
                                }else{


            					        //$query = "INSERT INTO AnexoMov(Rama,ID,Nombre,Direccion,Icono,Tipo,Usuario) VALUES('$modulo',$id,'$base_archivo','$directorio','745','Archivo','$usuario')";

                                    $query="spSalInsertaArchivo '$modulo',$id,'$base_archivo','$directorio','$usuario'";

                                    //$qry="spSalBitacoraXML '$modulo',$id,'$usuario','$base_archivo',NULL";

                                    //$exec=mssql_query($qry);

            	                    $result = mssql_query($query);
                                    $results = mssql_fetch_array($result);
                                    if($results[0]==0){
                                        $status = "Exito al guardar: " . $base_archivo;
                                    }else{
                                        $status = "Error al guardar: " . $results[1];
                                    }

                                }
                            }else{
                                constructor($re, $nre, $rr, $nrr, $uuid, $fechaEmision, $fechaTimbrado, $metodoPago, $tt, $tipoComp, $Edocfdi, $rrresult[0], $reresult[0], $mpresult[0]);

                                $status = "Error al guardar: " . $base_archivo. ". El XML no cumple con todas las condiciones.";

                                $qry="spSalBitacoraXML '$modulo',$id,'$usuario','$base_archivo','Campo Error ";

                                if($Edocfdi!='Vigente'){
                                    $qry=$qry." ".$Edocfdi;
                                }
                                if($rrresult[0]==0){
                                    $qry=$qry." RFCReceptor ".$rr;
                                }
                                if($reresult[0]==0){
                                    $qry=$qry." RFCEmisor ".$re;;
                                }
                                if($mpresult[0]==0){
                                    $qry=$qry." MetodoPago ".$metodoPago;
                                }

                                $qry=$qry."'";

                                $exec=mssql_query(utf8_decode($qry));

                            }//End of Vigente
                        }else{//End of type
                                $upload = ftp_put($id_ftp, $base_archivo, $file, FTP_BINARY);
                                if (!$upload) {

                                    $status = "Error al guardar: " . $base_archivo;
                                }else{

                                     //$query = "INSERT INTO AnexoMov(Rama,ID,Nombre,Direccion,Icono,Tipo,Usuario) VALUES('$modulo',$id,'$base_archivo','$directorio','17','Archivo','$usuario')";
                                    $query="spSalInsertaArchivo '$modulo',$id,'$base_archivo','$directorio','$usuario'";

                                    $result = mssql_query($query);
                                    $status = "Exito al guardar: " . $base_archivo;
                                }

                        }
			        }
                    unset($_FILES["archivo"]);
                    ftp_quit($id_ftp);
                    mssql_close($dbhandle);
                    echo '<table class="results">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th>'.$status.'</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '</table>';

                    //echo "<script languaje='javascript' type='text/javascript'>window.close();</script>";

                    ?>
                      <strong><font color="#000000" size="3">Subir Archivo</font></strong></font></p>
                     <hr />

                    <!--Formulario para elejir el archivo a subir -->
                    <table align="center">
                        <tr>
                            <td>
                             <form action="" method="post" name="form_ftp" id="form_ftp" enctype="multipart/form-data">
                             <p><font size="2" face="Verdana, Tahoma, Arial"> Elegir archivo :
                            <input name="archivo" type="file" id="archivo" />
                             <input name="Submit" type="submit" value="Subir Archivo" />
                             </font><font size="2" face="Verdana, Tahoma, Arial"> </font> </p>
                             </form>
                            </td>
                        </tr>
                     </table>
                 </td>
              </tr>
          </table>
	 </td>
 	</tr>
 </table>
 </body>
 </html>
