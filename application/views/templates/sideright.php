<div class="col-md-3 col-lg-3 col-xs-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-bell fa-fw"></i> Notifications Panel
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="list-group">

                <a href="#" class="list-group-item">
                    <i class="fa fa-shopping-cart fa-fw"></i> New Order Placed
                                <span class="pull-right text-muted small"><em>9:49 AM</em>
                                </span>
                </a>
                <a href="#" class="list-group-item">
                    <i class="fa fa-money fa-fw"></i> Payment Received
                                <span class="pull-right text-muted small"><em>Yesterday</em>
                                </span>
                </a>
            </div>
            <!-- /.list-group -->
            <a href="#" class="btn btn-default btn-block">View All Alerts</a>
        </div>
        <!-- /.panel-body -->
    </div>
<?php 
        if(isset($_SESSION['name_user']))
        {
        echo '   
         <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-bell fa-fw"></i> Chat
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="list-group">';
        foreach ($datachat as $stt =>$id) {
        echo ' 
         <a href="'.base_url().'admin/chat/chatvs/'.$stt.'" class="thumbnail" data-toggle="tooltip" data-placement="top">
             '.html_escape($id).' </a> ';
          }
        echo '</div>
            <!-- /.list-group -->
            <a href="#" class="btn btn-default btn-block">Tạo group</a>
        </div>
        <!-- /.panel-body -->
    </div>';
        }
?>

</div>
