<?php
include("../conexion/conexion.php");
$opcion=$_GET['opcion'];
if($opcion=="listar"){

    $con_listar_v="SELECT t1.*,t3.ape_per,t3.nom_per
                   FROM compra as t1 , personal as t3
                   WHERE t3.dni_per=t1.dni_per  
                   ORDER BY t1.cod_compra ASC";
    $res=mysqli_query($cnn,$con_listar_v);
    
    if(isset($_GET['name'])){
            $name=$_GET['name'];
            $con_listar_v="SELECT t1.*,t3.ape_per,t3.nom_per
                            FROM compra as t1 , personal as t3
                            WHERE t3.dni_per=t1.dni_per AND t3.nom_per LIKE CONCAT(?, '%')  
                            ORDER BY t1.cod_compra ASC";

            // Utilizar parámetros preparados para evitar inyección de SQL
            $stmt = mysqli_prepare($cnn, $con_listar_v);
            mysqli_stmt_bind_param($stmt, 's' ,$name);
            mysqli_stmt_execute($stmt);
            // Ejecutar la consulta preparada
            $res = mysqli_stmt_get_result($stmt);
    }
    if(isset($_GET['fe1'])){
                $fei=$_GET['name'];
                $fef=$_GET['fe1'];

                $con_listar_v="SELECT t1.*,t3.ape_per,t3.nom_per
                            FROM compra as t1 , personal as t3
                            WHERE t1.fecha_compra BETWEEN ? and ? AND t3.dni_per=t1.dni_per 
                            ORDER BY t1.cod_compra ASC";

                // Utilizar parámetros preparados para evitar inyección de SQL
                $stmt = mysqli_prepare($cnn, $con_listar_v);
                mysqli_stmt_bind_param($stmt, 'ss' ,$fei,$fef);
                mysqli_stmt_execute($stmt);
        
                $res = mysqli_stmt_get_result($stmt);        
    }


    $num = mysqli_num_rows($res);

    
    if ($num >= 1) {
        while ($f = mysqli_fetch_array($res)) {
            $json[] = array(
                "codc" => $f['cod_compra'],
                "nomp" => $f['nom_per']." ".$f['ape_per'],
                "fecc" => $f['fecha_compra'],
                "totc" => $f['total_general'],
            );
        }
        $jsonresponse = json_encode($json, JSON_UNESCAPED_UNICODE);
    } else {
        $jsonresponse = "vacio";
    }
    echo $jsonresponse;


}

if($opcion=="listar_detalle"){
        $cod=$_GET['cod'];
        $con_lisd="SELECT t1.*,t2.nom_pro
                   FROM  detalle_compra as t1, producto as t2
                   WHERE t1.cod_compra=$cod and t1.id_pro=t2.id_pro ";
        $res=mysqli_query($cnn,$con_lisd);
        $num = mysqli_num_rows($res);
    
        if ($num >= 1) {
            while ($f = mysqli_fetch_array($res)) {
                $json[] = array(
                    "nompr" => $f['nom_pro'],
                    "preco" => $f['pre_compra'],
                    "canti" => $f['cantidad'],
                    "totco" => $f['total'],
                );
            }
            $jsonresponse = json_encode($json, JSON_UNESCAPED_UNICODE);
        } else {
            $jsonresponse = "vacio";
        }
        echo $jsonresponse;
    }



// if($opcion=="listar"){

//     $con_listar_v="SELECT t1.*,t2.ape_cli,t2.nom_cli,t3.ape_per,t3.nom_per, t4.nom_deudor,t4.apellidos_deudor
//                    FROM venta as t1 , cliente as t2, personal as t3, deudores as t4
//                    WHERE  t2.dni_cli=t1.dni_cli and t3.dni_per=t1.dni_per and t4.id_deudor=t1.id_deudor ORDER BY t1.id_venta ASC";
//         $res=mysqli_query($cnn,$con_listar_v);


//     if($_GET['esta'] > 0){
//         $est=$_GET['esta'];
//         $con_listar_v="SELECT t1.*,t2.ape_cli,t2.nom_cli,t3.ape_per,t3.nom_per, t4.nom_deudor,t4.apellidos_deudor
//                        FROM venta as t1 , cliente as t2, personal as t3, deudores as t4
//                        WHERE t1.estado=? and t2.dni_cli=t1.dni_cli and t3.dni_per=t1.dni_per and t4.id_deudor=t1.id_deudor ORDER BY t1.id_venta ASC";
    
            // Utilizar parámetros preparados para evitar inyección de SQL
    //         $stmt = mysqli_prepare($cnn, $con_listar_v);
    //         mysqli_stmt_bind_param($stmt, 'i' ,$est);
    //         mysqli_stmt_execute($stmt);
    
    //         $res = mysqli_stmt_get_result($stmt);

    // }
    // if(isset($_GET['name'])){
    //     $name=$_GET['name'];
    //     $con_listar_v="SELECT t1.*,t2.ape_cli,t2.nom_cli,t3.ape_per,t3.nom_per, t4.nom_deudor,t4.apellidos_deudor
    //                    FROM venta as t1 , cliente as t2, personal as t3, deudores as t4
    //                    WHERE t2.nom_cli LIKE CONCAT(?, '%')  and t2.dni_cli=t1.dni_cli and t3.dni_per=t1.dni_per and t4.id_deudor=t1.id_deudor ORDER BY t1.id_venta ASC";

        // Utilizar parámetros preparados para evitar inyección de SQL
    //     $stmt = mysqli_prepare($cnn, $con_listar_v);
    //     mysqli_stmt_bind_param($stmt, 's' ,$name);
    //     mysqli_stmt_execute($stmt);

    //     $res = mysqli_stmt_get_result($stmt);

    // }
    // if(isset($_GET['fe1'])){
    //         $fei=$_GET['name'];
    //         $fef=$_GET['fe1'];
    //         $con_listar_v="SELECT t1.*,t2.ape_cli,t2.nom_cli,t3.ape_per,t3.nom_per, t4.nom_deudor,t4.apellidos_deudor
    //         FROM venta as t1 , cliente as t2, personal as t3, deudores as t4
    //         WHERE t1.fecha_venta BETWEEN ? and ? AND t2.dni_cli=t1.dni_cli AND t3.dni_per=t1.dni_per AND t4.id_deudor=t1.id_deudor 
    //         ORDER BY t1.id_venta ASC";
    
            

            // Utilizar parámetros preparados para evitar inyección de SQL
    //         $stmt = mysqli_prepare($cnn, $con_listar_v);
    //         mysqli_stmt_bind_param($stmt, 'ss' ,$fei,$fef);
    //         mysqli_stmt_execute($stmt);
    
    //         $res = mysqli_stmt_get_result($stmt);
    
    
    //     }

    // $num = mysqli_num_rows($res);

    
    // if ($num >= 1) {
    //     while ($f = mysqli_fetch_array($res)) {
    //         $json[] = array(
//                 "cod" => $f['id_venta'],
//                 "fec" => $f['fecha_venta'],
//                 "dnic" => $f['dni_cli'],
//                 "dnip" => $f['dni_per'],
//                 "estd" => $f['estado'],
//                 "idde" => $f['id_deudor'],
//                 "neto" => $f['neto'],
//                 "nomc" => $f['nom_cli']." ".$f['ape_cli'],
//                 "nomp" => $f['nom_per']." ".$f['ape_per'],
//                 "nomd" => $f['nom_deudor']." ".$f['apellidos_deudor'],
//             );
//         }
//         $jsonresponse = json_encode($json, JSON_UNESCAPED_UNICODE);
//     } else {
//         $jsonresponse = "vacio";
//     }
//     echo $jsonresponse;

// }

// if($opcion=="listar_detalle"){
//     $cod=$_GET['cod'];
//     $con_lisd="SELECT t1.*,t2.nom_pro,t.*
//                FROM  detalle_venta as t1, producto as t2, venta as t
//                WHERE t1.id_venta=$cod and t1.id_pro=t2.id_pro and t.id_venta=$cod";
//     $res=mysqli_query($cnn,$con_lisd);
//     $num = mysqli_num_rows($res);

//     if ($num >= 1) {
//         while ($f = mysqli_fetch_array($res)) {
//             $json[] = array(
//                 "cant" => $f['cantidad'],
//                 "prec" => $f['precio'],
//                 "icev" => $f['extra'],
//                 "totv" => $f['total_venta'],
//                 "nopr" => $f['nom_pro'],
//                 "idve" => $f['id_venta'],
//                 "fecv" => $f['fecha_venta'],
//                 "esta" => $f['estado'],
//                 "neto" => $f['neto'],
//                 "deud" => $f['deuda'],
                // "nomc" => $f['nom_cli']." ".$f['ape_cli'],
                // "nomp" => $f['nom_per']." ".$f['ape_per'],
                // "nomd" => $f['nom_deudor']." ".$f['apellidos_deudor'],
//             );
//         }
//         $jsonresponse = json_encode($json, JSON_UNESCAPED_UNICODE);
//     } else {
//         $jsonresponse = "vacio";
//     }
//     echo $jsonresponse;
// }

// if($opcion=="pagar_deuda"){
//     $cod=$_GET['cod'];
//     $defi=$_GET['defi'];
//     $pago=$_GET['pago'];
//     if($defi==0){
//         $pagar="UPDATE venta SET deuda=0, estado=1   WHERE id_venta='$cod'";
//         mysqli_query($cnn,$pagar)or die("Error en Pagar");
//         echo "ADELANTO REGISTRADO CORRECTAMENTE";
//     }else if($defi>0){
//         $pagar="UPDATE venta SET deuda= deuda - $pago   WHERE id_venta='$cod'";
//         mysqli_query($cnn,$pagar)or die("Error en Pagar");
//         echo "VENTA PAGADA EN SU TOTALIDAD";
//     }
// }

?>