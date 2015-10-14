<div class="col-xs-9 col-md-10 pad2" id="chi_tiet">
    <ul id="breadcrumb">
    <?php     
    echo '<li><a href="'.site_url('home').'"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a> </li>
        <li><a href="'.site_url('hanh_chinh_tu_phap').'"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Hành chính tư pháp</a></li>
        <li><a href=""><span class="glyphicon glyphicon-file" aria-hidden="true"></span> '.$data1.'</a></li>
    ';?>
    </ul>
    <div class="row center">

          <?php foreach ($com as $stt =>$id) {
            header('Content-Type: text/html; charset=utf-8');
            ini_set('default_charset', 'utf-8');
                echo ' <div class="col-xs-12 col-md-6">
                            <a href="'.site_url('trang_chi_tiet/index/'.$data1.'/'.html_escape($stt).'').'" class="thumbnail" data-toggle="tooltip" data-placement="top" title="'.html_escape($id).'">
                                <h3 class="truncate"> '.html_escape($id).' </h3>
                            </a>
                        </div> ';
          }  ?>

    </div>
</div>
