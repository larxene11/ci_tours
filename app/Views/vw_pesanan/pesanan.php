<?= $this->extend('backend/index'); ?>

<?= $this->Section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables Pesanan</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('/pesanan/new'); ?>" class="btn btn-outline-info btn-sm mb-2"><i class="fas fa-plus"></i> Tambah Data</a>
            <a href="<?= base_url('/pesanan/cetak'); ?>" class="btn btn-outline-warning btn-sm mb-2 ml-2"><i class="fas fa-print"></i> Export PDF</a>
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
                            <th>Nama Customer</th>
                            <th>Email</th>
                            <th>Paket Tour</th>
                            <th>Hotel</th>
                            <th>Total Biaya</th>
                            <th>Pesan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($pesanan as $row) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row->nama; ?></td>
                            <td><?= $row->email; ?> </td>
                            <td><?= $row->nama_paket; ?> </td>
                            <td><?= $row->nama_hotel; ?> </td>
                            <td>
                                Rp. <?= $row->total_biaya; ?>
                            </td>
                            <td><?= $row->pesan; ?> </td>
                            <td>
                                <a title="Edit" href="<?= base_url("pesanan/edit/$row->id_pesanan"); ?>" class="btn btn-info">Edit</a>
                                <a title="Delete" href="<?= base_url("pesanan/delete/$row->id_pesanan") ?>" class="btn 
                                            btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')">Delete</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    <tfoot>
                        <th>No</th>
                        <th>Nama Customer</th>
                        <th>Email</th>
                        <th>Paket Tour</th>
                        <th>Hotel</th>
                        <th>Total Biaya</th>
                        <th>Pesan</th>
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