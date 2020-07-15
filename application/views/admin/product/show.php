
    <div class="content">
    <?= $this->session->flashdata('message');?>
        <div class="container-fluid mt-3">
          <div class="row">
          
          <div class="col-md-4">
              <div class="card card-profile">
                <div class="card">

                    <img id="blah" class="w-100" src="<?=base_url('assets/images/').$product['img']?>" />
 
                </div>
                <div class="card-body">
                <div class="custom-file">
                    <?php echo form_open_multipart('product/update/'.$product['id']);?>
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
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Product</label>
                          <input type="text" class="form-control" name="name" value="<?=$product['name']?>">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Detail</label>
                        <textarea class="form-control border border-success" name="detail" id="tinymceriobermano" value="">
                            <?=$product['detail']?>
                        </textarea><script> CKEDITOR.replace( 'ckeditorriobermano' );</script>
                        </div>
                      </div>
                      </div>

                    
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Harga</label>
                          <input type="text" value="<?=$product['harga']?>" name="harga" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Satuan</label>
                          <input type="text" value="<?=$product['satuan']?>" name="satuan" class="form-control">
                        </div>
                      </div>
                    </div>

                    <button type="submit" class="btn btn-primary pull-right">Save</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>

              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Category</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body m-3">
                
                    <div class="row">
                    <div class="col-md-5">
                                    <div class="form-group">
                                <label class="bmd-label-floating">Pilih Category</label>
                                <?php echo form_open_multipart('product/category/'.$product['id'])?>
                        <select class="form-control" id="type" name="category">
                                   <option value="<?=$product['category_id']?>"><?=$product['category']?></option>

                                      <?php
                                      foreach ($category as $row)
                                      {
                                      ?>
                                      <option value="<?=$row->id?>"><?=$row->name?></option>
                                      <?php
                                      }
                                      ?>
                                      
                        </select>
                      </div>
        <div class="col-md-5">
            <a  data-toggle="modal" data-target="#addTypeModal">
              <button class="btn btn-success">
              <i class="material-icons">add</i>Add Category
            </button>
              </a>
              </div>
              </div>
        <div class="col-md-12">
        <div class="form-group">

                      <button type="submit" class="btn btn-primary pull-right">Save</button>
                      <div class="clearfix"></div>
                    </form>
                    </div>

              </div>

   

    </div>
    </div>


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
                    <form method="post" action="<?=base_url('product/create_category/'.$product['id'])?>">
                        <div class="form-group">
                            <label for="type">Tambahkan nama category Baru</label>
                            <input type="text" class="form-control" id="name" placeholder="" name="name" >
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
<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
<script>
  tinymce.init({
    selector: '#tinymceriobermano'
  });
</script>