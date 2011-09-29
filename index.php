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
			$posts = file("posts.rdr");
			
			for ($i = 0; $i <= count($posts) - 1; $i++) {
				$line_split = split(" \| ", $posts[$i]);
				$post_title[$i] = $line_split[0];
				$post_date[$i] = $line_split[1];
				$post_location[$i] = $line_split[2];
				$post_tags[$i] = $line_split[3];
				$post_author[$i] = $line_split[4];
				$post_tease[$i] = $line_split[5];
				$post_url[$i] = $line_split[6];
				echo "<li><a href=\"post.php?file=$post_url[$i]\">$post_title[$i]</a></li>";
			}
		?>
	</ul>
	
</body>

</html>