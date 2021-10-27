<?php


echo "1.Рекурсивно выведите на экран ряд Фибоначчи до 10-го элемента:" . '</br>';

function fib($num, $firstNum = 0, $secondNum = 0): int
{
    static $nu;
    $nu++;
    if ($nu > $num) return 0;//для выхода из рекурсии
    $fibNum = $firstNum + $secondNum;
    echo $fibNum . '</br>';
    if ((0 == $firstNum) && (0 == $secondNum)) {
        $secondNum = 1;
    }
    return fib($num, $secondNum, $fibNum);
}

fib(10);// число желаемых элементов ряда


echo '</br></br>' . '2. Создайте в цикле (for либо while) одномерный массив из 10 элементов, где значение на каждой итерации - произвольное число от 1 до 10 (используйте функцию mt_rand):' . '</br>';
$arrayStore = [];
for ($i = 0; $i < 10; $i++) {
    array_push($arrayStore, mt_rand(1, 10));
}

echo '<b>' . json_encode($arrayStore) . '</b>';

echo '</br></br>' . '3.Выведите все чётные и все нечётные элементы массива из задания <s>3</s> 2:' . '</br>';
$evenArrayStorage = [];
$oddArrayStorage = [];
for ($i = 0; $i < 10; $i++) {
    $curArrayValue = $arrayStore[$i];
    ($i % 2) ? array_push($evenArrayStorage, $curArrayValue) : array_push($oddArrayStorage, $curArrayValue);
}
echo 'чётные элементы (от первого!): <b>' . json_encode($evenArrayStorage) . '</b></br>';
echo 'нечётные элементы (от первого!): <b>' . json_encode($oddArrayStorage) . '</b>';

echo '</br></br> 4. Отсортируйте массив из задания <s>3</s> 2 по ключу в обратном порядке </br>';

krsort($arrayStore);//сортировка
echo 'использую krsort (т.к. изначально ключи возрастали): <b>' . json_encode($arrayStore) . '</b>';

echo '</br></br> 5.Отсортируйте массив из задания <s>3</s> 2 по значению в обратном порядке </br>';

ksort($arrayStore);//верну массив в первоначальное состояние
rsort($arrayStore);//cортирую по убыванию значений

echo 'использую rsort(): <b>' . json_encode($arrayStore) . '</b>';

echo '</br></br>6. Создайте индексированный массив произвольных имён (до 10 элементов). Поменяйте местами ключи и значения этого массива и выведите на экран: </br>';

$names = ['Alena', 'Andrej', 'Arkadij', 'Abobus', 'Aristofan', 'Anna', 'Angelina', 'Ashot'];

echo 'исходный массив: <b>' . json_encode($names) . '</b></br>';

$flipNames = array_flip($names);

echo 'отфлипанный массив: <b>' . json_encode($flipNames) . '</b></br>';


echo '</br></br>7. Создайте двумерный массив и переберите его циклами foreach, for и while: </br></br>';

echo '<b>исходный массив: </b>';
$twoDimensionalArray = [
    'first',
    [10, 20, 30],
    ['A', 'B', 'C'],
    [111, 222, 333],
    'last',
];

echo '<pre>';
echo var_dump($twoDimensionalArray);
echo '</pre>';

echo '<b>перебор через foreach: </b></br>';
foreach ($twoDimensionalArray as $v) {
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
for ($i = 0; $i < count($twoDimensionalArray); $i++) {
    if (is_array($twoDimensionalArray[$i])) {
        $stringForOut = '';
        for ($j = 0; $j < count($twoDimensionalArray[$i]); $j++) {
            $stringForOut = $stringForOut . $twoDimensionalArray[$i][$j] . ' ';
        }
        echo $stringForOut . '</br>';
    } else {
        echo $twoDimensionalArray[$i] . '</br>';
    }
}


echo '</br><b> перебор через while: </b></br>';
reset($twoDimensionalArray);//сбросил указатель
while (current($twoDimensionalArray) !== false) {
    if (is_array(current($twoDimensionalArray))) {
        $insideArray = current($twoDimensionalArray);
        $stringForOut = '';
        while (current($insideArray) !== false) {
            $stringForOut = $stringForOut . current($insideArray) . ' ';
            next($insideArray);
        }
        echo $stringForOut . '</br>';
    } else {
        echo current($twoDimensionalArray) . '</br>';
    }
    next($twoDimensionalArray);
}