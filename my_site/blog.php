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
                    This blog is where I explore technology, creativity, and the ideas shaping our digital world. 
                    From web development and cybersecurity to gaming culture and personal reflections, each post dives 
                    deeper than the surface to uncover what really matters. Grab a coffee, scroll down, and enjoy the stories!
                </p>
            </div>
        </section>

        <!-- Adding the style for the grid that's in my_style.css. -->
        <section class="blog-grid">

            <!-- Here I added three blog posts in the grid, with similar styling to the hero, each in an article tag. -->
            <article class="blog-card">
                <h2>Why Web Development Still Excites Me</h2>
                <p>
                    Even after decades of evolution, web development continues to surprise me. 
                    New frameworks rise and fall, design principles shift, and devices keep changing 
                    how users interact with content. Yet the core thrill remains the same: transforming 
                    ideas into something people can touch and experience online.
                </p>
                <p>
                    The web lets anyone build something meaningful with nothing but creativity and code. 
                    That accessibility is what keeps me fascinated.
                </p>
            </article>

            <article class="blog-card">
                <h2>The Strange Joy of Debugging</h2>
                <p>
                    Debugging can be frustrating, but there’s something oddly satisfying about tracking 
                    down a stubborn bug. It turns programming into a kind of puzzle-solving exercise, 
                    where every clue brings you one step closer to understanding the system better.
                </p>
                <p>
                    When the issue finally reveals itself, the rush of clarity feels like cracking a mystery. 
                    It’s an underrated part of the craft.
                </p>
            </article>

            <article class="blog-card">
                <h2>How Gaming Influenced My Tech Journey</h2>
                <p>
                    Growing up, video games weren’t just entertainment—they were my first glimpse into 
                    digital worlds shaped by code, art, and imagination. Games taught me how systems react, 
                    how rules shape experience, and how creativity can be translated into interactive form.
                </p>
                <p>
                    That curiosity eventually led me into programming and cybersecurity. In many ways, 
                    gaming was my gateway into the world of technology.
                </p>
            </article>

        </section>

    </div>

    <?php require 'footer.php'; ?>
</body>
</html>
