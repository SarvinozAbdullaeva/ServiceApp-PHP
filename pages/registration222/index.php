<?php
include('../../inc/header_libs.php');
$header_title = 'Новая регистрация';

$clients = mysqli_query($link, "SELECT * FROM dic_client");
$services = mysqli_query($link, "SELECT * FROM dic_service");
$products = mysqli_query($link, "SELECT * FROM dic_products");

if(!isset($_REQUEST['err'])) {
    $error_show = 'display:none';
} else {
    $error_show = '';
}

?>
<title>Новая регистрация</title>
</head>
<body>

<div class="container-fluid">

    <?php
    include('../../inc/sidebar.php');
    include('../../inc/navbar.php');
    ?>

    <div class="page-content">
        
        <form action="save.php">
            <div class="row">
                <div class="col-md-6">
                    <?php include('part1.php'); ?>
                </div>
                <div class="col-md-6">
                    <?php //include('part2.php'); ?>
                </div>
            </div>
        </form>
            
    </div> <!-- .page-content -->

</div> <!-- .container-fluid -->

</body>
</html>