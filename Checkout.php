<?php
include 'koneksi.php';

$pesan_sukses = "";

// Jika tombol konfirmasi ditekan
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_produk  = mysqli_real_escape_string($conn, $_POST['nama_produk']);
    $harga        = mysqli_real_escape_string($conn, $_POST['harga']);
    $nama_pembeli = mysqli_real_escape_string($conn, $_POST['nama_pembeli']);
    $telepon      = mysqli_real_escape_string($conn, $_POST['telepon']);
    $alamat       = mysqli_real_escape_string($conn, $_POST['alamat']);

    // Simpan ke database
    $query = "INSERT INTO pesanan (nama_produk, harga, nama_pembeli, telepon, alamat) 
              VALUES ('$nama_produk', '$harga', '$nama_pembeli', '$telepon', '$alamat')";

    if (mysqli_query($conn, $query)) {
        // PERUBAHAN: Setelah berhasil disimpan, arahkan ke halaman pembayaran.php 
        // dengan membawa data nama produk, harga, dan nama pembeli melalui URL
        header("Location: pembayaran.php?nama=" . urlencode($nama_produk) . "&harga=" . urlencode($harga) . "&pembeli=" . urlencode($nama_pembeli));
        exit();
    } else {
        $pesan_sukses = "Failed to save order: " . mysqli_error($conn);
    }
}

// Ambil data produk dari URL
$namaProduk = isset($_GET['nama']) ? $_GET['nama'] : 'Preloved Product';
$hargaProduk = isset($_GET['harga']) ? $_GET['harga'] : 'Rp 0,-';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRELOVED BERKAH SELALU - Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="home.html">PRELOVED BERKAH SELALU</a>
        </div>
    </nav>

    <!-- Konten Checkout -->
    <main class="container my-5">
        <h2 class="fw-bold mb-4">Order Checkout</h2>

        <?php if (!empty($pesan_sukses)) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $pesan_sukses; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="row">
            <!-- Form Data Pembeli -->
            <div class="col-lg-7 mb-4">
                <div class="card shadow-sm border-0 p-4 rounded-4">
                    <h4 class="fw-bold mb-3">Shipping Information</h4>
                    <form action="" method="POST">
                        <!-- Input tersembunyi untuk membawa data produk dan harga ke database -->
                        <input type="hidden" name="nama_produk" value="<?= htmlspecialchars($namaProduk); ?>">
                        <input type="hidden" name="harga" value="<?= htmlspecialchars($hargaProduk); ?>">

                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="nama_pembeli" class="form-control" placeholder="Enter your full name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">WhatsApp / Phone Number</label>
                            <input type="text" name="telepon" class="form-control" placeholder="e.g. 08123456789" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Shipping Address</label>
                            <textarea name="alamat" class="form-control" rows="3" placeholder="Enter your complete delivery address" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-warning w-100 fw-bold py-2">Confirm Order</button>
                    </form>
                </div>
            </div>

            <!-- Ringkasan Produk -->
            <div class="col-lg-5">
                <div class="card shadow-sm border-0 p-4 rounded-4 bg-white">
                    <h4 class="fw-bold mb-3">Order Summary</h4>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Selected Product</span>
                        <span class="fw-bold"><?= htmlspecialchars($namaProduk); ?></span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span class="text-muted">Price</span>
                        <span class="fw-bold text-dark"><?= htmlspecialchars($hargaProduk); ?></span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-4">
                        <span class="fw-bold fs-5">Total Payment</span>
                        <span class="fw-bold fs-5 text-warning"><?= htmlspecialchars($hargaProduk); ?></span>
                    </div>
                    <a href="index.html" class="btn btn-outline-dark w-100">Back to Catalog</a>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>