<?php
// Validating inputs
$errors = array();

if (!$_GET['category']) {
    $errors = 'Error: No Category provided.';
}
+

// Fetching data
$conn = mysqli_connect('localhost', 'root', '', 'geekzbay');

$query = "SELECT * FROM " . $_GET["category"] . " WHERE name LIKE '%" . $_GET["searchedName"] . "%'";

$results = mysqli_query($conn, $query);

$returnobject = mysqli_fetch_all($results, MYSQLI_ASSOC);

$returnobject = json_encode($returnobject);

echo $returnobject;
