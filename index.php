<!DOCTYPE html>

<!--  http://www.medcurriculum.org/  -->

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>  -->

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<html>

<head>  
<title> Medical School objectives DB </title><br>
<h1 class="text-center"> Medical School objective DB  </h1><br>
<h2 class="text-center"> A searchable database from multiple national societies </h2><br>
<link type="text/css" rel="stylesheet" href="site.css" </link>

<!-- 
<script language="JavaScript">
var checkAll = document.getElementById("id_check_uncheck_all");
checkAll.addEventListener("change", function() {
  var checked = this.checked;
  var otherCheckboxes = document.querySelectorAll(".toggleable");
  [].forEach.call(otherCheckboxes, function(item) {
    item.checked = checked;
  });
});
</script>
-->   


<script language="JavaScript">
function toggle(source) {
  checkboxes = document.getElementsByName('foo');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
</script>

</head>

<body id="bootstrap-overrides">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<br>



<br>
<br>

<form action="sqlQuery.php" method="post" class="form-horizontal" role="form">
<!-- 
<div>
-->
<div class="row">

  <!--  <div class="col-12 col-sm-3 col-lg-3 left">  Select disciplines or societies to search below (all are included by default)  -->
  <!--  <div class="col-12 col-sm-3 col-lg-3 left"> Select disciplines or societies to search below <br> (all are included by default)<br>  -->
  <!-- <div class="content-secondary">  SSelect disciplines or societies to search below <br> (all are included by default)<br>  --> 
  <div class="col-xs-3 col-sm-4 col-lg-4 left"> Select disciplines or societies to search below <br> (all are included by default)<br> 
    <div class="sbBG">
      <?php require("sidebar.php"); ?>
    </div>
    <!---
    <div style="background-image: url(https://pixabay.com/static/uploads/photo/2014/04/02/10/55/health-304919_960_720.png); background-repeat: no-repeat; background-size: contain; opacity: 0.8; background-position: bottom; z-index: 33;   " >
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>
    -->
  </div>


<!-- <div class="col-12 col-sm-9 col-lg-9 mn"> -->
<div class="col-xs-9 col-sm-8 col-lg-8"> 

    Choose what to display from search (or leave deafult) : <br> 
    <input type="checkbox" name="columnsSelected[]" id="author" value="author" checked /> Societies | 
    <input type="checkbox" name="columnsSelected[]" id="year" value="year" checked /> Year | 
    <input type="checkbox" name="columnsSelected[]" id="obj" value="obj" checked /> Objective | 
    <input type="checkbox" name="columnsSelected[]" id="subHd1" value="subHd1" checked /> subHeadings | 
    <input type="checkbox" name="columnsSelected[]" id="oNotes" value="oNotes" checked /> Notes | 
    <input type="checkbox" name="columnsSelected[]" id="disc1" value="disc1" checked /> Disciplines | 
    <input type="checkbox" name="columnsSelected[]" id="kw1" value="kw1" unchecked /> Keywords | 
    <input type="checkbox" name="columnsSelected[]" id="PK_o" value="PK_o" unchecked /> PK-objNum | 
    <input type="checkbox" name="columnsSelected[]" id="hrs" value="hrs" unchecked /> Hours | 
    <input type="checkbox" name="columnsSelected[]" id="Answer" value="Answer" unchecked /> Objective Answer |  
    <input type="checkbox" name="columnsSelected[]" id="rank" value="rank" unchecked /> Rank | 
    <br><br>
Enter search term below <br>

<!--   <form action="sqlQuery.php" method="post" class="form-horizontal" role="form">    -->
<div class="row">
  <div class="col-lg-8">
    <div class="input-group">
      <input type="text" name="searchTerm1" class="form-control" size="50">
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
<!--
  <div class="col-lg-6">
    <div class="input-group">
      <span class="input-group-addon">
        <!~~ <input type="radio" name="bt2" aria-label="...">    ~~>
        <input type="checkbox" name="cbTerm2" aria-label="...">
      </span>
      <input type="text" name="searchTerm2" class="form-control" aria-label="...">
    </div><!~~ /input-group ~~>
  </div><!~~ /.col-lg-6 ~~>
-->
</div><!-- /.row -->
<input type="submit">
</form>

<br><br><br><br><br>
  </div></div>

<!--
<br>5th line<br><br>
<br>6th line
-->


<br/><br/><br/>

  <div id="footer" >
    <br>
    <div class="copyright">
      <a color="black"> Created by - Sage Arbor PhD </a><br>
      <a href="mailto:sagearbor@gmail.com?Subject=Email%20from%20medical%20Objectives%20DB%20page." target="_top">sagearbor@gmail.com</a> <br>
      <a href="http://www.marian.edu/sage">www.marian.edu/sage</a>  <br>
    </div>
    <!-- Use glyphicons from bootstap   http://getbootstrap.com/components/ -->
    <div class="social"><p>
      <a href="./contact.php"><span class="glyphicon glyphicon-search" aria-hidden="true">Contact  |</a></span>
      <a href="./about.html"><span class="glyphicon glyphicon-info-sign" aria-hidden="true">About  |</a></span>
      <a href="./help.html"><span class="glyphicon glyphicon-question-sign" aria-hidden="true">Help</a></span>
    </div>
  </div>

</body>

</html>

