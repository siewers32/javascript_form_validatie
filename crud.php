<?php
//Connection
$host = '127.0.0.1';
$db   = 'pets';
$user = 'root';
$pass = 'root';
$port = 8889;
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $user, $pass, $options);
$messages = [];
//Initialiseren
$knop = "Opslaan";
$action = "new";
$pet = [
    'pet_no' => "",
    'pet_name' => "",
    'gender' => "",
    'birthdate' => "",
    'species' => "",
    'owner' => "",
    'active' => 1,
];

//Update - ophalen van een record op basis van pet_no.
if (isset($_GET['action']) && $_GET['action'] == 'update') {
    $knop = "Update";
    $action = "store";
    $sql = "select * from pet where pet_no = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $_GET['id']]);
    $pet = $stmt->fetch();
}

//Update uitvoeren en opslaan in database
if (isset($_GET['action']) && $_GET['action'] == 'store' && isset($_POST['pet_no'])) {
    $sql = "update pet set "
        . "pet_name = :pet_name, "
        . "gender = :gender, "
        . "species = :species, "
        . "birthdate = :birthdate, "
        . "owner = :owner "
        . "where pet_no = :pet_no";

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
    $messages[] = $pet["pet_name"] . " is netjes aangepast en opgeslagen in de database!";
    $knop = "Update";
    $action = "store";
}

//Een nieuw beest toevoegen
if (isset($_GET['action']) && $_GET['action'] == 'new') {
    $newpet = [
        'pet_name' => $_POST['pet_name'],
        'gender' => $_POST['gender'],
        'birthdate' => $_POST['birthdate'],
        'species' => $_POST['species'],
        'owner' => $_POST['owner'],
    ];
    $sql = "insert into pet (pet_name, gender, birthdate, species, owner) "
        . "values (:pet_name, :gender, :birthdate, :species, :owner)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($newpet);
    $messages[] = $newpet["pet_name"] . " is netjes opgeslagen in de database!";
}

// Een beest verwijderen
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = $_GET['id'];
    $sql = "update pet set "
        . "active = 0 "
        . "where pet_no = :pet_no";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['pet_no' => $id]);
    $messages[] = $id . " is netjes verwijdert uit de database!";
}

//Weergeven van alle dieren
$stmt = $pdo->query("SELECT * FROM pet WHERE active = 1");
$pets = $stmt->fetchAll();


function getMessages($messages)
{
    $result = "";
    if (count($messages) > 0) {
        $result = "\n<ul id='messages' class='messages'>\n";
        foreach ($messages as $m) {
            $result .= "\t<li>" . $m . "</li>\n";
        }
        $result .= "</ul>\n";
    }
    return ($result);
}
