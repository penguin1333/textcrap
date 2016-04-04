<?php require_once 'crap.php'; ?>

<head>
  <title>textcrap</title>
  <link rel="stylesheet" href="../main.css" type="text/css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<?php

if ( isset ( $_GET['c'] ) ) {
	$crap_id = doSafe ( $_GET['c'] );
	$query   = mysqli_query ( db( ), "SELECT * FROM crap WHERE url = '" . $crap_id . "'" );
	if ( !$query )
		die ( 'Crap! An unexpected error occured.' );

	if ( mysqli_num_rows ( $query ) === 0 )
		die ( 'This is not a valid ID.' );

	$crap = mysqli_fetch_assoc ( $query );

} else {
	die ( 'An ID was not supplied.' );
}



?>

<center>

	<br>
	<a href="../index.php" style="text-decoration: none; color: white;"><h1>textcrap</h1></a>
	<p style="color: white;">
		The easiest way to post your text-based crap online.
	</p>
	
	<br>
	
	<input type="text" value="<?php echo $crap['title']; ?>" DISABLED />
	<textarea><?php echo $crap['crap']; ?></textarea>
	
	<br><br><br><br><br><br><br><br>
	Made with <3 by <a href="http://cammarata.info">Preston Cammarata</a><br>
	<a href="http://github.com/aceriou/textcrap">GitHub Repository</a><br>
	Made in Rhode Island.
	
</center>

