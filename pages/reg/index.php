<?php
include('../../inc/header_libs.php');
$header_title = 'Orders';

$list = mysqli_query($link,"SELECT *,
                (SELECT name FROM dic_client WHERE id=s1.client_id) as client_nomi,
                (SELECT name FROM dic_service WHERE id=s1.service_id) as service_nomi,
                TIMESTAMPDIFF(minute,qushilgan_vaqti,CONCAT(CURDATE(),' ',CURTIME())) as vaqt_farqi
            FROM doc_reg s1
            WHERE sana BETWEEN '".$sana1."' AND '".$sana2."'
            ORDER BY sana
            ");

if(!isset($_REQUEST['err'])) {
    $error_show = 'display:none';
} else {
    $error_show = '';
}

?>
<title>Заявки</title>
<meta http-equiv="refresh" content="60">
</head>
<body>

<div class="container-fluid">

    <?php
    include('../../inc/sidebar.php');
    include('../../inc/navbar.php');
    ?>

    <div class="page-content">

        <form action="index.php" method="get">
        
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="btn btn-outline-secondary" type="button">From</span>
            </div>
            <input type="date" class="form-control" name="sana1" value="<?=$sana1?>">
            <div class="input-group-prepend">
                <span class="btn btn-outline-secondary" type="button">to</span>
            </div>
            <input type="date" class="form-control" name="sana2" value="<?=$sana2?>">
            <input type="submit" class="form-control btn btn-info" value="Search">
        </div>
        
        </form>

        <!-- <a href="change.php" class="btn btn-info btn-sm float-right mb-3">Новый</a> -->

        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="<?=$error_show?>" >
            <strong>Ошибка: </strong> You should check in on some of those fields
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <table class="table table-sm table-striped table-hover">
            <thead class="bg-dark text-white">
                <tr>
                    <th scope="col">№</th>
                    <th scope="col">Date</th>
                    <th scope="col">Name/Surname</th>
                    <th scope="col">Product</th>
                    <th scope="col">Notes</th>
                    <th scope="col">Time Added</th>
                    <th scope="col">Time Waiting</th>
                    <!-- <th scope="col">Время</th>
                    <th scope="col">Ожидание</th> -->
                    <th scope="col">Status</th>
                    <th scope="col">Viewyj</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $line=0;
                $status = '';
                $kutish = '';
                $timer_status = '';
                while($row = $list->fetch_assoc()) {

                    switch($row['status_id']){

                        case 0:
                            $status = '<span class="badge badge-secondary pb-1">Новый</span>';
                            break;

                        case 1:
                            $status = '<span class="badge badge-info pb-1">Принято</span>';
                            break;

                        case 2:
                            $status = '<span class="badge badge-success pb-1">Готово</span>';
                            break;

                    }

                    if($row['vaqt_farqi']>=20 && $row['status_id'] = 0) {
                        $timer_status = 'table-danger';
                    }else{
                        $timer_status = '';
                    }

                    $line+=1;
                    echo '<tr class="'.$timer_status.'">
                            <th scope="row">'.$line.'</th>
                            <td>'.sana($row['sana']).'</td>
                            <td>'.$row['client_nomi'].'</td>
                            <td>'.$row['service_nomi'].'</td>
                            <td>'.$row['notes'].'</td>
                            <td>'.date("H:i",strtotime($row['qushilgan_vaqti'])).'</td>
                            <td>'.$row['vaqt_farqi'].' мин.</td>
                            <td>'.$status.'</td>
                            <td width="120px">
                                <input type="hidden" id="row_id" value="'.$row['id'].'" />
                                <button type="button" class="view_button btn btn-primary btn-sm py-0 px-2" data-toggle="modal" data-target="#viewModal"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                <a href="change.php?id='.$row['id'].'" class="btn btn-warning btn-sm py-0 px-2"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a href="" class="btn btn-danger btn-sm py-0 px-2"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>';
                }
                ?>
                
            </tbody>
            </table>

            <?php

                

            ?>

    </div> <!-- .page-content -->

</div> <!-- .container-fluid -->

<!-- Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Check Details: <span id="view_reg_title"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <center>
        <div id="view_loader" style="display:none;">
            <div class="spinner-border text-primary" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <div class="spinner-border text-secondary" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <div class="spinner-border text-success" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <div class="spinner-border text-danger" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        </center>

        <div id="view_reg_result"></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

</body>

<script>

$(".view_button").click(function() {
    $("#view_loader").show();
    $("#view_reg_result").hide();

    $.ajax({
        url:'view.php',
        type: 'POST',
        data: {
            id:$(this).parent().find('#row_id').val()
        },
        success: function(natija){
            $("#view_reg_result").html(natija);
            $("#view_loader").hide();
            $("#view_reg_result").show();
        }
    })
    
})

</script>

</html>