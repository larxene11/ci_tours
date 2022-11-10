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
            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama Customer</label>
            <input type="text" name="nama" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="nama" placeholder="Nama Customer" value="<?= old('nama'); ?>">
        </div>
        <div class="row mb-3">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your email</label>
            <input type="email" id="email" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com">
        </div>
        <div class="row mb-3">
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Pilih Paket Tour</label>
            <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="" hidden></option>
                <?php foreach ($paket as $row) { ?>
                    <option value="<?= $row->id_paket ?>"><?= $row->nama_paket ?></option>
                <?php  } ?>
            </select>
        </div>
</div>
<div class="row mb-3">
    <label for="nama_hotel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama Hotel</label>
    <input type="text" name="nama_hotel" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="nama_hotel" placeholder="Nama Hotel" value="<?= old('nama_hotel'); ?>">
</div>
<div class="row mb-3">
    
<label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your message</label>
<textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a comment..." value="<?= old('email'); ?>"></textarea>

</div>


    <div>
        <button type=" submit" class="btn btn-primary">Simpan</button>
    </form>

</div>

<?= $this->endSection(); ?>