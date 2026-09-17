<?php
include('../../inc/header_libs.php');
$header_title = 'List of Brands';

$brand = mysqli_query($link,"SELECT * FROM dic_brand
                       ");

if(!isset($_REQUEST['err'])) {
    $error_show = 'display:none';
} else {
    $error_show = '';
}

?>
<title>Список Брeндов</title>
</head>
<body>

<div class="container-fluid">

    <?php
    include('../../inc/sidebar.php');
    include('../../inc/navbar.php');
    ?>

    <div class="page-content">

        <!-- <a href="change.php" class="btn btn-info btn-sm float-right mb-3">Новый</a> -->
        <button type="button" class="btn btn-primary float-right mb-3" data-toggle="modal" data-target="#exampleModal">Add New Brand</button>

        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="<?=$error_show?>" >
            <strong>Error: </strong> You should check in on some of those fields
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <table id="brandTable" class="table table-sm table-striped table-hover">
            <thead class="bg-dark text-white">
                <tr>
                    <th scope="col">№</th>
                    <th scope="col">Brand Name</th>
                  
                    <th scope="col">Edit/Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $line=0;
                while($row = $brand->fetch_assoc()) {
                    $line+=1;
                    echo '<tr>
                            <th scope="row">'.$line.'</th>
                            <td>'.$row['name'].'</td>
                           
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Brand Name</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form id="brandForm">
            <input type="hidden" id="order_num" value="<?=$line?>" />
            <input type="text" id="name" class="form-control" placeholder="Enter Brand Name" />
        </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="brandFormSubmit">Save</button>
      </div>
    </div>
  </div>
</div>

</body>

<script>

$("#brandFormSubmit").click(function(){
    $("#brandForm").submit();
})

$('#brandForm').submit(function(){
    return false;
})

$('#brandForm').submit(function(){

    $.ajax({
        url: 'ajax/save.php',
        type: 'POST',
        data: {
            nomi: $("#name").val()
        },
        success: function(qaytdi){
            if(qaytdi == 'false') {
                alert('Xatolik, qayta urinib kuring');
            }else{
                var ord_num = parseFloat($("#order_num").val())+1;
                $("#exampleModal").hide();
                $(".modal-backdrop").remove();  
                $("#brandTable").append('<tr><th scope="row">'+ord_num+'</th><td>'+$("#name").val()+'</td><td width="80px"><a href="change.php?id='+qaytdi+'" class="btn btn-warning btn-sm py-0 px-2"><i class="fa fa-pencil" aria-hidden="true"></i></a> <a href="delete.php?id='+qaytdi+'" class="btn btn-danger btn-sm py-0 px-2"><i class="fa fa-trash" aria-hidden="true"></i></a></td></tr>');
                $("#name").val('');
                $("#order_num").val(parseFloat($("#order_num").val())+1);
            }
        }
    })

})

</script>

</html>