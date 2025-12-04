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
        ?>

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

                    </article>
                <?php endforeach; ?>
            </main>
        </div>
    </div>

    <?php require 'footer.php'; ?>
</body>
</html>
