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
        <form class="w-full p-10 bg-white rounded shadow-xl" method="post" action="<?= base_url('/paket/update/'. $paket['id_paket']); ?>" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <input type="hidden" name="gambarLama" value="<?= $paket['gambar']; ?>">
        <input type="hidden" name="judulLama" value="<?= $paket['nama_paket']; ?>">

        <div class="mt-2">
            <label class="block text-sm text-gray-600" for="id_kategori">Kategori Paket</label>
            <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="id_kategori" name="id_kategori" type="text">
                <option value="" hidden></option>
                    <?php foreach($kategori as $row) { ?>
                    <option value="<?= $row['id_kategori'] ?>" <?= $paket['id_kategori'] == $row['id_kategori'] ? "selected" : "";?>><?= $row['nama_kategori'] ?></option>
                    <?php  } ?>
            </select>
        </div>
        <div class="mt-2">
            <label class="block text-sm text-gray-600" for="nama_paket">Nama Paket</label>
            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="nama_paket" name="nama_paket" type="text"  id="nama_paket" autofocus value="<?=  old('nama_paket',$paket['nama_paket']); ?>">
        </div>
        <div class="mt-2">
            <label class=" block text-sm text-gray-600" for="detail_paket">Detail Paket</label>
            <textarea class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="detail_paket" name="detail_paket" rows="6"><?= old('detail_paket',$paket['detail_paket']); ?></textarea>
        </div>
        <div class="mt-2">
            <label class=" block text-sm text-gray-600" for="harga_paket">Harga Paket</label>
            <textarea class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="harga_paket" name="harga_paket" rows="6"><?= old('harga_paket',$paket['harga_paket']); ?></textarea>
        </div>
        <div class="mt-2">
            <label class="block text-sm text-gray-600" for="inclusion">Inclusion & Exclusion</label>
            <textarea class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="inclusion" name="inclusion" type="text" id="inclusion" rows="6"><?= old('inclusion',$paket['inclusion']); ?></textarea>
        </div>
        <div class="mt-2">
            <label class=" block text-sm text-gray-600" for="itienary">Itienary</label>
            <textarea class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="itienary" name="itienary" rows="6"><?= old('itienary',$paket['itienary']); ?></textarea>
        </div>
        <div class="mt-2">
            <label class=" block text-sm text-gray-600" for="gambar">Upload file</label>
            <div class="flex flex-wrap justify-center">
                <div class="w-6/12 sm:w-4/12 py-2 px-4">
                    <img src="/img/<?= $paket['gambar']; ?>" class="max-w-full h-auto px-1 img-preview" />
                </div>
            </div>
            <input class=" px-5 py-2 w-full text-gray-700 bg-gray-200 rounded" id="gambar" name="gambar" type="file" onchange="previewImg()">
        </div>
        <div class="mt-6">
            <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" value="update" type="submit">Simpan</button>
        </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>