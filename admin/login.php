<html>  
<head>  
    <title>login</title>  
   
   <style>
body, html {
  height: 100%;
}

* {
  box-sizing: border-box;
}

.bg-img {

background-image: url("assets/img/bicycle-4659783_1280.png");
min-height: 900px;
background-position: 100%;
background-repeat: no-repeat;
background-size: cover;
position: relative;
}


.container {
  position: absolute;
  right: 0;
  margin: 20px;
  max-width: 300px;
  padding: 16px;
  background-color: #639aaf;
}

  input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}


.btn {
  background-color: #04AA6D;
  color: #d8e6eb;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}
   </style>
</head>  
<body>  
<div class="bg-img">

        <h1 style= "text-align: center;">Login</h1>  


        <form name="f1" action = "dashboard.php"  class="container" onsubmit = "return validation()" method = "POST">  
            <p>  
                <label> Admin Name: </label>  
                <input type = "text" id ="user" name  = "user" />  
            </p>  
            <p>  
                <label> Password: </label>  
                <input type = "password" id ="pass" name  = "pass" />  
            </p>  
            <p>     
                <input type =  "submit" id = "btn" value = "Login" />  
            </p>  
        </form>  

  
    <script>  
            function validation()  
            {  
                var id=document.f1.user.value;  
                var ps=document.f1.pass.value;  
                if(id.length=="" && ps.length=="") {  
                    alert("User Name and Password fields are empty");  
                    return false;  
                }  
                else  
                {  
                    if(id.length=="") {  
                        alert("User Name is empty");  
                        return false;  
                    }   
                    if (ps.length=="") {  
                    alert("Password field is empty");  
                    return false;  
                    }  
                }                             
            }  
        </script>  
        <?php      
    include('db.php');  
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select *from 'admin_info' where admin_name = '$username' and admin_password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            echo "<h1><center> Login successful </center></h1>";  
        
        }  
        else{  
            echo "Login failed. Invalid username or password";  
        }     
?>  
  </div>  
</body>     
</html>  