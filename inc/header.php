<?php
    error_reporting(0);
    require_once  "vendor/autoload.php";
    use App\Classes\Connection;
    use App\Classes\Database;

    $db = new Connection();
    $data = new Database();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>To-let posts</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>


         <?php
            if($_SESSION['name'] == null){
            ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white sticky-top shadow">
    <a class="navbar-brand text-weight-bold" href="index.php">E-ToLet</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto list-unstyled">
            
                
            <li class="nav-item mr-2 active">
                <a class="nav-link text-white" href="index.php">Home</a>
            </li>
            <li class="nav-item mr-2">
                <a class="nav-link text-white" href="signup.php">Advertise</a>
            </li>
            </ul>
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white" href="login.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link border border-gray-dark rounded text-white" href="signup.php">Sign Up</a>
            </li>
       
        </ul> 

           <?php }else{
                 ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white sticky-top shadow">
        <a class="navbar-brand text-weight-bold" href="index.php?email=<?php echo $_SESSION['email']; ?>">E-ToLet</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto ">   
                <li class="nav-item mr-2">
                    <a class="nav-link text-white" href="index.php?email=<?php echo $_SESSION['email']; ?>">Home</a>
                </li>
               
                <li class="nav-item mr-2">
                    <a class="nav-link text-white" href="advertise.php?email=<?php echo $_SESSION['email']; ?>">Advertise</a>
                </li>
           </ul>
           <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="?logout=true">Logout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href=""><?php echo $_SESSION['name']; ?></a>
                </li>
            </ul>
            <?php
            }
        ?>
           
            
        

    </div>
</nav>


</body>
</html>