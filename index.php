<?php
$climate="";
$html="";
$string="";


if($_GET["city"])
{
$string = str_replace(' ', '', $_GET["city"]);
$url="https://www.weather-forecast.com/locations/".$string."/forecasts/latest";
$headers =get_headers($url);
if($headers[0]=="HTTP/1.1 404 Not Found")
{
  $exists=false;
  $error="Invalid city! please try again";
}
else {
$html=file_get_contents("https://www.weather-forecast.com/locations/".$string."/forecasts/latest");
$climate= explode('<p class="b-forecast__table-description-content"><span class="phrase">', $html); //splits the strings as specified
if(sizeof($climate)==0)
$exists=false;
else
$exists=true;
}



}


?>



<!DOCTYPE html>
<html>
<head>
	<title>Web Scraper Project</title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="jquery_ui_go/external/jquery/jquery.js" type="text/javascript"></script>
	<script src="jquery_ui_go/jquery-ui.js"></script>
	<style type="text/css">
		body, html {
    height: 100%;
}

.container{
	width: 450px;
  text-align: center;
}
  html { 
background: url(background2.jpg) no-repeat center center fixed; 
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
}

body{
  display: flex;
    justify-content: center;
    align-items: center;
    background: none;
}
p{
  color: white;
}

                
            
	</style>

</head>
<body>

<div class="container">
<p class="h1 " style="color: #0069D9">What's the Weather?</p>
<p class="h5 my-md-3" style="color: white"> Enter the Name or City</p>
	<form>
  <div class="form-group row">
  <div class="col-sm-10 mb-2">
    <input type="text" name="city" class="form-control" id="Input" aria-describedby="emailHelp" placeholder="Eg. London, Tokyo">
    </div>
    
    <div class="col-sm-2 mb-2">
      <button type="submit" class="btn btn-primary">Submit</button>
     
 
  </div></div>
  </form>
 <div class="alerts">
<?php
if($exists)
{
  echo"<div class='alert alert-primary' role='alert'>".$climate[1]."</div>";
}
 if($exists==false && $error!="")
 {
    echo"<div class='alert alert-danger' role='alert'> Invalid city!..Try again</div>";
 }


?>
  </div>
</div>








<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
   <script type="text/javascript">
     
$("form").submit(function(){
var city=$("#Input").val();

if(city=="")
 {
  $(".alerts").addClass("alert alert-danger");
  $(".alerts").html("Enter city name");
  return false;
 }
 else
 return true;

});


   </script>


</body>
</html>