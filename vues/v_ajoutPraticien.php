<?php
     if(isset($_SESSION['login']) && $_SESSION['abiCode']=="RESP"){
 ?>

    <section class="hero">
        <h1 class="title">
            Ajout d'un Praticien
        </h1>
    </section> 
        <div class="container is-fluid">
           <form class="formAjoutPraticien" method="POST" action="index.php?uc=praticien&action=ajoutPraticienBDD">
                    <div class="contAjoutPrati">
                        <div class="contAjoutPratiGauche">
                            <label class="label">Type code:</label>
                            <div class="control">
                                <select name="typCode" class="select">
                                    <?php $pdo->listeDeroulantePraticienTypeCode(); ?>
                                </select>
                            </div>
                        
                           
                            <label class="label" name="praNom">Nom:</label>
                            <input type="text" name="praNom" required/>
                           
                            <label class="label" name="praPrenom">Prénom:</label>
                            <input type="text" name="praPrenom"  required/>
                           
                            <label class="label" name="praAdresse">Adresse(num + rue):</label>
                            <input type="text" name="praAdresse" required/>
                        
                       </div>
                        <div class="contAjoutPratiDroite">
                            <label class="label" name="praCp">Code postal:</label>
                            <input type="text" name="praCp" required/>

                            <label class="label" name="praVille">Ville:</label>
                            <input type="text" name="praVille" required/>
                            
                            <label class="label" name="praCoefConfiance">Coefficient de confiance:</label>
                            <input type="number" name="praCoefConfiance" min="0" required/>
                           
                            <label class="label" name="praCoefNoto">Coefficiance de notoriété:</label>
                            <input type="number" name="praCoefNoto" min="0" required/>
                            <div> <br></div>
                              <div class="field is-grouped">
                                <div class="control">
                                    <button class="button is-link">Ajouter</button>
                                </div>
                             </div>     
                        </div>
                    </div>
                   
            </form> 
        </div>
        <?php 
            }
            else {
        ?>
         <div class="notification is-danger">
        <button class="delete"></button>
        <?php
            echo "Vous devez être connecté ou un responsable pour avoir accès à l insertion";
        ?>
        </div>

        <?php 
            }
        ?>