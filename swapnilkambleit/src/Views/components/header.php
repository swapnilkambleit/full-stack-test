<?php global  $APP_URL;  
use App\Helpers\Flash; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap.min.css" integrity="sha512-fw7f+TcMjTb7bpbLJZlP8g2Y4XcCyFZW8uy8HsRZsH/SwbMw0plKHFHr99DN3l04VsYNwvzicUX/6qurvIxbxw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
    <link rel="stylesheet" href="./style.css" />

    <style>
        .navbar-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

            /* Logo styles */
        .logo {
            font-size: 1.5rem;
            font-weight: bold;
        }
    </style>

</head>
<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark navbar-gradient fixed-top">
            <div class="container">
                <a class="navbar-brand logo" href="#">
                    <i class="fas fa-gem"></i>
                    Swapnil Kamble It
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav2">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNav2">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="<?php echo $APP_URL; ?>">Home</a>
                        </li>
                            <li class="nav-item">
                            <a class="nav-link" href="<?php echo $APP_URL; ?>categories">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $APP_URL; ?>posts">Posts</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container py-4 mt-5">

        <div class="falsh-message py-2 mt-2">
            <?php Flash::showFlash(); ?> 
        </div>
    