<?php
	session_start();
	include("vues/v_head.php");
	include("vues/v_menu.php");
	require_once("util/fonctions.inc.php");
	require_once("util/class.pdoGsbParam.inc.php");

	if(!isset($_REQUEST['uc']))
	     $uc = 'accueil'; // si $_GET['uc'] n'existe pas , $uc reçoit une valeur par défaut
	else
		$uc = $_REQUEST['uc'];

	$pdo = PdoGsbParam::getPdoGsbParam();	 
	switch($uc)
	{
		case 'accueil':
		{
			include("vues/v_accueil.php");
			break;
		}	
		case 'praticien':
		{
			include("controleurs/c_gestionPraticien.php");
			break;
		}
		case 'medicament':
		{
			include("controleurs/c_gestionMedicament.php");
			break;
		}
		case 'connexion':
		{
			include("controleurs/c_gestionConnexion.php");
			break;
		}
		case 'deconnexion':
		{
			include("controleurs/c_gestionDeconnexion.php");
			break;
		}
		case 'rapport':
		{
			include("controleurs/c_gestionVisite.php");
			break;
		}
		default:
		{
			$uc='accueil';
			include("vues/v_accueil.php");
			break;
		}
	}

	include("vues/v_footer.php");
	include("vues/v_foot.php");
?>

