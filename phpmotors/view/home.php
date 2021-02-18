<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="bg">
        <header>
            <img src="./images/site/logo.png" alt="phpmotor_logo">
            <div class="myaccount" >
                <?php  
                
                    echo $account;
                ?>
            </div>
        </header>

        <nav>
            <?php    
                echo $navList;
            ?>
        </nav>
      
        <main>
            <h1>Welcome to PHP Motors!</h1>
            <div class="heading">
                <p>DMC Delorean</p>
                <p>3 Cup holders</p>
                <p>Superman doors</p>
                <p>Fuzzy dice!</p>
            </div>
            <div class="button">
                <a href="#">Own Today</a>
            </div>
        </main>
        <div class="sub-content">
                <div class="upgrades">
                    <h2>Delorean Upgrades</h2>
                    

                    <div class="grid2x2">
                        <div class="box">
                           
                                <img src="./images/upgrades/flux-cap.png" alt="Flux-cap">
                                <a href="#">Flux Capacitor</a>
                            
                        </div>
                        <div class="box">
                          
                            <img src="./images/upgrades/flame.jpg" alt="Flame">
                            <a href="#">Flame Decals</a>
                          
                        </div>
                        <div class="box">
                            
                                <img src="./images/upgrades/bumper_sticker.jpg" alt="bumper_sticker">
                                <a href="#">Bumper Stickers</a>
                            
                        </div>
                        <div class="box">
                            
                                <img src="./images/upgrades/hub-cap.jpg" alt="hub-cap">
                                <a href="#">Hub Caps</a>
                            
                        </div>
                      </div>
                </div>
        
                <div class="reviews">
                    <h2>DMC Delorean Reviews</h2>
                    <ul>
                        <li>"So fast its almost like travelling in time." (4/5)</li>
                        <li>"Coolest ride on the road." (4/5)</li>
                        <li>"I'm feeling Marty McFly!" (5/5)</li>
                        <li>"The most futuristic ride of our day." (4.5/5)</li>
                        <li>"80's livin and I love it!" (5/5)</li>
                    </ul>
                </div>
            </div>

            <?php    
            include 'footer.php';
            ?>
        
    </div>
   
    <script src="./js/script.js"></script>
</body>

</html>