<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>線上月曆</title>
    <style>
        .table{
            width:560px;
            height:560px;
            /* border:1px solid green; */
            display:flex;
            flex-wrap:wrap;
            align-content: baseline;
            margin-left:1px;
            margin-top:1px;
        }

        .table div{
            display:inline-block;
            width:80px;
            height:80px;
            border:1px solid #999;
            box-sizing: border-box;
            margin-left:-1px;
            margin-top:-1px;
        }
        .table div.header{
            background:black;
            color:white;
            height: 32px;;
        }
        .weekend{
            background:pink;
        }
        .workday{
            background:white;
        }
        .today{
            background:lightseagreen;
        }
    </style>
</head>
<body>
    <h1>使用陣列來做月曆</h1>
<?php
$month=date("m"); /*照系統時間調整*/ 



$firstDay=date("Y-").$month."-1";
/*取出0~6的數字對應出當月一號=星期幾*/ 
$firstWeekday=date("w",strtotime($firstDay));// w=week 0~6=陣列呼應0~6=日到一
/*t=當月的總天數   計算同上*/ 
$monthDays=date("t",strtotime($firstDay));
/*最後一天 的函式*/
$lastDay=date("Y-").$month."-".$monthDays;

$today=date("Y-m-d");
// 最後一天是在星期幾 換算成秒數判斷
//需要知道W的值是多少  用STRTOTIME去得到W的值
$lastWeekday=date("w",strtotime($lastDay));
// 先設空陣列 計算出的月曆數字存到陣列裡面
$dateHouse=[];




for($i=0;$i<$firstWeekday;$i++){
    $dateHouse[]="";//空值=地0個開始的位置都是空白的
}
//當月日期一天一天用秒數得出結果  再放入陣列
for($i=0;$i<$monthDays;$i++){
    $date=date("Y-m-d",strtotime("+$i days",strtotime($firstDay)));//函數由最裡面往外算(右到左)
    $dateHouse[]=$date;
}
//  日 一 二 三 四 五 六
//  0  1  2  3  4  5  6
//這裡的6代表W  此時5月的LASTWEEKDAY為2(31號)
//DATE函示W屬性的值($LASTWEEKDAY)
//這裡6為一周 減去 W(012)的一周=4 印出4個空值
for($i=0;$i<(6-$lastWeekday);$i++){
    $dateHouse[]="";
}

?>

<div class="table">
<div class='header'>日</div>
<div class='header'>一</div>
<div class='header'>二</div>
<div class='header'>三</div>
<div class='header'>四</div>
<div class='header'>五</div>
<div class='header'>六</div>
<?php

// as 取哪個陣列的哪個值
// 變數$k 用as取出   陣列$dateHose
// k=索引
// datehouse=表單   k是這個欄的抬頭的某一欄   day是欄位的值
foreach($dateHouse as $k => $day){
    // ($k%7==0 || $k%7==6)由?判斷 ture=左:     false=:右
    //這裡的'weekend':"" 用於CSS的CLASS應用顯示顏色
    $hol=($k%7==0 || $k%7==6)?'weekend':"";
    //上面的weekend計算結果  由下面的class=$hol  執行CSS

    
    // 否  空  變數=這個變數如果不是空值
    if(!empty($day)){
        $dayFormat=date("j",strtotime($day));
        echo "<div class='{$hol}'>{$dayFormat}</div>";
    }else{
        echo "<div class='{$hol}'></div>";

    }
}

?>
</div>



</body>
</html>