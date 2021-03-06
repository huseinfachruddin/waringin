<div class="container-fluid mt-5">
<div class="row">
<div class="col-lg-12 col-md-12">
              <div class="card">
                
              <form  method="post" action="<?=base_url('order/update/'.$order['id'])?>" class="navbar-form col-8 mb-5">
              <h3>STATUS : </h3>
                    <div class="input-group col-5">
                          <select class="form-control" id="type" name="status">
                                   <option ><?= $order['status']?></option>
                                   <option >Pesan</option>
                                   <option >Proses</option>                         
                        </select> 
                        <button type="submit" class="btn btn-success btn-round p-0 btn-just-icon">
                        <i class="material-icons">check</i>
                        <div class="ripple-container"></div>
                        </button>
                    </div>
                </form>
                <div class="card-header card-header-warning">
                  <a href="<?=base_url('user/show/'.$order['user_id'])?>"><h3 class="card-title"><?= $order['name'];?></h3></a>
                  <h4 class="card-title">ID ORDER = <?= $order['id'];?></h4>
                  <h5>Alamat  :</h5>
                  <p><?= $order['address'];?></p>
                 
                <a class="btn btn-success btn-round btn-just-icon pull-right"href="tel:<?=$order['phone']?>"><i class="material-icons">call</i></a>
                </div>
                <div class="card-body table-responsive">
                <table class="table">
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
                            <a href="<?=base_url('product/show/').$row->product_id?>">
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
                          <td class="td-actions text-right">
                              <a href="<?=base_url('order/drop/').$row->id.'/'.$order['id']?>" onclick="return confirm('Anda yakin mau menghapus data ini ?')" type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
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
                </div>
                <h6 class="pull-right m-3 bg-info">Date Order = <?= date(' Y-m-d D H:i:s',$order['date']);?></h6>
              </div>
            </div>
          </div>
        </div>
      </div>
   </div>
    </div>