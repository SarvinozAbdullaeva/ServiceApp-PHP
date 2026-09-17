<?php

include('../../inc/connect.php');

$sql = mysqli_query($link, "SELECT product_id, (SELECT name FROM dic_brand WHERE id=t1.product_id) as tovar_nomi,
                    model, seriyasi, notes
                    FROM doc_reg_list t1 WHERE reg_id=".$_POST['id'])

?>

<table class="table table-sm table-striped table-hover">
    <thead class="bg-dark text-white">
        <tr>
            <th scope="col">№</th>
            <th scope="col">Product Type</th>
            <th scope="col">Model</th>
            <th scope="col">Version</th>
            <th scope="col">Notes</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $line=0;
        while($row = $sql->fetch_assoc()) {

            $line+=1;
            echo '<tr>
                    <th scope="row">'.$line.'</th>
                    <td>'.$row['tovar_nomi'].'</td>
                    <td>'.$row['model'].'</td>
                    <td>'.$row['seriyasi'].'</td>
                    <td>'.$row['notes'].'</td>
                </tr>';
        }
        ?>
        
    </tbody>
</table>