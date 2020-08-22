<?php
function hashMdp($mdp){
	$mdphash=password_hash($mdp,PASSWORD_DEFAULT);
	return $mdphash;
}

 function deconnexion(){
	session_destroy();
	sleep(2);
	header('Location: index.php?uc=accueil');
}
?>
