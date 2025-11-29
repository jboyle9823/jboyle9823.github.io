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
                    From debugging adventures to gaming inspirations, each post dives deep into a topic 
                    that continues to influence my journey in tech.
                </p>
            </div>
        </section>

        <!-- Div for page layout, adding flex. -->
        <div class="blog-layout">

            <!-- The aside section with the list element links to posts -->
            <aside class="blog-aside">
                <h3>All Posts</h3>
                <ul>
                    <li><a href="#post1">Why Web Development Still Excites Me</a></li>
                    <li><a href="#post2">The Strange Joy of Debugging</a></li>
                    <li><a href="#post3">How Gaming Influenced My Tech Journey</a></li>
                    <li><a href="#post4">Template 4</a></li>
                    <li><a href="#post5">Template 5</a></li>
                </ul>
            </aside>

            <!-- Adding the style for the grid that's in my_style.css. Changed to a main for the second part. -->
            <main class="blog-grid">

                <!-- Here I added three blog posts in the grid, with similar styling to the hero, each in an article tag. -->
                <article id="post1" class="blog-card">
                    <h2>Why Web Development Still Excites Me</h2>
                    <p>
                        Even after decades of evolution, web development continues to surprise me. 
                        New frameworks rise and fall, design principles shift, and devices keep changing 
                        how users interact with content.
                    </p>
                    <p>
                        The web lets anyone build something meaningful with nothing but creativity and code. 
                        That accessibility is what keeps me fascinated.
                    </p>
                </article>

                <article id="post2" class="blog-card">
                    <h2>The Strange Joy of Debugging</h2>
                    <p>
                        Debugging can be frustrating, but there’s something oddly satisfying about tracking 
                        down a stubborn bug. It becomes a puzzle—every clue bringing you closer to understanding 
                        how everything fits together.
                    </p>
                    <p>
                        When the issue finally reveals itself, the rush of clarity feels like cracking a mystery. 
                        It’s an underrated but essential part of programming.
                    </p>
                </article>

                <article id="post3" class="blog-card">
                    <h2>How Gaming Influenced My Tech Journey</h2>
                    <p>
                        Growing up, video games weren’t just entertainment—they were my introduction to digital 
                        worlds shaped by code, art, and imagination. Games taught me how systems react and how 
                        rules shape experiences.
                    </p>
                    <p>
                        That curiosity led me toward programming and cybersecurity. In many ways, gaming played 
                        a huge role in shaping my career path.
                    </p>
                </article>

                <article id="post4" class="blog-card">
                    <h2>Template Post 5</h2>
                    <p>
                        Growing up, video games weren’t just entertainment—they were my introduction to digital 
                        worlds shaped by code, art, and imagination. Games taught me how systems react and how 
                        rules shape experiences.
                    </p>
                    <p>
                        That curiosity led me toward programming and cybersecurity. In many ways, gaming played 
                        a huge role in shaping my career path.
                    </p>
                </article>

                <article id="post4" class="blog-card">
                    <h2>Template Post 4</h2>
                    <p>
                        Growing up, video games weren’t just entertainment—they were my introduction to digital 
                        worlds shaped by code, art, and imagination. Games taught me how systems react and how 
                        rules shape experiences.
                    </p>
                    <p>
                        That curiosity led me toward programming and cybersecurity. In many ways, gaming played 
                        a huge role in shaping my career path.
                    </p>
                </article>

            </main>
        </div>

    </div>

    <?php require 'footer.php'; ?>
</body>
</html>
