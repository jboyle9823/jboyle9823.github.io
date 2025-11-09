<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="author" content="Jonathan Boyle">
	<title>Marketplace</title>
	<link rel="stylesheet" href="my_style.css">
</head>
<body>
    <div class = "body_wrapper">
		<?php 
            $current_page = 'marketplace'; 
            require 'nav.php'; 
        ?>
        <h1>This is my Marketplace!</h1>
        <script src="1-marketplace.js"></script>
    </div>
	<?php require 'footer.php'; ?>
</body>
</html>