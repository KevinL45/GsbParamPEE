


<div class="container is-fluid">

    <?php
    if($lesRapports==true){
        ?>
<table>
<tr>
<td class="alterned">Identité</td>
<td class="alterned">Bilan</td>
<td>Etat</td>
</tr>

<?php
	foreach($lesRapports as $Rapport){
		$medicament1=$pdo-> getleNomMedicament($Rapport['rap_produit1']);
		$medicament2=$pdo-> getleNomMedicament($Rapport['rap_produit2']);
		$remplacant=$pdo->affichageNomPraticien($Rapport['pra_numRem']);
		$num=$Rapport['rap_num'];
	
?>


<td class="alterned"><?php echo $Rapport['col_nom'].' '. $Rapport['col_prenom'];?></td>
<td class="alterned"><a href="index.php?uc=rapport&action=detailRapport&num=<?php echo $num?>"><?php if(!empty($Rapport['rap_bilan'])){echo $Rapport['rap_bilan'];}?></a></td>
<td><?php echo $Rapport['eta_libelle']?></td>
</tr>



<?php }
}else{ 

$_SESSION['msgErreurs']="Rapport de visite inexistant, veuillez reéssayer.";
include("vues/v_message.php");
}?>

</table>
</div>
