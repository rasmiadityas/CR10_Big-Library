<?php
require_once 'db_connect.php';

$frpub = 0;

if ($_POST) {   
    $medTitle = $_POST['medTitle'];
$medImage = $_POST['medImage'];
$autName = $_POST['autName'];
$autSurname = $_POST['autSurname'];
$ISBN = $_POST['ISBN'];
$medDesc = $_POST['medDesc'];
$pubDate = $_POST['pubDate'];
$pubName = $_POST['pubName'];
$pubAddress = $_POST['pubAddress'];
$pubSize = $_POST['pubSize'];
$medType = $_POST['medType'];
$medStatus = $_POST['medStatus'];
 
 if ($medImage === "") {
			$medImage = "https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/495px-No-Image-Placeholder.svg.png";
		}
 
 if ($pubName === "") {
			$pubName = "Unknown";
		}
 
    $sql = "INSERT INTO media(medTitle,medImage,autName,autSurname,ISBN,medDesc,pubDate,pubName,pubAddress,pubSize,medType,medStatus) 
	VALUES ('$medTitle','$medImage','$autName','$autSurname','$ISBN','$medDesc','$pubDate','$pubName','$pubAddress','$pubSize','$medType','$medStatus')";
	
	if ($connect->query($sql) === true) {
        $class = "success";
        $message = "The entry below was successfully created <br>
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
            </tr></table>";
        
		
    } else {
        $class = "danger";
        $message = "Error while creating record. Try again: <br>" . $connect->error;
        
    }
	
	$sql = "SELECT * FROM media WHERE medID = (SELECT MAX(medID) FROM media)";
	$result = $connect->query($sql);
    
	if ($result->num_rows == 1) {
        $data = $result->fetch_assoc();
		$medID = $data['medID'];
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
        <title>Insert Media Confirmation</title>
        <?php require_once '../components/style.php'?>
    </head>
    <body>
        <div class="container">
            <div class="mt-3 mb-3">
                <h1>Insert Media Confirmation</h1>
            </div>
            <div class="alert alert-<?=$class;?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
				<?php
						if ($frpub != 0) {
						echo "<a href= '../update.php?id=$medID&frpub=$frpub'><button class='btn btn-outline-warning' type='button'>Edit</button></a>	
						<a href= '../index.php'><button class='btn btn-outline-success' type='button'>Back to Home</button></a>
				<a href= '../pubmed.php?id=$frpub'><button class='btn btn-outline-primary' type='button'>Back to Publisher</button></a>";	
						} else {
							echo "<a href= '../update.php?id=$medID&frpub=$frpub'><button class='btn btn-outline-warning' type='button'>Edit</button></a>
							<a href= '../index.php'><button class='btn btn-outline-success' type='button'>Back to Home</button></a>";
						}
						?>
            </div>
        </div>
    </body>
</html>