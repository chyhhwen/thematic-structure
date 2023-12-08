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
        <div class="col fs-1">
            <ul>
                <li>LED</li>
                <li>狀態：</li>
            </ul>
        </div>
        <div class="col fs-1">
            <ul>
                <li>DHT11</li>
                <li>狀態：</li>
                <li>溫度：</li>
                <li>濕度：</li>
            </ul>
        </div>
        <div class="col fs-1">
            <ul>
                <li>FIRME</li>
                <li>狀態：</li>
                <li>熱度：</li>
            </ul>
        </div>
    </div>
</div>
<div class="row align-items-center mt-5">
    <div class="col fs-1">
        <p class="text-center">時間:123</p>
    </div>
</div>
</body>
</html>