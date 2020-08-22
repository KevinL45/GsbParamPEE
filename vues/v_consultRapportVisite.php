	<section class="hero">
        <h1 class="title">
Mes rapports de visites
			        </h1>
    </section> 
	
	
        <div class="container is-fluid">
           <form class="formAjoutPraticien" method="POST" action="index.php?uc=rapport&action=consultVisite">
			
		
			<label class="label">Praticien</label>
               <SELECT name="praticien" size="1">
				<?php
				foreach ($lesPraticiens as $unPraticien){
				echo'<OPTION value="'.$unPraticien['pra_num'].'">'.$unPraticien['pra_nom'].' '.$unPraticien['pra_prenom'].'</OPTION>';
				 }
				?>
				</SELECT>
				<label class="label">Date de début </label>
				<input class="input" type="date" name="debut">
				
					<label class="label">Date de fin </label>
				<input class="input" type="date" name="fin">
              <div> <br></div>
				
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" name="valide">Valider</button>
                    </div>
                </div>
				</br>
                </fieldset>
            </form> 
        </div>
       
