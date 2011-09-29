<?
	
	include("updater.php");
	
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>DallasRead.com</title>
	<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
</head>

<body>
	
	<div class="container">
		
		<h1>DallasRead.com</h1>
		<p><a href="http://www.twitter.com/dallasread">@dallasread</a> on Twitter</p>
		
		<ul>
			<?
				foreach ($posts as $post)
				{
					echo "<li><a href=\"posts/" . str_replace(".rdr", "", $post["url"]) . "\">" . $post["title"] . "</a> :: " . $post["date"] . "</li>";
				}
			?>
		</ul>
		
	</div>
	
</body>

</html>