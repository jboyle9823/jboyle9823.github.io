<?php
    session_start();

    //Loading all the posts.
    $jsonData = file_get_contents("blog_posts.json");
    $posts = json_decode($jsonData, true);

    //ID validation for the specific post.
    $id = $_GET["id"] ?? null;

    if ($id === null || !isset($posts[$id])) {
        die("Post not found.");
    }

    $post = $posts[$id];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Jonathan Boyle">
    <title><?= htmlspecialchars($post["title"]) ?></title>
    <link rel="stylesheet" href="my_style.css">
</head>
<body style="background-image: url('images/colors.jpg');">
    <div class="body_wrapper">

        <?php 
            $current_page = 'blog'; 
            require 'nav.php'; 
        ?>

        <div>
            <h1>
                <?= htmlspecialchars($post["title"]) ?>
            </h1>

            <p>
                <em><?= htmlspecialchars($post["date"]) ?></em>
            </p>

            <!-- Full paragraphs are outputted here. -->
            <?php foreach ($post["paragraphs"] as $text): ?>
                <p><?= nl2br(htmlspecialchars($text)) ?></p>
            <?php endforeach; ?>

            <a href="blog.php">
                Back to blog
            </a>
        </div>
        <?php require 'footer.php'; ?>
    </div>
</body>
</html>
