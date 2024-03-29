<?php
session_start();
if($_SESSION['cargo']=='VENDEDOR')
{
    // echo '<script>alert("Usted no tiene acceso a este espacio.");</script>';
    echo '<script>window.location.href = window.location.href;</script>';
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/productos.css">
    <script src="js/procesos_productos.js"></script>
    <title>Document</title>
</head>
<body>

    <div id="conteiner">
        
        <div class="listado">
        <div class="todos">
                    <label for="">Todos los productos</label>
                    <div class="todos_todos">
                    <fieldset class="filtros_pro">
                        <legend>Filtros</legend>
                            <div class="buscar_pro">
                            <select name="tdesa" id="tdesa" class="bus" > 
                                <option value="0">PROD. HABILITADOS</option>
                                <option value="1">PROD. DESHABILITADOS</option>
                            </select>
                            </div>
                            <div class="buscar_pro"><select name="tcat" id="tcategoria" class="bus" ></select></div>
                            <div class="buscar_pro"><input type="text" name="bus_nom" id="bus_nom" class="bus MAYP" placeholder="Buscar por Nombre"></div>
                            <div class="buscar_pro"><input type="text" name="bus_sa" id="bus_sa" class="bus MAYP" placeholder="Buscar por Sabores"></div>
                    </fieldset>
                    </div>
                    <div id="listado"> 
                    <table>
                        <thead>
                            <tr>
                                <th>Categoria</th>
                                <th>Nombre</th>
                                <th>Sabores</th>
                                <th>Unidad Medida</th>
                                <th>Precio</th>
                                <th>Stock</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody id="cuerpo_tabla_productos">
                            
                        </tbody>
                    </table>
            </div>
        </div>
       </div>
       <div class="mantenimiento">
                <label>Mantenimiento Producto</label><br>
                <input type="text" id="tcod">
                <h6>CATEGORIA</h6><select name="tcat" id="tcat" class="cajas-pro cajas MAYP"></select></select><div id="ir_cat" class="ir_cat ir"> <img src="img/agregar.png" id="icon-suma" ></div>
                <h6>PRODUCTO</h6><input type="text" name="tnom_pro" id="tnom_pro" class="cajas-pro MAYP" placeholder="Ingrese nombre">
                <h6>SABOR</h6><input type="text" name="tsabor" id="tsabor" class="cajas-pro MAYP" placeholder="Ingrese sabor">
                <h6>UNIDAD</h6><select name="tuni" id="tuni" class="cajas-pro MAYP"></select></select>
                <h6>PRECIO VENTA</h6><input type="text" name="tpre" id="tpre" class="cajas-pro NUMP" placeholder="Ingrese precio de Venta">
                <h6>PRECIO COMPRA</h6><input type="text" name="tprec" id="tprec" class="cajas-pro NUMP" placeholder="Ingrese precio de Compra">
                <h6>STOCK MINIMO</h6><input type="text" name="tstock_min" id="tstock_min" class="cajas-pro NUMP" placeholder="Ingrese Stock Minimo">
                <h6>STOCK</h6><input type="text" name="tstock" id="tstock" class="cajas-pro NUMP" placeholder="Ingrese Stock">
                
                <div class="botones">
                <input type="button" value="Nuevo" class="btn-nuevo  btn" id="bnuevo_pro">  
                <input type="button" value="Guardar" class="btn-guardar btn" id="bguardar_pro">
                <input type="button" value="Actualizar" class="btn-modificar btn" id="bmodificar_pro">
                <input type="button" value="Cancelar" class="btn-cancelar btn" id="bcancelar_pro">
                </div>
                
       </div> 
    </div>
    <div class="fondo"></div>
    <!--Ventana modal de agregar nueva categoria-->
    <div class="modal">
        <img src="img/cerrar2.svg" alt="" class="cerrar_modal">
        <label>Agregar nueva categoria</label><br>
        <input type="text" name="tnom_cat" id="tnom_cat" class="MAYP" placeholder="Ingrese Nombre de categoria"><br>
        <input type="button" value="Guardar" id="bguardar_cat">
    </div>

    <div id="sombra_modal_pro" class="sombra_modal_pro">
        
    </div>
    <div id="caja_modal_pro" class="caja_modal_pro">
        <p id="nampro" class="msjpro"> </p>
        <button id="bapro" class="botpro bop"> ACEPTAR</button>   
        <button id="bcpro"class="botpro2 bop"> CANCELAR</button>
        <input type="hidden" name="" id="idcpro">
        <input type="hidden" name="" id="estpromo">
    </div>

</body>
</html>