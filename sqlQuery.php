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
Test page med objv, cant be right STILL , at ... /var/www/html/bitlyMedObjsV0p03/public_html/sqlQuery.php <br>


The searchTerm1  is    <?php echo $_POST["searchTerm1"]; ?><br>
The searchTerm2  is    <?php echo $_POST["searchTerm2"]; ?><br>
Is the toggle button1 (bt1) checked = <?php echo $_POST["bt1"]; ?><br>
Is the toggle button2 (bt2) checked = <?php echo $_POST["bt2"]; ?><br><br>

<br>
<br>



<div class="col-12 col-sm-9 col-lg-9 main">main content

<table class="table table-bordered">
<tr>
    <th>author</th>
    <th>year</th>
    <th>objectives</th>
    <th>subHd1</th>
    <th>kw1</th>
    <th>Notes</th>
    <th>o_PK</th>
    <th>hrs</th>
    <th>Answer</th>
    <th>author_yearPK</th>
</tr>

<?php
echo "<a> Test in php echo. </a><br><br>";

$searchTerm1 = $_POST['searchTerm1'];
$tb1 = $_POST['tb1'];
$tb2 = $_POST['tb2'];


$servername = "localhost";
$dbname = "medSchlObj";
$username = "roFromWeb";  
$password = "roPassword1";
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password) or die ('I cannot connect  to the database because: ' . mysql_error());
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// $sth = $conn->prepare($sqlQueryString);
// $sth = $conn->prepare("SELECT author,year,obj,subHd1,kw1,oNotes,o_PK,hrs,oAns,author_yearPK FROM objectives LIMIT 5");
$sth = $conn->prepare("SELECT author,year,obj,subHd1,kw1,oNotes,o_PK,hrs,oAns,author_yearPK FROM objectives WHERE obj LIKE '%$searchTerm1%' LIMIT 5");
// $sth = $conn->prepare("SELECT author,year,obj,subHd1,kw1,oNotes,o_PK,hrs,oAns,author_yearPK FROM objectives WHERE obj LIKE '%DNA%' LIMIT 5");
$sth->execute();
?>
<?php foreach($sth->fetchAll(PDO::FETCH_ASSOC) as $row) : ?>
<tr>
    <td><?php echo $row['author']; ?></td>
    <td><?php echo $row['year']; ?></td>
    <td><?php echo $row['obj']; ?></td>
    <td><?php echo $row['subHd1']; ?></td>
    <td><?php echo $row['kw1']; ?></td>
    <td><?php echo $row['oNotes']; ?></td>
    <td><?php echo $row['o_PK']; ?></td>
    <td><?php echo $row['hrs']; ?></td>
    <td><?php echo $row['oAns']; ?></td>
    <td><?php echo $row['author_yearPK']; ?></td>
</tr>

<?php endforeach;?>

</table>



<!--
mysqli_connect("localhost","my_user","my_password","my_db") or die(""); 
-->








<br>
<br>
<br>
<br>


testing apache default location when started as roFromWeb
<br>
<b>2nd line,</b>
<br><br>4th line
<br>
<br>5th line
<br>
<br>
<br>

</div>

</body>

<footer class="text-right">
    <a href="./contact.html">Contact</a>
    <a href="./about.html">About</a>
    <a href="./help">Help</a>
</footer>

</html>
