
    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <a class="card-header card-header-info card-header-icon" href="<?=base_url('user')?>">
                  <div class="card-icon">

                    <i class="material-icons">person
                    </i>

                  </div>
                  <p class="card-category"></p>
                  <h3 class="card-title"><?=$user['total']?>
                  </h3>
                </a>
                <div class="card-footer">
                  <div class="stats">
                  Total User
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
              <a class="card-header card-header-success card-header-icon" href="<?=base_url('product')?>">
                  <div class="card-icon">
                    <i class="material-icons">store</i>
                  </div>
                  <p class="card-category"></p>
                  <h3 class="card-title"><?=$product['total']?></h3>
                </a>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Total Barang
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
              <a class="card-header card-header-warning card-header-icon" href="<?=base_url('order')?>">
                  <div class="card-icon">
                    <i class="material-icons">shopping_cart</i>
                  </div>
                  <p class="card-category"></p>
                  <h3 class="card-title"><?=$order['total']?></h3>
                </a>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">local_offer</i> Total Order
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
              <a class="card-header card-header-danger card-header-icon" href="<?=base_url('settings')?>">
                  <div class="card-icon">
                    <i class="fa fa-gear"></i>
                  </div>
                  <p class="card-category"></p>
                  <h3 class="card-title">Settings</h3>
                </a>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">settings</i> Atur Website
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
          
          <div class="col-12">
              <div class="card card-stats">
              <div class="card-header card-header-danger card-header-icon" href="<?=base_url('settings')?>">
                  <div class="card-icon">
                    <i class="fa fa-list"></i>
                  </div>
                  <p class="card-category"></p>
                  <h3 class="card-title">Ecer = <?= $ecer['total']?></h3>
                  <h3 class="card-title">Grosir = <?= $grosir['total']?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">list</i> Atur Website
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row mt-0">

            <div class=" col-md-6">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Order Masuk Baru</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body table-responsive">
                <table class="table">
                      <thead class=" text-primary">
                        <th>
                          Name
                        </th>
                        <th>
                          Date
                        </th>
                        <th>
                          Aksi
                        </th>
                      </thead>
                      <tbody>
                      <?php
						$i=1;
						foreach ($baru as $row)
						{
						?>
                        <tr>
                          <td>
                          <a href="<?=base_url('order/show/').$row->id?>">
                          <?= cetak($row->name)?>
                          </a>
                          </td>
                          <td>
                          <?= date('Y-m-d H:i:s',$row->date)?>
                          </td>

                          <td class="td-actions text-right">
                          <a href="<?=base_url('order/delete/').$row->id?>" onclick="return confirm('Anda yakin mau menghapus data ini ?')" class="btn btn-danger btn-link btn-sm">
                                <i class="fa fa-close"></i>
                          </a>
                              
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
    
      <div class=" col-md-6">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Data category</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body table-responsive">
                <table class="table">
                      <thead class=" text-primary">
                        <th>
                          Id
                        </th>
                        <th>
                          Name
                        </th>
                      </thead>
                      <tbody>
                      <?php
						$i=1;
						foreach ($category as $row)
						{
						?>
                        <tr>
                        <td>
                          <?= $i;?>
                          </td>
                          <td>
                          <?= cetak($row->name)?>
                          </td>
                          <td class="td-actions text-right">
                          <a href="<?=base_url('admin/delete_category/').$row->id?>" onclick="return confirm('Anda yakin mau menghapus data ini ?')" class="btn btn-danger btn-link btn-sm">
                                <i class="fa fa-close"></i>
                          </a>
                              
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
      </div>
    </div>

