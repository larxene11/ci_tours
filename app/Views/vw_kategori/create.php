<?= $this->extend('backend/index'); ?>

<?= $this->Section('content'); ?>
<!-- Begin Page Content -->

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
         <i class="fas fa-list mr-3"></i> Form Tambah Data Kategori
    </p>
    <div class="leading-loose">
        <form class="w-full p-10 bg-white rounded shadow-xl" method="POST" action="<?= base_url('/kategori/store') ?>">
        <?= csrf_field() ?>
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="name">Kategori Paket Tour</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" name="nama_kategori" type="text" id="nama_kategori" placeholder="Kategori" value="<?= old('nama_kategori'); ?>">
            </div>
                <div class="mt-6">
                    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Simpan</button>
                </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>