<?php
// Assuming you've included the necessary database connection code

if(isset($_POST['score'])) {
    $score = $_POST['score'];

    // Update the score in the database
    $query = "UPDATE test SET verif = :score WHERE id_test = :id_test"; // Assuming you have an ID for the user
    $statement = $pdo->prepare($query);
    $statement->execute(['score' => $score, 'id_test' => $id_test]); // You need to replace $userId with the actual ID of the user
}
?>
