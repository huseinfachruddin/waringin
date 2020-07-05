
    <div class="container" style="margin-top: 80px;">
        <div class="row bg-content mt-3 ">
        <?= $this->session->flashdata('message');?>
            <div class="card-big">
                <div class="card-header border-bottom border-custom">
                    <h3><strong style="color: rgb(255, 153, 0);"><?= $order['id'] ;?></strong> <?= $order['name'] ;?> </h3>
                </div>
                <div class="modal-body">
                <div class="card">
        <div class="card-header">
            <?= $order['id'] ;?>
        </div>
            <div class="card-body overflow-none">
        <h5 class="card-title"></h5>
        <p class="card-text">
            <table>
             <thead>
                            <tr>
                                <th scope="col" style="width:  5%">No</th>
                                <th scope="col">product</th>
                                <th scope="col">harga satuan</th>
                                <th scope="col">jumlah</th>
                                <th scope="col">harga</th>
                                <th scope="col" style="width: 7%">Akses</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php
                        $i=1;
                        // if ($order=null) {
                        //     echo 'Pesanan Kosong';
                        // }
                        foreach ($cart as $row)
                        {
                        ?>
                            <tr>
                                <th scope="row"><?=$i?></th>
                                <td><?=$row->product?></td>
                                <td><?=$row->harga_product?></td>
                                <td><?=$row->amount?></td>
                                <td><?=$row->harga?></td>
                                
                            </tr>
                        <?php
                        $i++;
                        }
                        ?>
                        </tbody>
                        </table>
        </p>
        <p class="card-text">
        TOTAL = <?= $order['total'] ;?>
        </p>
        <a href="#" class="btn btn-primary"></a>
        </div>
            </div>
            </div>
            </div>
        </div>
        <!--end content-->
    </div>

    <!-- AddModal -->

   


    <!-- TypeModal -->
    
<script>
function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
