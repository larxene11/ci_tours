<?= $this->extend('template/index'); ?>

<?= $this->Section('content'); ?>
<div class="grid md:grid-cols-3 gap-1 mx-auto max-w-screen-xl px-4 py-2 sm:grid-cols-1">
    <!-- left -->
    <div class="border text-right max-md:hidden">
        <div class="w-full text-sm text-right">
            <?php
                $no = 1;
                foreach ($kategori as $row) {
            ?>
                    <div class="font-bold uppercase bg-gray-50 py-2 px-3">
                        <a href="<?= base_url("/detail/kategori/".$row['id_kategori']); ?>">
                            <?= $row['nama_kategori']; ?>
                        </a>   
                    </div>
                    
                    <div >
                        <?php
                            foreach ($paket2 as $item){
                        ?>
                            <div class="py-1 px-3">
                                <?php if($item['id_kategori'] == $row['id_kategori']): ?>
                                    <a href="<?= base_url("/detail/".$item['id_paket']); ?>">
                                        <?= $item['nama_paket']; ?>
                                    </a>
                                    <hr class="mt-1">
                                <?php endif; ?>
                            </div>
                            <?php } ?>
                    </div>
                    <?php
                        }
                    ?>
        </div>
    </div>


    <!-- right -->
    <div class="border col-span-2 text-center px-2"><strong><?= $paket['nama_paket'] ?></strong><br>
        <div class="text-justify">
            <?= $paket['detail_paket'] ?>
            <br><br>
        </div>
        <div class="">
            <img class="" src="/img/<?= $paket['gambar']; ?>">
        </div>
        <div class="text-justify">
            <strong>Itinerary</strong>
            <?= $paket['itienary'] ?>
        </div>
        <br>
        <strong><?= $paket['nama_paket'] ?> Price and Inclusion :</strong>
        <p><?= $paket['nama_paket'] ?></p><br>
        <div class="text-justify">
            <?= $paket['harga_paket'] ?>
        </div>


        <!-- BOOKING FORM -->

        <div class="text-left">
        <div class="mt-5 font-bold">
            <p>Booking Form</p>
        </div>
            <p>Please complete the form below for general inquiries of your tour or activity</p>
        <form class="mt-4" method="POST" action="<?= base_url('/pesan') ?>">
        <?= csrf_field() ?>
        <div class="mb-1">
            <label for="name" class="block mb-2 text-sm font-medium">Your name</label>
            <input type="name" id="nama" name="nama" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="your name" required="">
        </div>
        <div class="mb-1">
            <label for="email" class="block mb-2 text-sm font-medium">Your email</label>
            <input type="email" id="email" name="email" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="abc@example.com" required="">
        </div>
        <div class="mb-1">
            <label for="activity" class="block mb-2 text-sm font-medium">Your tour activity</label>
            <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"" id="id_paket" name="id_paket" type="text" placeholder="Your Email" aria-label="Email">
                    <option value="" hidden></option>
                    <?php foreach ($paket2 as $row) { ?>
                        <option value="<?= $row['id_paket'] ?>"><?= $row['nama_paket'] ?></option>
                    <?php  } ?>
            </select>
        </div>
        <div class="mb-1">
            <label for="hotel" class="block mb-2 text-sm font-medium">Your Hotel name</label>
            <input type="hotel" id="nama_hotel" name="nama_hotel" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="your hotel" required="">
        </div>
        
        <label for="message" class="block mb-1 text-sm font-medium">Your message</label>
        <textarea id="pesan" name="pesan" rows="4" class="block p-2.5 w-full text-sm rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Leave a comment..."></textarea>

        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 my-4">Submit</button>
        </form>    
        </div>
    </div>
    
    <!-- MOBILE SIDEBAR -->

    <div class="border text-center px-2 md:hidden">
    <div class="w-full text-sm text-center">
            <?php
                $no = 1;
                foreach ($kategori as $row) {
            ?>
                    <div class="font-bold uppercase bg-gray-50 py-2 px-3">
                        <a href="<?= base_url("/detail/kategori/".$row['id_kategori']); ?>">
                            <?= $row['nama_kategori']; ?>
                        </a>   
                    </div>
                    
                    <div >
                        <?php
                            foreach ($paket2 as $item){
                        ?>
                            <div class="py-1 px-3">
                                <?php if($item['id_kategori'] == $row['id_kategori']): ?>
                                    <a href="<?= base_url("/detail/".$item['id_paket']); ?>">
                                        <?= $item['nama_paket']; ?>
                                    </a>
                                    <hr class="mt-1">
                                <?php endif; ?>
                            </div>
                            <?php } ?>
                    </div>
                    <?php
                        }
                    ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>