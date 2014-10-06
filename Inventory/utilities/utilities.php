<?php
/**
 * User: Nicholas Rodofile
 */

	function alert($type, $msg){
		if(empty($type)){
			$type = "alert-info";
		}
		return '
			<div class="alert '.$type.' alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				'.$msg.'
			</div>';
	}

	function alertWarning($msg){
		return alert("alert-warning", $msg);
	}

	function alertSuccess($msg){
		return alert("alert-success", $msg);
	}

	function alertDanger($msg){
		return alert("alert-danger", $msg);
	}
?>