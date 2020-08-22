<section class="hero">
    <h1 class="title">
        Accueil
    </h1>
</section>
<div class="container">
	<div id="containerButtonsAccueil">
		<div id="containerRow1">
			<a href="index.php?uc=praticien&action=formulaire">
				<div class="clickableButtonPraticien">
					<h2>Praticiens</h2>
				</div>
			</a>
			<a href="index.php?uc=medicament&action=afficheMedicamment">
				<div class="clickableButtonMedicamment">
					<h2>Medicaments</h2>
				</div>
			</a>
		</div>


		<div id="containerRow2">
		 <?php
      if(isset($_SESSION['login'])){
      ?>
          <a href="index.php?uc=rapport&action=consultVisite">
				<div class="clickableButtonRapports">
					<h2>Rapports</h2>
				</div>
			</a>
			<?php
      }
      ?>
			<a href="#">
				<div class="clickableButtonUnknow">
					<h2>Unknow</h2>
				</div>
			</a>
		</div>
	</div>
</div>
