<!DOCTYPE html>

<!--  http://www.medcurriculum.org/  -->

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link  rel="stylesheet" href="https://cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.css" >


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


<script type="text/javascript">
$(document).ready(function() {
  $('#objSearchTbl').dataTable();
});
</script>


<html>
<head>

<?php 
  if(isset($_POST['submit'])){ 
    if(isset($_GET['go'])){ 
      if(preg_match("^/[A-Za-z0-9]+/", $_POST['searchTerm1'])){ 
         $st1=$_POST['searchTerm1']; 
      } 
      if(preg_match("^/[A-Za-z0-9]+/", $_POST['searchTerm2'])){ 
         $st2=$_POST['searchTerm2']; 
      } 
     } 
     else{ 
       echo  "<p>Please enter a search query</p>"; 
       } 
 // echo "st1 = "$st1"<br>";
 // echo "st2 = "$st2"<br>";
  }
?>   

 
</head>


<body>
<title> Medical School objectives </title><br>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<h1 class="text-center"> Medical School objectives </h1><br>
<h2 class="text-center"> A searchable database from multiple national societies </h2><br>

<br><br>

<?php
  $discName = $_POST['cbDiscipline'];
  $socName = $_POST['cbSociety'];
  $searchTerm1 = $_POST['searchTerm1'];
  $searchTerm2 = $_POST['searchTerm2'];
  $cbTerm2 = $_POST['cbTerm2'];
  $colsToShow = $_POST['columnsSelected'];
?>

<!-- 
<?php echo "<br>discName = ".print_r($discName)."<br>colsToShow = ".print_r($colsToShow) ; ?>
<?php echo "<br>colsToShow implode = ".implode(', ',$colsToShow) ; ?>
<?php echo "<br>count colsToShow  = ".count($colsToShow) ; ?>
--> 

<br><br>



<br><br>


<br><br>
<div>
  <div class="col-12 col-sm-3 col-lg-3 left">  Select disciplines or societies to search below (all are included by default) <br>
    <div class="sbBG">
      <?php require("sidebar.php"); ?>
    </div>
    <?php 
      echo "<br><u> Your Search Criteria is below </u><br>";
      echo "<b>Search term</b>: ".$searchTerm1." <br>";
      echo "<b>Disciplines</b>: ".implode(', ', $discName)."<br> AND <br>";
      echo "<b>Societies</b>: ".implode(', ', $socName)." <br>";
      //echo "<b>Search term2</b>: ".$srchTerm2." <br>";
      //echo "Term2 checkbox = ".$cbTerm2."<br><br>";
    ?>
  </div>
  <div class="col-12 col-sm-9 col-lg-9 main">

<?php
$settings = parse_ini_file("config.ini");
foreach ($settings as $key => $setting) {
    // Notice the double $$, this tells php to create a variable with the same name as key
    $$key = $setting; 
}
$conn = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpw) or die ('I cannot connect  to the database because: ' . mysql_error());
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
foreach($discName as &$val)
  $val=$conn->quote($val); //iterate through array and quote
foreach($socName as &$val)
  $val=$conn->quote($val); //iterate through array and quote

//  $sth = $conn->prepare("SELECT author,year,obj,subHd1,kw1,oNotes,disc1 FROM objectives o INNER JOIN societies s ON s.abbrev = o.author AND s.name in (".implode(',',$socName).") AND obj LIKE '%$searchTerm1%' AND (disc1 IN (".implode(',',$discName).") OR disc2 IN (".implode(',',$discName).") OR disc3 IN (".implode(',',$discName).")) ");
// $sth->execute();
// $count = $sth->rowCount();
// print("$count objectives found.<br><br>");

?>

<?php
$settings = parse_ini_file("config.ini");
foreach ($settings as $key => $setting) {
    // Notice the double $$, this tells php to create a variable with the same name as key
    $$key = $setting; 
}
$conn = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpw) or die ('I cannot connect  to the database because: ' . mysql_error());
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$columnsDyn = $colsToShow; // Build this from posted data
// print("$columnsDyn <br>");
$colsDyn = implode(',',$columnsDyn); // item1,item2,item4
//print("$colsDyn <br>");
$sqlDyn = "SELECT ".$colsDyn." FROM objectives o INNER JOIN societies s ON s.abbrev = o.author AND s.name in (".implode(',',$socName).") AND obj LIKE '%$searchTerm1%' AND (disc1 IN (".implode(',',$discName).") OR disc2 IN (".implode(',',$discName).") OR disc3 IN (".implode(',',$discName).")) ";
// $sth = $conn->prepare("SELECT author,year,obj,subHd1,kw1,oNotes,disc1 FROM objectives o INNER JOIN societies s ON s.abbrev = o.author AND s.name in (".implode(',',$socName).") AND obj LIKE '%$searchTerm1%' AND (disc1 IN (".implode(',',$discName).") OR disc2 IN (".implode(',',$discName).") OR disc3 IN (".implode(',',$discName).")) ");
// $sth->execute();
// $count = $sth->rowCount();

// Not using following - http://www.toppa.com/2008/generating-html-tables-with-a-variable-number-of-columns-and-rows/
// foreach($sth->fetchAll(PDO::FETCH_ASSOC) as $row) :



$sqlDyn = "SELECT ".$colsDyn." FROM objectives o INNER JOIN societies s ON s.abbrev = o.author AND s.name in (".implode(',',$socName).") AND obj LIKE '%$searchTerm1%' AND (disc1 IN (".implode(',',$discName).") OR disc2 IN (".implode(',',$discName).") OR disc3 IN (".implode(',',$discName).")) ";
$sth = $conn->prepare($sqlDyn);
 $sth->execute();

//$output = "<table class=\"table table-bordered\ id=\"objSearchTbl\">\n  <tr>\n";
$output = "<table class=\"table table-striped table-bordered\" id=\"objSearchTbl\">\n  <thead>    <tr>\n";
for ($i = 0; $i < count($columnsDyn); $i++) {
      $output .= "      <th>" . $columnsDyn[$i] . "</th>\n";
      //echo "<br> i , columnsDyn[i] = " . $i . " , " . $columnsDyn[$i];
  }
$output .= "    </tr>\n  </thead>\n";
?>

<?php foreach($sth->fetchAll(PDO::FETCH_BOTH) as $row) : ?>
<?php  
// Sagenote - Need to divide count of row by 2 because returning both 
//   key and index, based on using "FETCH_BOTH" above.
for ($i = 0; $i < count($row)/2; $i++) {
      $output .= "    <th>" . $row[$i] . "</th>\n";
  }
$output .= "</tr>\n";
?>

<?php endforeach;?>
<?php 
$output .= "</table>\n";
echo $output;
?>


<!--
### HIGHLIGHT SEARCH TERM
###   below is not working , following are some sites to get highlighting working
###   https://www.daniweb.com/programming/web-development/threads/419745/how-to-highlight-the-search-result-from-the-mysql
###   http://stackoverflow.com/questions/26322999/how-highlight-sql-results-that-are-like-the-keyword
###   http://stackoverflow.com/questions/3064997/highlighting-data-values-in-a-sql-result-set
###   http://johannburkard.de/blog/programming/javascript/highlight-javascript-text-higlighting-jquery-plugin.html
-->

<?php  
/*
  echo "
    <script type=\"text/javascript\">
    $('body').text().highlight('$searchTerm') 
    </script>"; 
 */
?>

</div>

</body>

<div id="footer">
  <br>
  <div class="copyright">
    Created by - Sage Arbor PhD <br>
    <a href="mailto:sagearbor@gmail.com?Subject=Email%20from%20medical%20Objectives%20DB%20page." target="_top">sagearbor@gmail.com</a> <br>
    <a href="http://www.marian.edu/sage">www.marian.edu/sage</a>  <br>
<!-- Use glyphicons from bootstap   http://getbootstrap.com/components/ -->
  <div class="social"><p>
    <a href="./contact.php"><span class="glyphicon glyphicon-search" aria-hidden="true">Contact  |</a></span>
    <a href="./about.html"><span class="glyphicon glyphicon-info-sign" aria-hidden="true">About  |</a></span>
    <a href="./help.html"><span class="glyphicon glyphicon-question-sign" aria-hidden="true">Help</a></span>
  </div>
</div>

</html>

