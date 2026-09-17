<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сервис - бытовая техника</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/css/login.css">

    <?php
    if(!isset($_REQUEST['err'])) {
        $alert = 'display:none';
    } else {
        $alert = '';
    }
    ?>

</head>
<body>
<div class="transp"></div>
<div class="container">

    <div class="card">
        <img src="../../assets/img/logo_2x.png" alt="">

        <form action="check.php" class="login-form">

            <div class="input-group flex-nowrap">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping"><i class="fa fa-user-o" aria-hidden="true"></i></span>
                </div>
                <input type="text" name="username" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
            </div>

            <div class="input-group flex-nowrap">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping"><i class="fa fa-key" aria-hidden="true"></i></span>
                </div>
                <input type="text" name="password" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="addon-wrapping">
            </div>

            <input type="submit" class="btn btn-dark btn-block" value="Log In">

            <div class="alert alert-danger" role="alert" style="<?=$alert?>" >
                    Error Login
            </div>

        </form>
    </div>

</div>
    
</body>
</html>