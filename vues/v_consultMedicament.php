
    <section class="hero">
        <h1 class="title">
            Consultation Médicaments
        </h1>
    </section> 
    <div class="container is-fluid">
       <form method="POST" action="index.php?uc=medicament&action=afficheTriMedicamment">
            <div class="field">
                <label class="label">Rechercher :</label>
                <div class="control">
                    <input name="chaine" type="text" placeholder="ex: CARTION" />
                </div>
            </div>
            <div class="field is-grouped">
                <div class="control">
                    <input type="submit" value="Suivant" class="button is-primary"/>
                </div>
            </div>
        </form>
        <table>
        	<?php
	        	$medicaments = PdoGsbParam::getAllMedicaments();
	        	foreach ($medicaments as $medicament) {
	        		echo '<tr>';
	        		echo '<td class="alterned"><a href="index?uc=medicament&action=details&id='.$medicament['med_depotLegal'].'">'.$medicament['med_depotLegal'].'</a></td>'.
	        		'<td class="alterned"><a href="index?uc=medicament&action=details&id='.$medicament['med_depotLegal'].'">'.$medicament['med_nomCommercial'].'</a></td>'.
	        		'<td>'.$medicament['med_effets'].'</td>';
	        		echo '</tr>';
	        	}
	        ?>
        </table>
    </div>