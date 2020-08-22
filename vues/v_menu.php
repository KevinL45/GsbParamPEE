<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="index.php">
      <img src="./images/logoGsb.png"  height="28">
    </a>

    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item" href="index.php">
        Accueil
      </a>
      
      <?php
      if(isset($_SESSION['login'])){
      ?>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Mes rapports
        </a>
        <div class="navbar-dropdown">
		 <?php
      if(isset($_SESSION['login']) && $_SESSION['abiCode']=='DEL' or $_SESSION['abiCode']=='VIS'){
      ?>
          <a class="navbar-item" href="index.php?uc=rapport&action=formulaireRapport">
           Saisir un rapport
          </a>
         <a class="navbar-item" href="index.php?uc=rapport&action=consultVisite">
            Consulter mes rapports
          </a>
          <a class="navbar-item" href="index.php?uc=rapport&action=statistique">
              Consulter mes statistiques
          </a>
	  <?php } ?>
          </div>
       </div>
      <?php
      }
      ?>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Consultation
        </a>

        <div class="navbar-dropdown">
          <a href="index.php?uc=praticien&action=formulaire" class="navbar-item">
            Praticiens
          </a>
          <?php
          if(isset($_SESSION['login']) && $_SESSION['abiCode']=="RESP"){
          ?>
           <a href="index.php?uc=praticien&action=ajoutPraticien" class="navbar-item">
            Ajout d'un Praticien
          </a>
          <?php
          }
           ?>
          <a href="index.php?uc=medicament&action=afficheMedicamment" class="navbar-item">
            Médicaments
          </a>
          <?php
          if(isset($_SESSION['login']) && $_SESSION['abiCode']=="DEL"){
      ?>
      
          <a href="index.php?uc=rapport&action=historique" class="navbar-item">
            Historique des rapports de ma région
          </a>
      
   
          <?php
          }
          ?>
		    <?php
       if(isset($_SESSION['login']) && $_SESSION['abiCode']=="DEL"){
      ?>
		  <a class="navbar-item"href="index.php?uc=rapport&action=visionActivite" >
           Nouveaux rapports de ma région
        </a>
		   <?php
      }
      ?>
          </div>
      </div>
    </div>
    <div class="navbar-end">
      
        <?php
        if(isset($_SESSION['login'])) {
        ?>
        <div class="navbar-item">
                <a href="index.php">
                  <strong><?php echo $_SESSION['secCode'];?></strong>
                </a>
        </div>
        <div class="navbar-item">
                <a href="index.php">
                  <strong><?php echo $_SESSION['abiCode'];?></strong>
                </a>
        </div>
          <div class="navbar-item">
             <div class="buttons">
                <a href="index.php" class="button is-primary">
                  <strong><?php echo $_SESSION['login'];?></strong>
                </a>
            </div>
          </div>
          <div class="navbar-item">
             <div class="buttons">
                <a href="index.php?uc=deconnexion&action=deco" class="button is-primary">
                  <strong>deconnexion</strong>
                </a>
             </div>
          </div>
          <?php
          }
          else{
            ?>
            <div class="navbar-item">
              <div class="buttons">
                <a href="index.php?uc=connexion&action=formulaire" class="button is-primary">
                  <strong>Connexion</strong>
                </a>
              </div>
            </div>
            <?php
          }
          ?>
    </div>
  </div>
</nav>
