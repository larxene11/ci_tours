<?= $this->extend('backend/index'); ?>

<?= $this->Section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Form Tambah Data Pesanan</h1>
    <?php if (!empty(session()->getFlashdata('error'))) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h4>Periksa Entrian Form</h4>
            </hr />
            <?php echo session()->getFlashdata('error'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <form method="POST" action="<?= base_url('/pesanan/create') ?>">
        <?= csrf_field() ?>
        <div class="row mb-3">
            <label for="nama" class="col-sm-2 col-form-label">Nama Customer</label>
            <div class="col-sm-10">
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Customer" value="<?= old('nama'); ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="<?= old('email'); ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="id_obat" class="col-sm-2 col-form-label">Paket Tour</label>
            <div class="col-sm-10">
                <select name="id_obat" class="form-control" id="id_obat">
                    <option value="" hidden></option>
                    <?php foreach ($paket as $row) { ?>
                        <option value="<?= $row->id_paket ?>"><?= $row->nama_paket ?></option>
                    <?php  } ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="nama_hotel" class="col-sm-2 col-form-label">Nama Hotel</label>
            <div class="col-sm-10">
                <input type="text" name="nama_hotel" class="form-control" id="nama_hotel" placeholder="Nama Hotel" value="<?= old('nama_hotel'); ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your message</label>
            <textarea id="pesan" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 light:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 light:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a comment..."></textarea>
        </div>


        <br>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

</div>

<?= $this->endSection(); ?>