<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>codesroots</title>

    <!-- Bootstrap -->
    <link href="<?=URL?>css/bootstrap.css" rel="stylesheet">

    <!-- Bootstrap RTL -->
    <link href="<?=URL?>css/bootstrap-rtl.min.css" rel="stylesheet">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">

    <!-- Main style -->
    <link href="<?=URL?>css/style.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="dashboard">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-2">
                    <div class="sideMenu">
                        <div class="person">
                            <div class="user-image">
                                <img src="<?=URL?>img/person.png" alt="">
                            </div>
                            <div class="user-name">
                                <p class="text-center">حسام احمد</p>
                            </div>
                            <nav>
                                <ul>
                                    <li><a href="<?=URL?>models"><i class="fas fa-file-invoice"></i> نماذج</a></li>
                                    <li><a href="<?=URL?>Studentanswers/chart"><i class="fas fa-chart-bar"></i> التقارير</a></li>
                                    <li><a href="<?=URL?>Studentanswers/chart"><i class="fas fa-chart-bar"></i> التقارير</a></li>
                                    <li><a href="<?=URL?>Studentanswers/chart"><i class="fas fa-chart-bar"></i> التقارير</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="header row">
                            <div class="col-sm-2">
                                <button class=" btn btn-default collapse-sideMenu"><i class="fas fa-bars"></i></button>
                            </div>
                            
                            <div class="col-sm-2 col-sm-offset-8">
                                <div class="btn-group ">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-cog"></i> </span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">الصفحه الشخصية</a></li>
                                        <li><a href="#">تسجيل خروج</a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                   
              
