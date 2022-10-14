<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moodle</title>
    <link rel="stylesheet" href="login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .divcontainer{
            width: 600px;
            height: 400px;
            background-color: rgba(220, 202, 202, 0.74); 
            backdrop-filter: blur(2px); 
            -webkit-backdrop-filter: blur(4px);
            /* border: 3px solid white; */
            overflow: auto;
            box-shadow: 3px 3px 3px #ccc
            
        }
        .heading1{
            display: flex; 
            align-items: center;
            justify-content: center;
        }
        
    </style>
</head>
<body>
    <section class="container-fluid bg"  style="position: relative; display: flex; align-items: center; justify-content: center;">
        
        <div class="divcontainer" id="divcontainer"  >
            <div class="div1">
                <h1 class="heading1">MOODLE</h1>
                
                <ul style="list-style: none;">

                    <li><h3 class="text-uppercase">click to sign in as Staff</h3></li>
                    <li style="list-style: none;"><button class="btn btn-primary"><a href="stafflogin.php" style="color: white; text-decoration:none;">SIGN IN AS STAFF</a></button></li>
                    <br><br><br>
                    <li><h3 class="text-uppercase">click to sign in as Student</h3></li>
                    <li style="list-style: none;"><button class="btn btn-primary"><a href="studentlogin.php" style="color: white; text-decoration:none;">SIGN IN AS STUDENT</a></button></li>
                    
                </ul>
            </div>
            
        </div>
    </section>


    



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>