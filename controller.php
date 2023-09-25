<?php
require_once('connection.php');
$action = $_REQUEST["action"];

function refreshtotalcart(){
    $totalcart = 0;
    if (isset($_SESSION["cart"])){
        foreach ($_SESSION["cart"] as $key => $value){
            $jumlah = $value["jumlah"];
            $totalcart += $jumlah;
        }
    }
    echo $totalcart;
}

function refreshcart(){
    if (isset($_SESSION["cart"])) {
        $total = 0;
        foreach ($_SESSION["cart"] as $key => $value) {
            $ID = $value["ID"];
            $nama = $value["nama"];
            $harga = $value["harga"];
            $jumlah = $value["jumlah"];
            $gambar = $value["gambar"];
            $subtotal = $harga*$jumlah;
            $total += $subtotal;
            $subtotal = number_format($subtotal , 0 , '.' , ',' );
            echo "<div class='row mb-3'>";
            echo "<div class='col-3'>";
            echo "<img style='height:100%' src='$gambar' class='img-fluid rounded-start'>";
            echo "</div>";
            echo "<div class='col-9'>";
            echo "<div class=''>$nama</div>";
            echo "<div class=''>$$harga.00</div>";
            echo "<div class=''>Total items : $jumlah</div>";
            echo "<div class=''>Subtotal : $$subtotal.00</div>";
            echo "<div class='cross' onclick='hapus($key);'>X</div>";
            echo "</div>";
            echo "</div>";
        }
        if ($total>0) {
            $total = number_format($total , 0 , '.' , ',' );
            echo "<input type='hidden' id='total' value=$total>";
            echo "<h5>Total : $$total.00</h5>";
        }
    }
    else {
        echo "";
    }
}

if($action=="tambah"){
    $ID_tanaman = $_REQUEST["ID_tanaman"];
    $tanaman = $conn->query("SELECT * FROM tanaman where ID=$ID_tanaman")->fetch_all(MYSQLI_ASSOC)[0];
    $jumlah = $_REQUEST["jumlah"];
    $ada = false;
    if (isset($_SESSION["cart"])) {
        foreach ($_SESSION["cart"] as $key => $value) {
            if ($value["ID"]==$ID_tanaman) {
                $ada = true;
                $_SESSION["cart"][$key]["jumlah"] += $jumlah;
            }
        }
    }
    if (!$ada) {
        $_SESSION["cart"][] = [
            "ID" => $tanaman["ID"],
            "nama" => $tanaman["nama"],
            "harga" => $tanaman["harga"],
            "jumlah" => $jumlah,
            "gambar" => $tanaman["gambar"]
        ];
    }
    refreshcart();
}
else if ($action=="refreshcart") {
    refreshcart();
}
else if ($action=="hapus") {
    $index = $_REQUEST["index"];
    unset($_SESSION["cart"][$index]);
    refreshcart();
}
else if ($action=="refreshtotalcart") {
    refreshtotalcart();
}
else if ($action=="loadadmin") {
    $tanaman = $conn->query("SELECT * FROM tanaman")->fetch_all(MYSQLI_ASSOC);
    foreach ($tanaman as $key => $value) {
        $ID = $value["ID"];
        $nama = $value["nama"];
        $jenis = $value["jenis"];
        $harga = $value["harga"];
        $stok = $value["stok"];
        $deskripsi = $value["deskripsi"];
        $gambar = $value["gambar"];
        echo "<tr>";
        echo "<td>$ID</td>";
        echo "<td><input value='$nama'></td>";
        echo "<td><img src='$gambar' style='height:70px;width:70px'></img></td>";
        echo "<td><input value='$jenis'></td>";
        echo "<td><input value='$harga'></td>";
        echo "<td><input value='$stok'></td>";
        echo "<td><input value='$deskripsi'></td>";
        echo "<td><input value='$gambar'></td>";
        echo "<td><button onclick='hapusitem($ID);'>Delete</button></td>";
        echo "</tr>";
    }
}
else if ($action=="previewitem") {
    $nama = $_REQUEST["nama"];
    $jenis = $_REQUEST["jenis"];
    $harga = $_REQUEST["harga"];
    $stok = $_REQUEST["stok"];
    $deskripsi = $_REQUEST["deskripsi"];
    $gambar = $_REQUEST["gambar"];
    echo "<tr>";
    echo "<td><input oninput='previewitem();' id='nama' value='$nama'></td>";
    echo "<td><img src='$gambar' style='height:70px;width:70px'></img></td>";
    echo "<td>";
    echo "<select onchange='previewitem();' id='jenis'>";
    echo "<option value='Artificial Plants'>Artificial Plants</option>";
    echo "<option value='Artificial Flowers'>Artificial Flowers</option>";
    echo "</select>";
    echo "</td>";
    echo "<td><input oninput='previewitem();' id='harga' value='$harga'></td>";
    echo "<td><input oninput='previewitem();' id='stok' value='$stok'></td>";
    echo "<td><input oninput='previewitem();' id='deskripsi' value='$deskripsi'></td>";
    echo "<td><input oninput='previewitem();' id='gambar' value='$gambar'></td>";
    echo "<td><button onclick='tambahitem();'>Tambah</button></td>";
    echo "</tr>";
}
else if ($action=="tambahitem") {
    // $tanaman = $conn->query("SELECT * FROM tanaman")->fetch_all(MYSQLI_ASSOC);
    $nama = $_REQUEST["nama"];
    $jenis = $_REQUEST["jenis"];
    $harga = $_REQUEST["harga"];
    $stok = $_REQUEST["stok"];
    $deskripsi = $_REQUEST["deskripsi"];
    $gambar = $_REQUEST["gambar"];

    $q = $conn->prepare("INSERT INTO `tanaman` (`ID`, `nama`, `jenis`, `harga`, `stok`, `deskripsi`, `gambar`) VALUES (NULL, ?,?,?,?,?,?);");
    $q->bind_param("sssiis",$nama,$jenis,$harga,$stok,$deskripsi,$gambar);
    $result =$q->execute();
}
else if ($action=="hapusitem") {
    $ID = $_REQUEST["ID"];
    $q = $conn->query("DELETE FROM `tanaman` WHERE `tanaman`.`ID` = $ID");
}
?>