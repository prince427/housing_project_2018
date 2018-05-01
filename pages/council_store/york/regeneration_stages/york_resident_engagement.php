<?php
// Begins a session for a user.
session_start();
$_SESSION["incrementURL"] = ((isset($_SESSION["incrementURL"])) ? $_SESSION["incrementURL"] : 0);
?>
<!DOCTYPE html>

<html>
<head>
    <title>Regeneration Research Platform | Pages | Sidebar Left</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="/housing_project_2018/layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">

</head>
<body id="top">

<div class="wrapper row0">
    <div id="topbar" class="hoc clear">

        <div class="fl_left">
            <ul class="nospace inline pushright">
                <li><i class="fa fa-sign-in"></i> <a href="#">Login</a></li>
                <li><i class="fa fa-user"></i> <a href="#">Register</a></li>
            </ul>
        </div>
        <div class="fl_right">
            <form class="clear" method="post" action="#">
                <fieldset>
                    <legend>Search:</legend>
                    <input type="search" value="" placeholder="Search Here&hellip;">
                    <button class="fa fa-search" type="submit" title="Search"><em>Search</em></button>
                </fieldset>
            </form>
        </div>
    </div>
</div>

<div class="wrapper row1">
    <header id="header" class="hoc clear">

        <div id="logo" class="fl_left">
            <h1><a href="/housing_project_2018/index.html">Regeneration Research Platform</a></h1>
            <i class="fa fa-map-o"></i>
        </div>

        <nav id="mainav" class="fl_right">
            <ul class="clear">
                <li class="active"><a href="/housing_project_2018/index.html">Home</a></li>
                <li><a class="drop" href="/housing_project_2018/pages/locations.html">Locations</a>
                    <ul>
                        <!-- Drown Down -->
                        <li><a href="/housing_project_2018/pages/council_store/barnet/barnet.php">Barnet</a></li>
                        <li><a href="/housing_project_2018/pages/council_store/bristol/bristol.php">Bristol</a></li>
                        <li><a href="/housing_project_2018/pages/council_store/edinburgh/edinburgh.php">Edinburgh</a></li>
                        <li><a href="/housing_project_2018/pages/council_store/glasgow/glasgow.php">Glasgow</a></li>
                        <li><a href="/housing_project_2018/pages/council_store/leeds/leeds.php">Leeds</a></li>
                        <li><a href="/housing_project_2018/pages/council_store/manchester/manchester.php">Manchester</a></li>
                        <li><a href="/housing_project_2018/pages/council_store/salford/salford.php">Salford</a></li>
                        <li><a href="/housing_project_2018/pages/council_store/scarborough/scarborough.php">Scarborough</a></li>
                        <li><a href="/housing_project_2018/pages/council_store/southwark/southwark.php">Southwark</a></li>
                        <li><a href="/housing_project_2018/pages/council_store/york/york.php">York</a></li>
                    </ul>
                </li>
                <li><a class="drop" href="/housing_project_2018/national_data.php">National Data</a>
                    <ul>
                        <li><a href="/housing_project_2018/national_data.php">Regulations</a></li>
                        <li><a href="#">Example</a></li>
                    </ul>
                </li>
                <li><a href="/housing_project_2018/uploader.php">Upload Data</a></li>
                <li><a href="/housing_project_2018/contact_us.html">Contact Us</a></li>
            </ul>
        </nav>

    </header>
</div>

<div class="wrapper bgded overlay" style="background-image:url('/housing_project_2018/images/demo/backgrounds/01.jpg');">
    <div id="breadcrumb" class="hoc clear">

        <ul>
            <li><a href="/housing_project_2018/index.html">Home</a></li>
            <li><a href="/housing_project_2018/pages/council_store/york/york.php">York</a></li>
        </ul>

    </div>
</div>

<div class="wrapper row3">
    <main class="hoc container clear">
        <!-- main body -->

        <div class="sidebar one_quarter first">

            <h6>Regeneration Stages</h6>
            <nav class="sdb_holder">
                <ul>
                    <li><a href="/housing_project_2018/pages/council_store/york/york_mainstream.php">Main-Stream Media</a></li>
                    <li><a href="/housing_project_2018/pages/council_store/york/regeneration_stages/all_json.php">All available JSON files</a></li>
                    <li><a href="/housing_project_2018/pages/council_store/york/regeneration_stages/york_resident_engagement.php">Pre-Plan Consultation</a></li>
                    <li><a href="/housing_project_2018/pages/council_store/york/regeneration_stages/york_design_and_planning.php">Design and Planning</a></li>
                </ul>
            </nav>
            <div class="sdb_holder">
                <h6>Contact Details</h6>
                <address>
                    York Council<br>
                    York Customer Centre<br>
                    West Offices<br>
                    Station Rise<br>
                    York<br>
                    YO1 6GA<br>
                    <br>
                    Tel: 01904 551550<br>
                </address>
            </div>

        </div>

        <div class="content three_quarter">

            <h1>York Council Pre-plan consultation</h1>
            <p>Searching keyword: 'Consultation' within all JSON files available for York on gov.uk</p>
            <p>Scroll to keep requesting information. </p>
            <!-- Sets the style for the content -->
            <style type="text/css">

                .item {
                    border: 2px solid #222;
                    padding: 10px;
                    margin-bottom: 5px;
                }

                #loading {
                    padding: 20px 0;
                    font-weight: 700;
                    color: red;
                }

            </style>

            <?php
            // Allows the session to be stored so the URL can me maintained.
            $incrementURL = $_SESSION["incrementURL"];

            // Stores the content of the JSON along with a variable inside to allow the incrementation when loading content.
            $json = file_get_contents("https://www.gov.uk/api/search.json?q=york&start=$incrementURL");

            // Decodes the JSON.
            $json_decoded = json_decode($json);
            //var_dump($json_decoded); -- Testing Usage

            $info = array();

            // Stores the value result into an array.
            foreach($json_decoded->results as $value){
                $info[] = $value;
            }
            // Incrementation on the content.
            for ($i = 0; $i < count($info); $i++) {

                // Sets the timezone so the time is presentable.
                date_default_timezone_set("Europe/London");

                // Checks on whether the content is there for it then to be stored.
                $time = (!empty($info[$i]->public_timestamp)) ? $info[$i]->public_timestamp : "" ;
                if ($time != "") {
                    $dateInfo = date_parse($info[$i]->public_timestamp);
                } else {
                    $dateInfo = "";
                }

                // Checks on whether the content is there for it then to be stored.
                $decriptionI = (!empty($info[$i]->description)) ? $info[$i]->description : "" ;
                if ($decriptionI != "") {
                    $a = $info[$i]->description;
                } else {
                    $a = "";
                }

                // Using Strpos, its used to check for keywords within the content.
                $strLength = strlen($a);
                $pos = strpos(strtolower($a), "consultation");
                #$pos2 = strpos(strtolower($a), " ");

                // If statement on if the keyword is present. Can be used for multiple keywords.
                if($pos !== false) {

                    echo '<div class="item">';

                    // If there is content, print it out to the user, else mitigate  the error.
                    if ($a != "") {
                        echo "<p>" . $a . "</h1>";
                    } else {
                        echo "<p> no description";
                    }

                    // Same for the above, checks the content is there and echo's it to the user. Passes the URL through so that the incrementation can maintain the URL's.
                    $dateStr = (!empty($info[$i]->public_timestamp)) ? $info[$i]->public_timestamp : "";
                    echo "<p>Link is <a href='https://gov.uk" . $info[$i]->link . "'>here</a>";
                    // If the date isnt empty then print too the user in the correct readable format.
                    if ($dateInfo != "") {
                        echo "<p> Published Date: " . $dateInfo['day'] . " " . date("F", strtotime($dateStr)) . " " . $dateInfo['year'] . "</p>";

                    } else {
                        echo "<p> ";
                    }

                    echo '</div>';

                }
            }

            ?>
            <div id="container" class="container">

            </div>
            <p id="loading" style="display: none">Loading More...</p>

            <!-- Javascript Libraries, loaded Via CDN (JQUERY && INFINITE-SCROLL) -->

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <!-- <script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script> -->
            <script type="text/javascript">

                // Wrapper content
                var container = document.getElementById('container');
                var loading = document.getElementById('loading');
                var start = 20;

                // Prevent sending ajax multiple requests
                var requesting = false;

                // Function storing city
                function loadMore(city){

                    requesting = true;
                    toggleProgress();

                    if(window.XMLHttpRequest){
                        var xmlhttp = new XMLHttpRequest();
                    } else {
                        var xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
                    }

                    xmlhttp.onreadystatechange = function(){

                        // Checking the correct statuses.
                        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){

                            var response = JSON.parse(xmlhttp.responseText);

                            if(response.success){

                                if(response.message.length > 0){
                                    container.innerHTML += response.message;
                                }
                                if(response.message = []){
                                    null
                                }
                                else {
                                    //container.innerHTML += '<div class="item"><p>Still no result</p></div>';

                                    // Loads city into the URL on the next page.
                                    loadMore("york");

                                }

                                start = response.end;

                            } else {

                            }

                            requesting = false;
                            toggleProgress();
                        }
                    }
                    // Stores the content of city and start into data.
                    var data = new FormData();
                    data.append("start", start);
                    data.append("city", city);
                    // Sends the data varaible into the other PHP so the process works.
                    xmlhttp.open('POST', 'york_engagement_curl.php', true);
                    xmlhttp.send(data);
                }

                //toggle loading
                function toggleProgress() {
                    if(loading.style.display == 'none'){
                        loading.style.display = 'block';
                    } else {
                        loading.style.display = 'none';
                    }
                }

                // window.onload = function(){
                //   if(!requesting){
                //       loadMore("york");
                //      }
                //  }

                // Listening for the scroll event as its being scrolled
                window.onscroll = function(){

                    // Height of content
                    var containerHeight = container.offsetHeight;

                    // User vertical scroll position on page
                    var verticalScroll = window.pageYOffset;

                    var yAxis = verticalScroll + window.innerHeight;

                    if( yAxis >= containerHeight){

                        if(!requesting){
                            loadMore("york");
                        }
                    }
                }

            </script>

            <!-- / main body -->
            <div class="clear"></div>

            <h1>                      <h1>
    </main>
</div>



<div class="wrapper row4">
    <footer id="footer" class="hoc clear">

        <div class="one_third first">
            <h6 class="title">Company Name</h6>
            <ul class="nospace linklist contact">
                <li><i class="fa fa-map-marker"></i>
                    <address>
                        Street Name &amp; Number, Town, Postcode/Zip
                    </address>
                </li>
                <li><i class="fa fa-phone"></i> +00 (123) 456 7890<br>
                    +00 (123) 456 7890</li>
                <li><i class="fa fa-fax"></i> +00 (123) 456 7890</li>
                <li><i class="fa fa-envelope-o"></i> info@domain.com</li>
            </ul>
        </div>
        <div class="one_third">
            <h6 class="title">News Articles</h6>
            <ul class="nospace linklist">
                <li><a href="#">Example</a></li>
                <li><a href="#">Example</a></li>
                <li><a href="#">Example</a></li>
                <li><a href="#">Example</a></li>
                <li><a href="#">Example</a></li>
            </ul>
        </div>
        <div class="one_third">
            <h6 class="title">Register for Information in your area</h6>
            <form method="post" action="#">
                <fieldset>
                    <legend>Newsletter:</legend>
                    <input class="btmspace-15" type="text" value="" placeholder="Name">
                    <input class="btmspace-15" type="text" value="" placeholder="Email">
                    <input class="btmspace-15" type="text" value="" placeholder="Postcode">
                    <button type="submit" value="submit">Submit</button>
                </fieldset>
            </form>
        </div>

    </footer>
</div>

<div class="wrapper row5">
    <div id="copyright" class="hoc clear">

        <p class="fl_left">Copyright &copy; 2018 <a href="#">Kieran Amrane-Rendall & Nazim Ahmed</a></p>
    </div>
</div>


<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="/housing_project-2018/layout/scripts/jquery.min.js"></script>
<script src="/housing_project_2018/layout/scripts/jquery.backtotop.js"></script>
<script src="/housing_project_2018/layout/scripts/jquery.mobilemenu.js"></script>

<script src="/housing_project_2018/layout/scripts/jquery.placeholder.min.js"></script>

</body>
</html>