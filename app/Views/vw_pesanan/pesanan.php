<?= $this->extend('backend/index'); ?>

<?= $this->Section('content'); ?>
<!-- Begin Page Content -->
<div class="w-full py-1 mt-6">
    <p class="text-xl px-1 pb-3 flex items-center">
        <i class="fas fa-list mr-3"></i> Tabel Pesanan
    </p>
</div>

    <div class="card shadow mb-4">
        <div class="card-header px-1 py-3">
            <a href="<?= base_url('/pesanan/new'); ?>" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l"><i class="fas fa-plus"></i> Tambah Data</a>
            <a href="<?= base_url('/pesanan/cetak'); ?>" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l"><i class="fas fa-print"></i> Export PDF</a>
        </div>
        <?php if (!empty(session()->getFlashdata('message'))) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo session()->getFlashdata('message'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <div class="bg-white px-1 overflow-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="w-1/8 text-left py-3 px-4 uppercase font-semibold text-sm">No</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Nama Customer</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Paket Tour</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Nama Hotel</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Pesan</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Aksi</td>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                <?php
                    $no = 1;
                    foreach ($pesanan as $row) {
                ?>
                    <tr>
                        <td class="w-1/8 text-left py-3 px-4"><?= $no++; ?></td>
                        <td class="text-left py-3 px-4"><?= $row['nama']; ?></td>
                        <td class="text-left py-3 px-4"><?= $row['email']; ?></td>
                        <td class="text-left py-3 px-4"><?= $row['nama_paket']; ?></td>
                        <td class="text-left py-3 px-4"><?= $row['nama_hotel']; ?></td>
                        <td class="text-left py-3 px-4"><?= $row['pesan']; ?></td>
                        <td class="text-left py-3 px-4"><a title="Edit" href="<?= base_url("pesanan/edit/" . $row['id_pesanan']); ?>" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">Edit</a>
                                                    <a title="Delete" href="<?= base_url("pesanan/delete/" . $row['id_pesanan']); ?>" class="bg-red-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l" onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')">Delete</a></td>
                    </tr>
                    <?php
                        }
                    ?>
                    
                </tbody>
            </table>
        </div>
<?= $this->endSection(); ?>