<?php
include("../../model/solicitud/fill.php");

$select_estado = '
    <option value="">Seleccionar una opción</option>
    <option value="Aguascalientes">Aguascalientes</option>
    <option value="Baja California">Baja California</option>
    <option value="Baja California Sur">Baja California Sur</option>
    <option value="Campeche">Campeche</option>
    <option value="Coahuila de Zaragoza">Coahuila de Zaragoza</option>
    <option value="Colima">Colima</option>
    <option value="Chiapas">Chiapas</option>
    <option value="Chihuahua">Chihuahua</option>
    <option value="Distrito Federal">Distrito Federal</option>
    <option value="Durango">Durango</option>
    <option value="Guanajuato">Guanajuato</option>
    <option value="Guerrero">Guerrero</option>
    <option value="Hidalgo">Hidalgo</option>
    <option value="Jalisco">Jalisco</option>
    <option value="México">México</option>
    <option value="Michoacán de Ocampo">Michoacán de Ocampo</option>
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
    <option value="Veracruz de Ignacio de la Llave">Veracruz de Ignacio de la Llave</option>
    <option value="Yucatán">Yucatán</option>
    <option value="Zacatecas">Zacatecas</option>
';

$persona_m =array_keys($_POST);

if(strpos($persona_m[0], '-'))
    {        
        $pmoral = explode('-', $persona_m[0]);        
        $pmoral = fill_pmoral_rfc($pmoral[1]);
        $select_estado.= "<option value='".$pmoral['estado']."' selected>".$pmoral['estado']."</option>'";
        $read = "readonly";
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
        $pmoral['id'] = $pmoral['nombre_empresa'] = $pmoral['fecha_constitucion'] = $pmoral['rfc_empresa'] = $pmoral['telefono_empresa'] = $pmoral['email_empresa'] = $pmoral['nombre_rl'] = $pmoral['rfc_rl'] = $pmoral['curp'] = $pmoral['calle'] = $pmoral['no_exterior'] = $pmoral['no_interior'] = $pmoral['colonia'] = $pmoral['estado'] = $pmoral['municipio'] = $pmoral['localidad'] = $pmoral['cp'] = $pmoral['telefono_rl'] = $pmoral['email_rl'] = $read = $disabled = $switch = '';        
    }
?>

<input type="hidden" name="id_pmoral" id="id_pmoral" value="<?= $pmoral['id']?>">

<?= $switch ?>

<div class="form-group">
    <label class="col-md-4 control-label">Fecha de constitución</label>  
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-building"></i></span>
            <input  name="fecha_constitucion" id="fecha_constitucion" placeholder="Fecha de constitución" class="form-control date_picker" value="<?= $pmoral['fecha_constitucion']?>" type="text" required <?= $read; ?>/>
        </div>
    </div>
</div>


<div class="form-group">
    <label class="col-md-4 control-label">RFC</label>  
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-building"></i></span>
            <input name="rfc_pm" id="rfc_pm" placeholder="RFC" class="form-control mask_rfc_mor" type="text" onchange="mayus(this);" value="<?= $pmoral['rfc_empresa'] ?>" required <?= $read; ?>/>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Teléfono</label>  
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
            <input name="telefono_pm" id="telefono_pm" placeholder="Teléfono" class="form-control mask_tel" type="tel" value="<?= $pmoral['telefono_empresa'] ?>" required <?= $read; ?>/>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Email</label>  
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-at"></i></span>
            <input name="email_pm" id="email_pm" placeholder="Email" class="form-control" type="email" value="<?= $pmoral['email_empresa'] ?>" required <?= $read; ?>/>
        </div>
    </div>
</div>

<h3 class="header smaller lighter center">
    <small>Datos Representante Legal</small>
</h3>


<div class="form-group">
    <label class="col-md-4 control-label">Nombre completo</label>  
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input  name="nombre_rl" id="nombre_rl" placeholder="Nombre completo" class="form-control" type="text" value="<?= $pmoral['nombre_rl'] ?>" required <?= $read; ?>/>
        </div>
    </div>
</div>


<div class="form-group">
    <label class="col-md-4 control-label">RFC</label>  
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input name="rfc_rl" id="rfc_rl" placeholder="RFC" class="form-control mask_rfc_fis" type="text" onchange="mayus(this);" value="<?= $pmoral['rfc_rl'] ?>" required <?= $read; ?>/>
        </div>
    </div>
</div>


<div class="form-group">
    <label class="col-md-4 control-label">CURP</label>  
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input name="curp_rl" id="curp_rl" placeholder="CURP" class="form-control mask_curp" type="text" onchange="mayus(this);" value="<?= $pmoral['curp'] ?>" required <?= $read; ?>/>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Calle</label>
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
            <input  name="calle_rl" id="calle_rl" placeholder="Calle" class="form-control" type="text" value="<?= $pmoral['calle'] ?>" required <?= $read; ?>/>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">No. Exterior - No. Interior</label>  
    <div class="col-md-2 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
            <input  name="no_ex_rl" id="no_ex_rl" placeholder="No. Exterior" class="form-control" type="number" value="<?= $pmoral['no_exterior'] ?>" required <?= $read; ?>/>
        </div>
    </div>
    
    <div class="col-md-2 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
            <input  name="no_int_rl" id="no_int_rl" placeholder="No. Interior" class="form-control" type="text" value="<?= $pmoral['no_interior'] ?>" <?= $read; ?>/>
        </div>
    </div>

</div>

<div class="form-group">
    <label class="col-md-4 control-label">Colonia</label>  
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
            <input  name="colonia_rl" id="colonia_rl" placeholder="Colonia" class="form-control" type="text" value="<?= $pmoral['colonia'] ?>" required <?= $read; ?>/>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Estado</label>  
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
            <select name="estado_rl" id="estado_rl" placeholder="Localidad" class="form-control" type="text" value="<?= $pmoral[''] ?>" required <?= $read; ?>>
                <?= $select_estado; ?>
            </select>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Municipio</label>  
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
            <input  name="municipio_rl" id="municipio_rl" placeholder="Municipio" class="form-control" type="text" value="<?= $pmoral['municipio'] ?>" required <?= $read; ?>/>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Localidad</label>  
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
            <input  name="localidad_rl" id="localidad_rl" placeholder="Localidad" class="form-control" type="text" value="<?= $pmoral['localidad'] ?>" required <?= $read; ?>/>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Código Postal</label>  
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
            <input name="cp_rl" id="cp_rl" placeholder="Código Postal" class="form-control mask_cp" type="text" value="<?= $pmoral['cp'] ?>" required <?= $read; ?>/>
        </div>
    </div>
</div>


<div class="form-group">
    <label class="col-md-4 control-label">Teléfono</label>  
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
            <input name="telefono_rl" id="telefono_rl" placeholder="Teléfono" class="form-control mask_tel" type="tel" value="<?= $pmoral['telefono_rl'] ?>" required <?= $read; ?>/>
        </div>
    </div>
</div>



<div class="form-group">
    <label class="col-md-4 control-label">Email</label>  
    <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-at"></i></span>
            <input name="email_rl" id="email_rl" placeholder="Email" class="form-control" type="email" value="<?= $pmoral['email_rl'] ?>" required <?= $read; ?>/>
        </div>
    </div>
</div>