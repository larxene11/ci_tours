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
    <p class="text-xl px-1 pb-6 flex items-center">
         <i class="fas fa-list mr-3"></i> Form Ubah Data Kategori
    </p>
    <div class="leading-loose">
        <form class="w-full p-10 bg-white rounded shadow-xl" method="POST" action="<?= base_url('/kategori/update/'. $kategori['id_kategori']) ?>">
        <?= csrf_field() ?>
        <input type="hidden" name="gambarLama" value="<?= $paket['gambar_kategori']; ?>">
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="name">Kategori</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="nama_kategori" name="nama_kategori" type="text" value="<?= old('nama_kategori',$kategori['nama_kategori']); ?>">
            </div>
            <div class="mt-2">
                <label class=" block text-sm text-gray-600" for="detail_paket">Detail</label>
                <textarea class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="detail_kategori" name="detail_kategori" rows="6"><?= old('detail_kategori',$kategori['detail_kategori']); ?></textarea>
            </div>
            <div class="mt-2">
                <label class=" block text-sm text-gray-600" for="gambar">Upload file Gambar</label>
                <div class="flex flex-wrap justify-center">
                    <div class="w-6/12 sm:w-4/12 py-2 px-4">
                    <img src="/img/<?= $kategori['gambar_kategori']; ?>" class="max-w-full h-auto px-1 img-preview" />
                    </div>
                </div>
                <input class=" px-5 py-2 w-full text-gray-700 bg-gray-200 rounded" id="gambar_kategori" name="gambar_kategori" type="file" onchange="previewImg()">
            </div>
                <div class="mt-6">
                    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Simpan</button>
                </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>