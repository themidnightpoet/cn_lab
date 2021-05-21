<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
//header("Location: main.html");
global $con;
$con = mysqli_connect('localhost','root','','test2');
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
  echo "\n";
}
else {
  //echo '<script>alert("Connected Successfully")</script>';
}


$sql = "SELECT * FROM `hof`";

//insert in database
$result = $con->query($sql);
$con->close();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="mystyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
  <link href="/your-path-to-fontawesome/css/brands.css" rel="stylesheet">
  <link href="/your-path-to-fontawesome/css/solid.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="mystyle.css">
    <meta charset="utf-8">
    <title>Hall Of Fame</title>
    <style>
    @-ms-viewport{
  width: device-width;
          }
    .content {
        width: 1000px;
        background-color: white;
        margin: 0;
        padding: 20px;
        border-radius: 12px;
        font-family: 'Merriweather',serif;
      }

      p {
        text-align: justify;
        text-justify: inter-word;
        margin-top: 50px;
        margin-bottom: 50px;
        margin-right: 250px;
        margin-left: 10px;
        font-family: 'Merriweather',serif;
         word-wrap: break-word;

      }
      ul
      {
        font-family: 'Merriweather',serif;
      }
      
      .card {
        /* Add shadows to create the "card" effect */
              box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
              transition: 0.3s;
              border-radius: 5px; 
               word-wrap: break-word;
            }

      
      /* On mouse-over, add a deeper shadow */
      .card:hover {
                    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
                  }

      
      /* Add some padding inside the card container */
      .container {
                  padding: 2px 16px;
                 }

      img {
            border-radius: 5px 5px 0 0;
          }

    @media screen and (max-width: 600px) {
          .column,.content,.card
          {
          width: 100%;
          }
      }
    @media screen and (max-width: 600px) {
      .text {
        font-size: 16px;
      }
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.html"><i class="fas fa-guitar">&nbsp;</i></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="home.html">Home</a></li>
      <li><a href="history.html">A Brief History</a></li>
      <li><a href="hof.php">Hall of Fame</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="login.html"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
    <center>
<br><br><br><br>
    <div class="content">
      <center>
      <h1>Hall of Fame</h1>
      <br>
      <a href="addInfo.html" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Add a card</a>
       <a href="ops.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Modify a card</a>
       <a href="removeOp.php" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Remove a card</a>
      <br>
      <br>
 <?php
    if ($result->num_rows > 0) {
  // output data of each row
        while($row = $result->fetch_assoc()) {
          ?>
          <div class="card">
            <img src ="<?php echo $row["picLoc"];?>" height="150">
            <div class="container">
              <h4><b><?php echo $row["name"]; ?></b></h4>
              <p>
                  <?php echo $row["info"]; ?>
              </p>
            </div>
          </div>
          <br> <br>
          <?php
          //echo $row["name"]. "<br>";
         // echo "Age: " . $row["age"]. "<br>";
         // echo "Email: " . $row["mail"]. "<br>";
        }
      } else {
        echo "0 results";
      }
     ?>
     <br>
      </center>
   </div>
 </center>
  </body>
</html>
