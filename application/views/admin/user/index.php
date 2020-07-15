
<div class="container-fluid mt-5">
<div class="row">
        <?= $this->session->flashdata('message');?>
        <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">User List</h4>
                  <p class="card-category"> Here is a subtitle for this table</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  <form  method="post" action="" class="navbar-form col-8">
                    <div class="input-group no-border">
                        <input name="key" type="text" value="" class="form-control" placeholder="Search...">
                        <button type="submit" class="btn btn-white btn-round btn-just-icon">
                        <i class="material-icons">search</i>
                        <div class="ripple-container"></div>
                        </button>
                    </div>
                </form>
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          No
                        </th>
                        <th>
                          Name
                        </th>
                        <th>
                          Email
                        </th>
                        <th>
                          Role
                        </th>
                        <th>
                          Aksi
                        </th>
                      </thead>
                      <tbody>
                      <?php
						$i=1;
						foreach ($user as $row)
						{
						?>
                        <tr>
                          <td>
                          <?=$i?>
                          </td>
                          <td>
                          <?= cetak($row->name)?>
                          </td>
                          <td>
                          <?= cetak($row->email)?>
                          </td>
                          <td>
                          <?= cetak($row->role)?>
                          </td>
                          <td class="td-actions text-right">
                          <a  href="<?=base_url('user/show/').$row->id?>" type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">edit</i>
                              </a>
                              <a href="<?=base_url('user/delete/').$row->id?>" onclick="return confirm('Anda yakin mau menghapus data ini ?')" type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
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
    
