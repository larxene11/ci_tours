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
    <p class="text-xl pb-6 flex px-1 items-center">
         <i class="fas fa-list mr-3"></i> Form Ubah Data Pesanan
    </p>
    <div class="leading-loose">
        <form class="w-full p-10 bg-white rounded shadow-xl" method="POST" action="<?= base_url('/pesanan/update/'. $pesanan->id_pesanan) ?>">
        <?= csrf_field() ?>
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="name">Nama Customer</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" name="nama" type="text" id="nama" value="<?= $pesanan->nama; ?>">
            </div>
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="email">Email</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="email" name="email" type="text"  value="<?= $pesanan->email; ?>">
            </div>
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="email">Pilih Paket Tour</label>
                <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"" id="id_paket" name="id_paket" type="text" placeholder="Pilih Paket Tour">
                    <option value="" hidden></option>
                    <?php foreach($paket as $row) { ?>
                    <option value="<?= $row->id_paket ?>" <?= $pesanan->id_paket == $row->id_paket ? "selected" : "";?>><?= $row->nama_paket ?></option>
                    <?php  } ?>
                </select>
            </div>
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="nama_hotel">Nama Hotel</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="nama_hotel" name="nama_hotel" type="text"  value="<?= $pesanan->nama_hotel; ?>">
            </div>
            <div class="mt-2">
                <label class=" block text-sm text-gray-600" for="message">Message</label>
                <textarea class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="pesan" name="pesan" rows="6" value="<?= $pesanan->pesan; ?>"></textarea>
                </div>
                <div class="mt-6">
                    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Simpan</button>
                </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>