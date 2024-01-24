<?php
include("crud.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">    <title>Pets</title>
    <style>
        * {
            padding:0px;
            margin:0px;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            font-size:16px;
            line-height:24px;
        }

        .wrapper {
            width:1200px;
            margin: auto;
        }

    </style>
</head>
<body>
    <h3>Voeg een huisdier toe:</h3>
    <div class="wrapper">
    <form id="petform" action="<?= $_SERVER['SCRIPT_NAME'] ?>?action=<?= $action ?>" method="post">
    <input type="hidden" name="pet_no" value="<?= $pet['pet_no'] ?>">
        Naam: <input type="text" name="pet_name" id="pet_name" value="<?= $pet['pet_name'] ?>"><br>
        Geslacht: <input type="text" name="gender" id="gender" value="<?= $pet['gender'] ?>"><br>
        Geboortedatum:<input type="date" name="birthdate" id="birthdate" value="<?= $pet['birthdate'] ?>"><br>
        Soort: <input type="text" name="species" id="species" value="<?= $pet['species'] ?>"><br>
        Eigenaar: <input type="text" name="owner" id="owner" value="<?= $pet['owner'] ?>"><br>
        <button type="button" name="knop" id="knop" onclick="checkLogin()"><?= $knop ?></button>
    </form>
    <h3>Alle huisdieren</h3>
    <table>
        
    <?php foreach($pets as $pet) { ?>
    <tr>
        <td><?= $pet["pet_name"] ?></td>
        <td><?= $pet["species"] ?></td>
        <td><?= $pet["gender"] ?></td>
        <td><?= $pet["birthdate"] ?></td>
        <td><?= $pet["owner"] ?></td>
        <td><a href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=update&id=<?= $pet['pet_no'] ?>">Update</a></td>
        <td><a href="<?= $_SERVER['SCRIPT_NAME'] ?>?action=delete&id=<?= $pet['pet_no'] ?>">Delete</a></td>
    </tr>
    <?php   } ?>
    <script defer src="formcheck.js"></script>
    </div>
</body>
</html>