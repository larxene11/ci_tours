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
         <i class="fas fa-list mr-3"></i> Form Tambah Data Pesanan
    </p>
    <div class="leading-loose">
        <form class="w-full p-10 bg-white rounded shadow-xl" method="POST" action="<?= base_url('/pesanan/create') ?>">
        <?= csrf_field() ?>
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="name">Nama Customer</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" name="nama" type="text" id="nama" placeholder="Nama Customer" value="<?= old('nama'); ?>">
            </div>
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="email">Email</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="email" name="email" type="text" placeholder="Email Customer" value="<?= old('email'); ?>">
            </div>
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="email">Pilih Paket Tour</label>
                <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"" id="id_paket" name="id_paket" type="text" placeholder="Your Email" aria-label="Email">
                    <option value="" hidden></option>
                    <?php foreach ($paket as $row) { ?>
                        <option value="<?= $row['id_paket'] ?>"><?= $row['nama_paket'] ?></option>
                    <?php  } ?>
                </select>
            </div>
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="nama_hotel">Nama Hotel</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="nama_hotel" name="nama_hotel" type="text" placeholder="Nama Hotel" value="<?= old('nama_hotel'); ?>">
            </div>
            <div class="mt-2">
                <label class=" block text-sm text-gray-600" for="message">Message</label>
                <textarea class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="pesan" name="pesan" rows="6" placeholder="Your inquiry.." value="<?= old('pesan'); ?>"></textarea>
                </div>
                <div class="mt-6">
                    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Simpan</button>
                </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>