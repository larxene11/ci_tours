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
    <div class="border col-span-2 text-center px-2"><strong>BALI TOUR | BALI DAY TOURS | BALI TRIP PACKAGES</strong><br>
        <strong>Best Bali Tour on-line where we can arrange Bali Day Tours, Bali Trip Packages, Bali Adventure Tours with Tour Guide and Driver</strong><br>
        <div class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut quam ut orci bibendum sodales. Aliquam semper nisi tincidunt rhoncus egestas. Integer ut cursus mi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Duis massa purus, molestie tempor facilisis quis, iaculis in nisi. Donec placerat felis ac elit ultrices, nec ornare risus rhoncus. Fusce viverra quam eget erat finibus, eu tempus augue cursus. Proin sem leo, eleifend fringilla fringilla id, feugiat eget ex. Proin id lorem nec eros iaculis gravida. Morbi interdum libero nisl, eu dictum ligula efficitur eu. Morbi sit amet elit justo. Praesent feugiat ultrices est nec facilisis. Nullam nec tincidunt nulla, eu finibus augue. In at pellentesque quam. Curabitur varius, arcu at blandit blandit, nulla arcu interdum lectus, in cursus arcu sem at tortor. Phasellus tristique neque quam, vel dapibus tellus consectetur sed.
            Vestibulum lacus velit, consectetur a laoreet sit amet, iaculis commodo libero. In commodo aliquam enim eu venenatis. Nulla vitae magna pretium, lacinia est vel, ornare purus. In commodo vestibulum tincidunt. Maecenas eu urna lacus. Etiam nibh diam, suscipit id imperdiet sit amet, condimentum vitae odio. Curabitur at feugiat ex. Sed vel dui vel mauris tristique dignissim eu eget mauris. Phasellus justo turpis, finibus id eros eget, porttitor malesuada tellus. Integer non metus arcu. Nullam porta vestibulum enim, nec fermentum lorem tincidunt eget. Duis at nisi diam.
            Sed porttitor eu metus vitae sodales. Proin consequat lectus sed pretium porta. Vestibulum facilisis tincidunt ullamcorper. Aliquam nec lacinia elit. Sed elementum tellus vitae orci tincidunt, ac posuere libero consequat. Sed pellentesque quis leo eget dignissim. Etiam eget ante sed mi rhoncus efficitur ac a lectus. Etiam quis turpis et lorem accumsan iaculis. Vestibulum tincidunt magna libero. Phasellus finibus turpis faucibus tortor suscipit, et vehicula odio molestie. Mauris sit amet mollis ex, ac faucibus quam. Duis eget tincidunt odio. <br><br>
        </div>
        <strong>Please select our Bali Day Tour Packages that you can choose as on your need during your holiday in Bali<br><br></strong>

        <div class="flex flex-col items-center bg-white border md:flex-row ">
            <img class="object-cover w-full h-96 md:h-auto md:w-48 mx-2 sm:w-20 sm:h-auto" src="/img/vw.jpg" alt="">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">VW SAFARI BALI TOUR</h5>
                <p class="mb-3 font-normal text-gray-900">VW Safari Bali Tour is one of the famous Bali Full Day Tours which is offer best experience to explore Bali Island with Volkswagen Safari Roof Car. Let the wind blow through your hair in the coolest mode of transport Classic VW Safari on the island, meander through sleepy villages, where home and cottage industries thrive, past rice terrace and friendly Balinese people with their daily cycle of live.</p>
            </div>
        </div>

        <br>

        <div class="flex flex-col items-center bg-white border md:flex-row ">
            <img class="object-cover w-full h-96 md:h-auto md:w-48 mx-2 sm:w-20 sm:h-auto" src="/img/balibeach.jpg" alt="">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">BALI BEACH TOUR</h5>
                <p class="mb-3 font-normal text-gray-900">Bali Beach Tour is amazing Bali Half Day Tours that we design for traveler who want to spend their holiday in the beach. The trip will be start at 14.00 PM from your hotel then we will drive you to our first destination to visit Kuta Beach. The beach was really so close to nature and is picturesque with white sand and the beautiful blue ocean, and it is perfect for a relaxing afternoon. Then our next destination is to visiting Pandawa Beach, it's a great beach to sit in the sun or have some fun in the water.</p>
            </div>
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


<?= $this->endSection(); ?>