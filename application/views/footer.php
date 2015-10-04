    </div><!--body-->
</div><!--container-->

<footer class="footer">
    <div class="container">
        <h4 class="red">ỦY BAN NHÂN DÂN HUYỆN BẾN L​ỨC</h4>
        <p><strong>Chịu trách nhiệm chính: Ông Nguyễn Thành Nhân - Phó Chủ tịch Ủy ban nhân dân huyện Bến Lức.</strong></p>
        <p><strong>Địa chỉ:</strong> Số 213 QL1A Khu phố 3, Thị trấn Bến Lức, huyện Bến Lức, tỉnh Long An.</p>
        <p><strong>Điện thoại :</strong> (072) 3871201  * <strong>Fax:</strong> (072) 3872223  *<strong> Email:</strong> benluc@longan.gov.vn *<strong> Ban biên tập:</strong> bbtbenluc@longan.gov.vn​​</p>
    </div>
</footer>

<button type="button" class="btn btn-danger back-to-top">Lên đầu trang</button>

<script src="<?php echo base_url(); ?>js/jquery-2.1.4.min.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>js/masonry.pkgd.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery-scrolltofixed-min.js"></script>
<script src="<?php echo base_url(); ?>js/script.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.jtruncate.pack.js"></script>
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

<script>

    $('.row').masonry({
        // options
        itemSelector: '.col-md-6',
    });

    function goBack() {
        history.back();
    }

    jQuery(document).ready(function() {
        var offset = 220;
        var duration = 500;
        jQuery(window).scroll(function() {
            if (jQuery(this).scrollTop() > offset) {
                jQuery('.back-to-top').fadeIn(duration);
            } else {
                jQuery('.back-to-top').fadeOut(duration);
            }
        });

        jQuery('.back-to-top').click(function(event) {
            event.preventDefault();
            jQuery('html, body').animate({scrollTop: 0}, duration);
            return false;
        })
    });

    $('.header').scrollToFixed();
    $('#cssmenu').scrollToFixed();


    $(function () {
        $('[data-toggle="tooltip"]').tooltip({
            delay: { "show": 500}
        })
    });

    $('.truncate').jTruncate({
        length: 70,
    });
</script>

</body>
</html>
