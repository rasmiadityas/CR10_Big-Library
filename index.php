<?php
require_once 'actions/db_connect.php';
$sql = "SELECT * FROM media";
$result = mysqli_query($connect, $sql);
$numrow = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Big Library</title>
    <?php require_once 'components/style.php' ?>

</head>

<body>

    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-5">
                            <h1><b>Big Library</b></h1>
                            <h3><b>Found: <?= $numrow; ?> Record(s)</b></h3>
                        </div>
                        <div class="col-sm-7">
                            <a href="create.php" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Add New Record</span></a>
                            <a href="publisher.php" class="btn btn-secondary"><i class="material-icons">&#xef42;</i> <span>Publisher List</span></a>
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
                            <th>Year</th>
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
                                echo "<td><a href='details.php?id=" . $row['medID'] . "&frpub=0'><img src='" . $row['medImage'] . "' class='avatar' alt='" . $row['medTitle'] . "'> " . $row['medTitle'] . "</a></td>";
                                echo "<td>" . $row['autName'] . " " . $row['autSurname'] . "</td>";
                                echo "<td>" . date('Y', strtotime($row['pubDate'])) . "</td>";
                                if ($row['medStatus'] == 'Available') {
                                    echo "<td><span class='status text-success'>&bull;</span> " . $row['medStatus'] . "</td>";
                                } else {
                                    echo "<td><span class='status text-danger'>&bull;</span> " . $row['medStatus'] . "</td>";
                                }
                                echo "<td><a href='details.php?id=" . $row['medID'] . "&frpub=0' class='view' title='View' data-toggle='tooltip'><i class='material-icons'>&#xE417;</i></a>
                            <a href='update.php?id=" . $row['medID'] . "&frpub=0' class='edit' title='Edit' data-toggle='tooltip'><i class='material-icons'>&#xE254;</i></a>
                            <a href='delete.php?id=" . $row['medID'] . "&frpub=0' class='delete' title='Delete' data-toggle='tooltip'><i class='material-icons'>&#xE872;</i></a>
							<a href='pubmed.php?id=" . $row['pubName'] . "' class='pubmed' title='Publisher: " . $row['pubName'] . "' data-toggle='tooltip'><i class='material-icons'>&#xe0af;</i></a>
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