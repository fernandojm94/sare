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

    $persona =array_keys($_POST);

    if(strpos($persona[0], '-'))
    {        
        $pfisica = explode('-', $persona[0]);        
        $pfisica = fill_pfisica_rfc($pfisica[1]);
        $select_municipio.= "<option value='".$pfisica['municipio']."' selected>".$pfisica['municipio']."</option>'";
        $readonly = "readonly";
        $disabled = "disabled";
    }else{
        $pfisica['id'] = $pfisica['nombre_completo'] = $pfisica['calle'] = $pfisica['no_exterior'] = $pfisica['no_interior'] = $pfisica['colonia'] = $pfisica['municipio'] = $pfisica['localidad'] = $pfisica['c_p'] = $pfisica['rfc'] = $pfisica['curp'] = $pfisica['telefono'] = $pfisica['email'] = $readonly = $disabled = '';        
    }
?>
<div class="form-group">
    <label class="col-md-4 control-label">¿Editar datos?<FONT COLOR="red">*</FONT></label>
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <label>
                <input name="switch_edit" id="switch_edit" class="ace ace-switch ace-switch-7" type="checkbox" />
                <span class="lbl"></span>
            </label>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Calle</label>
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
            <input  name="id_pfisica" id="id_pfisica" type="hidden" value="<?php echo $pfisica['id'];?>"/>
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
            <input  name="no_int" id="no_int" placeholder="No. Interior" value="<?php echo $pfisica['no_interior'];?>" class="form-control" type="number" <?=$readonly?>/>
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
    <label class="col-md-4 control-label">Código Postal</label>  
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
            <input name="cp" id="cp" placeholder="Código Postal" value="<?php echo $pfisica['c_p'];?>" class="form-control mask_cp" type="text" required <?=$readonly?>/>
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
            <input name="telefono" id="telefono" placeholder="Teléfono" value="<?php echo $pfisica['telefono'];?>" class="form-control mask_tel" type="tel" required <?=$readonly?>/>
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