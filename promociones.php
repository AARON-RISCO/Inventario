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
    <link rel="stylesheet" href="css/promociones.css">
    <script src="js/procesos_promociones.js"></script>
    <title>Document</title>
</head>
<body>

    <div id="conteiner">
        
        <div class="listado">
        <div class="todos">
                    <label for="" id="todos_promo">Todas las Promociones</label> <label for="" id="ruta"></label>
                    <div class="todos_todos">
                    <fieldset class="filtros_promo">
                        <legend>Filtros</legend>
                            <div class="buscar_promo"><input type="text" name="bus_nom" id="bus_nom" class="bus MTU" placeholder="Buscar por Producto"></div>
                            <div class="buscar_promo"><input type="text" name="bus_sa" id="bus_sa" class="bus MTU" placeholder="Buscar por Sabores"></div>         
                    </fieldset>
                    </div>
                    <div id="listado"> 
                    <table>
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Sabor</th>
                                <th>Cantidad</th>
                                <th>Precios</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody id="cuerpo_tabla_promociones">
                            
                        </tbody>
                    </table>
            </div>
        </div>
       </div>
       <div class="mantenimiento">
                <label>Mantenimiento Promociones</label><br>
                <input type="text" id="tcod">
                <input type="text" id="tcod_pro" >
                <h5>Producto</h5><input type="text" name="tnom" id="tnom" class="cajas-promo MTU" placeholder="Producto"><img src="img/buscar.svg" alt=""  class="bus_promo">
                <h5>Sabor</h5><img src="" alt=""  class="da-promo"><input type="text" name="tsa" id="tsa" class="cajas-promo MTU" placeholder="Sabor">
                <h5>Cantidad</h5><img src="" alt=""  class="da-promo"><input type="text" name="tcan" id="tcan" class="cajas-promo NUM" placeholder="Ingrese Cantidad">
                <h5>Precio</h5><img src="" alt=""  class="da-promo"><input type="text" name="tpre" id="tpre" class="cajas-promo MPRE" placeholder="Ingrese Precio">
                
                <div class="botones">
                <input type="button" value="Nuevo" class="btn-nuevo  btn" id="bnuevo_promo">
                <input type="button" value="Guardar" class="btn-guardar btn" id="bguardar_promo">
                <input type="button" value="Actualizar" class="btn-modificar btn" id="bmodificar_promo">
                <input type="button" value="Cancelar" class="btn-cancelar btn" id="bcancelar_promo">
                </div>
                
       </div> 
    </div>
    <div class="fondo"></div>
   
    </div>
    
    <!--Ventana modal de agregar nueva categoria-->
    <div class="modal">
    <img src="img/cerrar2.svg" alt="" class="cerrar_modal">
    <label for="">Seleccione un producto</label>
    <div class="filtrar_pro">
    <fieldset class="filtrar">
        <legend>Buscar</legend>
            <div class="buscar_pro"><input type="text" name="buscar" id="buscar" class="bus MTU" placeholder="Buscar por Producto"></div>      
    </fieldset>
        <div id="productos"> 
                <table>
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Sabor</th>
                            <th>Precio</th>
                            <th>Seleccionar</th>
                        </tr>
                    </thead>
                    <tbody id="cuerpo_tabla_productos">
                        
                    </tbody>
                </table>
        </div>
    </div>
</body>
</html>