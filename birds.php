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
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <title>Pets</title>
    <link rel="stylesheet" href="birds.css">
    </style>
</head>

<body>
    <header>
        Petplace
    </header>
    <div class="wrapper">
        <h3>Voeg een huisdier toe:</h3>
        <form id="petform" action="<?= $_SERVER['SCRIPT_NAME'] ?>?action=<?= $action ?>" method="post">
            <input type="hidden" name="pet_no" value="<?= $pet['pet_no'] ?>">
            <div class="felement">
                <label for="pet_name">Naam:</label>
                <input type="text" name="pet_name" id="pet_name" value="<?= $pet['pet_name'] ?>">
            </div>
            <div class="felement">
                <label for="gender">Geslacht:</label>
                <input type="text" name="gender" id="gender" value="<?= $pet['gender'] ?>">
            </div>
            <div class="felement">
                <label for="birthdate">Geboortedatum:</label>
                <input type="date" name="birthdate" id="birthdate" value="<?= $pet['birthdate'] ?>">
            </div>
            <div class="felement">
                <label for="species">Soort:</label>
                <input type="text" name="species" id="species" value="<?= $pet['species'] ?>">
            </div>
            <div class="felement">
                <label for="owner">Eigenaar:</label>
                <input type="text" name="owner" id="owner" value="<?= $pet['owner'] ?>">
            </div>
            <div class="felement">
                <button type="button" name="knop" id="knop" onclick="checkLogin()"><?= $knop ?></button>
            </div>
        </form>
        <div id="errors"></div>
        <div id="messages"><?= getMessages($messages); ?></div>
        <div class="felement">
            <h3>Alle huisdieren</h3>
            <a style="margin-top:1rem;" href="<?= $_SERVER['SCRIPT_NAME'] ?>">Nieuw</a>
        </div>
        <table>
            <?php foreach ($pets as $pet) { ?>
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
        </table>
    </div>
    <script src="formcheck.js"></script>
</body>

</html>