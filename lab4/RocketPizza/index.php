


<!DOCTYPE html>
<html>

<html>

<head>
	<title>RocketPizza</title>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div class="wrapper">
		<header class="header">
			<?php require 'header.php';?>
		</header>
		<main class="page">
			<?php
			session_start();
				$page = $_GET['page'];
				$page = htmlspecialchars($page);
				require 'pages/'.$page.'.php';
			?>
		</main>
		<footer class="footer">
			<?php require 'footer.php'; ?>
		</footer>
	</div>
	<script src="js/script.js"> </script>
</body>	
</html>