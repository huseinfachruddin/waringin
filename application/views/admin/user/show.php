<div class="content">
    <?= $this->session->flashdata('message');?>
        <div class="container-fluid mt-3">
          <div class="row">
          
          <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">

                    <img id="blah" class="" src="<?=base_url('assets/images/').$user['img']?>" />
 
                </div>
                <div class="card-body">
                <div class="custom-file">
                    <?php echo form_open_multipart('user/update/'.$user['id']);?>
                    <label class="btn btn-primary btn-round" for="inputFile">Upload</label>
                    <input type="file" class="custom-file-input display-none" id="inputFile" name="img" onchange="readURL(this);"></input>
                </div>
              </div>
              </div>
            </div>

            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Profile</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body m-3">
                
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input type="text" class="form-control" name="name" value="<?=$user['name']?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email address</label>
                          <input type="email" class="form-control" name="email" value="<?=$user['email']?>">
                        </div>
                      </div>
                      </div>
                    <div class="row">
                        <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Role</label>
                          <select class="form-control" id="type" name="role">
                                        <option value="<?=$user['role_id']?>"><?=$user['role']?></option>
                                        <?php
                                        foreach ($role as $row)
                                        {
                                        ?>
                                        <option value="<?=$row->id?>"><?=$row->name?></option>
                                        <?php
                                        }
                                        ?>
                                        
                        </select>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Adress</label>
                          <input type="text" value="<?=$user['address']?>" name="address" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Phone</label>
                          <input type="text" value="<?=$user['phone']?>" name="phone" class="form-control">
                        </div>
                      </div>
                    </div>
                    <a data-toggle="modal" data-target="#addTypeModal">
                                        <button class="btn btn-warning">
                                            ganti password
                                        </button>
                    </a>
                    <button type="submit" class="btn btn-primary pull-right">Save</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>

            
            </div>
          </div>
        </div>
      </div>







    <!-- AddModal -->
<!-- TypeModal -->
<div class="modal fade" id="addTypeModal" tabindex="-1" role="dialog" aria-labelledby="addTypeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTypeModalLabel">Ubah Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?=base_url('user/password/'.$user['id'])?>">
                        <div class="form-group">
                            <label for="type">Password Lama</label>
                            <input type="name" class="form-control" id="name" placeholder="" name="password" >
                        </div>
                        <div class="form-group">
                            <label for="type">Password Baru</label>
                            <input type="name" class="form-control" id="name" placeholder="" name="password2" >
                        </div>
                    
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Tambahkan</button>
                    
                </div>
                </form>
            </div>
        </div>
    </div>
   


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
