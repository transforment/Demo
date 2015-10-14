<div > 
<?php  echo '<font size=3>'.html_escape($node_map->node_name) .'</font>';
?>
<br/>
<?php  
//	foreach ($can_cu_data as $key ) {
//		echo '<font size=3>'.$key.'</font>';
//		echo "<br/>";
//	}
		echo'<font style="font-weight:bold" size=3>Trình tự thực hiện: </font><br/>';
		echo '<font size=2>'.$trinh_tu_data.'</font>';
		echo "<br/>";
		echo'<font style="font-weight:bold" size=3>Thời gian tiếp nhận hồ sơ và trả kết quả: </font><br/>';		
		echo '<font size=2>'.$thoi_gian_data.'</font>';
		echo "<br/>";
		echo'<font style="font-weight:bold" size=3>Cách thức thực hiện: </font><br/>';		
		echo '<font size=2>'.$cach_thuc_data.'</font>';
		echo "<br/>";
		echo'<font style="font-weight:bold" size=3>Thành phần, số lượng hồ sơ: </font><br/>';
		echo '<font size=2>'.$thanh_phan_data.'</font>';
		echo "<br/>";
		echo'<font style="font-weight:bold" size=3>Thời hạn giải quyết: </font><br/>';
		echo '<font size=2>'.$giai_quyet_data.'</font>';
		echo "<br/>";
		echo'<font style="font-weight:bold" size=3>Đối tượng thực hiện thủ tục hành chính: </font><br/>';
		echo '<font size=2>'.$doi_tuong_data.'</font>';
		echo "<br/>";
		echo'<font style="font-weight:bold" size=3>Cơ quan thực hiện thủ tục hành chính: </font><br/>';
		echo '<font size=2>'.$co_quan_data.'</font>';
		echo "<br/>";
		echo'<font style="font-weight:bold" size=3> Kết quả thực hiện thủ tục hành chính: </font><br/>';
		echo '<font size=2>'.$ket_qua_data.'</font>';
		echo "<br/>";
		echo'<font style="font-weight:bold" size=3> Phí, lệ phí: </font><br/>';
		echo '<font size=2>'.$le_phi_data.'</font>';
		echo "<br/>";
		echo'<font style="font-weight:bold" size=3> Tên mẫu đơn, mẫu tờ khai: </font><br/>';
		echo '<font size=2>'.$mau_don_data.'</font>';
		echo "<br/>";
		echo'<font style="font-weight:bold" size=3> Yêu cầu, điều kiện thực hiện thủ tục hành chính: </font><br/>';
		echo '<font size=2>'.$yeu_cau_data.'</font>';
		echo "<br/>";
		echo'<font style="font-weight:bold" size=3> Căn cứ pháp lý của thủ tục hành chính:</font><br/>';
		echo '<font size=2>'.$can_cu_data.'</font>';
?>
</div>