<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="160">

    <!-- bootstrap component -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- main css -->
    <link rel="stylesheet" href="../css/style.css">

    <!-- hamburgers button -->
    <link rel="stylesheet" href="../node_modules/hamburgers/dist/hamburgers.css">

    <!-- owl css component -->
    <link rel="stylesheet" href="../node_modules/owl.carousel/dist/assets/owl.carousel.css">

    <title>Warunk Marwan</title>
</head>
<body>
    <header class="mb-3">
        <div class="container-fluid">
            <!-- navbar -->
            <nav class="py-2 mb-2">
                <div class="row">
                    <div class="col d-flex align-items-center">
                        <!-- Hamburger btn -->
                        <button class="hamburger hamburger--spin" type="button">
                            <span class="hamburger-box">
                              <span class="hamburger-inner"></span>
                            </span>
                        </button>  
                    </div>
                    <div class="col d-flex align-items-center">
                        <!-- logo -->
                        <a href="../" class="mx-auto">
                            <img src="../asset/logo.png" alt="" width="60">
                        </a>
                    </div>
                    <div class="col d-flex align-items-center justify-content-end">
                        <!-- cart -->
                        <a href="../pages/cart.html" class="cart rounded shadow-sm p-2 d-flex align-items-center position-relative">
                            <img src="../asset/icon/shopping-cart.png">
                            <div id="cart-count" class="position-absolute rounded-circle border-0 d-flex align-items-center" style="background-color: red; top: -10px; right: -7px; width: 20px; height: 20px; visibility: hidden;">
                                <p id="total-items-on-cart" class="text-white text-center mx-auto my-2 fw-bold" style="font-size: 11pt;">
                                    <!-- generate by javascript -->
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            </nav>

            <!-- banner -->
            <div class="banner-box py-3 mx-auto my-2 rounded shadow-lg d-flex">
                <h2 class="fw-bold text-center mx-auto text-white">Warunk Bu Yuyun</h2>
            </div>
        </div>
    </header>

    <section class="mb-5">
        <div class="container-fluid mb-3">
            <div class="d-flex align-items-center justify-content-between border-bottom mb-3">
                <h2 class="title fs-5 fw-bold">
                    Pesanan
                </h2>
                <h2 class="title fs-5 fw-bold text-muted">
                    <div id="orderid"></div>
                </h2>
            </div>
            <!-- ORDERS ACTIVE -->
            <?php
            // open connection
            include "../server/config.php";

            $sql = "SELECT * from `orders` WHERE `status` = ''";
            if($mysqli->query($sql)):
                $query = $mysqli->query($sql);
                if($query->num_rows > 0):
                    while($data = $query->fetch_assoc()):
            ?>
                <div class="card items w-100 rounded shadow-sm bg-light p-2 border-0 mb-3">
                    <div class="card-header d-flex justify-content-between border-0">
                        <strong>Order ID</strong>
                        <strong><?= $data['orderID'] ?></strong>
                    </div>
                    <div class="card-body">
                        <?php
                            
                        $item = json_decode($data['data']);
                        foreach($item as $values):
                        ?>                      
                            <div class="card-item mb-2 d-flex justify-content-between">
                                <strong class="text-muted"><?= $values->name ?></strong>
                                <strong class="text-muted"><?= $values->price ?></strong>
                            </div>
                        <?php
                        endforeach;
                        ?>
                        <div class="card-item mb-2 d-flex justify-content-between mt-4">
                            <strong class="">Total Pembayaran</strong>
                            <strong class="">
                                <?php
                                setLocale(LC_ALL, 'IND');
                                echo money_format("", $data['total_price']);
                                ?>
                            </strong>
                        </div>
                    </div>
                    <button class="btn btn-lg btn-primary bg-dark border-0 w-100 mb-2" <?= "onclick=updateOrder('" . $data['orderID'] . "')" ?>>
                        <small>Selesaikan pesanan</small>
                    </button>
                    <div class="d-flex justify-content-between px-2">
                        <i><small class="text-muted">Pesanan diterima</small></i>
                        <i><small class="text-muted">2021-02-10 08:10</small></i>
                    </div>
                </div>
            <?php
                    endwhile;
                endif;
            endif;
            ?>
            <div class="d-flex align-items-center justify-content-between border-bottom mb-3">
                <h2 class="title fs-5 fw-bold">
                    Pesanan Selesai
                </h2>
            </div>

            <?php
            $sql = "SELECT * from `orders` WHERE `status` = 'selesai'";
            if($mysqli->query($sql)):
                $query = $mysqli->query($sql);
                if($query->num_rows > 0):
                    while($data = $query->fetch_assoc()):
            ?>
                    <div class="card items w-100 rounded shadow-sm bg-light p-2 border-0 mb-3">
                        <div class="card-header d-flex justify-content-between border-0">
                            <strong>Order ID</strong>
                            <strong><?= $data['orderID'] ?></strong>
                        </div>
                        <div class="d-flex justify-content-between px-2 border-top">
                            <i><small class="text-muted">Pesanan selesai</small></i>
                            <i><small class="text-muted">2021-02-10 08:10</small></i>
                        </div>
                        <!-- <a href="#" class="btn btn-lg btn-primary bg-dark border-0 w-100"><small>Pesanan Selesai</small></a> -->
                    </div>
            <?php 
                    endwhile;
                endif;
            endif;
            ?>
        </div>
    </section>

    <footer class="py-5 bg-dark">

    </footer>
    
    <!-- jquery -->
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <!-- owl library -->
    <script src="../node_modules/owl.carousel/dist/owl.carousel.min.js"></script>

    <script>
        // here for hamburger :)
        // Look for .hamburger
        var hamburger = document.querySelector(".hamburger");
        // Look for #menuToggle
        var menu = document.querySelector(".menuToggle")

        // On click even
        hamburger.addEventListener("click", function() {
            // Toggle class "is-active"
            hamburger.classList.toggle("is-active");

            // Something else, like open/close menu
            // Toggle class "menu-active"
            menu.classList.toggle("menu-active");
        });

        // Owl carousel
        $(document).ready(function(){
            $(".owl-carousel").owlCarousel({
                items: 2,
                margin: 70
            });
        });


        // costum javascript
        window.addEventListener('DOMContentLoaded', function() {
            generateOrder()
        })

        function updateOrder(orderID)
        {
            let restJson = {
                id: orderID
            }
            // open connection server
            let xhr = new XMLHttpRequest()
            let url = "http://marwanklik.com/server/update-order.php"

            xhr.open("POST", url, true)

            // set request header
            xhr.setRequestHeader("Content-Type", "application/json")

            // state callback
            xhr.onreadystatechange = function() {
                if(xhr.readyState === 4 && xhr.status === 200)
                {
                    // get response data
                    let response = JSON.parse(this.responseText)

                    if(response.status == 'success')
                    {
                        // configure view here
                        location.reload()
                        console.log(response.status)
                    }
                    else
                    {
                        // get response data
                        console.log(response.status)
                    }
                }
            }

            xhr.send(JSON.stringify(restJson))
        }
    </script>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>