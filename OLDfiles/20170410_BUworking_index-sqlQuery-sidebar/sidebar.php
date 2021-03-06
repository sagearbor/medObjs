


<!-- 
NEED TO PUT SOCIETIES AND DISCIPLINES CHECKBOXED IN ARRAY TO USE IN SQL
http://stackoverflow.com/questions/4997252/get-post-from-multiple-checkboxes 
-->

<!-- 
Javascript based on
http://jsfiddle.net/H37cb/
http://stackoverflow.com/questions/19282219/check-uncheck-all-the-checkboxes-in-a-table
-->

<!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>   -->

<script type="text/javascript">
$(document).ready(

function()
  {
    $('input[name="selectAllDisciplines"],input[name="selectAllSocieties"]').bind('click', function()
      {
        var status = $(this).is(':checked');
        window.alert("Status of checbox set to = " + status);
        console.log("Status of checbox set to = " + status);
        <!-- $('input[type=checkbox]', $(this).parent('li')).attr('checked', status); -->
      });
  }

);
</script>

<script language="JavaScript">
function toggle(source) {
  checkboxes = document.getElementsByName('cbDiscipline[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
</script>

<script language="JavaScript">
function toggle2(source) {
  checkboxes = document.getElementsByName('cbSociety[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
</script>




<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true"> 
  <div class="panel-group">
    <div class="panel-heading" role="tab" id="headingFive">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
          <b>Discipline </b>
        </a>
      </h4>
    </div>

    <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
      <div class="panel-body">
        <div class="row">
          <?php
            $settings = parse_ini_file("config.ini");
            foreach ($settings as $key => $setting) {
                // Notice the double $$, this tells php to create a variable with the same name as key
                $$key = $setting; 
            }
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpw) or die ('I cannot connect  to the database because: ' . mysql_error());
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $disciplines = $conn->prepare("SELECT discipline FROM disciplines WHERE inDB = 1");
            $disciplines->execute();
          ?>
          <div class="col-lg-6">
            <div class="input-group">
              <span class="sbBGr">
                <input type="checkbox" onClick="toggle(this)" /> Toggle All Disciplines<br/>
              </span>
            </div><!-- /input-group -->
          </div><!-- /.col-lg-6 --><br>

          <?php foreach($disciplines->fetchAll(PDO::FETCH_ASSOC) as $row) : ?>
          <div class="col-lg-6">
            <div class="input-group">
              <span class="sbBG">
                <input type="checkbox" name="cbDiscipline[]" id="disciplineId" value="<?php echo $row['discipline']; ?>"  checked aria-label="...">
              </span><span style="float-left"><?php echo $row['discipline']; ?></span>
            </div><!-- /input-group -->
          </div><!-- /.col-lg-6 --><br>
          <?php endforeach;?>
        </div><!-- /.row -->
      </div>
    </div>


    <div class="panel-heading" role="tab" id="headingSix">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
          <b>Societies</b>
        </a>
      </h4>
    </div>
    <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
      <div class="panel-body">
        <div class="row">
          <?php
            $settings = parse_ini_file("config.ini");
            foreach ($settings as $key => $setting) {
                // Notice the double $$, this tells php to create a variable with the same name as key
                $$key = $setting; 
            }
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpw) or die ('I cannot connect  to the database because: ' . mysql_error());
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $societies = $conn->prepare("SELECT name FROM societies ");
            $societies->execute();
          ?>
          <div class="col-lg-6">
            <div class="input-group">
              <span class="sbBGr">
                <input type="checkbox" onClick="toggle2(this)" /> Toggle All Societies<br/>
              </span>
            </div><!-- /input-group -->
          </div><!-- /.col-lg-6 --><br>

          <?php foreach($societies->fetchAll(PDO::FETCH_ASSOC) as $row) : ?>
          <div class="col-lg-6">
            <div class="input-group">
              <span class="sbBG">
                <input type="checkbox" name="cbSociety[]" id="societyId" value="<?php echo $row['name']; ?>"  checked aria-label="...">
              </span><span style="float-left"><?php echo $row['name']; ?></span>
            </div><!-- /input-group -->
          </div><!-- /.col-lg-6 --><br>
          <?php endforeach;?>

        </div><!-- /.row -->
      </div>
    </div>

<!--
    <div class="panel-heading" role="tab" id="headingFour">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
          Year <br>(more recent than)
        </a>
      </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
      <div class="panel-body">
        <div class="row">
          <div class="col-lg-6">
            <div class="input-group">
              <span class="input-group-addon">
                <input type="checkbox" checked aria-label="...">
              </span><span> 2015</span>
            </div><!~~ /input-group ~~>
          </div><!~~ /.col-lg-6 ~~><br>
          <div class="col-lg-6">
            <div class="input-group">
              <span class="input-group-addon">
                <input type="checkbox" unchecked aria-label="...">
              </span><span> 2014</span>
            </div><!~~ /input-group ~~>
          </div><!~~ /.col-lg-6 ~~><br>
          <div class="col-lg-6">
            <div class="input-group">
              <span class="input-group-addon">
                <input type="checkbox" unchecked aria-label="...">
              </span><span> 2013</span>
            </div><!~~ /input-group ~~>
          </div><!~~ /.col-lg-6 ~~>
        </div><!~~ /.row ~~>
      </div>
    </div>
-->


  </div>
  <!-- 
  <br>  
  <div class="url(https://pixabay.com/static/uploads/photo/2014/04/02/10/55/health-304919_960_720.png" >   <br><br></div>
  -->

</div>

  <div style="background-image: url('files/images/health-304919_960_720.png'); background-repeat: no-repeat; background-size: contain; opacity: 0.8; background-position: bottom; z-index: 33;   " > <br><br><br> <br><br><br><br> <br><br></div>



