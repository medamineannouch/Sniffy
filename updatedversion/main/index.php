<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>   
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"> </script>    
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"> </script>    
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jqPlot/1.0.9/jquery.jqplot.min.js" integrity="sha512-FQKKXM+/7s6LVHU07eH2zShZHunHqkBCIcDqodXfdV/NNXW165npscG8qOHdxVsOM4mJx38Ep1oMBcNXGB3BCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
       <script type='text/javascript' src="https://cdn.rawgit.com/abdmob/x2js/master/xml2json.js"></script>
       <script type="text/javascript" src="jqplot/jquery.jqplot.js"></script>
       <script type="text/javascript" src="jqplot/plugins/jqplot.barRenderer.js"></script>
       <script type="text/javascript" src="jqplot/plugins/jqplot.pieRenderer.js"></script>
       <script type="text/javascript" src="jqplot/plugins/jqplot.categoryAxisRenderer.js"></script>
       <script type="text/javascript" src="jqplot/plugins/jqplot.pointLabels.js"></script>
       <link rel="stylesheet" type="text/css" href="jqplot/jquery.jqplot.css" /> 
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
       <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
       <link rel = "stylesheet"href = "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"  
              integrity = "sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"  crossorigin = "anonymous">
              <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">    
       <link rel="stylesheet" href="../style/header.css">
       <link rel="stylesheet" href="../style/footer.css">
       <link rel="stylesheet" href="../style/register.css">
<title><?= $title ?? 'Home' ?></title>
</head>
<body>
       <nav>
              <div class="navigation-wrap bg-light start-header start-style">  
                     <div class="container">  
                            <div class="row">  
                                   <div class="col-12">  
                                          <nav class="navbar navbar-expand-md navbar-light">  
                                                 <a class="navbar-brand" href="index.php" target="_self" ><img src="../imgs/logo_ensamr.jpeg" alt="logo"></a>    
                                                 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">  
                                                 <span class="navbar-toggler-icon"> </span>  
                                                 </button>  
                                                 <div class="collapse navbar-collapse" id="navbarSupportedContent">  
                                                        <ul class="navbar-nav ml-auto py-4 py-md-0">  
                                                        <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">  
                                                               <a class="nav-link dropdown-toggle"  href="index.php" role="button" aria-haspopup="true" aria-expanded="false"> Home </a>  
                                                        </li>  
                                                        <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">  
                                                               <a class="nav-link" href="#"> About-us</a>  
                                                        </li>  
                                                        <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">  
                                                               <a class="nav-link" href="#"> Contact-us </a>  
                                                        </li>  
                                                        </ul>  
                                                 </div>  
                                          </nav>  
                                   </div>  
                            </div>  
                     </div>  
              </div> 
              <br><br><br>
       </nav>
       <div class="section full-height">  
              <div class="absolute-center">  
                     <div class="section">  
                            <div class="container">  
                                   <div class="row">                        
                                          <div class="col-12">               
                                                        <h1>Sniffy</h1>  
                                                        <h1><span>P</span><span>a</span><span>c</span><span>k</span><span>e</span><span>t</span><span>s</span><span></span>
                                                        <span>M</span><span>o</span><span>n</span><span>i</span><span>t</span><span>o</span><span>r</span><span>i</span><span>n</span><span>g</span>
                                                        </h1>
                                                       <h1><span>T</span><span>o</span><span>o</span><span>l</span>
                                                        
                                                        </h1> 
                                          </div>    
                                   </div>  
                                   <img src="../imgs/mtp2.png" class="imgs" width="300" height="172"> 
                            </div>  
                     </div> 
                     <div class="containe">
                            <a href="../login/login.php" class="btn btn-info" role="button">Se Connecter</a> 
                            <a href="../login/register.php" class="btn btn-info" role="button">Creer compte</a>
                     </div> 
              </div> 
       </div>  
       <div class="my-5 py-5">  
       </div>  

            <script>  
               (function($) { "use strict";  
                 
               $(function($) {  
                var header = $(".start-style");  
                $(window).scroll(function() {      
                    var scroll = $(window).scrollTop();  
                    if (scroll >= 10) {  
                        header.removeClass('start-style').addClass("scroll-on");  
                    } else {  
                        header.removeClass("scroll-on").addClass('start-style');  
                    }  
                });  
               });    
                 
               $(document).ready(function() {  
                $('body.hero-anime').removeClass('hero-anime');  
               });  
               $('body').on('mouseenter mouseleave','.nav-item',function(e){  
                    if ($(window).width() > 750) {  
                        var _d=$(e.target).closest('.nav-item');_d.addClass('show');  
                        setTimeout(function(){  
                        _d[_d.is(':hover')?'addClass':'removeClass']('show');  
                        },1);  
                    }  
               });    
                 
                })(jQuery);   
            </script>  
<footer>
       <section id="footer">  
              <div class="container">  
                     <div class="row text-center text-xs-center text-sm-left text-md-left">  
                            
                            <div class="col-xs-12 col-sm-6 col-md-4">  
                                   <h5> Links </h5>  
                                   <ul class="list-unstyled quick-links">  
                                          <li> <a href="#"> <i class="fa fa-angle-double-right"> </i> Home </a> </li>   
                                          <li> <a href="#"> <i class="fa fa-angle-double-right"> </i> FAQ </a> </li> 
                                   </ul>  
                            </div> 
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                    
                            </div>   
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                   <h5> About</h5>  
                                   <ul class="list-unstyled quick-links">                              
                                          <li> <a href="#"> <i class="fa fa-angle-double-right"> </i> About </a></li>                             
                                          <li> <a href="#"> <i class="fa fa-angle-double-right"> </i> Contact </a> </li>  
                                   </ul>  
                            </div>                     
                            
                     </div>  
              </div>  
    
              <div class="row">  
                     <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">  
                            <p class="h6">2023 ©  Travail réalisé par : INDIA-Groupe-4 </p>  
                     </div>  
              </div>   
       </section>  
</footer>
</body>
</html>
