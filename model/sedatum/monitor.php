<?php
    $pantalla= $_GET['pantalla'];
    header('Content-Type: text/event-stream');
    header('Cache-Control: no-cache');
           
    //pones tu cotorreo para la busqueda de nuevos registros. Por ejemplo
    /*$b = $db->query("SELECT estatus FROM tabla WHERE estatus = 'En_Proceso'");
    
    $total = mysqli_num_rows($b);*/
    //si no hay nuevos registros 
    $total = 879832;
    if($total <=0){
        echo "data: <i class=\"ace-icon fa fa-bell icon-animated-bell\"></i><span class=\"badge\">0</span></a><ul class=\"dropdown-menu-right dropdown-navbar navbar-green dropdown-menu dropdown-caret dropdown-close\"><li class=\"dropdown-header\"><i class=\"ace-icon fa fa-check\"></i>Todo en orden</li><li class=\"dropdown-content\"><ul class=\"dropdown-menu dropdown-navbar navbar-pink\"></ul><li></ul> \n\n";

    //si existen nuevos registros
    }else{
        echo "data: <a data-toggle=\"dropdown\" class=\"dropdown-toggle\" href=\"#\"><i class=\"ace-icon fa fa-bell icon-animated-bell\"></i><span class=\"badge badge-important\">$total</span></a><ul class=\"dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close\"><li class=\"dropdown-header\"><i class=\"ace-icon fa fa-exclamation-triangle\"></i>$total Nuevas Solicitudes</li><li class=\"dropdown-content\"><ul class=\"dropdown-menu dropdown-navbar navbar-pink\"></ul></li><li class=\"dropdown-footer\"><a href=\"inicio.php\">Ver las Nuevas Solicitudes<i class=\"ace-icon fa fa-arrow-right\"></i></a></li></ul> \n\n";
    }
    flush();
    sleep(10);
?>