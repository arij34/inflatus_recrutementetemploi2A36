<?php
include '../controller/BlogC.php';
$blogC = new BlogC(); // Instantiate the Blog controller
$list = $blogC->listBlogs(); // Get the list of blogs
?>
<html>

<head></head>

<body>

    <center>
        <h1>List of Blogs</h1>
        <h2>
            <a href="addEmploye.php">Add Blog</a> <!-- Adjusted link for adding a new blog post -->
        </h2>
    </center>
    <table border="1" align="center" width="70%">
        <tr>
            <th>Id Blog</th> <!-- Adjusted column header -->
            <th>Title</th> <!-- Adjusted column header -->
            <th>Content</th> <!-- Adjusted column header -->
            <th>Author</th> <!-- Adjusted column header -->
            <th>Date of Publication</th> <!-- Adjusted column header -->
            <th>Tags</th> <!-- Adjusted column header -->
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
        foreach ($list as $blog) { // Loop through the list of blogs
        ?>
            <tr>
                <td><?= $blog['idblog']; ?></td> <!-- Adjusted variable name -->
                <td><?= $blog['titre']; ?></td> <!-- Adjusted variable name -->
                <td><?= $blog['contenu']; ?></td> <!-- Adjusted variable name -->
                <td><?= $blog['auteur']; ?></td> <!-- Adjusted variable name -->
                <td><?= $blog['datedepublication']; ?></td> <!-- Adjusted variable name -->
                <td><?= $blog['etiquette']; ?></td> <!-- Adjusted variable name -->
                <td align="center">
                    <form method="POST" action="updateEmploye.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value="<?= isset($blog['idblog']) ? $blog['idblog'] : ''; ?>" name="idBlog">

                    </form>
                </td>
                <td>
                    <a href="deleteEmploye.php?id=<?php echo $blog['idblog']; ?>">Delete</a> <!-- Adjusted delete link -->
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>
