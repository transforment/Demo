<div class="col-lg-12">
    <ol class="breadcrumb">
        <li>
            <a href="<?php echo base_url('trang_chu'); ?>"><i class="fa fa-home"></i> Trang chủ</a>
        </li>
        <li class="active">
            <i class="fa fa-files-o"></i> Hành chính tư pháp
        </li>
    </ol>
    <h3 class="page-header marTop">Hành chính tư pháp</h3>
</div><!-- /.col-lg-12 -->
<div class="col-md-9 col-lg-9 col-xs-12">
    <div class="masonry">
<?php foreach ($dataname as $stt =>$id) {
$a=$stt+1;
echo '<div class="col-lg-6 col-md-6 marBot">
    <a href="'.base_url('phan_muc/'.$a.'').'" data-toggle="tooltip" data-placement="top" title="'.$id.'">
        <button type="button" class="btn btn-outline btn-primary btn-block custom">
            <h5>'.$id.'</h5>
        </button>
    </a>
</div>';

} ?>
</div>
</div>