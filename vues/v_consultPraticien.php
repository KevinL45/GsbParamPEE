
    <section class="hero">
        <h1 class="title">
            Consultation Praticien
        </h1>
    </section> 
        <div class="container is-fluid">
           <form class="formPraticien" method="POST" action="index.php?uc=praticien&action=affichePraticien">
                    <div class="field">
                        <label class="label">Praticiens :</label>
                        <div class="control">
                        <select name="cat" class="select">
                            <?php $pdo->listeDeroulantePraticien(); ?>
                        </select>
                        </div>
                    </div>
                    <div class="field is-grouped">
                        <div class="control">
                            <button class="button is-link">Consulter</button>
                        </div>
                    </div>
            </form> 
        </div>
       
