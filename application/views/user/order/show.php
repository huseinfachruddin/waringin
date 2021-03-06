<div class="container-fluid mt-5">
<div class="row">
  <?php if ($order['status']=='Pesan') { ?>
    
    
<div class="col-lg-12 col-md-12">
  <div class="card p-2">
  <h3>Pesanan anda akan di proses Setelah Anda melakukan transaksi pembayaran.</h3>
  <h3>Silahkan </h3>
</div>
</div>
<?php }?>
<div class="col-lg-12 col-md-12 ">
              <div class="card">
                <div class="card-header card-header-warning">
                  <a href="<?=base_url('user/show/'.$order['user_id'])?>"><h3 class="card-title"><?= $order['name'];?></h3></a>
                  <h4 class="card-title">ID ORDER = <?= $order['id'];?></h4>
                  <h5>Alamat  :</h5>
                  <p><?= $order['address'];?></p>
                  <div class="bg-info">Status: <?= $order['status'];?></div>
                  <a class="btn btn-success btn-round btn-just-icon pull-right"href="tel:<?=$order['phone']?>"><i class="material-icons">call</i></a>
                  

                </div>
                <div class="card-body table-responsive">
                <table class="table-sm">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Product
                        </th>
                        <th>
                          Harga/satuan
                        </th>
                        <th>
                          Jumlah Barang
                        </th>
                        <th>
                          Harga total
                        </th>
                      </thead>
                      <tbody>
                      <?php
						$i=1;
						foreach ($cart as $row)
						{
						?>
                        <tr>
                          <td>
                          <?= cetak($i)?>
                          </td>
                          <td>
                            <a href="<?=base_url('home/product/').$row->product_id?>">
                          <?= cetak($row->product)?>
                            </a>
                          </td>
                          <td>
                          <?= uang($row->harga_product)?> 
                          <small>/<?=$row->satuan?></small>
                          </td>
                          <td>
                          <?= cetak($row->amount)?>
                          </td>
                          <td>
                          <?= uang($row->harga)?>
                          </td>

                        </tr>
                        <?php
                        $i++;
						}
						?>
                      </tbody>
                    </table>
                    
                    <h3>Total = <?= uang($order['total'])?></h3>
                </div>
                <h6 class="pull-right m-3 bg-info">Date Order = <?= date(' Y-m-d D H:i:s',$order['date']);?></h6>
              </div>
            </div>
          </div>
        </div>
      </div>
   </div>
    </div>