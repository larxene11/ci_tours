<?= $this->extend('backend/index'); ?>

<?= $this->Section('content'); ?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Form Ubah Data Pesanan</h1>
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
<form method="POST" action="<?= base_url('/pesanan/update') ?>" value="patch">
    <?= csrf_field() ?>
    <div class="row mb-3">
        <label for="nama_customer" class="col-sm-2 col-form-label">Nama Customer</label>
        <div class="col-sm-10">
            <input type="text" name="nama" class="form-control" id="nama" value="<?= $pesanan->nama; ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="text" name="email" class="form-control" id="email" value="<?= $pesanan->email; ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label for="id_paket" class="col-sm-2 col-form-label">Paket Tour</label>
        <div class="col-sm-10">
            <select name="id_paket" class="form-control" id="id_paket">
                <option value="" hidden></option>
                <?php foreach ($paket as $row) { ?>
                    <option value="<?= $row->id_paket ?>" <?= $pesanan->id_paket == $row->id_paket ? "selected" : ""; ?>><?= $row->nama_paket ?></option>
                <?php  } ?>
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <label for="nama_hotel" class="col-sm-2 col-form-label">Nama Hotel</label>
        <div class="col-sm-10">
            <input type="text" name="nama_hotel" class="form-control" id="nama_hotel" value="<?= $pesanan->nama_hotel; ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label for="pesan" class="col-sm-2 col-form-label">Massage</label>
        <div class="col-sm-10">
            <input type="text" name="pesan" class="form-control" id="pesan" value="<?= $pesanan->pesan; ?>">
        </div>
    </div>


    <br>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
<?= $this->endSection(); ?>