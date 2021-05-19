<?php
	include('../../model/suplente/fill.php');
	include('../../controller/funciones.php');
	$suplente = fill_suplente();
	echo $suplente['id_usuario'];
	user_login();
	/*$propietarios = propietarios();
	$tr_propietarios = fill_propietarios($propietarios);
	$modal_editar_propietario = fill_modal_propietario($propietarios);
	$modal_info_propietario = fill_modal_info($propietarios);*/
	$pantalla = $_GET['pantalla'];
?>


<style type="text/css">

	@media only screen and (max-width: 520px){
		i + span{
			display: none;
		}
	}

</style>
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
	<ul class="breadcrumb">
		<li>
			<i class="ace-icon fa fa-home home-icon"></i>
			<a href="inicio.php">Inicio</a>
		</li>
		<li>
			<a href="#">Secretario</a>
		</li>
		<li class="active">Listado de solicitudes del Secretario</li>
	</ul><!-- /.breadcrumb -->
</div>

<div class="page-content">
	<div class="page-header">
		<h1>
			Secretario
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Listado de solicitudes del Secretario
			</small>
		</h1>
	</div><!-- /.page-header -->
	<div class="row">
		<div class="col-xs-12">
			<div class="container" style="width: 100%;">
				<div class="message-container">
					<div id="id-message-list-navbar" class="message-navbar clearfix">
						<div class="">
							<div class="message-infobar clearfix" id="id-message-infobar">
								 <div style="display: inline-block; float: left;">
									<div>
										<label>
											<input id="switch_director" onchange="switch_director(this.id);" value="<?=$suplente['id_usuario'];?>" class="ace ace-switch ace-switch-6" type="checkbox" />
											<span id="span_director" class="lbl"></span>
										</label>
									</div>
								</div>

								<!-- <span style="display: block;" class="blue bigger-170"></span> -->
								<span style="display: inline-block;" class="grey bigger-140">Listado de Solicutudes</span>

								<hr style="border-width: 1px; border-color: #b3bbc9;">


								<div class="row">
									<div class="col-xs-12">
										<div class="row">
											<div class="col-xs-12">
												<div class="tabbable">
													<ul id="inbox-tabs" class="inbox-tabs nav nav-tabs padding-16 tab-size-bigger tab-space-1">

														<li class="active" onclick="fill_tabs(this)">
															<a data-toggle="tab" href="#pendientes" data-target="pendientes">
																<i class="blue ace-icon fa fa-clock-o bigger-130"></i>
																<span class="bigger-110">Pendientes</span>
															</a>
														</li>

														<li class="" onclick="fill_tabs(this)">
															<a data-toggle="tab" href="#atendidas" data-target="atendidas">
																<i class="orange ace-icon fa fa-check bigger-130"></i>
																<span class="bigger-110">Atendidas</span>
															</a>
														</li>

													</ul>

													<div class="tab-content no-border no-padding" id="tabs">
														<!--AQUI SE IMPRIMEN LAS TABS-->
													</div>

												</div>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
				<hr>
			</div>
		</div>
	</div>

	<input type="hidden" name="pantalla" id="pantalla" value="<?= $pantalla;?>">
	<div id="load_modal_info"></div>
	<div id="load_modal_upcomprobante"></div>

</div>

<script>

	var check_1 = document.getElementById("switch_director").value;

	if (check_1 == 1) {
		document.getElementById("switch_director").checked = true;
		document.getElementById("span_director").innerHTML = "&nbsp;<h4 style='display:inline'>Director Activado</h4>";
	}else{
		document.getElementById("switch_director").checked = false;
		document.getElementById("span_director").innerHTML = "&nbsp;<h4 style='display:inline'>Director Desactivado</h4>";
	}

	function switch_director(checkbox){

		var check = document.getElementById(checkbox);
		var check_id = check.id;
		var check_status = check.value;

		if (check.checked == true) {
			document.getElementById(checkbox).value = 1;
			document.getElementById("span_director").innerHTML = "&nbsp;<h4 style='display:inline'>Director Activado</h4>";
		}else{
			document.getElementById(checkbox).value = 0;
			document.getElementById("span_director").innerHTML = "&nbsp;<h4 style='display:inline'>Director Desactivado</h4>";
		}

		var parametros = {
			"id" : check_id,
			"status" : check_status
		};

		$.ajax({
			data:  parametros,
			url:   './model/sedatum/update_status_director.php',
			type:  'post',

			success:  function (data) {

				if (data==='correcto'){
					swal({
						title: "¡Correcto!",
						text: "¡El status fue cambiado!",
						icon: "success"
					});
				}

				if (data==='error'){
					swal({
						title: "¡Error!",
						text: "¡Ocurrió algo al cambiar el status!",
						icon: "error"
					});
				}
			}
		});

	}

	$(document).ready(fill_tabs());

	function fill_tabs(li)
    {
    	var id = '';
    	if (!li) {
    		id = 'pendientes';
    	}else{
	    	id = li.childNodes[1].getAttribute('href').split('#')[1];
    	}

        var xmlhttp;

        if (window.XMLHttpRequest){
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }

        else{// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange=function(){

            if (xmlhttp.readyState==4 && xmlhttp.status==200){
                //document.getElementById("loading").innerHTML = ''; // Hide the image after the response from the
                document.getElementById("tabs").innerHTML=xmlhttp.responseText;
                waitingDialog.hide();
                dynamic();
            }
        }

        var datos_modal = id;

        waitingDialog.show('Cargando Información', {dialogSize: 'sm', progressType: 'warning'})
        xmlhttp.open("POST","./view/sedatum/tabs.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send(datos_modal);
    }    
</script>

<script type="text/javascript">
	function dynamic(){
		jQuery(function($) {
			//initiate dataTables plugin
			var myTable =
			$('#dynamic-table')
			//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
			.DataTable({
				bAutoWidth: false,
				"aoColumns": [
				  { "bSortable": false },
				  null, null,null, null, null,
				  { "bSortable": false }
				],
				"aaSorting": [],


				//"bProcessing": true,
		        //"bServerSide": true,
		        //"sAjaxSource": "http://127.0.0.1/table.php"	,

				//,
				//"sScrollY": "200px",
				//"bPaginate": false,

				//"sScrollX": "100%",
				//"sScrollXInner": "120%",
				//"bScrollCollapse": true,
				//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
				//you may want to wrap the table inside a "div.dataTables_borderWrap" element

				//"iDisplayLength": 50


				select: {
					// style: 'multi'
				}
		    });

			$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

			new $.fn.dataTable.Buttons( myTable, {
				buttons: [
				  {
					"extend": "colvis",
					"text": "<i class='fa fa-search bigger-110 blue'></i> <span>Columnas</span>",
					"className": "btn btn-white btn-primary btn-bold",
					columns: ':not(:first):not(:last)'
				  },
				  {
					"extend": "copy",
					"text": "<i class='fa fa-copy bigger-110 pink'></i> <span>Copiar</span>",
					"className": "btn btn-white btn-primary btn-bold"
				  },
				  {
					"extend": "csv",
					"text": "<i class='fa fa-table bigger-110 orange'></i> <span>Tablas</span>",
					"className": "btn btn-white btn-primary btn-bold"
				  },
				  {
					"extend": "excel",
					"text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
					"className": "btn btn-white btn-primary btn-bold"
				  },
				  {
					"extend": "pdf",
					"text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
					"className": "btn btn-white btn-primary btn-bold"
				  },
				  {
					"extend": "print",
					"text": "<i class='fa fa-print bigger-110 grey'></i> <span>Imprimir</span>",
					"className": "btn btn-white btn-primary btn-bold",
					autoPrint: false,
					message: 'This print was produced using the Print button for DataTables'
				  }
				]
			});
			myTable.buttons().container().appendTo( $('.tableTools-container'));

			//style the message box
			var defaultCopyAction = myTable.button(1).action();
			myTable.button(1).action(function (e, dt, button, config) {
				defaultCopyAction(e, dt, button, config);
				$('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
			});

			var defaultColvisAction = myTable.button(0).action();
			myTable.button(0).action(function (e, dt, button, config) {

				defaultColvisAction(e, dt, button, config);


				if($('.dt-button-collection > .dropdown-menu').length == 0) {
					$('.dt-button-collection')
					.wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
					.find('a').attr('href', '#').wrap("<li />")
				}
				$('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
			});

			setTimeout(function() {
				$($('.tableTools-container')).find('a.dt-button').each(function() {
					var div = $(this).find(' > div').first();
					if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
					else $(this).tooltip({container: 'body', title: $(this).text()});
				});
			}, 500);

			myTable.on( 'select', function ( e, dt, type, index ) {
				if ( type === 'row' ) {
					$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
				}
			});
			myTable.on( 'deselect', function ( e, dt, type, index ) {
				if ( type === 'row' ) {
					$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
				}
			});

			/////////////////////////////////
			//table checkboxes
			$('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

			//select/deselect all rows according to table header checkbox
			$('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
				var th_checked = this.checked;//checkbox inside "TH" table header

				$('#dynamic-table').find('tbody > tr').each(function(){
					var row = this;
					if(th_checked) myTable.row(row).select();
					else  myTable.row(row).deselect();
				});
			});

			//select/deselect a row when the checkbox is checked/unchecked
			$('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
				var row = $(this).closest('tr').get(0);
				if(this.checked) myTable.row(row).deselect();
				else myTable.row(row).select();
			});

			$(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
				e.stopImmediatePropagation();
				e.stopPropagation();
				e.preventDefault();
			});

			/********************************/
			//add tooltip for small view action buttons in dropdown menu
			$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});

			//tooltip placement on right or left
			function tooltip_placement(context, source) {
				var $source = $(source);
				var $parent = $source.closest('table')
				var off1 = $parent.offset();
				var w1 = $parent.width();

				var off2 = $source.offset();
				//var w2 = $source.width();

				if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
				return 'left';
			}

		});
	}
</script>