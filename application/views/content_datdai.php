
<div class="col-xs-9 col-md-10 pad2" id="chi_tiet">
    <div class="row center">

          <?php foreach ($com as $stt =>$id) {
                echo ' <div class="col-xs-12 col-md-6">
                            <a href="'.base_url().'hanh_chinh_dat_dai/thutuc'.html_escape($stt).'" class="thumbnail" data-toggle="tooltip" data-placement="top" title="'.html_escape($id).'">
                                <h3> '.html_escape($id).' </h3>
                            </a>
                        </div> ';
          }  ?>

    </div>
</div>
<!--
<div class="col-xs-9 col-md-10 pad2" id="chi_tiet">
    <div class="row center">
        <div class="col-xs-12 col-md-6">
            <a href="<?php echo base_url(); ?>hanh_chinh_dat_dai/thutuc1" class="thumbnail" data-toggle="tooltip" data-placement="top" title="">
                <h3><?php echo $t1; ?></h3>
            </a>
        </div>
        <div class="col-xs-12 col-md-6">
            <a href="<?php echo base_url(); ?>hanh_chinh_dat_dai/thutuc2" class="thumbnail" data-toggle="tooltip" data-placement="top" title="">
                <h3><?php echo $t2; ?></h3>
            </a>
        </div>
        <div class="col-xs-12 col-md-6">
            <a href="<?php echo base_url(); ?>hanh_chinh_dat_dai/thutuc3" class="thumbnail" data-toggle="tooltip" data-placement="top" title="">
                <h3><?php echo $t3; ?></h3>
            </a>
        </div>
        <div class="col-xs-12 col-md-6">
            <a href="<?php echo base_url(); ?>hanh_chinh_dat_dai/thutuc4" class="thumbnail" data-toggle="tooltip" data-placement="top" title="">
                <h3><?php echo $t4; ?></h3>
            </a>
        </div>
        <div class="col-xs-12 col-md-6">
            <a href="<?php echo base_url(); ?>hanh_chinh_dat_dai/thutuc5" class="thumbnail" data-toggle="tooltip" data-placement="top" title="">
                <h3><?php echo $t5; ?></h3>
            </a>
        </div>
        <div class="col-xs-12 col-md-6">
            <a href="<?php echo base_url(); ?>hanh_chinh_dat_dai/thutuc6" class="thumbnail" data-toggle="tooltip" data-placement="top" title="">
                <h3><?php echo $t6; ?></h3>
            </a>
        </div>
    </div>
</div>-->