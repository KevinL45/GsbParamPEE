<?php
if(isset($_SESSION['num'])){$infoNum = $_SESSION['num'];}
if(isset($_SESSION['code'])){$infoCode = $_SESSION['code'];}
if(isset($_SESSION['nom'])){$infoNom = $_SESSION['nom'];}
if(isset($_SESSION['prenom'])){$infoPrenom = $_SESSION['prenom'];}
if(isset($_SESSION['adresse'])){$infoAdresse = $_SESSION['adresse'];}
if(isset($_SESSION['cp'])){$infoCp = $_SESSION['cp'];} 
if(isset($_SESSION['ville'])){$infoVille = $_SESSION['ville'];} 
if(isset($_SESSION['confiance'])){$infoConfiance = $_SESSION['confiance'];} 
if(isset($_SESSION['notoriete'])){$infoNotoriete = $_SESSION['notoriete'];} 
?>
<section class="hero">
        <h1 class="title">
            Information Praticien :
        </h1>
    </section>
<div class='container is-fluid'>

<div class="contPrati">
    <div  class="titrePrati"><?php if(!empty($infoNom)){echo $infoNom;} if(!empty($infoPrenom)){ echo " ".$infoPrenom;}?></div>  
    <div  class="infoPrati"><b>Numero Praticien : </b><?php if(!empty($infoNum)){echo $infoNum;}else{echo "Pas d'information";} ?></div>
    <div  class="infoPrati"><b>Code type Praticien :</b> <?php if(!empty($infoCode)){echo $infoCode;}else{echo "Pas d'information";}?></div>
    <div  class="infoPrati"><b>Nom Practicien :</b> <?php  if(!empty($infoNom)){echo $infoNom;}else{echo "Pas d'information";}?></div>
    <div  class="infoPrati"><b>Prenom Praticien :</b> <?php if(!empty($infoPrenom)){ echo $infoPrenom;}else{echo "Pas d'information";}?></div>
    <div  class="infoPrati"><b>Adresse Praticien :</b> <?php if(!empty($infoAdresse)){ echo $infoAdresse;}else{echo "Pas d'information";}?></div>
    <div  class="infoPrati"><b>Code postal Praticien :</b> <?php if(!empty($infoCp)){ echo $infoCp;}else{echo "Pas d'information";}?></div>
    <div  class="infoPrati"><b>Ville Praticien : </b><?php if(!empty($infoVille)){echo $infoVille;}else{echo "Pas d'information";}?></div>
    <div  class="infoPrati"><b>Coefficient Confiance Praticien :</b> <?php if(!empty($infoConfiance)){echo $infoConfiance;}else{echo "Pas d'information";}?></div>
    <div  class="infoPrati"><b>Coefficient Notorieté Praticien : </b><?php if(!empty($infoNotoriete)){ echo  $infoNotoriete;}else{echo "Pas d'information";}?></div>
</div>
</div>