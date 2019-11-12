<?php
try {
    $pdo = new PDO('mysql:host=localhost/carnex;dbname=carnex',
        'root',
        '',
        array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        ));
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
/*require("connect.inc.php");
// pour oracle: $dsn="oci:dbname=//serveur:1521/base
// pour sqlite: $dsn="sqlite:/tmp/base.sqlite"
$dsn="mysql:dbname=".BASE.";host=".SERVER;
try{
    $connexion=new PDO($dsn,USER,PASSWD);
}
catch(PDOException $e){
    printf("Échec de la connexion : %s\n", $e->getMessage());
    exit();
}
$sql="SELECT * from Carnex";
if(!$connexion->query($sql)) echo "Pb d'accès au CARNET";
else{
    foreach ($connexion->query($sql) as $row)
        echo $row['PRENOM']." ".
            $row['NOM']."né(e) le ".
            $row['NAISSANCE']."<br/>";
}*
