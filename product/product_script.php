<?php
error_reporting(0);
include '../config.php';
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <link rel="icon" href="../../assets/images/favicon.png" type="image/gif" sizes="16x16">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Rexello Castors - Welcome to the world of rexello</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/modern-business.css" rel="stylesheet">
        <link href="../css/tab.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
        <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.js"></script>
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../css/simplePagination.css" />
        <script src="../js/jquery.simplePagination.js"></script>
        <style>
            td {
                padding: 5px;
            }
            td p {
                color: #02294E;
            }
        </style>


    </head>

    <body style="background: #F1F1F1; background:url(../images/background.png")>

        <!-- Navigation -->
        <?php
        //error_reporting('E_ALL ^ E_NOTICE');
        // mysql_connect('localhost', 'root', '') or die(mysql_error());
        // mysql_select_db('new') or die(mysql_error());
        $page = $_REQUEST['id'];
        $limit = 10;
        if ($page == '') {
            $page = 1;
            $start = 0;
        } else {
            $start = $limit * ($page - 1);
        }
        $query = mysql_query("select * from products limit $start, $limit") or die(mysql_error());
        $tot = mysql_query("select * from products") or die(mysql_error());
        $total = mysql_num_rows($tot);
        $num_page = ceil($total / $limit);

        echo'<table><th>Reg.Id</th><th>Name</th><th>Category</th>';

        while ($res = mysql_fetch_array($query)) {
            echo'<tr><td>' . $res['game_ID'] . '</td><td>' . $res['game_Title'] . '</td><td>' . $res['category_Name'] . '</td></tr>';
        }
        echo'</table>';

        function pagination($page, $num_page) {
            echo '<ul style="list-style-type:none;">';
            for ($i = 1; $i <= $num_page; $i++) {
                if ($i == $page) {
                    echo'<li style="float:left;padding:5px;">' . $i . '</li>';
                } else {
                    echo'<li style="float:left;padding:5px;"><a href="pagination.php?id=' . $i . '">' . $i . '</a></li>';
                }
            }
            echo '</ul>';
        }

        if ($num_page > 1) {
            pagination($page, $num_page);
        }
        ?> 

        <!-- Page Content -->
        <div class="container">

            <!-- Page Heading/Breadcrumbs -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Light Duty
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li> <a href="../index.php">Home</a> </li>
                        <li> <a href="#">Light Duty</a></li>
                        <li class="active"></li>

                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">

                <!-- Blog Entries Column -->
                <div class="col-md-9">

                    <!-- First Blog Post -->

                    <div class="des">
                        <hr>



                        </hr>
                        <div class="row">
                            <div class="col-md-12">
                                <label>
                                    <small>
                                        Your selection:  
                                        <strong>(67 Products)</strong>
                                    </small>
                                </label>
                                <nav class="navbar navbar-default">
                                    <div class=" col-xs-12 col-md-6" style="padding-left:10px;">
                                        <ul class="pagination pagination-sm" style="margin:7px;">
                                            <li><a href="#">1</a></li>
                                            <li class="active"><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li><a href="#">5</a></li>
                                        </ul>
                                    </div>
                                    <div class=" col-xs-12 col-md-6">
                                        <div class="col-md-4 col-md-offset-6">
                                            <ul class="pagination pagination-sm" style="margin:7px;">
                                                <li><a href="product-list.php"><i class="glyphicon glyphicon-th-list"></i></a></li>
                                                <li class="active"><a href="product-grid.php"><i class="glyphicon glyphicon-th"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-2">
                                            <select class="pagination btn btn-default btn-sm dropdown-toggle" onChange="setLocation(this.value)" style="margin:7px;">
                                                <option value="#">
                                                    5                                </option>
                                                <option value="#">
                                                    10                                </option>
                                                <option value="#">
                                                    15                                </option>
                                                <option value="#">
                                                    20                                </option>
                                                <option value="#">
                                                    25                                </option>
                                            </select>

                                        </div>
                                    </div>


                                </nav>
                            </div>

                            <!-- product views start -->

                            <?php
                            $sql = "select * from products";
                            $res = mysql_query($sql);
                            if (mysql_num_rows($res) != 0) {
                                while ($row = mysql_fetch_array($res)) {
                                    ?>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="panel panel-default text-center">
                                            <div class="panel-heading" style="height:150px;">
                                                <span class="fa-stack fa-5x">
                                                    <img src="../<?php echo $row['image']; ?>" class="img-responsive"> 
                                                </span>

                                            </div>
                                            <div class="panel-heading" style="height:70px;">
                                                <div class="row" style="font-size:11px; color:#999999;">
                                                    <div class="col-md-4 col-xs-4 pull-left">
                                                        <span class="fa-stack fa-1x" style="width:4em; line-height: 0em;"><a href="#"> <img src="../images/cc.png" class="img-responsive"></a><?php echo $row['height_with_blindhole']; ?> mm</span>
                                                    </div>
                                                    <div class="col-md-4 col-xs-4">
                                                        <span class="fa-stack fa-1x" style="width:4em; line-height: 0em;"><a href="#"> <img src="../images/mm.png" class="img-responsive"></a><?php echo $row['wheel_diameter']; ?> mm</span>
                                                    </div>
                                                    <div class="col-md-4 col-xs-4 pull-right">
                                                        <span class="fa-stack fa-1x" style="width:4em; line-height: 0em;"><a href="#"> <img src="../images/kg.png" class="img-responsive"></a><?php echo $row['load_carrying_capacity']; ?> kg</span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="panel-body">
                                                <h4 style="color:#004080; font-size:12px; font-weight:bold; font-family:Verdana, Arial, Helvetica, sans-serif;"><?php echo $row['product_code']; ?></h4>
                                                <a href="product-details.php" class="btn btn-primary">Know More</a>
                                            </div>

                                            <div class="choose">
                                                <ul class="nav nav-pills nav-justified">
                                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                                    <li><a href="#"><i class="fa fa-plus-square"></i>Send Request</a></li>
                                                </ul>
                                            </div>


                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>

                            <!-- product views end -->







                        </div>

                        <div class="col-md-12">
                            <label>
                                <small>
                                    Your selection:  
                                    <strong>(67 Products)</strong>
                                </small>
                            </label>
                            <nav class="navbar navbar-default">
                                <div class=" col-xs-12 col-md-6" style="padding-left:10px;">
                                    <ul class="pagination pagination-sm" style="margin:7px;">
                                        <li><a href="#">1</a></li>
                                        <li class="active"><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                    </ul>
                                </div>
                                <div class=" col-xs-12 col-md-6">
                                    <div class="col-md-4 col-md-offset-6">
                                        <ul class="pagination pagination-sm" style="margin:7px;">
                                            <li><a href="#"><i class="glyphicon glyphicon-th-list"></i></a></li>
                                            <li class="active"><a href="#"><i class="glyphicon glyphicon-th"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-2">
                                        <select class="pagination btn btn-default btn-sm dropdown-toggle" onChange="setLocation(this.value)" style="margin:7px;">
                                            <option value="#">
                                                5                                </option>
                                            <option value="#">
                                                10                                </option>
                                            <option value="#">
                                                15                                </option>
                                            <option value="#">
                                                20                                </option>
                                            <option value="#">
                                                25                                </option>
                                        </select>

                                    </div>
                                </div>


                            </nav>
                        </div>


                        <div class="grap">
                            <p>

                            </p>

                        </div>
                    </div>

                </div>

                <!-- Blog Sidebar Widgets Column -->
                <div class="col-md-3 company">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><h2 style="font-size:16px;"><i class="fa fa-search" aria-hidden="true"></i>product filter</h2></div>
                        <div class="panel-body">
                            <!--
                                                        <form method="get" action="">
                            -->
                            <div class="panel-body" id="">
                                <div class="row">
                                    <div class="col-md-12" style="margin-bottom:10px;">
                                        <label><small>Free text search:</small></label>
                                        <form method="get" action="">
                                            <input class="form-control input-sm" type="text" onChange="updateFormFields(this);" name="query" value="">
                                        </form>
                                    </div>
                                    <?php

                                    function search() {
                                        $query = $_GET['query'];
                                        // gets value sent over search form

                                        $min_length = 1;
                                        // you can set minimum length of the query if you want

                                        if (strlen($query) >= $min_length) { // if query length is more or equal minimum length then
                                            $query = htmlspecialchars($query);


                                            $query = mysql_real_escape_string($query);
                                            // makes sure nobody uses SQL injection

                                            $raw_results = mysql_query("SELECT * FROM products
                                     WHERE (`product_code` LIKE '%" . $query . "%') ") or die(mysql_error());


                                            if (mysql_num_rows($raw_results) > 0) { // if one or more rows are returned do following
                                                while ($results = mysql_fetch_array($raw_results)) {
                                                    // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop

                                                    echo "<p><h3>" . $results['product_code'] . "</h3>" . $results['product_weight'] . "<br>height_with_blindhole" . $results['height_with_blindhole'] . "</p>";
                                                    ?>

                                                    <span class="fa-stack fa-5x">
                                                        <img src="../<?php echo $results['image']; ?>" class="img-responsive"> 
                                                    </span>
                                                    <?php
                                                }
                                            } else { // if there is no matching rows do following
                                                echo "No results";
                                            }
                                        } else { // if query length is less than minimum
                                            echo "Minimum length is " . $min_length;
                                        }
                                    }

                                    search();
                                    ?>
                                </div>  

                                <div class="row">
                                    <div class="col-md-12" style="margin-bottom:10px;">
                                        <div class="col-md-12"><label><small>Wheel diameter:</small></label></div>
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <select name="wheel-diameter-min" onChange="validateSelectMinChange(this);
                                                        updateFormFields(this);" class="form-control input-sm">
                                                    <option value="" selected="selected">
                                                        -                                </option>
                                                    <option value="50">
                                                        50 mm                                </option>
                                                    <option value="65">
                                                        65 mm                                </option>
                                                    <option value="75">
                                                        75 mm                                </option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="wheel-diameter-max" onChange="validateSelectMaxChange(this); updateFormFields(this);" class="form-control input-sm">
                                                    <option value="" selected="selected">
                                                        -                                </option>
                                                    <option value="50">
                                                        50 mm                                </option>
                                                    <option value="65">
                                                        65 mm                                </option>
                                                    <option value="75">
                                                        75 mm                                </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12" style="margin-bottom:10px;">
                                        <label><small>Fitting:</small></label>
                                        <select name="fitting" onChange="updateFormFields(this);" class="form-control input-sm">
                                            <option value="" selected="selected">
                                                All fittings                        </option>
                                            <option value="4">
                                                Metal stem with circlip                        </option>
                                        </select>
                                        <!--<div class="col-md-2">
                                            <button type="button"  class="btn btn-tente popoverButton" data-toggle="popover" data-placement="right" data-content="Lorem Ipsum Donor." title="This is a demo popover"><i class=" glyphicon glyphicon-info-sign"></i></button>   
                                        </div>-->
                                    </div>
                                </div>  

                                <div class="row">
                                    <div class="col-md-12" style="margin-bottom:10px;">
                                        <div class="col-md-12"><label><small>Load capacity:</small></label></div>
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <select name="load-capacity-min" onChange="validateSelectMinChange(this); updateFormFields(this);" class="form-control input-sm">
                                                    <option value="">
                                                        -                                </option>
                                                    <option value="40">
                                                        40 kg                                </option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="load-capacity-max" onChange="validateSelectMaxChange(this); updateFormFields(this);" class="form-control input-sm">
                                                    <option value="">
                                                        -                                </option>
                                                    <option value="40">
                                                        40 kg                                </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">    
                                    <div class="col-md-12" style="margin-bottom:10px;">
                                        <label><small>All types:</small></label>
                                        <select name="housing" onChange="updateFormFields(this);" class="form-control input-sm">
                                            <option value="" selected="selected">
                                                All types                        </option>
                                            <option value="9">
                                                Special Solutions                        </option>
                                            <option value="0">
                                                Swivel Castors                        </option>
                                            <option value="3">
                                                Swivel Castors with intermittend brake                        </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12" style="margin-bottom:10px;">
                                        <label><small>All wheel bearings:</small></label>
                                        <select name="wheel-type" onChange="updateFormFields(this);" class="form-control input-sm">
                                            <option value="" selected="selected">
                                                All wheel bearings                        </option>
                                            <option value="4">
                                                Wheel with plain bearing                        </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" style="margin-bottom:10px;">
                                        <div class="col-md-12">
                                            <label><small>Overall height:</small></label>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <select name="overall-height-min" onChange="validateSelectMinChange(this); updateFormFields(this);" class="form-control input-sm">
                                                    <option value="">
                                                        -                                </option>
                                                    <option value="33">
                                                        33 mm                                </option>
                                                    <option value="39">
                                                        39 mm                                </option>
                                                    <option value="58">
                                                        58 mm                                </option>
                                                    <option value="59">
                                                        59 mm                                </option>
                                                    <option value="61">
                                                        61 mm                                </option>
                                                    <option value="72">
                                                        72 mm                                </option>
                                                    <option value="75.5">
                                                        76 mm                                </option>
                                                    <option value="81">
                                                        81 mm                                </option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="overall-height-max" onChange="validateSelectMaxChange(this); updateFormFields(this);" class="form-control input-sm">
                                                    <option value="">
                                                        -                                </option>
                                                    <option value="33">
                                                        33 mm                                </option>
                                                    <option value="39">
                                                        39 mm                                </option>
                                                    <option value="58">
                                                        58 mm                                </option>
                                                    <option value="59">
                                                        59 mm                                </option>
                                                    <option value="61">
                                                        61 mm                                </option>
                                                    <option value="72">
                                                        72 mm                                </option>
                                                    <option value="75.5">
                                                        76 mm                                </option>
                                                    <option value="81">
                                                        81 mm                                </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>    




                                <div class="row">
                                    <br>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-default col-md-12" onClick="resetProductFilterForm(this);"><i class="glyphicon glyphicon-remove"></i> Reset filter</button><br><br>
                                        <button type="submit" class="btn btn-tente col-md-12"><i class="glyphicon glyphicon-search"></i> Search</button>

                                        <input type="hidden" name="category" value="10">

                                    </div>
                                </div>
                            </div>
                            </form>

                        </div>
                    </div>

                </div>

                <?php
                $query = $_GET['query'];
                if ($query) {
                    // gets value sent over search form

                    $min_length = 1;
                    // you can set minimum length of the query if you want

                    if (strlen($query) >= $min_length) { // if query length is more or equal minimum length then
                        $query = htmlspecialchars($query);
                        // changes characters used in html to their equivalents, for example: < to &gt;

                        $query = mysql_real_escape_string($query);
                        // makes sure nobody uses SQL injection

                        $raw_results = mysql_query("SELECT * FROM products
                                      WHERE (`product_code` LIKE '%" . $query . "%') ") or die(mysql_error());

                        // * means that it selects all fields, you can also write: `id`, `title`, `text`
                        // articles is the name of our table
                        // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
                        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
                        // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'

                        if (mysql_num_rows($raw_results) > 0) { // if one or more rows are returned do following
                            while ($results = mysql_fetch_array($raw_results)) {
                                // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop

                                echo "<p><h3>" . $results['product_code'] . "</h3>" . $results['product_weight'] . "<br>height_with_blindhole" . $results['height_with_blindhole'] . "</p>";
                                ?>

                                <span class="fa-stack fa-5x">
                                    <img src="../<?php echo $results['image']; ?>" class="img-responsive"> 
                                </span>

                                <?php
//return all products details after search
                                // posts results gotten from database(title and text) you can also show id ($results['id'])
                            }
                        }
                    }
                }
                ?>
                <!-- /.col-lg-6 -->
                <!--secound pannel-- <div class="col-lg-6">
                     <ul class="list-unstyled">
                         <li><a href="#">Category Name</a>
                         </li>
                         <li><a href="#">Category Name</a>
                         </li>
                         <li><a href="#">Category Name</a>
                         </li>
                         <li><a href="#">Category Name</a>
                         </li>
                     </ul>
                 </div>
                <!--secound pannel-->


                <!-- /.col-lg-6 -->
            </div>

        </div>

    </div>

</div>
<!-- /.row -->

<hr>

<!-- Footer -->


</div>

<!-- /.container -->
<footer>

</footer>
<!-- jQuery -->
<script src="../js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>

<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<!-- Script to Activate the Carousel -->
<script>
                                            $('.carousel').carousel({
                                                interval: 5000 //changes the speed
                                            })
</script>
<script>
    $('#buttonsearch').click(function () {
        $('#formsearch').slideToggle("fast", function () {
            $('#content').toggleClass("moremargin");
        });
        $('#searchbox').focus()
        $('.openclosesearch').toggle();
    });

</script>
<script>
    jQuery(document).ready(function () {
        $(".dropdown").hover(
                function () {
                    $('.dropdown-menu', this).stop().fadeIn("fast");
                },
                function () {
                    $('.dropdown-menu', this).stop().fadeOut("fast");
                });
    });
</script>
<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tabcontent.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>
<script>
    $(document).ready(function () {

        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('.scrollup').fadeIn();
            } else {
                $('.scrollup').fadeOut();
            }
        });

        $('.scrollup').click(function () {
            $("html, body").animate({scrollTop: 0}, 600);
            return false;
        });

    });

</script>


</body>

</html>
