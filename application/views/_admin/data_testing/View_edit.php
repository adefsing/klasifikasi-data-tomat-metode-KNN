<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?php echo $page_name ?>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>

<!-- Main content -->
  <section class="content">
    <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo $page_name ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php echo form_open_multipart('admin/data_testing/updatelatih');?>
            <div class="row">
                <div class="col-xs-12">
                <?php
                            foreach($latihedit as $edit) :
                        ?>
                      <div class="row  ">
                          
                              <div class="form-group has-feedback">
                              <input type="hidden" name="id_latih" id="id_latih" class="form-control" value="<?= $edit->id_latih;?>" required>
                              </div>

                              <div class="form-group has-feedback">
                              <input type="hidden" name="jenis" id="jenis" class="form-control" value="<?= $edit->jenis;?>" required >
                              </div>
                          
                          <div class="col-xs-2 ">
                              <div class="form-group has-feedback">
                              <input type="number" name="area" id="area" class="form-control" value="<?= $edit->area;?>" required>
                              </div>
                          </div> 
                          <div class="col-xs-2 ">
                              <div class="form-group has-feedback">
                              <input type="number" name="perimeter" id="perimeter" class="form-control" value="<?= $edit->perimeter;?>" required>
                              </div>
                          </div> 
                          <div class="col-xs-2 ">
                              <div class="form-group has-feedback">
                              <input type="number" name="bentuk" id="bentuk" class="form-control" value="<?= $edit->bentuk;?>" required>
                              </div>
                          </div> 
                          <div class="col-xs-2 ">
                              <div class="form-group has-feedback">
                              <input type="number" name="G0_kontras" id="G0_kontras" class="form-control" value="<?= $edit->G0_kontras;?>" required>
                              </div>
                          </div> 
                          <div class="col-xs-2 ">
                              <div class="form-group has-feedback">
                              <input type="number" name="G45_kontras" id="G45_kontras" class="form-control" value="<?= $edit->G45_kontras;?>" required>
                              </div>
                          </div> 
                          <div class="col-xs-2 ">
                              <div class="form-group has-feedback">
                              <input type="number" name="G90_kontras" id="G90_kontras" class="form-control" value="<?= $edit->G90_kontras;?>" required>
                              </div>
                          </div> 
                          <div class="col-xs-2 ">
                              <div class="form-group has-feedback">
                              <input type="number" name="G135_kontras" id="G135_kontras" class="form-control" value="<?= $edit->G135_kontras;?>" required>
                              </div>
                          </div> 
                      </div>
                    <?php 
                      endforeach;
                    ?>
                    <br>
                    <div class="row">
                        <div class="col-xs-12">
                            <input id="" type="text" name="id_latih" value="<?php echo $edit->id_latih ?>"  hidden readonly />
                            <button type="submit" class="pull-right btn btn-sm btn-primary ">
                                <i class="ace-icon fa fa-paper-plane"></i>
                                <span class="bigger-110">Submit</span>
                            </button>  
                        </div>
                    </div>
                </div>
            </div>
                <?php echo form_close()?>
            </div>
      </div>
    </div>
  </section>
</div>