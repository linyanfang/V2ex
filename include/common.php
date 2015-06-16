

<?php
	/*
	 *  弹窗函数
	 */
	function alert($_info) {
		echo "<script type='text/javascript'>alert('$_info');history.back();</script>";
		exit ();
	}

	function _location($_info, $_url) {
		echo "<script type='text/javascript'>alert('$_info');location.href='$_url';</script>";
		exit ();
	}



?>