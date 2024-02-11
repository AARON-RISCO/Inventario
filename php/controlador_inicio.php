<?php
include "../conexion/conexion.php";
$opcion=$_GET['opcion'];

if ($opcion=='contarPro') {
    $contar="SELECT COUNT(*) as total_pro FROM producto";
    $res=mysqli_query($cnn,$contar);
    $num=mysqli_fetch_array($res);
    $json[]=array(
        "tot_pro"=>$num['total_pro']
    );
    $jsonresponse=json_encode($json ,JSON_UNESCAPED_UNICODE);
    echo $jsonresponse;
}
if ($opcion=='contarVen') {
    $contar="SELECT COUNT(*) as total_ven FROM venta";
    $res=mysqli_query($cnn,$contar);
    $num=mysqli_fetch_array($res);
    $json[]=array(
        "tot_ven"=>$num['total_ven']
    );
    $jsonresponse=json_encode($json ,JSON_UNESCAPED_UNICODE);
    echo $jsonresponse;
}
if ($opcion=='contarCom') {
    $contar="SELECT COUNT(*) as total_com FROM compra";
    $res=mysqli_query($cnn,$contar);
    $num=mysqli_fetch_array($res);
    $json[]=array(
        "tot_com"=>$num['total_com']
    );
    $jsonresponse=json_encode($json ,JSON_UNESCAPED_UNICODE);
    echo $jsonresponse;
}
if ($opcion=='contarDeu') {
    $contar="SELECT COUNT(*) as total_deu FROM deudores WHERE estado=0";
    $res=mysqli_query($cnn,$contar);
    $num=mysqli_fetch_array($res);
    $json[]=array(
        "tot_deu"=>$num['total_deu']
    );
    $jsonresponse=json_encode($json ,JSON_UNESCAPED_UNICODE);
    echo $jsonresponse;
}
if ($opcion=='contarPer') {
    $contar="SELECT COUNT(*) as total_per FROM personal";
    $res=mysqli_query($cnn,$contar);
    $num=mysqli_fetch_array($res);
    $json[]=array(
        "tot_per"=>$num['total_per']
    );
    $jsonresponse=json_encode($json ,JSON_UNESCAPED_UNICODE);
    echo $jsonresponse;
}

?>