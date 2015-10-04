<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="navbar" class="collapse navbar-collapse pad-nav">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo base_url();?>home">
                     <span class="glyphicon glyphicon-home" aria-hidden="true"></span> TRANG CHỦ</a></li>
                <li><a href="<?php echo base_url();?>hanh_chinh_tu_phap">
                        <span class="glyphicon glyphicon-file" aria-hidden="true"></span> HÀNH CHÍNH TƯ PHÁP</a></li>
                <li><a href="<?php echo base_url();?>hanh_chinh_dat_dai">
                        <span class="glyphicon glyphicon-file" aria-hidden="true"></span>  HÀNH CHÍNH ĐẤT ĐAI</a></li>

                <?php 
                if((isset($_SESSION['name_user']))&&
                    ($_SESSION['level']==1)){
                  echo '<li><a href="'.base_url().'Ho_so_da_tao">
                  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Hồ sơ đã nhận</a></li>';
                    } 
                if((isset($_SESSION['name_user']))&&
                    ($_SESSION['level']==2)){
                  echo '<li><a href="'.base_url().'admin_phong_ban">
                  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Hồ sơ cần xử lý</a></li>';
                    } 
                if((isset($_SESSION['name_user']))&&
                    ($_SESSION['level']==3)){
                  echo '<li><a href="'.base_url().'admin_tra_ho_so">
                  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Hồ sơ cần trả dân</a></li>';
                    }                                   
                if((isset($_SESSION['name_user']))&&
                    ($_SESSION['level']==4)){
                  echo '<li><a href="'.base_url().'add">
                  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> THÊM MỤC</a></li>';
                    echo ' <li><a href="'.base_url().'edit">
                     <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> SỬA MỤC</a></li>';
              
                    }

                    ?>
            </ul>

            <div class="nav navbar-right mar-log" >

            <?php 
            if (isset($_SESSION['name_user']))
             {
                echo '<a class="text_user">Chào  '.$_SESSION['name_user'].'</a>';
                echo '<button type="button" class="btn btn-danger btn-log" onClick=location.href="'.base_url().'Admin/logout">
                      <span class="glyphicon glyphicon-off " aria-hidden="true"></span> Đăng xuất</button>';
             }
             ?>

            </div>
        </div><!-- /.nav-collapse -->
        <form class="col-md-6 col-xs-12 pad-search mar" role="search" method="post"action="<?php echo base_url();?>phan_muc/index/7">
                <div class="input-group">
                    <input type="text" class="form-control" name ="key_search" placeholder="Gõ tên giấy tờ muốn cấp">
                    <span class="input-group-btn"><button class="btn btn-default" type="submit">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span></button></span>
                </div><!-- /input-group -->
        </form>
        <form class="col-md-6 col-xs-12 pad-search mar" role="search" method="post"action="<?php echo base_url();?>Xem_ho_so">
                <div class="input-group">
                    <input type="text" class="form-control" name ="num_search" placeholder="Gõ mã số hồ sơ">
                    <span class="input-group-btn"><button class="btn btn-default" type="submit">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span></button></span>
                </div><!-- /input-group -->
        </form>
    </div><!-- /.container -->
</nav><!-- /.navbar -->


<div class="pad" id="bodykkk">
    <div class="col-xs-3 col-md-2"id='cssmenu'>
    <div id="sidebar-wrapper">
         <button type="button" class="btn btn-danger mar" onclick="goBack()">
            <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Về trang trước</button>
        <div id='cssmenu'>
            <ul>
                <li><a href="<?php echo base_url();?>home">
                    <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Trang chủ</a></li>
                <li><a href='#'><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Giới thiệu</a></li>
                <li class='has-sub'><a href="#"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Hành chính tư pháp</a>
                    <ul>
                        <li><a href="<?php echo base_url();?>phan_muc/index/1"><span>Chứng thực</span></a></li>
                        <li><a href="<?php echo base_url();?>phan_muc/index/2"><span>Khai sinh</span></a></li>
                        <li><a href="<?php echo base_url();?>phan_muc/index/3"><span>Khai tử</span></a></li>
                        <li><a href="<?php echo base_url();?>phan_muc/index/4"><span>Kết hôn</span></a></li>
                        <li><a href="<?php echo base_url();?>phan_muc/index/5"><span>Giám hộ</span></a></li>
                        <li><a href="<?php echo base_url();?>phan_muc/index/6"><span>Hộ tịch</span></a></li>
                        <li><a href="<?php echo base_url();?>phan_muc/index/9"><span>Các mục còn lại</span></a></li>
                    </ul>
                </li>
                <li><a href="<?php echo base_url();?>hanh_chinh_dat_dai">
                        <span class="glyphicon glyphicon-file" aria-hidden="true"></span> Hành chính đất đai</a>
                <li><a href='#'><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Liên hệ</a></li>
            </ul>
        </div>
      </div>
    </div>


