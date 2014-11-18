<?php
$selected_radio = $_POST['forgot'];
if($selected_radio == 'password') {
	header('Location: ../forgotpassword.html');
}
else {
	header('Location: ../forgotusername.html');
}
?>