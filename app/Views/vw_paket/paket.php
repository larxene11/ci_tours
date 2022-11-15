<?= $this->extend('backend/index'); ?>

<?= $this->Section('content'); ?>
<!-- Begin Page Content -->
<div class="w-full mt-6">
    <p class="text-xl pb-3 flex items-center">
        <i class="fas fa-list mr-3"></i> Tabel Paket
    </p>
</div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('/paket/new'); ?>" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l"><i class="fas fa-plus"></i> Tambah Data</a>
            <a href="<?= base_url('/paket/cetak'); ?>" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l"><i class="fas fa-print"></i> Export PDF</a>
        </div>
        <?php if (!empty(session()->getFlashdata('message'))) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo session()->getFlashdata('message'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <div class="bg-white overflow-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="w-1/8 text-left py-3 px-4 uppercase font-semibold text-sm">No</th>
                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Kategori Paket</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Nama Paket</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Aksi</td>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                <?php
                    $no = 1;
                    foreach ($paket as $row) {
                ?>
                    <tr>
                        <td class="w-1/8 text-left py-3 px-4"><?= $no++; ?></td>
                        <td class="w-1/4 text-left py-3 px-4"><?= $row->kategori; ?></td>
                        <td class="w-1/4 text-left py-3 px-4"><?= $row->nama_paket; ?></td>
                        <td class="w-1/4 text-left py-3 px-4"><a title="Edit" href="<?= base_url("/paket/edit/$row->id_paket"); ?>" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">Edit</a>
                                                    <a title="Delete" href="<?= base_url("/paket/delete/$row->id_paket") ?>" class="bg-red-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l" onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')">Delete</a></td>
                    </tr>
                    <?php
                        }
                    ?>
                    
                </tbody>
            </table>
        </div>
<?= $this->endSection(); ?>