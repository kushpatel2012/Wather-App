<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="index.php">
        <label for="city-select">Select City:</label>
        <select id="city-select" name="city" onchange="this.form.submit()">
            <option value="">Select City</option>
            <option value="Ahmedabad,IN">Ahmedabad</option>
            <option value="Surat,IN">Surat</option>
            <option value="Vadodara,IN">Vadodara</option>
            <option value="Rajkot,IN">Rajkot</option>
            <option value="Gandhinagar,IN">Gandhinagar</option>
            <option value="Junagadh,IN">Junagadh</option>
            <option value="Bhuj,IN">Bhuj</option>
            <option value="Navsari,IN">Navsari</option>
            <option value="Patan,IN">Patan</option>
            <option value="Mahesana,IN">Mahesana</option>
            <option value="Amreli,IN">Amreli</option>
            <option value="Porbandar,IN">Porbandar</option>
            <option value="Daman,IN">Daman</option>
            <option value="Vapi,IN">Vapi</option>
            <option value="Anand,IN">Anand</option>
            <option value="Bharuch,IN">Bharuch</option>
            <option value="Valsad,IN">Valsad</option>
            <option value="Palanpur,IN">Palanpur</option>
            <option value="Surendranagar,IN">Surendranagar</option>
            <option value="Bhavnagar,IN">Bhavnagar</option>
            <option value="Godhra,IN">Godhra</option>
            <option value="Wadhwan,IN">Wadhwan</option>
            <option value="Mahuva,IN">Mahuva</option>
            <option value="Dahod,IN">Dahod</option>
            <option value="Tapi,IN">Tapi</option>
            <option value="Gandhidham,IN">Gandhidham</option>
            <option value="Limbdi,IN">Limbdi</option>
            <option value="Mangalwad,IN">Mangalwad</option>
            <option value="Mumbai,IN">Mumbai</option>
            <option value="Delhi,IN">Delhi</option>
            <option value="Bangalore,IN">Bangalore</option>
            <option value="Chennai,IN">Chennai</option>
            <option value="Kolkata,IN">Kolkata</option>
            <option value="Pune,IN">Pune</option>
            <option value="Jaipur,IN">Jaipur</option>
            <option value="Hyderabad,IN">Hyderabad</option>
            <option value="Lucknow,IN">Lucknow</option>
            <option value="Kanpur,IN">Kanpur</option>
            <option value="Nagpur,IN">Nagpur</option>
            <option value="Indore,IN">Indore</option>
            <option value="Bhopal,IN">Bhopal</option>
        </select>
    </form>
</body>
</html>
<?php
use App\Weather\WeatherFetcher;

require __DIR__ . '/inc/all.inc.php';

$city = 'Ahmedabad,IN'; // Default value

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['city'])) {
    $city = $_POST['city'];
}

$fetcher = new WeatherFetcher();
$info = $fetcher->fetch($city);

// var_dump($info);


$images=[
    'stormy' => 'images/stormy/bg.svg',
    'sunny'=>'images/sunny/bg.svg',
    'cloudy'=>'images/cloudy/bg.svg',
    'snowy'=>'images/snowy/bg.svg',
];
$icon=[
    'stormy'=>'images/stormy/large.svg',
    'sunny'=>'images/sunny/large.svg',
    'cloudy'=>'images/cloudy/large.svg',
    'snowy'=>'images/snowy/large.svg',
];

$icon_path=$icon[$info->weatherType];
$bg_path=$images[$info->weatherType];



require __DIR__ . '/views/index.view.php';
