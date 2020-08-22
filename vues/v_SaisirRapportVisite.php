<?php
     if(isset($_SESSION['login'])){
 ?>

	<section class="hero">
        <h1 class="title">
               Saisir un rapport de visite
        </h1>
    </section> 
	           
    <div class="container is-fluid">
    	<form class="formAjoutPraticien" method="POST" action="index.php?uc=rapport&action=insererRapport">
            <div class="contAjoutPrati">
				
                <div class="contAjoutPratiGauche">
	                <label class="label">Date de la visite : </label>
					<div class="control">
	                	<input class="input" type="text" name="dateVisite" placeholder="AAAA/MM/DD" required/>
	                </div>

					<label class="label">Motif de la visite : </label>
	                <SELECT name="motif" size="1">
	                 	<option value="null">-- autre motif --</option>
						<?php
						foreach ($lesMotifs as $unMotif){
							echo'<option value="'.$unMotif['mot_num'].'">'.$unMotif['mot_libelle'].'</option>';
						}
						?>
					</SELECT>

	                <label class="label">Ou motif autre à préciser:</label>
	                <input class="input" type="texte" name="motifAutre" maxlength="100" placeholder="">

	                <label class="label">Votre bilan : </label>
					<div class="control">
	                	<input class="input" type="text" name="bilan" placeholder="Saississez votre bilan" maxlength="255" required/>
	                </div>
				</div>

				<div class="contAjoutPratiDroite">
					<label class="label">Impact de la visite </label>
	                <input class="input" type="texte" name="impact" maxlength="255" placeholder="expliquez en quelques mots">

					<label class="label">Echantillan donné 1 :</label>
	            	<SELECT name="med1" size="1">
						<?php
						foreach ($lesMedicaments as $unMedicament){
							echo'<OPTION value="'.$unMedicament['med_depotLegal'].'">'.$unMedicament['med_nomCommercial'].'</option>';
						}
						?>
					</SELECT>

					<label class="label">Echantillan donné 2 :</label>
	            	<SELECT name="med2" size="1">
					    <OPTION value="null">Pas de deuxième médicament
						<?php
						foreach ($lesMedicaments as $unMedicament){
							echo'<OPTION value="'.$unMedicament['med_depotLegal'].'">'.$unMedicament['med_nomCommercial'].'</option>';
						}
						?>
					</SELECT>

					<label class="label">Practicien </label>
	            	<SELECT name="practicien" size="1">
						<?php
						foreach ($lesPraticiens as $unPraticien){
							echo'<OPTION value="'.$unPraticien['pra_num'].'">'.$unPraticien['pra_nom'].' '.$unPraticien['pra_prenom'].'</option>';
						}
						?>
					</SELECT>

					<label class="label">Practicien remplaçant </label>
	               	<SELECT name="remplacant" size="1">
					   	<OPTION value="null">Pas de remplaçant
						<?php
						foreach ($lesPraticiens as $unPraticien){
							echo'<OPTION value="'.$unPraticien['pra_num'].'">'.$unPraticien['pra_nom'].' '.$unPraticien['pra_prenom'].'</option>';
						}
						?>
					</SELECT>
				</div>

				<div class="field is-grouped">
                    <div class="control">
                    	<button class="button is-link" name="valide">Valider</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php 
}else {
?>
	<div class="notification is-danger">
		<button class="delete"></button>
		<?php
		echo "Vous devez être connecté ou un responsable pour avoir accès à cette fonctionalité.";
		?>
	</div>

<?php 
}
?>