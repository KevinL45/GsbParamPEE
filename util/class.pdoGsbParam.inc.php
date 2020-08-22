<?php

class PdoGsbParam
{   	
	
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=gsbparam';	
      	private static $user='root' ;   		
      	private static $mdp='' ;	
		private static $monPdo=null;
		private static $monPdoGsbParam = null;
		
	private function __construct()
	{
    		PdoGsbParam::$monPdo = new PDO(PdoGsbParam::$serveur.';'.PdoGsbParam::$bdd, PdoGsbParam::$user, PdoGsbParam::$mdp); 
			PdoGsbParam::$monPdo->query('SET CHARACTER SET utf8');
	}
	public function _destruct(){
		PdoGsbParam::$monPdo = null;
	}

	public static function getPdoGsbParam()
	{
		if(PdoGsbParam::$monPdoGsbParam == null)
		{
			PdoGsbParam::$monPdoGsbParam= new PdoGsbParam();
		}
		return PdoGsbParam::$monPdoGsbParam;  
	}

	
	
	public function connexion($login,$mdp)
	{

		$req = "select * from collaborateur where  col_mail='$login'";
				$res = PdoGsbParam::$monPdo->query($req);
				$ligne = $res->fetch();
				$ligneMdp=false;

			if(password_verify($mdp,$ligne['col_mdp'])){
				$ligneMdp=$ligne;
			} 
		
		return $ligneMdp;
	}
	// POOUR HASH LES MDP DE LA BDD QUI SONT DEJA DANS LA BDD AVANT D AVOIR HASH
	public function mdpCrea(){
		$req="select * from collaborateur";
		$res = PdoGsbParam::$monPdo->query($req);
		$ligne = $res->fetchAll();
		
		foreach($ligne as $uneLigne)
			{
				$mdphash=hashMdp($uneLigne['col_mdp']);
				$mat=$uneLigne['col_matricule'];
				$req="update collaborateur set col_mdp='$mdphash' where col_matricule='$mat'";
				$res = PdoGsbParam::$monPdo->exec($req);

				$req="update collaborateur set col_mdp='didi'";
				
			}
	}
	//obtenir les medicaments
	public function getMedicament(){
		
		$req = 'select * from medicament order by med_nomCommercial';
		$res = PdoGsbParam::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	//obtenir les collaborateur
	public function getCollaborateur(){
		
		$req = 'select * from collaborateur order by col_nom';
		$res = PdoGsbParam::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	//obtenir les motifs
	public function getMotif(){
		
		$req = 'select * from motif';
		$res = PdoGsbParam::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	//obtenir les practiens
	public function getPraticien(){
		$req = 'select * from praticien order by pra_nom';
		$res = PdoGsbParam::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	//obtenir les regions
	public function getRegion(){
	$req = 'select * from region';
	$res = PdoGsbParam::$monPdo->query($req);
	$lesLignes = $res->fetchAll();
	return $lesLignes;
	}
	//LISTE DEROULANTE POUR AFFFICHER LES PRATICIENS
	public function listeDeroulantePraticien(){
		$req="select pra_num,pra_nom from praticien  order by pra_nom";
		$res = PdoGsbParam::$monPdo->query($req);
		$ligne = $res->fetchAll();

		foreach($ligne as $UneLigne){
			echo '<option value="'.$UneLigne['pra_num'].'">'.$UneLigne['pra_nom'].' '.$UneLigne['pra_prenom'].'</option>';
		}
	}

	public function listeDeroulantePraticienTypeCode(){
		$req="select typ_code from type_praticien ";
		$res = PdoGsbParam::$monPdo->query($req);
		$ligne = $res->fetchAll();

		foreach($ligne as $UneLigne){
			echo '<option value="'.$UneLigne['typ_code'].'">'.$UneLigne['typ_code'].'</option>';
		}
	}


	//Affichage des informations concernant un praticien
	public function affichagePraticien($idPra){

		if($idPra){
			$req="select * from praticien where pra_num='$idPra'";
			$res = PdoGsbParam::$monPdo->query($req);
			$ligne = $res->fetch();
		}
		return $ligne;
	}

	public function ajoutPraticien($code,$nom,$prenom,$adresse,$cp,$ville,$coefConfiance,$coefNotoriete){
		$req="select MAX(pra_num) as max from praticien";
		$res = PdoGsbParam::$monPdo->query($req);
		$ligne = $res->fetch();
		$praMax=$ligne['max'];
		$praNum=$praMax+1;
	
		$req = 'insert into praticien values('.$praNum.',"'.$code.'","'.$nom.'","'.$prenom.'","'.$adresse.'","'.$cp.'","'.$ville.'","'.$coefConfiance.'","'.$coefNotoriete.'")';
		$res = PdoGsbParam::$monPdo->exec($req);
	
		$test=true;
		if(!$res){
			$test=false;
		}
		 return $test;
	  }
	



	//medicaments
	/** Renvoie la liste de tous les médicaments
	*
	* @return tableau bidimensionnel des médicamments et leurs attributs
	*/
	public static function getAllMedicaments(){
		$req="select * from medicament";
		$res = PdoGsbParam::$monPdo->query($req);
		$ligne = $res->fetchAll();
		
		return $ligne;
	}

	/** Renvoie la liste de tous les médicaments contenant la chaine renseignée en paramètre dans leur nom, leur description ou leur effets.
	*
	* @param $chaine chaine à rechercher
	* 
	* @return tableau bidimensionnel des médicamments et leurs attributs
	*/
	public static function getTriMedicaments($chaine){
		$req='select * from medicament WHERE med_nomCommercial LIKE "%'.$chaine.'%" OR med_depotLegal LIKE "%'.$chaine.'%" OR med_effets LIKE "%'.$chaine.'%"';
		$res = PdoGsbParam::$monPdo->query($req);
		$ligne = $res->fetchAll();
		
		return $ligne;
	}

	/** Renvoie un médicament précis
	* 
	* @param $med_depotLegal identifiant du médicament voulu
	* 
	* @return tableau simple contenant les attributs du médicament dont l'identifiant à été renseigné en paramètre
	*/
	public static function getleMedicament($med_depotLegal){
		$req='select * from medicament WHERE med_depotLegal="'.$med_depotLegal.'"';
		$res = PdoGsbParam::$monPdo->query($req);
		$ligne = $res->fetch();
		
		return $ligne;
	}

	/** Renvoie le nom d'une famille de médicament précise
	* 
	* @param $fam_code identifiant de la famille de médicament voulue
	* 
	* @return chaine contenant le nom de la famille de médicament dont le code a été renseigné en paramètre
	*/
	public static function getFamille($fam_code){
		$req='select fam_libelle from famille WHERE fam_code="'.$fam_code.'"';
		$res = PdoGsbParam::$monPdo->query($req);
		$ligne = $res->fetch();
		
		return $ligne;
	}
    //Inserttion d'un rapport
    public function insertionRapport($dateVisite, $bilan, $impact, $motifAutre, $motif, $practicien, $remplacant, $med1, $med2){
        $req = 'select max(rap_num) as maxi from rapport_visite';
        $res = PdoGsbParam::$monPdo->query($req);
        $laLigne = $res->fetch();
        $leId = $laLigne['maxi'];
        $id = $leId+1;
        $matricule = $_SESSION['matricule'];

        $req='INSERT INTO rapport_visite (rap_num, rap_dateVisite, rap_dateSaisie, rap_bilan, rap_impact, rap_AutreMotif, mot_num, pra_numPra, pra_numRem, eta_code, rap_produit1, rap_produit2, col_matricule) VALUES ('.$id.', "'.$dateVisite.'", now(),"'.$bilan.'", "'.$impact.'", "'.$motifAutre.'", '.$motif.', '.$practicien.', '.$remplacant.', "N", "'.$med1.'", "'.$med2.'", "'.$matricule.'")';
        $res = PdoGsbParam::$monPdo->exec($req);

        $test=true;
        if(!$res){
            $test=false;
        }
        return $test;
    }
	
	public static function consultRapport ($debut,$fin,$matricule,$praticien){
		
	$req="select * from rapport_visite
		inner join collaborateur
		on rapport_visite.col_matricule = collaborateur.col_matricule
		inner join motif
		on rapport_visite.mot_num = motif.mot_num
		inner join praticien
		on rapport_visite.pra_numPra = praticien.pra_num
		inner join etat
		on rapport_visite.eta_code = etat.eta_code
		inner join medicament
		on rapport_visite.rap_produit1 = medicament.med_depotLegal
		where rap_dateVisite between '$debut' and '$fin' and rapport_visite.col_matricule='$matricule' or pra_numPra='$praticien'
		order by rap_dateVisite";
		$res = PdoGsbParam::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	public static function getleNomMedicament($med_depotLegal){
		$req='select med_depotLegal ,med_nomCommercial from medicament WHERE med_depotLegal="'.$med_depotLegal.'"';
		$res = PdoGsbParam::$monPdo->query($req);
		$ligne = $res->fetch();
		return $ligne;
	}
	public static function affichageNomPraticien($idPra){
			$req="select pra_num, pra_nom, pra_prenom from praticien where pra_num='$idPra'";
			$res = PdoGsbParam::$monPdo->query($req);
			$ligne = $res->fetch();
		
		return $ligne;
	}
	
public static function trouverCodeRegion ($matricule){
	$req="select travailler.reg_code as code from region
	inner JOIN travailler
	on region.reg_code=travailler.reg_code
	where col_matricule='$matricule'";
	$res = PdoGsbParam::$monPdo->query($req);
	$ligne = $res->fetch();
	return $ligne;
}
	
	
	
public static function RegionRapports($region){
$req="select * from region
inner JOIN travailler
on region.reg_code=travailler.reg_code
inner join collaborateur 
on collaborateur.col_matricule=travailler.col_matricule
inner join rapport_visite
on collaborateur.col_matricule = rapport_visite.col_matricule
inner join motif
on rapport_visite.mot_num = motif.mot_num
inner join praticien
on rapport_visite.pra_numPra = praticien.pra_num
inner join etat
on rapport_visite.eta_code = etat.eta_code
inner join medicament
on rapport_visite.rap_produit1 = medicament.med_depotLegal
WHERE travailler.reg_code='$region'
order by rap_dateVisite";
$res = PdoGsbParam::$monPdo->query($req);
$lesLignes = $res->fetchAll();
return $lesLignes;
	}
	
public static function unRapport($num){
	
	
	$req="select * from rapport_visite
		inner join motif
		on rapport_visite.mot_num = motif.mot_num
		inner join praticien
		on rapport_visite.pra_numPra = praticien.pra_num
		inner join etat
		on rapport_visite.eta_code = etat.eta_code
		inner join medicament
		on rapport_visite.rap_produit1 = medicament.med_depotLegal
		where rap_num='$num'
		order by rap_dateVisite";
		$res = PdoGsbParam::$monPdo->query($req);
		$Ligne = $res->fetch();
		return $Ligne;
}
public static function listeRapports(){
$req="select * from region
inner JOIN travailler
on region.reg_code=travailler.reg_code
inner join collaborateur 
on collaborateur.col_matricule=travailler.col_matricule
inner join rapport_visite
on collaborateur.col_matricule = rapport_visite.col_matricule
inner join motif
on rapport_visite.mot_num = motif.mot_num
inner join praticien
on rapport_visite.pra_numPra = praticien.pra_num
inner join etat
on rapport_visite.eta_code = etat.eta_code
inner join medicament
on rapport_visite.rap_produit1 = medicament.med_depotLegal
order by rap_dateVisite";
$res = PdoGsbParam::$monPdo->query($req);
$lesLignes = $res->fetchAll();
return $lesLignes;
	}
	
public static function validationEtat($num){
	
$req="update rapport_visite set eta_code='D' where rap_num='$num'";
$res = PdoGsbParam::$monPdo->query($req);
$laLigne = $res->fetch();
}

public static function rechercheRapport($debut,$fin,$matricule,$codeReg){
	    $req="select * from region
        inner JOIN travailler
        on region.reg_code=travailler.reg_code
        inner join collaborateur 
        on collaborateur.col_matricule=travailler.col_matricule
        inner join rapport_visite
        on collaborateur.col_matricule = rapport_visite.col_matricule
        inner join motif
        on rapport_visite.mot_num = motif.mot_num
        inner join praticien
        on rapport_visite.pra_numPra = praticien.pra_num
        inner join etat
        on rapport_visite.eta_code = etat.eta_code
        inner join medicament
        on rapport_visite.rap_produit1 = medicament.med_depotLegal
		where rap_dateVisite between '$debut' and '$fin' and rapport_visite.col_matricule='$matricule' 
		order by rap_dateVisite";
		$res = PdoGsbParam::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

	public static function consultRapportPracticien ($matricule){
		$req="select pra_nom, pra_prenom from rapport_visite
		inner join collaborateur
		on rapport_visite.col_matricule = collaborateur.col_matricule
		inner join motif
		on rapport_visite.mot_num = motif.mot_num
		inner join praticien
		on rapport_visite.pra_numPra = praticien.pra_num
		inner join etat
		on rapport_visite.eta_code = etat.eta_code
		inner join medicament
		on rapport_visite.rap_produit1 = medicament.med_depotLegal
		where collaborateur.col_matricule='$matricule'
		order by rap_dateVisite";
		$res = PdoGsbParam::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	
public function trouverunRapport ($matricule){
	
	$req="select * from rapport_visite
		inner join collaborateur
		on rapport_visite.col_matricule = collaborateur.col_matricule
		inner join motif
		on rapport_visite.mot_num = motif.mot_num
		inner join praticien
		on rapport_visite.pra_numPra = praticien.pra_num
		inner join etat
		on rapport_visite.eta_code = etat.eta_code
		inner join medicament
		on rapport_visite.rap_produit1 = medicament.med_depotLegal
		where rapport_visite.col_matricule='$matricule'
		order by rap_dateVisite";
		$res = PdoGsbParam::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	
	

	
	



		
}     

?>