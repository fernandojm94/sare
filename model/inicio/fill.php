<?php

function fill_menu($tipo_usuario)
{
	switch ($tipo_usuario) {
	  	case 1:
		    $menu='<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-book"></i>

							<span class="menu-text">
								Solicitudes
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="javascript:cambiarcont(\'view/solicitud/listado.php?pantalla=1\');">
									<i class="menu-icon fa fa-caret-right"></i>
									Listado de solicitudes
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>


					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-book"></i>

							<span class="menu-text">
								SEDATUM
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="">
								<a href="javascript:cambiarcont(\'view/sedatum/ventanilla.php?pantalla=2\');">
									<i class="menu-icon fa fa-caret-right"></i>
									Ventanilla Única
								</a>

								<b class="arrow"></b>
							</li>


							<li class="">
								<a href="javascript:cambiarcont(\'view/sedatum/uso_suelo.php?pantalla=4\');">
									<i class="menu-icon fa fa-caret-right"></i>
									Uso de Suelo
								</a>

								<b class="arrow"></b>
							</li>


							<li class="">
								<a href="javascript:cambiarcont(\'view/sedatum/director.php?pantalla=5\');">
									<i class="menu-icon fa fa-caret-right"></i>
									Director
								</a>

								<b class="arrow"></b>
							</li>


							<li class="">
								<a href="javascript:cambiarcont(\'view/sedatum/secretario.php?pantalla=6\');">
									<i class="menu-icon fa fa-caret-right"></i>
									Secretario
								</a>

								<b class="arrow"></b>
							</li>

						</ul>

					</li>


					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-folder-open"></i>

							<span class="menu-text">
								Anexos
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="javascript:cambiarcont(\'view/anexos/listado.php?pantalla=8\');">
									<i class="menu-icon fa fa-caret-right"></i>
									Listado
								</a>

								<b class="arrow"></b>
							</li>							
						</ul>
					</li>

					<li class="nav-divider"></li>
					<li class="nav-divider"></li>


					<li class="">
						<a href="javascript:cambiarcont(\'view/usuarios/listado.php\')">
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text"> Usuarios </span>
						</a>
						<b class="arrow"></b>
					</li>';
		    break;
	  	case 2:
		    $menu='<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-book"></i>

							<span class="menu-text">
								Solicitudes
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="javascript:cambiarcont(\'view/solicitud/listado.php?pantalla=1\');">
									<i class="menu-icon fa fa-caret-right"></i>
									Listado de solicitudes
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>';
		    break;
	  	case 3:
		    $menu='<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-book"></i>

							<span class="menu-text">
								SEDATUM
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="">
								<a href="javascript:cambiarcont(\'view/sedatum/ventanilla.php?pantalla=2\');">
									<i class="menu-icon fa fa-caret-right"></i>
									Ventanilla Única
								</a>

								<b class="arrow"></b>
							</li>
						</ul>

					</li>';
		    break;
		case 4:
		    $menu='	<li class="">
		    			<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-book"></i>

							<span class="menu-text">
								SEDATUM
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="">
								<a href="javascript:cambiarcont(\'view/sedatum/uso_suelo.php?pantalla=4\');">
									<i class="menu-icon fa fa-caret-right"></i>
									Uso de Suelo
								</a>

								<b class="arrow"></b>
							</li>
						</ul>

					</li>';
		    break;
		case 5:
		    $menu='	<li class="">
		    			<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-book"></i>

							<span class="menu-text">
								SEDATUM
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="javascript:cambiarcont(\'view/sedatum/director.php?pantalla=5\');">
									<i class="menu-icon fa fa-caret-right"></i>
									Director
								</a>

								<b class="arrow"></b>
							</li>
						</ul>

					</li>';
		    break;
		case 6:
		    $menu='	<li class="">
		    			<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-book"></i>

							<span class="menu-text">
								SEDATUM
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="javascript:cambiarcont(\'view/sedatum/secretario.php?pantalla=6\');">
									<i class="menu-icon fa fa-caret-right"></i>
									Secretario
								</a>

								<b class="arrow"></b>
							</li>
						</ul>

					</li>';
		    break;
		case 7:
		    $menu='<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-folder-open"></i>

							<span class="menu-text">
								Anexos
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="javascript:cambiarcont(\'view/anexos/listado.php?pantalla=8\');">
									<i class="menu-icon fa fa-caret-right"></i>
									Listado
								</a>

								<b class="arrow"></b>
							</li>							
						</ul>
					</li';
		    break;
	}
	return $menu;
}