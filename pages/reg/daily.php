<?php
include('../../inc/header_libs.php');
$header_title = 'Daily Orders';

$list = mysqli_query($link,"SELECT reg_id, id, product_id, (SELECT name FROM dic_brand WHERE id=t1.product_id) as prod_name,
                        model, seriyasi, (SELECT notes FROM doc_reg WHERE id=t1.reg_id) as notes,
                        
                        (SELECT COUNT(*) FROM doc_remont WHERE doc_reg_list_id=t1.id) as cc
                    FROM doc_reg_list t1
                    WHERE (SELECT sana FROM doc_reg WHERE id=t1.reg_id)='".$sana1."'
            ");

$usta = mysqli_query($link, "SELECT * FROM dic_usta");

if(!isset($_REQUEST['err'])) {
    $error_show = 'display:none';
} else {
    $error_show = '';
}

?>
<title>Заявки</title>
</head>
<body>

<div class="container-fluid">

    <?php
    include('../../inc/sidebar.php');
    include('../../inc/navbar.php');
    ?>

    <div class="page-content">

        <form action="daily.php" method="get">
        
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="btn btn-outline-secondary" type="button">Date</span>
            </div>
            <input type="date" class="form-control" name="sana1" value="<?=$sana1?>">
            <input type="submit" class="form-control btn btn-info" value="Search">
        </div>
        
        </form>

        <h3>Daily Orders</h3>
        <hr />

        <div class="row">
        <?php
        while($rr = $list->fetch_assoc()){

            if($rr) {
                $show_submit1 = 'display:none;';
                $show_submit2 = '';
                $bg_status = 'bg-success';
                $color_status = 'text-white';
            }else{
                $show_submit1 = '';
                $show_submit2 = 'display:none;';
                $bg_status = '';
                $color_status = '';
            }

            echo '<div class="col-md-4">';
            echo '<div class="card mb-3">
                    <div class="card-header">
                    '.$rr['prod_name'].'
                    </div>
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">Model: '.$rr['model'].' <br />Серия: '.$rr['seriyasi'].'</h6>
                        <p>Примечание: '.$rr['notes'].'</p>                        
                    </div>
                    <div class="card-footer '.$bg_status.' '.$color_status.'">
                        
                        <h5 style="'.$show_submit2.'">Заказ принято</h5>
                    </div>
                </div>';
            echo '</div>';
        }        
        ?>
        </div>
        

        


    </div> <!-- .page-content -->

</div> <!-- .container-fluid -->

</body>
</html>