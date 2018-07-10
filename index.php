<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Soaring Penguin Press</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Lato|Merriweather" rel="stylesheet">
    <!-- <script src="https://use.fontawesome.com/0248a6365b.js"></script> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
<!--    <script src="main.js"></script>-->
</head>
<body>
    <div class="container">
        <header>
            <div class="login">
                <a href=""><i class="fas fa-sign-in-alt"></i></a>
            </div>
            <div class="geolocation styled-select">
                <select name="location">
                    <option value="">Location 1</option>
                    <option value="">Location 2</option>
                </select>
                <select name="currency">
                    <option value="">Currency 1</option>
                    <option value="">Currency 2</option>
                </select>   
            </div>
            <div class="cart">
                <a href="">Cart</a>
            </div>
            <nav class="mobile">
                <label class="open" for="menu--mobile"><i class="fa fa-bars" aria-hidden="true"></i></label>
                <input type="checkbox" id="menu--mobile" style="display:none;" />
                <span style="display:none;">
                    <ul>
                        <li><a href="">Home</a></li>
                        <li><a href="">About</a></li>
                    </ul>
                </span>
            </nav>
        </header>
        <main>
            <div class="main-opening">
                This is the text for the opening paragraph.
            </div>
            <div class="books">
                <div class="books_featured carousel">
                </div>
                <div class="books_bestseller carousel">
                </div>
                <a href="">Visit the Shop</a>
            </div>
            <div class="creators">
                <div class="creators_featured">
                </div>
                <a href="">Creators</a>
            </div>
            <div class="sections">
                <div class="section-teaser news ">
                    <h2>News</h2>
                    <ul>
                        <li><time datetime="13 May 2018">News title 3</li>
                        <li><time datetime="10 April 2018">News title 2</li>
                        <li><time datetime="6 February 2018">News title 1</li>
                    </ul>
                </div>
                <div class="section-teaser blog">
                    <h2>Blog</h2>
                    <ul>
                        <li><time datetime="13 May 2018">Blog title 3</li>
                        <li><time datetime="10 April 2018">Blog title 2</li>
                        <li><time datetime="6 February 2018">Blog title 1</li>
                    </ul>                
                </div>
                <div class="section-teaser events">
                    <h2>Events</h2>
                    <ul>
                        <li><time datetime="13 May 2018">Events title 3</li>
                        <li><time datetime="10 April 2018">Events title 2</li>
                        <li><time datetime="6 February 2018">Events title 1</li>
                    </ul>                
                </div>                
            </div>
        </main>
        <footer>
            <p class="copyright">Soaring Penguin Press</p>
            <p class="registration">4 Florence Terrace, London SW15 3RU</p>
            <nav class="footer-nav"><a href="">About</a>|<a href="">Contact</a>|<a href="">Submissions</a>|<a href="">T&Cs</a></nav>
        </footer>
    </div>
</body>
</html>