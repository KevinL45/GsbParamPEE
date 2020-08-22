<?php
	$action = $_REQUEST['action'];

	switch($action)
	{
		case 'formulaire':{
			include("vues/v_consultPraticien.php");
			break;
	    }
		case 'afficheMedicamment':{
			include("vues/v_consultMedicament.php");
			break;
	    }
	    case 'afficheTriMedicamment':{
	    	$chaine=$_POST['chaine'];
			include("vues/v_consultMedicamentTri.php");
			break;
	    }
	    case 'details':{
	    	$med_depotLegal=$_GET['id'];
			include("vues/v_detailsMedicament.php");
			break;
	    }
	    default:{
			include("vues/v_consultMedicament.php");
			break;
	    }
	}
?>