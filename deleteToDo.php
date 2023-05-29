<?php
session_start();
$userId = $_SESSION["user"];
require_once "database.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the todo ID from the submitted form
    $todoId = $_POST['todoId'];

    // Delete the todo item from the database
    $sql = "DELETE FROM todo_lists WHERE id = '$todoId' AND user_id = '$userId'";

    if (mysqli_query($conn, $sql)) {
        // Redirect back to the list page
        header("Location: listPage.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
