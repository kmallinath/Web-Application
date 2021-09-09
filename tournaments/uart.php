 <!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/upload.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Drawing</title>
</head>
<body>
  <header>
  
  <h1><a href="index.html"><img src="images/syt.jpg" alt="logo" width="80"></a>ShowYourTalent-SYT</h1>
  </header>
  <br>
<div class="topnav" id="myTopnav">
  <a href="index.html" class="active">Home</a>
  
  
  <div class="dropdown">
    <button class="dropbtn">Contests 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="art.html">Art-By Hand</a>
      <a href="singing.html">Singing</a>
      <a href="story.html">Story/Quotes</a>
    </div>
  </div> 
  <a href="#news">Tournaments</a>
  <a href="#about">Help</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
</body>
</html>

<?php
              
if(isset($_POST['textdata']))
{
$data=$_POST['textdata'];
$fp = fopen('art.txt', 'a');
fwrite($fp, $data);
fclose($fp);
}
?>
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
  if (is_uploaded_file($_FILES['my_upload']['tmp_name'])) 
  { 
  	//First, Validate the file name
  	if(empty($_FILES['my_upload']['name']))
  	{
  		echo " File name is empty! ";
  		exit;
  	}

  	$upload_file_name = $_FILES['my_upload']['name'];
  	//Too long file name?
  	if(strlen ($upload_file_name)>1000)
  	{
  		echo " too long file name ";
  		exit;
  	}

  	//replace any non-alpha-numeric cracters in th file name
  	$upload_file_name = preg_replace("/[^A-Za-z0-9 \.\-_]/", '', $upload_file_name);

  	//set a limit to the file upload size
  	if ($_FILES['my_upload']['size'] > 100000000) 
  	{
		echo " too big file ";
  		exit;        
    }

    //Save the file
    $dest=__DIR__.'/art/'.$upload_file_name;
    if (move_uploaded_file($_FILES['my_upload']['tmp_name'], $dest)) 
    {
    	echo nl2br("<h1>File Has Been Uploaded!Thankyou.\nAll The Best\nYou Can Move To Home Page</h1>");
    }
  }
}