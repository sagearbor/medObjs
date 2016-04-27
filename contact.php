
<!DOCTYPE html>
<html>
<head>
<title>About </title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> </link>
<link type="text/css" rel="stylesheet" href="site.css" </link>
</head>
<body>
<title> Medical School objectives DB </title><br>
<h1 class="text-center"> Medical School objective DB  </h1><br>
<h2 class="text-center"> A searchable database from multiple national societies </h2><br>

<div class="col-xs-12 col-sm-12 col-lg-12">


<?php
$action=$_REQUEST['action'];
if ($action=="")    /* display the contact form */
    {
    ?>
    <form  action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="action" value="submit">
    Your name:<br>
    <input name="name1" type="text" value="" size="30"/><br>
    Your email:<br>
    <input name="email1" type="text" value="" size="30"/><br>
    Your message:<br>
    <textarea name="message1" rows="7" cols="30"></textarea><br>
    <input type="submit" value="Send email"/>
    </form>
    <?php
    } 
else                /* send the submitted data */
    {
    $name2=$_REQUEST['name1'];
    $email2=$_REQUEST['email1'];
    $message2=$_REQUEST['message1'];
    if (($name2=="")||($email2=="")||($message2==""))
        {
        echo "All fields are required, please fill <a href=\"\">the form</a> again.";
        }
    else{        
        $from2="From: $name2<$email2>\r\nReturn-path: $email2";
        $subject2="Message sent using your contact form";
        //mail("sarbor@marian.edu", $subject2, $message2, $from2);
        mail("sagearbor@gmail.com", $subject2, $message2);
        echo "Email sent!";
        }
    }  
//mail("sarbor@marian.edu", "hard coded subject to sarbor", "hard coded message to sarbor" , "From: sage3@example.com");
//mail("sagearbor@gmail.com", "hard coded subject to sarbor", "hard coded message to sarbor" , "From: sage3@example.com");
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
    <a href="./index.php"><span class="glyphicon glyphicon-home" aria-hidden="true">Home  |</a></span>
    <a href="./contact.php"><span class="glyphicon glyphicon-search" aria-hidden="true">Contact  |</a></span>
    <a href="./about.html"><span class="glyphicon glyphicon-info-sign" aria-hidden="true">About  |</a></span>
    <a href="./help.html"><span class="glyphicon glyphicon-question-sign" aria-hidden="true">Help</a></span>
  </div>
</div>

</html>



