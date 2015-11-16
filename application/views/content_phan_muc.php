<div class="col-lg-12">
    <ol class="breadcrumb">
        <li>
            <a href="<?php echo base_url(); ?>trang_chu"><i class="fa fa-home"></i> Trang chủ</a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>tu_phap"><i class="fa fa-files-o"></i> Hành chính tư pháp</a>
        </li>
        <li class="active">
        <?php
        $dataname=array('Chứng thực','Khai sinh','Khai tử','Kết hôn','Giám hộ','Hộ tịch','Các thủ tục còn lại','Search');
        echo '<i class="fa fa-file-o"></i> '.$dataname[$name-1].'';?>
        </li>
    </ol>
    <h3 class="page-header marTop"><i class="fa fa-file-o"></i>
        <?php
        echo ''.$dataname[$name-1].'';?>
    </h3>
</div><!-- /.col-lg-12 -->
<div class="col-md-9 col-lg-9 col-xs-12">
    <div class="masonry">

    <?php foreach ($com as $stt =>$id) {
        echo ' <div class="col-md-6 col-xs-12 marBot">
                    <a href="'.base_url('tu_phap_chi_tiet/'.$name.'/'.html_escape($stt).'').'" data-toggle="tooltip" data-placement="top" title="'.html_escape($id).'">
                        <button type="button" class="btn btn-outline btn-primary btn-block custom">
                            <h5 class="truncate"> '.html_escape($id).' </h5>
                        </button>
                    </a>
                </div> ';
    }  ?>

</div>
</div>