<?php
include('../../inc/header_libs.php');
$header_title = 'Product Type';

if(!isset($_REQUEST['id'])) {

    $input_id = '';
    $value_name = '';
    $is_active = '';
   

} else {

    $id = $_REQUEST['id'];
    $input_id = '<input type="hidden" name="id" value="'.$id.'">';
    $edit_sql = mysqli_query($link, "SELECT * FROM dic_service WHERE id=".$id);
    $rr = $edit_sql->fetch_assoc();

    $value_name = $rr['name'];
    $is_active = $rr['is_active'];
   
}

?>
<title>Новый сервис</title>
</head>
<body>

<div class="container-fluid">
    <?php
    include('../../inc/sidebar.php');
    include('../../inc/navbar.php');
    ?>
    <div class="page-content">
        <div class="row">
            <div class="col-md-7 .col-sm-9">

                <form action="save.php" method="POST">

                    <?php echo $input_id; ?>

                    <div class="card">

                        <div class="card-body">
                        
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Name</span>
                                </div>
                                <input type="text" value="<?=$value_name?>" name="name" class="form-control" autocomplete="off" aria-label="Username" aria-describedby="basic-addon1" required>
                            </div> <!-- .input-group -->

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Active Status</span>
                                </div>
                                <input type="text" value="<?=$is_active?>" name="is_active" class="form-control" autocomplete="off" aria-label="Username" aria-describedby="basic-addon1" required>
                            </div> <!-- .input-group -->

                           
                        </div> <!-- .card-body -->

                        <div class="card-footer">
                            <input type="submit" class="btn btn-info float-right" value="Save" />
                            <input type="reset" class="btn btn-danger mr-3" value="Reset" />
                        </div> <!-- .card-footer -->

                    </div> <!-- .card -->

                </form>

            </div> <!-- .col-md-6 -->
        </div> <!-- .row -->
    </div> <!-- .page-content -->
</div> <!-- .container-fluid -->

</body>
</html>