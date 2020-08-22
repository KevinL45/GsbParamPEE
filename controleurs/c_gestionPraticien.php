<?php 
	$action = $_REQUEST['action'];
	switch($action)
{
	case 'formulaire':{
		include("vues/v_consultPraticien.php");
		break;
    }
    
	 case 'affichePraticien':{
		$info=$pdo->affichagePraticien($_POST['cat']);
		if($info!="Vide"){
			
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

		}
		else{
			sleep(2);
			include("vues/v_consultPraticien.php");
		}
		
		break;
	}

		case 'ajoutPraticien':{
		include("vues/v_ajoutPraticien.php");
		break;
    }

    	case 'ajoutPraticienBDD':{
    	$code=$_POST['typCode'];
    	$nom=$_POST['praNom'];
    	$prenom=$_POST['praPrenom'];
    	$adresse=$_POST['praAdresse'];
    	$cp=$_POST['praCp'];
    	$ville=$_POST['praVille'];
    	$coefConfiance=$_POST['praCoefConfiance'];
    	$coefNotoriete=$_POST['praCoefNoto'];
    	$test=$pdo->ajoutPraticien($code,$nom,$prenom,$adresse,$cp,$ville,$coefConfiance,$coefNotoriete);
    	if($test==true){
			$_SESSION['msgErreurs']="Insertion effectuée";
    	}
    	if($test==false){
    		$_SESSION['msgErreurs']="Insertion non effectuée";
    	}
		include("vues/v_message.php");
		include("vues/v_ajoutPraticien.php");
		break;
	}
}
?>