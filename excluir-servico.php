<?php
session_start();

if (!isset($_SESSION["adm_login"])) {
    header("Location: index.php");
}
require_once("connection.php");

$adm_login = $_SESSION["adm_login"];
$id = isset($_GET["id"]) ? $_GET["id"] : "";
$sql = "DELETE FROM servico WHERE Id = ?";

if ($stmt = mysqli_prepare($conn, $sql)) {
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "s", $param_id);

    // Set parameters
    $param_id = $id; // Creates a password hash

    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        // Redirect to login page
        header("location: servico.php");
    } else {
        echo "Oops! Algo deu errado. Por favor, tente novamente mais tarde.";
    }

    // Close statement
    mysqli_stmt_close($stmt);
}

header("Location: servico.php");