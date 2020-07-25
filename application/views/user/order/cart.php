<div class="container-fluid mt-5">
<?= $this->session->flashdata('message');?>

<div class="row">
<div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-info">
                  <a href="<?=base_url('profile')?>"><h3 class="card-title"><?= $user['name'];?></h3></a>
                  <h5>Alamat  :</h5>
                  <p><?= $user['address'];?></p>
                  <a class="btn btn-success btn-round btn-just-icon pull-right"href="tel:<?=$user['phone']?>"><i class="material-icons">call</i></a>
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
                            <a href="<?=base_url('product/show/').$row->product_id?>">
                          <?= cetak($row->product)?>
                            </a>
                          </td>
                          <td>
                          <?= uang($row->harga_product)?> 
                          <small>/<?=$row->satuan?></small>
                          </td>
                          <td>
                          <form  method="post" action="<?=base_url('pemesanan/update/'.$row->id)?>" class="navbar-form col-8">
                            <input name="amount" type="number" min="0" value="<?=$row->amount?>" class="">
                          
                          </td>
                          <td>
                          <button type="submit" class="btn btn-success btn-round btn-just-icon pull-left">
                            <i class="material-icons">check</i>
                          <div class="ripple-container"></div>
                          </form>
                        </button>
                          </td>
                          <td>
                          <?= uang($row->harga)?>
                          </td>
                          <td class="td-actions text-right">
                              <a href="<?=base_url('pemesanan/drop/').$row->id.'/'.$user['id']?>" onclick="return confirm('Anda yakin mau menghapus data ini ?')" type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">close</i>
                              </a>
                          </td>
                        </tr>
                        <?php
                        $i++;
						            }
						            ?>
                      </tbody>
                    </table>
                    
                    <h3>Total = <?= uang($order['total'])?></h3>
                    <a href="<?=base_url('pemesanan/store/')?>" class="btn btn-success pull-right">
                      <i class="material-icons">shopping_cart</i> Lakukan Pemesanan
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
 
      <div class="container-fluid mt-5">
<div class="row">
      <div class="col-lg-8 col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
  <h1>Daftar Order Anda</h1>
                </div>
                <div class="card-body table-responsive">
                <table class="table">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Status
                        </th>
                        <th>
                          Date
                        </th>

                      </thead>
                      <tbody>
                      <?php
						$i=1;
						foreach ($pesanan_berhasil as $row)
						{
						?>
                        <tr>
                          <td>
                          <a href="<?=base_url('pemesanan/pembayaran/'.$row->id)?>"><?= cetak($row->id)?></a>
                          </td>
                          <td>
                          <?= cetak($row->status)?>
                          </td>
                          <td>
                          <?= date('Y-m-d H:i:s',$row->date)?>
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

            </div>

    </div>

  