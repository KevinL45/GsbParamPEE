<?php
$msg=$_SESSION['msgErreurs'];
?>
<div class="notification is-danger">
  <button class="delete"></button>
<?php
	echo $msg;
?>
</div>