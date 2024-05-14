<?php
include 'C:/xampp/htdocs/web/controller/PostC.php';
include 'C:/xampp/htdocs/web/controller/CommentC.php';
$PostC=new PostC();
$liste=$PostC->listPosts();
$commentC=new CommentC();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1">
  <title>Blog</title>
  <link rel="stylesheet" href="../reclam_blog/cssgb/blog.css">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,300;0,500;0,600;1,300&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../reclam_blog/cssgb/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../reclam_blog/cssgb/owl.carousel.min.css">
  <link rel="stylesheet" type="text/css" href="../reclam_blog/cssgb/owl.theme.default.min.css">
</head>
<body>

  <header>
    <div class="container">
      <div class="header-info-par">
        <h3>Blog</h3>
        <h4>Retrouvez tous nos posts sur cette page</h4>
        <a href="#posts-section" class="b">Voir nos Posts</a>
        <div class="video">

        </div>
      </div>
    </div>
  </header>
  <section id="welcome-text">
    <div class="container">
        <h2>Le Blog Officiel de DiscoverWay</h2>
    </div>
</section>
  <div class="find_trip">
  </div>
  <section class="tour" id="posts-section">
    <div class="center-text">
      <h2>Posts</h2>
      <input type="text" id="searchInput" class="searchbar" placeholder="Rechercher par titre...">
    </div>
    <div id="normalPosts" class="tour-content">
    <?php foreach($liste as $post): ?>
    <div class="box" id="box-posts">
        <a href="post_details.php?id=<?= $post['ID_Post']; ?>">
            <img src="../Images/<?= $post['Image']; ?>">
            <h4><?= $post['Titre']; ?></h4>
        </a>
        <p>Likes : <?= $post['Likes']; ?> Dislikes : <?= $post['Dislikes']; ?></p>
        <p>Commentaires: <?= $post['Commentaires']; ?></p>
        <p><?= $post['Auteur']; ?> <?= $post['Date_Publication']; ?></p>
    </div>
<?php endforeach; ?>
  </section>
  <section class="top-posts">
    <div class="center-text">
        <h2>Top 3 des Meilleurs Posts</h2>
    </div>
    <div class="tour-content">
        <?php $topPosts = $PostC->getTopPosts(); ?>
        <?php foreach($topPosts as $post): ?>
            <div class="box" id="box-top-posts">
                <a href="post_details.php?id=<?= $post['ID_Post']; ?>">
                    <img src="../Images/<?= $post['Image']; ?>">
                    <h4><?= $post['Titre']; ?></h4>
                </a>
                <p>Likes : <?= $post['Likes']; ?> Dislikes : <?= $post['Dislikes']; ?></p>
                <p>Commentaires: <?= $post['Commentaires']; ?></p>
                <p><?= $post['Auteur']; ?> <?= $post['Date_Publication']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<footer>
    <div class="container">
      <div class="footer-par">
        <div class="footer-1 ">
          <h3 class="footer-logo-h">Discover Way</h3>
        </div>
        <div class="footer-1 footer-info">
          <h3>Nos service</h3>
          <ul>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
          </ul>
        </div>
        <div class="footer-1 footer-info">
          <h3>Find Your Happy</h3>
          <ul>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
          </ul>
        </div>
        <div class="footer-1 footer-info">
          <h3>Need Help?</h3>
          <ul>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
          </ul>
        </div>
      </div>
    </div>
    <p class="copyright">Copyright © 2024 Created By Workaholics</p>
  </footer>
  <script>
    function validateComment(postID) {
        var pseudo = document.getElementById("Pseudo" + postID).value;
        var contenu = document.getElementById("Contenu" + postID).value;

        if (pseudo.trim() === "" || contenu.trim() === "") {
            alert("Veuillez remplir tous les champs.");
            return false;
        }
        return true;
    }
</script>
  <script src="../reclam_blog/js/jquery-3.1.1.min.js"></script>
  <script src="../reclam_blog/js/owl.carousel.min.js"></script>
  <script src="../reclam_blog/js/extrenaljq.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#searchInput').keyup(function(){
            var searchText = $(this).val();
            $.ajax({
                url: 'search_posts.php',
                method: 'GET',
                data: { searchText: searchText },
                success: function(response){
                    $('#normalPosts').html(response);
                }
            });
        });
    });
</script>
</body>
</html>