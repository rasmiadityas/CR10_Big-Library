<?php
require_once 'actions/db_connect.php';
$pubget = 0;
if ($_GET) {
    if ($_GET['id']) {
        $pubget = 1;
        $pubName = $_GET['id'];
        $sql = "SELECT DISTINCT pubAddress,pubSize FROM media WHERE pubName = '{$pubName}'";
        $result = mysqli_query($connect, $sql);
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $pubAddress = $row['pubAddress'];
            $pubSize = $row['pubSize'];
        }

        $connect->close();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once 'components/style.php' ?>
    <title>Insert Media</title>
    <style>
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 60%;
        }
    </style>
</head>

<body>
    <fieldset>
        <legend class='h2'>Insert Media</legend>
        <form action="actions/a_create.php" method="post" enctype="multipart/form-data">
            <table class='table'>
                <tr>
                    <th>Media Type</th>
                    <td><input class='form-control' type="text" name="medType" placeholder="Book, DVD, CD" /></td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td><input class='form-control' type="text" name="medTitle" placeholder="Title" /></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td><input class='form-control' type="text" name="medStatus" placeholder="Available, Reserved" /></td>
                </tr>
                <tr>
                    <th>Image URL</th>
                    <td><input class='form-control' type="text" name="medImage" placeholder="https://..." /></td>
                </tr>
                <tr>
                    <th>Author First Name</th>
                    <td><input class='form-control' type="text" name="autName" placeholder="First Name" /></td>
                </tr>
                <tr>
                    <th>Author Last Name</th>
                    <td><input class='form-control' type="text" name="autSurname" placeholder="Last Name" /></td>
                </tr>
                <tr>
                    <th>ISBN/ASIN</th>
                    <td><input class='form-control' type="text" name="ISBN" placeholder="ISBN/ASIN" /></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><input class='form-control' type="text" name="medDesc" placeholder="Short Description" /></td>
                </tr>
                <tr>
                    <th>Published Date</th>
                    <td><input class='form-control' type="text" name="pubDate" placeholder="YYYY-MM-DD" /></td>
                </tr>
                <tr>
                    <th>Publisher</th>
                    <td><input class='form-control' type="text" name="pubName" placeholder="Publisher Name" <?php
                                                                                                            if ($pubget == 1) {
                                                                                                                echo "value='$pubName'";
                                                                                                            }
                                                                                                            ?> /></td>
                </tr>
                <tr>
                    <th>Publisher Address</th>
                    <td><input class='form-control' type="text" name="pubAddress" placeholder="Publisher Address" <?php
                                                                                                                    if ($pubget == 1) {
                                                                                                                        echo "value='$pubAddress'";
                                                                                                                    }
                                                                                                                    ?> /></td>
                </tr>
                <tr>
                    <th>Publisher Size</th>
                    <td><input class='form-control' type="text" name="pubSize" placeholder="Small, Medium, Big" <?php
                                                                                                                if ($pubget == 1) {
                                                                                                                    echo "value='$pubSize'";
                                                                                                                }
                                                                                                                ?> /></td>
                </tr>

            </table>

            <tr>
                <input type="hidden" name="frpub" value="<?php echo $frpub ?>" />
                <td><button class='btn btn-outline-warning' type="submit">Insert Media</button>
                    <?php

                    if ($pubget == 1) {
                        echo "<a href= 'index.php'><button class='btn btn-outline-success' type='button'>Back to Home</button></a>
						<a href= 'pubmed.php?id=$pubName'><button class='btn btn-outline-primary' type='button'>Back to Publisher</button></a>";
                    } else {
                        echo "<a href= 'index.php'><button class='btn btn-outline-success' type='button'>Back to Home</button></a>";
                    }
                    ?>
                </td>
            </tr>
            <br><br>

        </form>

    </fieldset>
</body>

</html>