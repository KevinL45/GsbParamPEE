	<section class="hero">
        <h1 class="title">
		Historique des rapports de visite</h1>
		</section> 
    <div class="container is-fluid">
	
	 <form class="formAjoutPraticien" method="POST" action="index.php?uc=rapport&action=historique">
	 <label class="label">Collaborateur</label>

         <SELECT name="collaborateur" size="1">
				<?php
				foreach ($lesCollaborateurs as $c){
				echo'<OPTION value="'.$c['col_matricule'].'">'.$c['col_nom'].' '.$c['col__prenom'].'</OPTION>';
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
	 <table>

</table>
</div>