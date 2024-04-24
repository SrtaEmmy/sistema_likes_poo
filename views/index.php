<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>
<body>
    <h1>Sistema de likes</h1>
    <?php foreach ($images as $image): ?>
        <img src="../assets/img/<?php echo $image->url ?>" alt="imagen" width="300">
        
        <button onclick="updateLike(<?php echo $image->id ?>, <?php echo $id_user ?>)" >Like</button> 

        <span id="like<?php echo $image->id ?>" ></span>

    <?php endforeach ?>

    <script src="../assets/script.js"></script>
</body>
</html>