


<!-- 
NEED TO PUT SOCIETIES AND DISCIPLINES CHECKBOXED IN ARRAY TO USE IN SQL
http://stackoverflow.com/questions/4997252/get-post-from-multiple-checkboxes 
-->



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
          <?php foreach($disciplines->fetchAll(PDO::FETCH_ASSOC) as $row) : ?>
          <div class="col-lg-6">
            <div class="input-group">
              <!--  <div class="input-group">   -->
              <span class="input-group-addon">
                <!-- <input type="checkbox" name="cbDiscipline[]" id="disciplineId" value="<?php echo $row['displayName']; ?>" checked aria-label="...">  -->
                <input type="checkbox" name="cbDiscipline[]" id="disciplineId" value="<?php echo $row['discipline']; ?>" checked aria-label="...">
	      <!--  </span><label><?php echo $row['displayName']; ?></label>   -->
                </span><label><?php echo $row['discipline']; ?></label> 
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
            $servername = "localhost"; $dbname = "medSchlObj"; $username = "roFromWeb"; $password = "roPassword1";
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password) or die ('I cannot connect  to the database because: ' . mysql_error());
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $societies = $conn->prepare("SELECT name FROM societies ");
            $societies->execute();
          ?>
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
            </div><!-- /input-group -->
          </div><!-- /.col-lg-6 --><br>
          <div class="col-lg-6">
            <div class="input-group">
              <span class="input-group-addon">
                <input type="checkbox" unchecked aria-label="...">
              </span><span> 2014</span>
            </div><!-- /input-group -->
          </div><!-- /.col-lg-6 --><br>
          <div class="col-lg-6">
            <div class="input-group">
              <span class="input-group-addon">
                <input type="checkbox" unchecked aria-label="...">
              </span><span> 2013</span>
            </div><!-- /input-group -->
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
      </div>
    </div>





  </div>
<br><br><br>
</div>


