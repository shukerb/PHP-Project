<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="style.css">
    <title>PHP Assignment</title>
</head>
<body>
    <div class="container z-depth-5 valign-wrapper ">
        
        <div class="row" >
            <h3>Forget my password</h3>
            <form action="View/passwordRequestView.php" method="GET" class="col " id="signInForm" >
                <div class="input-field col ">
                
                    <div class="row">
                        <label for="email">Email</label>
                        <input type="email"  name="Email" id="email" >
                    </div>
                    <div class="row"><button class="btn waves-effect waves-light" type = "submit"> Recover Password </button></div>
                        
                </div>
            </form>
        
        </div>
    </div>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>