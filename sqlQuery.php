<!DOCTYPE html>

<!--  http://www.medcurriculum.org/  -->

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


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
  }?> 

</head>

<html>

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
?>

<br><br>
<div>
  <div class="col-12 col-sm-3 col-lg-3 left">  Select disciplines or societies to search below (all are included by default) <br>
    <div class="sbBG">
      <?php require("sidebar.php"); ?>
    </div>
    <?php 
      echo "<br><u> Your Search Criteria is below </u><br>";
      echo "<b>Disciplines</b>: ".implode(',', $discName)."<br> AND <br>";
      echo "<b>Societies</b>: ".implode(',', $socName)." <br>";
      echo "<b>Search term1</b>: ".$srchTerm1." <br>";
      echo "<b>Search term2</b>: ".$srchTerm2." <br>";
      echo "Term2 checkbox = ".$cbTerm2."<br><br>";
    ?>
  </div>
  <div class="col-12 col-sm-9 col-lg-9 main">
    <table class="table table-bordered">
      <colgroup>
        <!--  <col class="obj_size" style="width:2%">  -->
        <col style="width:10%">
        <col style="width:50%">
        <col style="width:10%">
        <col style="width:10%">
        <col style="width:10%">
        <col style="width:10%">
      </colgroup>  
      <tr>
<!--        <th>author</th>  -->
        <th>year</th>
        <th width:"50%">objectives</th>
        <th>subHd1</th>
        <th>kw1</th>
        <th>Notes</th>
<!--
        <th>PK_o</th>
        <th>hrs</th>
        <th>Answer</th>
-->
        <th width:"10px">disc1</th>
      </tr>

<?php
$servername = "localhost";
$dbname = "medSchlObj";
$username = "roFromWeb";  
$password = "roPassword1";
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password) or die ('I cannot connect  to the database because: ' . mysql_error());
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
foreach($discName as &$val)
  $val=$conn->quote($val); //iterate through array and quote
foreach($socName as &$val)
  $val=$conn->quote($val); //iterate through array and quote
// $sth = $conn->prepare("SELECT * FROM Societies;");
// $sth = $conn->prepare("SELECT author,year,obj,subHd1,kw1,oNotes,PK_o,hrs,oAns,disc1 FROM objectives WHERE obj LIKE '%$searchTerm1%' LIMIT 5");
// $sth = $conn->prepare("SELECT author,year,obj,subHd1,kw1,oNotes,PK_o,hrs,oAns,disc1 FROM objectives WHERE obj LIKE '%$searchTerm1%' AND author IN (SELECT abbrev from societies)ame));
// $sth = $conn->prepare("SELECT author,year,obj,subHd1,kw1,oNotes,PK_o,hrs,oAns,disc1 FROM objectives WHERE obj LIKE '%$searchTerm1%' AND disc1 IN (".implode(',',$discName).") ");
// $sth = $conn->prepare("SELECT author,year,obj,subHd1,kw1,oNotes,PK_o,hrs,oAns,disc1,disc2,disc3 FROM objectives WHERE obj LIKE '%$searchTerm1%' AND (disc1 IN (".implode(',',$discName).") OR disc2 IN (".implode(',',$discName).") OR disc3 IN (".implode(',',$discName).") ");
// $sth = $conn->prepare("SELECT author,year,obj,subHd1,kw1,oNotes,PK_o,hrs,oAns,disc1 FROM objectives o INNER JOIN societies s ON s.abbrev = o.author AND s.name in (".implode(',',$socName).") AND obj LIKE '%$searchTerm1%' AND (disc1 IN (".implode(',',$discName).") OR disc2 IN (".implode(',',$discName).") OR disc3 IN (".implode(',',$discName).")) ");
 $sth = $conn->prepare("SELECT author,year,obj,subHd1,kw1,oNotes,disc1 FROM objectives o INNER JOIN societies s ON s.abbrev = o.author AND s.name in (".implode(',',$socName).") AND obj LIKE '%$searchTerm1%' AND (disc1 IN (".implode(',',$discName).") OR disc2 IN (".implode(',',$discName).") OR disc3 IN (".implode(',',$discName).")) ");

  $discName = $_POST['cbDiscipline'];
  $socName = $_POST['cbSociety'];
  $searchTerm1 = $_POST['searchTerm1'];
  $searchTerm2 = $_POST['searchTerm2'];
  $cbTerm2 = $_POST['cbTerm2'];
 $sth->execute();

$count = $sth->rowCount();
print("$count objectives found.<br><br>");

// $sth->store_result();
// echo "<br>Testing store_resultsssssi=<br>";
// echo $sth->num_rows;


// Maybe use multiple queries in future using store_result -->  http://php.net/manual/en/mysqli.multi-query.php

// $data = array(); // create a variable to hold the information
// while (($row = mysql_fetch_array($result, MYSQL_ASSOC)) !== false){
//   $data[] = $row; // add the row in to the results (data) array
// }
// print_r($data);
?>



<?php foreach($sth->fetchAll(PDO::FETCH_ASSOC) as $row) : 
// $data = array(); // create a variable to hold the information
// $data[] = $row; // add the row in to the results (data) array
?>
<tr>
<!--    <td><?php echo $row['author']; ?></td>  -->
    <td class="zero_width"><?php echo $row['author']." ".$row['year']; ?></td>
    <td class="obj_size"><?php echo $row['obj']; ?></td>
    <td><?php echo $row['subHd1']; ?></td>
    <td><?php echo $row['kw1']; ?></td>
    <td><?php echo $row['oNotes']; ?></td>
<!--
    <td><?php echo $row['PK_o']; ?></td>
    <td><?php echo $row['hrs']; ?></td>
    <td><?php echo $row['oAns']; ?></td>
-->
    <td><?php echo $row['disc1']; ?></td>
</tr>
<?php endforeach;?>
</table>
<!-- <?php echo "<br>DATA in an array:<br> print_r($data) <br> "; ?>  -->

<!--
### HIGHLIGHT SEARCH TERM
###   below is not working , following are some sites to get highlighting working
###   https://www.daniweb.com/programming/web-development/threads/419745/how-to-highlight-the-search-result-from-the-mysql
###   http://stackoverflow.com/questions/26322999/how-highlight-sql-results-that-are-like-the-keyword
###   http://stackoverflow.com/questions/3064997/highlighting-data-values-in-a-sql-result-set
###   http://johannburkard.de/blog/programming/javascript/highlight-javascript-text-higlighting-jquery-plugin.html
-->

<?php   
  echo "
    <script type=\"text/javascript\">
    $('body').text().highlight('$searchTerm') 
    </script>"; 
?>

</div>

</body>

<footer class="text-right">
    <a href="./contact.html">Contact</a>
    <a href="./about.html">About</a>
    <a href="./help">Help</a>
</footer>

</html>
