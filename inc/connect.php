<?php

//$link = new mysqli('p:185.43.6.138', 'web8_user', 'web8123','web8_group1');


$link = new mysqli('localhost','root','','serviceapp');
     $list = mysqli_query($link,"SELECT * FROM dic_client ");

// Params

$date1 = date("Y-m-d");

if(!isset($_REQUEST['sana1'])) {
    $sana1 = date("Y-m-d");
} else {
    $sana1 = $_REQUEST['sana1'];
}

if(!isset($_REQUEST['sana2'])) {
    $sana2 = date("Y-m-d");
} else {
    $sana2 = $_REQUEST['sana2'];
}

// Functions

function sana($c) {
    return date("d.m.Y",strtotime($c));
}

function summa_0($c) {
    if($c == null || $c == 0) {
        return '-';
    } else {
        return number_format($c,2,',','.');
    }
}

function summa_2($c) {

    if($c == null || $c == 0) {
        return '-';
    } else {
        return number_format($c,2,',','.');
    }
    
}

function foiz($a,$b){
    
    if($b == 0){
        $foiz_text = '<span class="badge badge-danger">План киритилмаган</span>';
    }else{
        $foiz = $a/$b*100;

        if($foiz < 50) {
            $pr_bg = 'bg-danger';
        } else if($foiz < 85) {
            $pr_bg = 'bg-warning';
        } else {
            $pr_bg = 'bg-primary';
        }

        $foiz_text = '<div class="progress" style="height:30px;">
                        <div class="progress-bar '.$pr_bg.'" role="progressbar" style="width: '.$foiz.'%;" aria-valuenow="'.$foiz.'" aria-valuemin="0" aria-valuemax="100">'.number_format($foiz,1,',',' ').'%</div>
                    </div>';
        // $foiz_text = number_format($foiz,2,',','.').'%';
    }
    
    return $foiz_text;
}

function action_buttons($c){
    return '<a href="change.php?id='.$c.'" class="btn btn-warning btn-sm py-0 px-2"><i class="fa fa-pencil" aria-hidden="true"></i></a>
            <a href="delete.php?id='.$c.'" class="btn btn-danger btn-sm py-0 px-2"><i class="fa fa-trash" aria-hidden="true"></i></a>';
}

?>