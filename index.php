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



<script language="JavaScript">
function toggle(source) {
  checkboxes = document.getElementsByName('foo');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
</script>


<script language="JavaScript">
function toggle(source) {
  checkboxes = document.getElementsByName('cbDiscipline[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
</script>



</head>

<body>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
Test page med objv, cant be right STILL , at ... /var/www/html/bitlyMedObjsV0p03/public_html <br>
  , this was controlled by changing default path in mysite.conf
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
  <div class="col-xs-3 col-sm-4 col-lg-4 left"> Select disciplines or societies to search below <br> (all are included by default)<br>
    <div class="sbBG-X">
      <?php require("sidebar.php"); ?>
    </div>
    <div style="background-image: url(https://pixabay.com/static/uploads/photo/2014/04/02/10/55/health-304919_960_720.png); background-repeat: no-repeat; background-size: contain; opacity: 0.8; background-position: bottom; z-index: 33;   " >
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>
  </div>


<!-- <div class="col-12 col-sm-9 col-lg-9 mn"> -->
<div class="col-xs-9 col-sm-8 col-lg-8">
Enter search term below <br>

<!--   <form action="sqlQuery.php" method="post" class="form-horizontal" role="form">    -->
<div class="row">
  <div class="col-lg-6">
    <div class="input-group">
      <input type="text" name="searchTerm1" class="form-control" aria-labelledby="...WHAT">
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
</form>
  </div></div></div>

<!--
<br>5th line<br><br>
<br>6th line
-->


<br/><br/><br/>
<input type="checkbox" onClick="toggle(this)" /> Toggle All<br/>

<input type="checkbox" name="foo" value="bar1"> Bar 1<br/>
<input type="checkbox" name="foo" value="bar2"> Bar 2<br/>
<input type="checkbox" name="foo" value="bar3"> Bar 3<br/>
<input type="checkbox" name="foo" value="bar4"> Bar 4<br/>



</body>


<div id="footer">
 <div class="wrap">
   <a href="./contact.html">Contact   |</a>
   <a href="./about.html">   About   |</a>
   <a href="./help.html">   Help</a>
 </div>
</div>


</html>
