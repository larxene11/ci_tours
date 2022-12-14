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
    <p class="mx-1 text-xl pb-6 flex items-center">
         <i class="fas fa-list mr-3"></i> Form Ubah Data Paket
    </p>
    <div class="leading-loose">
        <form class="w-full p-10 bg-white rounded shadow-xl" method="POST" action="<?= base_url('/pesanan/store') ?>">
        <?= csrf_field() ?>
        <div class="mt-2">
            <label class="block text-sm text-gray-600" for="kategori">Kategori Paket</label>
            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="kategori" name="kategori" type="text" required="" id="kategori" value="<?= $paket->kategori; ?>">
        </div>
        <div class="mt-2">
            <label class="block text-sm text-gray-600" for="nama_paket">Nama Paket</label>
            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="nama_paket" name="nama_paket" type="text" required="" id="nama_paket" value="<?= $paket->nama_paket; ?>?>">
        </div>
        <div class="mt-2">
            <label class=" block text-sm text-gray-600" for="detail_paket">Detail Paket</label>
            <textarea class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="detail_paket" name="detail_paket" rows="6" value="<?= $paket->detail_paket; ?>"></textarea>
        </div>
        <div class="mt-2">
            <label class=" block text-sm text-gray-600" for="harga_paket">Harga Paket</label>
            <textarea class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="harga_paket" name="harga_paket" rows="6" value="<?= $paket->harga_paket; ?>></textarea>
        </div>
        <div class="mt-2">
            <label class="block text-sm text-gray-600" for="inclusion">Inclusion & Exclusion</label>
            <textarea class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="inclusion" name="inclusion" type="text" required="" id="inclusion" rows="6" value="<?= $paket->inclusion; ?>></textarea>
        </div>
        <div class="mt-2">
            <label class=" block text-sm text-gray-600" for="itienary">Itienary</label>
            <textarea class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="itienary" name="itienary" rows="6" value="<?= $paket->itienary; ?>></textarea>
        </div>
        <div class="mt-2">
            <label class=" block text-sm text-gray-600" for="gambar">Gambar</label>
            <textarea class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="gambar" name="gambar" rows="6" value="<?= $paket->gambar; ?>></textarea>
        </div>
        <div class="mt-6">
            <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Simpan</button>
        </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>