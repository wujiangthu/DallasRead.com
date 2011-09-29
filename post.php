<?
	include("updater.php");

	$rid = array("Title: ", "Date: ", "\n");
	$lined_content = file("posts/published/" . $_GET["file"]);
	$content = file_get_contents("posts/published/" . $_GET["file"]);
	$title = str_replace($rid, "", $lined_content[0]);
	$date = str_replace($rid, "", $lined_content[1]);
	$url = $post;
	$location = str_replace($rid, "", $lined_content[2]);
	$tags = str_replace($rid, "", $lined_content[3]);
	$author = str_replace($rid, "", $lined_content[4]);
	$tease = str_replace($rid, "", $lined_content[5]);
	$post = str_replace("-------\n\n", "", strchr($content, "-------"));
	$post = prepareArticle($post);
	
?>

<!DOCTYPE HTML>
<html>
<head>
	<title><? echo $title; ?> :: DallasRead.com</title>
	<meta name="viewport" content="width=device-width" />
	<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
</head>

<body>
	
	<div class="container">
		
		<h1>DallasRead.com</h1>
		<a href="../"><< Home</a>
		<p class="post"><? echo $post; ?></p>
		
	</div>
	
</body>

</html>