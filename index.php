<?php
    require_once "./lib/wp.php";
    $wp = new clist();
    $wp -> config("root","","mqtt","block");
    $wp -> put_data(["id","ip","time"]);
    if($wp -> check($wp -> client_ip()))
    {
        http_response_code(404);
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IoT Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/index.css">
</head>
<body data-bs-theme="light" class="d-flex flex-column h-100" >
<nav class="navbar navbar-expand-lg navbar-light" >
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#linkbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="linkbar" style="margin-left:10px;">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">IoT Test</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container p-5">
<div class="row align-items-center mt-5">
<?php
    require_once "./lib/db.php";
    $db = new db();
    $db -> config("root","","mqtt","list");
    $db -> put_data(['id','dispatch','target','data','time']);
    $temp = $db -> sel();
    $data = json_decode($temp[0]['data'],true);
    for($i = 0;$i < 3;$i++)
    {
        echo'<div class="col fs-1"><ul>';
        switch ($i)
        {
            case 0:
                echo '<li>LED</li>';
                echo '<li>狀態：'. $data['data'][$i]['state'] .'</li>';
                break;
            case 1:
                echo '<li>DHT11</li>';
                echo '<li>狀態：'. $data['data'][$i]['state'] .'</li>';
                echo '<li>溫度：'. $data['data'][$i]['temp'] .'</li>';
                echo '<li>濕度：'. $data['data'][$i]['humi'] .'</li>';
                break;
            case 2:
                echo '<li>FIRME</li>';
                echo '<li>狀態：'. $data['data'][$i]['state'] .'</li>';
                echo '<li>熱度：'. $data['data'][$i]['heat'] .'</li>';
                break;
        }
        echo'</ul></div>';
    }
?>
</div>
</div>
<div class="row align-items-center mt-5">
    <div class="col fs-1">
        <?php
            date_default_timezone_set("Etc/GMT-8");
            date_default_timezone_set('Asia/Taipei');
            echo'<p class="text-center">時間:'. date('Y-m-d-H-i-s') .'</p>';
        ?>
    </div>
</div>
</body>
</html>