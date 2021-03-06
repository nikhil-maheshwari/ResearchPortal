<?php
include("config.php")
?>
<!DOCTYPE html>
<html>
<head>
<!--Google Translate-->
<div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}

</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<!--Translate finish-->
    <title>Search Results</title>

     <script src='https://www.google.com/recaptcha/api.js'></script>
    <!-- Favicon-->
        <link rel="shortcut icon" href="images/duicon.ico" type="image/x-icon" sizes="100x100" />

    <!--Bootstrap 3.3.7-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="css/navbar.css">

     <link rel="stylesheet" type="text/css" href="footer_wrap.css">

     <link rel="stylesheet" type="text/css" href="css/search_results.css">

    <script src='https://www.google.com/recaptcha/api.js'></script>

 <link href="https://fonts.googleapis.com/css?family=Prociono" rel="stylesheet">



</head>
<body>
<?php
    $query = $_GET['query']; 
    $min_length = 3;
    
    if(strlen($query) >= $min_length){ 
         
        $query = htmlspecialchars($query); 
         
        $query = mysqli_real_escape_string($db,$query);
        
        $raw_results = mysqli_query($db,"SELECT * FROM paper
            WHERE (`title` LIKE '%".$query."%') OR (`author` LIKE '%".$query."%') OR ('name' LIKE '%".$query."%')") or die(mysql_error());
             
        $count = mysqli_num_rows($raw_results);
         
        if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
             $results = mysqli_fetch_array($raw_results);
			 $title=$results['title']  ;
			 $publish= $results['date_of_publish'];
			 $author= $results['author'];
			 $address= $results['address'];
			 
            while($results = mysqli_fetch_array($raw_results)){
          //      echo "<p>".$results['title']. " " .$results['author']."   </p>";
                
		//	echo "<a href='".$results['address']."'> link </a> ";
		//		echo "<a href='http://www.google.com'> link </a> ";
		//		echo"<a href='cat.html'>link </a>";
		
		
				
            }
             }
        else{ 
            echo "No results";
        } 
         }
    else{  
        echo ('"Minimum length for searching is ".$min_length.');
    }
	?>
   <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img src="images/navbar/ducolorlogonew.png" alt="logo" height="60px" width="60px">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="home.php" id="jake" class="hvr-underline-from-center"><i class="fa fa-home" aria-hidden="true"></i>  Home
</a>
                    </li>
                    <li>
                        <a href="departments.php" id="jake" class="hvr-underline-from-center"><i class="fa fa-building" aria-hidden="true"></i>  Department 
</a>
                    </li>
                    <li>
                        <a href="#" id="jake" class="hvr-underline-from-center"> <i class="fa fa-book" aria-hidden="true"></i> Research Profile
</a>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

<div class="container">

    <hgroup class="mb20">
        <h1>Search Results</h1>
        <h2 class="lead"><strong class="text-danger"><?php echo $count ?></strong> results were found for the search for <strong class="text-danger"><?php echo $query ?></strong></h2>                               
    </hgroup>

    <section class="col-xs-12 col-sm-6 col-md-12">
        <article class="search-result row">
            <div class="col-xs-12 col-sm-12 col-md-3">
                <a href="#" title="Lorem ipsum" class="thumbnail"><img src="http://lorempixel.com/250/140/people" alt="Lorem ipsum" /></a>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-2">
                <ul class="meta-search">
                    <li><i class="glyphicon glyphicon-calendar"></i> <span><?php echo $publish  ?></span></li>
                    
                    <li><i class="glyphicon glyphicon-tags"></i> <span><?php echo $author  ?></span></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-7 excerpet">
                <h3><a href=<?php echo $address ?> title=""><?php echo $title?></a></h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, exercitationem, suscipit, distinctio, qui sapiente aspernatur molestiae non corporis magni sit sequi iusto debitis delectus doloremque.</p>                        
                <span class="plus"><a href="#" title="Lorem ipsum"><i class="glyphicon glyphicon-plus"></i></a></span>
            </div>
            <span class="clearfix borda"></span>
        </article>
<!--
        <article class="search-result row">
            <div class="col-xs-12 col-sm-12 col-md-3">
                <a href="#" title="Lorem ipsum" class="thumbnail"><img src="http://lorempixel.com/250/140/food" alt="Lorem ipsum" /></a>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-2">
                <ul class="meta-search">
                    <li><i class="glyphicon glyphicon-calendar"></i> <span>02/13/2014</span></li>
                    <li><i class="glyphicon glyphicon-time"></i> <span>8:32 pm</span></li>
                    <li><i class="glyphicon glyphicon-tags"></i> <span>Food</span></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-7">
                <h3><a href="#" title="">Voluptatem, exercitationem, suscipit, distinctio</a></h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, exercitationem, suscipit, distinctio, qui sapiente aspernatur molestiae non corporis magni sit sequi iusto debitis delectus doloremque.</p>                        
                <span class="plus"><a href="#" title="Lorem ipsum"><i class="glyphicon glyphicon-plus"></i></a></span>
            </div>
            <span class="clearfix borda"></span>
        </article>

        <article class="search-result row">
            <div class="col-xs-12 col-sm-12 col-md-3">
                <a href="#" title="Lorem ipsum" class="thumbnail"><img src="http://lorempixel.com/250/140/sports" alt="Lorem ipsum" /></a>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-2">
                <ul class="meta-search">
                    <li><i class="glyphicon glyphicon-calendar"></i> <span>01/11/2014</span></li>
                    <li><i class="glyphicon glyphicon-time"></i> <span>10:13 am</span></li>
                    <li><i class="glyphicon glyphicon-tags"></i> <span>Sport</span></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-7">
                <h3><a href="#" title="">Voluptatem, exercitationem, suscipit, distinctio</a></h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, exercitationem, suscipit, distinctio, qui sapiente aspernatur molestiae non corporis magni sit sequi iusto debitis delectus doloremque.</p>                        
                <span class="plus"><a href="#" title="Lorem ipsum"><i class="glyphicon glyphicon-plus"></i></a></span>
            </div>
            <span class="clearfix border"></span>
        </article>          
-->
    </section>
</div>

<!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script> 

</body>
</html>