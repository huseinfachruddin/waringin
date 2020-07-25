<div class="container-fluid mt-5">
<?= $this->session->flashdata('message');?>


<div class="row">

<div class="card text-center ">
  <div class="card-header bg-info">
    <h1>Slider</h1>
  </div>
  <div class="card-body">
    <div class="row d-flex justify-content-left">
            <?php
						$i=1;
						foreach ($slide as $row)
						{
	        ?>
        <div class="card col-md-2 col-4 m-0 float-right mb-3">
        <div class="panel-body w-100" style="text-align: center; overflow: hidden; padding: 0;">
          <img class="" style="max-height: 100px;" src="<?=base_url('assets/images/').$row->product_id?>">
        </div>
        <a href="<?=base_url('settings/drop/'.$row->id)?>" class="btn btn-danger pull-right">
          <i class="material-icons">close</i>Drop
        </a>
        </div>
        <?php
            $i++;
		      }
		    ?>
</div>
  <div class="card-footer text-muted m-0 pull-right">
    <button  class="btn btn-success " data-toggle="modal" data-target="#addTypeModal">
        <i class="material-icons">add</i>Upload Gambar Slide
    </button>
  </div>
</div>
</div>
</div>


<div class="row">

<div class="card text-center  ">
  <div class="card-header bg-danger">
    <h1>Hot</h1>
  </div>
  <div class="card-body">
    <div class="row d-flex justify-content-left">
            <?php
						$i=1;
						foreach ($hot as $row)
						{
	        ?>
        <div class="card col-md-2 col-4 m-0 float-right mb-3">
        <div class="panel-body w-100" style="text-align: center; overflow: hidden; padding: 0;">
    <img class="" style="max-height: 100px;" src="<?=base_url('assets/images/').$row->img?>">
  </div>
        <div class="card-body">
            <p class="card-text"><?=$row->name?></p>
        </div>
        <a href="<?=base_url('settings/drop/'.$row->id)?>" class="btn btn-danger pull-right">
          <i class="material-icons">close</i>Drop
        </a>
        </div>
        <?php
            $i++;
		}
		?>
</div>
  <div class="card-footer text-muted m-0 pull-right">
    <a href="<?=base_url('settings/create')?>" class="btn btn-success ">
        <i class="material-icons">add</i>Add Product Ke Product Hot
    </a>
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
                <?php echo form_open_multipart('settings/store_slide/2');?>
                    <div class="card card-profile">
                <div class="card-body">

                    <img id="blah" class="w-50" src="<?=base_url('assets/images/upload.png')?>" />
 
                </div>
                <div class="card-body">
                
                    
                </div>
                <div class="card-footer">
                    <label class="btn btn-primary btn-round" for="inputFile">Upload</label>
                    <input type="file" class="custom-file-input display-none" id="inputFile" name="img" onchange="readURL(this);"></input>
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