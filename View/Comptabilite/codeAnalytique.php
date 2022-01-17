<div class="pd-b-30 mg-t-40 bg-white ">
    <div class="navigation-bar row flex-end align-center bgGray pd-t-b-20">

        <form action="">
            <input type="text" placeholder="Retrouver une entreprise">
        </form>
    </div>
    <div class= "container-content ">
        <div class="title">
            <h2>Liste des Comptes Analytiques</h2>
        </div>
        <div class="board">
            <?php 
                if(count($codeAnalList) == 0) {
                    echo '<h3>Aucun Code Analytique trouve</h3>';
                }
                else {?>
                    <form action="">
                        <table>
                            <thead>
                                <th></th>
                                <th>Designation</th>
                                <th>Date de creation</th>
                            </thead>
                            <tbody>
                           
                            <?php 
                                foreach ($codeAnalList as $key => $value) {?>
                                    <tr>
                                        <td>
                                            <input type="radio" name="entreprise" id="<?php $value->getIdCompteAnalytique() ?>">
                                        </td>
                                        <td>
                                            <?php echo utf8_encode($value->getDesiAnal());?>
                                        </td>
                                        <td>
                                            <?php echo $value->getDateAnal();?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </form>
            <?php }
            ?>
        </div>
    </div>
</div>