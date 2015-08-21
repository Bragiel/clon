<div class="row"><label class="label_container">Movimiento: </label><div style="width:180px;" class="data_container">&nbsp<?php echo $data['Mov']; ?></div><div style="width:70px;" class="data_container">&nbsp<?php echo $data['MovID']; ?></div><label class="label_container">Proyecto: </label><div style="width:120px;" class="data_container">&nbsp<?php echo $data['Proyecto']; ?></div><div style="width:40px;" class="data_container">&nbsp </div><label class="label_container">Moneda:</label><div style="width:70px;" class="data_container">&nbsp <?php echo $data['Moneda']; ?></div><div style="width:40px;" class="data_container">&nbsp<?php echo $data['TipoCambio']; ?></div></div><div class="row_panel"><label class="label_container">Fecha Emisión: </label><div style="width:120px;" class="data_container">&nbsp <?php echo date('d/m/Y', strtotime($data['FechaEmision'])); ?></div><label class="label_container">Actividad: </label><div style="width:120px;" class="data_container"> &nbsp<?php echo $data['Actividad']; ?></div></div><div class="row_panel"><hr/></div><div class="row_panel"><label class="label_container">Acreedor/Resp: </label><div style="width:120px;" class="data_container">&nbsp <?php echo $data['Acreedor']; ?></div><div style="width:260px;" class="data_container">&nbsp <?php echo $data['Nombre']; ?></div><label class="label_container">Fecha Requerida: </label><div style="width:120px; text-align:center;" class="data_container">&nbsp <?php echo date('d/m/Y', strtotime($data['FechaRequerida'])); ?></div></div><div class="row_panel"><label class="label_container">Observaciones: </label><div style="width:632px;" class="data_container">&nbsp  <?php echo $data['Observaciones']; ?></div></div><div class="row_panel"><label class="label_container">Cuenta: </label><div style="width:120px;" class="data_container">&nbsp  <?php echo $data['CtaDinero']; ?></div><label class="label_container">Forma Pago: </label><div style="width:150px;" class="data_container">&nbsp  <?php echo $data['FormaPago']; ?></div></div><div class="row_panel"><label class="label_container">Clasificación: </label><div style="width:120px;" class="data_container">&nbsp  <?php echo $data['Clase']; ?></div><label class="label_container">Subclasificación: </label><div style="width:150px;" class="data_container">&nbsp  <?php echo $data['SubClase']; ?></div></div><div class="row_panel"><label class="label_container">Condición: </label><div style="width:120px;" class="data_container">&nbsp  <?php echo $data['Condicion']; ?></div><label class="label_container">Vencimiento: </label><div style="width:150px; text-align:center;" class="data_container">&nbsp  <?php echo date('d/m/Y', strtotime($data['Vencimiento'])); ?></div></div><div class="row_panel"><hr/></div><div class="row_panel"><label class="label_container">Saldo: </label><div style="width:190px;" class="data_container num">&nbsp<?php echo '$'.number_format($data['Saldo'],2); ?></div></div><div id="control_panel_results_din" style="height:170px;"><div id="titles_row" style="width:1600px;"><div>Concepto</div><div>Referencia</div><div>Cantidad                    </div><div>Precio                    </div><div>Importe                </div><div>% Deducible                  </div><div>% IVA                  </div><div>IVA               </div><div>Retencion IVA            </div><div>Total            </div><div>Centro de Costos         </div></div><?php foreach($details as $key => $value){ ?><div style="width:1600px;" class="content_row"><div>&nbsp<?php echo $value['Concepto']; ?></div><div>&nbsp<?php echo $value['Referencia']; ?></div><div>&nbsp<?php echo $value['Cantidad']; ?></div><div>&nbsp<?php echo '$ '.number_format($value['Precio'], 2); ?></div><div class="num">&nbsp<?php echo '$ '.number_format($value['Importe'], 2); ?></div><div>&nbsp<?php echo $value['PorcentajeDeducible']; ?></div><div>&nbsp<?php echo $value['PorcentajeImpuestos']; ?></div><div class="num">&nbsp<?php echo '$ '.number_format($value['Impuestos'], 2); ?></div><div class="num">&nbsp<?php echo '$ '.number_format($value['RetencionG2'], 2); ?></div><div class="num">&nbsp<?php echo '$ '.number_format($value['Cantidad']*$value['Precio']+$value['Impuestos']-$value['RetencionG2'], 2); ?><?php $total_import = $total_import + $value['Cantidad']*$value['Precio']+$value['Impuestos']-$value['RetencionG2']; ?></div><div>&nbsp<?php echo $value['ContUso']; ?></div></div><?php } ?></div><div style="float:right;" class="row_panel"><label class="label_container">Importe Total:</label><div style="width:130px;" class="data_container"> &nbsp <?php echo '$ '.number_format($total_import, 2); ?></div></div><div style="margin-top:40px;" class="row_panel"><a href="javascript: self.close()"><input id="back_btn" type="button" value="cerrar"/></a></div>