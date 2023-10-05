<!DOCTYPE html>
<html>
<head>
    <title>Функции</title>
    <link rel="stylesheet" type="text/css" href="index.css"> </link> 
</head>
</html>
<body>
    <?php
    function calculateTriangleInfo($point1, $point2, $point3) {

        $a = sqrt(($point2['x'] - $point3['x']) ** 2 + ($point2['y'] - $point3['y']) ** 2);
        $b = sqrt(($point1['x'] - $point3['x']) ** 2 + ($point1['y'] - $point3['y']) ** 2); //считаем длины сторон треуголь
        $c = sqrt(($point1['x'] - $point2['x']) ** 2 + ($point1['y'] - $point2['y']) ** 2);

        $s = calculateTriangleArea($a, $b, $c); //по формуле Герона - в тетраде

        $sinA = ($a / $b) * sqrt(1 - ($a * $a + $b * $b - $c * $c) / (2 * $a * $b)); //через закон sin, считаем углы в радианах
        $sinB = ($b / $c) * sqrt(1 - ($b * $b + $c * $c - $a * $a) / (2 * $b * $c));
        $sinC = ($c / $a) * sqrt(1 - ($c * $c + $a * $a - $b * $b) / (2 * $a * $c));
        
        $angleA = rad2deg(asin($sinA)); 
        $angleB = rad2deg(asin($sinB)); // из радианов в градусы переводим
        $angleC = rad2deg(asin($sinC));

        //возвр инф о треуголь
        return [  
            'a' => $a,
            'b' => $b,
            'c' => $c,
            'angles' => [
                'A' => $angleA,
                'B' => $angleB,
                'C' => $angleC,
            ],
            'area' => $s,
        ];
    }

    function distance($point1, $point2) {

        $dx = $point1['x'] - $point2['x']; 
        $dy = $point1['y'] - $point2['y'];

        return sqrt($dx * $dx + $dy * $dy); //через теорему пифагора - расстояние 
    }

    $point1 = ['x' => 0, 'y' => 0]; //определяем точки в двумерном пространстве пр: (0,0)
    $point2 = ['x' => 4, 'y' => 0];
    $point3 = ['x' => 0, 'y' => 3];

    $angles = calculateTriangleInfo($point1, $point2, $point3); //функция вычисляет углы треуголь, образованного точками выше и возвр результат

    function calculateTriangleArea($a, $b, $c) {
        // Вычисляем площадь треугольника по формуле Герона
        $s = 0.5 * sqrt(($a + $b + $c) * ($b + $c - $a) * ($c + $a - $b) * ($a + $b - $c));
        return $s;
    }

    $point1 = ['x' => 0, 'y' => 0];
    $point2 = ['x' => 4, 'y' => 0];
    $point3 = ['x' => 0, 'y' => 3];

    $info = calculateTriangleInfo($point1, $point2, $point3);

    echo "Длины сторон треугольника:<br> ";
    echo "a: " . $info['a'] . "<br>"; //вычисляется, как расстояние между точкой 2 и 3
    echo "b: " . $info['b'] . "<br>";
    echo "c: " . $info['c'] . "<br>";

    echo "Углы треугольника: <br> ";
    echo "A: " . $info['angles']['A'] . "<br>";
    echo "B: " . $info['angles']['B'] . "<br>";
    echo "C: " . $info['angles']['C'] . "<br>";

    echo "Площадь треугольника: " . $info['area'] . "<br>";
    
    ?>
</body>