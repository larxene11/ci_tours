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
                            foreach ($paket as $item){
                        ?>
                            <div class="pt-0.5 px-3">
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
    <div class="border col-span-2 text-center px-2"><strong>BALI TOUR AGENCY TERMS AND CONDITION</strong><br>
        <div class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut quam ut orci bibendum sodales. Aliquam semper nisi tincidunt rhoncus egestas. Integer ut cursus mi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Duis massa purus, molestie tempor facilisis quis, iaculis in nisi. Donec placerat felis ac elit ultrices, nec ornare risus rhoncus. Fusce viverra quam eget erat finibus, eu tempus augue cursus. Proin sem leo, eleifend fringilla fringilla id, feugiat eget ex. Proin id lorem nec eros iaculis gravida. Morbi interdum libero nisl, eu dictum ligula efficitur eu. Morbi sit amet elit justo. Praesent feugiat ultrices est nec facilisis. Nullam nec tincidunt nulla, eu finibus augue. In at pellentesque quam. Curabitur varius, arcu at blandit blandit, nulla arcu interdum lectus, in cursus arcu sem at tortor. Phasellus tristique neque quam, vel dapibus tellus consectetur sed.
            Vestibulum lacus velit, consectetur a laoreet sit amet, iaculis commodo libero. In commodo aliquam enim eu venenatis. Nulla vitae magna pretium, lacinia est vel, ornare purus. In commodo vestibulum tincidunt. Maecenas eu urna lacus. Etiam nibh diam, suscipit id imperdiet sit amet, condimentum vitae odio. Curabitur at feugiat ex. Sed vel dui vel mauris tristique dignissim eu eget mauris. Phasellus justo turpis, finibus id eros eget, porttitor malesuada tellus. Integer non metus arcu. Nullam porta vestibulum enim, nec fermentum lorem tincidunt eget. Duis at nisi diam.
            Sed porttitor eu metus vitae sodales. Proin consequat lectus sed pretium porta. Vestibulum facilisis tincidunt ullamcorper. Aliquam nec lacinia elit. Sed elementum tellus vitae orci tincidunt, ac posuere libero consequat. Sed pellentesque quis leo eget dignissim. Etiam eget ante sed mi rhoncus efficitur ac a lectus. Etiam quis turpis et lorem accumsan iaculis. Vestibulum tincidunt magna libero. Phasellus finibus turpis faucibus tortor suscipit, et vehicula odio molestie. Mauris sit amet mollis ex, ac faucibus quam. Duis eget tincidunt odio. <br><br>
        </div>

        <div class="">
            <img class="" src="/dummyimage.jpg">
        </div>

        <div class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut quam ut orci bibendum sodales. Aliquam semper nisi tincidunt rhoncus egestas. Integer ut cursus mi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Duis massa purus, molestie tempor facilisis quis, iaculis in nisi. Donec placerat felis ac elit ultrices, nec ornare risus rhoncus. Fusce viverra quam eget erat finibus, eu tempus augue cursus. Proin sem leo, eleifend fringilla fringilla id, feugiat eget ex. Proin id lorem nec eros iaculis gravida. Morbi interdum libero nisl, eu dictum ligula efficitur eu. Morbi sit amet elit justo. Praesent feugiat ultrices est nec facilisis. Nullam nec tincidunt nulla, eu finibus augue. In at pellentesque quam. Curabitur varius, arcu at blandit blandit, nulla arcu interdum lectus, in cursus arcu sem at tortor. Phasellus tristique neque quam, vel dapibus tellus consectetur sed.
            Vestibulum lacus velit, consectetur a laoreet sit amet, iaculis commodo libero. In commodo aliquam enim eu venenatis. Nulla vitae magna pretium, lacinia est vel, ornare purus. In commodo vestibulum tincidunt. Maecenas eu urna lacus. Etiam nibh diam, suscipit id imperdiet sit amet, condimentum vitae odio. Curabitur at feugiat ex. Sed vel dui vel mauris tristique dignissim eu eget mauris. Phasellus justo turpis, finibus id eros eget, porttitor malesuada tellus. Integer non metus arcu. Nullam porta vestibulum enim, nec fermentum lorem tincidunt eget. Duis at nisi diam.
            <br>
            Phone : 081333222444<br>
            Email : you@example.com<br>
            <br>
        </div>

        <div class="border px-3">
            <strong>How To Book</strong>
            <div class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut quam ut orci bibendum sodales. Aliquam semper nisi tincidunt rhoncus egestas. Integer ut cursus mi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Duis massa purus, molestie tempor facilisis quis, iaculis in nisi. Donec placerat felis ac elit ultrices, nec ornare risus rhoncus. Fusce viverra quam eget erat finibus, eu tempus augue cursus. Proin sem leo, eleifend fringilla fringilla id, feugiat eget ex. Proin id lorem nec eros iaculis gravida. Morbi interdum libero nisl, eu dictum ligula efficitur eu. Morbi sit amet elit justo. Praesent feugiat ultrices est nec facilisis. Nullam nec tincidunt nulla, eu finibus augue. In at pellentesque quam. Curabitur varius, arcu at blandit blandit, nulla arcu interdum lectus, in cursus arcu sem at tortor. Phasellus tristique neque quam, vel dapibus tellus consectetur sed.
            Vestibulum lacus velit, consectetur a laoreet sit amet, iaculis commodo libero. In commodo aliquam enim eu venenatis. Nulla vitae magna pretium, lacinia est vel, ornare purus. In commodo vestibulum tincidunt. Maecenas eu urna lacus. Etiam nibh diam, suscipit id imperdiet sit amet, condimentum vitae odio. Curabitur at feugiat ex. Sed vel dui vel mauris tristique dignissim eu eget mauris. Phasellus justo turpis, finibus id eros eget, porttitor malesuada tellus. Integer non metus arcu. Nullam porta vestibulum enim, nec fermentum lorem tincidunt eget. Duis at nisi diam.
            <br>
        </div>

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
                    <?php foreach ($paket as $row) { ?>
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
                            foreach ($paket as $item){
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
</div>

<?= $this->endSection(); ?>