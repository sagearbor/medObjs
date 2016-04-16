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
<br> $_POST['cbDiscipline'] below <br>


<?php
  $discName = $_POST['cbDiscipline'];
  // optional

echo "echo implode1 = " . implode(',', $discName) . "<br>";

  echo "You chose the following discipline(s): <br>";
  foreach ($discName as $disciplineDisplayName)
    {
    echo $disciplineDisplayName."<br />";
    }
?>
<?php  print_r ($discName);  ?>


Results searching the words : "<?php echo $_POST["searchTerm1"]; ?>" and "<?php echo $_POST["searchTerm2"]; ?>"
<br><br>
<br><br>
Is the toggle checkbox Term2 (cbTerm2) checked = <?php echo $_POST["cbTerm2"]; ?><br><br>

<br>
<br>

<div class="row">
<div class="col-12 col-sm-3 col-lg-3 left">right side bar
<?php require("sidebar.php"); ?>
</div>
</div>


<div class="col-12 col-sm-9 col-lg-9 main">main content

<table class="table table-bordered">
<tr>
    <th>author</th>
    <th>year</th>
    <th>objectives</th>
    <th>subHd1</th>
    <th>kw1</th>
    <th>Notes</th>
    <th>PK_o</th>
    <th>hrs</th>
    <th>Answer</th>
    <th>disc1</th>
</tr>

<?php
echo "<a> Test in php echo. </a><br>";
$searchTerm1 = $_POST['searchTerm1'];
$cbTerm1 = $_POST['tb1'];
$cbTerm2 = $_POST['tb2'];
//echo $searchTerm1"<br><br>";
echo $searchTerm1;


 $servername = "localhost";
 $dbname = "medSchlObj";
 $username = "roFromWeb";  
 $password = "roPassword1";
 $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password) or die ('I cannot connect  to the database because: ' . mysql_error());

// $conn = new PDO("uri:file:mysql.dsn") or die ('I cannot connect  to the database because: ' . mysql_error());
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// http://stackoverflow.com/questions/907806/php-mysql-using-an-array-in-where-clause
// $sth = $conn->prepare($sqlQueryString);
// $sth = $conn->prepare("SELECT author,year,obj,subHd1,kw1,oNotes,PK_o,hrs,oAns,author_yearPK FROM objectives ");
// $sth = $conn->prepare("SELECT author,year,obj,subHd1,kw1,oNotes,PK_o,hrs,oAns,disc1 FROM objectives LIMIT 5");
// $sth = $conn->prepare("SELECT author,year,obj,subHd1,kw1,oNotes,o_PK,hrs,oAns,author_yearPK FROM objectives WHERE obj LIKE '%DNA%' LIMIT 5");
// $sth = $conn->prepare("SELECT author,year,obj,subHd1,kw1,oNotes,PK_o,hrs,oAns,author_yearPK FROM objectives WHERE obj LIKE '%$searchTerm1%' LIMIT 5");

echo "echo implode2 = " . implode(',', $discName) . "<br>";

foreach($discName as &$val)
    $val=$conn->quote($val); //iterate through array and quote


// $sth = $conn->prepare("SELECT author,year,obj,subHd1,kw1,oNotes,PK_o,hrs,oAns,disc1 FROM objectives LIMIT 5");
//$sth = $conn->prepare("SELECT author,year,obj,subHd1,kw1,oNotes,PK_o,hrs,oAns,disc1 FROM objectives WHERE obj LIKE '%$searchTerm1%' LIMIT 5");
 $sth = $conn->prepare("SELECT author,year,obj,subHd1,kw1,oNotes,PK_o,hrs,oAns,disc1 FROM objectives WHERE obj LIKE '%$searchTerm1%' AND disc1 IN (".implode(',',$discName).") ");
//echo "<br>sth = ";
//echo $sth;

echo "echo implode3 = " . implode(',', $discName) . "<br>";
$qStr1 = $discName;
$qStri2 = implode(',', $discName);
echo "<br><br>";
print_r ();


$in = implode(',',$ids); //create comma separated list
echo "in = ";
echo $in;
print_r ($in);
echo "implode with quotes4 = <br>";
$str = "'" . implode("','", $discname) . "'";  
print_r ($str);
echo "<br>Got heree<br>";

echo "echo implode5 = " . implode(',', $discName) . "<br>";
function add_quotes($str) {
    return sprintf("'%s'", $str);
}

$discNameImpld = implode(',', array_map('add_quotes',$discName));
//$discNameImpld = implode(',', $discName);
//$sth = $conn->prepare("SELECT author,year,obj,subHd1,kw1,oNotes,o_PK,hrs,oAns,author_yearPK FROM objectives WHERE obj LIKE '%$searchTerm1%' AND author IN (".$in.") LIMIT 5");
// $sth = $conn->prepare("SELECT author,year,obj,subHd1,kw1,oNotes,o_PK,hrs,oAns,author_yearPK FROM objectives WHERE obj LIKE '%$searchTerm1%' AND discipline IN ('Cell Biology','Anatomy','Biochemistry') LIMIT 5");
// $sth = $conn->prepare("SELECT author,year,obj,subHd1,kw1,oNotes,o_PK,hrs,oAns,author_yearPK FROM objectives WHERE obj LIKE '%$searchTerm1%' AND author IN (".$discNameImpld.") LIMIT 5");
//$sth = $conn->prepare("SELECT author,year,obj,subHd1,kw1,oNotes,o_PK,hrs,oAns,author_yearPK FROM objectives WHERE obj LIKE '%$searchTerm1%' AND author IN (".implode(',',$discName).") LIMIT 5");
var_dump($conn -> errorInfo());
 echo "<br><br> look at IMPLODE <br><br>";
 echo "dDiscName = " . $discName . "<br>";
 echo "dDiscName(0) = " . $discName[0] . "<br>";
 echo "echo implode6 = " . implode(',', $discName) . "<br>";
 echo "discNameImpld = ". $discNameImpld;
 echo "<br>";
 echo "discNameImpld(0) = ". $disciplineDisplayName[0];
 echo "<br>";
 //echo "discNameImpld(0) = ". $disciplineDisplayName[0];
 //echo "<br>";
 echo "discNameImpld(1) = ". $disciplineDisplayName[1];
 echo "<br>";
 echo "discNameImpld(2) = ". $disciplineDisplayName[2];
 echo "<br>";
 echo "discNameImpld(3) = ". $disciplineDisplayName[3];
 echo "<br>";
 echo "<br>";
 echo "printr discName = <br>";
 echo print_r($discName);
 echo "<br>";

// $sth = $conn->prepare("SELECT author,year,obj,subHd1,kw1,oNotes,o_PK,hrs,oAns,author_yearPK FROM objectives WHERE obj LIKE '%$searchTerm1%'  LIMIT 5");
// $sth = $conn->prepare("SELECT author,year,obj,subHd1,kw1,oNotes,o_PK,hrs,oAns,author_yearPK FROM objectives LIMIT 5");
// $sth = $pdo->prepare($select);
// $sth->execute($discName);
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
    <td><?php echo $row['PK_o']; ?></td>
    <td><?php echo $row['hrs']; ?></td>
    <td><?php echo $row['oAns']; ?></td>
    <td><?php echo $row['disc1']; ?></td>
</tr>

<?php endforeach;?>


</table>


### HIGHLIGHT SEARCH TERM
###   below is not working , following are some sites to get highlighting working
###   https://www.daniweb.com/programming/web-development/threads/419745/how-to-highlight-the-search-result-from-the-mysql
###   http://stackoverflow.com/questions/26322999/how-highlight-sql-results-that-are-like-the-keyword
###   http://stackoverflow.com/questions/3064997/highlighting-data-values-in-a-sql-result-set
###   http://johannburkard.de/blog/programming/javascript/highlight-javascript-text-higlighting-jquery-plugin.html
<?php   
  $searchTerm1 = $_POST['searchTerm1'];
  echo "
    <script type=\"text/javascript\">
    $('body').text().highlight('$searchTerm') 
    </script>"; 
?>



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
