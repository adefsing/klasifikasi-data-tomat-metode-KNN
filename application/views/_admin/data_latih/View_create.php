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
        <?php echo form_open_multipart(); ?>
        <?php
        $a = array(1, 1, 1, 1, 1);
        $ind = 0;
        foreach ($a as $d) :
        ?>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"> Data Ke-<?php echo $ind + 1 ?></h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-4 ">
                                    <div class="form-group ">
                                        <input type="text" class="form-control" placeholder="Area" name="area[<?php echo $ind ?>]" value="<?php echo set_value("area[$ind]"); ?>" />
                                        <span style="color:red"><?php echo form_error("area[$ind]"); ?></span>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group has-feedback">
                                        <input type="number" step="any" class="form-control" placeholder="Perimeter" name="perimeter[<?php echo $ind ?>]" value="<?php echo set_value("perimeter[$ind]"); ?>" />
                                        <span style="color:red"><?php echo form_error("perimeter[$ind]"); ?></span>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group has-feedback">
                                        <input type="number" step="any" class="form-control" placeholder="Bentuk" name="bentuk[<?php echo $ind ?>]" value="<?php echo set_value('bentuk[' . $ind . ']'); ?>" />
                                        <span style="color:red"><?php echo form_error('bentuk[' . $ind . ']'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-3">
                                    <div class="form-group has-feedback">
                                        <input type="number" step="any" class="form-control" placeholder="G0_Kontras" name="G0_kontras[<?php echo $ind ?>]" value="<?php echo set_value('G0_kontras[' . $ind . ']'); ?>" />
                                        <span style="color:red"><?php echo form_error('G0_kontras[' . $ind . ']'); ?></span>
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div class="form-group has-feedback">
                                        <input type="number" step="any" class="form-control" placeholder="G45_Kontras" name="G45_kontras[<?php echo $ind ?>]" value="<?php echo set_value('G45_kontras[' . $ind . ']'); ?>" />
                                        <span style="color:red"><?php echo form_error('G45_kontras[' . $ind . ']'); ?></span>
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div class="form-group has-feedback">
                                        <input type="number" step="any" class="form-control" placeholder="G90_Kontras" name="G90_kontras[<?php echo $ind ?>]" value="<?php echo set_value('G90_kontras[' . $ind . ']'); ?>" />
                                        <span style="color:red"><?php echo form_error('G90_kontras[' . $ind . ']'); ?></span>
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div class="form-group has-feedback">
                                        <input type="number" step="any" class="form-control" placeholder="G135_Kontras" name="G135_kontras[<?php echo $ind ?>]" value="<?php echo set_value('G135_kontras[' . $ind . ']'); ?>" />
                                        <span style="color:red"><?php echo form_error('G135_kontras[' . $ind . ']'); ?></span>
                                    </div>
                                </div>
                                <!-- <div class="col-xs-3">
                                    <div class="form-group has-feedback">
                                        <input type="number" step="any" class="form-control" placeholder="Jenis" name="jenis[<?php echo $ind ?>]" value="1" />
                                        <span style="color:red"><?php echo form_error('jenis[' . $ind . ']'); ?></span>
                                    </div>
                                </div> -->
                                <div class="col-xs-3">
                                <div class="form-group has-feedback">
                                <select step="any" class="form-control" name="jenis[<?php echo $ind ?>]">
                                <option> Pilih Jenis</option>
                                    <option value="0">Busuk</option>
                                    <option value="1">Spek</option>
                                     <option value="3">Retak</option>
                                     </select>
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php
            $ind++;
        endforeach;
        ?>
        <div class="box">
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="pull-right btn btn-sm btn-primary ">
                            <i class="ace-icon fa fa-paper-plane"></i>
                            <span class="bigger-110">Submit</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <?php echo form_close() ?>
    </section>
</div>