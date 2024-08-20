<?php

namespace App\Weather;

class WeatherFetcher {

    public function fetch(string $city): WeatherInfo {
        $apiKey = "###";
        $url = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";

        // Initialize a cURL session
        $ch = curl_init();
        
        // Set the URL
        curl_setopt($ch, CURLOPT_URL, $url);
        
        // Return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        
        // Execute the cURL session and store the result in $response
        $response = curl_exec($ch);
        
        // Check if any error occurred
        if (curl_errno($ch)) {
            echo 'cURL error: ' . curl_error($ch);
            exit;
        }
        
        // Close the cURL session
        curl_close($ch);
        
        // Decode the JSON response
        $data = json_decode($response, true);
        
        // Check for errors in the API response
        if ($data['cod'] !== 200) {
            echo "Error: " . $data['message'];
            exit;
        }
        
        // Map the weather description to predefined types
        // var_dump($data['weather'][0]['description']);
        $weatherType = $this->mapWeatherDescription($data['weather'][0]['description']);
        
        // Create and return a WeatherInfo object
        return new WeatherInfo(
            $city,
            $data['main']['temp'], // Temperature in Celsius
            $weatherType
        );
    }
    
    private function mapWeatherDescription(string $description): string {
        $description = strtolower($description);
        $weatherTypes = [
            'sunny' => ['clear sky', 'few clouds', 'partly cloudy','haze'],
            'stormy' => ['thunderstorm', 'storm', 'rain', 'drizzle', 'showers'],
            'cloudy' => ['cloudy', 'overcast', 'scattered clouds', 'mist', 'fog','broken clouds'],
            'snowy' => ['snow', 'sleet']
        ];

        foreach ($weatherTypes as $type => $conditions) {
            foreach ($conditions as $condition) {
                if (strpos($description, $condition) !== false) {
                    return $type;
                }
            }
        }
        return 'unknown'; // Default if no match found
    }
}
?>
