    <div class="col-xs-9 col-md-10" id="chi_tiet">

<div class="row center">

      <?php foreach ($com as $stt =>$id) {
            echo ' <div class="col-xs-12 col-md-4">
                        <a href="'.base_url().'trang_chi_tiet/index/'.html_escape($stt).'" class="thumbnail">
                            <h3> '.html_escape($id).'
                            </h3>
                        </a>
                    </div> ';
      }  ?>

</div>
</div>
