<div class="col-xs-9 col-md-10 pad2" id="chi_tiet">
    <ul id="breadcrumb">
        <li><a href="/Demo/home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a> </li>
        <li><a href="/Demo/hanh_chinh_tu_phap"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Hành chính tư pháp</a></li>
        <li><a href=""><span class="glyphicon glyphicon-file" aria-hidden="true"></span> $ten_muc</a></li>
    </ul>
    <div class="row center">

          <?php foreach ($com as $stt =>$id) {
                echo ' <div class="col-xs-12 col-md-6">
                            <a href="'.base_url().'trang_chi_tiet/index/'.html_escape($stt).'" class="thumbnail" data-toggle="tooltip" data-placement="top" title="'.html_escape($id).'">
                                <h3 class="truncate"> '.html_escape($id).' </h3>
                            </a>
                        </div> ';
          }  ?>

    </div>
</div>
