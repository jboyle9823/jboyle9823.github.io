<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="author" content="Jonathan Boyle">
	<title>Jonathan Boyle | Pseudo-LinkedIn</title>
	<link rel="stylesheet" href="my_style.css">
	<script src="nav.js"></script>
</head>
<body>
	<div class="body_wrapper">
		<nav id="main-nav"></nav>
		<script>
			const current_path = location.pathname;
			setNav(current_path);
		</script>

		<h1>Jonathan Boyle</h1>
		<p>
			GitHub: <em>https://github.com/jboyle9823</em><br>
    		Email: <em>jboyle9823@gmail.com</em><br>
		</p>

		<h2>About</h2>
		<p>
			Computer Science student at <strong>Bishop's University</strong> with a continuous objective for personal growth through diligence &amp; hard work, with ambition &amp; creativity.<br>
			Coding proficiency with skills in <strong>C++, Java, Python</strong> &amp; others.
		</p>

		<hr>

		<h2>Skills</h2>
		<ul>
    		<li>Programming: C++, Java, Python, HTML</li>
    		<li>Tools: Git, VSCode</li>
    		<li>Spoken: English, French</li>
		</ul>

		<hr>

		<h2>Education</h2>
		<table>
    		<thead>
    			<tr>
    				<th>School</th>
        			<th>Degree</th>
        			<th>Year</th>
    			</tr>
    		</thead>
    		<tbody>
    			<tr>
    				<td>Bishop's University</td>
        			<td>Computer Science BSc</td>
        			<td>2022–Present</td>
      			</tr>
      			<tr>
        			<td>Lower Canada College</td>
        			<td>Pre-University Diploma</td>
        			<td>2021–2022</td>
      			</tr>
      			<tr>
        			<td>West Island College</td>
        			<td>High School Diploma</td>
        			<td>2016–2021</td>
      			</tr>
    		</tbody>
		</table>
		<div class="slideshow">
			<h2 style="text-align: center; text-decoration: underline;">Favourite Cars!</h2>
			<div class="slideshow_img"><img src="images/ae86.jpg" alt="Toyota AE86 Trueno"></div>
			<div class="slideshow_img"><img src="images/FD.jpg" alt="Mazda RX-7 FD"></div>
			<div class="slideshow_img"><img src="images/FC.jpg" alt="Mazda RX-7 FC"></div>

			<a id="prev" onclick="previous()">&#10094;</a>
			<a id="next" onclick="next()">&#10095;</a>
		</div>
	</div>
	<footer>
		This website is made for CS203 labs!
	</footer>
	
	<script>
		let current_slide = 0;
		showSlide(current_slide);

		function showSlide(n) {
			let slides = document.getElementsByClassName("slideshow_img");
			if (n >= slides.length) { current_slide = 0; }
			if (n < 0) { current_slide = slides.length - 1; }

			for (let i = 0; i < slides.length; i++) {
				slides[i].style.display = "none";
			}
			slides[current_slide].style.display = "block";
		}

		function next() {
			current_slide++;
			showSlide(current_slide);
		}

		function previous() {
			current_slide--;
			showSlide(current_slide);
		}
	</script>
</body>
</html>
