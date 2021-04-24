<?php
require_once 'actions/db_connect.php';

if ($_GET['id']) {
    $pubName = $_GET['id'];
    $sql = "SELECT * FROM media WHERE pubName = '{$pubName}'";
    $result = mysqli_query($connect, $sql);
    $numrow = mysqli_num_rows($result);
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Publisher Media</title>
    <?php require_once 'components/style.php' ?>

</head>

<body>

    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-5">
                            <h2>Publisher: <?= $pubName; ?></h2>
                            <h3><b>Found: <?= $numrow; ?> Record(s)</b></h3>
                        </div>
                        <div class="col-sm-7">
                            <a href='create.php?id=<?= $pubName; ?>' class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Add New Record for this Publisher</span></a>
                            <a href="publisher.php" class="btn btn-secondary"><i class="material-icons">&#xef42;</i> <span>Back to Publisher List</span></a>
                            <a href="index.php" class="btn btn-secondary"><i class="material-icons">&#xe88a;</i> <span>Back to Home</span></a>

                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Type</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if (mysqli_num_rows($result)  > 0) {
                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                echo "<tr>";
                                echo "<td>" . $row['medID'] . "</td>";
                                echo "<td>" . $row['medType'] . "</td>";
                                echo "<td><a href='details.php?id=" . $row['medID'] . "&frpub=$pubName'><img src='" . $row['medImage'] . "' class='avatar' alt='" . $row['medTitle'] . "'> " . $row['medTitle'] . "</a></td>";
                                echo "<td>" . $row['autName'] . " " . $row['autSurname'] . "</td>";
                                if ($row['medStatus'] == 'Available') {
                                    echo "<td><span class='status text-success'>&bull;</span> " . $row['medStatus'] . "</td>";
                                } else {
                                    echo "<td><span class='status text-danger'>&bull;</span> " . $row['medStatus'] . "</td>";
                                }
                                echo "<td><a href='details.php?id=" . $row['medID'] . "&frpub=$pubName' class='view' title='View' data-toggle='tooltip'><i class='material-icons'>&#xE417;</i></a>
                            <a href='update.php?id=" . $row['medID'] . "&frpub=$pubName' class='edit' title='Edit' data-toggle='tooltip'><i class='material-icons'>&#xE254;</i></a>
                            <a href='delete.php?id=" . $row['medID'] . "&frpub=$pubName' class='delete' title='Delete' data-toggle='tooltip'><i class='material-icons'>&#xE872;</i></a>

							</td>";
                                echo "</tr>";
                            };
                        } else {
                            echo  "No Data Available";
                        }

                        ?>

                    </tbody>
                </table>

            </div>
            <p class="mt-4 text-muted" align="middle">&copy; Rasmi, 2021</p>
        </div>
    </div>

</body>

</html>