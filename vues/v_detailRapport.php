	<section class="hero">
        <h1 class="title">
		Détail du rapport </h1>
		</section> 
<br/>
<?php
		$medicament1=$pdo-> getleNomMedicament($Rapport['rap_produit1']);
		$medicament2=$pdo-> getleNomMedicament($Rapport['rap_produit2']);
		$remplacant=$pdo->affichageNomPraticien($Rapport['pra_numRem']);
		$num=$Rapport['pra_num'];
?>
<div class="container is-fluid">
<div class="contPrati">
<div  class="titrePrati"><?php if(!empty($Rapport['rap_bilan'])){echo $Rapport['rap_bilan'];}?></div>  

<div  class="infoPrati"><p class="pPraticien">Numero Rapport : </p><?php if(!empty($Rapport['rap_num'])){echo $Rapport['rap_num'];}else{echo "Pas d'information";} ?></div>

<div  class="infoPrati"><p class="pPraticien">Date de visite : </p><?php if(!empty($Rapport['rap_dateVisite'])){echo $Rapport['rap_dateVisite'];}else{echo "Pas d'information";} ?></div>

<div  class="infoPrati"><p class="pPraticien">Impact : </p><?php if(!empty($Rapport['rap_impact'])){echo $Rapport['rap_impact'];}else{echo "Pas d'information";} ?></div>

<div  class="infoPrati"><p class="pPraticien">Motif : </p><?php if(!empty($Rapport['mot_libelle'])){echo $Rapport['mot_libelle'];}else{echo "Pas d'information";} ?></div>

<div  class="infoPrati"><p class="pPraticien">Autre motif : </p><?php if(!empty($Rapport['rap_AutreMotif'])){echo $Rapport['rap_AutreMotif'];}else{echo "Pas d'information";} ?></div>

<div  class="infoPrati"><p class="pPraticien">Praticien : <a href="index.php?uc=rapport&action=detailPraticien&num=<?php echo $Rapport['pra_num']?>"></p><?php if(!empty($Rapport['pra_nom'])){echo $Rapport['pra_nom'].' '.$Rapport['pra_prenom'] ;}else{echo "Pas d'information";} ?></a></div>

<div  class="infoPrati"><p class="pPraticien">Praticien remplaçant : <a href="index.php?uc=rapport&action=detailPraticien&num=<?php echo $remplacant['pra_num']?>"></p><?php if(!empty($remplacant['pra_nom'])){echo $remplacant['pra_nom'].' '.$remplacant['pra_prenom'].'';}else{echo "Pas d'information";} ?></a></div>

<div  class="infoPrati"><p class="pPraticien">Etat : </p><?php if(!empty($Rapport['eta_libelle'])){echo $Rapport['eta_libelle'];}else{echo "Pas d'information";} ?></div>

<div  class="infoPrati"><p class="pPraticien">Premier produit : <a href="index.php?uc=rapport&action=detailMedicament&num=<?php echo $medicament1['med_depotLegal']?>"></p><?php if(!empty($medicament1['med_nomCommercial'])){echo $medicament1['med_nomCommercial'];}else{echo "Pas d'information";} ?></a></div>

<div  class="infoPrati"><p class="pPraticien">Deuxième produit : <a href="index.php?uc=rapport&action=detailMedicament&num=<?php echo $medicament2['med_depotLegal']?>"></p><?php if(!empty($medicament2['med_nomCommercial'])){echo $medicament2['med_nomCommercial'];}else{?></a><?php echo "Pas d'information";} ?></div>

	<?php
       if(isset($_SESSION['login']) && $_SESSION['abiCode']=="DEL"&&$Rapport['eta_code']!="D"){
      ?>
	  <div  class="infoPrati"><p class="pPraticien"><a href="index.php?uc=rapport&action=validation&num=<?php echo $Rapport['rap_num']?> " onclick="return confirm('Voulez-vous vraiment valider le bilan ?');">Valider le bilan ?</a></p></div>
	  <?php
       }
      ?>
</div>
</div>
<br/>