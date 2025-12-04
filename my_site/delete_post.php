<?php
session_start();

//If not logged in then not authorized to delete post.
if (empty($_SESSION['logged_in'])) {
    http_response_code(403);
    echo "Not authorized";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit("Invalid request");
}

$id = $_POST['id'] ?? null;

$json = file_get_contents("blog_posts.json");
$posts = json_decode($json, true);

//New post list.
$new = [];

foreach ($posts as $postId => $post) {
    if ($postId != $id) {
        $new[$postId] = $post;
    }
}

file_put_contents("blog_posts.json", json_encode($new, JSON_PRETTY_PRINT));

echo "Deleted post: $id";
