<?php
include('../../inc/header_libs.php');
$header_title = 'Add New Product';
$brands = mysqli_query($link, "SELECT * FROM dic_brand");
$service = mysqli_query($link, "SELECT * FROM dic_service");

if(!isset($_REQUEST['id'])) {

    $input_id = '';
    $value_name = '';
    $value_brand = '';
    $value_code = '';
    $value_item = '';

} else {

    $id = $_REQUEST['id'];
    $input_id = '<input type="hidden" name="id" value="'.$id.'">';
    $edit_sql = mysqli_query($link, "SELECT * FROM dic_products WHERE id=".$id);
    $rr = $edit_sql->fetch_assoc();

    $value_name = $rr['name'];
    $value_brand = $rr['brand'];
    $value_code = $rr['code'];
    $value_item = $rr['item'];

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
                                    <span class="input-group-text" id="basic-addon1">Product Type</span>
                                </div>
                                <select name="name" class="form-control" required>
                                    <?php
                                    while($row = $service->fetch_assoc()) { 
                                    ?>
                                        <option value="<?=$row['id']?>" <?php if($row['id']==$value_name) echo 'selected'; ?> ><?=$row['name']?></option>    
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div> <!-- .input-group -->

                            <div class="input-group mb-3 ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Brand Name</span>
                                </div>
                                <select name="brand" class="form-control" required>
                                    <?php
                                    while($row = $brands->fetch_assoc()) { 
                                    ?>
                                        <option value="<?=$row['id']?>" <?php if($row['id']==$value_brand) echo 'selected'; ?> ><?=$row['name']?></option>    
                                    <?php
                                    }
                                    ?>
                                </select>
                           </div> <!-- .input-group -->

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Version</span>
                                </div>
                                <input type="text" value="<?=$value_code?>" name="code" class="form-control" autocomplete="off" aria-label="Username" aria-describedby="basic-addon1" required>
                            </div> <!-- .input-group -->

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Item Name</span>
                                </div>
                                <input type="text" value="<?=$value_item?>" name="item" class="form-control" autocomplete="off" aria-label="Username" aria-describedby="basic-addon1" required>
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