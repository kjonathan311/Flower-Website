function tambah(id){
    var jumlah = document.getElementById("jumlah"+id).value;
    document.getElementById("jumlah"+id).value = 1;
    var ID_tanaman = id;
    $.ajax({
        type:"get",
        url:"./controller.php",
        data:{
            'action':'tambah',
            'ID_tanaman':ID_tanaman,
            'jumlah':jumlah
        },
        success:function(response){
        document.getElementById("cart").innerHTML = response;
        }
    });
    refreshtotalcart();
    refreshtotalcart();
}

refreshcart();
function refreshcart(){
    $.ajax({
        type:"get",
        url:"./controller.php",
        data:{
            'action':'refreshcart'
        },
        success:function(response){
        document.getElementById("cart").innerHTML = response;
        }
    });
    refreshtotalcart();
    refreshtotalcart();
}

function hapus(idx){
    var index = idx;
    // alert(index);
    $.ajax({
        type:"get",
        url:"./controller.php",
        data:{
            'action':'hapus',
            'index':index
        },
        success:function(response){
            document.getElementById("cart").innerHTML = response;
        }
    });
    refreshtotalcart();
    refreshtotalcart();
}

refreshtotalcart();

function refreshtotalcart(){
    $.ajax({
        type:"get",
        url:"./controller.php",
        data:{
            'action':'refreshtotalcart'
        },
        success:function(response){
            document.getElementById("totalcart").innerHTML = response;
        }
    });
}