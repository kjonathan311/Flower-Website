<?php
require_once("./connection.php");
if (!isset($_GET["ID_tanaman"])) {
  header("location:index.php");
}
$ID_tanaman = $_GET["ID_tanaman"];
$tanaman = $conn->query("SELECT * FROM tanaman where ID=$ID_tanaman")->fetch_all(MYSQLI_ASSOC)[0];
// echo "<pre>";
// print_r($tanaman);
// echo "</pre>";
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="shoppingcart.css">
    <title>Home</title>
  </head>
  <style>
      .det{
        padding: 0 40px;
        /* height: 70vh;
        margin: 10px auto; */
      }
      .picture{
        height:630px;
        max-width: 450px;
      }
      .picture img{
          width: 100%;
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
            <!-- <form class="d-flex ms-auto me-4">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->
          </div>
          <div class="navbar">
            <a class="nav me-3" href="login.php"><img src="./webpage_asset/person.svg" alt=""></a>
            <a class="nav" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"><img src="./webpage_asset/shopping-cart.svg" aria-controls="offcanvasRight" alt=""></a>
            <div id="totalcart">0</div>
          </div>
        </div>
    </nav>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
          <h5 id="offcanvasRightLabel">Shopping Cart</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <div id="cart" class="card" style="max-width: 540px;border: none;">
            
          </div>
        </div>
        <div id='paypal-payment-button'></div>
    </div>
    <div class="det d-flex justify-content-center container">
        <div class="row">
          <div class="col-sm-12 col-lg-6 me-auto d-flex justify-content-center">
            <div class="picture">
              <img src="<?php echo $tanaman["gambar"];?>" alt="">
            </div>
          </div>
          <div class="col-sm-12 col-lg-6 pe-3">
              <div class="sub">
                  <h2><?php echo $tanaman["nama"];?></h2>
                  <p>$<?php echo $tanaman["harga"];?>.00</p>
                  <p><?php echo $tanaman["deskripsi"];?></p>
                  <input type="number" id="jumlah<?php echo $ID_tanaman;?>" value=1 name="" min="1" max="20" style="width: 150px;">
                  <input type="submit" onclick="tambah(<?php echo $ID_tanaman;?>)" name="" value="ADD TO CART">
              </div>
          </div>
        </div>
    </div>

    </div>
    <footer class="bg-light text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
          © 2021 Copyright: Something
        </div>
        <!-- Copyright -->
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
  <script src="shop-js.js"></script>
  <script src="https://www.paypal.com/sdk/js?client-id=AVNcWCCNIVpuuxBiwjN0i7xUkcN6y6QED4imGFXzSDWwo0RyoXrTIw5MmMUR5_nBwnkEeE4U7TgcKG_6&disable-funding=credit,card"></script>
  <script src="paypal-js.js"></script>
</html>