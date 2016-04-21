


<!-- 
NEED TO PUT SOCIETIES AND DISCIPLINES CHECKBOXED IN ARRAY TO USE IN SQL
http://stackoverflow.com/questions/4997252/get-post-from-multiple-checkboxes 
-->

<!-- 
Javascript based on
http://jsfiddle.net/H37cb/
http://stackoverflow.com/questions/19282219/check-uncheck-all-the-checkboxes-in-a-table
-->
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





<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true"> 
<br>
  <div class="panel panel-default">
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
            $servername = "localhost"; $dbname = "medSchlObj"; $username = "roFromWeb"; $password = "roPassword1";
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password) or die ('I cannot connect  to the database because: ' . mysql_error());
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // $disciplines = $conn->prepare("SELECT displayName FROM disciplines WHERE inDB = 1");
            $disciplines = $conn->prepare("SELECT discipline FROM disciplines WHERE inDB = 1");
            $disciplines->execute();
          ?>

          <div class="col-lg-6">
            <div class="input-group">
              <li class="input-group-addon">
                <!--  <input type="checkbox" name="selectAllDisciplines" id="selectAllDisciplines" value="selectAllDisciplines" unchecked aria-label="...">  -->
                <!-- <input type="checkbox" onchange="checkAll2(this)" name="selectAllDisciplines" id="selectAllDisciplines" value="selectAllDisciplines" unchecked aria-label="..." />  -->
                <input type="checkbox" name="selectAllDisciplines" id="selectAllDisciplines" value="selectAllDisciplines" unchecked aria-label="..." />
                <label>All</label>
                <ul>
                  <?php foreach($disciplines->fetchAll(PDO::FETCH_ASSOC) as $row) : ?>
                    <!-- <input type="checkbox" name="cbDiscipline[]" id="disciplineId" value="<?php echo $row['displayName']; ?>" checked aria-label="...">  -->
                    <li><input type="checkbox" name="cbDiscipline[]" id="disciplineId" value="<?php echo $row['discipline']; ?>" checked aria-label="..." />
                      <!--  </span><label><?php echo $row['displayName']; ?></label>   -->
                      <label><?php echo $row['discipline']; ?></label>
                    </li>
                  <?php endforeach;?>
                <ul>
              </li>
            </div><!-- /input-group -->
          </div><!-- /.col-lg-6 --><br>
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
            $servername = "localhost"; $dbname = "medSchlObj"; $username = "roFromWeb"; $password = "roPassword1";
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password) or die ('I cannot connect  to the database because: ' . mysql_error());
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $societies = $conn->prepare("SELECT name FROM societies ");
            $societies->execute();
          ?>

          <div class="col-lg-6">
            <div class="input-group">
              <span class="input-group-addon">
                <input type="checkbox" name="selectAllSocieties" id="selectAllSocieties" value="selectAllSocieties" unchecked aria-label="...">
              </span><label>All</label>
            </div><!-- /input-group -->
          </div><!-- /.col-lg-6 --><br>

          <?php foreach($societies->fetchAll(PDO::FETCH_ASSOC) as $row) : ?>
          <div class="col-lg-6">
            <div class="input-group">
              <span class="input-group-addon">
                <input type="checkbox" name="cbSociety[]" id="societyId" value="<?php echo $row['name']; ?>"  checked aria-label="...">
              </span><span><?php echo $row['name']; ?></span>
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
<br><br><br>
</div>


