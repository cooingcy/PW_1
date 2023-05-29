<?php

/*define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('NAME', 'bd_sistema');*/

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "bd_sistema";

    /*define( 'MYSQL_HOST', 'localhost:3306' );
    define( 'MYSQL_USER', 'root' );
    define( 'MYSQL_PASSWORD', '' );
    define( 'MYSQL_DB_NAME', 'bd_sistema' );*/

try{
$con = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);

}catch(PDOException $err){
    echo "Erro: conexão não efetuada com sucesso";
}




/*if($con->connect_errno){
        echo "Não foi possivel conectar";
    }else{
        echo "Conexão efetuada com sucesso";
    }*/

?>