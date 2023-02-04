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
                            <div class="py-1 px-3">
                                <?php if($item['id_kategori'] == $row['id_kategori']): ?>
                                    <a href="<?= base_url("/detail/".$item['id_paket']); ?>">
                                        <?= $item['nama_paket']; ?>
                                    </a>
                                    <hr>
                                <?php endif; ?>
                            </div>
                            <?php } ?>
                    </div>
                    <?php
                        }
                    ?>
        </div>
    </div>