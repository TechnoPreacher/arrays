<?php


echo "1.Рекурсивно выведите на экран ряд Фибоначчи до 10-го элемента:" . '</br>';


function fib($num, $aa = 0, $bb = 0): int
{
    static $nu;
    $nu++;
    if ($nu > $num) return 0;//для выхода из рекурсии
    $c = $aa + $bb;//1
    echo $c . '</br>';
    if ((0 == $aa) && (0 == $bb)) {
        $bb = 1;
    }
    return fib($num, $bb, $c);
}

fib(10);// число желаемых элементов ряда


echo '</br></br>' . '2. Создайте в цикле (for либо while) одномерный массив из 10 элементов, где значение на каждой итерации - произвольное число от 1 до 10 (используйте функцию mt_rand):' . '</br>';
$a = [];
for ($i = 0; $i < 10; $i++) {
    array_push($a, mt_rand(1, 10));
}

echo '<b>' . json_encode($a) . '</b>';

echo '</br></br>' . '3.Выведите все чётные и все нечётные элементы массива из задания <s>3</s> 2:' . '</br>';
$b = [];
$c = [];
for ($i = 0; $i < 10; $i++) {
    $val = $a[$i];
    ($i % 2) ? array_push($b, $val) : array_push($c, $val);
}
echo 'чётные элементы (от первого!): <b>' . json_encode($b) . '</b></br>';
echo 'нечётные элементы (от первого!): <b>' . json_encode($c) . '</b>';

echo '</br></br> 4. Отсортируйте массив из задания <s>3</s> 2 по ключу в обратном порядке </br>';

$sorteda = array_reverse($a, true);//так не умрут ключи
echo 'работа array_reverse() c сохранением ключей: <b>' . json_encode($sorteda) . '</b>';


$sorteda = array_reverse($a);//так умрут ключи
echo '</br></br> 5.Отсортируйте массив из задания <s>3</s> 2 по значению в обратном порядке </br>';
echo 'работа array_reverse() без сохранения ключей: <b>' . json_encode($sorteda) . '</b>';

echo '</br></br>6. Создайте индексированный массив произвольных имён (до 10 элементов). Поменяйте местами ключи и значения этого массива и выведите на экран: </br>';

$names = ['Alena', 'Andrej', 'Arkadij', 'Abobus', 'Aristofan', 'Anna', 'Angelina', 'Ashot'];

echo 'исходный массив: <b>' . json_encode($names) . '</b></br>';

$flipnames = array_flip($names);

echo 'отфлипанный массив: <b>' . json_encode($flipnames) . '</b></br>';


echo '</br></br>7. Создайте двумерный массив и переберите его циклами foreach, for и while: </br>';

echo '<b>исходный массив: </b></br>';
$dim2array = [
    'first',
    [10, 20, 30],
    ['A', 'B', 'C'],
    [111, 222, 333],
    'last',
];

echo '<pre>';
echo var_dump($dim2array);
echo '</pre>';

echo '<b>перебор через foreach: </b></br>';
foreach ($dim2array as $v) {
    if (is_array($v)) {
        $s = '';
        foreach ($v as $vv) {
            $s = $s . $vv . ' ';
        }
        echo $s . '</br>';
    } else {
        echo ($v) . '</br>';
    }

}

echo '</br><b> перебор через for: </b></br>';


for ($i = 0; $i < count($dim2array); $i++) {
    if (is_array($dim2array[$i])) {
        $s1 = '';
        for ($j = 0; $j < count($dim2array[$i]); $j++) {
            $s1 = $s1 . $dim2array[$i][$j] . ' ';
        }
        echo $s1 . '</br>';
    } else {
        echo $dim2array[$i] . '</br>';
    }

}
echo '</br><b> перебор через while: </b></br>';

reset($dim2array);//сбросил указатель

while (key($dim2array) < count($dim2array)) {
    if (is_array(current($dim2array))) {
        $insedar = current($dim2array);
        $s = '';
        while (key($insedar) < count($insedar)) {
            $s = $s . current($insedar) . ' ';
            next($insedar);
            if (key($insedar) == null) {
                break;
            }
        }
        echo $s . '</br>';
    } else {
        echo current($dim2array) . '</br>';
    }

    next($dim2array);
    if (key($dim2array) == null) {
        break;
    }
}