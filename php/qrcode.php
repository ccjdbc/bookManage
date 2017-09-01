<?php
	include("../phpqrcode/qrlib.php");
	QRcode::png('http://www.baidu.com','abc.jpg',QR_ECLEVEL_L,10,0,true);
?>
