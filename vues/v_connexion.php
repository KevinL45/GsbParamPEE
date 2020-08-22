
    <section class="hero">
        <h1 class="title">
            Connexion
        </h1>
    </section> 
        <div class="container is-fluid">
           <form method="POST" action="index.php?uc=connexion&action=connexionValidation">
                <div class="field">
                    <label class="label">Pseudo(email) :</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="Pseudo" name="pseudo">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Mot de passe :</label>
                    <div class="control">
                        <input class="input" type="password" placeholder="Mot de passe" name="mdp">
                    </div>
                </div>
                    
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link">Connexion</button>
                    </div>

                    <div class="control">
                        <button class="button is-link is-light">Cancel</button>
                    </div>

                </div>
                </fieldset>
            </form> 
        </div>
       
