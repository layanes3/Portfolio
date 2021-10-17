
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<form method="post" action="insertProject.php" enctype="multipart/form-data">
        <p>

            <label for="title">Titre du fichier :</label>
            <input type="text" name="title" id="title" />
        </p>
        <p>
            <label for="description">Description :</label>
            <textarea name="description" id="description"></textarea><br />
        </p>
       
            <input type="file" name="file" value= "file">
        <!-- <input type="hidden" name="MAX_FILE_SIZE" value="12345" /> -->
        
        <input type="submit" name="submit" value="Envoyer" />  

</form>

</body>
</html>