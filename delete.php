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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Media</title>
    <?php require_once 'components/style.php' ?>

</head>

<body>
    <fieldset>
        <legend class='h2 mb-3'>Delete Media</legend>
        <h5>You have selected the data below:</h5>
        <table class="table w-75 mt-3">
            <tr>
                Type: <?php echo $medType ?><br>
                Title: <?php echo $medTitle ?><br>
                Status: <?php echo $medStatus ?><br>
                <br><img src='<?= $medImage; ?>' width='200' alt='<?= $medTitle; ?>'><br>
            </tr>
        </table>

        <h3 class="mb-4">Do you really want to delete this record?</h3>
        <form action="actions/a_delete.php<?php echo "?frpub=$frpub" ?>" method="post">
            <input type="hidden" name="medID" value="<?php echo $medID ?>" />
            <button class="btn btn-outline-danger" type="submit">Yes, Delete</button>
            <?php
            if ($frpub != 0) {
                echo "<a href= 'index.php'><button class='btn btn-outline-success' type='button'>No, Back to Home</button></a>
				<a href= 'pubmed.php?id=$frpub'><button class='btn btn-outline-primary' type='button'>No, Back to publisher</button></a>";
            } else {
                echo "<a href= 'index.php'><button class='btn btn-outline-success' type='button'>No, Back to Home</button></a>";
            }
            ?>
        </form>
        <br><br>
    </fieldset>
</body>

</html>