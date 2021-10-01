<?php
include("../../model/solicitud/fill.php");
 $select_municipio = ' <option value="">Seleccionar una opción</option>
                <option value="Aguascalientes">Aguascalientes</option>
                <option value="Asientos">Asientos</option>
                <option value="Calvillo">Calvillo</option>
                <option value="Cosio">Cosio</option>
                <option value="Jesus Maria">Jesus Maria</option>
                <option value="Pabellon de Arteaga">Pabellon de Arteaga</option>
                <option value="Rincon de Romos">Rincon de Romos</option>
                <option value="San Jose de Gracia">San Jose de Gracia</option>
                <option value="Tepezala">Tepezala</option>
                <option value="El Llano">El Llano</option>
                <option value="San Francisco de los Romo">San Francisco de los Romo</option>';

$select_estado = '
      <option value="">Seleccionar estado...</option>
      <option value="Aguascalientes">Aguascalientes</option>
      <option value="Baja California">Baja California</option>
      <option value="Baja California Sur">Baja California Sur</option>
      <option value="Campeche">Campeche</option>
      <option value="Chiapas">Chiapas</option>
      <option value="Chihuahua">Chihuahua</option>
      <option value="CDMX">Ciudad de México</option>
      <option value="Coahuila">Coahuila</option>
      <option value="Colima">Colima</option>
      <option value="Durango">Durango</option>
      <option value="Estado de México">Estado de México</option>
      <option value="Guanajuato">Guanajuato</option>
      <option value="Guerrero">Guerrero</option>
      <option value="Hidalgo">Hidalgo</option>
      <option value="Jalisco">Jalisco</option>
      <option value="Michoacán">Michoacán</option>
      <option value="Morelos">Morelos</option>
      <option value="Nayarit">Nayarit</option>
      <option value="Nuevo León">Nuevo León</option>
      <option value="Oaxaca">Oaxaca</option>
      <option value="Puebla">Puebla</option>
      <option value="Querétaro">Querétaro</option>
      <option value="Quintana Roo">Quintana Roo</option>
      <option value="San Luis Potosí">San Luis Potosí</option>
      <option value="Sinaloa">Sinaloa</option>
      <option value="Sonora">Sonora</option>
      <option value="Tabasco">Tabasco</option>
      <option value="Tamaulipas">Tamaulipas</option>
      <option value="Tlaxcala">Tlaxcala</option>
      <option value="Veracruz">Veracruz</option>
      <option value="Yucatán">Yucatán</option>
      <option value="Zacatecas">Zacatecas</option>
';

    $persona =array_keys($_POST);

    if(strpos($persona[0], '-'))
    {        
        $pfisica = explode('-', $persona[0]);        
        $pfisica = fill_pfisica_rfc($pfisica[1]);
        $select_municipio.= "<option value='".$pfisica['municipio']."' selected>".$pfisica['municipio']."</option>'";
        $select_estado.= "<option value='".$pfisica['estado']."' selected>".$pfisica['estado']."</option>'";
        $readonly = "readonly";
        $disabled = "disabled";

        $switch = '<div class="form-group">
                        <label class="col-md-4 control-label">¿Editar datos?<FONT COLOR="red">*</FONT></label>
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <label>
                                    <input name="switch_edit" id="switch_edit" class="ace ace-switch ace-switch-7" type="checkbox" />
                                    <span class="lbl"></span>
                                </label>
                            </div>
                        </div>
                    </div>';

    }else{
        $pfisica['id'] = $pfisica['nombre_completo'] = $pfisica['calle'] = $pfisica['no_exterior'] = $pfisica['no_interior'] = $pfisica['colonia'] = $pfisica['municipio'] = $pfisica['localidad'] = $pfisica['c_p'] = $pfisica['rfc'] = $pfisica['curp'] = $pfisica['telefono'] = $pfisica['email'] = $readonly = $disabled = $switch = '';        
    }
?>

<input  name="id_pfisica" id="id_pfisica" type="hidden" value="<?php echo $pfisica['id'];?>"/>

<!-- Imprime el switch según sea el caso -->
<?= $switch; ?>

<div class="form-group">
    <label class="col-md-4 control-label">Calle</label>
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
            <input  name="calle" id="calle" placeholder="Calle" class="form-control" type="text" value="<?php echo $pfisica['calle'];?>" required <?=$readonly?>/>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">No. Exterior - No. Interior</label>  
    <div class="col-md-2 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
            <input  name="no_ex" id="no_ex" placeholder="No. Exterior" class="form-control" type="number" value="<?php echo $pfisica['no_exterior'];?>" required <?=$readonly?>/>
        </div>
    </div>
    
    <div class="col-md-2 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
            <input  name="no_int" id="no_int" placeholder="No. Interior" value="<?php echo $pfisica['no_interior'];?>" class="form-control" type="text" <?=$readonly?>/>
        </div>
    </div>

</div>

<div class="form-group">
    <label class="col-md-4 control-label">Colonia</label>  
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
            <input  name="colonia" id="colonia" placeholder="Colonia" value="<?php echo $pfisica['colonia'];?>" class="form-control" type="text" required <?=$readonly?>/>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Municipio</label>  
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
            <select name="municipios" name="municipio" id="municipio" placeholder="Municipio" class="form-control" type="text" required <?=$disabled?>>

               <?php echo $select_municipio;?> 
            </select>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Localidad</label>  
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
            <input  name="localidad" id="localidad" placeholder="Localidad" value="<?php echo $pfisica['localidad'];?>" class="form-control" type="text" required <?=$readonly?>/>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Estado</label>  
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
             <select class="form-control" name="estado_f" id="estado_f" required <?=$disabled?>/>
            <?= $select_estado ?>
             </select>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Código Postal</label>  
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
            <input name="cp" id="cp" placeholder="Código Postal" value="<?php echo $pfisica['c_p'];?>" class="form-control mask_cp" type="text" maxlength="5" required <?=$readonly?>/>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">RFC</label>  
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input name="rfc" id="rfc" placeholder="RFC" class="form-control mask_rfc_fis" value="<?php echo $pfisica['rfc'];?>" type="text" onchange="mayus(this);" required <?=$readonly?>/>
        </div>
    </div>
</div>


<div class="form-group">
    <label class="col-md-4 control-label">CURP</label>  
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input name="curp_fis" id="curp_fis" placeholder="CURP" value="<?php echo $pfisica['curp'];?>" class="form-control mask_curp" type="text" onchange="mayus(this);" required <?=$readonly?>/>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Teléfono</label>  
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
            <input name="telefono" id="telefono" placeholder="Teléfono" value="<?php echo $pfisica['telefono'];?>" class="form-control mask_tel" type="tel" maxlength="10" required <?=$readonly?>/>
        </div>
    </div>
</div>



<div class="form-group">
    <label class="col-md-4 control-label">Email</label>  
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-at"></i></span>
            <input name="email" id="email" placeholder="Email" value="<?php echo $pfisica['email'];?>" class="form-control" type="email" required <?=$readonly?>/>
        </div>
    </div>
</div>