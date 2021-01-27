<?php
	$id = $_POST['id'];
	$ausencia = $_POST['ausencia'];
?>

<div id="modal_info" class="modal" tabindex="-1" style="overflow-y:auto;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h1 class="blue">Solicitud SARE 66524</h1>
			</div>

			<div class="modal-body">
				<div class="row">

					<div class="col-xs-12">

						<div class="tabbable">

							<ul id="inbox-tabs" class="nav nav-tabs padding-16 tab-size-bigger tab-space-1">
								<li class="active">
									<a data-toggle="tab" href="#datos">
										<i class="blue ace-icon fa fa-user bigger-130"></i>
										<span class="hid_spa">Datos de la persona "X"</span>
									</a>
								</li>

								<li>
									<a data-toggle="tab" href="#establecimiento">
										<i class="green ace-icon fa fa-info-circle bigger-130"></i>
										<span class="hid_spa">Datos del establecimiento</span>
									</a>
								</li>

								<li>
									<a data-toggle="tab" href="#dimensiones">
										<i class="red ace-icon fa fa-building bigger-130"></i>
										<span class="hid_spa">Dimensiones del establecimento</span>
									</a>
								</li>

								<li>
									<a data-toggle="tab" href="#documentos">
										<i class="orange ace-icon fa fa-folder-open bigger-130"></i>
										<span class="hid_spa">Documentación</span>
									</a>
								</li>
							</ul>

							<div class="tab-content no-padding">
								<div id="datos" class="tab-pane fade in active">
									<div class="message-container">
										<div id="id-message-list-navbar" class="message-navbar clearfix">
											<div class="message-bar">
												<div class="message-infobar" id="id-message-infobar">
													<span style="display: block;" class="blue bigger-150">Datos de la persona "X"</span>
												</div>
											</div>
										</div>
										<div class="profile-user-info profile-user-info-striped">
											<div class="profile-info-row">
												<div class="profile-info-name"> Nombre: </div>

												<div class="profile-info-value">
													<i class="fa fa-user blue bigger-110"></i>&nbsp;
													<span>Juan de las Cuerdas</span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Dirección: </div>

												<div class="profile-info-value">
													<i class="fa fa-map-marker blue bigger-110"></i>&nbsp;
													<span>Av. Lopez Mateos 2132 Centro, Jesús María, Jesús Maria 20321</span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> RFC: </div>

												<div class="profile-info-value">
												<i class="fa fa-user blue bigger-110"></i>&nbsp;
													<span>XAXX000000XX0</span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> CURP: </div>

												<div class="profile-info-value">
												<i class="fa fa-user blue bigger-110"></i>&nbsp;
													<span>XXXX000000XXXXXX0</span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Teléfono: </div>

												<div class="profile-info-value">
												<i class="fa fa-phone blue bigger-110"></i>&nbsp;
													<span>44921212121</span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Correo: </div>

												<div class="profile-info-value">
												<i class="fa fa-envelope blue bigger-110"></i>&nbsp;
													<span>algo@dasd.com</span>
												</div>
											</div>

										</div>
									</div>
								</div>

								<div id="establecimiento" class="tab-pane fade">
									<div class="message-container">
										<div id="id-message-list-navbar" class="message-navbar clearfix">
											<div class="message-bar">
												<div class="message-infobar" id="id-message-infobar">
													<span style="display: block;" class="blue bigger-150">Datos del establecimiento</span>
												</div>
											</div>
										</div>
										<div class="profile-user-info profile-user-info-striped">
											<div class="profile-info-row">
												<div class="profile-info-name"> Nombre comercial: </div>

												<div class="profile-info-value">
													<i class="fa fa-user green bigger-110"></i>&nbsp;
													<span>Juan de las Cuerdas</span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Dirección: </div>

												<div class="profile-info-value">
													<i class="fa fa-map-marker green bigger-110"></i>&nbsp;
													<span>Av. Lopez Mateos 2132 Centro, Jesús María, Jesús Maria 20321</span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Localización: </div>

												<div class="profile-info-value">
													<i class="fa fa-map-marker green bigger-110"></i>&nbsp;
													<span>21.96489379686419, -102.34840837973235</span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Horario de trabajo: </div>

												<div class="profile-info-value">
												<i class="fa fa-clock-o green bigger-110"></i>&nbsp;
													<span>8:00 am a 4:00 pm</span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Uso actual: </div>

												<div class="profile-info-value">
												<i class="fa fa-building green bigger-110"></i>&nbsp;
													<span>Comercial</span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Teléfono: </div>

												<div class="profile-info-value">
												<i class="fa fa-phone green bigger-110"></i>&nbsp;
													<span>44921212121</span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Cuenta catastral: </div>

												<div class="profile-info-value">
												<i class="fa fa-map-marker green bigger-110"></i>&nbsp;
													<span>32131321312</span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Manzana - Lote: </div>

												<div class="profile-info-value">
												<i class="fa fa-map-marker green bigger-110"></i>&nbsp;
													<span>256-21</span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name">Servicios existentes: </div>

												<div class="profile-info-value">
												<i class="fa fa-cogs green bigger-110"></i>&nbsp;
													<span>Agua, Alumbrado, Drenaje</span>
												</div>
											</div>

										</div>
									</div>
								</div>

								<div id="dimensiones" class="tab-pane fade">
									<div class="message-container">
										<div id="id-message-list-navbar" class="message-navbar clearfix">
											<div class="message-bar">
												<div class="message-infobar" id="id-message-infobar">
													<span style="display: block;" class="blue bigger-150">Dimensiones del establecimiento</span>
												</div>
											</div>
										</div>
										<div class="profile-user-info profile-user-info-striped">
											<div class="profile-info-row">
												<div class="profile-info-name"> Frente x Fondo: </div>

												<div class="profile-info-value">
													<i class="fa fa-map-marker red bigger-110"></i>&nbsp;
													<span>10 mts. x 10 mts.</span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Costado derecho: </div>

												<div class="profile-info-value">
													<i class="fa fa-map-marker red bigger-110"></i>&nbsp;
													<span>10 mts.</span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Costado izquierdo: </div>

												<div class="profile-info-value">
													<i class="fa fa-map-marker red bigger-110"></i>&nbsp;
													<span>10 mts.</span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Superficie del terreno: </div>

												<div class="profile-info-value">
												<i class="fa fa-map-marker red bigger-110"></i>&nbsp;
													<span>100 mts<sup>2</sup>.</span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Superficie del local: </div>

												<div class="profile-info-value">
												<i class="fa fa-map-marker red bigger-110"></i>&nbsp;
													<span>50 mts<sup>2</sup>.</span>
												</div>
											</div>

											<div class="profile-info-row">
												<div class="profile-info-name"> Cuenta predial: </div>

												<div class="profile-info-value">
												<i class="fa fa-home red bigger-110"></i>&nbsp;
													<span>9895652323164</span>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div id="documentos" class="tab-pane fade">
									<div class="message-container">
										<div id="id-message-list-navbar" class="message-navbar clearfix">
											<div class="message-bar">
												<div class="message-infobar" id="id-message-infobar">
													<span class="blue bigger-150">Documentación</span>
												</div>
											</div>
										</div>

										<div style="display: flex; flex-wrap: wrap; justify-content: space-around;">
											<div class="center">
												<h1>
													<a href="">
														<span class="danger bigger-125">
															<i class="ace-icon fa fa-file-pdf-o"></i>
														</span>
													</a>
													<br>
												</h1>
												<h6 class="center"><a href="">Escrituras</a></h6>
											</div>

											<div class="center">
												<h1>
													<a href="">
														<span class="danger bigger-125">
															<i class="ace-icon fa fa-file-image-o"></i>
														</span>
													</a>
													<br>
												</h1>
												<h6 class="center"><a href="">Recibo predial</a></h6>
											</div>

											<div class="center">
												<h1>
													<a href="">
														<span class="danger bigger-125">
															<i class="ace-icon fa fa-file-pdf-o"></i>
														</span>
													</a>
													<br>
												</h1>
												<h6 class="center"><a href="">Contrato de arrendamiento</a></h6>
											</div>

											<div class="center">
												<h1>
													<a href="">
														<span class="danger bigger-125">
															<i class="ace-icon fa fa-file-image-o"></i>
														</span>
													</a>
													<br>
												</h1>
												<h6 class="center"><a href="">INE</a></h6>
											</div>

											<div class="center">
												<h1>
													<a href="">
														<span class="danger bigger-125">
															<i class="ace-icon fa fa-file-image-o"></i>
														</span>
													</a>
													<br>
												</h1>
												<h6 class="center"><a href="">Número oficial</a></h6>
											</div>
										</div>

										<div class="message-footer clearfix"></div>
									</div>
								</div>

							</div><!-- /.tab-content -->
							<br>
						</div><!-- /.tabbable -->
					</div>
				</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-secondary pull-left" data-dismiss="modal"><i class="fa fa-times">&nbsp;</i>Cerrar</button>

				<button type="button" class="btn btn-danger" onclick="rechazar(<?=$id?>);"><i class="fa fa-ban">&nbsp;</i>Rechazar Solicitud</button>

				<button type="button" class="btn btn-success" onclick="aprobar(<?=$id?>, <?=$ausencia?>);"><i class="fa fa-check">&nbsp;</i>Aprobar Solicitud</button>
			</div>

		</div>
	</div>
</div>