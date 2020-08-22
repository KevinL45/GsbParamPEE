<?php
$action = $_REQUEST['action'];
switch($action)
{
	
	case 'formulaireRapport' :
	{
	if(isset($_SESSION['login'])) {
	$lesMedicaments = $pdo->getMedicament();
	$lesMotifs = $pdo->getMotif();
	$lesPraticiens = $pdo->getPraticien();
	include('vues/v_SaisirRapportVisite.php');


		}
	break;
	}
	
	case 'consultVisite':
	{
	if($pdo->trouverunRapport ($_SESSION['matricule'])==true){
	
		$lesPraticiens = $pdo->consultRapportPracticien ($_SESSION['matricule']);
		include('vues/v_consultRapportVisite.php');
		
		if(isset($_REQUEST['valide'])){
			$lesRapports=$pdo->ConsultRapport($_REQUEST['debut'],$_REQUEST['fin'],$_SESSION['matricule'],$_REQUEST['praticien']);
			include('vues/v_RapportSansTitre.php');
		}
		
	}else{
		$_SESSION['msgErreurs']="Vous n'avez pas de rapport.";
			include("vues/v_message.php");
		
	}
		
	break;
	}
	
	case 'insererRapport' :
	{
		if(isset($_POST['dateVisite'])){
			$dateVisite=$_POST['dateVisite'];
	    	$motif=$_POST['motif'];
	    	$motifAutre=$_POST['motifAutre'];
	    	$bilan=$_POST['bilan'];
	    	$impact=$_POST['impact'];
	    	$med1=$_POST['med1'];
	    	$med2=$_POST['med2'];
	    	$practicien=$_POST['practicien'];
	    	$remplacant=$_POST['remplacant'];
	    	$test=$pdo->insertionRapport($dateVisite, $bilan, $impact, $motifAutre, $motif, $practicien, $remplacant, $med1, $med2);

	    	if($test==true){
				$_SESSION['msgErreurs']="Rapport enregistré";
	    	}
	    	if($test==false){
	    		$_SESSION['msgErreurs']="Une erreur s'est produite durant l'ajout du rapport.<br/>Veuillez essayer à nouveau.";
	    	}
	    	include("vues/v_message.php");
	    }

    	$lesMedicaments = $pdo->getMedicament();
		$lesMotifs = $pdo->getMotif();
		$lesPraticiens = $pdo->getPraticien();
    	include('vues/v_SaisirRapportVisite.php');
		break;
	}
	
	case 'visionActivite':
	{
        $codeReg=$pdo->trouverCodeRegion($_SESSION['matricule']);
        $lesRapports=$pdo->RegionRapports($codeReg['code']);

        if($lesRapports==true){

		include('vues/v_RapportAvecTitre.php');

    }else{
        $_SESSION['msgErreurs']="Vous n'avez pas de nouveaux rapports dans votre région.";
        include("vues/v_message.php");

    }
		
	break;
	}
	
	case 'detailRapport':
	{
	$Rapport=$pdo->unRapport($_REQUEST['num']);
		include('vues/v_detailRapport.php');
		
	break;
	}
	case 'detailPraticien' :{
			$info=$pdo->affichagePraticien($_REQUEST['num']);
			if($info==true){
			$_SESSION['num']=$info['pra_num'];
			$_SESSION['code']=$info['typ_code'];
			$_SESSION['nom']=$info['pra_nom'];
			$_SESSION['prenom']=$info['pra_prenom'];
			$_SESSION['adresse']=$info['pra_adresse'];
			$_SESSION['cp']=$info['pra_cp'];
			$_SESSION['ville']=$info['pra_ville'];
			$_SESSION['confiance']=$info['pra_coefConfiance'];
			$_SESSION['notoriete']=$info['pra_coefNotoriete'];
			include('vues/v_detailsPraticien.php');	
			}else{
				$_SESSION['msgErreurs']="Pas d'information sur le praticien.";
				include("vues/v_message.php");
			}
		break;

	
	}
	
	case 'detailMedicament':{
		
		$med_depotLegal=$_GET['num'];
		include("vues/v_detailsMedicament.php");
		
	break;	
	}
	
	case 'historique':{
        $codeReg=$pdo->trouverCodeRegion($_SESSION['matricule']);
        $lesRapports=$pdo->RegionRapports($codeReg['code']);

        if($lesRapports==true){
	
		
		if(isset($_REQUEST['valide'])){
			$lesCollaborateurs=$pdo->getCollaborateur();
            $codeReg=$pdo->trouverCodeRegion($_REQUEST['collaborateur']);
			$lesRapports=$pdo->rechercheRapport($_REQUEST['debut'],$_REQUEST['fin'],$_REQUEST['collaborateur'],$codeReg);
			if($lesRapports==true){
                include("vues/v_historiqueRapport.php");
                include('vues/v_RapportSansTitre.php');
			}else{
                include("vues/v_historiqueRapport.php");
			    $_SESSION['msgErreurs']="Vous n'avez pas de rapport à cette période.";
                include("vues/v_message.php");
            }

			
			}else{
            $lesCollaborateurs=$pdo->getCollaborateur();
            include("vues/v_historiqueRapport.php");
        }
        }else{
            $_SESSION['msgErreurs']="Vous n'avez pas de rapport dans votre région pour afficher l'historique.";
            include("vues/v_message.php");

        }
		
	break;	
	}
	
	case 'validation':{
		
	$validation=$pdo->validationEtat($_REQUEST['num']);
		$codeReg=$pdo->trouverCodeRegion($_SESSION['matricule']);
	$lesRapports=$pdo->RegionRapports($codeReg['code']);
		include('vues/v_RapportAvecTitre.php');
		
	break;	
	}

    case 'statistique':{
        if($pdo->trouverunRapport ($_SESSION['matricule'])==true){

        $lesRapports = $pdo->trouverunRapport($_SESSION['matricule']);
        include('vues/v_statistique.php');
        }else{
            $_SESSION['msgErreurs']="Vous n'avez pas de rapport pour afficher les statistiques.";
            include("vues/v_message.php");

        }

        break;
    }
	
	
	
}
?>