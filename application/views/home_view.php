<div class="col-xs-9 col-md-10 pad2" id="chi_tiet">
    <div class="row center">

       <?php foreach ($com as $stt =>$id) {
          	if ($stt==1)$val ='hanh_chinh_tu_phap';
          	else $val ='hanh_chinh_dat_dai';
            echo ' <div class="col-xs-12 col-md-6">

                            <a href="'.base_url().''.$val.'" class="thumbnail" data-toggle="tooltip" data-placement="top" title="'.html_escape($id).'">
                                <h3> '.html_escape($id).' </h3>
                            </a>
                        </div> ';
          }  ?>

    </div>
</div>