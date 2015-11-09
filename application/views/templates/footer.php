        <form class="input-group" id="changeto1">
             <button class="btn btn-warning btn-sm" id="btn_send_mess"type="submit">
                             Gửi tin nhắn</button>

             <button class="btn btn-warning btn-sm" id="btn_send_mess"type="submit">
                             Gửi tin nhắn</button>
    </form>
</div><!-- /.row -->
</div><!-- /#page-wrapper -->
</div><!-- /#wrapper -->

<button type="button" class="btn btn-danger back-to-top radius">Lên đầu trang</button>

<script src="<?php echo base_url('js/jquery.min.js'); ?>"></script><!-- jQuery -->
<script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script><!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url('js/jasny-bootstrap.min.js'); ?>"></script><!-- Jasny Bootstrap Core JavaScript -->
<script src="<?php echo base_url('js/metisMenu.min.js'); ?>"></script><!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url('js/jtruncate.js'); ?>"></script><!-- Truncate JavaScript -->
<script src="<?php echo base_url('js/masonry.min.js'); ?>"></script><!-- Masonry JavaScript -->
<script src="<?php echo base_url('js/demo-2.js'); ?>"></script><!-- Custom Theme JavaScript -->
<script src="<?php echo base_url('js/jquery.amaran.min.js'); ?>"></script><!-- Amaran jQuery -->


<!-- Kiet JavaScript -->
<script src="<?php echo base_url('js/yingjie.js'); ?>"></script>
<script src="<?php echo base_url('js/bootstrap-select.min.js'); ?>"></script>
<script src="<?php echo base_url(); ?>js/node_modules/socket.io/node_modules/socket.io-client/dist/socket.io.js"></script>
<script src="<?php echo base_url(); ?>js/nodeClient.js"></script>
    <script src="<?php echo base_url(); ?>js/bootbox.min.js"></script>
<script>
    $('#Start_Notification').on('click',function(){
        $.amaran({
            'theme'     :'colorful',
            'content'   :{
                bgcolor:'#27ae60',
                color:'#fff',
                message:'Lorem ipsum dolor sit amet',
            },
            'position'  :'bottom left',
            'inEffect' :'slideLeft',
            'outEffect' :'slideLeft',
            'delay' : 5000
        });
    });
</script>

</body>
</html>