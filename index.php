<?php require_once 'crap.php'; ?>

<head>
  <title>textcrap</title>
  <link rel="stylesheet" href="main.css" type="text/css">	
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<center>
	<br>
	<a href="index.php" style="text-decoration: none; color: white;"><h1>textcrap</h1></a>
	<p style="color: white;">
		The easiest way to post your text-based crap online.
	</p>
	
	<?php

	if ( isset ( $_POST['submit'] ) ) {
		# Generate an ID
		$id = doID ( );
		$id_query = mysqli_query ( db ( ), "SELECT * FROM crap WHERE url = '" . $id . "'" );
		while ( mysqli_num_rows ( $id_query ) !== 0 ) {
			$id = doID ( );
		}

		# Insert into the database
		$crap   = doSafe ( $_POST['crap'] );
		$title  = doSafe ( $_POST['title'] );
		
		if ( strlen ( $title ) < 2 || strlen ( $crap ) < 5 || strlen ( $title ) > 65535 || strlen ( $crap ) > 65535 ) {
			echo ( '<br><div class=notif>Your required fields had too short content to post.</div>' );
		} else {
			$query  = mysqli_query ( db ( ), "INSERT INTO crap (url, crap, title, ip) VALUES ('" . $id . "', '" . $crap . "', '" . $title . "', '" . $_SERVER['REMOTE_ADDR'] . "')" );

			if ( !$query )
				echo ( '<br><div class=notif>Crap! An unexpected error occurred.</div>' );
			else {
				$query2 = mysqli_query ( db( ), "SELECT * FROM crap WHERE url = '" . $id . "'" );
				$result = mysqli_fetch_assoc ( $query2 );
				echo ( "<br><div class=notif>Your crap was uploaded. Click <a href='/c/" . $result['url'] . "'>here</a> to view it.</div>" );
			}
		}

	}
	
	?>

	<br>

	<form action="" method="post">
		<input type="text" name="title" placeholder="Title of the crap">
		<textarea name="crap" placeholder="Enter some crap here..."></textarea><br>
		<input type="submit" name="submit" value="Create">
	</form>
	
	<br><br><br><br><br>
	Made with <3 by <a href="http://cammarata.info">Preston Cammarata</a><br>
	<a href="http://github.com/aceriou/textcrap">GitHub Repository</a><br>
	Made in Rhode Island.
	
</center>
