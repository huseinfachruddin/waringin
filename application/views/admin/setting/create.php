
<div class="container-fluid mt-5">

<div class="row">
        <?= $this->session->flashdata('message');?>
        <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title ">Pilih product untuk di tambahkan</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  <form  method="post" action="" class="navbar-form col-8">
                    <div class="input-group no-border">
                        <input name="key" type="text" value="<?= $key?>" class="form-control" placeholder="Search...">
                        <button type="submit" class="btn btn-white btn-round btn-just-icon">
                        <i class="material-icons">search</i>
                        <div class="ripple-container"></div>
                        </button>
                    </div>
                </form>
                <div class="container">
                <div class="row mt-5">
                <?php
						$i=1;
						foreach ($product as $row)
						{
	        ?>
        <div class="card col-md-2 col-4 p-0 mb-3">
        <div class="panel-body w-100" style="text-align: center; overflow: hidden; padding: 0;">
    <img class="" style="max-height: 100px;" src="<?=base_url('assets/images/').$row->img?>">
  </div>
        <div class="card-body">
            <p class="card-text"><?=$row->name?></p>
        </div>
        <a href="<?=base_url('settings/store/').$row->id.'/1'?>" class="btn btn-success">Add</a>
        </div>
        <?php
            $i++;
		    }?>
                <table class="table table-sm table-dark">
  <thead>
    <tr class="bg-success">
      <th scope="col text-center">Img</th>
      <th scope="col">product</th>
      <th scope="col">Category</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  <?php
						$i=1;
						foreach ($table as $row)
						{
						?>
                        <tr>
                          <td class="text-center">
                          
                          </td>
                          <td>
                          <?= cetak($row->name)?>
                          </td>
                          <td>
                          <?= cetak($row->category)?>
                          </td>
                          <td class="td-actions text-right">
                          <a href="<?=base_url('settings/store/').$row->id.'/1'?>" class="btn btn-success">Add</a>
                          </td>
                        </tr>
                        <?php
                        $i++;
						}
						?>
  </tbody>
                  </div>
                </div>
              </div>
            </div>
            </div>
            </div>
    
