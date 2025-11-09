<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="author" content="Jonathan Boyle">
	<title>To-Do List</title>
	<link rel="stylesheet" href="my_style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
	<style>
		li {
  			display: flex;
			font-size: 35px;
			font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
			font-weight: bolder;
			color: whitesmoke;
		}
		.fa-trash {
  			margin-left: auto;
  			color: plum;
  			cursor: pointer;
			margin-right: 5%;
		}
	</style>
</head>
<body class="todo">
	<div class="body_wrapper">
		<?php 
            $current_page = 'todo'; 
            require 'nav.php'; 
        ?>

		<h1 class="todo">My To-Do List</h1>

    	<div style="background-color: blue; opacity: 75%; width: 40%; margin: 0 auto; border-radius: 7px;">
			<form class="todo">
        		<input class="todo" type="text" id="new-item" placeholder="Enter a task">
        		<button class="todo" type="button" onclick="addItem()">Add to list</button>
    		</form>

    		<ul id="todo-list"></ul>
		</div>
	</div>
	<?php require 'footer.php'; ?>
	<script src="to_do.js"></script>
</body>
</html>
