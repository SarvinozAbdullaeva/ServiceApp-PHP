<?php
include('../../inc/header_libs.php');
$header_title = 'Добавить новый клиент';

$regions = mysqli_query($link, "SELECT * FROM dic_region");

if(!isset($_REQUEST['id'])) {

    $input_id = '';
    $value_name = '';
    $value_phone = '';
    $value_address = '';
    $value_reg_id = '';

} else {

    $id = $_REQUEST['id'];
    $input_id = '<input type="hidden" name="id" value="'.$id.'">';
    $edit_sql = mysqli_query($link, "SELECT * FROM dic_client WHERE id=".$id);
    $rr = $edit_sql->fetch_assoc();

    $value_name = $rr['name'];
    $value_phone = $rr['phone'];
    $value_address = $rr['adress'];
    $value_reg_id = $rr['reg_id'];

}

?>
<title>Новый клиент</title>
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
                                    <span class="input-group-text" id="basic-addon1">Ф.И.О</span>
                                </div>
                                <input type="text" value="<?=$value_name?>" name="name" class="form-control" autocomplete="off" aria-label="Username" aria-describedby="basic-addon1" required>
                            </div> <!-- .input-group -->

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Адрес</span>
                                </div>
                                <input type="text" value="<?=$value_address?>" name="address" class="form-control" autocomplete="off" aria-label="Username" aria-describedby="basic-addon1" required>
                            </div> <!-- .input-group -->

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Телефон</span>
                                </div>
                                <input type="text" value="<?=$value_phone?>" name="phone" class="form-control" autocomplete="off" aria-label="Username" aria-describedby="basic-addon1" required>
                            </div> <!-- .input-group -->

                            <div class="input-group mb-0">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Регион</span>
                                </div>
                                <select name="region_id" class="form-control" required>
                                    <?php
                                    while($row = $regions->fetch_assoc()) { 
                                    ?>
                                        <option value="<?=$row['id']?>" <?php if($row['id']==$value_reg_id) echo 'selected'; ?> ><?=$row['name']?></option>    
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div> <!-- .input-group -->

                        </div> <!-- .card-body -->

                        <div class="card-footer">
                            <input type="submit" class="btn btn-info float-right" value="Сохранить" />
                            <input type="reset" class="btn btn-danger mr-3" value="Очистить" />
                        </div> <!-- .card-footer -->

                    </div> <!-- .card -->

                </form>

            </div> <!-- .col-md-6 -->
        </div> <!-- .row -->
    </div> <!-- .page-content -->
</div> <!-- .container-fluid -->

</body>
</html>