<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">DATA INFORMATION</h2>
                        <a href="upload.php" class="btn btn-success pull-right">Upload Data</a>
                    </div>
                    <?php
                    //session_start();
                    // Include config file
                    include 'config.php';

                    //Code to see if Table Exists
                    $exits = "select 1 from test_data";
                  if(($resultexits = mysqli_query($link, $exits))>= 0){
                    if($resultexits !== FALSE){


                        // Attempt select query execution
                        $sql = "SELECT * FROM test_data";
                        if($result = mysqli_query($link, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                echo "<table class='table table-bordered table-striped'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                          //echo "<th>#</th>";
                                            echo "<th>SKU</th>";
                                            echo "<th>Name</th>";
                                            echo "<th>Price</th>";
                                            echo "<th>Action</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                        //  echo "<td>" . $row['id'] . "</td>";
                                            echo "<td>" . $row['sku'] . "</td>";
                                            echo "<td>" . $row['name'] . "</td>";
                                            echo "<td>" . $row['price'] . "</td>";
                                            echo "<td>";
                                                echo "<a href='read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                                echo "<a href='update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                                echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                            echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";
                                echo "</table>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }
                        } else{
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                        }
                    }

                    else{

                      // Attempt create table query execution
                    $Createsql = "CREATE TABLE test_data(
                        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                        sku INT(11) NOT NULL,
                        name VARCHAR(50) NOT NULL,
                        price Decimal(10,0) NOT NULL
                    )";
                    if(mysqli_query($link, $Createsql)){
                      echo "<p class='lead'><em>No records were found.</em></p>";
                    } else{
                       echo "ERROR: Could not able to execute $Createsql. " . mysqli_error($link);
                    }
                    }
                  }
                  else{
                    echo "else";
                      echo "ERROR: Could not able to execute $exits. " . mysqli_error($link);
                  }

                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
