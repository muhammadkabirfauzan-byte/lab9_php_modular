
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi PHP Modular</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/barang.css">
</head>
<body>
<div class="container">
    <header>
        <h1>Aplikasi PHP Modular</h1>
        <p>Contoh pemisahan template dan konten</p>
    </header>
<nav>
    <a href="index.php?page=dashboard"
       class="<?= $page === 'dashboard' ? 'active' : '' ?>">
        Dashboard
    </a>

    <a href="index.php?page=user/list"
       class="<?= $page === 'user/list' ? 'active' : '' ?>">
        Data Pengguna
    </a>

    <a href="index.php?page=user/add"
       class="<?= $page === 'user/add' ? 'active' : '' ?>">
        Tambah Pengguna
    </a>

    <a href="index.php?page=barang/list"
       class="<?= in_array($page, ['barang/list', 'barang/add', 'barang/edit', 'barang/delete']) ? 'active' : '' ?>">
        Data Barang
    </a>
</nav>
    <main>
