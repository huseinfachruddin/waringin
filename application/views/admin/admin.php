

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <a class="card-header card-header-info card-header-icon" href="">
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
              <a class="card-header card-header-success card-header-icon" href="">
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
              <a class="card-header card-header-warning card-header-icon" href="">
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
              <a class="card-header card-header-danger card-header-icon" href="">
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

          <div class="row">

            <div class="col-lg-8 col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Order Masuk Baru</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body table-responsive">
                <table class="table">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
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
                          <?= cetak($row->id)?>
                          </td>
                          <td>
                          <?= cetak($row->name)?>
                          </td>
                          <td>
                          <?= date('Y-m-d H:i:s',$row->date)?>
                          </td>
                          <td class="td-actions text-right">
                          <a href="<?=base_url('order/show/').$row->id?>" type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">edit</i>
                              </a>
                              <a href="<?=base_url('order/delete/').$row->id?>" onclick="return confirm('Anda yakin mau menghapus data ini ?')" type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
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
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
              <li>
                <a href="https://creative-tim.com/presentation">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
              <li>
                <a href="https://www.creative-tim.com/license">
                  Licenses
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
          </div>
        </div>
      </footer>
    </div>

