<?php
	include('../../model/solicitud/fill.php');
	$id = $_POST['id'];	
	$expediente = fill_expediente($id);
	$num_of = $expediente['solicita_noficial'];
	$alerta=$input="";

	if($num_of==1)
	{
		$alerta = "Ingresar el número oficial de la solicitud, así como el costo que tendra el uso de suelo. Se generarán los documentos automáticamente.";
		$input = '<div class="form-group">
                                <label class="col-md-12 control-label">Número oficial </label>  
                                <div class="col-md-12 inputGroupContainer">
                                    <div class="input-group col-sm-12">
                                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                        <input name="num_off" id="num_off" placeholder="Número oficial" class="col-xs-10 col-sm-10" type="number" required/>
                                    </div>
                                </div>
                            </div><br><br><br><br>';
	} else{
		$alerta = "Ingresar costo que tendra el uso de suelo. Se generará el documento automáticamente.";
		$input = '<div class="form-group">
	                    <div class="col-md-12 inputGroupContainer">
	                        <input name="num_off" id="num_off" placeholder="Número oficial" class="col-xs-10 col-sm-10" type="hidden" value="na"/>                                    
	                    </div>
                    </div>';
	}
?>

<style type="text/css">
    #giro_chosen, .chosen-container-multi .chosen-choices li.search-field, .chosen-container-multi .chosen-choices li.search-field input[type="text"]{
        width: 100% !important;
    }
</style>


<div id="modal_rec" class="modal" tabindex="-1" style="overflow-y:auto;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h1 class="blue">Datos adicionales solicitud <?=$expediente['folio'];?></h1>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="alert alert-block alert-warning">
						<button type="button" class="close" data-dismiss="alert">
							<i class="ace-icon fa fa-times"></i>
						</button>
						<i class="ace-icon fa fa-info-circle yellow"></i>
						<?= $alerta;?>
					</div>
					<div class="col-xs-2">
					</div>
					<div class="col-xs-8">
						<form id="form_gen_re" name="form_gen_re">
                            <?= $input;?>                            
                       		<div class="form-group">
                                <label class="col-md-12 control-label">Costo uso de suelo </label>  
                                <div class="col-md-12 inputGroupContainer">
                                    <div class="input-group col-sm-12">
                                        <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                                        <input name="costo" id="costo" placeholder="Costo uso de suelo" class="col-xs-10 col-sm-10" type="number" required/>
                                    </div>
                                </div>
                            </div>
                       		<br><br><br><br>

						</form>
					</div>
				</div>
			</div>	

			<div class="modal-footer">
				<button type="button" class="btn pull-left" data-dismiss="modal" onclick="show_hide_modals()"><i class="fa fa-times">&nbsp;</i>Cancelar</button>
				<button type="button" class="btn btn-primary" onclick="actualiza_status(<?=$id;?>,1,document.getElementById('num_off').value,document.getElementById('costo').value)"><i class="fa fa-money">&nbsp;</i>Generar orden de pago</button>
			</div>

		</div>	
	</div>
</div>


