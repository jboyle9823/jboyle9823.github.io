<?php
session_start();

if (empty($_SESSION['logged_in'])) {
    header("Location: blog.php");
    exit();
}

$json = file_get_contents("blog_posts.json");
$posts = json_decode($json, true);

//Generating new post ID based off time.
$newId = "post_" . time();

//Sanitizing input as required.
$title = htmlentities($_POST['title'] ?? "");
$date  = htmlentities($_POST['date'] ?? "");
$p1    = htmlentities($_POST['p1'] ?? "");
$p2    = htmlentities($_POST['p2'] ?? "");
$p3    = htmlentities($_POST['p3'] ?? "");

$newPost = [
    "title" => $title,
    "date" => $date,
    "paragraphs" => array_values(array_filter([$p1, $p2, $p3]))
];

//Appending to post list.
$posts[$newId] = $newPost;

file_put_contents("blog_posts.json", json_encode($posts, JSON_PRETTY_PRINT));

header("Location: blog.php#".$newId);
exit();
