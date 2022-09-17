<?php
// Validating inputs
$errors = array();

if(!$_GET['category']) {
    $errors = 'Error: No Category provided.';
}+

// Fetching data
$conn = mysqli_connect('localhost', 'root', '', 'geekzbay');

$query = "SELECT * FROM " . $_GET["category"] . " WHERE name LIKE '%" . $_GET["searchedName"] . "%'";

$results = mysqli_query($conn, $query);

$songs = mysqli_fetch_all($results, MYSQLI_ASSOC);

$songs = json_encode($songs);

echo $songs;