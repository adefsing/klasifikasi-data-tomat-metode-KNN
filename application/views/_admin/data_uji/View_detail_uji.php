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
    <!-- alert  -->
    <?php
    if ($this->session->flashdata('info')) {
        if ($this->session->flashdata('info')['from']) {
            echo "
            <div class=' alert alert-success alert-dismissible'>
            <h4><i class='icon fa fa-globe'></i> Information!</h4>" .
                $this->session->flashdata('info')["message"] .
                "</div>
            ";
        } else {
            echo "
            <div class='alert alert-danger alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <h4><i class='icon fa fa-ban'></i> Alert!</h4>" .
                $this->session->flashdata('info')["message"] .
                "</div>
            ";
        }
    }
    ?>
    <!-- alert  -->
    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"> Pengujian Jarak </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="tableDocument" class="table table-striped table-bordered table-hover">
                        <thead class="thin-border-bottom">
                            <tr>
                                <th style="width:50px">No</th>
                                <th>id_uji</th>
                                <th>Jarak</th>
                                <th>Jenis </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($distances as $file) :
                            ?>
                                <tr>
                                    <td>
                                        <?php echo $no ?>
                                    </td>
                                    <td>
                                        <?php echo $file['id_uji']  ?>
                                    </td>
                                    <td>
                                        <?php echo $file['distance'] ?>
                                    </td>
                                    <td>

                                        <!-- ( $file->data_label == 1 )? "LULUS" : ( ( $file->data_label == 0 )? "TIDAK LULUS" : "BELUM DI UJI"   ) -->
                                        <?php
                                        if ($file['jenis'] == 0) {
                                            echo "Busuk";
                                        } elseif ($file['jenis'] == 1) {
                                            echo "Retak";
                                        } elseif ($file['jenis'] == 2) {
                                            echo "Spek";
                                        } else {
                                            echo "BELUM DIUJI";
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php
                                $no++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"> KNN </h3><br>
                <h3 class="box-title"> Nilai K : <?php echo $K_VALUE ?> </h3>
            </div>
            <!-- /.box-header -->
            <?php foreach (array_keys($NEIGHBOURS) as $paramName) : ?>
                <div class="box-body">
                    <h3 class="box-title"> Tetangga pada label "<?php echo ($paramName == 2) ? "Spek" : (($paramName == 1) ? "Retak" : (($paramName == 0) ? "Busuk" : "BELUM DI UJI"))  ?>" </h3><br>
                    <div class="table-responsive">
                        <table id="tableDocument" class="table table-striped table-bordered table-hover">
                            <thead class="thin-border-bottom">
                                <tr>
                                    <th style="width:50px">No</th>
                                    <th>id_uji</th>
                                    <th>Jarak</th>
                                    <th>Jenis </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($NEIGHBOURS[$paramName]  as $file) :
                                    $file = (object) $file;
                                ?>
                                    <tr>
                                        <td>
                                            <?php echo $no ?>
                                        </td>
                                        <td>
                                            <?php echo $file->id_uji  ?>
                                        </td>
                                        <td>
                                            <?php echo $file->distance ?>
                                        </td>
                                        <td>
                                        <?php echo ($file->jenis == 1) ? "Retak" : (($file->jenis == 0) ? "Busuk" : (($file->jenis == 2) ? "Spek" : "BELUM DI UJI")) ?>
                                            </td>
                                        </td>
                                    </tr>
                                <?php
                                    $no++;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endforeach; ?>



        </div>

        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?php echo $page_name ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="tableDocument" class="table table-striped table-bordered table-hover">
                        <thead class="thin-border-bottom">
                            <tr>
                                <th style="width:50px">No</th>
                                <th>id_uji</th>
                                <th>area</th>
                                <th>perimeter</th>
                                <!-- <th style="background-color:green" >Gaji Orang Tua</th> -->
                                <th>bentuk</th>
                                <th>G0_kontras</th>
                                <th>G45_kontras</th>
                                <th>G90_kontras</th>
                                <th>G135_kontras</th>
                                <th>Jenis</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($data_uji as $file) :
                            ?>
                                <tr>
                                    <td>
                                        <?php echo $no ?>
                                    </td>
                                    <td>
                                        <?php echo $file->id_uji  ?>
                                    </td>
                                    <td>
                                        <?php echo $file->area ?>
                                    </td>
                                    <td>
                                        <?php echo $file->perimeter ?>
                                    </td>
                                    <td>
                                        <?php echo $file->bentuk ?>
                                    </td>
                                    <td>
                                        <?php echo $file->G0_kontras ?>
                                    </td>
                                    <td>
                                        <?php echo $file->G45_kontras ?>
                                    </td>
                                    <td>
                                        <?php echo $file->G90_kontras ?>
                                    </td>
                                    <td>
                                        <?php echo $file->G135_kontras ?>
                                    </td>
                                    <td>
                                    <?php echo ($file->jenis == 1) ? "Retak" : (($file->jenis == 0) ? "Busuk" : (($file->jenis == 2) ? "Spek" : "BELUM DI UJI")) ?>
                                         </td>
                                    </td>
                                </tr>
                            <?php
                                $no++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>
</div>