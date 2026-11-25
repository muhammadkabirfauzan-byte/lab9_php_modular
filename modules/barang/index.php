
<?php
require_once __DIR__ . '/../../config/database.php';

$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $sql);
?>

<section>
    <h2>Data Barang</h2>

    <p>
        <a href="index.php?page=barang/add">Tambah Barang</a>
    </p>

    <div class="main">
        <table>
            <tr>
                <th>Gambar</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Harga Jual</th>
                <th>Harga Beli</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>

            <?php if ($result): ?>
                <?php while ($row = mysqli_fetch_array($result)): ?>
                    <tr>
                        <td>
                            <img src="modules/barang/<?= $row['gambar']; ?>"
                                 alt="<?= $row['nama']; ?>">
                        </td>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['kategori']; ?></td>
                        <td><?= $row['harga_jual']; ?></td>
                        <td><?= $row['harga_beli']; ?></td>
                        <td><?= $row['stok']; ?></td>
                        <td>
                            <a href="index.php?page=barang/edit&id=<?= $row['id_barang']; ?>">Ubah</a>
                            <a href="index.php?page=barang/delete&id=<?= $row['id_barang']; ?>">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">Belum ada data</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</section>
