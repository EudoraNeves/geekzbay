<?php
// Validating inputs
$errors = array();

if (!$_POST['category']) {
    $errors[] = 'Error: No Category provided.';
}

if (empty($_POST['input'])) {
    $errors[] = 'Error: No input provided.';
}
$_POST['input'] = htmlentities($_POST['input']);

// Fetching data
$conn = mysqli_connect('localhost', 'root', '', 'geekzbay');

$query = "SELECT * FROM " . $_POST["category"] . " WHERE name LIKE '%" . $_POST["searchedName"] . "%'";

$results = mysqli_query($conn, $query);

$returnobject = mysqli_fetch_all($results, MYSQLI_ASSOC);

$returnobject = json_encode($returnobject);

echo $returnobject;
