<?php
    require_once "../lib/db.php";
    require_once("../lib/dna.php");
    date_default_timezone_set("Etc/GMT-8");
    date_default_timezone_set('Asia/Taipei');
    header('Content-type:application/json;charset=utf-8');
    header('Access-Control-Allow-Origin: *');
    if(empty(@$_POST['id'])||empty(@$_POST['data']))
    {
        echo "0";
    }
    else
    {
        /*生成母key*/
        $key = "123";
        $time = date('Y-m-d-H-i-s');
        $mdna = base64_encode(md5($key.$time));
        echo $time;
        /*尋找父dna*/
        $dna = new dna( );
        $dna -> config("root","","mqtt","list");
        $dna -> put_data(['id','dispatch','target','data','time']);
        $data = $dna->sel();
        $fdna = "";
        $fdna = $data[0]['target'];
        /*生成子dna*/
        $sdna = $dna -> son($fdna,$mdna);
        echo $sdna;
        /*生成*/
        $db = new db();
        $id = @$_POST['id'];
        $data = @$_POST['data'];
        $db -> config("root","","mqtt","list");
        $db -> put_data(['',$fdna,$sdna,$data,date('Y-m-d-H-i-s')]);
        $db -> add("(?,?,?,?,?)");
    }

?>