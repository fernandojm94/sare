<?php
	//include('../../model/propietarios/fill_propietarios.php');
	include('../../controller/funciones.php');
	user_login();
	/*$propietarios = propietarios();
	$tr_propietarios = fill_propietarios($propietarios);
	$modal_editar_propietario = fill_modal_propietario($propietarios);
	$modal_info_propietario = fill_modal_info($propietarios);*/
?>


<style type="text/css">
	
	@media only screen and (max-width: 520px){
		i + span{
			display: none;
		}
	}
	
</style>
<div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
	<ul class="breadcrumb">
		<li>
			<i class="ace-icon fa fa-home home-icon"></i>
			<a href="inicio.php">Inicio</a>
		</li>
		<li>
			<a href="#">SEDATUM</a>
		</li>
		<li class="active">Listado de expedientes entrantes</li>
	</ul><!-- /.breadcrumb -->	
</div>

<div class="page-content"> 
	<div class="page-header">
		
		<h1>
			SEDATUM
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Listado de expedientes entrantes
			</small>
		</h1>
	</div><!-- /.page-header -->
	<div class="row">
		<div class="col-xs-12">
			<div class="container" style="width: 100%;">

				<div id="load_modal_info"></div>

				<div class="tabbable">
												
					<ul id="inbox-tabs" class="nav nav-tabs padding-16 tab-size-bigger tab-space-1">
						
						<!-- <li class="active">
							<a data-toggle="tab" href="#bandeja_sin_pago">
								<i class="red ace-icon fa fa-money bigger-150"></i>
								<span id="ban_con">Sin orden de pago</span>
							</a>
						</li>
 -->
						<li class="active">
							<a data-toggle="tab" href="#bandeja_sin_atender">
								<i class="red ace-icon fa fa-eye-slash bigger-150"></i>
								<span id="ban_con">Sin atender</span>
							</a>
						</li>

						<li>
							<a data-toggle="tab" href="#bandeja_atendidos">
								<i class="blue ace-icon fa fa-eye bigger-150"></i>
								<span id="ban_sin">Atendidos</span>
							</a>
						</li>

						<li>
							<a data-toggle="tab" href="#bandeja_aprobados">
								<i class="green ace-icon fa fa-check-circle bigger-150"></i>
								<span id="ban_sin">Aprobados</span>
							</a>
						</li>


					</ul>

					<div class="tab-content no-border no-padding">

						<!-- <div id="bandeja_sin_pago" class="tab-pane fade in active">
						</div> -->

						<div id="bandeja_sin_atender" class="tab-pane fade fade in active">

							<div class="message-container">
								<div id="id-message-list-navbar" class="message-navbar clearfix">
									<div class="">
										<div class="message-infobar clearfix" id="id-message-infobar">
											<span style="display: block;" class="blue bigger-170"></span>
											<span style="display: inline-block;" class="grey bigger-140">Expedientes sin atender</span>

											<hr style="border-width: 1px; border-color: #b3bbc9;">

											
											<div class="clearfix">
												<div class="pull-right tableTools-container"></div>
											</div>

										</div>
									</div>
								</div>

								<div class="message-list-container">
									<div class="message-list" id="message-list">

										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">

												<thead>
													<tr>
														<th class="hidden">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>

														<th>Hora de creación</th>

														<th>
															<i class="ace-icon fa fa-building bigger-110 ico_hid"></i>
															Nombre establecimiento
														</th>

														<th class="hid_xs">
															<i class="ace-icon fa fa-map-marker bigger-110 ico_hid"></i>
															Dirección
														</th>

														<th class="hidden"></th>

														<th class="hid_xs">
															<i class="ace-icon fa fa-phone bigger-110 ico_hid"></i>
															Número de teléfono
														</th>

														<th style="min-width: 94px !important;">
															<i class="ace-icon fa fa-cogs bigger-110 ico_hid"></i>
															Acciones
														</th>
													</tr>
												</thead>

												<tbody>
													<tr>
														<td class="hidden">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</td>
														<td>10 de noviembre 2018 15:34:21</td>
														<td>Abarrotes Mi casita</td>
														<td class="hid_xs">
															Emiliano Zapata 109 Centro, Jesús María
														</td> 
														<td class="hidden"></td>
														<td class="hid_xs">449 121 12 13</td>
														<td class="center">
															<div class="btn-group">
																<a class="btn btn-xs btn-primary" onclick="fill_modal_info(1)" role="button" data-toggle="modal">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>
																</a>
																<a class="btn btn-xs btn-secondary inf_btn" href="#modal-info-1" role="button" data-toggle="modal">
																	<i class="ace-icon fa fa-info-circle bigger-130"></i>
																</a>
															</div>
														</td>
													</tr>
												</tbody>
											</table>
										</div>

									</div>
								</div>
							</div>
						</div>

						<div id="bandeja_atendidos" class="tab-pane fade">
							<div class="message-container">
								<div id="id-message-list-navbar" class="message-navbar clearfix">
									<div class="">
										<div class="message-infobar" id="id-message-infobar">
											<span style="display: block;" class="blue bigger-170"></span>
											<span style="display: inline-block;" class="grey bigger-140">Responsables</span>

											<div style="display: inline-block; float: right;">
												<a href="javascript:cambiarcont('view/responsables/nuevo.php');" class="btn btn-primary">
												<i class="ace-icon fa fa-child"></i>
												<span>Nuevo Responsable</span>
												</a>
											</div>

											<hr style="border-width: 1px; border-color: #b3bbc9;">

											<div class="pull-right tableTools-container2"></div>
										
										</div>
									</div>
								</div>

								<div>
									<table id="dynamic-table2" class="table table-striped table-bordered table-hover">

										<thead>
											<tr>
												<th class="hidden">
													<label class="pos-rel">
														<input type="checkbox" class="ace" />
														<span class="lbl"></span>
													</label>
												</th>

												<th class="hidden"></th>

												<th>
													<i class="ace-icon fa fa-user bigger-110 ico_hid"></i>
													Nombre
												</th>

												<th class="hid_xs">
													<i class="ace-icon fa fa-map-marker bigger-110 ico_hid"></i>
													Dirección
												</th>

												<th class="hid hid_xs">
													<i class="ace-icon fa fa-at bigger-110 ico_hid"></i>
													Correo
												</th>

												<th class="hid_xs">
													<i class="ace-icon fa fa-phone bigger-110 ico_hid"></i>
													Número
												</th>

												<th style="min-width: 94px !important;">
													<i class="ace-icon fa fa-cogs bigger-110 ico_hid"></i>
													Acciones
												</th>
											</tr>
										</thead>

										<tbody>
											<?php echo $tr_propietarios; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div id="bandeja_aprobados" class="tab-pane fade">
							<div class="message-container">
								<div id="id-message-list-navbar" class="message-navbar clearfix">
									<div class="">
										<div class="message-infobar" id="id-message-infobar">
											<span style="display: block;" class="blue bigger-170"></span>
											<span style="display: inline-block;" class="grey bigger-140">Expedientes aprobados</span>

											<hr style="border-width: 1px; border-color: #b3bbc9;">

											<div class="pull-right tableTools-container2"></div>
										
										</div>
									</div>
								</div>

								<div>
									<table id="dynamic-table2" class="table table-striped table-bordered table-hover">

										<thead>
											<tr>
												<th class="hidden">
													<label class="pos-rel">
														<input type="checkbox" class="ace" />
														<span class="lbl"></span>
													</label>
												</th>

												<th class="hidden"></th>

												<th>
													<i class="ace-icon fa fa-user bigger-110 ico_hid"></i>
													Nombre
												</th>

												<th class="hid_xs">
													<i class="ace-icon fa fa-map-marker bigger-110 ico_hid"></i>
													Dirección
												</th>

												<th class="hid hid_xs">
													<i class="ace-icon fa fa-at bigger-110 ico_hid"></i>
													Correo
												</th>

												<th class="hid_xs">
													<i class="ace-icon fa fa-phone bigger-110 ico_hid"></i>
													Número
												</th>

												<th style="min-width: 94px !important;">
													<i class="ace-icon fa fa-cogs bigger-110 ico_hid"></i>
													Acciones
												</th>
											</tr>
										</thead>

										<tbody>
											<?php echo $tr_propietarios; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div><!-- /.tab-content -->
				</div><!-- /.tabbable -->

				<hr>

			</div>
		</div>	
	</div>
</div>

<script>

	function fill_modal_info(id)
    {

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
                document.getElementById("load_modal_info").innerHTML=xmlhttp.responseText;
                
                waitingDialog.hide();
                $('#modal_info').modal('show');
            }
        }

        var datos_modal = id;

        waitingDialog.show('Cargando Información', {dialogSize: 'sm', progressType: 'warning'})
        xmlhttp.open("POST","./model/sedatum/modal_info.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send(datos_modal);

    }

</script>

<script type="text/javascript">
	jQuery(function($) {
		//initiate dataTables plugin
		var myTable = 
		$('#dynamic-table')
		//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
		.DataTable( {
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
				style: 'multi'
			}
	    } );
	
		
		
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
		} );
		myTable.buttons().container().appendTo( $('.tableTools-container') );
		
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
	
		////
	
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
		} );
		myTable.on( 'deselect', function ( e, dt, type, index ) {
			if ( type === 'row' ) {
				$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
			}
		} );
	
	
	
	
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
				
	})
</script>


<script type="text/javascript">
	jQuery(function($) {
		//initiate dataTables plugin
		var myTable2 = 
		$('#dynamic-table2')
		//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
		.DataTable( {
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
				style: 'multi'
			}
	    } );
	
		
		
		$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
		
		new $.fn.dataTable.Buttons( myTable2, {
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
		} );
		myTable2.buttons().container().appendTo( $('.tableTools-container2') );
		
		//style the message box
		var defaultCopyAction = myTable2.button(1).action();
		myTable2.button(1).action(function (e, dt, button, config) {
			defaultCopyAction(e, dt, button, config);
			$('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
		});
		
		
		var defaultColvisAction = myTable2.button(0).action();
		myTable2.button(0).action(function (e, dt, button, config) {
			
			defaultColvisAction(e, dt, button, config);
			
			
			if($('.dt-button-collection > .dropdown-menu').length == 0) {
				$('.dt-button-collection')
				.wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
				.find('a').attr('href', '#').wrap("<li />")
			}
			$('.dt-button-collection').appendTo('.tableTools-container2 .dt-buttons')
		});
	
		////
	
		setTimeout(function() {
			$($('.tableTools-container2')).find('a.dt-button').each(function() {
				var div = $(this).find(' > div').first();
				if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
				else $(this).tooltip({container: 'body', title: $(this).text()});
			});
		}, 500);
		
		
		
		
		
		myTable2.on( 'select', function ( e, dt, type, index ) {
			if ( type === 'row' ) {
				$( myTable2.row( index ).node() ).find('input:checkbox').prop('checked', true);
			}
		} );
		myTable2.on( 'deselect', function ( e, dt, type, index ) {
			if ( type === 'row' ) {
				$( myTable2.row( index ).node() ).find('input:checkbox').prop('checked', false);
			}
		} );
	
	
	
	
		/////////////////////////////////
		//table checkboxes
		$('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);
		
		//select/deselect all rows according to table header checkbox
		$('#dynamic-table2 > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
			var th_checked = this.checked;//checkbox inside "TH" table header
			
			$('#dynamic-table2').find('tbody > tr').each(function(){
				var row = this;
				if(th_checked) myTable2.row(row).select();
				else  myTable2.row(row).deselect();
			});
		});
		
		//select/deselect a row when the checkbox is checked/unchecked
		$('#dynamic-table2').on('click', 'td input[type=checkbox]' , function(){
			var row = $(this).closest('tr').get(0);
			if(this.checked) myTable2.row(row).deselect();
			else myTable2.row(row).select();
		});
	
	
	
		$(document).on('click', '#dynamic-table2 .dropdown-toggle', function(e) {
			e.stopImmediatePropagation();
			e.stopPropagation();
			e.preventDefault();
		});
	})
</script>



<script type="text/javascript">
	$( document ).ready(function() {
		var screen = $( window ).width();
		if (screen < 916) {
			$('#dynamic-table_info, #dynamic-table_paginate').parent().removeClass('col-xs-6').addClass('col-xs-12'); 	
		}
		
		else{
			$('#dynamic-table_info, #dynamic-table_paginate').parent().removeClass('col-xs-12').addClass('col-xs-6');
		}
		
	});


	$( window ).resize(function() {
		var screen = $( window ).width();
		if (screen < 916) {
			$('#dynamic-table_info, #dynamic-table_paginate').parent().removeClass('col-xs-6').addClass('col-xs-12'); 	
		 }

		else{
			$('#dynamic-table_info, #dynamic-table_paginate').parent().removeClass('col-xs-12').addClass('col-xs-6');
		}

	});
</script>