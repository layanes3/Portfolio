<?php

try {
    $db_host = "localhost";
    $db_name = "backoffice";
    $db_user = "root";
    $db_pwd = "";
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pwd); // connection à la base de données
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} 
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if ((isset($_POST['title']) and isset($_POST['description']) and isset($_FILES['file']))) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    echo $title . $description;
    echo $_FILES['file']['name'];

    date_default_timezone_set('UTC'); // format de date anglaise pour le stockage
    $date = date("Y-m-d H:m:s");
    $name = $_FILES['file']['name'];     //Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icone.png).
    $type = $_FILES['file']['type'];     //Le type du fichier. Par exemple, cela peut être « image/png ».
    $size = $_FILES['file']['size'];     //La taille du fichier en octets.
    $tmpName = $_FILES['file']['tmp_name']; //L'adresse vers le fichier uploadé dans le répertoire temporaire.
    $error = $_FILES['file']['error'];    //Le code d'erreur, qui permet de savoir si le fichier a bien été uploadé.

    $tabExtension = explode('.', $name);
    // fonction end -> Pour recuperer le dernier élément du tableau (soit extention du fichier uploadé)
    $extension = strtolower(end($tabExtension));

    // toujours conciderer les extensions comme un tableau []
    $extensions = ['jpg', 'png', 'jpeg', 'gif', 'svg'];

    //Taille max que l'on accepte : en byte
    $maxSize = 4*1024*1024; // 4Mo

//*********VERIFICATION ERREUR */

    if (in_array($extension, $extensions)) {
        
        if ($size <= $maxSize) {

            if ($error === 0) {
               
                $uniqueName = uniqid('', true); 
                //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
                $file = $uniqueName.".".$extension;
                //$file = 5f586bf96dcd38.73540086.jpg
                
                move_uploaded_file($tmpName, '../assets/upload/' . $file);


                // save bdd
                // $sql = "INSERT INTO projects (title, description, picture, createdat) VALUES (:a, :b, :c, :d)";

                var_dump ($title);
                var_dump ($description);
                var_dump ($file);
                var_dump ($date);
                // var_dump ($sql);
                
                $requete = $db->prepare("INSERT INTO projects (title, description, picture, createdat) VALUES (:title, :description, :picture, :createdat)");
                $requete->bindValue(':title', $title, PDO::PARAM_STR);
                $requete->bindValue(':description', $description, PDO::PARAM_STR);
                $requete->bindValue(':picture', $file, PDO::PARAM_STR);
                $requete->bindValue(':createdat', $date, PDO::PARAM_STR);

                $requete->execute ();

            }else {
                echo "Une erreur est survenue";
            }

        }else {
            echo "Taille trop grande";
        }
    }else {
        echo "Mauvaise extension";
    }
}