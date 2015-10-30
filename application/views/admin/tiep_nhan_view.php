<div class="col-lg-12">
    <ol class="breadcrumb">
        <li>
            <a href="<?php echo base_url('trang_chu'); ?>">
                <i class="fa fa-home"></i> Trang chủ
            </a>
        </li>
        <li class="active">
            <i class="fa fa-plus"></i> Hồ sơ đã nhận
        </li>
    </ol>
    <h3 class="page-header marTop"><i class="fa fa-plus"></i> Hồ sơ đã nhận</h3>

    <section class="panel">
        <table class="table">
            <tr>
                <th>Mã số hồ sơ</th>
                <th>Tên</th>
                <th>Số CMND</th>
                <th></th>
                <th>Trạng thái</th>

            </tr>
            <?php
            foreach ($query->result() as $row){
                if($row->status==0) $arr='Đang ở bàn tiếp nhận';
                else if($row->status==1)  $arr='Đang chờ xử lý';
                else if($row->status==2)  $arr='Đang xử lý';
                else if($row->status==3)  $arr='Đã xử lý';
                else if($row->status==4)  $arr='Đang ở bàn trả dân';
                else $arr='Hồ sơ hoàn tất';
                echo '<div class="row col-xs-9 col-md-10 pad2"><tr>
                  <td><a href="'.base_url('admin/xem_ho_so/details/'.$row->id.'').'">
                    <h5>'.$row->mshs.' </h5></a></td>
                  <td> '.$row->name.'</td>
                  <td>'.$row->cmnd.'</td>
                  <td><button type="button" class="btn btn-warning"
                     onclick=location.href="'.base_url('admin/ho_so_da_tao/edit/'.$row->id.'').'">Chỉnh sửa</button></td>
                  <td><button type="button" class="btn btn-danger"
                     onclick=location.href="'.base_url('admin/ho_so_da_tao/edit_stt/'.html_escape($row->id).'').'">Chuyển phòng ban</button></td>
                  </tr></div>';
            }
            ?>
        </table>
    </section>
    <?php echo $this->pagination->create_links(); ?>

</div><!-- /.col-lg-12 -->
