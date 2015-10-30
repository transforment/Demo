<div class="col-xs-9 col-md-10 pad2" id="chi_tiet">
    <section class="panel">
        <table class="table">
            <tr>
                <th>STT</th>
                <th>Mã số hồ sơ</th>
                <th>Người nộp </th>
                <th>Ngày nhận</th>
                <th>Hẹn trả  </th>
                <th>Trạng thái</th>


            </tr>
            <?php
            $i = 1;



            foreach ($query->result() as $row){

                if($row->status==0) $arr='Đang ở bàn tiếp nhận';
                else if($row->status==1)  $arr='Đang chờ xử lý';
                else if($row->status==2)  $arr='Đang xử lý';
                else if($row->status==3)  $arr='Đã xử lý';
                else if($row->status==4)  $arr='Đang ở bàn trả dân';
                else $arr='Hồ sơ hoàn tất';
                echo '<div class="row col-xs-9 col-md-10 pad2"><tr>
                        <td> '.$i.'</td>
    					<td><a href="'.base_url().'Xem_ho_so/details/'.$row->id.'">
                  <h5 class="truncate">'.$row->mshs.' </h5></a></td>
                  <td>'.$row->name.'</td>

    					<td> '. $ngay_nhan .'</td>

    					<td>'.$ngay_tra.'</td>
    					<td>'.$arr.'</td>
    					</tr></div>';
                $i++;

            }

            ?>
        </table>
    </section>
    <!--?php echo $this->pagination->create_links(); ?-->
</div>