<?php
use App\Model\PlanComptable;

$plan = new PlanComptable();
$plans = $plan->findAll();
$plansList = [];
foreach ($plans as $key => $value) {
    $elements = new PlanComptable();
    $elements->hydrated($value);
    $plansList[] = $elements;
}?>
<div class="pd-b-30 mg-t-40 mg-b-40 bg-white">
    <div>
            <div class="navigation-bar row space-btw align-center bgGray">
                <ul class="nav-tri row">
                    <li><a href="#" class="active-tri">Plan comptable</a></li>
                    <li><a href="#">Afficher Comptes</a></li>
                    <li><a href="#">Ajouter comptes</a></li>
                </ul>
                <form action="">
                    <input type="text" placeholder="Rechercher plan comptable">
                </form>
            </div>
    </div>
    <div class="container-content">
        <h2>Tous les comptes</h2>
        <table>
            <thead>
                <th>Numero</th>
                <th>Classe</th>
                <th>Code Comptable</th>
                <th>Designation Compte</th>
                <th>Compte Principal</th>
            </thead>
            <tbody>
        <?php
        foreach ($plansList as $key => $value) {
        ?>
        <tr>
            <td><?php echo $value->getIdPlanComptable(); ?></td>
            <td><?php echo $value->getNumclasse(); ?></td>
            <td><?php echo $value->getNumCompte(); ?></td>
            <td><?php echo $value->getDesiOperation(); ?></td>
            <td><?php echo $value->getComptePrinci(); ?></td>
        </tr>
        <?php } ?>
        </tbody>
        </table>
    </div>
</div>