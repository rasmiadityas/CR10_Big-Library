<?php
require_once 'actions/db_connect.php';
$sql = "SELECT * FROM media GROUP BY pubName";
$result = mysqli_query($connect, $sql);
$numrow = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Publisher List</title>
    <?php require_once 'components/style.php' ?>

</head>

<body>

    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-5">
                            <h2>Publisher List</h2>
                            <h3><b>Found: <?= $numrow; ?> Publisher(s)</b></h3>
                        </div>
                        <div class="col-sm-7">
                            <a href="index.php" class="btn btn-secondary"><i class="material-icons">&#xe88a;</i> <span>Back to Home</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Record</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Size</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if (mysqli_num_rows($result)  > 0) {

                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                $pubName2 = $row['pubName'];
                                $sql2 = "SELECT * FROM media WHERE pubName = '{$pubName2}'";
                                $result2 = mysqli_query($connect, $sql2);
                                $numrowpub = mysqli_num_rows($result2);

                                echo "<tr>";

                                if ($row['pubName'] == 'Unknown') {
                                    echo "<td style='text-align: center;'>$numrowpub</td>";
                                    echo "<td><a href='pubmed.php?id=" . $row['pubName'] . "'>" . $row['pubName'] . "</a></td>";
                                    echo "<td>N/A</td>";
                                    echo "<td>N/A</td>";
                                    echo "<td><a href='pubmed.php?id=" . $row['pubName'] . "' class='view' title='View' data-toggle='tooltip'><i class='material-icons'>&#xE417;</i></a></td>";
                                } else {
                                    echo "<td style='text-align: center;'>$numrowpub</td>";
                                    echo "<td><a href='pubmed.php?id=" . $row['pubName'] . "'>" . $row['pubName'] . "</a></td>";
                                    echo "<td>" . $row['pubAddress'] . "</td>";
                                    echo "<td>" . $row['pubSize'] . "</td>";
                                    echo "<td><a href='pubmed.php?id=" . $row['pubName'] . "' class='view' title='View' data-toggle='tooltip'><i class='material-icons'>&#xE417;</i></a></td>";
                                }
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