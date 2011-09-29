<?
	
	function prepareArticle($article)
	{
		$article = preg_replace("/\*(.*?)\*/", "<strong>$1</strong>", $article);
		$article = preg_replace("/\\\(.*?)\\\/", "<em>$1</em>", $article);
		$article = preg_replace('/\|(.+?)\|/is', "<span class=\"indent\">$1</span>", $article);
		return $article;
	}
	
	function update()
	{
		$dir = "posts/published/";
		$file = "posts.rdr";
		$posts = scandir($dir, 0);
		$index = $dir . "/" . $file;
		$rid = array("Title: ", "Date: ", "\n");
		
		foreach ($posts as $post)
		{
			if ($post != ".." && $post != ".")
			{
				$lined_content = file($dir . $post);
				$content = file_get_contents($dir . $post);
				$title = str_replace($rid, "", $lined_content[0]);
				$date = str_replace($rid, "", $lined_content[1]);
				$url = $post;
				$location = str_replace($rid, "", $lined_content[2]);
				$tags = str_replace($rid, "", $lined_content[3]);
				$author = str_replace($rid, "", $lined_content[4]);
				$tease = str_replace($rid, "", $lined_content[5]);
				$article = str_replace("-------\n\n", "", strchr($content, "-------"));
				$postnamestr .= htmlentities("$title | $date | $location | $tags | $author | $tease | $url\n");
			}
		}
	
		# If any changes, update posts.rdr
		if (strlen($postnamestr) + 6 + strlen($total) != strlen(file_get_contents($file)))
		{
			$rdrhandle = fopen($file, 'w') or die("can't open file");
			fwrite($rdrhandle, $postnamestr);
			fclose($rdrhandle);
		}
	}
	
	update();
	
	$posts = file("posts.rdr");
	for ($i = 0; $i <= count($posts) - 1; $i++)
	{
		$line_split = split(" \| ", $posts[$i]);
		$posts[$i] = array();
		$posts[$i]["rawdate"] = strtotime($line_split[1]);
		$posts[$i]["date"] = date("M d, Y", strtotime($line_split[1]));
		$posts[$i]["title"] = $line_split[0];
		$posts[$i]["location"] = $line_split[2];
		$posts[$i]["tags"] = $line_split[3];
		$posts[$i]["author"] = $line_split[4];
		$posts[$i]["tease"] = $line_split[5];
		$posts[$i]["url"] = $line_split[6];
	}
	sort($posts)

?>