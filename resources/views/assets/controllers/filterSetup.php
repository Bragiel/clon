<?php
    function introFilter($module, $filters){
        switch ($module) {
            case 'GAS':
                $filter =  "SELECT TOP 200 Gasto.ID,
				  Gasto.Empresa,
				  Gasto.Mov,
				  Gasto.MovID,
				  Gasto.FechaEmision,
				  Gasto.UltimoCambio,
				  Gasto.Acreedor,
				  Gasto.Moneda,
				  Gasto.Proyecto,
				  Gasto.Usuario,
				  Gasto.Observaciones,
				  Gasto.Clase,
				  Gasto.SubClase,
				  Gasto.Estatus,
				  Gasto.Situacion,
				  Gasto.SituacionFecha,
				  Gasto.SituacionUsuario,
				  Gasto.SituacionNota,
				  Gasto.Periodicidad,
				  Gasto.Condicion,
				  Gasto.Vencimiento,
				  Gasto.CtaDinero,
				  Gasto.Importe,
				  Gasto.Retencion,
				  Gasto.Impuestos,
				  Gasto.Saldo,
				  Gasto.Origen,
				  Gasto.OrigenID,
				  Gasto.Poliza,
				  Gasto.PolizaID,
				  Gasto.GenerarPoliza,
				  Gasto.ContID,
				  Gasto.FechaRegistro,
				  Gasto.FechaConclusion,
				  Gasto.FechaCancelacion,
				  Gasto.FechaRequerida,
				  Gasto.AnexoModulo,
				  Gasto.AnexoID,
				  Gasto.ProdSerieLote,
				  Gasto.Sucursal,
				  Gasto.SucursalDestino,
				  Gasto.Mensaje,
				  Gasto.Actividad,
				  Gasto.UEN,
				  Gasto.Prioridad,
				  Gasto.SubModulo,
				  MovTipo.SubClave,
				  Prov.Proveedor,
				  Prov.Nombre,
				  MensajeLista.Mensaje,
				  MensajeLista.Descripcion,
				  MensajeLista.Tipo FROM
				  Gasto
				  LEFT OUTER JOIN MovTipo ON 'GAS'=MovTipo.Modulo AND Gasto.Mov=MovTipo.Mov
				  JOIN Prov ON Gasto.Acreedor=Prov.Proveedor
				  LEFT OUTER JOIN MensajeLista ON Gasto.Mensaje=MensajeLista.Mensaje
				 WHERE Gasto.Empresa = 'ROCHE' AND Gasto.Mov IN (".$filters.") AND (Gasto.Estatus = 'PENDIENTE' OR Gasto.Estatus = 'SINAFECTAR' OR Gasto.Estatus = 'CONFIRMAR' OR Gasto.Estatus = 'BORRADOR' OR Gasto.Estatus = 'SINCRO' OR Gasto.Estatus = 'ALTAPRIORIDAD' OR Gasto.Estatus = 'PRIORIDADBAJA' OR Gasto.Estatus = 'AUTORIZADO' OR Gasto.Estatus = 'AUTORIZAR') AND Gasto.Sucursal = 3 AND Gasto.SubModulo='GAS' ORDER BY Gasto.ID DESC ";
            break;

			case 'COMS':
				$filter = "SELECT TOP 200 Compra.ID,
					  Compra.Empresa,
					  Compra.Mov,
					  Compra.MovID,
					  Compra.FechaEmision,
					  Compra.UltimoCambio,
					  Compra.Concepto,
					  Compra.Proyecto,
					  Compra.Moneda,
					  Compra.Usuario,
					  Compra.Referencia,
					  Compra.Estatus,
					  Compra.Situacion,
					  Compra.SituacionFecha,
					  Compra.SituacionUsuario,
					  Compra.Prioridad,
					  Compra.Proveedor,
					  Compra.FechaEntrega,
					  Compra.FechaRequerida,
					  Compra.Agente,
					  Compra.DescuentoGlobal,
					  Compra.Importe,
					  Compra.Impuestos,
					  Compra.Saldo,
					  Compra.Poliza,
					  Compra.PolizaID,
					  Compra.GenerarPoliza,
					  Compra.ContID,
					  Compra.FechaRegistro,
					  Compra.FechaConclusion,
					  Compra.FechaCancelacion,
					  Compra.Atencion,
					  Compra.Causa,
					  Compra.Sucursal,
					  Compra.SucursalDestino,
					  Compra.UEN,
					  Compra.Mensaje,
					  Compra.LineaCredito,
					  Compra.TipoAmortizacion,
					  Compra.TipoTasa,
					  Compra.Comisiones,
					  Compra.ComisionesIVA,
					  Compra.OperacionRelevante,
					  Compra.VIN,
					  Compra.SubModulo,
					  Compra.Actividad,
					  Compra.FechaProveedor,
					  Prov.Proveedor,
					  Prov.Nombre,
					  MensajeLista.Mensaje,
					  MensajeLista.Descripcion,
					  MensajeLista.Tipo,
					compra.instruccion FROM
					  Compra
					  LEFT OUTER JOIN Prov ON Compra.Proveedor=Prov.Proveedor
					  LEFT OUTER JOIN MensajeLista ON Compra.Mensaje=MensajeLista.Mensaje
					 WHERE Compra.Empresa = 'ROCHE' AND Compra.Mov IN (".$filters.") AND (Compra.Estatus = 'PENDIENTE' OR Compra.Estatus = 'SINAFECTAR' OR Compra.Estatus = 'CONFIRMAR' OR Compra.Estatus = 'BORRADOR' OR Compra.Estatus = 'SINCRO' OR Compra.Estatus = 'ALTAPRIORIDAD' OR Compra.Estatus = 'PRIORIDADBAJA' OR Compra.Estatus = 'AUTORIZADO' OR Compra.Estatus = 'AUTORIZAR') AND Compra.Usuario = 'GVILLANUEV' AND Compra.Sucursal = 3 AND 1=1

					 AND Compra.Moneda = 'Pesos' ORDER BY Compra.ID DESC ";
			break;

			case 'DIN':
				$filter =  "SELECT TOP 200 Dinero.ID,
						  Dinero.Empresa,
						  Dinero.Mov,
						  Dinero.MovID,
						  Dinero.FechaEmision,
						  Dinero.UltimoCambio,
						  Dinero.Concepto,
						  Dinero.Proyecto,
						  Dinero.Moneda,
						  Dinero.TipoCambio,
						  Dinero.Referencia,
						  Dinero.Usuario,
						  Dinero.Estatus,
						  Dinero.Situacion,
						  Dinero.SituacionFecha,
						  Dinero.SituacionUsuario,
						  Dinero.SituacionNota,
						  Dinero.BeneficiarioNombre,
						  Dinero.CtaDinero,
						  Dinero.CtaDineroDestino,
						  Dinero.Importe,
						  Dinero.Impuestos,
						  Dinero.Comisiones,
						  Dinero.Saldo,
						  Dinero.FechaProgramada,
						  Dinero.Poliza,
						  Dinero.PolizaID,
						  Dinero.GenerarPoliza,
						  Dinero.ContID,
						  Dinero.OrigenTipo,
						  Dinero.Origen,
						  Dinero.OrigenID,
						  Dinero.FechaRegistro,
						  Dinero.FechaConclusion,
						  Dinero.FechaCancelacion,
						  Dinero.InstitucionMensaje,
						  Dinero.InstitucionSucursal,
						  Dinero.InstitucionReferencia1,
						  Dinero.InstitucionReferencia2,
						  Dinero.Sucursal,
						  Dinero.SucursalDestino,
						  Dinero.Mensaje,
						  Dinero.UEN,
						  Dinero.Contacto,
						  Dinero.ContactoTipo,
						  Dinero.Prioridad,
						  MovTipo.DiasVencimiento,
						  CtaDinero.CtaDinero,
						  CtaDinero.Rama,
						  CtaDinero.Descripcion,
						  CtaDinero.Tipo,
						  CtaDinero.Uso,
						  CtaDinero.NumeroCta,
						  CtaDinero.BancoSucursal,
						  CtaDinero.CuentaHabiente,
						  CtaDinero.Moneda,
						  CtaDinero.Categoria,
						  CtaDinero.Grupo,
						  CtaDinero.Familia,
						  MensajeLista.Mensaje,
						  MensajeLista.Descripcion,
						  MensajeLista.Tipo,
						DINERO.observaciones FROM
						  Dinero
						  JOIN MovTipo ON 'DIN'=MovTipo.Modulo AND Dinero.Mov=MovTipo.Mov
						  LEFT OUTER JOIN CtaDinero ON Dinero.CtaDinero=CtaDinero.CtaDinero
						  LEFT OUTER JOIN MensajeLista ON Dinero.Mensaje=MensajeLista.Mensaje WHERE ((3=0) or ((3>0) and (ctadinero.sucursal=3)) or (dinero.usuario='GVILLANUEV')) AND (Dinero.Empresa = 'ROCHE' AND Dinero.Mov IN (".$filters.") AND (Dinero.Estatus = 'PENDIENTE' OR Dinero.Estatus = 'SINAFECTAR' OR Dinero.Estatus = 'CONFIRMAR' OR Dinero.Estatus = 'BORRADOR' OR Dinero.Estatus = 'SINCRO' OR Dinero.Estatus = 'ALTAPRIORIDAD' OR Dinero.Estatus = 'PRIORIDADBAJA' OR Dinero.Estatus = 'AUTORIZADO' OR Dinero.Estatus = 'AUTORIZAR') ) ORDER BY Dinero.ID DESC ";
			break;

			case 'CXP':
				$filter = "SELECT TOP 200 Cxp.ID,
						  Cxp.Empresa,
						  Cxp.Mov,
						  Cxp.MovID,
						  Cxp.FechaEmision,
						  Cxp.UltimoCambio,
						  Cxp.Concepto,
						  Cxp.Proyecto,
						  Cxp.Moneda,
						  Cxp.Usuario,
						  Cxp.Referencia,
						  Cxp.Estatus,
						  Cxp.Situacion,
						  Cxp.SituacionFecha,
						  Cxp.SituacionUsuario,
						  Cxp.SituacionNota,
						  Cxp.Proveedor,
						  Cxp.ProveedorMoneda,
						  Cxp.Condicion,
						  Cxp.Vencimiento,
						  Cxp.Importe,
						  Cxp.Impuestos,
						  Cxp.Saldo,
						  Cxp.Poliza,
						  Cxp.PolizaID,
						  Cxp.GenerarPoliza,
						  Cxp.ContID,
						  Cxp.FechaRegistro,
						  Cxp.FechaConclusion,
						  Cxp.FechaCancelacion,
						  Cxp.Dinero,
						  Cxp.DineroID,
						  Cxp.DineroCtaDinero,
						  Cxp.Sucursal,
						  Cxp.SucursalDestino,
						  Cxp.Mensaje,
						  Cxp.UEN,
						  Cxp.Retencion,
						  Cxp.Retencion2,
						  Cxp.Retencion3,
						  Cxp.ProveedorAutoEndoso,
						  Cxp.FechaProgramada,
						  Cxp.TasaDiaria,
						  Cxp.LineaCredito,
						  Cxp.TipoAmortizacion,
						  Cxp.TipoTasa,
						  Cxp.Amortizaciones,
						  Cxp.InteresesOrdinarios,
						  Cxp.InteresesMoratorios,
						  Cxp.InteresesFijos,
						  Cxp.InteresesAnticipados,
						  Cxp.Comisiones,
						  Cxp.ComisionesIVA,
						  Cxp.VIN,
						  Cxp.OperacionRelevante,
						  Cxp.ContUso,
						  Prov.Proveedor,
						  Prov.Nombre,
						  Prov.NombreCorto,
						  Prov.Estatus,
						  Prov.Situacion,
						  Prov.SituacionFecha,
						  MensajeLista.Mensaje,
						  MensajeLista.Descripcion,
						  MensajeLista.Tipo,
						cxp.observaciones FROM
						  Cxp
						  JOIN Prov ON Cxp.Proveedor=Prov.Proveedor
						  LEFT OUTER JOIN MensajeLista ON Cxp.Mensaje=MensajeLista.Mensaje
						 WHERE Cxp.Empresa = 'ROCHE' AND Cxp.Mov IN (".$filters.") AND (Cxp.Estatus = 'PENDIENTE' OR Cxp.Estatus = 'SINAFECTAR' OR Cxp.Estatus = 'CONFIRMAR' OR Cxp.Estatus = 'BORRADOR' OR Cxp.Estatus = 'SINCRO' OR Cxp.Estatus = 'ALTAPRIORIDAD' OR Cxp.Estatus = 'PRIORIDADBAJA' OR Cxp.Estatus = 'AUTORIZADO' OR Cxp.Estatus = 'AUTORIZAR') AND Cxp.Sucursal = 3 AND 1=1

						 AND Cxp.Moneda = 'Pesos' ORDER BY Cxp.ID DESC ";
			break;
        }



        return $filter;
    }

    function tableConstructor($module, $documents){
        switch ($module) {
            case 'GAS':
                $filter_results .=	'<div id="titles_row" style="width:1180px">';
                        $filter_results .=	'<div>Movimiento</div>';
                        $filter_results .=	'<div>Proveedor</div>';
                        $filter_results .=	'<div>Nombre</div>';
                        $filter_results .=	'<div>Fecha Emisión</div>';
                        $filter_results .=	'<div>Vencimiento</div>';
                        $filter_results .=	'<div>Importe</div>';
                        $filter_results .=	'<div>Saldo Total</div>';
                        $filter_results .=	'<div>Impuestos</div>';
                $filter_results .=	'</div>';
                foreach ($documents as $key => $value){
                    $filter_results .=	'<div class="content_row" style="width:1180px">';
                                $filter_results .=	'<div data-id="'.$value['ID'].'"><a href="details.php?module=GAS&id='.$value['ID'].'" target="_blank">'.$value['Mov'].' '.$value['MovID'].'</a></div>';
                                $filter_results .=	'<div>&nbsp'.utf8_encode($value['Acreedor']).'</div>';
                                $filter_results .=	'<div>&nbsp'.utf8_encode($value['Nombre']).'</div>';
                                $filter_results .=	'<div>&nbsp'.utf8_encode($value['FechaEmision']).'</div>';
                                $filter_results .=	'<div>&nbsp'.utf8_encode($value['Vencimiento']).'</div>';
                                $filter_results .=	'<div class="num"> $'.number_format($value['Importe'], 2).'</div>';
                                $filter_results .=	'<div class="num"> $'.number_format($value['Saldo'], 2).'</div>';
                                $filter_results .=	'<div class="num"> $'.number_format($value['Impuestos'], 2).'</div>';
                    $filter_results .=	'</div>';
                }
            break;

            case 'COMS':
                $filter_results .=	'<div id="titles_row" style="width:1040px">';
                        $filter_results .=	'<div>Movimiento</div>';
                        $filter_results .=	'<div>Proveedor</div>';
                        $filter_results .=	'<div>Nombre</div>';
                        $filter_results .=	'<div>Referencia</div>';
                        $filter_results .=	'<div>Fecha Emisión</div>';
                        $filter_results .=	'<div>Fecha Requerida</div>';
                        $filter_results .=	'<div>Importe Total</div>';
                $filter_results .=	'</div>';
                foreach ($documents as $key => $value){
                    $filter_results .=	'<div class="content_row" style="width:1040px">';
                                $filter_results .=	'<div data-id="'.$value['ID'].'" data-id="'.$value.'"><a href="details.php?module=COMS&id='.$value['ID'].'" target="_blank">'.$value['Mov'].' '.$value['MovID'].'</a></div>';
                                $filter_results .=	'<div>&nbsp&nbsp'.utf8_encode($value['Acreedor']).'</div>';
                                $filter_results .=	'<div>&nbsp&nbsp'.utf8_encode($value['Nombre']).'</div>';
                                $filter_results .=	'<div>&nbsp&nbsp'.utf8_encode($value['Referencia']).'</div>';
                                $filter_results .=	'<div>&nbsp&nbsp'.utf8_encode($value['FechaEmision']).'</div>';
                                $filter_results .=	'<div>&nbsp&nbsp'.utf8_encode($value['FechaRequerida']).'</div>';
                                $filter_results .=	'<div class="num"> $'.number_format($value['Importe'], 2).'</div>';
                    $filter_results .=	'</div>';
                }
            break;

            case 'DIN':
                $filter_results .=	'<div id="titles_row" style="width:1320px">';
                        $filter_results .=	'<div>Movimiento</div>';
                        $filter_results .=	'<div>Cuenta</div>';
                        $filter_results .=	'<div>Cuenta Destino</div>';
                        $filter_results .=	'<div>Referencia</div>';
                        $filter_results .=	'<div>Beneficiario</div>';
                        $filter_results .=	'<div>Fecha Emisión</div>';
                        $filter_results .=	'<div>Importe Total</div>';
                        $filter_results .=	'<div>Saldo</div>';
                        $filter_results .=	'<div>Moneda</div>';
                $filter_results .=	'</div>';
                foreach ($documents as $key => $value){
                    $filter_results .=	'<div class="content_row" style="width:1320px">';
                                $filter_results .=	'<div data-id="'.$value['ID'].'">&nbsp<a href="details.php?module=DIN&id='.$value['ID'].'" target="_blank">'.$value['Mov'].' '.$value['MovID'].'</a></div>';
                                $filter_results .=	'<div>&nbsp'.utf8_encode($value['CtaDinero']).'</div>';
                                $filter_results .=	'<div>&nbsp'.utf8_encode($value['CtaDineroDestino']).'</div>';
                                $filter_results .=	'<div>&nbsp'.utf8_encode($value['Referencia']).'</div>';
                                $filter_results .=	'<div>&nbsp'.utf8_encode($value['BeneficiarioNombre']).'</div>';
                                $filter_results .=	'<div>&nbsp'.utf8_encode($value['FechaEmision']).'</div>';
                                $filter_results .=	'<div class="num"> $'.number_format($value['Importe'], 2).'</div>';
                                $filter_results .=	'<div class="num"> $'.number_format($value['Saldo'], 2).'</div>';
                                $filter_results .=	'<div>&nbsp'.utf8_encode($value['Moneda']).'</div>';
                    $filter_results .=	'</div>';
                }
            break;

            case 'CXP':
                $filter_results .=	'<div id="titles_row" style="width:1180px;">';
                        $filter_results .=	'<div>Movimiento</div>';
                        $filter_results .=	'<div>Proveedor</div>';
                        $filter_results .=	'<div>Referencia</div>';
                        $filter_results .=	'<div>Concepto</div>';
                        $filter_results .=	'<div>Fecha Emisión</div>';
                        $filter_results .=	'<div>Vencimiento</div>';
                        $filter_results .=	'<div>Importe Total</div>';
                        $filter_results .=	'<div>Saldo</div>';
                $filter_results .=	'</div>';
                foreach ($documents as $key => $value){
                    $filter_results .=	'<div class="content_row" style="width:1180px">';
                                $filter_results .=	'<div data-id="'.$value['ID'].'"><a href="details.php?module=CXP&id='.$value['ID'].'" target="_blank">'.$value['Mov'].' '.$value['MovID'].'</a></div>';
                                $filter_results .=	'<div>&nbsp'.utf8_encode($value['Proveedor']).'</div>';
                                $filter_results .=	'<div>&nbsp'.utf8_encode($value['Referencia']).'</div>';
                                $filter_results .=	'<div>&nbsp'.utf8_encode($value['Concepto']).'</div>';
                                $filter_results .=	'<div>&nbsp'.utf8_encode($value['FechaEmision']).'</div>';
                                $filter_results .=	'<div>&nbsp'.utf8_encode($value['Vencimiento']).'</div>';
                                $filter_results .=	'<div class="num"> $'.number_format($value['Importe'], 2).'</div>';
                                $filter_results .=	'<div class="num"> $'.number_format($value['Saldo'], 2).'</div>';
                    $filter_results .=	'</div>';
                }
            break;
        }

        return $filter_results;
    }

    function convertDate($date){
        switch ($date) {
			case 'Hoy':
				$datetime = new DateTime(date('d-m-Y h:i:s a', time()));
				$date1 = $datetime->format('d-m-Y');
				$start = $date1;
				$end = $date1;
			break;

			case 'Mañana':
				$datetime = new DateTime(date('d-m-Y h:i:s a', time()));
				$datetime->modify('+1 day');
				$date1 = $datetime->format('d-m-Y');
				$start = $date1;
				$end = $date1;
			break;

			case 'Ayer':
				$datetime = new DateTime(date('d-m-Y h:i:s a', time()));
				$datetime->modify('-1 day');
				$date1 = $datetime->format('d-m-Y');
				$start = $date1;
				$end = $date1;
			break;

			case 'Esta Semana':
				$day = date('w');
				$start = date('d-m-Y', strtotime('-'.$day.' days'));
				$end = date('d-m-Y', strtotime('+'.(6-$day).' days'));
			break;

			case 'Semana Pasada':

				$previous_week = strtotime("-1 week +1 day");

				$start_week = strtotime("last sunday midnight",$previous_week);
				$end_week = strtotime("next saturday",$start_week);

				$start = date("d-m-Y",$start_week);
				$end = date("d-m-Y",$end_week);

			break;

			case 'Este Mes':

				$prev_month = strtotime('this month');
				$month_range = explode("/", date('01-m-Y / t-m-Y', $prev_month));
				$start =  $month_range[0];
				$end = $month_range[1];

			break;

			case 'Mes Pasado':

				$prev_month = strtotime('previous month');
				$month_range = explode("/", date('01-m-Y / t-m-Y', $prev_month));
				$start =  $month_range[0];
				$end = $month_range[1];

			break;

			case 'Mes Móvil':

				$datetime = new DateTime(date('d-m-Y h:i:s a', time()));
				$start = $datetime->format('d-m-Y');
				$datetime->modify('+30 day');
				$end = $datetime->format('d-m-Y');

			break;

			case 'Este Año':

				$datetime = new DateTime(date('d-m-Y h:i:s a', time()));

				$start = $datetime->format('01-01-Y');
				$end =  $datetime->format('31-12-Y');

			break;

			case 'Año Pasado':

				$datetime = new DateTime(date('d-m-Y h:i:s a', time()));
				$datetime->modify('-1 year');
				$start = $datetime->format('01-01-Y');
				$end =  $datetime->format('31-12-Y');

			break;

			case 'Año Móvil':

				$datetime = new DateTime(date('d-m-Y h:i:s a', time()));
				$start = $datetime->format('d-m-Y');
				$datetime->modify('+365 day');
				$end =  $datetime->format('d-m-Y');

			break;

			case 'Enero':

				$datetime = new DateTime(date('d-m-Y h:i:s a', time()));
				$start = $datetime->format('01-01-Y');
				$end =  $datetime->format('31-01-Y');

			break;

			case 'Febrero':

				$datetime = new DateTime(date('d-m-Y h:i:s a', time()));
				$start = $datetime->format('01-02-Y');
				if(date('L')){
					$end =  $datetime->format('29-02-Y');
				}else{
					$end =  $datetime->format('28-02-Y');
				}

			break;

			case 'Marzo':

				$datetime = new DateTime(date('d-m-Y h:i:s a', time()));
				$start = $datetime->format('01-03-Y');
				$end =  $datetime->format('31-03-Y');

			break;

			case 'Abril':

				$datetime = new DateTime(date('d-m-Y h:i:s a', time()));
				$start = $datetime->format('01-04-Y');
				$end =  $datetime->format('30-04-Y');

			break;

			case 'Mayo':

				$datetime = new DateTime(date('d-m-Y h:i:s a', time()));
				$start = $datetime->format('01-05-Y');
				$end =  $datetime->format('31-05-Y');

			break;

			case 'Junio':

				$datetime = new DateTime(date('d-m-Y h:i:s a', time()));
				$start = $datetime->format('01-06-Y');
				$end =  $datetime->format('30-06-Y');

			break;

			case 'Julio':

				$datetime = new DateTime(date('d-m-Y h:i:s a', time()));
				$start = $datetime->format('01-07-Y');
				$end =  $datetime->format('31-07-Y');

			break;

			case 'Agosto':

				$datetime = new DateTime(date('d-m-Y h:i:s a', time()));
				$start = $datetime->format('01-08-Y');
				$end =  $datetime->format('31-08-Y');

			break;

			case 'Septiembre':

				$datetime = new DateTime(date('d-m-Y h:i:s a', time()));
				$start = $datetime->format('01-09-Y');
				$end =  $datetime->format('30-09-Y');

			break;

			case 'Octubre':

				$datetime = new DateTime(date('d-m-Y h:i:s a', time()));
				$start = $datetime->format('01-10-Y');
				$end =  $datetime->format('31-10-Y');

			break;

			case 'Noviembre':

				$datetime = new DateTime(date('d-m-Y h:i:s a', time()));
				$start = $datetime->format('01-11-Y');
				$end =  $datetime->format('30-11-Y');

			break;

			case 'Diciembre':

				$datetime = new DateTime(date('d-m-Y h:i:s a', time()));
				$start = $datetime->format('01-12-Y');
				$end =  $datetime->format('31-12-Y');

			break;

		}

        $response = array('start' => $start, 'end' => $end);

        return $response;
    }

    function filterSetup($search, $mov_type, $status, $user, $branch, $project, $module, $business, $date, $date_range_values){

        switch ($module) {
            case 'GAS':

                if($business!='(Todos)'){
                    $filter = "Gasto.Empresa = '".$business."'" ;
                }else{
                    $filter = '';
                }

                if($search != '%%'){
                    $filter .= " AND (Gasto.Acreedor LIKE '".$search."' OR Prov.Nombre LIKE '".$search."' OR Gasto.Movid LIKE '".$search."')" ;
                }else{
                    $filter .= '';
                }

                if($mov_type!='(Todos)'){
                    $filter .= "AND Gasto.Mov = '".$mov_type."'" ;
                }else{
                    $filter .= '';
                }

                if($status!='(Todos)'){
                    $filter .= "AND Gasto.Estatus = '".$status."'" ;
                }else{
                    $filter .= '';
                }

                if($user!='(Todos)'){
                    $filter .= "AND Gasto.Usuario = '".$user."'" ;
                }else{
                    $filter .= '';
                }

                if($branch!='(Todas)'){
                    $filter .= "AND Gasto.Sucursal = '".$branch."'" ;
                }else{
                    $filter .= '';
                }

                if($project!='(Todos)'){
                    $filter .= "AND Gasto.Proyecto = '".$project."'" ;
                }else{
                    $filter .= '';
                }

                if($module!='(Todos)'){
                    $filter .= "AND Gasto.SubModulo = '".$module."'" ;
                }else{
                    $filter .= '';
                }

                if($date!='(Todo)'){
                    $filter .= "AND (Gasto.FechaEmision >= '".$date_range_values["start"]."' AND Gasto.FechaEmision <= '".$date_range_values["end"]."')" ;
                }else{
                    $filter .= '';
                }
            break;//End case GAS

            case 'COMS':

                if($business!='(Todos)'){
                    $filter = "Compra.Empresa = '".$business."'" ;
                }else{
                    $filter = '';
                }

                if($search != '%%'){
                    $filter .= " AND (Compra.Mov LIKE '".$search."' OR Compra.MovID LIKE '".$search."' OR Compra.Proveedor LIKE '".$search."' OR Compra.Referencia LIKE '".$search."' OR Prov.Nombre LIKE '".$search."')" ;
                }else{
                    $filter .= '';
                }

                if($mov_type!='(Todos)'){
                    $filter .= "AND Compra.Mov = '".$mov_type."'" ;
                }else{
                    $filter .= '';
                }

                if($status!='(Todos)'){
                    $filter .= "AND Compra.Estatus = '".$status."'" ;
                }else{
                    $filter .= '';
                }

                if($user!='(Todos)'){
                    $filter .= "AND Compra.Usuario = '".$user."'" ;
                }else{
                    $filter .= '';
                }

                if($branch!='(Todas)'){
                    $filter .= "AND Compra.Sucursal = '".$branch."'" ;
                }else{
                    $filter .= '';
                }

                if($project!='(Todos)'){
                    $filter .= "AND Compra.Proyecto = '".$project."'" ;
                }else{
                    $filter .= '';
                }

                if($module!='(Todos)'){
                    $filter .= "AND Compra.SubModulo = '".$module."'" ;
                }else{
                    $filter .= '';
                }

                if($date!='(Todo)'){
                    $filter .= "AND (Compra.FechaEmision >= '".$date_range_values["start"]."' AND Compra.FechaEmision <= '".$date_range_values["end"]."')" ;
                }else{
                    $filter .= '';
                }

            break;//End case COMS

            case 'DIN':
                if($business!='(Todos)'){
                    $filter = "Dinero.Empresa = '".$business."'" ;
                }else{
                    $filter = '';
                }

                if($search != '%%'){
                    $filter .= " AND (Dinero.Mov LIKE '".$search."' OR Dinero.MovID LIKE '".$search."' OR Dinero.Proveedor LIKE '".$search."' OR Dinero.Referencia LIKE '".$search."' OR Dinero.BeneficiarioNombre LIKE '".$search."')" ;
                }else{
                    $filter .= '';
                }

                if($mov_type!='(Todos)'){
                    $filter .= "AND Dinero.Mov = '".$mov_type."'" ;
                }else{
                    $filter .= '';
                }

                if($status!='(Todos)'){
                    $filter .= "AND Dinero.Estatus = '".$status."'" ;
                }else{
                    $filter .= '';
                }

                if($user!='(Todos)'){
                    $filter .= "AND Dinero.Usuario = '".$user."'" ;
                }else{
                    $filter .= '';
                }

                if($branch!='(Todas)'){
                    $filter .= "AND ctadinero.Sucursal = '".$branch."'" ;
                }else{
                    $filter .= '';
                }

                if($project!='(Todos)'){
                    $filter .= "AND Dinero.Proyecto = '".$project."'" ;
                }else{
                    $filter .= '';
                }

                // if($module!='(Todos)'){
                //     $filter .= "AND Dinero.SubModulo = '".$module."'" ;
                // }else{
                //     $filter .= '';
                // }

                if($date!='(Todo)'){
                    $filter .= "AND (Dinero.FechaEmision >= '".$date_range_values["start"]."' AND Dinero.FechaEmision <= '".$date_range_values["end"]."')" ;
                }else{
                    $filter .= '';
                }

            break;//End case DIN

            case 'CXP':

                if($business!='(Todos)'){
                    $filter = "Cxp.Empresa = '".$business."'" ;
                }else{
                    $filter = '';
                }

                if($search != '%%'){
                    $filter .= " AND (Cxp.Mov LIKE '".$search."' OR Cxp.MovID LIKE '".$search."' OR Cxp.Proveedor LIKE '".$search."' OR Cxp.Referencia LIKE '".$search."' OR Cxp.BeneficiarioNombre LIKE '".$search."')" ;
                }else{
                    $filter .= '';
                }

                if($mov_type!='(Todos)'){
                    $filter .= "AND Cxp.Mov = '".$mov_type."'" ;
                }else{
                    $filter .= '';
                }

                if($status!='(Todos)'){
                    $filter .= "AND Cxp.Estatus = '".$status."'" ;
                }else{
                    $filter .= '';
                }

                if($user!='(Todos)'){
                    $filter .= "AND Cxp.Usuario = '".$user."'" ;
                }else{
                    $filter .= '';
                }

                if($branch!='(Todas)'){
                    $filter .= "AND Cxp.Sucursal = '".$branch."'" ;
                }else{
                    $filter .= '';
                }

                if($project!='(Todos)'){
                    $filter .= "AND Cxp.Proyecto = '".$project."'" ;
                }else{
                    $filter .= '';
                }

                // if($module!='(Todos)'){
                //     $filter .= "AND Cxp.SubModulo = '".$module."'" ;
                // }else{
                //     $filter .= '';
                // }

                if($date!='(Todo)'){
                    $filter .= "AND (Cxp.FechaEmision >= '".$date_range_values["start"]."' AND Cxp.FechaEmision <= '".$date_range_values["end"]."')" ;
                }else{
                    $filter .= '';
                }

            break;//End case CXP
        }//END switch



        return $filter;
    }//End function filterSetup

    function searchQry($module, $filter){

        switch ($module) {
            case 'GAS':
                $qry = "SELECT TOP 200 Gasto.ID,
                          Gasto.Empresa,
                          Gasto.Mov,
                          Gasto.MovID,
                          Gasto.FechaEmision,
                          Gasto.UltimoCambio,
                          Gasto.Acreedor,
                          Gasto.Moneda,
                          Gasto.Proyecto,
                          Gasto.Usuario,
                          Gasto.Observaciones,
                          Gasto.Clase,
                          Gasto.SubClase,
                          Gasto.Estatus,
                          Gasto.Situacion,
                          Gasto.SituacionFecha,
                          Gasto.SituacionUsuario,
                          Gasto.SituacionNota,
                          Gasto.Periodicidad,
                          Gasto.Condicion,
                          Gasto.Vencimiento,
                          Gasto.CtaDinero,
                          Gasto.Importe,
                          Gasto.Retencion,
                          Gasto.Impuestos,
                          Gasto.Saldo,
                          Gasto.Origen,
                          Gasto.OrigenID,
                          Gasto.Poliza,
                          Gasto.PolizaID,
                          Gasto.GenerarPoliza,
                          Gasto.ContID,
                          Gasto.FechaRegistro,
                          Gasto.FechaConclusion,
                          Gasto.FechaCancelacion,
                          Gasto.FechaRequerida,
                          Gasto.AnexoModulo,
                          Gasto.AnexoID,
                          Gasto.ProdSerieLote,
                          Gasto.Sucursal,
                          Gasto.SucursalDestino,
                          Gasto.Mensaje,
                          Gasto.Actividad,
                          Gasto.UEN,
                          Gasto.Prioridad,
                          Gasto.SubModulo,
                          MovTipo.SubClave,
                          Prov.Proveedor,
                          Prov.Nombre,
                          MensajeLista.Mensaje,
                          MensajeLista.Descripcion,
                          MensajeLista.Tipo FROM Gasto
                          LEFT OUTER JOIN MovTipo ON 'GAS'=MovTipo.Modulo AND Gasto.Mov=MovTipo.Mov
                          JOIN Prov ON Gasto.Acreedor=Prov.Proveedor
                          LEFT OUTER JOIN MensajeLista ON Gasto.Mensaje=MensajeLista.Mensaje
                          WHERE ".$filter." ORDER BY Gasto.ID DESC ";
            break;//End case GAS

            case 'COMS':
                $qry = "SELECT TOP 200 Compra.ID,
                      Compra.Empresa,
                      Compra.Mov,
                      Compra.MovID,
                      Compra.FechaEmision,
                      Compra.UltimoCambio,
                      Compra.Concepto,
                      Compra.Proyecto,
                      Compra.Moneda,
                      Compra.Usuario,
                      Compra.Referencia,
                      Compra.Estatus,
                      Compra.Situacion,
                      Compra.SituacionFecha,
                      Compra.SituacionUsuario,
                      Compra.Prioridad,
                      Compra.Proveedor,
                      Compra.FechaEntrega,
                      Compra.FechaRequerida,
                      Compra.Agente,
                      Compra.DescuentoGlobal,
                      Compra.Importe,
                      Compra.Impuestos,
                      Compra.Saldo,
                      Compra.Poliza,
                      Compra.PolizaID,
                      Compra.GenerarPoliza,
                      Compra.ContID,
                      Compra.FechaRegistro,
                      Compra.FechaConclusion,
                      Compra.FechaCancelacion,
                      Compra.Atencion,
                      Compra.Causa,
                      Compra.Sucursal,
                      Compra.SucursalDestino,
                      Compra.UEN,
                      Compra.Mensaje,
                      Compra.LineaCredito,
                      Compra.TipoAmortizacion,
                      Compra.TipoTasa,
                      Compra.Comisiones,
                      Compra.ComisionesIVA,
                      Compra.OperacionRelevante,
                      Compra.VIN,
                      Compra.SubModulo,
                      Compra.Actividad,
                      Compra.FechaProveedor,
                      Prov.Proveedor,
                      Prov.Nombre,
                      MensajeLista.Mensaje,
                      MensajeLista.Descripcion,
                      MensajeLista.Tipo,
                    compra.instruccion FROM Compra
                      LEFT OUTER JOIN Prov ON Compra.Proveedor=Prov.Proveedor
                      LEFT OUTER JOIN MensajeLista ON Compra.Mensaje=MensajeLista.Mensaje
                     WHERE ".$filter." ORDER BY Compra.ID DESC ";
            break;//End case COMS

            case 'DIN':
                $qry = "SELECT TOP 200 Dinero.ID,
                          Dinero.Empresa,
                          Dinero.Mov,
                          Dinero.MovID,
                          Dinero.FechaEmision,
                          Dinero.UltimoCambio,
                          Dinero.Concepto,
                          Dinero.Proyecto,
                          Dinero.Moneda,
                          Dinero.TipoCambio,
                          Dinero.Referencia,
                          Dinero.Usuario,
                          Dinero.Estatus,
                          Dinero.Situacion,
                          Dinero.SituacionFecha,
                          Dinero.SituacionUsuario,
                          Dinero.SituacionNota,
                          Dinero.BeneficiarioNombre,
                          Dinero.CtaDinero,
                          Dinero.CtaDineroDestino,
                          Dinero.Importe,
                          Dinero.Impuestos,
                          Dinero.Comisiones,
                          Dinero.Saldo,
                          Dinero.FechaProgramada,
                          Dinero.Poliza,
                          Dinero.PolizaID,
                          Dinero.GenerarPoliza,
                          Dinero.ContID,
                          Dinero.OrigenTipo,
                          Dinero.Origen,
                          Dinero.OrigenID,
                          Dinero.FechaRegistro,
                          Dinero.FechaConclusion,
                          Dinero.FechaCancelacion,
                          Dinero.InstitucionMensaje,
                          Dinero.InstitucionSucursal,
                          Dinero.InstitucionReferencia1,
                          Dinero.InstitucionReferencia2,
                          Dinero.Sucursal,
                          Dinero.SucursalDestino,
                          Dinero.Mensaje,
                          Dinero.UEN,
                          Dinero.Contacto,
                          Dinero.ContactoTipo,
                          Dinero.Prioridad,
                          MovTipo.DiasVencimiento,
                          CtaDinero.CtaDinero,
                          CtaDinero.Rama,
                          CtaDinero.Descripcion,
                          CtaDinero.Tipo,
                          CtaDinero.Uso,
                          CtaDinero.NumeroCta,
                          CtaDinero.BancoSucursal,
                          CtaDinero.CuentaHabiente,
                          CtaDinero.Moneda,
                          CtaDinero.Categoria,
                          CtaDinero.Grupo,
                          CtaDinero.Familia,
                          MensajeLista.Mensaje,
                          MensajeLista.Descripcion,
                          MensajeLista.Tipo,
                        DINERO.observaciones FROM Dinero
                          JOIN MovTipo ON 'DIN'=MovTipo.Modulo AND Dinero.Mov=MovTipo.Mov
                          LEFT OUTER JOIN CtaDinero ON Dinero.CtaDinero=CtaDinero.CtaDinero
                          LEFT OUTER JOIN MensajeLista ON Dinero.Mensaje=MensajeLista.Mensaje
                          WHERE  ".$filter." ORDER BY Dinero.ID DESC ";

            break;//END case DIN

            case 'CXP':
                $qry = " SELECT TOP 200 Cxp.ID,
                          Cxp.Empresa,
                          Cxp.Mov,
                          Cxp.MovID,
                          Cxp.FechaEmision,
                          Cxp.UltimoCambio,
                          Cxp.Concepto,
                          Cxp.Proyecto,
                          Cxp.Moneda,
                          Cxp.Usuario,
                          Cxp.Referencia,
                          Cxp.Estatus,
                          Cxp.Situacion,
                          Cxp.SituacionFecha,
                          Cxp.SituacionUsuario,
                          Cxp.SituacionNota,
                          Cxp.Proveedor,
                          Cxp.ProveedorMoneda,
                          Cxp.Condicion,
                          Cxp.Vencimiento,
                          Cxp.Importe,
                          Cxp.Impuestos,
                          Cxp.Saldo,
                          Cxp.Poliza,
                          Cxp.PolizaID,
                          Cxp.GenerarPoliza,
                          Cxp.ContID,
                          Cxp.FechaRegistro,
                          Cxp.FechaConclusion,
                          Cxp.FechaCancelacion,
                          Cxp.Dinero,
                          Cxp.DineroID,
                          Cxp.DineroCtaDinero,
                          Cxp.Sucursal,
                          Cxp.SucursalDestino,
                          Cxp.Mensaje,
                          Cxp.UEN,
                          Cxp.Retencion,
                          Cxp.Retencion2,
                          Cxp.Retencion3,
                          Cxp.ProveedorAutoEndoso,
                          Cxp.FechaProgramada,
                          Cxp.TasaDiaria,
                          Cxp.LineaCredito,
                          Cxp.TipoAmortizacion,
                          Cxp.TipoTasa,
                          Cxp.Amortizaciones,
                          Cxp.InteresesOrdinarios,
                          Cxp.InteresesMoratorios,
                          Cxp.InteresesFijos,
                          Cxp.InteresesAnticipados,
                          Cxp.Comisiones,
                          Cxp.ComisionesIVA,
                          Cxp.VIN,
                          Cxp.OperacionRelevante,
                          Cxp.ContUso,
                          Prov.Proveedor,
                          Prov.Nombre,
                          Prov.NombreCorto,
                          Prov.Estatus,
                          Prov.Situacion,
                          Prov.SituacionFecha,
                          MensajeLista.Mensaje,
                          MensajeLista.Descripcion,
                          MensajeLista.Tipo,
                          cxp.observaciones FROM Cxp
                          JOIN Prov ON Cxp.Proveedor=Prov.Proveedor
                          LEFT OUTER JOIN MensajeLista ON Cxp.Mensaje=MensajeLista.Mensaje
                          WHERE ".$filter." ORDER BY Cxp.ID DESC ";
            break;//End case CXP

        }

        return $qry;

    }//End function searchFilter


?>
