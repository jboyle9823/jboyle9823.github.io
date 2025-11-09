<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Jonathan Boyle">
    <title>Quiz Results</title>
    <link rel="stylesheet" href="my_style.css">
    <style>
        .result-box {
            border: 3px solid #cc0000;
            background-color: #ffe5e5;
            color: #660000;
            padding: 25px;
            border-radius: 12px;
            max-width: 650px;
            margin: 30px auto;
            text-align: center;
        }

        .hero-image {
            width: 200px;
            height: auto;
            border-radius: 10px;
            margin-top: 15px;
        }

        .categories {
            margin-top: 30px;
            background-color: #fff0f0;
            border: 2px solid #ffcccc;
            border-radius: 10px;
            padding: 15px;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }

        .categories ul {
            list-style: none;
            padding: 0;
        }

        .categories li {
            padding: 5px 0;
        }
    </style>
</head>

<body class="quiz">
    <div class="body_wrapper">
        <?php
        $current_page = 'results';
        require 'nav.php';

        echo '<h1 class="quiz">Your Superhero Result</h1>';

        $required = ['name', 'email', 'personality', 'power', 'asset', 'saving', 'demeanor'];
        $missing = [];

        foreach ($required as $field) {
            if (empty($_GET[$field])) {
                $missing[] = $field;
            }
        }

        if (!empty($missing)) {
            echo "<p>Missing fields!</p>";
            echo "<p><a href='my_form.php'>Return to quiz</a></p>";
            echo "</div></body></html>";
            exit;
        }

        $name = htmlspecialchars($_GET['name']);
        $email = htmlspecialchars($_GET['email']);
        $personality = $_GET['personality'];
        $power = $_GET['power'];
        $asset = $_GET['asset'];
        $saving = $_GET['saving'];
        $demeanor = intval($_GET['demeanor']);
        
        $score = 0;
        switch ($personality) {
            case 'strength': $score += 40; break;
            case 'intelligence': $score += 5; break;
            case 'compassion': $score -= 20; break;
        }

        switch ($power) {
            case 'strength': $score += 30; break;
            case 'dexterity': $score += 5; break;
            case 'perception': $score += 15; break;
            case 'speed': $score += 20; break;
            case 'nothing': $score -= 20; break;
        }

        switch ($asset) {
            case 'friends': $score -= 25; break;
            case 'wealth': $score += 15; break;
            case 'cause': $score += 5; break;
            case 'personal': $score += 10; break;
        }

        switch ($saving) {
            case 'friend': $score -= 20; break;
            case 'official': $score += 10; break;
            case 'both': $score += 25; break;
        }

        if ($demeanor >= 8) {
            $score -= 30;
        } elseif ($demeanor >= 5) {
            $score -= 10;
        } else {
            $score += 15;
        }

        if ($score <= -60) {
            $hero = "Spider-Man";
            $desc = "You're witty, selfless, and driven by compassion and responsibility.";
            $img = "images/spiderman.png";
        } elseif ($score <= -20) {
            $hero = "Daredevil";
            $desc = "You balance light and darkness, justice and faith define you.";
            $img = "images/daredevil.jpg";
        } elseif ($score <= 30) {
            $hero = "Batman";
            $desc = "Strategic, stoic, and deeply principled, you thrive in discipline.";
            $img = "images/batman.png";
        } elseif ($score <= 50) {
            $hero = "Iron Man";
            $desc = "Brilliant, confident, and bold, a tech genius with a strong will.";
            $img = "images/ironman.png";
        } elseif ($score <= 90) {
            $hero = "Captain America";
            $desc = "Honorable, brave, and loyal, you fight for what's right, always.";
            $img = "images/captainamerica.jpg";
        } else {
            $hero = "Superman";
            $desc = "Pure-hearted, powerful, and hopeful, you inspire those around you.";
            $img = "images/superman.jpg";
        }

        echo "<div class='result-box'>";
        echo "<h2>Hi, $name!</h2>";
        echo "<p>Based on your answers, your superhero personality is:</p>";
        echo "<h3 style='color:#cc0000;'>$hero</h3>";
        echo "<img src='$img' alt='$hero photo' class='hero-image'>";
        echo "<p>$desc</p>";
        echo "<h4>Score: $score</h4>";
        echo "</div>";

        echo "<div class='categories'>";
        echo "<h3>All Possible Heroes</h3>";
        echo "<ul>";
        echo "<li" . (str_contains($hero, 'Spider-Man') ? " style='font-weight:bold;'" : "") . ">Spider-Man: Witty, compassionate, moral</li>";
        echo "<li" . (str_contains($hero, 'Daredevil') ? " style='font-weight:bold;'" : "") . ">Daredevil: Driven, conflicted, justice-focused</li>";
        echo "<li" . (str_contains($hero, 'Batman') ? " style='font-weight:bold;'" : "") . ">Batman: Intelligent, brooding, disciplined</li>";
        echo "<li" . (str_contains($hero, 'Iron Man') ? " style='font-weight:bold;'" : "") . ">Iron Man: Confident, innovative, bold</li>";
        echo "<li" . (str_contains($hero, 'Captain America') ? " style='font-weight:bold;'" : "") . ">Captain America: Noble, loyal, principled</li>";
        echo "<li" . (str_contains($hero, 'Superman') ? " style='font-weight:bold;'" : "") . ">Superman: Idealistic, pure, inspiring</li>";
        echo "</ul>";
        echo "</div>";

        echo "<p style='text-align:center; margin-top:24px;'>
                <a href='my_form.php'>Take the quiz again</a>
              </p>";
        ?>
    </div>

    <?php require 'footer.php'; ?>
</body>
</html>