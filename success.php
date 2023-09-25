<?php
require_once("./connection.php");
unset($_SESSION["cart"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div style="height:100vh;display:flex;align-items:center;justify-content:center;flex-direction:column;">
        <img style="height:500px;width:500px;" src="https://freepngimg.com/download/facebook/107722-verified-badge-facebook-free-download-png-hd.png" alt="">
        <div class="d-flex justify-content-center">
            <h1>Payment Done Successfully...!</h1>
        </div>
    </div>


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
<script>
    setInterval(() => {
        window.location.replace("index.php");
    }, 3000);
</script>
</html>