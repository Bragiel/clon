<div class="row"><label class="label_container">Movimiento: </label><div style="width:180px;" class="data_container">&nbsp<?php echo $data['Mov']; ?></div><div style="width:70px;" class="data_container">&nbsp<?php echo $data['MovID']; ?></div><label class="label_container">Proyecto: </label><div style="width:120px;" class="data_container">&nbsp<?php echo $data['Proyecto']; ?></div><label class="label_container">Moneda:</label><div style="width:70px;" class="data_container">&nbsp <?php echo $data['Moneda']; ?></div><div style="width:40px;" class="data_container">&nbsp<?php echo $data['TipoCambio']; ?></div></div><div class="row_panel"><label class="label_container">Fecha Emisión: </label><div style="width:120px;" class="data_container">&nbsp <?php echo date('d/m/Y', strtotime($data['FechaEmision'])); ?></div></div><div class="row_panel"><hr/></div><div class="row_panel"><label class="label_container">Proveedor: </label><div style="width:120px;" class="data_container">&nbsp<?php echo $data['Proveedor']; ?></div><div style="width:320px;" class="data_container">&nbsp<?php echo utf8_encode($data['Nombre']); ?></div></div><div class="row_panel"><label class="label_container">Importe: </label><div style="width:120px;" class="data_container">&nbsp<?php echo '$ '.number_format($value['Importe'], 2); ?></div><div style="width:120px; float:right;" class="data_container">&nbsp<?php echo '$ '.number_format($value['Saldo'], 2); ?></div><div style="width:120px; float:right;" class="data_container">&nbsp<?php echo '$ '.number_format($value['Impuestos'], 2); ?></div><label style="float:right;" class="label_container">Impuestos: </label></div><div class="row_panel"><label class="label_container">Concepto: </label><div style="width:300px;" class="data_container">&nbsp<?php echo $value['Concepto']; ?></div><div style="width:120px; float:right;" class="data_container">&nbsp<?php echo '$ '.number_format($value['Retencion2'], 2); ?></div></div><div class="row_panel"><label class="label_container">Referencia: </label><div style="width:120px;" class="data_container">&nbsp<?php echo $data['Referencia']; ?></div><label class="label_container">Condicion Pago: </label><div style="width:120px;" class="data_container">&nbsp<?php echo $data['Condicion']; ?></div><label class="label_container">Vencimiento: </label><div style="width:120px;" class="data_container">&nbsp <?php echo date('d/m/Y', strtotime($data['Vencimiento'])); ?></div></div><div class="row_panel"><label class="label_container">Observaciones: </label><div style="width:300px;" class="data_container">&nbsp<?php echo $data['Observaciones']; ?></div><div style="width:120px; float:right;" class="data_container">&nbsp<?php echo '$ '.number_format($value['Retencion2'], 2); ?></div></div><div class="row_panel"><label class="label_container">Saldo Proveedor: </label><div style="width:120px;" class="data_container">&nbsp<?php echo $data['ProveedorMoneda']; ?></div><div style="width:120px;" class="data_container">&nbsp<?php echo $data['ProveedorTipoCambio']; ?></div><div style="width:120px;" class="data_container">&nbsp<?php echo '$ '.number_format($value['SaldoPendiente'], 2); ?></div></div><div style="margin-top:40px;" class="row_panel"><a href="javascript: self.close()"><input id="back_btn" type="button" value="cerrar"/></a></div>