<div class="container-fluid mt-5">
<div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-info">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title">Tasks:</span>
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <a class="nav-link active" href="#profile" data-toggle="tab">
                            <i class="material-icons">shopping_cart</i> All
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#messages" data-toggle="tab">
                            <i class="material-icons">fiber_new</i> Baru
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#settings" data-toggle="tab">
                            <i class="material-icons">cached</i> Proses
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="profile">
                    <form  method="post" action="" class="navbar-form col-8">
                    <div class="input-group no-border">
                        <input name="key" type="text" value="<?= $key ?>" class="form-control" placeholder="Search...">
                        <button type="submit" class="btn btn-primary">
                        <i class="material-icons">search</i>
                        <div class="ripple-container"></div>
                        </button>
                    </div>
                </form>
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Name
                        </th>
                        <th>
                          Status
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
						foreach ($order as $row)
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
                          <?= cetak($row->status)?>
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
                    <div class="tab-pane" id="messages">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Name
                        </th>
                        <th>
                          Status
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
                          <?= cetak($row->status)?>
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
                    <div class="tab-pane" id="settings">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Name
                        </th>
                        <th>
                          Status
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
						foreach ($proses as $row)
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
                          <?= cetak($row->status)?>
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