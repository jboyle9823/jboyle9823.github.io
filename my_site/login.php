<?php
$correct_hash = "b14e9015dae06b5e206c2b37178eac45e193792c5ccf1d48974552614c61f2ff";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $password = $_POST['password'] ?? '';
    $hashed_input = hash("sha256", $password);

    if ($hashed_input === $correct_hash) {
        if ($_SERVER['SERVER_NAME'] === 'localhost') {
            $BASE_URL = $_SERVER['HTTP_HOST'] . '/jboyle9823.github.io/';
        } else if ($_SERVER['SERVER_NAME'] === 'osiris.ubishops.ca') {
            $BASE_URL = $_SERVER['HTTP_HOST'] . '/home/jboyle/';
        } else {
            $BASE_URL = $_SERVER['HTTP_HOST'];
        }

        header('Location: http://' . $BASE_URL . 'to_do.php');
        exit();
    } else {
        $error = "Incorrect password. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="author" content="Jonathan Boyle">
	<title>To-Do List Login</title>
	<link rel="stylesheet" href="my_style.css">
</head>
<body class="todo">
	<div class="body_wrapper">
		<?php 
            $current_page = 'login'; 
            require 'nav.php'; 
        ?>

		<h1 class="todo">Access To-Do List</h1>

    	<div style="background-color: blue; opacity: 75%; width: 40%; margin: 0 auto; border-radius: 7px;">
			<form class="todo" action="login.php" method="POST">
        		<input class="todo" type="password" name="password" placeholder="Enter Password">
        		<button class="todo" type="submit">Login</button>
    		</form>

			<?php
				if (isset($error)) {
					echo "<p style='color: red; text-align: center; font-weight: bold;'>$error</p>";
				}
			?>
		</div>
	</div>

	<?php require 'footer.php'; ?>
</body>
</html>
