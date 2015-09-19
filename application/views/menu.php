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
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo base_url();?>home">
                     <span class="glyphicon glyphicon-home" aria-hidden="true"></span> TRANG CHỦ</a></li>
                    

                <li><a href="<?php echo base_url();?>hanh_chinh_tu_phap">HÀNH CHÍNH TƯ PHÁP</a></li>

                <?php 
                 if (isset($_SESSION['name_user']))
                    {
                  echo '<li><a href="'.base_url().'add">
                  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> THÊM MỤC</a></li>';
                    echo ' <li><a href="'.base_url().'edit">
                     <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> SỬA MỤC</a></li>';
              
                    }
                    ?>
            </ul>
            <div class="nav navbar-right" >
                <div class="input-group">
            <?php 
            if (isset($_SESSION['name_user']))
             {
                echo '<a class="text_user" >Chào  '.$_SESSION['name_user'].'</a>';
              echo '   <button type="button" class="btn btn-danger btn-log " onClick=location.href="'.base_url().'admin/logout">
              <span class="glyphicon glyphicon-off " aria-hidden="true"></span> Đăng xuất</button>';

                }
                ?>
            </div>
            </div>
        </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
</nav><!-- /.navbar -->


<div class="pad" id="bodykkk">
    <div class="col-xs-3 col-md-2"id='cssmenu'>
    <div id="sidebar-wrapper">
         <button type="button" class="btn btn-primary" onclick="goBack()">
    <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Về trang trước</button>
        <div id='cssmenu'>
            <ul>
                <li><a href="<?php echo base_url();?>home">
                    <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Trang chủ</a></li>
                <li><a href='#'><span>Giới thiệu</span></a></li>
                <li class='has-sub'><a href="#"><span>Hành chính tư pháp</span></a>
                    <ul>
                        <li><a href="<?php echo base_url();?>phan_muc/index/1"><span>Chức thực</span></a></li>
                        <li><a href="<?php echo base_url();?>phan_muc/index/2"><span>Khai sinh</span></a></li>
                        <li><a href="<?php echo base_url();?>phan_muc/index/3"><span>Khai tử</span></a></li>
                        <li><a href="<?php echo base_url();?>phan_muc/index/4"><span>Kết hôn</span></a></li>
                        <li><a href="<?php echo base_url();?>phan_muc/index/5"><span>Giám hộ</span></a></li>
                        <li><a href="<?php echo base_url();?>phan_muc/index/6"><span>Hộ tịch</span></a></li>
                        <li><a href="<?php echo base_url();?>phan_muc/index/7"><span>Xem tất cả</span></a></li>
                    </ul>
                </li>
                <li class='last'><a href='#'><span>Liên hệ</span></a></li>
            </ul>
        </div>
      </div>
    </div>


