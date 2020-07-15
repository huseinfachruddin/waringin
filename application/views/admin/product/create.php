
    <div class="content">
    <?= $this->session->flashdata('message');?>
    
        <div class="container-fluid mt-3">
          <div class="row">
          
          <div class="col-md-4">
              <div class="card card-profile">
                <div class="card">
                    <img id="blah" class="w-100" src="<?=base_url('assets/images/upload.png') ?>" />
                </div>
                <div class="card-body">
                <div class="custom-file">
                    <?php echo form_open_multipart('product/create/');?>
                    <label class="btn btn-primary btn-round" for="inputFile">Upload</label>
                    <input type="file" class="custom-file-input display-none" id="inputFile" name="img" onchange="readURL(this);" value="<?= set_value('img')?>"></input>
                </div>
              </div>
              </div>
            </div>

            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Create Product</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body m-3">
                
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Product</label>
                          <input type="text" class="form-control" name="name" value="<?= set_value('name')?>">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Detail</label>
                        <textarea class="form-control border border-success" name="detail" id="tinymceriobermano">
                        <?= set_value('detail')?>
                        </textarea><script> CKEDITOR.replace( 'ckeditorriobermano' );</script>
                        </div>
                      </div>
                      </div>

                    
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Harga</label>
                          <input type="text" value="<?= set_value('harga')?>" name="harga" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Satuan</label>
                          <input type="text" value="<?= set_value('satuan')?>" name="satuan" class="form-control">
                        </div>
                      </div>
                    </div>

                    <button type="submit" class="btn btn-primary pull-right">Save</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>

            
          </div>
        </div>
      
      <?php echo validation_errors('<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span>', '</span>
                      </div>'); ?>
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
<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
<script>
  tinymce.init({
    selector: '#tinymceriobermano'
  });
</script>