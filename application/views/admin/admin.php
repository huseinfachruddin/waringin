
    <div class="container" style="margin-top: 80px;">
        <div class="row bg-content mt-3">
            <div class="card-big">
                <div class="card-header border-bottom border-custom">
                    <h3><strong style="color: rgb(255, 153, 0);"> Admin</strong> : <a class="text-white"><strong><?=$user['name']?></strong></a></h3>
                    
                </div>
                <div class="card-body mx-auto">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-4 col-sm-4 col-4">
                            <a href="<?=base_url('product')?>" class="text-center">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="fa fa-table fa-4x"></i>
                                    </div>
                                    <div class="card-body">
                                        Data Product
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-4 col-4">
                            <a href="<?=base_url('user')?>" class="text-center">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="fa fa-user fa-4x"></i>
                                    </div>
                                    <div class="card-body">
                                       Data member
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!--  end row -->
                </div>
            </div>
            <table class="table table-bordered " style="color:#ffff">
                <div class="card-header border-bottom border-custom">
                    <h3><a class="text-white"><strong>Order</strong></a></h3>
                </div>
                        <thead>
                            <tr>
                                <th scope="col" style="width:  5%">No</th>
                                <th scope="col">Costomer</th>
                                <th scope="col">jumlah</th>
                                <th scope="col">total harga</th>
                                <th scope="col">Date</th>
                                <th scope="col" style="width: 7%">Akses</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i=1;
                        // if ($order=null) {
                        //     echo 'Pesanan Kosong';
                        // }
                        foreach ($order as $row)
                        {
                        ?>
                            <tr>
                                <th scope="row"><?=$i?></th>
                                <td><?=$row->name?></td>

                                <td>
                                    <a href="<?=base_url('order/show/'.$row->id)?>"><i class="fa fa-pencil-alt"></i></a>
                                    <a href="<?=base_url('order/delete/'.$row->id)?>"
                                    onclick="return confirm('Anda yakin mau menghapus data ini ?')"
                                    ><i style="margin-left: 10px;" class="fa fa-trash-alt" ></i></a>
                                </td>
                            </tr>
                        <?php
                        $i++;
                        }
                        ?>
                        </tbody>
                    </table>
            <!--end content-->
        </div>
