<?
	
	include("updater.php");
	
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>DallasRead.com</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
</head>

<body>
	
	<h1>DallasRead.com</h1>
	<ul>
		<?
			foreach ($posts as $post)
			{
				echo "<li><a href=\"post.php?file=" . $post["url"] . "\">" . $post["title"] . "</a></li>";
			}
		?>
	</ul>
	
</body>

</html>