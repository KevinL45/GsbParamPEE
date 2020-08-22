<?php 
	$action = $_REQUEST['action'];
	switch($action)
{
	case 'formulaire':{
		include("vues/v_connexion.php");
		break;
	}
	
	case 'connexionValidation':{
		$login=$_POST['pseudo'];
		$mdp=$_POST['mdp'];
		$test=$pdo->connexion($login,$mdp);

		if($test==false){
			$_SESSION['msgErreurs']="Identifiant ou mdp incorrect";
			include("vues/v_message.php");
			sleep(2);
			include("vues/v_connexion.php");
		}
		else{
			$_SESSION['login']=$test['col_mail'];
			$_SESSION['matricule']=$test['col_matricule'];
			$_SESSION['nom']=$test['col_nom'];
			$_SESSION['prenom']=$test['col_prenom'];
			$_SESSION['rue']=$test['col_adresse'];
			$_SESSION['cp']=$test['col_cp'];
			$_SESSION['ville']=$test['col_ville'];
			$_SESSION['dteEmbauche']=$test['col_dateEmbauche'];
			$_SESSION['secCode']=$test['sec_code'];
			$_SESSION['abiCode']=$test['abi_code'];
			sleep(2);
			header('Location:index.php?uc=accueil');
		}
	break;
   }

    case 'mdpHash':
			{
                $pdo->mdpCrea();
		break;
            }
            
	case 'deconnexion':{
	deconnexion();
	break;
	}
}
	?>