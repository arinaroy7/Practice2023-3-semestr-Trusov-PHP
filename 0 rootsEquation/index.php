<!DOCTYPE html>
<html>
<head>
    <title>Квадратное уравнение</title>
    <link rel="stylesheet" type="text/css" href="index.css"> </link> 
</head>
<body>

<?php
    function solveQuadraticEquation($a, $b, $c) {
        $discriminant = $b * $b - 4 * $a * $c;

        if ($discriminant > 0) {
            $x1 = (-$b + sqrt($discriminant)) / (2 * $a);
            $x2 = (-$b - sqrt($discriminant)) / (2 * $a); 
            return[$x1, $x2];

        } else if ($discriminant == 0) {
            $x1 = (-$b) / (2 * $a);
            return[$x1];
        } else {
            return[]; //нет корней
        }
    }  

    //x*x-3x+2=0
    $a = 1;
    $b = -3;
    $c = 2;

    $result = solveQuadraticEquation($a, $b, $c);

    if (count($result) == 0) { //$result - массив, который возвр корни квадратного уравнения
        echo "Корней нет";
    } else {
        echo "Корни уравнения: ";
        foreach ($result as $root) {
            echo $root . " "; //вывод корней на экран - $root - значения переменной
        }

        echo "</p>";
    }
    ?>
</body>
</html>