
    <div class="container" style="margin-top: 80px;">
        <div class="row bg-content mt-3 ">
        <?= $this->session->flashdata('message');?>
            <div class="card-big">
                <div class="card-header border-bottom border-custom">
                    <h3><strong style="color: rgb(255, 153, 0);"> user</strong> > <?=$user['name']?></h3>
                </div>
                <div class="modal-body">
                <?php echo form_open_multipart('user/update/'.$user['id']);?>
                    <div class="modal-content p-3">
                    <div class="form-group ">
                    <label>image</label>
                        <div class="col-md-5 mx-auto">
                        <img id="blah" src="<?=base_url('assets/images/'.$user['img'])?>" alt="your image" class="m-a w-100"/>
                        </div>
                        <div class="col-md-5 mx-auto">
                        Ganti Image
                        <input name="img" type="file" id="inputEmail" class="form-control border border-success" onchange="readURL(this);">
                        </div>
                    </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" id="name" placeholder="" name="name" value="<?=$user['name']?>">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" id="name" placeholder="" name="email" value="<?=$user['email']?>">
                        </div>
                        <div class="form-group">
                            <label for="type">role</label>
                            <div class="row">
                                <div class="col-8">
                                    
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
                        
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" id="name" placeholder="" name="address" value="<?=$user['address']?>">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="" class="form-control" id="name" placeholder="~RP" name="phone" value="<?=$user['phone']?>">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" id="name" placeholder="~RP" name="password" value="<?=$user['password']?>">
                        </div>
                        <a data-toggle="modal" data-target="#addTypeModal">
                                        <button class="btn btn-warning">
                                            ganti password
                                        </button>
                        </a>
                </div>
                <div class="card-footer">
                    <a href="<?=base_url('user')?>" type="submit" class="btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-success">Ubah</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--end content-->
    </div>


    <!-- AddModal -->
<!-- TypeModal -->
<div class="modal fade" id="addTypeModal" tabindex="-1" role="dialog" aria-labelledby="addTypeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTypeModalLabel">Tambah Tipe</h5>
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
