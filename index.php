<!DOCTYPE html>
<html lang="en">

<head>
    <title>THE book store</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link href="mystyle.css" rel="stylesheet">

    <?php
        $images = glob("images/*.{jpg,png,gif}", GLOB_BRACE); // Fetch all images from "images" folder
    ?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class = "grey_bg">


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto"> 
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Page 1
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Page 1-1</a></li>
                        <li><a class="dropdown-item" href="#">Page 1-2</a></li>
                        <li><a class="dropdown-item" href="#">Page 1-3</a></li>
                    </ul>
                </li> -->
            </li>
                <div class="d-flex gap-2">
                    </li>
                        <a href="index.html">
                            <button type="button" class="btn btn-dark btn-outline-light border-4 rounded-2">HOME</button>
                        </a>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-dark btn-outline-light border-4 rounded-2">BASKET</button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-dark btn-outline-light border-4 rounded-2">ACCOUNT</button>
                    </li>
                </div>
            </ul>
        </div>
    </div>
</nav>

<!-- <div class="container-fluid grey_bg text-light"> -->
    <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
            $active = "active"; // First image should be active
            foreach ($images as $image) {
                echo "<div class='carousel-item $active'>";
                echo "<a href='$image' target='_blank'><img src='$image' class='d-block w-100'></a>";
                echo "</div>";
                $active = ""; // Remove "active" after the first image
            }
            ?>
        </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
    </div>
<!-- </div> -->

</body>
</html>
