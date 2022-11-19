<!-- MOBILE SIDEBAR -->

<div class="border text-center mx-4 px-2 md:hidden">
    <div class="w-full text-sm text-center">
        <?php
            $no = 1;
            foreach ($kategori as $row) {
        ?>
                <div class="font-bold uppercase bg-gray-50 py-2 px-3">
                    <a><?= $row['nama_kategori']; ?></a>
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