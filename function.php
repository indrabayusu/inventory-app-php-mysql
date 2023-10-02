<?php
session_start();
// Membuat koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "inventory-app-php-mysql");

// Menambah barang baru
if (isset($_POST['addnewbarang'])) {
    $namabarang = $_POST['namabarang'];
    $deskripsi = $_POST['deskripsi'];
    $stock = $_POST['stock'];

    $addtotable = mysqli_query($conn, "INSERT INTO stock (namabarang, deskripsi, stock) VALUES ('$namabarang', '$deskripsi', '$stock')");
    if ($addtotable) {
        header('location:stock.php');
    } else {
        echo 'gagal';
        header('location:stock.php');
    }
};

// Menambah barang masuk
if (isset($_POST['barangmasuk'])) {
    $barangnya = $_POST['barangnya'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];

    $cekstoksekarang = mysqli_query($conn, "SELECT * FROM stock WHERE idbarang='$barangnya'");
    $ambildatanya = mysqli_fetch_array($cekstoksekarang);

    $stoksekarang = $ambildatanya['stock'];
    $tambah = $stoksekarang + $qty;

    $addtomasuk = mysqli_query($conn, "INSERT INTO masuk (idbarang, keterangan, qty) VALUES ('$barangnya', '$penerima', '$qty')");
    $updatestockmasuk = mysqli_query($conn, "UPDATE stock SET stock = '$tambah' WHERE idbarang = '$barangnya'");
    if ($addtomasuk && $updatestockmasuk) {
        header('location:in.php');
    } else {
        echo 'gagal';
        header('location:in.php');
    }
}

// Menambah barang keluar
if (isset($_POST['addbarangkeluar'])) {
    $barangnya = $_POST['barangnya'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];

    $cekstoksekarang = mysqli_query($conn, "SELECT * FROM stock WHERE idbarang='$barangnya'");
    $ambildatanya = mysqli_fetch_array($cekstoksekarang);

    $stoksekarang = $ambildatanya['stock'];
    $tambah = $stoksekarang - $qty;

    $addtomasuk = mysqli_query($conn, "INSERT INTO keluar (idbarang, penerima, qty) VALUES ('$barangnya', '$penerima', '$qty')");
    $updatestockmasuk = mysqli_query($conn, "UPDATE stock SET stock = '$tambah' WHERE idbarang = '$barangnya'");
    if ($addtomasuk && $updatestockmasuk) {
        header('location:out.php');
    } else {
        echo 'gagal';
        header('location:out.php');
    }
}

// Update info barang
if (isset($_POST['updatebarang'])) {
    $idb = $_POST['idb'];
    $namabarang = $_POST['namabarang'];
    $deskripsi = $_POST['deskripsi'];

    $update = mysqli_query($conn, "UPDATE stock SET namabarang = '$namabarang', deskripsi = '$deskripsi' WHERE idbarang = '$idb'");
    if ($update) {
        header('location:stock.php');
    } else {
        echo 'gagal';
        header('location:stock.php');
    }
}

// Hapus info barang
if (isset($_POST['hapusbarang'])) {
    $idb = $_POST['idb'];

    $hapus = mysqli_query($conn, "DELETE FROM stock WHERE idbarang = '$idb'");
    if ($hapus) {
        header('location:stock.php');
    } else {
        echo 'gagal';
        header('location:stock.php');
    }
}

// Mengubah data barang masuk
if (isset($_POST['updatebarangmasuk'])) {
    $idb = $_POST['idb'];
    $idm = $_POST['idm'];
    $keterangan = $_POST['keterangan'];
    $qty = $_POST['qty'];

    $lihatstock = mysqli_query($conn, "SELECT * FROM stock WHERE idbarang = '$idb'");
    $stocknya = mysqli_fetch_array($lihatstock);
    $stoksekarang = $stocknya['stock'];
    $qtyskrg = mysqli_query($conn, "SELECT * FROM masuk WHERE idmasuk = '$idm'");
    $qtynya = mysqli_fetch_array($qtyskrg);
    $qtyskrg = $qtynya['qty'];

    if ($qty > $qtyskrg) {
        $selisih = $qty - $qtyskrg;
        $kurangi = $stoksekarang + $selisih;
        $kurangstock = mysqli_query($conn, "UPDATE stock SET stock = '$kurangi' WHERE idbarang = '$idb'");
        $updatenya = mysqli_query($conn, "UPDATE masuk SET qty = '$qty', keterangan = '$keterangan' WHERE idmasuk = '$idm'");
        if ($kurangstock && $updatenya) {
            header('location:in.php');
        } else {
            echo 'gagal';
            header('location:in.php');
        }
    } else {
        $selisih = $qtyskrg - $qty;
        $kurangi = $stoksekarang - $selisih;
        $kurangstock = mysqli_query($conn, "UPDATE stock SET stock = '$kurangi' WHERE idbarang = '$idb'");
        $updatenya = mysqli_query($conn, "UPDATE masuk SET qty = '$qty', keterangan = '$keterangan' WHERE idmasuk = '$idm'");
        if ($kurangstock && $updatenya) {
            header('location:in.php');
        } else {
            echo 'gagal';
            header('location:in.php');
        }
    }
}

// Menghapus barang masuk
if (isset($_POST['hapusbarangmasuk'])) {
    $idb = $_POST['idb'];
    $qty = $_POST['kty'];
    $idm = $_POST['idm'];

    $getdatastock = mysqli_query($conn, "SELECT * FROM stock WHERE idbarang = '$idb'");
    $data = mysqli_fetch_array($getdatastock);
    $stok = $data['stock'];

    $selisih = $stok - $qty;
    $update = mysqli_query($conn, "UPDATE stock SET stock = '$selisih' WHERE idbarang = '$idb'");
    $hapusdata = mysqli_query($conn, "DELETE FROM masuk WHERE idmasuk = '$idm'");

    if ($update && $hapusdata) {
        header('location:in.php');
    } else {
        echo 'gagal';
        header('location:in.php');
    }
}

// Mengubah data barang keluar
if (isset($_POST['updatebarangkeluar'])) {
    $idb = $_POST['idb'];
    $idk = $_POST['idk'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];

    $lihatstock = mysqli_query($conn, "SELECT * FROM stock WHERE idbarang = '$idb'");
    $stocknya = mysqli_fetch_array($lihatstock);
    $stoksekarang = $stocknya['stock'];
    $qtyskrg = mysqli_query($conn, "SELECT * FROM keluar WHERE idkeluar = '$idk'");
    $qtynya = mysqli_fetch_array($qtyskrg);
    $qtyskrg = $qtynya['qty'];

    if ($qty > $qtyskrg) {
        $selisih = $qty - $qtyskrg;
        $kurangi = $stoksekarang - $selisih;
        $kurangstock = mysqli_query($conn, "UPDATE stock SET stock = '$kurangi' WHERE idbarang = '$idb'");
        $updatenya = mysqli_query($conn, "UPDATE keluar SET qty = '$qty', penerima = '$penerima' WHERE idkeluar = '$idk'");
        if ($kurangstock && $updatenya) {
            header('location:out.php');
        } else {
            echo 'gagal';
            header('location:out.php');
        }
    } else {
        $selisih = $qtyskrg - $qty;
        $kurangi = $stoksekarang + $selisih;
        $kurangstock = mysqli_query($conn, "UPDATE stock SET stock = '$kurangi' WHERE idbarang = '$idb'");
        $updatenya = mysqli_query($conn, "UPDATE keluar SET qty = '$qty', penerima = '$penerima' WHERE idkeluar = '$idk'");
        if ($kurangstock && $updatenya) {
            header('location:out.php');
        } else {
            echo 'gagal';
            header('location:out.php');
        }
    }
}

// Menghapus barang keluar
if (isset($_POST['hapusbarangkeluar'])) {
    $idb = $_POST['idb'];
    $qty = $_POST['kty'];
    $idk = $_POST['idk'];

    $getdatastock = mysqli_query($conn, "SELECT * FROM stock WHERE idbarang = '$idb'");
    $data = mysqli_fetch_array($getdatastock);
    $stok = $data['stock'];

    $selisih = $stok + $qty;
    $update = mysqli_query($conn, "UPDATE stock SET stock = '$selisih' WHERE idbarang = '$idb'");
    $hapusdata = mysqli_query($conn, "DELETE FROM keluar WHERE idkeluar = '$idk'");

    if ($update && $hapusdata) {
        header('location:out.php');
    } else {
        echo 'gagal';
        header('location:out.php');
    }
}
?>