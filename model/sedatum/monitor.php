<?php
    include('../../controller/monitor/funciones_monitor.php');
    $pantalla= $_GET['pantalla'];
    header('Content-Type: text/event-stream');
    header('Cache-Control: no-cache');
    switch ($pantalla) {
        case 1:
            $buscar = "pagos";
            break;
        case 2:
            $buscar = "ventanilla";
            break;
        case 4:
            $buscar = "suelo";
            break;
        case 5:
            $buscar = "director";
            break;
        case 6:
            $buscar = "secretario";
            break;
        default :
        $buscar = " ";
    }
    if($buscar != " ")
    {
        $total = fill_pendientes($buscar);              
    }else{
        $total = 0;    
    }
    
 
    if($total <=0){
        echo "data: <a data-toggle=\"dropdown\" class=\"dropdown-toggle\" href=\"#\"><i class=\"ace-icon fa fa-bell icon-animated-bell\"></i><span class=\"badge\"><input type=\"hidden\" id=\"noti\" name=\"noti\" value=\"0\"/>0</span></a><ul class=\"dropdown-menu-right dropdown-navbar navbar-green dropdown-menu dropdown-caret dropdown-close\"><li class=\"dropdown-header\"><i class=\"ace-icon fa fa-check\"></i>Todo en orden</li><li class=\"dropdown-content\"><ul class=\"dropdown-menu dropdown-navbar navbar-pink\"></ul><li></ul> \n\n";

    //si existen nuevos registros
    }else{
        echo "data: <a data-toggle=\"dropdown\" class=\"dropdown-toggle\" href=\"#\"><i class=\"ace-icon fa fa-bell icon-animated-bell\"></i><span class=\"badge badge-important\"><input type=\"hidden\" id=\"noti\" name=\"noti\" value=\"1\"/>$total</span></a><ul class=\"dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close\"><li class=\"dropdown-header\"><i class=\"ace-icon fa fa-exclamation-triangle\"></i>$total Nuevas Solicitudes</li><li class=\"dropdown-content\"><ul class=\"dropdown-menu dropdown-navbar navbar-pink\"></ul></li><li class=\"dropdown-footer\"><a href=\"inicio.php\">Ver las Nuevas Solicitudes<i class=\"ace-icon fa fa-arrow-right\"></i></a></li></ul> \n\n";
    }
    flush();
?>