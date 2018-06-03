<?php
include "config.php";

 if(isset($_POST["submit"]))
 {
  if($_FILES['file']['name'])
  {
   $filename = explode(".", $_FILES['file']['name']);
   if($filename[1] == 'csv')
   {
    $handle = fopen($_FILES['file']['tmp_name'], "r");
    while($data = fgetcsv($handle))
    {
     $item1 = mysqli_real_escape_string($link, $data[0]);
     $item2 = mysqli_real_escape_string($link, $data[1]);
     $item3 = mysqli_real_escape_string($link, $data[2]);

     $query = "INSERT into test_data(sku, name, price) values('$item1','$item2','$item3')";

     if (mysqli_query($link, $query)) {
      //echo "New record created successfully";
  } else {
      echo "Error: " . $query . "<br>" . mysqli_error($link);
  }


    }
    fclose($handle);
    echo '<script type="text/javascript">';
  echo 'alert("Data imported Successfully");';
  echo 'window.location.href = "index.php";';
  echo '</script>';
   }
  }
 }

?>

<!DOCTYPE html>
<html>
<head>
 <title> </title>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 <link rel="stylesheet" href="./CSS/style.css" />
</head>
<body style="background:white">
  <form method="post" enctype="multipart/form-data">
    <div class="upload">
 <div class="upload-files">
  <header>
   <p>
    <i class="fa fa-cloud-upload" aria-hidden="true"></i>
    <span class="up">up</span>
    <span class="load">load</span>
   </p>
  </header>
  <div align="center">
      <br />
  &nbsp;  <img src="./images/File download.png" height="42" width="42"></img>
    <br />
      <br />
  <p class="pointer-none"><b>Browse</b> files here to <br /> begin the upload</p>
<br />
 <input type="file" name="file" value="Select Files"  align="center" />
   <br />
   <br />
   <input type="submit" name="submit" value="Upload" class="btn btn-info" />
   <a href="index.php" class="btn btn-info">Back</a>
  </div>
 </div>
</div>
  </form>
</body>
</html>
