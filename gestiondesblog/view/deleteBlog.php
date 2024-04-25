<?php
include '../controller/BlogC.php';

$blogC = new BlogC(); // Instantiate the Blog controller

$blogC->deleteBlog($_GET["idblog"]); // Call the deleteBlog method with the ID parameter from the URL

header('Location: ../view/ListEmployes.php'); // Redirect to the blog list page after deleting the blog
?>

