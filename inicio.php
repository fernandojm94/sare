<?php
	include('controller/funciones.php');
	include('model/inicio/fill.php');
	$tipo_usuario = $_SESSION['id_tipo_usuario'];
	$menu = fill_menu($tipo_usuario);	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"  />
		<meta charset="utf-8" />
		<title>Sistema de Apertura Rápida de Empresas- Municipio de Jesús María</title>

		<meta name="description" content="Oficialia de Partes - Municipio de Jesús María" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<link rel="stylesheet" href="assets/css/own/bienvenida.css" />
		<!--DROPZONE-->
		<link rel="stylesheet" href="assets/css/dropzone.min.css" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />
		<link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="assets/css/chosen.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css" />
		<link rel="stylesheet" href="assets/css/daterangepicker.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-colorpicker.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-treeview.css" />

		<link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.0/mapsjs-ui.css?dp-version=1549984893" />


		<link rel="stylesheet" href="assets/css/jquery.gritter.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.min.js"></script>


		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->


	</head>

	<body class="no-skin">

		<div id="navbar" class="navbar navbar-default ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="inicio.php" class="navbar-brand">
						<small>
							<!-- <img src="img/2.png" width="30"> -->
							Sistema de Apertura Rápida de Empresas (SARE)
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">						
						<li class="dropdown-modal" id="push">
		                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
		                        <i class="ace-icon fa fa-bell icon-animated-bell"></i>
		                        <span class="badge"><input type="hidden" id="noti" name="noti" value="0"/>0</span>
		                    </a>

		                    <ul class="dropdown-menu-right dropdown-navbar navbar-green dropdown-menu dropdown-caret dropdown-close">
		                        <li class="dropdown-header">
		                            <i class="ace-icon fa fa-check"></i>
		                            Todo en orden
		                        </li>

		                        <li class="dropdown-content">
		                            <ul class="dropdown-menu dropdown-navbar navbar-pink">
		                                
		                            </ul>
		                        </li>
		                    </ul>
		                </li>
						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">

								<span class="user-info">
									<small>Bienvenido,</small>
									<?= $_SESSION['nombre_completo']; ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="index.php?modo=desconectar">
										<i class="ace-icon fa fa-power-off"></i>
										Cerrar Sesión
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar responsive ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<ul class="nav nav-list">
					<li class="active">
						<a href="inicio.php">
							<i class="menu-icon fa fa-home"></i>
							<span class="menu-text"> Inicio </span>
						</a>

						<b class="arrow"></b>
					</li>

					<?=$menu;?>					
				</ul>

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">

				<div class="main-content-inner" id="body_content" name="body_content"></div>
			</div>
		</div>

		<div class="footer">
			<div class="footer-inner">
				<div class="footer-content">
					<span class="bigger-120">
						Municipio de Jesús María 2019 - 2021
					</span>

					&nbsp; &nbsp;
					<span class="action-buttons">
					</span>
				</div>	
			</div>
		</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>


		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>
		
		<!-- <![endif]-->

		<!--[if IE]>
		<script src="assets/js/jquery-1.11.3.min.js"></script>
		<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--DROPZONE SCRIPT-->
		<script src="assets/js/dropzone.min.js"></script>


		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->

		<script src="assets/js/jquery-ui.min.js"></script>
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="assets/js/dataTables.buttons.min.js"></script>
		<script src="assets/js/buttons.flash.min.js"></script>
		<script src="assets/js/buttons.html5.min.js"></script>
		<script src="assets/js/buttons.print.min.js"></script>
		<script src="assets/js/buttons.colVis.min.js"></script>
		<script src="assets/js/dataTables.select.min.js"></script>
		<script src="assets/js/jquery.validate.min.js"></script>
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/chosen.jquery.min.js"></script>
		<script src="assets/js/spinbox.min.js"></script>
		<script src="assets/js/bootstrap-datepicker.min.js"></script>
		<script src="assets/js/bootstrap-timepicker.min.js"></script>
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/daterangepicker.min.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
		<script src="assets/js/bootstrap-colorpicker.min.js"></script>
		<script src="assets/js/jquery.knob.min.js"></script>
		<script src="assets/js/autosize.min.js"></script>
		<script src="assets/js/jquery.inputlimiter.min.js"></script>
		<script src="assets/js/jquery.maskedinput.min.js"></script>
		<script src="assets/js/bootstrap-tag.min.js"></script>
		<script src="assets/js/jquery.gritter.min.js"></script>
		<script src="assets/js/jquery.easypiechart.min.js"></script>
		<script src="assets/js/jquery.sparkline.index.min.js"></script>
		<script src="assets/js/jquery.flot.min.js"></script>
		<script src="assets/js/jquery.flot.pie.min.js"></script>
		<script src="assets/js/jquery.flot.resize.min.js"></script>
		<script src="assets/js/bootbox.js"></script>
		<script src="assets/js/spin.js"></script>
		<script src="assets/js/jquery.hotkeys.index.min.js"></script>
		<script src="assets/js/bootstrap-wysiwyg.min.js"></script>
		<script src="assets/js/jquery.colorbox.min.js"></script>
		<script src="assets/js/wizard.min.js"></script>
		<script src="assets/js/jquery.gritter.min.js"></script>
		<script src="assets/js/bootstrap-load.js"></script>
		<script src="assets/js/bootstrap-treeview.js"></script>



		 <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBmCJzMWkI-k9bUNAOMQ5jBtP55PI0aqNc&callback=initMap" async defer></script> -->

		<!-- SCRIPTS HERE MAPS -->

		<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-core.js"></script>
		<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-service.js"></script>
		<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-ui.js"></script>
		<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-mapevents.js"></script>

		<script src="assets/js/markdown.min.js"></script>
		<script src="assets/js/bootstrap-markdown.min.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
		<script src="assets/js/tree.min.js"></script>

		<!--Alert-->
		<script src="https://unpkg.com/sweetalert@2.1.0/dist/sweetalert.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				setTimeout(function() {
					$($('.tableTools-container')).find('a.dt-button').each(function() {
						var div = $(this).find(' > div').first();
						if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
						else $(this).tooltip({container: 'body', title: $(this).text()});
					});
				}, 500);


				//And for the first simple table, which doesn't have TableTools or dataTables
				//select/deselect all rows according to table header checkbox
				var active_class = 'active';
				$('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header

					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
						else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
					});
				});

				//select/deselect a row when the checkbox is checked/unchecked
				$('#simple-table').on('click', 'td input[type=checkbox]' , function(){
					var $row = $(this).closest('tr');
					if($row.is('.detail-row ')) return;
					if(this.checked) $row.addClass(active_class);
					else $row.removeClass(active_class);
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




				/***************/
				$('.show-details-btn').on('click', function(e) {
					e.preventDefault();
					$(this).closest('tr').next().toggleClass('open');
					$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
				});
				/***************/


			})



			jQuery(function($) {
				$('.easy-pie-chart.percentage').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
					var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
					var size = parseInt($(this).data('size')) || 50;
					$(this).easyPieChart({
						barColor: barColor,
						trackColor: trackColor,
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: parseInt(size/10),
						animate: ace.vars['old_ie'] ? false : 1000,
						size: size
					});
				})

				$('.sparkline').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
					$(this).sparkline('html',
									 {
										tagValuesAttribute:'data-values',
										type: 'bar',
										barColor: barColor ,
										chartRangeMin:$(this).data('min') || 0
									 });
				});


				$('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('.tab-content')
					var off1 = $parent.offset();
					var w1 = $parent.width();

					var off2 = $source.offset();
					//var w2 = $source.width();

					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}


				$('.dialogs,.comments').ace_scroll({
					size: 300
			    });


				//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
				//so disable dragging when clicking on label
				var agent = navigator.userAgent.toLowerCase();
				if(ace.vars['touch'] && ace.vars['android']) {
				  $('#tasks').on('touchstart', function(e){
					var li = $(e.target).closest('#tasks li');
					if(li.length == 0)return;
					var label = li.find('label.inline').get(0);
					if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
				  });
				}

				$('#tasks').sortable({
					opacity:0.8,
					revert:true,
					forceHelperSize:true,
					placeholder: 'draggable-placeholder',
					forcePlaceholderSize:true,
					tolerance:'pointer',
					stop: function( event, ui ) {
						//just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
						$(ui.item).css('z-index', 'auto');
					}
					}
				);
				$('#tasks').disableSelection();
				$('#tasks input:checkbox').removeAttr('checked').on('click', function(){
					if(this.checked) $(this).closest('li').addClass('selected');
					else $(this).closest('li').removeClass('selected');
				});


				//show the dropdowns on top or bottom depending on window height and menu position
				$('#task-tab .dropdown-hover').on('mouseenter', function(e) {
					var offset = $(this).offset();

					var $w = $(window)
					if (offset.top > $w.scrollTop() + $w.innerHeight() - 100)
						$(this).addClass('dropup');
					else $(this).removeClass('dropup');
				});

			})


			jQuery(function($) {
				$('#id-disable-check').on('click', function() {
					var inp = $('#form-input-readonly').get(0);
					if(inp.hasAttribute('disabled')) {
						inp.setAttribute('readonly' , 'true');
						inp.removeAttribute('disabled');
						inp.value="This text field is readonly!";
					}
					else {
						inp.setAttribute('disabled' , 'disabled');
						inp.removeAttribute('readonly');
						inp.value="This text field is disabled!";
					}
				});


				if(!ace.vars['touch']) {
					$('.chosen-select').chosen({allow_single_deselect:true});
					//resize the chosen on window resize

					$(window)
					.off('resize.chosen')
					.on('resize.chosen', function() {
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					}).trigger('resize.chosen');
					//resize chosen on sidebar collapse/expand
					$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
						if(event_name != 'sidebar_collapsed') return;
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					});


					$('#chosen-multiple-style .btn').on('click', function(e){
						var target = $(this).find('input[type=radio]');
						var which = parseInt(target.val());
						if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
						 else $('#form-field-select-4').removeClass('tag-input-style');
					});
				}


				$('[data-rel=tooltip]').tooltip({container:'body'});
				$('[data-rel=popover]').popover({container:'body'});

				autosize($('textarea[class*=autosize]'));

				$('textarea.limited').inputlimiter({
					remText: '%n character%s remaining...',
					limitText: 'max allowed : %n.'
				});

				$.mask.definitions['~']='[+-]';
				$('.input-mask-date').mask('99/99/9999');
				$('.input-mask-phone').mask('(999) 999-9999');
				$('.input-mask-eyescript').mask('~9.99 ~9.99 999');
				$(".input-mask-product").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});



				$( "#input-size-slider" ).css('width','200px').slider({
					value:1,
					range: "min",
					min: 1,
					max: 8,
					step: 1,
					slide: function( event, ui ) {
						var sizing = ['', 'input-sm', 'input-lg', 'input-mini', 'input-small', 'input-medium', 'input-large', 'input-xlarge', 'input-xxlarge'];
						var val = parseInt(ui.value);
						$('#form-field-4').attr('class', sizing[val]).attr('placeholder', '.'+sizing[val]);
					}
				});

				$( "#input-span-slider" ).slider({
					value:1,
					range: "min",
					min: 1,
					max: 12,
					step: 1,
					slide: function( event, ui ) {
						var val = parseInt(ui.value);
						$('#form-field-5').attr('class', 'col-xs-'+val).val('.col-xs-'+val);
					}
				});



				//"jQuery UI Slider"
				//range slider tooltip example
				$( "#slider-range" ).css('height','200px').slider({
					orientation: "vertical",
					range: true,
					min: 0,
					max: 100,
					values: [ 17, 67 ],
					slide: function( event, ui ) {
						var val = ui.values[$(ui.handle).index()-1] + "";

						if( !ui.handle.firstChild ) {
							$("<div class='tooltip right in' style='display:none;left:16px;top:-6px;'><div class='tooltip-arrow'></div><div class='tooltip-inner'></div></div>")
							.prependTo(ui.handle);
						}
						$(ui.handle.firstChild).show().children().eq(1).text(val);
					}
				}).find('span.ui-slider-handle').on('blur', function(){
					$(this.firstChild).hide();
				});


				$( "#slider-range-max" ).slider({
					range: "max",
					min: 1,
					max: 10,
					value: 2
				});

				$( "#slider-eq > span" ).css({width:'90%', 'float':'left', margin:'15px'}).each(function() {
					// read initial values from markup and remove that
					var value = parseInt( $( this ).text(), 10 );
					$( this ).empty().slider({
						value: value,
						range: "min",
						animate: true

					});
				});

				$("#slider-eq > span.ui-slider-purple").slider('disable');//disable third item


				$('#id-input-file-1 , #id-input-file-2').ace_file_input({
					no_file:'No File ...',
					btn_choose:'Choose',
					btn_change:'Change',
					droppable:false,
					onchange:null,
					thumbnail:false //| true | large
					//whitelist:'gif|png|jpg|jpeg'
					//blacklist:'exe|php'
					//onchange:''
					//
				});
				//pre-show a file name, for example a previously selected file
				//$('#id-input-file-1').ace_file_input('show_file_list', ['myfile.txt'])


				$('#id-input-file-3').ace_file_input({
					style: 'well',
					btn_choose: 'Drop files here or click to choose',
					btn_change: null,
					no_icon: 'ace-icon fa fa-cloud-upload',
					droppable: true,
					thumbnail: 'small'//large | fit
					//,icon_remove:null//set null, to hide remove/reset button
					/**,before_change:function(files, dropped) {
						//Check an example below
						//or examples/file-upload.html
						return true;
					}*/
					/**,before_remove : function() {
						return true;
					}*/
					,
					preview_error : function(filename, error_code) {
						//name of the file that failed
						//error_code values
						//1 = 'FILE_LOAD_FAILED',
						//2 = 'IMAGE_LOAD_FAILED',
						//3 = 'THUMBNAIL_FAILED'
						//alert(error_code);
					}

				}).on('change', function(){
					//console.log($(this).data('ace_input_files'));
					//console.log($(this).data('ace_input_method'));
				});


				//$('#id-input-file-3')
				//.ace_file_input('show_file_list', [
					//{type: 'image', name: 'name of image', path: 'http://path/to/image/for/preview'},
					//{type: 'file', name: 'hello.txt'}
				//]);




				//dynamically change allowed formats by changing allowExt && allowMime function
				$('#id-file-format').removeAttr('checked').on('change', function() {
					var whitelist_ext, whitelist_mime;
					var btn_choose
					var no_icon
					if(this.checked) {
						btn_choose = "Drop images here or click to choose";
						no_icon = "ace-icon fa fa-picture-o";

						whitelist_ext = ["jpeg", "jpg", "png", "gif" , "bmp"];
						whitelist_mime = ["image/jpg", "image/jpeg", "image/png", "image/gif", "image/bmp"];
					}
					else {
						btn_choose = "Drop files here or click to choose";
						no_icon = "ace-icon fa fa-cloud-upload";

						whitelist_ext = null;//all extensions are acceptable
						whitelist_mime = null;//all mimes are acceptable
					}
					var file_input = $('#id-input-file-3');
					file_input
					.ace_file_input('update_settings',
					{
						'btn_choose': btn_choose,
						'no_icon': no_icon,
						'allowExt': whitelist_ext,
						'allowMime': whitelist_mime
					})
					file_input.ace_file_input('reset_input');

					file_input
					.off('file.error.ace')
					.on('file.error.ace', function(e, info) {

					});




				});




				;(function($){
					$.fn.datepicker.dates['es'] = {
						days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
						daysShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
						daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
						months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
						monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
						today: "Hoy",
						monthsTitle: "Meses",
						clear: "Borrar",
						weekStart: 0,
						format: "dd/mm/yyyy"
					};
				}(jQuery));


				//datepicker plugin
				//link
				$('.date-picker').datepicker({
					language: 'es',
					autoclose: true,
					todayHighlight: true
				})
				//show datepicker when clicking on the icon
				.next().on(ace.click_event, function(){
					$(this).prev().focus();
				});

				//or change it into a date range picker
				$('.input-daterange').datepicker({autoclose:true});


				//to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
				$('input[name=date-range-picker]').daterangepicker({
					'applyClass' : 'btn-sm btn-success',
					'cancelClass' : 'btn-sm btn-default',
					locale: {
						applyLabel: 'Apply',
						cancelLabel: 'Cancel',
					}
				})
				.prev().on(ace.click_event, function(){
					$(this).next().focus();
				});


				$(".knob").knob();


				var tag_input = $('#form-field-tags');
				try{
					tag_input.tag(
					  {
						placeholder:tag_input.attr('placeholder'),
						//enable typeahead by specifying the source array
						source: ace.vars['US_STATES'],//defined in ace.js >> ace.enable_search_ahead
						/**
						//or fetch data from database, fetch those that match "query"
						source: function(query, process) {
						  $.ajax({url: 'remote_source.php?q='+encodeURIComponent(query)})
						  .done(function(result_items){
							process(result_items);
						  });
						}
						*/
					  }
					)

					//programmatically add/remove a tag
					var $tag_obj = $('#form-field-tags').data('tag');
					$tag_obj.add('Programmatically Added');

					var index = $tag_obj.inValues('some tag');
					$tag_obj.remove(index);
				}
				catch(e) {
					//display a textarea for old IE, because it doesn't support this plugin or another one I tried!
					tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
					//autosize($('#form-field-tags'));
				}


				/////////
				$('#modal-form input[type=file]').ace_file_input({
					style:'well',
					btn_choose:'Drop files here or click to choose',
					btn_change:null,
					no_icon:'ace-icon fa fa-cloud-upload',
					droppable:true,
					thumbnail:'large'
				})

				//chosen plugin inside a modal will have a zero width because the select element is originally hidden
				//and its width cannot be determined.
				//so we set the width after modal is show
				$('#modal-form').on('shown.bs.modal', function () {
					if(!ace.vars['touch']) {
						$(this).find('.chosen-container').each(function(){
							$(this).find('a:first-child').css('width' , '210px');
							$(this).find('.chosen-drop').css('width' , '210px');
							$(this).find('.chosen-search input').css('width' , '200px');
						});
					}
				})
				/**
				//or you can activate the chosen plugin after modal is shown
				//this way select element becomes visible with dimensions and chosen works as expected
				$('#modal-form').on('shown', function () {
					$(this).find('.modal-chosen').chosen();
				})
				*/



				$(document).one('ajaxloadstart.page', function(e) {
					autosize.destroy('textarea[class*=autosize]')

					$('.limiterBox,.autosizejs').remove();
					$('.daterangepicker.dropdown-menu,.colorpicker.dropdown-menu,.bootstrap-datetimepicker-widget.dropdown-menu').remove();
				});

			});
		</script>

		<!--Aquí comienzan mis script-->
		<script>
			/*funcion para cambiar el contenido a mostrar*/
			function cambiarcont(pagina)
			{
			    $("#body_content").html("<img src='img/exit.gif' class='img-responsive center-block' alt='Cargando...' />");
			    $("#body_content").load(pagina);
				$("#body_content").fadeIn(10000);
			}
		</script>


		<script type="text/javascript">
			var tipo_usuario = <?= $tipo_usuario; ?>;

			$(document).ready(function() {
				switch (tipo_usuario) {
				  	case 1:
				    	$("#body_content").html("<img src='img/exit.gif' class='img-responsive center-block' alt='Cargando...' />");
					    $('#body_content').load('view/bienvenida.php');
						$("#body_content").fadeIn(10000);
				    	break;
				  	case 2:
				    	$("#body_content").html("<img src='img/exit.gif' class='img-responsive center-block' alt='Cargando...' />");
					    $('#body_content').load('view/solicitud/listado.php?pantalla=1');
						$("#body_content").fadeIn(10000);
				    	break;
				  	case 3:
				    	$("#body_content").html("<img src='img/exit.gif' class='img-responsive center-block' alt='Cargando...' />");
					    $('#body_content').load('view/sedatum/ventanilla.php?pantalla=2');
						$("#body_content").fadeIn(10000);
				    	break;
				  	case 4:
				    	$("#body_content").html("<img src='img/exit.gif' class='img-responsive center-block' alt='Cargando...' />");
					    $('#body_content').load('view/sedatum/uso_suelo.php?pantalla=4');
						$("#body_content").fadeIn(10000);
				    	break;
				  	case 5:
				  		$("#body_content").html("<img src='img/exit.gif' class='img-responsive center-block' alt='Cargando...' />");
					    $('#body_content').load('view/sedatum/director.php?pantalla=5');
						$("#body_content").fadeIn(10000);
				    	break;
				    case 6:
				    	$("#body_content").html("<img src='img/exit.gif' class='img-responsive center-block' alt='Cargando...' />");
					    $('#body_content').load('view/sedatum/secretario.php?pantalla=6');
						$("#body_content").fadeIn(10000);
				    	break;
				  	case 7:
				  		$("#body_content").html("<img src='img/exit.gif' class='img-responsive center-block' alt='Cargando...' />");
					    $('#body_content').load('view/anexos/listado.php?pantalla=8');
						$("#body_content").fadeIn(10000);
				    	break;
				}			
				
			});
		</script>

		<script type="text/javascript">
			$("#sidebar ul.nav li").click(function(){
				$("#sidebar ul.nav li.active").removeClass("active");
				$(this).addClass("active");
			});
		</script>

		<script type="text/javascript">

		    function fill_modal_comp_uso(id)
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
		                document.getElementById("load_modal_comp").innerHTML=xmlhttp.responseText;
		                
		                waitingDialog.hide();
		                show_hide_modals();
		                wysiwyg();
		                $('#modal_comp').modal('show');
		            }
		        }

		        var datos_modal = "id="+id;

		        waitingDialog.show('Cargando Información', {dialogSize: 'sm', progressType: 'warning'})
		        xmlhttp.open("POST","./model/sedatum/modal_com_uso.php",true);
		        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		        xmlhttp.send(datos_modal);
		    }

		    function fill_modal_gen_recibo(id)
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
		                document.getElementById("load_modal_recibo").innerHTML=xmlhttp.responseText;		                
		                waitingDialog.hide();
		                show_hide_modals();
		                chosen();
		                $('#modal_rec').modal('show');
		            }
		        }

		        var datos_modal = "id="+id;

		        waitingDialog.show('Cargando Información', {dialogSize: 'sm', progressType: 'warning'})
		        xmlhttp.open("POST","./model/sedatum/modal_gen_recibo.php",true);
		        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		        xmlhttp.send(datos_modal);
		    }

		    function wysiwyg()
		    {
		    	$('#complemento').ace_wysiwyg().prev().addClass('wysiwyg-style2');;

				$('[data-toggle="buttons"] .btn').on('click', function(e){
					var target = $(this).find('input[type=radio]');
					var which = parseInt(target.val());
					var toolbar = $('#editor1').prev().get(0);
					if(which >= 1 && which <= 4) {
						toolbar.className = toolbar.className.replace(/wysiwyg\-style(1|2)/g , '');
						if(which == 1) $(toolbar).addClass('wysiwyg-style1');
						else if(which == 2) $(toolbar).addClass('wysiwyg-style2');
						if(which == 4) {
							$(toolbar).find('.btn-group > .btn').addClass('btn-white btn-round');
						} else $(toolbar).find('.btn-group > .btn-white').removeClass('btn-white btn-round');
					}
				});

				var enableImageResize = function() {
					$('.wysiwyg-editor')
					.on('mousedown', function(e) {
						var target = $(e.target);
						if( e.target instanceof HTMLImageElement ) {
							if( !target.data('resizable') ) {
								target.resizable({
									aspectRatio: e.target.width / e.target.height,
								});
								target.data('resizable', true);
								
								if( lastResizableImg != null ) {
									//disable previous resizable image
									lastResizableImg.resizable( "destroy" );
									lastResizableImg.removeData('resizable');
								}
								lastResizableImg = target;
							}
						}
					})
					.on('click', function(e) {
						if( lastResizableImg != null && !(e.target instanceof HTMLImageElement) ) {
							destroyResizable();
						}
					})
					.on('keydown', function() {
						destroyResizable();
					});
			    }
		    }

		    function fill_modal_upcomprobante(id)
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
		                document.getElementById("load_modal_upcomprobante").innerHTML=xmlhttp.responseText;                
		                waitingDialog.hide();
		                $('#modal_upcomprobante').modal('show');
		                dropzone();
		            }
		        }

		        var datos_modal = "id=" + id; 

		        waitingDialog.show('Cargando Información', {dialogSize: 'sm', progressType: 'warning'})
		        xmlhttp.open("POST","./model/solicitud/modal_upcomprobante.php",true);
		        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		        xmlhttp.send(datos_modal);
		    }

		    function fill_modal_info(id, etapa)
		    {
		    	var pantalla = $('#pantalla').val();
		    	console.log(pantalla);
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
		                documentacion(id);
		                switch_editar();
		            }
		        }

	        	var datos_modal = "id=" + id + "&etapa=" + etapa + "&pantalla=" + pantalla; 

		        waitingDialog.show('Cargando Información', {dialogSize: 'sm', progressType: 'warning'})
		        xmlhttp.open("POST","./model/solicitud/modal_info_sol.php",true);
		        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		        xmlhttp.send(datos_modal);
		    }

		    function switch_editar(){

	            $("#check_edit",).change(function() {

	                var $inputs = $('#form_edit_dg :input');
	                var $inputs2 = $('#form_edit_de :input');
	                var $inputs3 = $('#form_edit_dim :input');

	                $inputs.each(function() {

	                    if ($(this).is('[disabled]')) {
	                        console.log("estaban disabled");
	                        $(this).prop("disabled", false);
	                        $(this).removeClass("sinborde");
	                        document.getElementById('boton_actualiza').style.display = 'inline';
	                        //document.getElementById('elimina_file').style.display = 'inline';
	                        document.getElementById('btn_re').style.display = 'inline';
	                    
	                    }else{
	                    	console.log("estaban editables");
	                       	$(this).prop("disabled",true);
	                       	$(this).addClass("sinborde");
	                       	document.getElementById('boton_actualiza').style.display = 'none';
	                       	//document.getElementById('elimina_file').style.display = 'none';
	                       	document.getElementById('btn_re').style.display = 'none';
	                    }
	                });

	                $inputs2.each(function() {

	                    if ($(this).is('[disabled]')) {
	                        console.log("estaban disabled2");
	                        $(this).prop("disabled", false);
	                        $(this).removeClass("sinborde");
	                    
	                    }else{
	                    	console.log("estaban editables2");
	                       	$(this).prop("disabled",true);
	                       	$(this).addClass("sinborde");
	                    }
	                });

	                $inputs3.each(function() {

	                    if ($(this).is('[disabled]')) {
	                        console.log("estaban disabled2");
	                        $(this).prop("disabled", false);
	                        $(this).removeClass("sinborde");
	                    
	                    }else{
	                    	console.log("estaban editables2");
	                       	$(this).prop("disabled",true);
	                       	$(this).addClass("sinborde");
	                    }
	                });

	            });
	        }

	        function revivir_sol(id_sol){
	        	swal({
	        		title: "Guardar",
				  	text: "¿Desea reiniciar la solicutud?",
				  	icon: "info",
				 	buttons: ["Cancelar", "Ok"],
				  	dangerMode: true,
	        	}).then((willDelete) =>{
	        		if (willDelete) {
	        			var data = {
							'parametros' : id_sol,
							'etapa' : "re",
						}
						$.ajax({
							data:  data,
							url:   './model/solicitud/reinicia_solicitud.php',
							type:  'post', 

							success:  function (data) {
							
								if (data==='correcto'){
									swal({
									  title: "¡Datos actualizados correctamente!",
									  icon: "success",
									});
									location.reload();
								}

								if (data==='error'){
									swal({
									  title: "¡Error!",
									  text: "¡Ocurrio algo al actualizar",
									  icon: "error",
									});
								}
							}
						});
	        		} else{
	        			//swal("¡Cancelado!", "No se han hecho cambios la solicitud", "error");
	        		}
	        	});
	        }

	        function reinicia_solicitud(id_sol,tipo_persona,origen,etapa_new){
	        	if(document.getElementById('boton_actualiza').style.display == 'inline'){
	        		var titulo="";
					var texto="";
	        		var form="";
	        		var etapa_set="";
	        		var paso_new="";
	        		var etapa = document.getElementById("paso_actual").value;

	        		if(origen=="boton")
					{
						titulo="Guardar";
						texto="¿Desea guardar la Información?";
						paso_new=etapa;
					} else{
						titulo="Antes de continuar";
						texto="¿Desea guardar la Información?";
						paso_new=etapa_new;
					}

	        		switch (etapa) {									  	
					  	case "1":
					  		form = "form_edit_dg";	
					  		etapa_set = "dg";							
					    break;

					  	case "2":
					    	form = "form_edit_de";
					    	etapa_set = "de";					
				    	break;

					  	case "3":
					    	form = "form_edit_dim";
					    	etapa_set = "dim";						
				    	break;
					}

					var myform = document.getElementById(form);
					var formdata = new FormData(myform);
					var datos_form = [];
					datos_form.push(tipo_persona);
					datos_form.push(id_sol);

					for (var value of formdata.values()) {
						datos_form.push(value);
					}
					//console.log(datos_form);
		        	swal({
		        		title: titulo,
					  	text: texto,
					  	icon: "info",
					 	buttons: ["Cancelar", "Ok"],
					  	dangerMode: true,
		        	}).then((willDelete) =>{
		        		if (willDelete) {
		        			var data = {
								'parametros' : datos_form,
								'etapa' : etapa_set,
							}
							$.ajax({
								data:  data,
								url:   './model/solicitud/reinicia_solicitud.php',
								type:  'post', 

								success:  function (data) {
								
									if (data==='correcto'){
										swal({
										  title: "¡Datos actualizados correctamente!",
										  icon: "success",
										});
										document.getElementById("paso_actual").value=paso_new;
									}

									if (data==='error'){
										swal({
										  title: "¡Error!",
										  text: "¡Ocurrio algo al actualizar",
										  icon: "error",
										});
									}
								}
							});
		        		} else{
		        			//swal("¡Cancelado!", "No se han hecho cambios la solicitud", "error");
		        		}
		        	});
		        } else{console.log("no pasa nada");}
	        }

			function fill_tabs(li)
		    {

		    	var pantalla = $("#pantalla").val();

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

		        var datos_modal = "id=" + id + "&pantalla=" + pantalla;

		        waitingDialog.show('Cargando Información', {dialogSize: 'sm', progressType: 'warning'})
		        xmlhttp.open("POST","./view/sedatum/tabs.php",true);
		        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		        xmlhttp.send(datos_modal);
		    }   

			function dynamic()
			{
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

		    function show_hide_modals()
		    {
				$('#modal_comp').on('shown.bs.modal', function (e) {
		  			$('#modal_info').modal('hide');
				});

				$('#modal_comp').on('hide.bs.modal', function (e) {
		  			$('#modal_info').modal('show');
				});

				$('#modal_rec').on('show.bs.modal', function (e) {
		  			$('#modal_info').modal('hide');
				});

				$('#modal_rec').on('hide.bs.modal', function (e) {
		  			$('#modal_info').modal('show');
				});
			}
			
			function actualiza_status(id_solicitud,status,complemento,complemento2)
			{
				var etapa = $("#pantalla").val();
				var director = "";
				var folio = $("#folio_ruta").val();
				var id_usuario="";
				var tipo_usuario="";
				var titulo="";
				var texto="";
				var pantalla="";

				//console.log("id:"+id_solicitud+" etapa: "+etapa+" status: "+status+" adicional_1: "+complemento+" adicional_2: "+complemento2+" director: "+director+" tipo_usuario: "+tipo_usuario+" id_usuario: "+id_usuario+" folio: "+folio);

				//console.log(complemento==="");console.log(complemento2==="");

				//console.log(complemento.length);console.log(complemento2.length);
				
				if (etapa==2)
				{
					pantalla="ventanilla";
				}else if(etapa==4)
				{
					pantalla="uso_suelo";
				}else if (etapa==5)
				{
					pantalla="director";
					director = $("#input_director").val();
				}else if(etapa==6)				
				{
					pantalla="secretario";
					id_usuario = <?= $_SESSION['id_usuario']; ?>;
					tipo_usuario = <?= $_SESSION['id_tipo_usuario']; ?>;
				}

				if (director==1)
				{
					id_usuario = <?= $_SESSION['id_usuario']; ?>;
					tipo_usuario = <?= $_SESSION['id_tipo_usuario']; ?>;
				}

				if(status==2)
				{
					titulo="Rechazar?";
					texto="¿Seguro que desea rechazar la solicutud?";
				} else if((status==1)&&(etapa==2)&&(complemento!==0)){
					titulo="¿Generar orden de pago?";
					texto="¿Desea generar la orden de pago?";
				} else{
					titulo="¿Aprobar?";
					texto="¿Seguro que desea aprobar la solicutud?";
				}

				if ((etapa==4)&& complemento=="")
				{
					swal({
					  	title: "¡Error!",
					  	text: "¡Favor de escribir el dictámen!",
					  	icon: "warning",
					});
				} else{
					swal({
					  	title: titulo,
					  	text: texto,
					  	icon: "info",
					 	buttons: ["Cancelar", "Ok"],
					  	dangerMode: true,
					}).then((willDelete) => {
						if (willDelete) {

							if(status==2)
							{
								swal({
								  	title: "Descripción",
								  	text: "Describa el motivo del rechazo:",
								  	buttons: ["Cancelar", "Enviar"],
								  	icon: "info",
								  	content: "input",
							    }).then((value) => {
							    	if (value) {
							    		//console.log("id:"+id_solicitud+" etapa: "+etapa+" status: "+status+" adicional_1: "+complemento+" adicional_2: "+complemento2+" director: "+director+" tipo_usuario: "+tipo_usuario+" id_usuario: "+id_usuario+" folio: "+folio);

							    		var data = {
											'id' : id_solicitud,
											'etapa' : etapa,
											'status' : status,
											'adicional_1' : value,
											'adicional_2' : "",
											'director' : director,
											'tipo_usuario' : tipo_usuario,
											'id_usuario' : id_usuario,
											'ruta' : folio,
										}

										$.ajax({
											data:  data,
											url:   './model/sedatum/actualiza_status.php',
											type:  'post',

											success:  function (data) {

												if (data==='correcto'){
													swal({
													  title: "¡Datos guardados correctamente!",
													  icon: "success",
													}).then( (value) => {
														$('.modal-backdrop').remove();
														cambiarcont('view/sedatum/'+pantalla+'.php?pantalla='+etapa);
													});
												}

												if (data==='error'){
													swal({
													  title: "¡Error!",
													  text: "¡Ocurrio algo al actualizar el estatus!",
													  icon: "error",
													});
												}
											}
										});

							    	}else{
							    		swal("¡Cancelado!", "No se ha rechazado la solicutud", "error");
							    	}
							    });								
							} else{
								
								//console.log("id:"+id_solicitud+" etapa: "+etapa+" status: "+status+" adicional_1: "+complemento+" adicional_2: "+complemento2+" director: "+director+" tipo_usuario: "+tipo_usuario+" id_usuario: "+id_usuario+" folio: "+folio);

								if ((etapa==2)&&(complemento===0)&&(complemento2===0))
								{
									fill_modal_gen_recibo(id_solicitud);
								} else if((etapa==2) && ((complemento.length===0) || (complemento2.length===0))){
									swal({
									  	title: "¡Error!",
									  	text: "¡Favor de llenar todos los campos!",
									  	icon: "warning",
									});
								} else{

									var data = {
										'id' : id_solicitud,
										'etapa' : etapa,
										'status' : status,
										'adicional_1' : complemento,
										'adicional_2' : complemento2,
										'director' : director,
										'tipo_usuario' : tipo_usuario,
										'id_usuario' : id_usuario,
										'ruta' : folio,
									}

									
									$.ajax({
										data:  data,
										url:   './model/sedatum/actualiza_status.php',
										type:  'post', 


										success:  function (data) {
										
											if (data==='correcto'){
												swal({
												  title: "¡Datos guardados correctamente!",
												  icon: "success",
												}).then( (value) => {
													$('.modal-backdrop').remove();
													cambiarcont('view/sedatum/'+pantalla+'.php?pantalla='+etapa);	
													
												});

												if ((etapa==2)&&(complemento=="na"))
												{
													window.open('pdf/sare/orden_pago_licencia.php?id='+id_solicitud+'&monto='+complemento2, '_blank');
												} 
												if ((etapa==2)&&(complemento!="na")){
													window.open('pdf/sare/orden_pago_licencia.php?id='+id_solicitud+'&monto='+complemento2, '_blank');
													window.open('pdf/sedatum/numero_oficial.php?id='+id_solicitud+'&numero_oficial='+complemento, '_blank');
												}

											}

											if (data==='error'){
												swal({
												  title: "¡Error!",
												  text: "¡Ocurrio algo al actualizar el estatus!",
												  icon: "error",
												});
											}
										}
									});
								}
							}

						}else{
							swal("¡Cancelado!", "No se han hecho cambios la solicitud", "error");
						}
					});
				}
			}

			function chosen()
			{
				if(!ace.vars['touch']) {
		            $('.chosen-select').chosen({allow_single_deselect:true}); 
		            //resize the chosen on window resize
		    
		            $(window)
		            .off('resize.chosen')
		            .on('resize.chosen', function() {
		                $('.chosen-select').each(function() {
		                     var $this = $(this);
		                     $this.next().css({'width': $this.parent().width()});
		                })
		            }).trigger('resize.chosen');
		            //resize chosen on sidebar collapse/expand
		            $(document).on('settings.ace.chosen', function(e, event_name, event_val) {
		                if(event_name != 'sidebar_collapsed') return;
		                $('.chosen-select').each(function() {
		                     var $this = $(this);
		                     $this.next().css({'width': $this.parent().width()});
		                })
		            });
		    
		    
		            $('#chosen-multiple-style .btn').on('click', function(e){
		                var target = $(this).find('input[type=radio]');
		                var which = parseInt(target.val());
		                if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
		                 else $('#form-field-select-4').removeClass('tag-input-style');
		            });            
		        }
			}

			function getTree(id) {
				var folio_exp = $('#folio_ruta').val();
				$.ajax({
		            type:'POST',
		            url:'./model/solicitud/get_docs.php',
		            dataType: "json",
		            data:{id:id},
		            success:function(data){
		            	for(var i=0; i<data.length; i++){
							var datadiv = data[i].split(",", 3);
                            var tipo = datadiv[0];
                            var archivo = datadiv[1];
                            var carpeta = "";
		                    
		                    switch (tipo) {
								case 'd':
									console.log("d");
									tree[0].nodes.push(
									{
										text: archivo,
										icon: "fa fa-file-pdf-o",
										color: "#FF892A",
										href: "/assets/expedientes/"+folio_exp+"/docs/"+carpeta+"/"+archivo+"",
										tags: ['<i class="fa fa-times"></i>']
									});
								break;
								case 'p':
								console.log("p");
									tree[1].nodes.push(
									{
										text: archivo,
										icon: "fa fa-file-pdf-o",
										color: "#FF892A",
										href: "/assets/expedientes/"+folio_exp+"/docs/"+carpeta+"/"+archivo+"",
										tags: ['<i class="fa fa-times"></i>']
									});


								break;
								case 'a':
									console.log("a");
									tree[2].nodes.push(
									{
										text: archivo,
										icon: "fa fa-file-pdf-o",
										color: "#FF892A",
										href: "/assets/expedientes/"+folio_exp+"/docs/"+carpeta+"/"+archivo+"",
										tags: ['<i class="fa fa-times"></i>']
									});

								break;
							}
						}
					}
			    });
			 
				var tree = [
				  	{
					    text: "Documentación",
					    icon: "fa fa-folder",
						selectedIcon: "fa fa-folder-open",
						color: "#FF892A",
						selectable: true,
						state: {
						    expanded: false
						},						
						nodes: []
					},
					{
						text: "Pagos",
					    icon: "fa fa-folder",
						selectedIcon: "fa fa-folder-open",
						color: "#DD5A43",
						selectable: true,
						state: {
						    expanded: true
						},						
						nodes: []
					},
					{
						text: "Anexos",
					    icon: "fa fa-folder",
						selectedIcon: "fa fa-folder-open",
						color: "#478FCA",
						selectable: true,
						state: {
						    expanded: true
						},						
						nodes: []
					},
					{
					    text: "Mapa",
					    icon: "fa fa-file-image-o",
					    color: "#69AA46"
					}
				];
				

			 	return tree;
			}

			function carga_arbol(id){
				$('#tree_new').treeview({
					data: getTree(id),
					showTags: true,
					enableLinks: true
				});
			}

			

			//esta es la función que viene del ace min
			function documentacion(id){
				
				var folio_exp = $('#folio_ruta').val();
				jQuery(function($){
					$.ajax({
			            type:'POST',
			            url:'./model/solicitud/get_docs.php',
			            dataType: "json",
			            data:{id:id},
			            success:function(data){

		                    var sampleData = initiateDemoData();//see below

							$('#tree2').ace_tree({
								dataSource: sampleData['dataSource2'] ,
								loadingHTML:'<div class="tree-loading"><i class="ace-icon fa fa-refresh fa-spin blue"></i></div>',
								'open-icon' : 'ace-icon fa fa-folder-open',
								'close-icon' : 'ace-icon fa fa-folder',
								'itemSelect' : false,
								'folderSelect': true,
								'multiSelect': false,
								'selected-icon' : null,
								'unselected-icon' : null,
								'folder-open-icon' : 'ace-icon tree-plus',
								'folder-close-icon' : 'ace-icon tree-minus'
							});

							function initiateDemoData(){
								
								var tree_data_2 = {
									'documentacion' : {text: 'Documentación', type: 'folder', 'icon-class':'orange'},
									'pagos' : {text: 'Pagos', type: 'folder', 'icon-class':'red'},
									'anexos' : {text: 'Anexos', type: 'folder', 'icon-class':'blue'},
									'mapa' : {text: '<a href="/assets/expedientes/'+folio_exp+'/docs/mapa.png" target="_blank"><i class="ace-icon glyphicon glyphicon-picture green"></i> Mapa</a>', type: 'item'}	
								}

								tree_data_2['documentacion']['additionalParameters'] = {
									'children' : []
								}

								tree_data_2['pagos']['additionalParameters'] = {
									'children' : []
								}

								tree_data_2['anexos']['additionalParameters'] = {
									'children' : []
								}						

								var largo_d = 0;
								var largo_p = 0;
								var largo_a = 0;

								//esta es una función que hice para simular un foreach
								for(var i=0; i<data.length; i++){
									var datadiv = data[i].split(",", 3);
		                            var tipo = datadiv[0];
		                            var archivo = datadiv[1];
		                            var carpeta = "";
		                        
		                            switch (tipo) {
									  	
									  	case 'd':
									  		carpeta = "documentacion";
									    	tree_data_2[carpeta]['additionalParameters']['children'][largo_d] = {text: ''};
											tree_data_2[carpeta]['additionalParameters']['children'][largo_d]['text'] = '<a href="/assets/expedientes/'+folio_exp+'/docs/'+carpeta+'/'+archivo+'" target="_blank"><i class="ace-icon fa fa-file-pdf-o orange"></i> '+archivo+'</a>&nbsp;<i id="elimina_file" class="ace-icon fa fa-times red" style="display: none"></i>';
											tree_data_2[carpeta]['additionalParameters']['children'][largo_d]['type'] = 'item';
											largo_d++;
											
									    break;

									  	case 'p':
									    	carpeta = "pagos";
									    	tree_data_2[carpeta]['additionalParameters']['children'][largo_p] = {text: ''};
											tree_data_2[carpeta]['additionalParameters']['children'][largo_p]['text'] = '<a href="/assets/expedientes/'+folio_exp+'/docs/'+carpeta+'/'+archivo+'" target="_blank"><i class="ace-icon fa fa-file-pdf-o orange"></i> '+archivo+'</a>';
											tree_data_2[carpeta]['additionalParameters']['children'][largo_p]['type'] = 'item';
											largo_p++;
											
								    	break;

									  	case 'a':
									    	carpeta = "anexos";
									    	tree_data_2[carpeta]['additionalParameters']['children'][largo_a] = {text: ''};
											tree_data_2[carpeta]['additionalParameters']['children'][largo_a]['text'] = '<a href="/assets/expedientes/'+folio_exp+'/docs/'+carpeta+'/'+archivo+'" target="_blank"><i class="ace-icon fa fa-file-pdf-o orange"></i> '+archivo+'</a>';
											tree_data_2[carpeta]['additionalParameters']['children'][largo_a]['type'] = 'item';
											largo_a++;
											
								    	break;

									}
								}

								var dataSource2 = function(options, callback){
									var $data = null
									if(!("text" in options) && !("type" in options)){
										$data = tree_data_2;//the root tree
										callback({ data: $data });
										return;
									}
									else if("type" in options && options.type == "folder") {
										if("additionalParameters" in options && "children" in options.additionalParameters)
											$data = options.additionalParameters.children || {};
										else $data = {}//no data
									}
									
									if($data != null)//this setTimeout is only for mimicking some random delay
										setTimeout(function(){callback({ data: $data });} , parseInt(Math.random() * 500) + 200);

									//we have used static data here
									//but you can retrieve your data dynamically from a server using ajax call
									//checkout examples/treeview.html and examples/treeview.js for more info
								}

								return {'dataSource2' : dataSource2}
							}
			                
			            }
			        });
					

				});
			}

			function push(){
				if(typeof(EventSource)!=="undefined")
				{
					var pantalla = $("#pantalla").val();
					var noti = $("#noti").val();
				  	var source = new EventSource("./model/sedatum/monitor.php?pantalla="+pantalla);
				  	// console.log("entro");
				  	source.onmessage=function(event)
				    {
				    	// console.log(event.data);
						document.getElementById("push").innerHTML=event.data;/*Aqui se muestra el globo de notificación si hay cambios*/
						if (noti==0){
							// console.log("sin purpura");
							$("#push").removeClass("purple");
						} else{
							// console.log("purpura");
							$("#push").addClass("purple");
						}
						source.close();
				    };
				    source.onerror = function(e) {
					  	// console.log("Fallo EventSource.");
					};
				}
				else
				{
					document.getElementById("push").innerHTML="0";
		  		}
			}

			setInterval('push()',10000);
				
		</script>
	</body>
</html>
