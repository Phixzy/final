<?php

include "weatherPlugin.php";

$city_name = 'London'; 
if (isset($_POST['city'])) {
    $city_name = htmlspecialchars($_POST['city']); 
}

$api_key = 'e34e15929b56bbef5ecdfa625781da6c';
$api_url = 'https://api.openweathermap.org/data/2.5/weather?q='. $city_name .'&appid='. $api_key;

$weather_data = json_decode(file_get_contents($api_url), true);

if ($weather_data['cod'] !== 200) {
    $error_message = $weather_data['message']; 
    $temperature = null;
    $condition = "Weather data not available";
    $humidity = null;
    $wind_speed = null;
} else {
    $temperature = $weather_data['main']['temp'] - 273.15; 
    $condition = $weather_data['weather'][0]['description']; 
    $humidity = $weather_data['main']['humidity'];
    $wind_speed = $weather_data['wind']['speed']; 
    $timezone = $weather_data['timezone']; 

    if ($timezone) {
        $dateTime = new DateTime("now", new DateTimeZone("UTC"));
        $dateTime->modify("+{$timezone} seconds");
        $formattedTime = $dateTime->format('Y-m-d H:i:s'); 
    } else {
        $formattedTime = 'N/A';
    }

    $background_image = 'bg_image/sun.webp'; 
    if (strpos($condition, 'cloud') !== false) {
        $background_image = 'cloudy.webp'; 
    } elseif (strpos($condition, 'rain') !== false) {
        $background_image = 'rainy.webp'; 
    } elseif (strpos($condition, 'snow') !== false) {
        $background_image = 'snow.webp'; 
    }


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
<div class="weather-app" style="background-image: url('<?php echo $background_image; ?>');">
    <div class="container">
        <h3 class="brand">
            The Weather
        </h3>

        <h1 class="temp">
            <?php echo $temperature !== null ? round($temperature) : 'N/A'; ?> &#176;C
        </h1>

        <div class="city-time">
            <h1 class="name">
                <?php echo $city_name; ?>
            </h1>
        </div>

        <div class="weather">
            <?php
            $icon = 'sun.png'; 
            if (strpos($condition, 'cloud') !== false) {
                $icon = 'cloud.png'; 
            } elseif (strpos($condition, 'rain') !== false) {
                $icon = 'rain.png'; 
            } elseif (strpos($condition, 'snow') !== false) {
                $icon = 'snow.png';
            }
            ?>
            <img src="<?php echo $icon; ?>" class="icon" alt="icon" width="50" height="50"/>
            <span class="condition"><?php echo ucfirst($condition); ?></span>
        </div>
    </div>
</div>

<div class="panel">
    <form action="" method="POST" id="locationInput">
        <input type="text" name="city" class="search" placeholder="Search Location..." required>
        <button type="submit" class="submit">
        <i class="fas fa-search"></i>
        </button>
    </form>

    <ul class="details">
        <h4>Weather Details</h4>
        <li>
            <span>Condition</span>
            <span class="cloud"><?php echo ucfirst($condition); ?></span>
        </li>

        <li>
            <span>Humidity</span>
            <span class="humidity"><?php echo $humidity !== null ? $humidity . '%' : 'N/A'; ?></span>
        </li>

        <li>
            <span>Wind Speed</span>
            <span class="wind"><?php echo $wind_speed !== null ? $wind_speed . ' km/h' : 'N/A'; ?></span>
        </li>

        <li>
            <span>Date</span>
            <span class="date"><?php echo $dateTime->format('Y-m-d'); ?></span>
        </li>

        <li>
            <span>Time</span>
            <span class="time"><?php echo $dateTime->format('H:i:s'); ?></span>
        </li>
    </ul>

    <ul>
        <button class="back-button" onclick="window.location.href='admin.php';">Back</button>
    </ul>

</div>

</body>
</html>

