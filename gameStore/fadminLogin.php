<!DOCTYPE html

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
<style>
body {font-family: 'Oswald', Helvetica, sans-serif;
background-color: #000000;}
* {box-sizing: border-box;}

.input-container {
    display: -ms-flexbox; /* IE10 */
    display: flex;
    width: 100%;
    margin-bottom: 15px;
}

.icon {
    padding: 10px;
    background: #50C878;
    color: white;
    min-width: 50px;
    text-align: center;
	
}

.input-field {
    width: 100%;
    padding: 10px;
    outline: none;
}

.input-field:focus {
    border: 2px solid dodgerblue;
}

/* Set a style for the submit button */
.btn {
    background-color: #50C878;
    color: white;
    padding: 15px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

.btn:hover {
    opacity: 1;
}
</style>
<title>UNIQ STORE.</title>
</head>
<body>

<div id='cssmenu'>
<ul>
   <li><a href='index.php'>BACK</a></li>
</ul>
</div>
<div style="margin-top: 100px">
<form name="fadminLogin" action="adminLogin.php" method="post" style="max-width:300px;margin:auto">
 <center>  <h3><font color="#FFD700">Admin Login</font></h3 </center>
 
  <div class="input-container">
  <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="email" name="ADMIN_EMAIL">
  </div> 

  <div class="input-container">
  <i class="fa fa-key icon"></i>
    <input class="input-field" type="password" placeholder="password" name="ADMIN_PASSWORD">
  </div>
  
  <input name="submit" class="btn" type="Submit" value="LOGIN">
</form>
</div>
</body>
</html>
