<?php
require_once 'db_connect.php';

$frpub = 0;
if ($_GET['frpub']) {
    $frpub = $_GET['frpub'];
}

if ($_POST) {    
    $medID = $_POST['medID'];
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

$defImage = "https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/495px-No-Image-Placeholder.svg.png";
 
 if ($medImage === "") {
			$medImage = $defImage;
		}
 
if ($pubName === "") {
			$pubName = "Unknown";
		}

    $sql = "UPDATE media SET
	medTitle = '$medTitle',
medImage = '$medImage',
autName = '$autName',
autSurname = '$autSurname',
ISBN = '$ISBN',
medDesc = '$medDesc',
pubDate = '$pubDate',
pubName = '$pubName',
pubAddress = '$pubAddress',
pubSize = '$pubSize',
medType = '$medType',
medStatus = '$medStatus'
	WHERE medID = {$medID}";

if ($connect->query($sql) === TRUE) {
        $class = "success";
        $message = "The record below was successfully updated<br>
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
        $message = "Error while updating record : <br>" . $connect->error;
        
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
        <title>Edit Media Confirmation</title>
        <?php require_once '../components/style.php'?> 
    </head>
    <body>
        <div class="container">
            <div class="mt-3 mb-3">
                <h1>Edit Media Confirmation</h1>
            </div>
            <div class="alert alert-<?php echo $class;?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <?php
						if ($frpub != 0) {
						echo "<a href= '../update.php?id=$medID&frpub=$frpub'><button class='btn btn-outline-warning' type='button'>Edit Again</button></a>	
						<a href= '../index.php'><button class='btn btn-outline-success' type='button'>Back to Home</button></a>
				<a href= '../pubmed.php?id=$frpub'><button class='btn btn-outline-primary' type='button'>Back to Publisher</button></a>";	
						} else {
							echo "<a href= '../update.php?id=$medID&frpub=$frpub'><button class='btn btn-outline-warning' type='button'>Edit Again</button></a>	
							<a href= '../index.php'><button class='btn btn-outline-success' type='button'>Back to Home</button></a>";
						}
						?>
				
            </div>
        </div>
    </body>
</html>