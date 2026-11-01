<?php
include 'koneksi.php';

// Ambil semua data pesanan dari database, diurutkan dari yang terbaru
$query = "SELECT * FROM pesanan ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan Masuk - Preloved Berkah Selalu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="index.html">PRELOVED BERKAH SELALU - Admin</a>
        </div>
    </nav>

    <!-- Konten Utama -->
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Daftar Pesanan Masuk</h2>
            <a href="index.html" class="btn btn-outline-dark fw-bold">Kembali ke Katalog</a>
        </div>

        <div class="card shadow-sm border-0 rounded-4 p-4 bg-white">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-warning">
                        <tr>
                            <th>No</th>
                            <th>Nama Pembeli</th>
                            <th>No. WhatsApp</th>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Alamat Pengiriman</th>
                            <th>Waktu Pesan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $no++ . "</td>";
                                echo "<td class='fw-bold'>" . htmlspecialchars($row['nama_pembeli']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['telepon']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['nama_produk']) . "</td>";
                                echo "<td class='text-success fw-bold'>" . htmlspecialchars($row['harga']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";
                                echo "<td><small class='text-muted'>" . htmlspecialchars($row['tanggal']) . "</small></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7' class='text-center py-4 text-muted'>Belum ada pesanan yang masuk.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>