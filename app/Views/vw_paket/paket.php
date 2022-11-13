<?= $this->extend('backend/index'); ?>

<?= $this->Section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables Paket</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('/paket/new'); ?>" class="btn btn-outline-info btn-sm mb-2"><i class="fas fa-plus"></i> Tambah Data</a>
            <a href="<?= base_url('/paket/cetak'); ?>" class="btn btn-outline-warning btn-sm mb-2 ml-2"><i class="fas fa-print"></i> Export PDF</a>
        </div>
        <?php if (!empty(session()->getFlashdata('message'))) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo session()->getFlashdata('message'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori Paket</th>
                            <th>Nama Paket</th>
                            <th>Detail</th>
                            <th>Harga Paket</th>
                            <th>Inclusion & Exclusion</th>
                            <th>Itienary</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($paket as $row) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row->kategori; ?></td>
                            <td><?= $row->nama_paket; ?> </td>
                            <td><?= $row->detail_paket; ?></td>
                            <td><?= $row->harga_paket; ?> </td>
                            <td><?= $row->inclusion; ?> </td>
                            <td><?= $row->itienary; ?> </td>
                            <td><?= $row->gambar; ?> </td>
                            <td>
                                <a title="Edit" href="<?= base_url("paket/edit/$row->id_paket"); ?>" class="btn btn-info">Edit</a>
                                <a title="Delete" href="<?= base_url("paket/delete/$row->id_paket") ?>" class="btn 
                                            btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')">Delete</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    <tfoot>
                        <th>No</th>
                        <th>Kategori Paket</th>
                        <th>Nama Paket</th>
                        <th>Detail</th>
                        <th>Harga Paket</th>
                        <th>Inclusion & Exclusion</th>
                        <th>Itienary</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tfoot>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<?= $this->endSection(); ?>