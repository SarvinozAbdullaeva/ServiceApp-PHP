<?php
include('../../inc/header_libs.php');
$header_title = 'Registration';

$clients = mysqli_query($link, "SELECT * FROM dic_client");
$services = mysqli_query($link, "SELECT * FROM dic_service");
$brands= mysqli_query($link, "SELECT * FROM dic_brand");

$list = mysqli_query($link,"SELECT *,
                (SELECT notes FROM doc_reg WHERE id=s1.notes) as notes
                
                 FROM dic_reg_list s1");

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
        
        <form id="regClient">
            <div class="row">
                <div class="col-md-6">
                    <?php include('part1.php'); ?>
                </div>
            </div>
        </form>

        <div class="row" style="display:none" id="stepProduct">
            <div class="col-md-12">

                <form id="regProduct">
                    <input type="hidden" id="reg_id" />
                    <input type="hidden" id="notes" />
                    <?php include('part2.php'); ?>
                </form>

                <table class="table table-hover table-striped" id="prodTable">
                    <thead>
                        <tr>
                            <th>Brand Name</th>
                            <th>Model</th>
                            <th>Version</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>

                <a href="../../pages/reg" class="btn btn-info">Save</a>
                
            </div>
        </div>
            
    </div> <!-- .page-content -->

</div> <!-- .container-fluid -->
</body>

<script type="text/javascript">

    $("#regClient").submit(function() {
        return false;
    })

    $("#regClient").submit(function() {

        $("#loading1").show();
        $("#btn_submit").hide();
        $.ajax({
            url: "save.php",
            type: "POST",
            data: {
                client_id: $("#client_id").val(),
                service_id: $("#service_id").val(),
                status_id: $("#status_id").val(),
                sana: $("#date").val(),
                notes: $("#notes").val()

            },
            success: function(response) {

                if(response == 'false') {
                    alert('Xatolik');
                }else{
                    $("#reg_id").val(response);
                    $("#regClient").slideUp(1000);
                    $("#stepProduct").slideDown(1000);
                }

            }
        })

    });



    /* ADD PRODUCT */
    $("#regProduct").submit(function() {
        return false;
    })

    $("#regProduct").submit(function() {

        var table = $("#prodTable");

        $.ajax({
            url: "save_product.php",
            type: "POST",
            data: {
                model: $("#model").val(),
                seriya: $("#seriya").val(),
                product_id: $("#product_id").val(),
                reg_id: $("#reg_id").val()
            },
            success: function(response) {

                if(response === 'false') {
                    alert("Error");
                }else{
                    table.append('<tr><td>'+$('#product_id option:selected').text()+'</td><td>'+$('#model').val()+'</td><td>'+$('#seriya').val()+'</td></tr>')
                }

            }
        })

    });



  
</script>

</html>