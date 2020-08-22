<section class="hero">
    <h1 class="title">
        Mes statistiques des rapports de visite </h1>
</section>

<div class="container is-fluid">
    <table>
        <?php
        if($lesRapports==true){
            ?>
            <tr>
                <td class="alterned">Identité</td>
                <td class="alterned">Bilan</td>
                <td class="alterned">Impact</td>
                <td class="alterned">Motif</td>
                <td class="alterned">Autre motif</td>
                <td class="alterned">Praticien</td>
                <td class="alterned">Praticien R</td>
                <td class="alterned">1er médicament</td>
                <td class="alterned">2ème médicament</td>
                <td class="alterned">Date de visite</td>
                <td>Etat</td>
            </tr>

            <?php

            foreach($lesRapports as $Rapport){
                $medicament1=$pdo-> getleNomMedicament($Rapport['rap_produit1']);
                $medicament2=$pdo-> getleNomMedicament($Rapport['rap_produit2']);
                $remplacant=$pdo->affichageNomPraticien($Rapport['pra_numRem']);
                $num=$Rapport['rap_num'];

                ?>

                <tr>
                    <td class="alterned"><?php echo $Rapport['col_nom'].' '. $Rapport['col_prenom'];?></td>
                    <td class="alterned"><?php echo $Rapport['rap_bilan'];?></td>
                    <td class="alterned"><?php echo $Rapport['rap_impact'];?></td>
                    <td class="alterned"><?php echo $Rapport['mot_libelle'];?></td>
                    <td class="alterned"><?php echo $Rapport['rap_AutreMotif'];?></td>
                    <td class="alterned"><?php echo $Rapport['pra_nom'].' ' .$Rapport['pra_prenom'];?></td>
                    <td class="alterned"><?php echo $remplacant['pra_nom'].' ' .$remplacant['pra_prenom'];?></td>
                    <td class="alterned"><?php echo $medicament1['med_nomCommercial'];?></td>
                    <td class="alterned"><?php echo $medicament2['med_nomCommercial'];?></td>
                    <td class="alterned"><?php echo $Rapport['rap_dateVisite'];?></td>
                    <td><?php echo $Rapport['eta_libelle']?></td>
                </tr>



            <?php }}?>

    </table>
</div>
