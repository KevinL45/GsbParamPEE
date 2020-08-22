
    <section class="hero">
        <h1 class="title">
            Détail Médicament
        </h1>
    </section>
    <div class="container is-fluid">
	<div class="contPrati">
        <?php
        $leMedic = PdoGsbParam::getleMedicament($med_depotLegal);
        $famille = PdoGsbParam::getFamille($leMedic['fam_code']);
        echo
        '<div  class="titrePrati">Depot légal : '.$leMedic['med_depotLegal'].'</div>'.
        '<div  class="infoPrati"><p class="pPraticien">Appellation comerciale:</p> '.$leMedic['med_nomCommercial'].'</div>'.
        '<div  class="infoPrati"><p class="pPraticien">Famille :</p> '.$famille[0].'</div>'.
        '<div  class="infoPrati"><p class="pPraticien">Effets :</p>'.$leMedic['med_effets'].'</div>'.
        '<div  class="infoPrati"><p class="pPraticien">Composition :</p>'.$leMedic['med_composition'].'</div>'.
        '<div  class="infoPrati"><p class="pPraticien">Contre indications :</p>'.$leMedic['med_contreIndic'].'</div>'.
        '<div  class="infoPrati"><p class="pPraticien">Prix échantillon :</p>'.$leMedic['med_prixEchantillon'].' € </div>';
		
        ?>
	</div>
	</div>