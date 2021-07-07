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
        <?php echo form_open_multipart(); ?>
        <div class="row">
          <div class="col-xs-12">
            <?php
            $a = array(1);
            $ind = 0;
            foreach ($files as $file) :
            ?>
              <div class="row  ">
                <div class="col-xs-2 ">
                  <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Area" name="area[<?php echo $ind ?>]" value="<?php echo set_value("area[$ind]"); ?>" />
                    <span style="color:red"><?php echo form_error("area[$ind]"); ?></span>
                  </div>
                </div>
                <div class="col-xs-2 ">
                  <div class="form-group has-feedback">
                    <input type="number" step="any" class="form-control" placeholder="Perimeter" name="perimeter[<?php echo $ind ?>]" value="<?php echo set_value("perimeter[$ind]"); ?>" />
                    <span style="color:red"><?php echo form_error("perimeter[$ind]"); ?></span>
                  </div>
                </div>
                <div class="col-xs-2 ">
                  <div class="form-group has-feedback">
                    <input type="number" step="any" class="form-control" placeholder="Bentuk" name="bentuk[<?php echo $ind ?>]" value="<?php echo set_value('bentuk[' . $ind . ']'); ?>" />
                    <span style="color:red"><?php echo form_error('bentuk[' . $ind . ']'); ?></span>
                  </div>
                </div>
                <div class="col-xs-2 ">
                  <div class="form-group has-feedback">
                    <input type="number" step="any" class="form-control" placeholder="G0_Kontras" name="G0_kontras[<?php echo $ind ?>]" value="<?php echo set_value('G0_kontras[' . $ind . ']'); ?>" />
                    <span style="color:red"><?php echo form_error('G0_kontras[' . $ind . ']'); ?></span>
                  </div>
                </div>
                <div class="col-xs-2 ">
                  <div class="form-group has-feedback">
                    <input type="number" step="any" class="form-control" placeholder="G45_Kontras" name="G45_kontras[<?php echo $ind ?>]" value="<?php echo set_value('G45_kontras[' . $ind . ']'); ?>" />
                    <span style="color:red"><?php echo form_error('G45_kontras[' . $ind . ']'); ?></span>
                  </div>
                </div>
                <div class="col-xs-2 ">
                  <div class="form-group has-feedback">
                    <input type="number" step="any" class="form-control" placeholder="G90_Kontras" name="G90_kontras[<?php echo $ind ?>]" value="<?php echo set_value('G90_kontras[' . $ind . ']'); ?>" />
                    <span style="color:red"><?php echo form_error('G90_kontras[' . $ind . ']'); ?></span>
                  </div>
                </div>
                <div class="col-xs-2 ">
                  <div class="form-group has-feedback">
                    <input type="number" step="any" class="form-control" placeholder="G135_Kontras" name="G135_kontras[<?php echo $ind ?>]" value="<?php echo set_value('G135_kontras[' . $ind . ']'); ?>" />
                    <span style="color:red"><?php echo form_error('G135_kontras[' . $ind . ']'); ?></span>
                  </div>
                </div>
              </div>
            <?php
              $ind++;
            endforeach;
            ?>
            <br>
            <div class="row">
              <div class="col-xs-12">
                <input id="" type="text" name="id_latih" value="<?php echo $file->id_latih ?>" hidden readonly />
                <button type="submit" class="pull-right btn btn-sm btn-primary ">
                  <i class="ace-icon fa fa-paper-plane"></i>
                  <span class="bigger-110">Submit</span>
                </button>
              </div>
            </div>
          </div>
        </div>
        <?php echo form_close() ?>
      </div>
    </div>
</div>
</section>
</div>