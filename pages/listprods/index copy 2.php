<?php
include('../../inc/header_libs.php');
$header_title = 'List of Products';

$list = mysqli_query($link,"SELECT *,
                (SELECT name FROM dic_service WHERE id=s1.name) as name,
                (SELECT name FROM dic_brand WHERE id=s1.brand) as brand
                 FROM dic_products s1");

if(!isset($_REQUEST['err'])) {
    $error_show = 'display:none';
} else {
    $error_show = '';
}

?>
<title>Список товаров</title>
</head>
<body>

<div class="container-fluid">

    <?php
    include('../../inc/sidebar.php');
    include('../../inc/navbar.php');
    ?>

    <div class="page-content">

        <a href="change.php" class="btn btn-info btn-sm float-right mb-3">Add New Product</a>

        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="<?=$error_show?>" >
            <strong>Error: </strong> You should check in on some of those fields
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <table class="table table-sm table-striped table-hover">
            <thead class="bg-dark text-white">
                <tr>
                    <th scope="col">№</th>
                    <th scope="col">Product Type</th>
                    <th scope="col">Brand Name</th>
                    <th scope="col">Version</th>
                    <th scope="col">Item</th>
                    <th scope="col">Edit/Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $line=0;
                while($row = $list->fetch_assoc()) {
                    $line+=1;
                    echo '<tr>
                            <th scope="row">'.$line.'</th>
                            <td>'.$row['name'].'</td>
                            <td>'.$row['brand'].'</td>
                            <td>'.$row['code'].'</td>
                            <td>'.$row['item'].'</td>
                            <td width="80px">'.action_buttons($row['id']).'</td>
                        </tr>';
                }
                ?>
                
            </tbody>
            </table>

    </div> <!-- .page-content -->

</div> <!-- .container-fluid -->

</body>
</html>