<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">

    <style>
        .info{
            font-size: 18px;
            color: green;
        }

        .info_exists{
            font-size: 18px;
            color: red;
        }

        .countCars{
            margin-top: 20px;
            font-size: 18px;
            font-weight: bolder;
            color:dodgerblue;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Menu</h2>
        <?
            $links = ["SHOW CARS"=>"?page=1", "ADD CAR"=>"?page=2"];
            echo "<div class='list-group w-25'>";
            foreach($links as $k=>$v){
                echo "<a href='$v' class='list-group-item list-group-item-action' aria-current='true'>$k</a>";
            }
            echo "</div>";

            $filePath = "cars.txt";
            $carCount = 0;
            if(file_exists($filePath)){
                $fd = fopen($filePath, "r") or die("File not found!");
    
                while (!feof($fd)) {
                    $str = fgets($fd);
                    if (!empty(trim($str))) {
                        $carCount++;
                    }
                }

                echo "<div class='countCars'>Count of cars in the file: " . $carCount . "</div>";
            }

            if(isset($_GET["page"])){
                $num = $_GET["page"];
                switch($num){
                    case "1":
                        include_once("showCars.php");
                        break;
                    case "2":
                        include_once("addCar.php");
                        break;
                    default:
                        echo "There is not this address.";
                }
            }

            if(isset($_GET["submit"])){
                echo "<hr>";
                $manufacturer = $_GET["manufacturer"];
                $model = $_GET["model"];
                $price = $_GET["price"];
                $currency = $_GET["currency"];
                $ps = $_GET["ps"];
                $country = $_GET["country"];

                $carsArray = [$manufacturer, $model, $price, $currency, $ps, $country];

                $carExists = false;
                $filePath = "cars.txt";
                if(file_exists($filePath)){
                    $fd = fopen($filePath, "r") or die("File not found!");
                    
                    while(!feof($fd)){
                        $str = fgets($fd);
                        $cars = explode("\n", $str);
                        foreach($cars as $car){
                            if(strpos($car, "$carsArray[0]:$carsArray[1]:$carsArray[2]:$carsArray[3]:$carsArray[4]:$carsArray[5]") !== false){
                                echo "<div class='info_exists'>The car exists in the file.</div>";
                                $carExists = true;
                                break;
                            }
                        }
                    }
                }

                if(!$carExists){
                    writeToFile($filePath, $carsArray);
                }

                echo "<script>setTimeout(()=>{location = 'index.php'}, 1000)</script>";
            }

            function writeToFile($filePath, $cars){
                $fd = fopen($filePath, "a+") or die("Unable to create file!");
                $str = "$cars[0]:$cars[1]:$cars[2]:$cars[3]:$cars[4]:$cars[5]";
                fwrite($fd, $str . PHP_EOL);
                fclose($fd);
                echo "<div class='info'>The info of car wrote to file.</div>";
            }
        ?>
    </div>
</body>
</html>