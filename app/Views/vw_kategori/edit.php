<?= $this->extend('backend/index'); ?>

<?= $this->Section('content'); ?>
<!-- Page Heading -->
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
<div class="w-full lg:w-full my-6 pr-0 lg:pr-2">
    <p class="text-xl pb-6 flex items-center">
         <i class="fas fa-list mr-3"></i> Form Ubah Data Kategori
    </p>
    <div class="leading-loose">
        <form class="w-full p-10 bg-white rounded shadow-xl" method="POST" action="<?= base_url('/kategori/update/'. $kategori['id_kategori']) ?>">
        <?= csrf_field() ?>
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="name">Kategori</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="nama_kategori" name="nama_kategori" type="text" value="<?= $kategori['nama_kategori']; ?>">
            </div>
                <div class="mt-6">
                    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Simpan</button>
                </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>