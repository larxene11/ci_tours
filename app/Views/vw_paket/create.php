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

<div class="w-full lg:w-full my-6 px-2 pr-0 lg:pr-2">
    <p class="text-xl pb-6 flex items-center">
         <i class="fas fa-list mr-3"></i> Form Tambah Data Paket
    </p>
    <div class="leading-loose">
        <form class="w-full p-10 bg-white rounded shadow-xl" method="POST" action="<?= base_url('/paket/store') ?>" enctype="multipart/form-data">
        <?= csrf_field() ?>
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="kategori">Kategori Paket</label>
                <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="kategori" name="kategori" type="text" required="" id="kategori" placeholder="Kategori Paket" value="<?= old('kategori'); ?>">
                <option value="-">---Pilih Kategori Paket---</option>
                <option value="Bali Trip Package">Bali Trip Package</option>
                <option value="Labuan Bajo Trip">Labuan Bajo Trip</option>
                </select>
            </div>
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="nama_paket">Nama Paket</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="nama_paket" name="nama_paket" type="text" required="" id="nama_paket" placeholder="Nama Paket" value="<?= old('nama_paket'); ?>">
            </div>
            <div class="mt-2">
                <label class=" block text-sm text-gray-600" for="detail_paket">Detail Paket</label>
                <textarea class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="detail_paket" name="detail_paket" rows="6" placeholder="Detail Paket" value="<?= old('detail_paket'); ?>"></textarea>
            </div>
            <div class="mt-2">
                <label class=" block text-sm text-gray-600" for="harga_paket">Harga Paket</label>
                <textarea class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="harga_paket" name="harga_paket" rows="6" placeholder="harga_paket" value="<?= old('harga_paket'); ?>"></textarea>
            </div>
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="inclusion">Inclusion & Exclusion</label>
                <textarea class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="inclusion" name="inclusion" type="text" id="inclusion" rows="6" placeholder="Inclusion & Exclusion" value="<?= old('inclusion'); ?>"></textarea>
            </div>
            <div class="mt-2">
                <label class=" block text-sm text-gray-600" for="itienary">Itienary</label>
                <textarea class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="itienary" name="itienary" rows="6" placeholder="Itienary" value="<?= old('itienary'); ?>"></textarea>
            </div>
            <div class="mt-2">
                <label class=" block text-sm text-gray-600" for="gambar">Upload file</label>
                <div class="flex flex-wrap justify-center">
                    <div class="w-6/12 sm:w-4/12 py-2 px-4">
                        <img src="/img/default.jpg" class="max-w-full h-auto px-1 img-preview" />
                    </div>
                </div>
                <input class=" px-5 py-2 w-full text-gray-700 bg-gray-200 rounded" id="gambar" name="gambar" type="file" onchange="previewImg()">
            </div>
            <div class="mt-6">
                <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>