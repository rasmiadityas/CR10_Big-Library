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
        <title>Edit Media</title>
        <?php require_once 'components/style.php'?>
        
    </head>
    <body>
        <fieldset>
            <legend class='h2'>Edit Media <img class='img-thumbnail rounded-circle' src='<?php echo $medImage ?>' alt="<?php echo $medTitle ?>"></legend>
            <form action="actions/a_update.php<?php echo "?frpub=$frpub" ?>"  method="post" enctype="multipart/form-data">
                <table class="table">
                    <tr>
                        <th>Media Type</th>
                        <td><input class='form-control' type="text" name="medType"  placeholder="Book, DVD, CD" value="<?php echo $medType ?>" /></td>
                    </tr>    
                    <tr>
                       <th>Title</th>
                        <td><input class='form-control' type="text" name="medTitle"  placeholder="Title" value="<?php echo $medTitle ?>" /></td>
                    </tr>    
                    <tr>
                        <th>Status</th>
                        <td><input class='form-control' type="text" name="medStatus"  placeholder="Available, Reserved" value="<?php echo $medStatus ?>" /></td>
                    </tr>    
                    <tr>
                        <th>Image URL</th>
                        <td><input class='form-control' type="text" name="medImage"  placeholder="https://..." value="<?php echo $medImage ?>" /></td>
                    </tr>    
                    <tr>
                        <th>Author First Name</th>
                        <td><input class='form-control' type="text" name="autName"  placeholder="First Name" value="<?php echo $autName ?>" /></td>
                    </tr>    
                    <tr>
                        <th>Author Last Name</th>
                        <td><input class='form-control' type="text" name="autSurname"  placeholder="Last Name" value="<?php echo $autSurname ?>" /></td>
                    </tr>    
                    <tr>
                        <th>ISBN/ASIN</th>
                        <td><input class='form-control' type="text" name="ISBN"  placeholder="ISBN/ASIN" value="<?php echo $ISBN ?>" /></td>
                    </tr>    
                    <tr>
                        <th>Description</th>
                        <td><input class='form-control' type="text" name="medDesc"  placeholder="Short Description" value="<?php echo $medDesc ?>" /></td>
                    </tr>    
                    <tr>
                        <th>Published Date</th>
                        <td><input class='form-control' type="text" name="pubDate"  placeholder="YYYY-MM-DD" value="<?php echo $pubDate ?>" /></td>
                    </tr>    
                    <tr>
                        <th>Publisher</th>
                        <td><input class='form-control' type="text" name="pubName"  placeholder="Publisher Name" value="<?php echo $pubName ?>" /></td>
                    </tr>    
                    <tr>
                        <th>Publisher Address</th>
                        <td><input class='form-control' type="text" name="pubAddress"  placeholder="Publisher Address" value="<?php echo $pubAddress ?>" /></td>
                    </tr>    
                    <tr>
                        <th>Publisher Size</th>
                        <td><input class='form-control' type="text" name="pubSize"  placeholder="Small, Medium, Big" value="<?php echo $pubSize ?>" /></td>
                    </tr>   
                    
				</table>
					<tr>
                        <input type= "hidden" name= "medID" value= "<?php echo $data['medID'] ?>" />
                        <button class="btn btn-outline-warning" type= "submit">Save Changes</button>
                        <?php
						if ($frpub != 0) {
						echo "<a href= 'index.php'><button class='btn btn-outline-success' type='button'>Back to Home</button></a>
				<a href= 'pubmed.php?id=$frpub'><button class='btn btn-outline-primary' type='button'>Back to Publisher</button></a>";	
						} else {
							echo "<a href= 'index.php'><button class='btn btn-outline-success' type='button'>Back to Home</button></a>";
						}
						?>
                    </tr>
					<br><br>
            </form>
        </fieldset>
    </body>
</html>