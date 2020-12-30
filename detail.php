<?php

session_start();

require_once("./libs/Query.php");
require_once("./libs/Router.php");

$query = new Query();
$router = new Router();

$id = "";
$name = "";
$description = "";
$price = "";
$category = "";
$img = "";

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $result = $query->getProduct($id);

    $name = $result[0]["name"];
    $description = $result[0]["description"];
    $price = $result[0]["price"];
    $img = $result[0]["img"];
    $category = ($query->getCate($result[0]["idCate"]))[0]["name"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./resource/css/styleDetail.css" />
    <title>Store</title>
</head>

<body>
    <header>
        <div class="logo">
            <img src="./resource/img/logo.png" alt="" />
        </div>
        <nav>
            <?php
            require("pages/category.php");
            ?>
        </nav>
    </header>

    <slide>
        <img src="./resource/img/slide.jpg" alt="" width="100%" />
    </slide>

    <section>
        <div class="container">
            <div class="img">
                <img src="./resource/img/<?= $img ?>" alt="" width="70%" />
            </div>
            <div class="content">
                <h3><?= $name ?></h3>
                <div class="row">
                    <div>Price</div>
                    <p><?= $price ?></p>
                </div>
                <div class="row">
                    <div>Category:</div>
                    <p><?= $category ?></p>
                </div>
                <div class="row">
                    <div>Description:</div>
                    <p><?= $description ?></p>
                </div>
                <div class="rowbtn">
                    <a href="checkout.php?id=<?= $id ?>" class="btn">Buy Now</a>
                    <a href="index.php" class="btn">Cancel</a>
                </div>
            </div>
        </div>
        <div class="info">
            <div class="content">
                <h3>Technical specifications</h3>
                <div class="row">
                    <div>Model:</div>
                    <p>Winner X Sport ABS</p>
                </div>
                <div class="row">
                    <div>Years:</div>
                    <p>2020</p>
                </div>
                <div class="row">
                    <div>Engine:</div>
                    <p>Four stroke , single cylinder, SOHC, 2-valve</p>
                </div>
                <div class="row">
                    <div>Capacity:</div>
                    <p>149.1 cc / 9.0 cu-in</p>
                </div>
                <div class="row">
                    <div>Bore x Stroke:</div>
                    <p>57.3 x 57.8 mm</p>
                </div>
                <div class="row">
                    <div>Cooling System:</div>
                    <p>Liquid cooled</p>
                </div>
                <div class="row">
                    <div>Compression Ratio:</div>
                    <p>11.3:1</p>
                </div>
                <div class="row">
                    <div>Induction:</div>
                    <p>PGM-FI with automatic enrichment</p>
                </div>
                <div class="row">
                    <div>Ignition:</div>
                    <p>Fully transistorised ignition</p>
                </div>
                <div class="row">
                    <div>Battery:</div>
                    <p>MF 12 V, 5.0 Ah</p>
                </div>
                <div class="row">
                    <div>Starting:</div>
                    <p>Electric &amp; kick</p>
                </div>
                <div class="row">
                    <div>Max Power:</div>
                    <p>15.7 hp / 11.6 kW @ 9000 rpm</p>
                </div>
                <div class="row">
                    <div>Max Toque:</div>
                    <p>13.5 Nm / 9.9 lb-ft @ 6500 rpm</p>
                </div>
                <div class="row">
                    <div>Clutch:</div>
                    <p>Multiple wet with coil spring</p>
                </div>
                <div class="row">
                    <div>Transmission:</div>
                    <p>6 Speed</p>
                </div>
                <div class="row">
                    <div>Final Drive:</div>
                    <p>Belt</p>
                </div>
                <div class="row">
                    <div>Frame:</div>
                    <p>Twin Tube Steel</p>
                </div>
                <div class="row">
                    <div>Front Suspension:</div>
                    <p>Telescopic forks</p>
                </div>
                <div class="row">
                    <div>Rear Suspension:</div>
                    <p>Swing arm with monoshock</p>
                </div>
                <div class="row">
                    <div>Front Brakes:</div>
                    <p>Single hydraulic disc</p>
                </div>
                <div class="row">
                    <div>Rear Brakes:</div>
                    <p>Single hydraulic disc</p>
                </div>
                <div class="row">
                    <div>Front Tyre:</div>
                    <p>90 / 80-17 46P (tubeless)</p>
                </div>
                <div class="row">
                    <div>Rear Tyre:</div>
                    <p>120 / 70-17 58P (tubeless)</p>
                </div>
                <div class="row">
                    <div>Dimensions:</div>
                    <p>
                        Length 2025 mm / 79.7 in Width 725 mm / 28.5 in Height 1102 mm /
                        43.3 in
                    </p>
                </div>
                <div class="row">
                    <div>Wheelbase:</div>
                    <p>1284 mm / 50.9 in</p>
                </div>
                <div class="row">
                    <div>Seat Height:</div>
                    <p>780 mm / 30.7 in</p>
                </div>
                <div class="row">
                    <div>Ground Clearance:</div>
                    <p>150 mm / 50.9 in</p>
                </div>
                <div class="row">
                    <div>Dry Weight:</div>
                    <p>119 kg / 262.3 lbs</p>
                </div>
                <div class="row">
                    <div>Fuel Capacity:</div>
                    <p>4.5 Litres / 1.9 US gal</p>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="footer-container">
            <ul>
                <li class="menu_title">
                    <h3>Thông tin</h3>
                </li>
                <li>
                    <a href="https://giaxe.2banh.vn/gioi-thieu.html" rel="nofollow">Giới thiệu</a>
                </li>
                <li>
                    <a href="https://www.2banh.vn/misc/contact" target="_blank" rel="nofollow">Liên hệ</a>
                </li>
            </ul>
            <ul>
                <li class="menu_title">
                    <h3>Hãng xe</h3>
                </li>
                <li>
                    <a href="https://giaxe.2banh.vn/honda.html" title="Xe Honda">Xe Honda</a>
                </li>
                <li>
                    <a href="https://giaxe.2banh.vn/yamaha.html" title="Xe Yamaha">Xe Yamaha</a>
                </li>
                <li>
                    <a href="https://giaxe.2banh.vn/suzuki.html" title="Xe Suzuki">Xe Suzuki</a>
                </li>
                <li>
                    <a href="https://giaxe.2banh.vn/piaggio.html" title="Xe Piaggio">Xe Piaggio</a>
                </li>
            </ul>
        </div>
        <div class="contact_info">
            <div>Công ty TNHH Truyền Thông Số</div>
            <div>Số ĐKKD: 0304710474</div>
            <div>Văn Phòng: 427 Trường Chinh, P.14, Q.Tân Bình, Tp.HCM</div>
            <div>
                <span style="text-decoration: underline">Địa chỉ làm việc:</span>
                309 Vườn Lài, P.Phú Thọ Hòa, Q.Tân Phú, Tp.HCM
            </div>
            <div>Email: 2banh@igo.vn</div>
            <div>Liên hệ quảng cáo: 0945.098.890 - 0986.522.287</div>
        </div>
    </footer>
</body>

</html>