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
        /* ------------------------------------------------------------------------------------------------------------- */
        .wrapper{
            width: 580px ;
            margin: 2rem auto;
        }
        .nav{
            display: flex;
            justify-content: space-between;
        }
        /* ------------------------------------------------------------------------------------------------------------- */
    </style>
</head>
<body>
    <!-- 設定整個框架的寬度 -->
    <div class="wrapper">

    
    <h1>使用陣列來做月曆</h1>

    <?php
    //isset=若month變數存在(有被宣告),執行$month的值會=$_GET的['month']
    if(isset($_GET['month'])){
        $month=$_GET['month'];
        $year=$_GET['year'];
    }else{
        //否則會是系統的當前月
        $month=date('n');
        $year=date('Y');
    }

    //$_GET['month']拿到值之後,要做一個判斷,根據這個參數拿到的值決定上一個月跟下一個月的年份月份
    //switch($_GET['month']){    $month已有宣告,更改為 switch($month){
    switch($month){

        case 1:
        $prevMonth=12; //1月上一個月是12月 可以寫死
        $prevYear=$year-1; //進入到12月時 年分-1
        $nextMonth=$month+1; 
        $nexYear=$year; 
        break;

        case 12:
        $prevMonth=$month-1; //1月下一個月是12月 可以寫死
        $prevYear=$year; 
        $nextMonth=1; 
        $nexYear=$year+1; //進入到12月時 年分+1
        break;

        default;//default這裡代表2~11月
        $prevMonth=$month-1; //月按鈕-1
        $prevYear=$year; //這裡是2~11月所以年不用改
        $nextMonth=$month+1; //月按鈕+1
        $nexYear=$year; //這裡是2~11月所以年不用改
    }



    echo "要顯示的月份為:".$year."年".$month."月";

    
     ?>
    <!-- 注意:在做參數傳遞時,要考慮 這些參數 與 參數傳遞的值 是否會有相應的變化 -->
    <!-- 上下月的按鈕位置 -->
    <div class="nav">
        <span><!-- 計算結果在上方的switch -->
            <a href="3_index.php?year=<?=$prevYear?>&month=<?=$prevMonth;?>">上一個月</a>
        </span>
        <span>
            <?=$year."年".$month."月";?>
        </span>
        <span>
            <a href="3_index.php?year=<?=$nexYear?>&month=<?=$nextMonth;?>">下一個月</a>
        </span>
    </div>
<?php





//年份已有上面的year=< ?=$year ? >變數 來完成計算,這裡的$firstDay可以直接沿用$year
$firstDay=$year."-".$month."-1";
/*取出0~6的數字對應出當月一號=星期幾*/ 
$firstWeekday=date("w",strtotime($firstDay));// w=week 0~6=陣列呼應0~6=日到一
/*t=當月的總天數   計算同上*/ 
$monthDays=date("t",strtotime($firstDay));
/*最後一天 的函式*/
$lastDay=$year."-".$month."-".$monthDays;
//判斷今天是否存在
$today=date("Y-m-d");
//最後一天是在星期幾 換算成秒數判斷
//需要知道W的值是多少  用STRTOTIME去得到W的值
$lastWeekday=date("w",strtotime($lastDay));
// 設空陣列 計算出的月曆數字存到陣列裡面
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


</div><!--  <div class="wrapper"> 的句尾  -->
</body>
</html>