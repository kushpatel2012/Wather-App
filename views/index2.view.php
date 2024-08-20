<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./styles/normalize.css" />
    <link rel="stylesheet" type="text/css" href="./styles/styles.css" />
    <title>Weather Information</title>
</head>
<body>
    <div class="app-container" style="background-image: url('<?php echo htmlspecialchars($bg_path); ?>'); ">
        <div class="top-bar">
            <form method="post" action="">
                <label for="city-select">Select City:</label>
                <select id="city-select" name="city" onchange="this.form.submit()">
                    <option value="Ahmedabad,IN">Ahmedabad</option>
                    <option value="Surat,IN">Surat</option>
                    <option value="Mumbai,IN">Mumbai</option>
                    <option value="Delhi,IN">Delhi</option>
                    <option value="Bangalore,IN">Bangalore</option>
                    <option value="Chennai,IN">Chennai</option>
                    <option value="Kolkata,IN">Kolkata</option>
                    <option value="Pune,IN">Pune</option>
                    <option value="Jaipur,IN">Jaipur</option>
                    <option value="Hyderabad,IN">Hyderabad</option>
                </select>
            </form>
            <div class="top-bar__location">
                <svg class="icon" viewBox="0 0 52.7624 72.774">
                    <path d="m45.0353,7.7268h0c-10.3024-10.3024-27.0058-10.3024-37.3081,0h0C-1.2832,16.7371-2.5652,30.9001,4.6807,41.3819l21.7006,31.392,21.7006-31.392c7.2459-10.4818,5.9638-24.6448-3.0465-33.6551Zm-18.6541,32.3037c-7.5383,0-13.6492-6.111-13.6492-13.6492s6.111-13.6493,13.6492-13.6493,13.6492,6.111,13.6492,13.6493-6.111,13.6492-13.6492,13.6492Z" style="fill: currentColor;"/>
                </svg>
                <span id="city-name"><?php echo htmlspecialchars($info->city); ?></span>
            </div>
            <div class="top-bar__date">
                <?php echo date('d'); ?><sup>th</sup> <?php echo date('l'); ?>
            </div>
        </div>
        <div class="weather-info">
            <img id="weather-icon" class="weather-info__image" src="<?php echo htmlspecialchars($icon_path); ?>" alt="Weather Icon" />
            <h1 class="weather-info__temperature"><?php echo htmlspecialchars($info->temperatureK); ?>K</h1>
            <p class="weather-info__desc">
                <?php if($info->weatherType ==="stormy"): ?>
                    <!-- SVG for stormy -->
                    <svg class="icon" viewBox="0 0 64.835 62.9863">
                        <!-- SVG Path for stormy -->
                    </svg>
                <?php elseif($info->weatherType ==="sunny"):?>
                    <!-- SVG for sunny -->
                    <svg class="icon" viewBox="0 0 68.4066 68.4066">
                        <!-- SVG Path for sunny -->
                    </svg>
                <?php elseif($info->weatherType ==="cloudy"):?>
                    <!-- SVG for cloudy -->
                    <svg class="icon" viewBox="0 0 77.2362 48.9505">
                        <!-- SVG Path for cloudy -->
                    </svg>
                <?php elseif($info->weatherType ==="snowy"):?>
                    <!-- SVG for snowy -->
                    <svg class="icon" viewBox="0 0 57.5357 50.1371">
                        <!-- SVG Path for snowy -->
                    </svg>
                <?php endif; ?>
                <?php echo htmlspecialchars($info->weatherType); ?>
            </p>
        </div>
    </div> 
</body>
</html>
