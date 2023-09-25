<?php
require_once("./connection.php");

$tanaman = $conn->query("SELECT * FROM tanaman where jenis='Artificial Flowers'")->fetch_all(MYSQLI_ASSOC);
if (isset($_POST["reset"])||!isset($_SESSION["page"])) {
  $_SESSION["page"] = 1;
}
if (isset($_POST["page"])&&!isset($_POST["submit"])) {
  $_SESSION["page"] = $_POST["page"];
}
else{
  unset($_SESSION["tanaman"]);
  $_SESSION["page"] = 1;
}
if(isset($_SESSION["tanaman"])){
  $tanaman = $_SESSION["tanaman"];
}
if (isset($_GET["page"])) {
  $_SESSION["page"] = 1;
  header("Location:ArtificialFSearch.php");
}

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
// session_destroy();

$perpage = 21;
$totalpage = ceil(count($tanaman)/$perpage);
$page = $_SESSION["page"];
$pageawal = ($page-1)*$perpage;
$pageakhir = $page*$perpage;
if (isset($_POST["submit"])) {
  $_SESSION["page"] = 1;
  $nama = $_POST["search"];
  try {
    $tanaman = $conn->query("SELECT * FROM tanaman where jenis='Artificial Flowers' and nama LIKE '%$nama%'")->fetch_all(MYSQLI_ASSOC);
    $_SESSION["tanaman"] = $tanaman;
  } catch (Throwable $th) {
    
  }
}
$totalpage = ceil(count($tanaman)/$perpage);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="style.css">

    <title>Home</title>
  </head>
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
                <a class="nav-link ms-1 " href="ArtificialP.php?page=1">Artificial Plants</a>
                <a class="nav-link ms-1 active" href="ArtificialFSearch.php">Artificial Flowers</a>
            </div>
            <form method="POST"  class="d-flex ms-auto me-4">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-outline-success me-2" type="submit" name="submit">Search</button>
                <button class="btn btn-outline-success" type="submit" name="reset">Reset</button>
            </form>
          </div>
          <div class="navbar">
            <a class="nav me-3" href="login.php"><img src="./webpage_asset/person.svg" alt=""></a>
            <a class="nav" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"><img src="./webpage_asset/shopping-cart.svg" aria-controls="offcanvasRight" alt="">
            </a>
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
    <div class="container">
        <div class="list">
            <div class="title">
                <h5>Artificial Flowers</h5>
                <p>An artificial flower is a great alternative to a fresh flower. Today's allergy-friendly artificial flowers and fake flowers have the look and feel of a real flower petal. With no wilting, no watering, and at a fraction of the cost of fresh, realistic silk flowers can be enjoyed hassle-free all year.</p>
            </div>
            <?php for ($i=$pageawal; $i < $pageakhir; $i++) { ?>
              <?php if (isset($tanaman[$i])) {?>
              <?php $id = $tanaman[$i]['ID'];?>
              <div class="Ccard">
                <div class="image"><a href="details.php?ID_tanaman=<?php echo $id;?>"><img src="<?php echo $tanaman[$i]["gambar"]?>" alt="" srcset=""></a></div>
                <p style="margin-bottom: 1px;height: 45px;"><a href="details.php?ID_tanaman=<?php echo $id;?>"><?php echo $tanaman[$i]["nama"]?></a></p>
                <p style="margin-bottom: 1px;">$<?php echo $tanaman[$i]["harga"]?>.00</p>
                <div class="sub">
                  <input type="number" id="jumlah<?php echo $id;?>" value=1 name="" min="1" max="20" style="width: 150px;">
                  <input type="submit" onclick="tambah(<?php echo $id;?>);" value="ADD TO CART">
                </div>
              </div>
              <?php }?>
            <?php }?>
            
        </div>
        <div class="cb"></div>
        <form method="POST" action="">
          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
              <?php for ($i=1; $i <= $totalpage; $i++) { ?>
              <li class="page-item <?php if ($page==$i) {echo "active";}?>">
                <button name="page" value="<?php echo $i;?>" style="<?php if ($page==$i) {echo "color:black;";}?>"><?php echo $i;?></button>
              </li>
              <?php }?>
            </ul>
          </nav>
        </form>
    </div>
    <div class="cb"></div>
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