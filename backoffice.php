


<?php
function connexion() {
//Tentative de connexion :
	try{
		$db_host = "localhost";
        $db_name = "backoffice";
        $db_user = "root";
        $db_pwd = "";
		$options = array(
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", /*Charset utf8 pour qu'on ait le même jeu de caractère entre le HTML et PDO */
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC , /*Mode par défaut des données qu'on reçoit : tableaux associatif*/
			PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING /*Si une erreur se produit, on aimerait bien que le pdo nous la signale */
		);
		$pdo = new PDO($db_host, $db_user, $db_pwd, $options); //Connexion
		return $pdo;
	}
	
	catch (PDOException $e)
	{
		die('<p>Une erreur est détectée : ' .$e->getMessage() . '</p>'); //On récupère le signalement de l'erreur.
	}
}
?>