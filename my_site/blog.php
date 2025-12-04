<?php 
session_start(); 

$message = ""; 
$error = ""; 

$correct_hash = hash("sha256", "CS203");

//For this Login, I took heavy inspiration from the To-Do List Login.

//Handling logout.
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'logout') {
    session_unset();
    session_destroy();
    session_start();
    $message = "Logged out successfully.";
}

//Handling login.
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {

    $password = $_POST['password'] ?? "";

    if ($password === "") {
        $error = "Please enter the password.";
    } else {
        $hashed_input = hash("sha256", $password);

        if ($hashed_input === $correct_hash) {
            $_SESSION['logged_in'] = true;
            $message = "Login successful!";
        } else {
            $error = "Incorrect password.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Jonathan Boyle">
    <title>My Blog</title>
    <link rel="stylesheet" href="my_style.css">
    <script src="my_form.js"></script>
</head>
<body>
    <div class="body_wrapper">

        <?php 
            $current_page = 'blog'; 
            require 'nav.php'; 

            //Loading the blog posts from the JSON file.
            $jsonData = file_get_contents("blog_posts.json");
            $posts = json_decode($jsonData, true); 

            $logged_in = !empty($_SESSION['logged_in']);
        ?>

        <div class="login-bar">

            <?php if (empty($_SESSION['logged_in'])): ?>
                <!-- Login form with password box. -->
                <form method="POST">
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit" name="login">Login</button>
                </form>

            <?php else: ?>
                <!-- Logout button. -->
                <form method="POST">
                    <button type="submit" name="action" value="logout">Logout</button>
                </form>
            <?php endif; ?>
        </div>

        <!-- Error and success messages. -->
        <?php if ($error): ?>
            <p><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <?php if ($message): ?>
            <p><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>

        <!-- 
            The overhead hero section, with classes for styling in my_style.css.
            The section has a header and a paragraph.
        -->
        <section class="hero">
            <div>
                <h1>Welcome to My Tech & Life Blog</h1>
                <p>
                    This blog explores technology, creativity, and the stories shaping our digital world.
                    All posts below are loaded dynamically from a JSON file using PHP.
                </p>
            </div>
        </section>

        <!-- Div for page layout, adding flex. -->
        <div class="blog-layout">

            <!-- The aside section with the list element links to posts. -->
            <aside class="blog-aside">
                <h3>All Posts</h3>
                <ul>
                    <?php foreach ($posts as $id => $post): ?>
                        <li>
                            <a href="#<?= $id ?>"><?= htmlspecialchars($post["title"]) ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </aside>

            <!-- Adding the style for the grid that's in my_style.css. Changed to a main for the second part. -->
            <main class="blog-grid">

                <!-- Posting each blog post as an article with PHP. -->
                <?php foreach ($posts as $id => $post): ?>
                    <article id="<?= $id ?>" class="blog-card">

                        <h2><?= htmlspecialchars($post["title"]) ?></h2>
                        <p><em><?= htmlspecialchars($post["date"]) ?></em></p>

                        <?php 
                            foreach ($post["paragraphs"] as $text) {
                                echo "<p>" . htmlspecialchars($text) . "</p>";
                            }
                        ?>

                        <!-- Delete button that's visible when logged in. -->
                        <?php if ($logged_in): ?>
                            <button onclick="deletePost('<?= $id ?>')">Delete</button>
                        <?php endif; ?>

                    </article>
                <?php endforeach; ?>
            </main>
        </div>
    </div>

    <?php require 'footer.php'; ?>

    <!-- JS for deleting the posts. -->
    <script>
    function deletePost(id) {
        if (!confirm("Are you sure?")) {
            return;
        }

        //Removes the element from the page.
        const element = document.getElementById(id);
        if (element) {
            element.remove();
        }

        //Amd calls the php code for JSON deletion.
        fetch("delete_post.php", {
            method: "POST",
            headers: {"Content-Type": "application/x-www-form-urlencoded"},
            body: "id=" + encodeURIComponent(id)
        })
        .then(r => r.text())
        .then(console.log);
    }
    </script>

</body>
</html>