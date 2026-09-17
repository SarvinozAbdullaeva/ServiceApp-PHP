<?php
include('../../inc/header_libs.php');
$header_title = 'List of Masters';

$usta = mysqli_query($link,"SELECT * FROM dic_usta 
                        ");

if(!isset($_REQUEST['err'])) {
    $error_show = 'display:none';
} else {
    $error_show = '';
}

?>
<title>Список Мастер</title>
</head>
<body>

<div class="container-fluid">

    <?php
    include('../../inc/sidebar.php');
    include('../../inc/navbar.php');
    ?>

    <div class="page-content">

        <a href="change.php" class="btn btn-info btn-sm float-right mb-3">Add New Master</a>

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
                    <th scope="col">Name/Surname</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Edit/Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $line=0;
                while($row = $usta->fetch_assoc()) {
                    $line+=1;
                    echo '<tr>
                            <th scope="row">'.$line.'</th>
                            <td>'.$row['name'].'</td>
                            <td>'.$row['phone'].'</td>
                            <td width="80px">
                                <a href="change.php?id='.$row['id'].'" class="btn btn-warning btn-sm py-0 px-2"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a href="delete.php?id='.$row['id'].'" class="btn btn-danger btn-sm py-0 px-2"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>';
                }
                ?>
                
            </tbody>
            </table>

    </div> <!-- .page-content -->

</div> <!-- .container-fluid -->

</body>
</html>