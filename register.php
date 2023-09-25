<?php
require_once('connection.php');
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

if (isset($_POST["log"])) {
  $username = $_POST["username"];
  $name = $_POST["name"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  if (isset($username)&&isset($email)) {
    $cekusername = $conn->prepare("SELECT * from `customer` where username=?");
    $cekusername->bind_param("s",$username);
    $cekusername->execute();
    $cekusername = $cekusername->get_result()->fetch_all(MYSQLI_ASSOC);
    $cekusername = count($cekusername);

    $cekemail = $conn->prepare("SELECT * from `customer` where email=?");
    $cekemail->bind_param("s",$email);
    $cekemail->execute();
    $cekemail = $cekemail->get_result()->fetch_all(MYSQLI_ASSOC);
    $cekemail = count($cekemail);

    if ($cekusername>0) {
      echo "<script>alert('Username Sudah Dipakai!')</script>";
    }
    else if ($cekemail>0) {
      echo "<script>alert('Email Sudah Dipakai!')</script>";
    }
    else{
      $register = $conn->prepare("INSERT INTO `customer` (`ID`, `username`, `name`, `email`, `password`) VALUES (NULL, ?, ?, ?, ?);");
      $register->bind_param("ssss",$username,$name,$email,$password);
      $register->execute();
      header("location:login.php");
    }

    
  } 
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Home</title>
  </head>
  <style>
      .window{
        width: 50vw;
        height: 50vh;
        margin: 10px auto;
      }
      .window .title{
        width: 9vw;
        margin: 0 auto;
      }
      .sub{
        margin: 0 auto;
        width: 20vw;
      }
      input[type="text"]{
          width: 100%;
          margin:10px 0;
          padding: 10px 5px;
      }
      input[type="submit"]{
          width: 100%;
          margin:10px 0;
          padding: 10px 5px;
      }
  </style>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light pb-2" id="nav">
        <div class="container" >
            <div class="me-auto order-0">
                <button class="navbar-toggler me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand fs-2 me-1" href="index.php">Artificial Greenery</a>
            </div>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-1 ">
                <a class="nav-link ms-1" href="ArtificialP.php">Artificial Plants</a>
                <a class="nav-link ms-1" href="ArtificialFSearch.php">Artificial Flowers</a>
            </div>
            <form class="d-flex ms-auto me-4">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
          <div class="navbar">
            <a class="nav me-3" href="login.php"><img src="./webpage_asset/person.svg" alt=""></a>
            <a class="nav" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"><img src="./webpage_asset/shopping-cart.svg" aria-controls="offcanvasRight" alt=""></a>
          </div>
        </div>
    </nav>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
          <h5 id="offcanvasRightLabel">Shopping Cart</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          ...
        </div>
    </div>
    <div class="window">
        <div class="title d-flex justify-content-center"><h1>Register</h1></div>
        <div class="sub d-flex justify-content-center">
            <form action="" method="post">
                <input type="text" name="username" id="" placeholder="Username">
                <input type="text" name="name" id="" placeholder="Name">
                <input type="text" name="email" id="" placeholder="Email">
                <input type="text" name="password" id="" placeholder="Password">
                <input type="submit" name="log" id="" value="Create">
            </form>
        </div>
        <div class="d-flex justify-content-center">
        Returning customer? &nbsp<a href="login.php"> Sign in</a>
        </div>
    </div>
    <footer id="footer" class="bg-light text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
          © 2021 Copyright: Something
        </div>
        <!-- Copyright -->
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>