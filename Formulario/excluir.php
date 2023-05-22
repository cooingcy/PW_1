<?php
session_start();
include_once('config.php');

$id = 5;
    $res_usu = "DELETE FROM clientes WHERE id='$id'";
    $result_usua = mysqli_query($con, $res_usu);

?>