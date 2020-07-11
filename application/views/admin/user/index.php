
    <div class="container" style="margin-top: 80px;">
        <div class="row bg-content mt-3">
        <?= $this->session->flashdata('message');?>
            <div class="card-big">
                <div class="card-header border-bottom border-custom">
                    <h3><strong style="color: rgb(255, 153, 0);"> Admin</strong> > User</h3>
                </div>
                <div class="card-body col-12">
                <form class="form-inline" method="post" action="">
                    <input type="text" class="form-control w-75" placeholder="Cari Berdasarkan Name Atau role" aria-label="Recipient's username" aria-describedby="button-addon2" name="key">
                <div class="input-group-append">
                    <button class="btn btn-info" type="submit" id="button-addon2">Cari</button>
                </div>
                
                </form>
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th scope="col" style="width:  5%">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">role</th>
                                <th scope="col" style="width: 7%">Akses</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
						$i=1;
						foreach ($user as $row)
						{
						?>
                            <tr>
                                <th scope="row"><?=$i?></th>
                                <td><?= cetak($row->name)?></td>
                                <td><?=$row->email?></td>
                                <td><?=$row->role?></td>
                                <td>
                                    <a href="<?=base_url('user/show/'.$row->id)?>"><i class="fa fa-pencil-alt"></i></a>
                                    <a href="<?=base_url('user/delete/'.$row->id)?>"
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
                </div>
            </div>
        </div>
        <!--end content-->
    </div>

    
