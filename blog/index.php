<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title> Swagblogg </title>
	<link rel="stylesheet" type="text/css" href="style.css" >
</head>
<body>
<main>
<form action="index.php" method="post">
	<h1><lable for="title"> Title: </lable><br>
	<input type="text" name="title"></h1><br>
	<lable for="message"> Message: </lable><br>
	<input type="text" name="content"><br>
	<input type="submit" name="submit">

</form>
<?php

		$dbh = new PDO("mysql:host=localhost;dbname=posts;charset=utf8",
		"root", 
		"");

	if(isset($_POST['submit'])) {

		$sql ="insert into posts(userid, title, content)
			values (1, ' " . $_POST['title'] . " ' , ' " . $_POST['content'] . "')";
		$stmt = $dbh->prepare($sql);
		$stmt->execute();	

	}

$sql = "select * from posts";
$stmt = $dbh->prepare($sql);
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	//echo "<pre>" . print_r($row,1) . "</pre>";
	echo" <article class=\"ram\">
		<h1>" . $row["title"] . "</h1>
		<p>" . $row["content"] . "</p>
	</div>
	</article>";
}   


?>
<img id="pic" src="pic.png">
</main>
</body>
</html>