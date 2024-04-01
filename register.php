<?php
# Include connection
require_once "./config.php";

# Define variables and initialize with empty values
$username_err = $email_err = $password_err = "";
$username = $email = $password = "";

# Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  # Validate username
  if (empty(trim($_POST["username"]))) {
    $username_err = "Please enter a username.";
  } else {
    $username = trim($_POST["username"]);
    if (!ctype_alnum(str_replace(array("@", "-", "_"), "", $username))) {
      $username_err = "Username can only contain letters, numbers and symbols like '@', '_', or '-'.";
    } else {
      # Prepare a select statement
      $sql = "SELECT id FROM users WHERE username = ?";

      if ($stmt = mysqli_prepare($link, $sql)) {
        # Bind variables to the statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_username);

        # Set parameters
        $param_username = $username;

        # Execute the prepared statement 
        if (mysqli_stmt_execute($stmt)) {
          # Store result
          mysqli_stmt_store_result($stmt);

          # Check if username is already registered
          if (mysqli_stmt_num_rows($stmt) == 1) {
            $username_err = "This username already exists.";
          }
        } else {
          echo "<script>" . "alert('Oops! Something went wrong. Please try again later.')" . "</script>";
        }

        # Close statement 
        mysqli_stmt_close($stmt);
      }
    }
  }

  # Validate email 
  if (empty(trim($_POST["email"]))) {
    $email_err = "Please enter an email address";
  } else {
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_err = "Please enter a valid email address.";
    } else {
      # Prepare a select statement
      $sql = "SELECT id FROM users WHERE email = ?";

      if ($stmt = mysqli_prepare($link, $sql)) {
        # Bind variables to the statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_email);

        # Set parameters
        $param_email = $email;

        # Execute the prepared statement 
        if (mysqli_stmt_execute($stmt)) {
          # Store result
          mysqli_stmt_store_result($stmt);

          # Check if email is already registered
          if (mysqli_stmt_num_rows($stmt) == 1) {
            $email_err = "This email already exists";
          }
        } else {
          echo "<script>" . "alert('Oops! Something went wrong. Please try again later.');" . "</script>";
        }

        # Close statement
        mysqli_stmt_close($stmt);
      }
    }
  }

  # Validate password
  if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter a password.";
  } else {
    $password = trim($_POST["password"]);
    if (strlen($password) < 8) {
      $password_err = "Password must contain at least 8 or more characters.";
    }
  }

  # Check input errors before inserting data into database
  if (empty($username_err) && empty($email_err) && empty($password_err)) {
    # Prepare an insert statement
    $sql = "INSERT INTO users(username, email, password) VALUES (?, ?, ?)";

    if ($stmt = mysqli_prepare($link, $sql)) {
      # Bind varibales to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_email, $param_password);

      # Set parameters
      $param_username = $username;
      $param_email = $email;
      $param_password = password_hash($password, PASSWORD_DEFAULT);

      # Execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        echo "<script>" . "alert('Registeration completed successfully. Login to continue.');" . "</script>";
        echo "<script>" . "window.location.href='./login.php';" . "</script>";
        exit;
      } else {
        echo "<script>" . "alert('Oops! Something went wrong. Please try again later.');" . "</script>";
      }

      # Close statement
      mysqli_stmt_close($stmt);
    }
  }

  # Close connection
  mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://github.com/MCFELA123/MCFELA123.github.io/blob/main/style.css">
    <script src="script.js"></script>
    <link rel="shortcut icon" href="default-img.png" type="image/x-icon">
    <script src="manifest.js"></script>
    <script src="sw.js"></script>
    <script src="app.js"></script>
    <meta name="theme-color" content="#317EFB"/>
    <meta name="description" content="Travel assistant">
    <link rel="manifest" href="manifest.json">
    <title>Routes</title>
</head>

<body>

<div class="inlines" id="spins">
<div class="loder">
    
</div>
    </div>
<div class="start" id="start">
    <div class="trans-bg">
<div class="bgz"></div>
<div class="bgz1"></div>
<div class="bgz2"></div>
<div class="bgz3"></div>
<div class="bgz4"></div>
<div class="bgz5"></div>
<div class="bgz6"></div>
<div class="bgz7"></div>
<div class="bgz8"></div>
<div class="bgz9"></div>
<div class="bgz10"></div>
<div class="bgz11"></div>
<div class="bgz12"></div>
<div class="bgz13"></div>
<div class="bgz14"></div>
<div class="bgz15"></div>
<div class="bgz16"></div>
<div class="bgz17"></div>
<div class="bgz18"></div>
<div class="bgz19"></div>
<div class="bgz20"></div>
<div class="bgz21"></div>
<div class="bgz22"></div>
<div class="bgz23"></div>
<div class="bgz24"></div>
<div class="bgz25"></div>
<div class="bgz26"></div>
<div class="bgz27"></div>
<div class="bgz28"></div>
<div class="bgz29"></div>
<div class="bgz30"></div>
<div class="bgz31"></div>
<div class="bgz32"></div>
<div class="bgz33"></div>
<div class="bgz34"></div>
<div class="bgz35"></div>
<div class="bgz36"></div>
<div class="bgz37"></div>
<div class="bgz38"></div>
<div class="bgz39"></div>
<div class="bgz40"></div>
<div class="bgz41"></div>
<div class="bgz42"></div>
<div class="bgz43"></div>
<div class="bgz44"></div>

</div>

    <div class="start-display" id="start-display">
<center>
    <text>Routes</text>
<br>
<br>
<div class="links">
<form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" novalidate>
<div class="input-bar">
    <label for="name">Name</label>
      <input type="text" placeholder="Username" name="username" id="username" value="<?= $username; ?>">
            </div>
            <small class="text-danger"><?= $username_err; ?></small>
<br>
<div class="input-bar">
    <label for="email">Email</label>
      <input type="email" placeholder="Email" name="email" id="email" value="<?= $email; ?>">
            </div>
            <small class="text-danger"><?= $email_err; ?></small>
<br>
            <div class="input-bar">
    <label for="password">Password</label>
      <input type="password" placeholder="Password" name="password" id="password" value="<?= $password; ?>">
            </div>
            <small><div class="text-danger"><?= $password_err; ?></div></small>
<br>
<input type="submit" class="sbtn" name="submit" value="Sign up">
<br>
<p class="mb-0">Already have an account? <a href="./login.php">Login</a></p>

</form>

<hr>
<footer><a href="#">Terms</a> - <a href="#">Privacy</a></footer>
</div>
</center>

    </div>
</div>

<div class="contextmenu" id="contextmenu">
<li>Home <svg style="fill: none" viewBox="0 0 24 24"><g transform="translate(2.400000, 2.000000)"><line class="svgC" x1="6.6787" x2="12.4937" y1="14.1354" y2="14.1354"></line><path d="M1.24344979e-14,11.713 C1.24344979e-14,6.082 0.614,6.475 3.919,3.41 C5.365,2.246 7.615,0 9.558,0 C11.5,0 13.795,2.235 15.254,3.41 C18.559,6.475 19.172,6.082 19.172,11.713 C19.172,20 17.213,20 9.586,20 C1.959,20 1.24344979e-14,20 1.24344979e-14,11.713 Z"></path></g></svg></li>
<li>Search <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search ficon"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></li>
<li>Bookmarks <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star ficon text-warning"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg></li>
<li>Profile <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></li>
<li>Settings <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg></li>
<li></li>
</div>


  <script>

document.onreadystatechange = function() {
            if (document.readyState !== "complete") {
                document.querySelector(
                  "body").style.visibility = "visible";
                document.querySelector(
                  "#spins").style.visibility = "visible";
            } else {
                document.querySelector(
                  "#spins").style.display = "none";
                document.querySelector(
                  "body").style.visibility = "visible";
            }
        };

    if (typeof navigator.serviceWorker !== 'undefined') {
    navigator.serviceWorker.register('sw.js')
  }

  const CACHE_NAME = 'cool-cache';

// Add whichever assets you want to pre-cache here:
const PRECACHE_ASSETS = [
    '/assets/',
    '/src/'
]

// Listener for the install event - pre-caches our assets list on service worker install.
self.addEventListener('install', event => {
    event.waitUntil((async () => {
        const cache = await caches.open(CACHE_NAME);
        cache.addAll(PRECACHE_ASSETS);
    })());
});

self.addEventListener('activate', event => {
  event.waitUntil(self.clients.claim());
});

self.addEventListener('fetch', event => {
  event.respondWith(async () => {
      const cache = await caches.open(CACHE_NAME);

      // match the request to our cache
      const cachedResponse = await cache.match(event.request);

      // check if we got a valid response
      if (cachedResponse !== undefined) {
          // Cache hit, return the resource
          return cachedResponse;
      } else {
        // Otherwise, go to the network
          return fetch(event.request)
      };
  });
});





function scrol() {
    document.getElementById('main-content').scroll({top: 440,behavior:'smooth'})
}

function scrola() {
    document.getElementById('main-content').scroll({top: 0,behavior:'smooth'})
}

window.onload = function() {setTimeout(stats, 400),wef}

function wef() {
    
if(document.getElementById("info").style.display = 'none') {
    document.getElementById("weather").onclick = weatherReporter;
}

else {
    weatherReport;
}
}



function off() {
    document.getElementsByName("sight").style.display = 'none';
}

function stats() {
    document.getElementById("start-display").style.transform = 'translateY(0)';
    document.getElementById("start-display").style.transition = 'all .6s ease';
}

document.getElementsByTagName("button")[37].onclick = homeStart;
document.getElementsByTagName("button")[38].onclick = searchStart;
document.getElementById("weather").onclick = weatherReport;
document.getElementById("continue").onclick = finish;
document.getElementById("next").onclick = foward;

document.getElementById("back").onclick = previous;
document.getElementById("minimize").onclick = min;
document.getElementById("maximize").onclick = max;

function max() {
    var weatherTab = document.getElementById("weather");
var transcont = document.getElementById("transcont");
var spyne = document.getElementById("spyne");
var sun = document.getElementById("sonn");

document.getElementById("lay").style.display = 'block';
document.getElementById("lays").style.display = 'block';
weatherTab.onclick = weatherReport;
}

function min() {
    var weatherTab = document.getElementById("weather");
var transcont = document.getElementById("transcont");
var spyne = document.getElementById("spyne");
var sun = document.getElementById("sonn");

weatherTab.onclick = min;

document.getElementById("lay").style.display = 'block';
document.getElementById("lays").style.display = 'block';
weatherTab.style.height = '4.2em';
}

function homeStart() {
    var search = document.getElementById("search");
    var main = document.getElementById("main-content");
        var clas = document.getElementById("class");

    document.getElementsByTagName("button")[38].style.background = 'none';

document.getElementsByTagName("button")[37].style.background = 'rgb(15, 65, 182)';
            document.getElementsByTagName("button")[40].style.background = 'none';
    document.getElementsByTagName("button")[41].style.background = 'none';

search.style.opacity = '0';
setTimeout(smen, 500);
setTimeout(smenAfter, 600);

function smen() {
    main.style.display = 'block';
    search.style.display = 'none';
    
            clas.style.marginTop = '1em';
    
    document.getElementsByTagName("button")[0].innerHTML = 'Home';

          document.getElementsByTagName("button")[1].innerHTML = 'Stats';
      document.getElementsByTagName("button")[2].innerHTML = 'News';
      
             document.getElementsByTagName("button")[3].innerHTML = 'Tips';
    document.getElementsByTagName("button")[4].innerHTML = 'Watch';



}

function smenAfter() {
    main.style.opacity = '1';
}
}

function searchStart() {
            var search = document.getElementById("search");
    var main = document.getElementById("main-content");
var clas = document.getElementById("class");
        
        document.getElementsByTagName("button")[38].style.background = 'rgb(15, 65, 182)';
    document.getElementsByTagName("button")[37].style.background = 'none';
    document.getElementsByTagName("button")[40].style.background = 'none';
    document.getElementsByTagName("button")[41].style.background = 'none';

main.style.opacity = '0';
setTimeout(msen, 500);
setTimeout(msenAfter, 600);

function msen() {
    main.style.display = 'none';
    search.style.display = 'block';

            clas.style.marginTop = '-1.4em';
    document.getElementsByTagName("button")[0].innerHTML = 'Sights';

document.getElementsByTagName("button")[1].innerHTML = 'Tours';
document.getElementsByTagName("button")[2].innerHTML = 'Hotels';

   document.getElementsByTagName("button")[3].innerHTML = 'Country';
document.getElementsByTagName("button")[4].innerHTML = 'Other';

}

function msenAfter() {

    

    search.style.opacity = '1';
}
}



function weatherReport() {
var icn = document.getElementById("f-icons");
var weatherTab = document.getElementById("weather");
var transcont = document.getElementById("transcont");
var spyne = document.getElementById("spyne");
var sun = document.getElementById("sonn");

setTimeout(scrol, 500)
var times = document.getElementById("times");
var local = document.getElementById("local");


weatherTab.onclick = weatherReport;
weatherTab.style.transition = 'all 1s';
weatherTab.style.scale = '.9';
setTimeout(wtabopened, 0);

function wtabopened() {
    
   weatherTab.style.transition = 'all 1s';
    weatherTab.style.transform = 'translateY(2em)';
    setTimeout(scaleWeather, 500);

    function scaleWeather() {
       icn.style.visibility = 'visible';
        spyne.className = 'spyne';
sun.className = 'feather-sun';
document.getElementById("lay").style.display = 'block';
document.getElementById("lays").style.display = 'block';
        weatherTab.style.transition = 'all .5s';
        weatherTab.style.height = '30em';
    weatherTab.style.width = '100%';
    weatherTab.style.marginTop = '-3em';
    weatherTab.style.boxShadow = '0 0 15px 2px rgb(14, 14, 14, .9)';
   transcont.style.opacity = '1';
   transcont.style.visibility = 'visible';
   weatherTab.style.scale = '1';
   times.style.color = 'whitesmoke';
   local.style.color = 'whitesmoke';
   weatherTab.style.background = 'linear-gradient(to right, #0035d6, #005fc5, #1084ff) ';

    }
}
}

function weatherReporter() {
var icn = document.getElementById("f-icons");
var weatherTab = document.getElementById("weather");
var transcont = document.getElementById("transcont");
var spyne = document.getElementById("spyne");
var sun = document.getElementById("sonn");

setTimeout(scrola, 500)
var times = document.getElementById("times");
var local = document.getElementById("local");


weatherTab.onclick = weatherReport;
weatherTab.style.transition = 'all 1s';
weatherTab.style.scale = '.9';
setTimeout(wtabopened, 0);

function wtabopened() {
    
   weatherTab.style.transition = 'all 1s';
    weatherTab.style.transform = 'translateY(2em)';
    setTimeout(scaleWeather, 500);

    function scaleWeather() {
       icn.style.visibility = 'visible';
        spyne.className = 'spyne';
sun.className = 'feather-sun';
document.getElementById("lay").style.display = 'block';
document.getElementById("lays").style.display = 'block';
        weatherTab.style.transition = 'all .5s';
        weatherTab.style.height = '30em';
    weatherTab.style.width = '100%';
    weatherTab.style.marginTop = '-3em';
    weatherTab.style.boxShadow = '0 0 15px 2px rgb(14, 14, 14, .9)';
   transcont.style.opacity = '1';
   transcont.style.visibility = 'visible';
   weatherTab.style.scale = '1';
   times.style.color = 'whitesmoke';
   local.style.color = 'whitesmoke';
   weatherTab.style.background = 'linear-gradient(to right, #0035d6, #005fc5, #1084ff) ';

    }
}
}


$('#main-content').on('scroll', function() {
  var scrollTop = $(this).scrollTop();
  if (scrollTop + $(this).innerHeight() >= this.scrollHeight) {

document.getElementById("weather").style.display = 'none';

  } else if (scrollTop <= 0) {
    $('#message').text('Top reached');
  } else {
    $('#message').text('');
  }
});

function finish() {
    setTimeout(clear, 800)
    document.getElementById("start-display").style.transform = 'translateY(45em)';
    document.getElementById("start-display").style.transition = 'all 0.7s cubic-bezier(.75, .1, .1, .85) 0s, background 0s ease 0s';

function clear() {
    document.getElementById("user-details").innerHTML = document.getElementById("name").value;
    document.getElementById("start").style.display = 'none';
}
}

function foward() {
var input = document.getElementById("name");

if(input.value == "") {
    input.className = 'shake';
}
else {
    contin();
}
}

function previous() {
    var d001 = document.getElementById("d001");
    var d002 = document.getElementById("d002");
    var back = document.getElementById("back");
    var next = document.getElementById("next");

if(contin) {
setTimeout(retun, 800);
setTimeout(pause, 300);
setTimeout(animatFalse, 1000)
 
 function animatFalse() {
 document.getElementById("route").className = 'route';
}


function retun() {
d001.className = 'd001';
}

function pause() {
    d001.style.display = 'block';
    back.style.color = 'rgb(86, 86, 86)';
    back.style.cursor = 'default';
}

 d002.className = 'd002';
}
else {
false;
}
}

function contin() {
    var d001 = document.getElementById("d001");
    var d002 = document.getElementById("d002");
    var back = document.getElementById("back");
    var next = document.getElementById("next");


    d001.className = 'left';
    setTimeout(none01, 400);
setTimeout(bak, 600)
    setTimeout(right, 800);
    setTimeout(animat, 1000)
 
    function animat() {
    document.getElementById("route").className = 'animate';
}


    function none01() {
        d001.style.display = 'none';
    }

    function right() {
          d002.className = 'right';
    }

    function bak() {
        document.getElementById("name-inputed").innerHTML = 'Hi ' + document.getElementById("name").value + ',';
        back.style.color = 'rgb(0, 123, 255)';
        back.style.cursor = 'pointer';
    }
}




function copy() {
document.getElementById("contextmenu").innerHTML = '<li>Copy</li>';
}

function save() {
document.getElementById("contextmenu").innerHTML = '<li>Save image</li>';
}



function link() {
document.getElementById("contextmenu").innerHTML = '<li>Open in new window</li>';
}

/*(adsbygoogle = window.adsbygoogle || []).push({});

       window.onbeforeunload = function() {
    return "Dude, are you sure you want to leave? Think of the kittens!";
}

function disableF5(e) { if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82) e.preventDefault();};

$(document).ready(function(){
     $(document).on("keydown", disableF5);
});

var bc = new BroadcastChannel('test_channel');

bc.onmessage = function (ev) { 
    if(ev.data && ev.data.url===window.location.href){
       alert('You cannot open the same page in 2 tabs');
    }
}

bc.postMessage(window.location.href);

var url = window.location.pathname.toLowerCase();
if (url.includes("manufacturers/ford")) {
    window.addEventListener(
        "pagehide",
        (event) => {
            if (event.persisted) {
                // The page is about to close
                // Show a confirmation modal, return or similar
            }
        },
        false
    );
}

setInterval(function(){
  window.location.reload();
  window.stop();
},100)*/


  </script>
</body>

</html>