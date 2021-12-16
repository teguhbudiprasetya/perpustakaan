<?php


require 'config.php';
session_start();

$id = $_GET["id"];

if(isset($_SESSION['idadmin'])){
    $dataBuku =  mysqli_query($conn, "SELECT * FROM tblitem WHERE idtransaksi = '$id'");
    while($d = mysqli_fetch_array($dataBuku)){
        $updateQty = mysqli_query($conn, "UPDATE tblbuku SET jumlah_buku = jumlah_buku + '$d[jumlah_pinjam]' WHERE idbuku = '$d[idbuku]'");
    
    }
    $sql = mysqli_query($conn, "DELETE FROM tbltransaksi WHERE idtransaksi = '$id'");
    echo "
        <script>
            alert('data berhasil di hapus!');
            document.location.href = 'admin-peminjaman.php';
        </script>";

}
else{
    $sql = mysqli_query($conn, "DELETE FROM tbltransaksi WHERE idtransaksi = '$id'");
    echo"
    <script>
        alert('data berhasil di hapus!');
        document.location.href = 'user-list-pinjam.php';
    </script>";
}

?>