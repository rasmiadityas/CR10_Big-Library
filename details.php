<?php
require_once 'actions/db_connect.php';

$frpub = 0;
if ($_GET['frpub']) {
	$frpub = $_GET['frpub'];
}

if ($_GET['id']) {
	$medID = $_GET['id'];
	$sql = "SELECT * FROM media WHERE medID = {$medID}";
	$result = $connect->query($sql);

	if ($result->num_rows == 1) {
		$data = $result->fetch_assoc();
		$medTitle = $data['medTitle'];
		$medImage = $data['medImage'];
		$autName = $data['autName'];
		$autSurname = $data['autSurname'];
		$ISBN = $data['ISBN'];
		$medDesc = $data['medDesc'];
		$pubDate = $data['pubDate'];
		$pubName = $data['pubName'];
		$pubAddress = $data['pubAddress'];
		$pubSize = $data['pubSize'];
		$medType = $data['medType'];
		$medStatus = $data['medStatus'];

		$message = "<table class='table w-50'>
			<tr>
			Author: $autName $autSurname<br>
			Description: $medDesc<br>
			ISBN/ASIN: $ISBN<br>
			Published Date: $pubDate<br>
			<br>
			Publisher: $pubName<br>
			Publisher Address: $pubAddress<br>
			Publisher Size: $pubSize<br>
            <br><img src='$medImage' width='200' alt='$medTitle'><br>
            </tr></table>";
	} else {
		header("location: error.php");
	}
	$connect->close();
} else {
	header("location: error.php");
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>View Media</title>
	<?php require_once 'components/style.php' ?>

</head>

<body>
	<fieldset>
		<font class='medtype'><?= $medType ?></font>
		<legend class='h2'><?= $medTitle ?></legend>
		<p><?php
			if ($medStatus == 'Available') {
				echo "<font class='available'>$medStatus</font>";
			} else {
				echo "<font class='reserved'>$medStatus</font>";
			}

			?></p>
		<form action="actions/a_update.php" method="post" enctype="multipart/form-data">
			<table class="table">

				<p><?php echo ($message) ?? ''; ?></p><br>

				<tr>
					<?php
					if ($frpub != 0) {
						echo "<a href='update.php?id=$medID&frpub=$frpub'><button class='btn btn-outline-warning' type='button'>Edit</button></a>
						<a href='delete.php?id=$medID&frpub=$frpub'><button class='btn btn-outline-danger' type='button'>Delete</button></a>
                <a href= 'index.php'><button class='btn btn-outline-success' type='button'>Back to Home</button></a>
				<a href= 'pubmed.php?id=$frpub'><button class='btn btn-outline-primary' type='button'>Back to Publisher</button></a>";
					} else {
						echo "<a href='update.php?id=$medID&frpub=$frpub'><button class='btn btn-outline-warning' type='button'>Edit</button></a>
						<a href='delete.php?id=$medID&frpub=$frpub'><button class='btn btn-outline-danger' type='button'>Delete</button></a>
                <a href= 'index.php'><button class='btn btn-outline-success' type='button'> Back to Home</button></a>";
					}
					?>
				</tr>
				<br><br>
			</table>
		</form>
	</fieldset>
</body>

</html>