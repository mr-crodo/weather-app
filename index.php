<?php
//ab783cb9c269477e8721f48489b78f6f
    error_reporting(E_ERROR | E_PARSE);
    // d843923dd439773dbb46261df676b7de
    $key = 'd843923dd439773dbb46261df676b7de';
    $iconKey = 'ab783cb9c269477e8721f48489b78f6f';
    $weather = "";
    $error = "";
        if(isset($_GET['city'])) {
            $urlContent = file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".$_GET['city']."&units=metric&appid=".$key);
            $forcastArray = json_decode($urlContent, true);

//            print_r($forcastArray);

            if($forcastArray['cod'] == 200) {
                $weather = $forcastArray['weather'][0][description].'.';
                $weatherTemp= $forcastArray['main']['temp'].' &#8451';
                $windScore = $forcastArray['wind']['speed'].' m/s';
            } else {
                    $error = 'The city name is incorrect, please try another name';
                }
           
        }
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="stylesheet" href="/style/style.css">
        <title>Weather App</title>
    </head>
    <body id="head">
    <div class="container">
        <div class="row">
            <div class="col-12 main">
                    <h1>Weather In The City</h1>
                    <form>
                        <div class="form-row col-12">
                            <div class="form-group col">
                                <label for="city">Input a city name</label>
                                <input type="city" class="form-control" id="city" name="city" aria-describedby="Forcast city" placeholder="Enter you city">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-lg btn-primary mb-3">submit</button>
                    </form>
                <div>
                    <?php
                        if($weather) {
                            echo '<div class="alert alert-primary" role="alert">'.'The weather in '.'<span class="city__name">'.$_GET['city'].'</span>'.' is '.'<p class="weather__description m-0">'.$weather.'</p>'.'</div>';
                            echo '<div class="alert alert-dark" role="alert">'.'The temperature is '.'<p class="weather__temp m-0">'.$weatherTemp.'</p>'.'</div>';
                            echo '<div class="alert alert-success" role="alert">'.'The speed of wind is '.'<p class="wind__score m-0">'.$windScore.'</p>'.'<div>';
                        } else if ($error) {
                            echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="/js/jquery.vide.min.js"></script>
        <script src="/js/main.js"></script>
    </body>
</html>


