<?php 
	session_start();

	function userLoggedIn() {
		if (isset($_SESSION['user_role'])) {
			return true;
		} else {
			return false;
		}
	}

	function showAlert() {
		if (!empty($_SESSION['msg'])) {
			echo '<div id="msg" class="bg-cta">' . $_SESSION['msg'] . '</div>';
			unset($_SESSION['msg']);
		}
	}
?>