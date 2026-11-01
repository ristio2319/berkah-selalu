<?php
// Ambil data yang dikirimkan melalui URL
$namaProduk = isset($_GET['nama']) ? $_GET['nama'] : 'Preloved Product';
$hargaProduk = isset($_GET['harga']) ? $_GET['harga'] : 'Rp 0,-';
$namaPembeli = isset($_GET['pembeli']) ? $_GET['pembeli'] : 'Customer';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRELOVED BERKAH SELALU - Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="home.html">PRELOVED BERKAH SELALU</a>
        </div>
    </nav>

    <!-- Payment Content -->
    <main class="container my-5" style="max-width: 600px;">
        <div class="card shadow-sm border-0 p-4 rounded-4 bg-white text-center">
            <div class="mb-3">
                <span class="fs-1">💳</span>
            </div>
            <h2 class="fw-bold mb-2">Payment Instruction</h2>
            <p class="text-muted">Thank you, <strong><?= htmlspecialchars($namaPembeli); ?></strong>! Your order has been registered successfully.</p>
            
            <hr class="my-4">

            <div class="text-start mb-4 bg-light p-3 rounded-3">
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Product:</span>
                    <span class="fw-bold"><?= htmlspecialchars($namaProduk); ?></span>
                </div>
                <div class="d-flex justify-content-between">
                    <span class="text-muted">Total Amount:</span>
                    <span class="fw-bold text-success fs-5"><?= htmlspecialchars($hargaProduk); ?></span>
                </div>
            </div>

            <h5 class="fw-bold mb-3 text-start">Please Transfer to Bank Account:</h5>
            <div class="alert alert-warning text-start py-3 mb-4">
                <p class="mb-1"><strong>Bank BCA:</strong> 1234-5678-9010</p>
                <p class="mb-0"><strong>Account Name:</strong> PT Berkah Selalu Indonesia</p>
            </div>

            <p class="small text-muted mb-4">Please complete your payment within 24 hours. After payment, click the button below to view your order history.</p>

            <a href="riwayat.php" class="btn btn-warning w-100 fw-bold py-2">I Have Paid / View Order History</a>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>