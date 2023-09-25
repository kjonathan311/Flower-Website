<?php
require_once("./connection.php");
$tanaman = $conn->query("SELECT * FROM tanaman")->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="jquery-3.6.0.min.js"></script>
    <title>Document</title>
</head>
<body>
    <h2>Tambah Item</h2>
    <div class="d-flex justify-content-center">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Preview</th>
                    <th>Jenis</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Deskripsi</th>
                    <th>URL Gambar</th>
                    <th>Tambah</th>
                </tr>
            </thead>
            <tbody id="tambahitem">
                <tr>
                    <td><input oninput="previewitem();" id="nama" value=''></td>
                    <td><img src='' style='height:70px;width:70px;'></img></td>
                    <td>
                        <select onchange="previewitem();" id="jenis">
                            <option value="">Artificial Plants</option>
                            <option value="">Artificial Flowers</option>
                        </select>
                    </td>
                    <td><input oninput="previewitem();" id="harga" value=''></td>
                    <td><input oninput="previewitem();" id="stok" value=''></td>
                    <td><input oninput="previewitem();" id="deskripsi" value=''></td>
                    <td><input oninput="previewitem();" id="gambar" value=''></td>
                    <td><button onclick="tambahitem();">Tambah</button></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="row">ID</th>
                    <th>Nama</th>
                    <th>Preview</th>
                    <th>Jenis</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Deskripsi</th>
                    <th>URL Gambar</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody id="data">
                <!-- <tr>
                    <td>ID</td>
                    <td>Nama</td>
                    <td>Jenis</td>
                    <td>Harga</td>
                    <td>Stok</td>
                    <td>Deskripsi</td>
                    <td>URL Gambar</td>
                </tr> -->
            </tbody>
        </table>
    </div>


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
  <script>
      loadadmin();
      function loadadmin(){
        $.ajax({
            type:"get",
            url:"./controller.php",
            data:{
                'action':'loadadmin'
            },
            success:function(response){
                document.getElementById("data").innerHTML = response;
            }
        });
      }

      function updatedata(id){
            var ID_tanaman = id;
            var nama = document.getElementById("nama"+id).value;
            var jenis = document.getElementById("jenis"+id).value;
            var harga = document.getElementById("harga"+id).value;
            var stok = document.getElementById("stok"+id).value;
            var deskripsi = document.getElementById("deskripsi"+id).value;
            var gambar = document.getElementById("gambar"+id).value;
            $.ajax({
                type:"get",
                url:"./controller.php",
                data:{
                    'action':'loadadmin'
                },
                success:function(response){
                    document.getElementById("data").innerHTML = response;
                }
            });
      }

      function previewitem(){
            var nama = document.getElementById("nama").value;
            var jenis = document.getElementById("jenis").value;
            var harga = document.getElementById("harga").value;
            var stok = document.getElementById("stok").value;
            var deskripsi = document.getElementById("deskripsi").value;
            var gambar = document.getElementById("gambar").value;
            $.ajax({
                type:"get",
                url:"./controller.php",
                data:{
                    'action':'previewitem',
                    'nama':nama,
                    'jenis':jenis,
                    'harga':harga,
                    'stok':stok,
                    'deskripsi':deskripsi,
                    'gambar':gambar
                },
                success:function(response){
                    document.getElementById("tambahitem").innerHTML = response;
                }
            });
      }

      function tambahitem(){
            var nama = document.getElementById("nama").value;
            var jenis = document.getElementById("jenis").value;
            var harga = document.getElementById("harga").value;
            var stok = document.getElementById("stok").value;
            var deskripsi = document.getElementById("deskripsi").value;
            var gambar = document.getElementById("gambar").value;

            document.getElementById("nama").value = "";
            document.getElementById("jenis").value = "Artificial Plants";
            document.getElementById("harga").value = "";
            document.getElementById("stok").value = "";
            document.getElementById("deskripsi").value = "";
            document.getElementById("gambar").value = "";
            $.ajax({
                type:"get",
                url:"./controller.php",
                data:{
                    'action':'tambahitem',
                    'nama':nama,
                    'jenis':jenis,
                    'harga':harga,
                    'stok':stok,
                    'deskripsi':deskripsi,
                    'gambar':gambar
                },
                success:function(response){
                    loadadmin();
                }
            });
      }

      function hapusitem(id){
        $.ajax({
                type:"get",
                url:"./controller.php",
                data:{
                    'action':'hapusitem',
                    'ID':id
                },
                success:function(response){
                    loadadmin();
                }
            });
      }
  </script>
</html>