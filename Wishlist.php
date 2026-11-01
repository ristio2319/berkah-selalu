<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRELOVED BERKAH SELALU - My Wishlist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="index.html">PRELOVED BERKAH SELALU</a>
            <div class="d-flex">
                <a href="index.html" class="btn btn-outline-dark fw-bold">Back to Catalog</a>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="container my-5">
        <h2 class="fw-bold mb-4">❤️ My Favorite Wishlist</h2>
        
        <!-- Grid untuk menampilkan produk favorit -->
        <div class="row row-cols-1 row-cols-md-3 g-4" id="wishlistContainer">
            <!-- Produk favorit akan dimuat secara otomatis lewat JavaScript di sini -->
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script>
        // Ambil data wishlist dari localStorage
        function loadWishlist() {
            const container = document.getElementById('wishlistContainer');
            let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];

            if (wishlist.length === 0) {
                container.innerHTML = `
                    <div class="col-12 text-center py-5">
                        <p class="text-muted fs-5">No favorite products added yet.</p>
                        <a href="index.html" class="btn btn-warning fw-bold">Explore Catalog</a>
                    </div>
                `;
                return;
            }

            container.innerHTML = '';
            wishlist.forEach((item, index) => {
                container.innerHTML += `
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0 rounded-4 position-relative">
                            <button class="btn btn-sm btn-danger position-absolute top-0 end-0 m-3 rounded-circle" onclick="removeItem(${index})" title="Remove">✕</button>
                            <img src="${item.image}" class="card-img-top rounded-top-4" alt="${item.name}" style="height: 250px; object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold fs-6">${item.name}</h5>
                                <p class="card-text text-success fw-bold mb-3">${item.price}</p>
                                <div class="mt-auto">
                                    <a href="checkout.php?nama=${encodeURIComponent(item.name)}&harga=${encodeURIComponent(item.price)}" class="btn btn-warning w-100 fw-bold btn-sm">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });
        }

        // Fungsi untuk menghapus item dari wishlist
        function removeItem(index) {
            let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
            wishlist.splice(index, 1);
            localStorage.setItem('wishlist', JSON.stringify(wishlist));
            loadWishlist();
        }

        // Jalankan saat halaman dibuka
        document.addEventListener('DOMContentLoaded', loadWishlist);
    </script>
</body>
</html>