<?php
session_start();

if (empty($_SESSION['logged_in'])) {
    header("Location: blog.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Blog Post</title>
    <link rel="stylesheet" href="my_style.css">
</head>
<body style="background-image: url('images/colors.jpg');">

<!-- New site for the post creation. -->
<div class="body_wrapper">
    <h1>Add a New Blog Post</h1>
    <!-- Adding all the post components in a form which calls save_post.php. -->
    <form action="save_post.php" method="POST" style="width: 60%; margin: auto;">

        <label>Title:</label>
        <input type="text" name="title" required style="width:100%; padding:8px; margin-bottom:10px;">

        <label>Date:</label>
        <input type="date" name="date" required style="width:100%; padding:8px; margin-bottom:10px;">

        <label>Paragraph 1:</label>
        <textarea name="p1" rows="4" required style="width:100%; margin-bottom:10px;"></textarea>

        <label>Paragraph 2:</label>
        <textarea name="p2" rows="4" style="width:100%; margin-bottom:10px;"></textarea>

        <label>Paragraph 3:</label>
        <textarea name="p3" rows="4" style="width:100%; margin-bottom:10px;"></textarea>

        <button type="submit">
            Save Post
        </button>

    </form>
</div>

</body>
</html>
