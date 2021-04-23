<!DOCTYPE html>
<html>
    <head>
        <style type="text/css">
            body{
                background-color: gray;
                padding-bottom: 40px;
             font-family: monospace;
            }
            
            h2{
                text-align:center;
              
              
            } 
            .error{
                color:red;
            }
            td{
                padding-top: 15px;
            }
            .contain{
                margin-left:190px;
                width: 450px;
                height:155vh;
                padding-bottom: 20px;
                border:2px solid black;
                padding-right: 70px;
                    padding-left: 70px;
                background-color: black;
                color:white;
                box-shadow: 5px 4px 5px 8px white;
            }
            input{
                border-radius: 25px;
                border:none;
                outline:none;
                border:1px solid white;
                height:30px;
                padding-left: 5px;
            }
            .control input:focus{
                
            }
        </style>
    </head>
    <body>
       <?php
        $nameErr = $emailErr = $webErr = $cmntErr = $genErr = "";
        $name = $email = $web = $comment = $gender = "";
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            if(empty($_POST['name'])){
                $nameErr = "Name is required";
            }
            else{
                $name = htmlspecialchars($_POST['name']);
                if(!preg_match("/^[a-zA-Z-' ]*$/",$name)){
                    $nameErr = "Only characters and white space is allowed";
                }
                else{
                    $nameErr="Right";
                    
                }
            }
            
            if(empty($_POST['email'])){
                $emailErr = "Email is required";
            }
            else{
                $email = htmlspecialchars($_POST['email']);
                 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
             $emailErr = "Invalid email format";
           }
                else{
                    $emailErr = "Right";
                }
            }
            
             if(empty($_POST['website'])){
                $webErr = "Website is required";
            }
                else{
                $web = htmlspecialchars($_POST['website']);
                
               if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$web)) {
                    $webErr = "Invalid URL";
                    }
                else{
                    $webErr = "Right";
                }
                }
            
            
            if(empty($_POST['comment'])){
                $cmntErr = "Comment is required field";
            }
            else{
                
                $comment = htmlspecialchars($_POST['comment']);
            }
            if(empty($_POST['gender'])){
                $genErr = "Pleas choose a option.";
            }
               else{
                   $gender = htmlspecialchars($_POST['gender']);
               }
        }
               function test_input($data){
                   $data = trim($data);
                   $data = stripcslashes($data);
                   $data = htmlspecialchars($data);
                   return $data;
               }
               
        ?>
        <div class="contain">
        <h2>Form Validation</h2>
        <p><span class="error">*Required Field</span></p>
        <form method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" ></td>
                <td><span class="error">*<?php echo  $nameErr; ?></span></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email"></td>
                <td><span class="error">*<?php echo $emailErr; ?></span></td>
            </tr>
            <tr>
                <td>Website</td>
                <td><input type="text" name="website"></td>
                <td><span class="error">*<?php echo $webErr; ?></span></td>
            </tr>
            <tr>
                <td>Comment</td>
                <td><textarea name="comment"  rows="4" colums="40"></textarea></td>
                <td><span class="error">*<?php  echo $cmntErr; ?></span></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><input type="radio" value="Famale" name="gender">Female
                    <input type="radio" value="Male"   name="gender">Male
                    <input type="radio" value="Others" name="gender">Others
                </td>
                <td>
                    <span class="error">*<?php echo $genErr; ?></span>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Submit" name="submit"></td>
            </tr>
        </table>
        </form>
        
        <h2>My Input</h2>
        <table>
            <tr>
                <td>My Name : </td>
                <td><?php echo $name; ?></td>
            </tr>
            <tr>
                <td>My E-mail : </td>
                <td><?php echo $email; ?></td>
            </tr>
            <tr>
                <td>
                    My Website : 
                </td>
                <td><?php echo $web; ?></td>
            </tr>
            <tr>
                <td>My Comment : </td>
                <td><?php echo $comment; ?></td>
            </tr>
            <tr>
                <td>Gender : </td>
                <td><?php echo $gender; ?></td>
            </tr>
        </table>
        </div>
    </body>
</html>