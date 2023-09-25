<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
    <a href="ArtificialP.php">
      <div class="container mt-5">
          <div class="jumbotron " id="banner1">
              <div class="container" id="banner_body">
                  <h1>Artificial Plants</h1>
                  <a class="btn btn-dark btn-lg mt-3" href="ArtificialP.php" role="button">Learn more</a>  
              </div>
          </div>
      </div>
    </a>
    <a href="ArtificialFSearch.php">
      <div div class="container mt-5 mb-5">
          <div class="jumbotron " id="banner2">
            <div class="container" id="banner_body">
                <h1>Artificial Flowers</h1>
                <a class="btn btn-dark btn-lg mt-3" href="ArtificialFSearch.php" role="button">Learn more</a>  
            </div>
          </div>
      </div>
    </a>
    <footer class="bg-light text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
          © 2021 Copyright: Something
        </div>
        <!-- Copyright -->
      </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>