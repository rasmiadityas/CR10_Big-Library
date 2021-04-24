<?php 
require_once 'db_connect.php';

$frpub = 0;
if ($_GET['frpub']) {
    $frpub = $_GET['frpub'];
}

if ($_POST) {
    $medID = $_POST['medID'];
    
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

    } else {
        header("location: error.php");
    }	
	
    $sql = "DELETE FROM media WHERE medID = {$medID}";
    if ($connect->query($sql) === TRUE) {
        $class = "success";
        $message = "The record below was successfully deleted<br>
            <table class='table w-50'>
			<tr>
            Type: $medType<br>
            Title: $medTitle<br>
            Status: $medStatus<br>
			Author: $autName $autSurname<br>
			ISBN/ASIN: $ISBN<br>
			Description: $medDesc<br>
			Published Date: $pubDate<br>
			Publisher: $pubName<br>
			Publisher Address: $pubAddress<br>
			Publisher Size: $pubSize<br>
            <br><img src='$medImage' width='200' alt='$medTitle'><br>
            </tr></table><hr>";
    } else {
        $class = "danger";
        $message = "The entry was not deleted due to: <br>" . $connect->error;
    }
    $connect->close();
} else {
    header("location: ../error.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Delete Media Confirmation</title>
        <?php require_once '../components/style.php'?>
    </head>
    <body>
        <div class="container">
            <div class="mt-3 mb-3">
                <h1>Delete Media Confirmation</h1>
            </div>
            <div class="alert alert-<?=$class;?>" role="alert">
                <p><?=$message;?></p>
                <?php
						if ($frpub != 0) {
						echo "<a href= '../index.php'><button class='btn btn-outline-success' type='button'>Back to Home</button></a>
				<a href= '../pubmed.php?id=$frpub'><button class='btn btn-outline-primary' type='button'>Back to Publisher</button></a>";	
						} else {
							echo "<a href= '../index.php'><button class='btn btn-outline-success' type='button'>Back to Home</button></a>";
						}
						?>
            </div>
        </div>
    </body>
</html>