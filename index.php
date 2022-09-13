<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>線上月曆</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        *{
            font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            margin: 0;
        }
        body{
            /* background-image: url(./img/2.webp); */
            background-image: url(./img/Bar2.webp);
            background-size: 100%;
            /* background-repeat:no-repeat; */
            background-position: center;
        }
        .wrapper{
            /* border: 1px solid blueviolet; */
            width: 2000px ;
            height: 1000px;
            /* height: 100%; */
            margin: auto;
            justify-content: center;
            display: flex;
            
        }
        .outer_table{
            /* border: 1px solid lightgreen;      */
            /* border: 1px solid pink; */
            width: 90%;
            height: 100%;
            justify-content: start;
            display: flex;
        }
        .rightYear,.leftYear{
            /* border: 1px solid wheat; */
            height: 100%;
            backdrop-filter:blur(2px);
            display: flex;
            align-items: center;
            background-color: rgb(28,28,28,0.3);
        }
        .rightYear:hover,.leftYear:hover{
            background-color: rgb(28,28,28,0.5);
        }
        .rightMonth,.leftMonth{
            /* border: 1px solid wheat; */
            height: 100%;
            backdrop-filter:blur(3px);
            display: flex;
            align-items: center;
            background-color: rgb(28,28,28,0.5);
        }
        .rightMonth:hover,.leftMonth:hover{
            background-color: rgb(28,28,28,0.7); 
        }
        .rightMonth a,.leftMonth a,.rightYear a,.leftYear a{
            text-decoration: none;
            color: white;
            align-content: center;
            justify-content: center;
        }
        .rightMonth a:hover,.leftMonth a:hover,.rightYear a:hover,.leftYear a:hover{
            color: gray;

        }
        .starting_point{
            /* border: 1px solid orangered; */
            margin-top:10px ;
            width: 100%;
            line-height: 200%;
            color: white;
            text-decoration: none;
            font-size: 30px;
        }
        .starting_point:hover{
            color: gray;
        }
        .now_datee{
            /* border: 1px solid orangered; */
            width: 100%;
            line-height: 200%;
        }
        .new_datee{
            /* border: 1px solid orangered; */
            width: 100%;
            line-height: 200%;
        }
        .right_img{
            /* border: 1px solid orangered; */
            width: 35%;
            height: 100%;
        }
        .week_table{
            /* border:1px solid red; */
            backdrop-filter:blur(5px);

            margin: auto;
            align-content:center;
            justify-content: center;
            align-content: start;
            align-items: center;
            
            width:840px;
            height:1000px;
            display:flex;
            flex-wrap:wrap;

            color: white;
            font-size: 25px;
            line-height: 120px;
            text-align: center;
        }
        .today{
            background-color: rgb(242,132,61,0.3);
            
        }
        .week_table footer{
            width:120px;
            height:120px;
            border:1px solid #999;
            box-sizing: border-box;
            margin-left:-1px;
            margin-top:-1px;  
            text-shadow: 3px 3px black;
        }
        .week_table footer:hover,.week_table footer:focus{
            box-shadow: 0 0.5em 0.5em -0.4em rgb(143,217,199);
            transform: translateY(-15px);
            transition: 0.5s;
            border-color: rgb(143,217,199);
            /* color: red; */
        }
        .header{
            /* border:1px solid #999; */
            width:120px;
            height:120px;
            box-sizing: border-box;
            margin-left:-1px;
            margin-top:-1px;
        }
        .header_holiday{
            /* border:1px solid #999; */
            width: 120px;
            height: 45px;
            background-color: rgb(137,103,235,0.7);
            color: white;
            line-height: 45px;
        }
        .weekend{
        background-color: rgb(137,103,235,0.2);
        }
        .month_coffee{
            border: 1px solid white;
            text-align: center;
        }
        .st{
            color: white;
            width: 300px;
            font-size: 20PX;
        }
        .st a{
            color: white;
        }
        .add_cut{
            text-decoration: none;
        }
        .add_cut:hover{
            color: #999;
        }
        .coffee{
            color: white;
            /* border: 1px solid white; */
            font-size: 17.5px;
            text-align: center;
            /* border: 1px solid orangered; */
            height: 85%;
            width: 100%;
            backdrop-filter:blur(7px);
        }
        
        
        
    </style>
</head>
<body>
    <!-- 設定整個框架的寬度 -->
    <div class="wrapper">

    
    <!-- <h1>使用陣列來做月曆</h1> -->

    <?php
    //isset=若值已設置 且非NULL
    //若month變數存在(有被宣告),執行$month的值會=$_GET的['month']

    //這裡else是預設 , if是當我輸入值時 這個值會填入$month
    if(isset($_GET['month'])){
        $month=$_GET['month'];
        $year=$_GET['year'];
    }else{
        //否則會是系統的當前月
        $month=date('n');
        $year=date('Y');
    }

    //$_GET['month']拿到值之後,要做一個判斷,根據這個參數拿到的值決定上一個月跟下一個月的年份月份
    //但當未帶參數時 switch($_GET['month']) 抓不到資料    
    //上面已有else宣告$month為date('n'), 所以可以更改為switch($month), 這裡只需判斷當月下份為哪一月 再去執行判斷
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
     ?>


<?php
//年份已有上面的year=< ?=$year ? >變數 來完成計算,這裡的$firstDay可以直接沿用$year
$firstDay=$year."-".$month."-1";//感知到$year+$month為2022-5-1 = 變數firstDay
/*取出0~6的數字對應出當月一號=星期幾*/ // w=week 0~6=陣列呼應0~6=日到一
$firstWeekday=date("w",strtotime($firstDay));//$firstDay(2022-5-1用strtotime換算成秒數) 用此秒數得知該秒數的w為陣列0也就是周日(w=0~6,日到六) = 變數firstWeekday
/*t=當月的總天數   計算同上*/ 
$monthDays=date("t",strtotime($firstDay));//$firstDay(2022-5-1用strtotime換算成秒數) 用此秒數得知該秒數的t為31也就是31天 = $monthDays
/*最後一天 的函式*/
$lastDay=$year."-".$month."-".$monthDays; //2022-5-31是五月的最後一天 = $lastDay
//判斷今天是否存在
$today=date("Y-m-d");//感知目前日期為2022-5-21 = $today
//最後一天是在星期幾 換算成秒數判斷
//需要知道W的值是多少  用STRTOTIME去得到W的值
$lastWeekday=date("w",strtotime($lastDay));//用$lastDay得知2022-5-31是5月最後一天 換算成秒數 用此秒數得知該秒數的w為陣列2(周二) = $lastWeekday
// 設空陣列 計算出的月曆數字存到陣列裡面
$dateHouse=[];//計算要印數字還空白 用於以下for迴圈



//印月份的空白處 //五月一號為周日(陣列0),所以i不小於0 就不執行該迴圈的印空白
for($i=0;$i<$firstWeekday;$i++){
    $dateHouse[]="";//空值=第0個開始的位置都是空白的
}

//0小於31 列印5/1在第一個位置(陣列0=日)
//當月日期一天一天用秒數得出結果  再放入陣列
for($i=0;$i<$monthDays;$i++){//下面公式:date"Y-m-d"確認了目前是2022-5-1,將其換算成秒數,($firstDay的2022-5-1秒數 加上 +0days的秒數)假設是1000秒//很難翻譯....還不確定是否正確
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
<!-- 當下時間 與 賦值給+-10年 與 +-1年 -->
<?php

$now_yearr=date('Y');
$now_monthh=date('n');
$now_dayy=date('d');

if(empty($_GET['year'])||($_GET['month'])){
    $_GET['year']=$year;
    $_GET['month']=$month;
}

?>

<!-- 月曆主體 outer_table -->
<div class="outer_table">
    <div class="leftYear">
        <a href="index.php?year=<?=($_GET['year']-1)?>&month=<?=$_GET['month'];?>"><i class="fa-solid fa-angles-left"></i>上一年</a>
    </div>
    <div class="leftMonth">
        <a href="index.php?year=<?=$prevYear?>&month=<?=$prevMonth;?>">&nbsp;&nbsp;<i class="fa-solid fa-angle-left"></i> 上一月</a>
    </div>
    <!-- 月曆 周與日 week_table -->
    <div class="week_table">
        <a class="starting_point" href="index.php"><i class="fa-solid fa-clock-rotate-left"></i> 回到現在</a>
        <div class='now_datee'>現在的時間為 : <?=$now_yearr?> 年 <?=$now_monthh?> 月 <?=$now_dayy?>日</div>
        <div class='new_datee'>月曆設置的時間為 : <?=$year?> 年 <?=$month?> 月 </div>
        <div class='header_holiday'> 星期日</div>
        <div class='header'> 星期一</div>
        <div class='header'> 星期二</div>
        <div class='header'> 星期三</div>
        <div class='header'> 星期四</div>
        <div class='header'> 星期五</div>
        <div class='header_holiday'> 星期六</div>

<?php
foreach($dateHouse as $k => $day){
    $hol=($k%7==0 || $k%7==6)?'weekend':"";
    if(!empty($day)){
        $dayFormat=date("j",strtotime($day));
        if($day == $today){
            echo "<footer class='today' '{$hol}'>{$dayFormat}</footer>";
        }else{
            echo "<footer class='{$hol}'>{$dayFormat}</footer>";
        }
    }else{
        echo "<footer class='{$hol}'></footer>";
    }
}
?>

</div><!-- 月曆 周與日 week_table 的句尾 -->
<div class="rightMonth">
    <a href="index.php?year=<?=$nexYear?>&month=<?=$nextMonth;?>">下一月 <i class="fa-solid fa-angle-right"></i>&nbsp;&nbsp;</a>
</div>
<div class="rightYear">
    <a href="index.php?year=<?=($_GET['year']+1);?>&month=<?=$_GET['month'];?>">下一年<i class="fa-solid fa-angles-right"></i></a>
</div>
<div class="right_img"></div>
</div><!-- 月曆主體 outer_table 的句尾 -->


<!-- --------------------------------------------------------------------month_coffee 右側調整時間-------------------------------------------------------------------- -->
<div class="month_coffee">

<div class="st">
<form action="index.php">
<br><br>
更改時間至<br>
<!-- 減10年 -->
<a class="add_cut" href="index.php?year=<?=($_GET['year']-10);?>&month=<?=$_GET['month'];?>">- 10</a>

<!-- 年份表單區域 -->
<select name="year">
    <option value="<?=$year?>"><?=$year?></option>
    <option value="<?=$year+1?>"><?=$year+1?></option>
    <option value="<?=$year+2?>"><?=$year+2?></option>
    <option value="<?=$year+3?>"><?=$year+3?></option>
    <option value="<?=$year+4?>"><?=$year+4?></option>
    <option value="<?=$year+5?>"><?=$year+5?></option>
    <option value="<?=$year+6?>"><?=$year+6?></option>
    <option value="<?=$year+7?>"><?=$year+7?></option>
    <option value="<?=$year+8?>"><?=$year+8?></option>
    <option value="<?=$year+9?>"><?=$year+9?></option>
    <option value="<?=$year+10?>"><?=$year+10?></option>
</select>

<!-- 加10年 -->
<a class="add_cut" href="index.php?year=<?=($_GET['year']+10);?>&month=<?=$_GET['month'];?>">+ 10</a>


<!-- 月份表單區域 -->
<select name="month">
    <option value="1"> &nbsp; 1月</option>
    <option value="2"> &nbsp; 2月</option>
    <option value="3"> &nbsp; 3月</option>
    <option value="4"> &nbsp; 4月</option>
    <option value="5"> &nbsp; 5月</option>
    <option value="6"> &nbsp; 6月</option>
    <option value="7"> &nbsp; 7月</option>
    <option value="8"> &nbsp; 8月</option>
    <option value="9"> &nbsp; 9月</option>
    <option value="10"> 10月</option>
    <option value="11"> 11月</option>
    <option value="12"> 12月</option>
</select>
    <button type="hidden">查詢</button>
</form>
<br>
咖啡生豆產出期
</div>
<!-- -------------------------------------------------------------------------------咖啡豆月份內容------------------------------------------------------------------------------- -->

<div class="coffee">
<br>
<?php
$coffee_1=
"中美洲<br>
哥斯大黎加 10~3月收穫, 5~6月抵達<br>
薩爾瓦多 10~3月收穫, 7月抵達<br>
瓜地馬拉 11~4月收穫, 4月抵達<br>
宏都拉斯 11~4月收穫, 5月抵達<br>
尼加拉瓜 12~3月收穫, 5月抵達<br>
巴拿馬 12~3月收穫, 4月抵達<br>
<br>
北美<br>
墨西哥 11~3月收穫, 4月抵達<br>
<br>
亞洲<br>
印度  11~3月收穫, 5月抵達<br>
越南 10~4月收穫, 4月抵達<br>
<br>
非洲<br>
埃塞俄比亞 10~12月收穫, 2月抵達<br>
盧旺達 2~7月收穫, 1月抵達<br>
烏干達 10~2月收穫,  3~4月抵達<br>
<br>";

$coffee_2=
"中美洲<br>
哥斯大黎加 10~3月收穫, 5~6月抵達<br>
薩爾瓦多 10~3月收穫, 7月抵達<br>
瓜地馬拉 11~4月收穫, 4月抵達<br>
宏都拉斯 11~4月收穫, 5月抵達<br>
尼加拉瓜 12~3月收穫, 5月抵達<br>
巴拿馬 12~3月收穫, 4月抵達<br>
<br>
北美<br>
多米尼加共和國 9~5月收穫, 12月抵達<br>
墨西哥 11~3月收穫, 4月抵達<br>
<br>
亞洲<br>
東帝汶  5~10月收穫, 11月抵達<br>
印度  11~3月收穫, 5月抵達<br>
印尼  ??月收穫, 月抵達<br>
蘇門答臘 ??月收穫, 月抵達<br>
越南 10~4月收穫, 4月抵達<br>
<br>
非洲<br>
埃塞俄比亞 10~12月收穫, 2月抵達<br>
盧旺達 2~7月收穫, 1月抵達<br>
坦桑尼亞 7~12月收穫, 2月抵達<br>
烏干達 10~2月收穫,  3~4月抵達<br>
<br>";

$coffee_3=
"中美洲<br>
哥斯大黎加 10~3月收穫, 5~6月抵達<br>
薩爾瓦多 10~3月收穫, 7月抵達<br>
瓜地馬拉 11~4月收穫, 4月抵達<br>
宏都拉斯 11~4月收穫, 5月抵達<br>
尼加拉瓜 12~3月收穫, 5月抵達<br>
巴拿馬 12~3月收穫, 4月抵達<br>
<br>
北美<br>
多米尼加共和國 9~5月收穫, 12月抵達<br>
墨西哥 11~3月收穫, 4月抵達<br>
<br>
亞洲<br>
印度  11~3月收穫, 5月抵達<br>
越南 10~4月收穫, 4月抵達<br>
<br>
非洲<br>
肯尼亞 3~7月收穫, 5月抵達<br>
盧旺達 2~7月收穫, 1月抵達<br>
烏干達 10~2月收穫,  3~4月抵達<br>
<br>";
$coffee_4=
"中美洲<br>
瓜地馬拉 11~4月收穫, 4月抵達<br>
宏都拉斯 11~4月收穫, 5月抵達<br>
巴拿馬 12~3月收穫, 4月抵達<br>
<br>
北美<br>
多米尼加共和國 9~5月收穫, 12月抵達<br>
墨西哥 11~3月收穫, 4月抵達<br>
<br>
亞洲<br>
越南 10~4月收穫, 4月抵達<br>
<br>
大洋洲<br>
巴布亞新幾內亞 4~9月收穫, 11月抵達<br>
<br>
非洲<br>
剛果民主共和國 4~7月收穫, 7月抵達<br>
肯尼亞 3~7月收穫, 5月抵達<br>
盧旺達 2~7月收穫, 1月抵達<br>
烏干達 10~2月收穫,  3~4月抵達<br>
<br>";
$coffee_5=
"中美洲<br>
哥斯大黎加 10~3月收穫, 5~6月抵達<br>
宏都拉斯 11~4月收穫, 5月抵達<br>
尼加拉瓜 12~3月收穫, 5月抵達<br>
<br>
北美<br>
多米尼加共和國 9~5月收穫, 12月抵達<br>
<br>
亞洲<br>
東帝汶  5~10月收穫, 11月抵達<br>
印度  11~3月收穫, 5月抵達<br>
<br>
大洋洲<br>
巴布亞新幾內亞 4~9月收穫, 11月抵達<br>
<br>
非洲<br>
剛果民主共和國 4~7月收穫, 7月抵達<br>
肯尼亞 3~7月收穫, 5月抵達<br>
盧旺達 2~7月收穫, 1月抵達<br>
<br>";
$coffee_6=
"中美洲<br>
哥斯大黎加 10~3月收穫, 5~6月抵達<br>
<br>
亞洲<br>
東帝汶  5~10月收穫, 11月抵達<br>
<br>
大洋洲<br>
巴布亞新幾內亞 4~9月收穫, 11月抵達<br>
<br>
非洲<br>
剛果民主共和國 4~7月收穫, 7月抵達<br>
肯尼亞 3~7月收穫, 5月抵達<br>
盧旺達 2~7月收穫, 1月抵達<br>
<br>";
$coffee_7=
"中美洲<br>
薩爾瓦多 10~3月收穫, 7月抵達<br>
<br>
亞洲<br>
東帝汶  5~10月收穫, 11月抵達<br>
<br>
大洋洲<br>
巴布亞新幾內亞 4~9月收穫, 11月抵達<br>
<br>
非洲<br>
剛果民主共和國 4~7月收穫, 7月抵達<br>
肯尼亞 3~7月收穫, 5月抵達<br>
盧旺達 2~7月收穫, 1月抵達<br>
坦桑尼亞 7~12月收穫, 2月抵達<br>
<br>";
$coffee_8=
"亞洲<br>
東帝汶  5~10月收穫, 11月抵達<br>
<br>
大洋洲<br>
巴布亞新幾內亞 4~9月收穫, 11月抵達<br>
<br>
非洲<br>
坦桑尼亞 7~12月收穫, 2月抵達<br>
<br>";
$coffee_9=
"北美<br>
多米尼加共和國 9~5月收穫, 12月抵達<br>
<br>
亞洲<br>
東帝汶  5~10月收穫, 11月抵達<br>
<br>
大洋洲<br>
巴布亞新幾內亞 4~9月收穫, 11月抵達<br>
<br>
非洲<br>
埃塞俄比亞 10~12月收穫, 2月抵達<br>
坦桑尼亞 7~12月收穫, 2月抵達<br>
<br>";
$coffee_10=
"中美洲<br>
哥斯大黎加 10~3月收穫, 5~6月抵達<br>
薩爾瓦多 10~3月收穫, 7月抵達<br>
<br>
北美<br>
多米尼加共和國 9~5月收穫, 12月抵達<br>
<br>
亞洲<br>
東帝汶  5~10月收穫, 11月抵達<br>
越南 10~4月收穫, 4月抵達<br>
<br>
非洲<br>
埃塞俄比亞 10~12月收穫, 2月抵達<br>
坦桑尼亞 7~12月收穫, 2月抵達<br>
烏干達 10~2月收穫,  3~4月抵達<br>
<br>";
$coffee_11=
"中美洲<br>
哥斯大黎加 10~3月收穫, 5~6月抵達<br>
薩爾瓦多 10~3月收穫, 7月抵達<br>
瓜地馬拉 11~4月收穫, 4月抵達<br>
宏都拉斯 11~4月收穫, 5月抵達<br>
<br>
北美<br>
墨西哥 11~3月收穫, 4月抵達<br>
<br>
亞洲<br>
東帝汶  5~10月收穫, 11月抵達<br>
印度  11~3月收穫, 5月抵達<br>
<br>
大洋洲<br>
巴布亞新幾內亞 4~9月收穫, 11月抵達<br>
<br>
非洲<br>
埃塞俄比亞 10~12月收穫, 2月抵達<br>
坦桑尼亞 7~12月收穫, 2月抵達<br>
烏干達 10~2月收穫,  3~4月抵達<br>
<br>";
$coffee_12=
"中美洲<br>
哥斯大黎加 10~3月收穫, 5~6月抵達<br>
薩爾瓦多 10~3月收穫, 7月抵達<br>
瓜地馬拉 11~4月收穫, 4月抵達<br>
宏都拉斯 11~4月收穫, 5月抵達<br>
尼加拉瓜 12~3月收穫, 5月抵達<br>
巴拿馬 12~3月收穫, 4月抵達<br>
<br>
北美<br>
多米尼加共和國 9~5月收穫, 12月抵達<br>
墨西哥 11~3月收穫, 4月抵達<br>
<br>
亞洲<br>
印度  11~3月收穫, 5月抵達<br>
越南 10~4月收穫, 4月抵達<br>
<br>
非洲<br>
埃塞俄比亞 10~12月收穫, 2月抵達<br>
坦桑尼亞 7~12月收穫, 2月抵達<br>
烏干達 10~2月收穫,  3~4月抵達<br>
<br>";
switch($month){
    case 1:
        echo $coffee_1;
    break;

    case 2:
        echo $coffee_2;
    break;

    case 3:
        echo $coffee_3;
    break;

    case 4:
        echo $coffee_4;
    break;

    case 5:
        echo $coffee_5;
    break;

    case 6:
        echo $coffee_6;
    break;

    case 7:
        echo $coffee_7;
    break;

    case 8:
        echo $coffee_8;
    break;

    case 9:
        echo $coffee_9;
    break;

    case 10:
        echo $coffee_10;
    break;

    case 11:
        echo $coffee_11;
    break;

    case 12:
        echo $coffee_12;
    break;
}
?>

</div>
</div><!--  wrapper 的句尾  -->




</body>
</html>