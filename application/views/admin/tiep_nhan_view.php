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
                <th></th>

            </tr>
            <form class="input-group" id="sent_noti_node">
            <?php
            foreach ($query->result() as $row){
              echo '<div class="row col-xs-9 col-md-10 pad2"><tr>
              <td><a href="'.base_url().'Admin/Xem_ho_so/details/'.$row->id.'">
                <h5 class="truncate">'.$row->mshs.' </h5></a></td>
              <td> '.$row->name.'</td>
              <td>'.$row->cmnd.'</td>';
                if($row->status==0)       
             echo' <td><button type="button" class="btn btn-warning"
                 onclick=location.href="'.base_url().'admin/Admin_tiep_nhan/edit/'.$row->id.'">Chỉnh sửa</button></td>
              <td><button class="btn btn-danger" type="submit"
                 onclick=location.href="'.base_url().'admin/Admin_tiep_nhan/edit_stt/'.html_escape($row->id).'">Chuyển phòng ban</button></td>
              </tr></div>';
                if($row->status==1)        
              echo '
              <td>Đang chờ chuyển hồ sơ</td>
              <td></td>
              </tr></div>';

            }
            ?>
          </form>
        </table>
    </section>

    <!--?php echo $this->pagination->create_links(); ?-->

</div><!-- /.col-lg-12 -->
