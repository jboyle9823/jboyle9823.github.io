<?php
require_once __DIR__ . '/includes/config.php';

session_start();

$file = __DIR__ . '/login_attempts.json';

if (file_exists($file)) {
	$attempts = json_decode(file_get_contents($file), true);
} 
else {
    $attempts = [];
}

$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'logout') {
    session_unset();
    session_destroy();
    session_start();
    $message = "Successfully logged out";
}

if (!empty($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true) {
    header('Location: to_do.php');
    exit();
}

$correct_hash = "b14e9015dae06b5e206c2b37178eac45e193792c5ccf1d48974552614c61f2ff";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['action'])) {

    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        $error = "Please provide both username and password.";
    } else {

        if (!isset($attempts[$username]) || !is_array($attempts[$username])) {
            $attempts[$username] = [
                'attempts' => 0,
                'locked_until' => 0
            ];
        }

        $locked_until = (int)($attempts[$username]['locked_until'] ?? 0);
        if ($locked_until > time()) {
            $remaining = $locked_until - time();
            $error = "Too many failed attempts. Try again in $remaining second" . ($remaining === 1 ? "" : "s") . ".";
            file_put_contents($file, json_encode($attempts));
        } else {
            $hashed_input = hash('sha256', $password);

            if ($hashed_input === $correct_hash) {
                $attempts[$username]['attempts'] = 0;
                $attempts[$username]['locked_until'] = 0;

                file_put_contents($file, json_encode($attempts));

                $_SESSION['is_logged_in'] = true;
                $_SESSION['username'] = $username;
                setcookie('todo-username', $username, time() + 3600 * 24 * 30, '/');

                header('Location: to_do.php');
                exit();
            } else {
                $attempts[$username]['attempts'] = (int)($attempts[$username]['attempts'] ?? 0) + 1;

                if ($attempts[$username]['attempts'] >= 3) {
                    $attempts[$username]['locked_until'] = time() + 30;
                    $attempts[$username]['attempts'] = 0;
                    $error = "Too many attempts. You are locked out for 30 seconds.";
                } else {
                    $remaining_try = 3 - $attempts[$username]['attempts'];
                    $error = "Incorrect password. You have $remaining_try attempt" . ($remaining_try === 1 ? "" : "s") . " left before lockout.";
                }

                file_put_contents($file, json_encode($attempts));
            }
        }
    }
}

$existing_username = $_COOKIE['todo-username'] ?? '';

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

        <?php if ($message): ?>
            <p style="color: green; text-align:center; font-weight:bold;"><?php echo htmlspecialchars($message); ?></p>
        <?php endif; ?>

		<h1 class="todo">Access To-Do List</h1>

    	<div style="background-color: blue; opacity: 75%; width: 40%; margin: 0 auto; border-radius: 7px;">
			<form class="todo" action="login.php" method="POST">
                <input class="todo" 
                    type="text" 
                    name="username" 
                    placeholder="Enter Username"
                    value="<?php echo htmlspecialchars($existing_username); ?>"
                    required>

        		<input class="todo" type="password" name="password" placeholder="Enter Password" required>

        		<button class="todo" type="submit">Login</button>
    		</form>

			<?php if (!empty($error)): ?>
                <p style="color: red; text-align: center; font-weight: bold;"><?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>
		</div>
	</div>

	<?php require 'footer.php'; ?>
</body>
</html>
