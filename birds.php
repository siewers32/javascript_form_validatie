<?php
//Connection
$host = '127.0.0.1';
$db   = 'pets';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $options);

$knop = "verstuur";
$action = "show";

$pet = [
    'pet_no' => "",  
    'pet_name' => "",  
    'gender' => "",  
    'birthdate' => "",  
    'species' => "",  
    'owner' => "",  
    'active' => 1,  
];

//Eventuele acties
if(isset($_GET['action']) && $_GET['action'] == 'update') {
    $knop = "Update";
    $action = "store";
    $sql = "select * from pet where pet_no = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $_GET['id']]);
    $pet = $stmt->fetch();
}

if(isset($_GET['action']) && $_GET['action'] == 'store') {
    $sql = "update pet set "
    ."pet_name = :pet_name, "
    ."gender = :gender, "
    ."species = :species, "
    ."birthdate = :birthdate, "
    ."owner = :owner "
    ."where pet_no = :pet_no";
    
    $pet = [
        'pet_no' => $_POST['pet_no'],  
        'pet_name' => $_POST['pet_name'],  
        'gender' => $_POST['gender'],  
        'birthdate' => $_POST['birthdate'],  
        'species' => $_POST['species'],  
        'owner' => $_POST['owner'],  
    ];
    $stmt = $pdo->prepare($sql);
    $stmt->execute($pet);
    $knop = "Update";
    $action = "store";
}

if(isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = $_GET['id'];
    $sql = "update pet set "
    ."active = 0 "
    ."where pet_no = :pet_no";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['pet_no' => $id]);
}




//Weergeven hele tabel
$stmt = $pdo->query("SELECT * FROM pet WHERE active = 1");
$pets = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Voeg een huisdier toe:</h3>
    <form action="<?= $_SERVER['SCRIPT_NAME'] ?>?action=<?= $action ?>" method="post">
    <input type="hidden" name="pet_no" value="<?= $pet['pet_no'] ?>">
        Naam: <input type="text" name="pet_name" id="pet_name" value="<?= $pet['pet_name'] ?>"><br>
        Geslacht: <input type="text" name="gender" id="gender" value="<?= $pet['gender'] ?>"><br>
        Geboortedatum:<input type="date" name="birthdate" id="birthdate" value="<?= $pet['birthdate'] ?>"><br>
        Soort: <input type="text" name="species" id="species" value="<?= $pet['species'] ?>"><br>
        Eigenaar: <input type="text" name="owner" id="owner" value="<?= $pet['owner'] ?>"><br>
        <button type="submit" name="knop" id="knop"><?= $knop ?></button>
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
</body>
</html>