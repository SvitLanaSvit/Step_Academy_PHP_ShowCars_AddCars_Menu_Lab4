<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        .title{
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <hr>
        <h2 class="title">LIST OF CARS</h2>
        <?
            $filePath = "cars.txt";
            $cars = [];
            if(file_exists($filePath)){
                $fd = fopen($filePath, "r") or die("File not found!");
                while(!feof($fd)){
                    $str = fgets($fd);
                    $cars[] = trim($str);
                }
            }
            if(count($cars) > 0){
                echo "<table class='table table-striped table-hover'><thead><tr>";
                echo "<th>Manufacturer</th><th>Model</th><th>Price</th><th>Currency</th><th>PS</th><th>Country</th></tr></thead>";
                echo "<tbody>";
                foreach($cars as $car){
                    if(!empty($car)){
                        echo "<tr>";
                        $carArray = explode(":", $car);
                        for($i = 0; $i < count($carArray); $i++){
                            echo "<td>$carArray[$i]</td>";
                        }
                        echo "</tr>";
                    }
                }
                echo "</tbody></table>";
            }
        ?>
    </div>

</body>
</html>