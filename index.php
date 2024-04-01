<?php
# Initialize the session
session_start();

# If user is not logged in then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== TRUE) {
  echo "<script>" . "window.location.href='./login.php';" . "</script>";
  exit;
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
<body id="body" onclick="setTimeout(hide, 5000)">
<script>
            function hide() {
                document.getElementById("information").style.display = 'none';
            }
        </script>
<div class="inlines" id="spins">
<div class="loder">
    
</div>
    </div>
    <div class="body-container" id="body-container">
        
        <div class="bg">

<div>
    
</div>

        </div>
<div class="dashboard">
    <div class="longitude">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
        </div>
        <div>
        <text>Lagos, NG</text> <span class="dot"></span>
        </div>
    </div>
    <br><br>
    <div class="user-details">
        <text>Hello <b id="user-details"><?= htmlspecialchars($_SESSION["username"]); ?></b></text>
<br>    <text class="ex">Start Exploring</text>
        <span class="settings" id="settings" onclick="setTimeout(configure, 300)">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:serif="http://www.serif.com/" viewBox="-1.5 0 26 40"><path d="M15.006,7.159c-1.164,0.412 -2,1.523 -2,2.829c0,1.305 0.836,2.417 2,2.829l0,14.183c0,0.552 0.448,1 1,1c0.552,0 1,-0.448 1,-1l0,-14.183c1.165,-0.412 2,-1.524 2,-2.829c0,-1.306 -0.835,-2.417 -2,-2.829l0,-2.171c0,-0.552 -0.448,-1 -1,-1c-0.552,-0 -1,0.448 -1,1l0,2.171Z"/><path d="M6,19.176c-1.157,0.416 -1.986,1.524 -1.986,2.824c-0,1.3 0.829,2.408 1.986,2.824l0,2.176c-0,0.552 0.448,1 1,1c0.552,0 1,-0.448 1,-1l0,-2.166c1.172,-0.408 2.014,-1.524 2.014,-2.834c-0,-1.31 -0.842,-2.426 -2.014,-2.834l0,-14.178c-0,-0.552 -0.448,-1 -1,-1c-0.552,-0 -1,0.448 -1,1l0,14.188Z"/></svg>
        </span>
    </div>
<br>




    <div class="class" id="class">
        <div></div>
        <button>Home</button>
        <button>stats</button>
        <button>News</button>
        <button>Tips</button>
        <button>Watch</button>
     </div>
     <div class="search" id="search">
    <div class="inner">
        <div class="searchcon" id="searchcon">
<script>
    function shs() {
        var con = document.getElementById("searchcon");
        var fcus = document.getElementById("focuser");
        var intew = document.getElementById("searchs");
        var goto = document.getElementById("goto");
        var gotxt = document.getElementById("gotxt");
        var result = document.getElementById("result");

if(intew.onfocus) {
    con.style.borderRadius = '8px 8px 0 0';
        fcus.style.height = '10em';
        fcus.style.visibility = 'visible';
    goto.style.background = 'white';
    gotxt.style.color = '#494949';
    goto.style.width = '3em';
    goto.style.marginTop = '4px';
gotxt.innerHTML = 'Go';
goto.onclick = ser();
}


    }

    function ser() {
        var intew = document.getElementById("searchs");
        var result = document.getElementById("result");
        var lives = document.getElementById("live-search");
        var recent = document.getElementById("rec-search");

if(intew.onkeypress) {
    lives.innerHTML = intew.value;
    lives.style.display = 'block';
    recent.style.display = 'block';
}

else {
    lives.innerHTML = '';
    lives.style.display = 'none';
    recent.style.display = 'block';
}


        if(searchs.value == 'un') {
    result.innerHTML = '<span class="ans">United Kingdom<small> -country</small></span><span class="ans">USA<small> -country</small></span>';
}

if(searchs.value == 'uni') {
    result.innerHTML = '<span class="ans">United Kingdom<small> -country</small></span><span class="ans">USA<small> -country</small></span><span class="ans">United Arab Emirates<small> -country</small></span>';
}


if(searchs.value == 'unit') {
    result.innerHTML = '<span class="ans">United Kingdom<small> -country</small></span><span class="ans">USA<small> -country</small></span><span class="ans">United Arab Emirates<small> -country</small></span>';
}



if(searchs.value == 'united k') {
    result.innerHTML = '<span class="ans">United Kingdom<small> -country</small>';
}

if(searchs.value == 'uk') {
    result.innerHTML = '<span class="ans">United Kingdom<small> -country</small>';
}

if(searchs.value == 'united s') {
    result.innerHTML = '<span class="ans">USA<small> -country</small></span>';
}

if(searchs.value == 'us') {
    result.innerHTML = '<span class="ans">USA<small> -country</small></span>';
}

if(searchs.value == '1') {
    result.innerHTML = '<center style="color:grey"><br> Your search does no match any criteria</center>';
}

if(searchs.value == 'f') {
    result.innerHTML = '<span class="ans">Florida<small> -country</small></span><span class="ans">Finland<small> -country</small></span><span class="ans">Search in Hotels</span>';
}

if(searchs.value == 'flo') {
    result.innerHTML = '  <input type="button" class="rc1" value="Florida"><input type="button" class="rc3" value="Search in Hotels">';
}

if(searchs.value == 'fin') {
    result.innerHTML = '  <input type="button" class="rc1" value="Finland"><input type="button" class="rc3" value="Search in Hotels">';
}

if(searchs.value == 'l') {
    result.innerHTML = '  <input type="button" class="rc1" value="Light House"><input type="button" class="rc2" value="Los angeles"><input type="button" class="rc3" value="Search in Hotels">';
}


    }

    function dhs() {
        var con = document.getElementById("searchcon");
        var fcus = document.getElementById("focuser");
        var intew = document.getElementById("searchs");
        var goto = document.getElementById("goto");
        var gotxt = document.getElementById("gotxt");
        var result = document.getElementById("result");

  setTimeout(lata, 250)
        fcus.style.height = '0';
        fcus.style.visibility = 'hidden';
        goto.onclick = se();

function lata() {
    con.style.borderRadius = '8px';
    goto.style.background = 'none';
    goto.style.width = '2em';
gotxt.innerHTML = '!';
gotxt.style.color = '#494949';
goto.style.marginTop = '0';
}

    }

  
</script>

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search ficon"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            <input type="text" placeholder="Niagara falls.." id="searchs" onfocus="shs()" onkeypress="ser()">
            <div class="clear" id="goto"><text id="gotxt">!</text></div>
                        <svg class="inpset" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48"><path d="M 24 4 C 22.423103 4 20.902664 4.1994284 19.451172 4.5371094 A 1.50015 1.50015 0 0 0 18.300781 5.8359375 L 17.982422 8.7382812 C 17.878304 9.6893592 17.328913 10.530853 16.5 11.009766 C 15.672739 11.487724 14.66862 11.540667 13.792969 11.15625 L 13.791016 11.15625 L 11.125 9.9824219 A 1.50015 1.50015 0 0 0 9.4257812 10.330078 C 7.3532865 12.539588 5.7626807 15.215064 4.859375 18.201172 A 1.50015 1.50015 0 0 0 5.4082031 19.845703 L 7.7734375 21.580078 C 8.5457929 22.147918 9 23.042801 9 24 C 9 24.95771 8.5458041 25.853342 7.7734375 26.419922 L 5.4082031 28.152344 A 1.50015 1.50015 0 0 0 4.859375 29.796875 C 5.7625845 32.782665 7.3519262 35.460112 9.4257812 37.669922 A 1.50015 1.50015 0 0 0 11.125 38.015625 L 13.791016 36.841797 C 14.667094 36.456509 15.672169 36.511947 16.5 36.990234 C 17.328913 37.469147 17.878304 38.310641 17.982422 39.261719 L 18.300781 42.164062 A 1.50015 1.50015 0 0 0 19.449219 43.460938 C 20.901371 43.799844 22.423103 44 24 44 C 25.576897 44 27.097336 43.800572 28.548828 43.462891 A 1.50015 1.50015 0 0 0 29.699219 42.164062 L 30.017578 39.261719 C 30.121696 38.310641 30.671087 37.469147 31.5 36.990234 C 32.327261 36.512276 33.33138 36.45738 34.207031 36.841797 L 36.875 38.015625 A 1.50015 1.50015 0 0 0 38.574219 37.669922 C 40.646713 35.460412 42.237319 32.782983 43.140625 29.796875 A 1.50015 1.50015 0 0 0 42.591797 28.152344 L 40.226562 26.419922 C 39.454197 25.853342 39 24.95771 39 24 C 39 23.04229 39.454197 22.146658 40.226562 21.580078 L 42.591797 19.847656 A 1.50015 1.50015 0 0 0 43.140625 18.203125 C 42.237319 15.217017 40.646713 12.539588 38.574219 10.330078 A 1.50015 1.50015 0 0 0 36.875 9.984375 L 34.207031 11.158203 C 33.33138 11.54262 32.327261 11.487724 31.5 11.009766 C 30.671087 10.530853 30.121696 9.6893592 30.017578 8.7382812 L 29.699219 5.8359375 A 1.50015 1.50015 0 0 0 28.550781 4.5390625 C 27.098629 4.2001555 25.576897 4 24 4 z M 24 7 C 24.974302 7 25.90992 7.1748796 26.847656 7.3398438 L 27.035156 9.0644531 C 27.243038 10.963375 28.346913 12.652335 30 13.607422 C 31.654169 14.563134 33.668094 14.673009 35.416016 13.904297 L 37.001953 13.207031 C 38.219788 14.669402 39.183985 16.321182 39.857422 18.130859 L 38.451172 19.162109 C 36.911538 20.291529 36 22.08971 36 24 C 36 25.91029 36.911538 27.708471 38.451172 28.837891 L 39.857422 29.869141 C 39.183985 31.678818 38.219788 33.330598 37.001953 34.792969 L 35.416016 34.095703 C 33.668094 33.326991 31.654169 33.436866 30 34.392578 C 28.346913 35.347665 27.243038 37.036625 27.035156 38.935547 L 26.847656 40.660156 C 25.910002 40.82466 24.973817 41 24 41 C 23.025698 41 22.09008 40.82512 21.152344 40.660156 L 20.964844 38.935547 C 20.756962 37.036625 19.653087 35.347665 18 34.392578 C 16.345831 33.436866 14.331906 33.326991 12.583984 34.095703 L 10.998047 34.792969 C 9.7799772 33.330806 8.8159425 31.678964 8.1425781 29.869141 L 9.5488281 28.837891 C 11.088462 27.708471 12 25.91029 12 24 C 12 22.08971 11.087719 20.290363 9.5488281 19.160156 L 8.1425781 18.128906 C 8.8163325 16.318532 9.7814501 14.667839 11 13.205078 L 12.583984 13.902344 C 14.331906 14.671056 16.345831 14.563134 18 13.607422 C 19.653087 12.652335 20.756962 10.963375 20.964844 9.0644531 L 21.152344 7.3398438 C 22.089998 7.1753403 23.026183 7 24 7 z M 24 16 C 19.599487 16 16 19.59949 16 24 C 16 28.40051 19.599487 32 24 32 C 28.400513 32 32 28.40051 32 24 C 32 19.59949 28.400513 16 24 16 z M 24 19 C 26.779194 19 29 21.220808 29 24 C 29 26.779192 26.779194 29 24 29 C 21.220806 29 19 26.779192 19 24 C 19 21.220808 21.220806 19 24 19 z"/></svg>
<div style="opacity: 0;">c</div>
        </div>
        <div class="focuser" id="focuser" onclick="dhs()">
  <div class="slq">
    <text id="rec-search">Recent search</text>
<text id="live-search" style="display:none">Popular searches</text>
    
   <div class="resullt" id="result">
<span class="ans">Toronto</span>
<span class="ans">Florida</span>
<span class="ans">Cape Town</span>
<span class="ans">New York</span>
<span class="ans">Nigeria</span>
   </div>
  </div>
        </div>
        <br>
<script>
    function myFunction(q) {
  
  var product = q.target.parentElement;
  var dots = product.getElementsByClassName("dots")[0];
  var moreText = product.getElementsByClassName("more")[0];


  if (dots.style.display === "none") {
    dots.style.display = "inline"; 
    moreText.style.width = "85%";
    moreText.style.height = "90%";
    moreText.style.zIndex = "99";
    moreText.style.left = "2vmax";
    moreText.style.top = "4%";
    moreText.style.position = "absolute";
  } 
  else {
    dots.style.display = "none";
    moreText.style.width = "inherit";
    moreText.style.zIndex = "9";
    moreText.style.left = "0";
    moreText.style.top = "0";
    moreText.style.position = "sticky";
    moreText.style.height = "inherit";
  }
}
</script>

        <div class="topic">23 Sights</div>
<div class="sights">
<span class="dots">...</span>
  

  <div id="product1" class="pr-0 ui0">
    <span class="dots">...</span>
    <div class="more bg1" onclick="myFunction(event)">
    
                    <div class="bmark select">
            
                <svg class="svg-icon selected" style="vertical-align: middle;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M341.333333 170.666667h341.333334a85.333333 85.333333 0 0 1 85.333333 85.333333v500.352a42.666667 42.666667 0 0 1-71.509333 31.445333l-155.648-142.72a42.666667 42.666667 0 0 0-57.685334 0l-155.648 142.72A42.666667 42.666667 0 0 1 256 756.352V256a85.333333 85.333333 0 0 1 85.333333-85.333333z" /></svg>
                </div>
          <div class="bot-det">
            <text><small>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="star"><path style="marker:none" fill="#f8b84e" d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z" color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)"></path></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="star"><path style="marker:none" fill="#f8b84e" d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z" color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)"></path></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="star"><path style="marker:none" fill="#f8b84e" d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z" color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)"></path></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="star" class="feather-star star-empty"><path style="marker:none" d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z" color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)"></path></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="star" class="feather-star star-empty"><path style="marker:none" d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z" color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)"></path></svg> 
                
                <small>4,3</small>
            
            </small></text><br>
            <text>Ville de Florida <br> <text>Tour</text></text>
          </div> 
                
        
          

          </div>
  </div>
  
      <div id="product2" class="pr-0">
      <span class="dots">...</span>
    <div class="more bg2" onclick="myFunction(event)">
    
                    <div class="bmark select">
            
                <svg class="svg-icon selected" style="vertical-align: middle;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M341.333333 170.666667h341.333334a85.333333 85.333333 0 0 1 85.333333 85.333333v500.352a42.666667 42.666667 0 0 1-71.509333 31.445333l-155.648-142.72a42.666667 42.666667 0 0 0-57.685334 0l-155.648 142.72A42.666667 42.666667 0 0 1 256 756.352V256a85.333333 85.333333 0 0 1 85.333333-85.333333z" /></svg>
                </div>
                <div class="bot-det">
    <text><small>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="star"><path style="marker:none" fill="#f8b84e" d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z" color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)"></path></svg>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="star"><path style="marker:none" fill="#f8b84e" d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z" color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)"></path></svg>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="star"><path style="marker:none" fill="#f8b84e" d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z" color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)"></path></svg>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="star"><path style="marker:none" fill="#f8b84e" d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z" color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)"></path></svg>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="star" class="feather-star star-empty"><path style="marker:none" d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z" color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)"></path></svg>
    </small></text><br>
    <text>Light house <br><text>excursions</text></text>
  </div> 
                
        
          

          </div>
      </div>

  
      <div id="product2" class="pr-0">
      <span class="dots">...</span>
    <div class="more bg3" onclick="myFunction(event)">
    
                    <div class="bmark select">
            
                <svg class="svg-icon selected" style="vertical-align: middle;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M341.333333 170.666667h341.333334a85.333333 85.333333 0 0 1 85.333333 85.333333v500.352a42.666667 42.666667 0 0 1-71.509333 31.445333l-155.648-142.72a42.666667 42.666667 0 0 0-57.685334 0l-155.648 142.72A42.666667 42.666667 0 0 1 256 756.352V256a85.333333 85.333333 0 0 1 85.333333-85.333333z" /></svg>
                </div>
                <div class="bot-det">
            <text><small>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="star"><path style="marker:none" fill="#f8b84e" d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z" color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)"></path></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="star"><path style="marker:none" fill="#f8b84e" d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z" color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)"></path></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="star"><path style="marker:none" fill="#f8b84e" d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z" color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)"></path></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="star"><path style="marker:none" fill="#f8b84e" d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z" color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)"></path></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="star" class="feather-star star-empty"><path style="marker:none" d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z" color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)"></path></svg>
            </small></text><br>
            <text>excursion à paris <br><text>Travel</text></text>
          </div> 
                
        
          

          </div>
      </div>

  
      <div id="product2" class="pr-0">
      <span class="dots">...</span>
    <div class="more bg4" onclick="myFunction(event)">
    
                    <div class="bmark select">
            
                <svg class="svg-icon selected" style="vertical-align: middle;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M341.333333 170.666667h341.333334a85.333333 85.333333 0 0 1 85.333333 85.333333v500.352a42.666667 42.666667 0 0 1-71.509333 31.445333l-155.648-142.72a42.666667 42.666667 0 0 0-57.685334 0l-155.648 142.72A42.666667 42.666667 0 0 1 256 756.352V256a85.333333 85.333333 0 0 1 85.333333-85.333333z" /></svg>
                </div>
                <div class="bot-det">
            <text><small>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="star"><path style="marker:none" fill="#f8b84e" d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z" color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)"></path></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="star"><path style="marker:none" fill="#f8b84e" d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z" color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)"></path></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="star"><path style="marker:none" fill="#f8b84e" d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z" color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)"></path></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="star"><path style="marker:none" fill="#f8b84e" d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z" color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)"></path></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="star" class="feather-star star-empty"><path style="marker:none" d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z" color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)"></path></svg>
            </small></text><br>
            <text>Tour to New York <br> <text>Country</text></text>
          </div> 
               
        
          

          </div>
      </div>

        
      <div id="product2" class="pr-0">
      <span class="dots">...</span>
    <div class="more bg5" onclick="myFunction(event)">
    
                    <div class="bmark select">
            
                <svg class="svg-icon selected" style="vertical-align: middle;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M341.333333 170.666667h341.333334a85.333333 85.333333 0 0 1 85.333333 85.333333v500.352a42.666667 42.666667 0 0 1-71.509333 31.445333l-155.648-142.72a42.666667 42.666667 0 0 0-57.685334 0l-155.648 142.72A42.666667 42.666667 0 0 1 256 756.352V256a85.333333 85.333333 0 0 1 85.333333-85.333333z" /></svg>
                </div>
         <div class="bot-det">
            <text><small>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="star"><path style="marker:none" fill="#f8b84e" d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z" color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)"></path></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="star"><path style="marker:none" fill="#f8b84e" d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z" color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)"></path></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="star"><path style="marker:none" fill="#f8b84e" d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z" color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)"></path></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="star"><path style="marker:none" fill="#f8b84e" d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z" color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)"></path></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="star" class="feather-star star-empty"><path style="marker:none" d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z" color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)"></path></svg>
            </small></text><br>
            <text>Voyage à Dubaï <br> <text>Adventure</text></text>
          </div> 
                
        
          

          </div>
      </div>

        
      <div id="product2" class="pr-0">
      <span class="dots">...</span>
    <div class="more bg6" onclick="myFunction(event)">
    
                    <div class="bmark select">
            
                <svg class="svg-icon selected" style="vertical-align: middle;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M341.333333 170.666667h341.333334a85.333333 85.333333 0 0 1 85.333333 85.333333v500.352a42.666667 42.666667 0 0 1-71.509333 31.445333l-155.648-142.72a42.666667 42.666667 0 0 0-57.685334 0l-155.648 142.72A42.666667 42.666667 0 0 1 256 756.352V256a85.333333 85.333333 0 0 1 85.333333-85.333333z" /></svg>
                </div>
                <div class="bot-det">
            <text><small>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="star"><path style="marker:none" fill="#f8b84e" d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z" color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)"></path></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="star"><path style="marker:none" fill="#f8b84e" d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z" color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)"></path></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="star"><path style="marker:none" fill="#f8b84e" d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z" color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)"></path></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="star"><path style="marker:none" fill="#f8b84e" d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z" color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)"></path></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="star" class="feather-star star-empty"><path style="marker:none" d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z" color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)"></path></svg>
            </small></text><br>
            <text>Visit Australia <br> <text>Tour</text></text>
          </div> 
                
        
          

          </div>
      </div>

        
      <div id="product2" class="pr-0">
      <span class="dots">...</span>
    <div class="more bg7" onclick="myFunction(event)">
    
                    <div class="bmark select">
            
                <svg class="svg-icon selected" style="vertical-align: middle;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M341.333333 170.666667h341.333334a85.333333 85.333333 0 0 1 85.333333 85.333333v500.352a42.666667 42.666667 0 0 1-71.509333 31.445333l-155.648-142.72a42.666667 42.666667 0 0 0-57.685334 0l-155.648 142.72A42.666667 42.666667 0 0 1 256 756.352V256a85.333333 85.333333 0 0 1 85.333333-85.333333z" /></svg>
                </div>
                <div class="bot-det">
            <text><small>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="star"><path style="marker:none" fill="#f8b84e" d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z" color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)"></path></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="star"><path style="marker:none" fill="#f8b84e" d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z" color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)"></path></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="star"><path style="marker:none" fill="#f8b84e" d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z" color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)"></path></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="star"><path style="marker:none" fill="#f8b84e" d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z" color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)"></path></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="star" class="feather-star star-empty"><path style="marker:none" d="M-1220 1212.362c-11.656 8.326-86.446-44.452-100.77-44.568-14.324-.115-89.956 51.449-101.476 42.936-11.52-8.513 15.563-95.952 11.247-109.61-4.316-13.658-76.729-69.655-72.193-83.242 4.537-13.587 96.065-14.849 107.721-23.175 11.656-8.325 42.535-94.497 56.86-94.382 14.323.116 43.807 86.775 55.327 95.288 11.52 8.512 103.017 11.252 107.334 24.91 4.316 13.658-68.99 68.479-73.527 82.066-4.536 13.587 21.133 101.451 9.477 109.777z" color="#000" overflow="visible" transform="matrix(.04574 0 0 .04561 68.85 -40.34)"></path></svg>
            </small></text><br>
            <text>Tour to europe <br> <text>Adventure</text></text>
          </div> 
                
        
          

          </div>
      </div>

</div>

<br>

<div class="topic">Popular</div>

<div class="popular"></div>
<br><br><br><br><br><br><br>





    </div>
     </div>

    <div class="main-content" id="main-content">
    <!--   <div class="info" id="info">
  <div class="close" id="close" onclick="(document.getElementById('info').style.display = 'none')">
    <text>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" id="x"><rect fill="none"></rect><line x1="200" x2="56" y1="56" y2="200" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="40"></line><line x1="200" x2="56" y1="200" y2="56" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="40"></line></svg>
    </text>
</div>

<div class="but-learn">Learn more</div>
        </div>-->

<div class="information" id="information">

<div class="close zinc" id="close" onclick="(document.getElementById('information').style.display = 'none')">
    <text>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" id="XS-max"><rect fill="none"></rect><line x1="200" x2="56" y1="56" y2="200" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="30"></line><line x1="200" x2="56" y1="200" y2="56" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="30"></line></svg>
    </text>
</div>
<br>

    <img src="reagent.png" alt="">

    <text>Routes</text><br>
    <small>Explore new places on <br> our app</small><br>
    <input type="button" value="Get started" class="btn-obs gets">
</div>
<br>


        <br id="dfr" style="display: none">
        <div class="cadev">
            <div class="cd0">
    
                    <div class="ep0">
                        <section>
                       <center>
                       <p class="months" id="month"></p>
                       <script>
const month = ["January","February","March","April","May","June","July","August","September","October","November","December"];

const d = new Date();
let name = month[d.getMonth()];
document.getElementById("month").innerHTML = name;


</script>
</center>
                          
<div class="seo">
<text class="lara">
    <small>No more events today</small></text><br>
    <input type="button" value="add event" class="btn-obs cal">
                        
</div>
</section>

                        <section>
                            <div class="nav-icons">
<div class="ali">
<div class="boll">
<svg viewBox="0 0 20 20" class=""><path d="M7.65 4.15c.2-.2.5-.2.7 0l5.49 5.46c.21.22.21.57 0 .78l-5.49 5.46a.5.5 0 01-.7-.7L12.8 10 7.65 4.85a.5.5 0 010-.7z"></path></svg>
</div>

</div>

<div class="ali">

<div class="day" id="day">
    
</div>

<script>
    const weekday = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];

const f = new Date();
let day = weekday[f.getDay()];
document.getElementById("day").innerHTML = day;

</script>

</div>

<div class="ali">
<div class="boll">
<svg viewBox="0 0 20 20" class=""><path d="M7.65 4.15c.2-.2.5-.2.7 0l5.49 5.46c.21.22.21.57 0 .78l-5.49 5.46a.5.5 0 01-.7-.7L12.8 10 7.65 4.85a.5.5 0 010-.7z"></path></svg>

</div> 
</div>                          
 </div>

 <div class="days">
 <input type="button" class="notpart" value="30">
<input type="button" class="notpart" value="31">
<input type="button" id="dy1" value="1">
<input type="button" id="dy2" value="2">
<input type="button" id="dy3" value="3">
<input type="button" id="dy4" value="4">
<input type="button" id="dy5" value="5">
<input type="button" id="dy6" value="6">
<input type="button" id="dy7" value="7">
<input type="button" id="dy8" value="8">
<input type="button" id="dy9" value="9">
<input type="button" id="dy10" value="10">
<input type="button" id="dy11" value="11">
<input type="button" id="dy12" value="12">
<input type="button" id="dy13" value="13">
<input type="button" id="dy14" value="14">
<input type="button" id="dy15" value="15">
<input type="button" id="dy16" value="16">
<input type="button" id="dy17" value="17">
<input type="button" id="dy18" value="18">
<input type="button" id="dy19" value="19">
<input type="button" id="dy20" value="20">
<input type="button" id="dy21" value="21">
<input type="button" id="dy22" value="22">
<input type="button" id="dy23" value="23">
<input type="button" id="dy24" value="24">
<input type="button" id="dy25" value="25">
<input type="button" id="dy26" value="26">
<input type="button" id="dy27" value="27">
<input type="button" id="dy28" value="28">
<input type="button" id="dy29" value="29">
<input type="button" id="dy30" value="30">
 </div>
                        </section>
                    </div>


                
                    <div class="calender" hidden>

                        <button class="notpart">30</button>
                        <button class="notpart">31</button>
                        <button><text>1</text></button>
                        <button><text>2</text></button>
                        <button><text>3</text></button>
                        <button><text>4</text></button>
                        <button><text>5</text></button>
                        <button><text>6</text></button>
                        <button><text>7</text></button>
                        <button><text>8</text></button>
                        <button><text>9</text></button>
                        <button><text>10</text></button>
                        <button><text>11</text></button>
                        <button><text>12</text></button>
                        <button><text>13</text></button>
                        <button><text>14</text></button>
                        <button><text>15</text></button>
                        <button><text>16</text></button>
                        <button><text>17</text></button>
                        <button><text>18</text></button>
                        <button class="important"><text>19</text></button>
                        <button><text>12</text></button>
                        <button><text>21</text></button>
                        <button><text>22</text></button>
                        <button><text>23</text></button>
                        <button><text>24</text></button>
                        <button><text>25</text></button>
                        <button><text>26</text></button>
                        <button><text>27</text></button>
                        <button><text>28</text></button>
                    </div>
                
         <div class="reacher">
<div class="lit arup">
<svg viewBox="0 0 20 20" class="uip"><path d="M7.65 4.15c.2-.2.5-.2.7 0l5.49 5.46c.21.22.21.57 0 .78l-5.49 5.46a.5.5 0 01-.7-.7L12.8 10 7.65 4.85a.5.5 0 010-.7z"></path></svg>

</div>
          <div class="lit imp"></div>
        <div class="lit"></div>
        <div class="lit ardwd">
<svg viewBox="0 0 20 20" class="ardw"><path d="M7.65 4.15c.2-.2.5-.2.7 0l5.49 5.46c.21.22.21.57 0 .78l-5.49 5.46a.5.5 0 01-.7-.7L12.8 10 7.65 4.85a.5.5 0 010-.7z"></path></svg>

</div>

         </div>
            </div>
            <div class="cd0">
                <div class="inside">
                    <p>Events</p>
                    <center>
                        <div class="add">
<div class="adds">
    <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><line x1="256" y1="176" x2="256" y2="336" style="fill:none;stroke:#ffffff;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"/><line x1="336" y1="256" x2="176" y2="256" style="fill:none;stroke:#ffffff;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"/></svg>
</div>
                        </div>
                    </center>
                   
                </div>
            </div>
        
        </div>
<br>


<br id="lays">
<div class="weather" id="weathe">


</div>

<!--
<div class="weather Wlast">

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sun ficon"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
</div>
-->
<br><br id="lay">
<div class="new">
<div class="shad">
<div>
     
    <text class="find">Find all</text><br>
    <text class="all">new and favourite apps</text>
 
    <button><text>Join</text></button>
</div>
</div>

<img src="./new.jpg" alt="">
</div>
<br>
<div class="reminder">
    <div class="header">
        <img src="./reminder.png" alt="">
        <text>Reminder</text>

        <div class="function-icons">
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 45.402 45.402"xml:space="preserve"><g><path d="M41.267,18.557H26.832V4.134C26.832,1.851,24.99,0,22.707,0c-2.283,0-4.124,1.851-4.124,4.135v14.432H4.141c-2.283,0-4.139,1.851-4.138,4.135c-0.001,1.141,0.46,2.187,1.207,2.934c0.748,0.749,1.78,1.222,2.92,1.222h14.453V41.27c0,1.142,0.453,2.176,1.201,2.922c0.748,0.748,1.777,1.211,2.919,1.211c2.282,0,4.129-1.851,4.129-4.133V26.857h14.435c2.283,0,4.134-1.867,4.133-4.15C45.399,20.425,43.548,18.557,41.267,18.557z"/></g></svg>
            <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48"><path d="M 24 4 C 22.423103 4 20.902664 4.1994284 19.451172 4.5371094 A 1.50015 1.50015 0 0 0 18.300781 5.8359375 L 17.982422 8.7382812 C 17.878304 9.6893592 17.328913 10.530853 16.5 11.009766 C 15.672739 11.487724 14.66862 11.540667 13.792969 11.15625 L 13.791016 11.15625 L 11.125 9.9824219 A 1.50015 1.50015 0 0 0 9.4257812 10.330078 C 7.3532865 12.539588 5.7626807 15.215064 4.859375 18.201172 A 1.50015 1.50015 0 0 0 5.4082031 19.845703 L 7.7734375 21.580078 C 8.5457929 22.147918 9 23.042801 9 24 C 9 24.95771 8.5458041 25.853342 7.7734375 26.419922 L 5.4082031 28.152344 A 1.50015 1.50015 0 0 0 4.859375 29.796875 C 5.7625845 32.782665 7.3519262 35.460112 9.4257812 37.669922 A 1.50015 1.50015 0 0 0 11.125 38.015625 L 13.791016 36.841797 C 14.667094 36.456509 15.672169 36.511947 16.5 36.990234 C 17.328913 37.469147 17.878304 38.310641 17.982422 39.261719 L 18.300781 42.164062 A 1.50015 1.50015 0 0 0 19.449219 43.460938 C 20.901371 43.799844 22.423103 44 24 44 C 25.576897 44 27.097336 43.800572 28.548828 43.462891 A 1.50015 1.50015 0 0 0 29.699219 42.164062 L 30.017578 39.261719 C 30.121696 38.310641 30.671087 37.469147 31.5 36.990234 C 32.327261 36.512276 33.33138 36.45738 34.207031 36.841797 L 36.875 38.015625 A 1.50015 1.50015 0 0 0 38.574219 37.669922 C 40.646713 35.460412 42.237319 32.782983 43.140625 29.796875 A 1.50015 1.50015 0 0 0 42.591797 28.152344 L 40.226562 26.419922 C 39.454197 25.853342 39 24.95771 39 24 C 39 23.04229 39.454197 22.146658 40.226562 21.580078 L 42.591797 19.847656 A 1.50015 1.50015 0 0 0 43.140625 18.203125 C 42.237319 15.217017 40.646713 12.539588 38.574219 10.330078 A 1.50015 1.50015 0 0 0 36.875 9.984375 L 34.207031 11.158203 C 33.33138 11.54262 32.327261 11.487724 31.5 11.009766 C 30.671087 10.530853 30.121696 9.6893592 30.017578 8.7382812 L 29.699219 5.8359375 A 1.50015 1.50015 0 0 0 28.550781 4.5390625 C 27.098629 4.2001555 25.576897 4 24 4 z M 24 7 C 24.974302 7 25.90992 7.1748796 26.847656 7.3398438 L 27.035156 9.0644531 C 27.243038 10.963375 28.346913 12.652335 30 13.607422 C 31.654169 14.563134 33.668094 14.673009 35.416016 13.904297 L 37.001953 13.207031 C 38.219788 14.669402 39.183985 16.321182 39.857422 18.130859 L 38.451172 19.162109 C 36.911538 20.291529 36 22.08971 36 24 C 36 25.91029 36.911538 27.708471 38.451172 28.837891 L 39.857422 29.869141 C 39.183985 31.678818 38.219788 33.330598 37.001953 34.792969 L 35.416016 34.095703 C 33.668094 33.326991 31.654169 33.436866 30 34.392578 C 28.346913 35.347665 27.243038 37.036625 27.035156 38.935547 L 26.847656 40.660156 C 25.910002 40.82466 24.973817 41 24 41 C 23.025698 41 22.09008 40.82512 21.152344 40.660156 L 20.964844 38.935547 C 20.756962 37.036625 19.653087 35.347665 18 34.392578 C 16.345831 33.436866 14.331906 33.326991 12.583984 34.095703 L 10.998047 34.792969 C 9.7799772 33.330806 8.8159425 31.678964 8.1425781 29.869141 L 9.5488281 28.837891 C 11.088462 27.708471 12 25.91029 12 24 C 12 22.08971 11.087719 20.290363 9.5488281 19.160156 L 8.1425781 18.128906 C 8.8163325 16.318532 9.7814501 14.667839 11 13.205078 L 12.583984 13.902344 C 14.331906 14.671056 16.345831 14.563134 18 13.607422 C 19.653087 12.652335 20.756962 10.963375 20.964844 9.0644531 L 21.152344 7.3398438 C 22.089998 7.1753403 23.026183 7 24 7 z M 24 16 C 19.599487 16 16 19.59949 16 24 C 16 28.40051 19.599487 32 24 32 C 28.400513 32 32 28.40051 32 24 C 32 19.59949 28.400513 16 24 16 z M 24 19 C 26.779194 19 29 21.220808 29 24 C 29 26.779192 26.779194 29 24 29 C 21.220806 29 19 26.779192 19 24 C 19 21.220808 21.220806 19 24 19 z"/></svg>
        </div>
    </div>
<div class="remind">
<center>
    <br><br>
    <text>You haven't set any reminder.</text><br>
    <button>Add</button>
</center>
</div>

</div>
<br>

<div class="reminder" style="opacity: 0;">
    <div class="header">
        <img src="./reminder.png" alt="">
        <text>Reminders</text>

        <div class="function-icons">
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 45.402 45.402"xml:space="preserve"><g><path d="M41.267,18.557H26.832V4.134C26.832,1.851,24.99,0,22.707,0c-2.283,0-4.124,1.851-4.124,4.135v14.432H4.141c-2.283,0-4.139,1.851-4.138,4.135c-0.001,1.141,0.46,2.187,1.207,2.934c0.748,0.749,1.78,1.222,2.92,1.222h14.453V41.27c0,1.142,0.453,2.176,1.201,2.922c0.748,0.748,1.777,1.211,2.919,1.211c2.282,0,4.129-1.851,4.129-4.133V26.857h14.435c2.283,0,4.134-1.867,4.133-4.15C45.399,20.425,43.548,18.557,41.267,18.557z"/></g></svg>
            <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48"><path d="M 24 4 C 22.423103 4 20.902664 4.1994284 19.451172 4.5371094 A 1.50015 1.50015 0 0 0 18.300781 5.8359375 L 17.982422 8.7382812 C 17.878304 9.6893592 17.328913 10.530853 16.5 11.009766 C 15.672739 11.487724 14.66862 11.540667 13.792969 11.15625 L 13.791016 11.15625 L 11.125 9.9824219 A 1.50015 1.50015 0 0 0 9.4257812 10.330078 C 7.3532865 12.539588 5.7626807 15.215064 4.859375 18.201172 A 1.50015 1.50015 0 0 0 5.4082031 19.845703 L 7.7734375 21.580078 C 8.5457929 22.147918 9 23.042801 9 24 C 9 24.95771 8.5458041 25.853342 7.7734375 26.419922 L 5.4082031 28.152344 A 1.50015 1.50015 0 0 0 4.859375 29.796875 C 5.7625845 32.782665 7.3519262 35.460112 9.4257812 37.669922 A 1.50015 1.50015 0 0 0 11.125 38.015625 L 13.791016 36.841797 C 14.667094 36.456509 15.672169 36.511947 16.5 36.990234 C 17.328913 37.469147 17.878304 38.310641 17.982422 39.261719 L 18.300781 42.164062 A 1.50015 1.50015 0 0 0 19.449219 43.460938 C 20.901371 43.799844 22.423103 44 24 44 C 25.576897 44 27.097336 43.800572 28.548828 43.462891 A 1.50015 1.50015 0 0 0 29.699219 42.164062 L 30.017578 39.261719 C 30.121696 38.310641 30.671087 37.469147 31.5 36.990234 C 32.327261 36.512276 33.33138 36.45738 34.207031 36.841797 L 36.875 38.015625 A 1.50015 1.50015 0 0 0 38.574219 37.669922 C 40.646713 35.460412 42.237319 32.782983 43.140625 29.796875 A 1.50015 1.50015 0 0 0 42.591797 28.152344 L 40.226562 26.419922 C 39.454197 25.853342 39 24.95771 39 24 C 39 23.04229 39.454197 22.146658 40.226562 21.580078 L 42.591797 19.847656 A 1.50015 1.50015 0 0 0 43.140625 18.203125 C 42.237319 15.217017 40.646713 12.539588 38.574219 10.330078 A 1.50015 1.50015 0 0 0 36.875 9.984375 L 34.207031 11.158203 C 33.33138 11.54262 32.327261 11.487724 31.5 11.009766 C 30.671087 10.530853 30.121696 9.6893592 30.017578 8.7382812 L 29.699219 5.8359375 A 1.50015 1.50015 0 0 0 28.550781 4.5390625 C 27.098629 4.2001555 25.576897 4 24 4 z M 24 7 C 24.974302 7 25.90992 7.1748796 26.847656 7.3398438 L 27.035156 9.0644531 C 27.243038 10.963375 28.346913 12.652335 30 13.607422 C 31.654169 14.563134 33.668094 14.673009 35.416016 13.904297 L 37.001953 13.207031 C 38.219788 14.669402 39.183985 16.321182 39.857422 18.130859 L 38.451172 19.162109 C 36.911538 20.291529 36 22.08971 36 24 C 36 25.91029 36.911538 27.708471 38.451172 28.837891 L 39.857422 29.869141 C 39.183985 31.678818 38.219788 33.330598 37.001953 34.792969 L 35.416016 34.095703 C 33.668094 33.326991 31.654169 33.436866 30 34.392578 C 28.346913 35.347665 27.243038 37.036625 27.035156 38.935547 L 26.847656 40.660156 C 25.910002 40.82466 24.973817 41 24 41 C 23.025698 41 22.09008 40.82512 21.152344 40.660156 L 20.964844 38.935547 C 20.756962 37.036625 19.653087 35.347665 18 34.392578 C 16.345831 33.436866 14.331906 33.326991 12.583984 34.095703 L 10.998047 34.792969 C 9.7799772 33.330806 8.8159425 31.678964 8.1425781 29.869141 L 9.5488281 28.837891 C 11.088462 27.708471 12 25.91029 12 24 C 12 22.08971 11.087719 20.290363 9.5488281 19.160156 L 8.1425781 18.128906 C 8.8163325 16.318532 9.7814501 14.667839 11 13.205078 L 12.583984 13.902344 C 14.331906 14.671056 16.345831 14.563134 18 13.607422 C 19.653087 12.652335 20.756962 10.963375 20.964844 9.0644531 L 21.152344 7.3398438 C 22.089998 7.1753403 23.026183 7 24 7 z M 24 16 C 19.599487 16 16 19.59949 16 24 C 16 28.40051 19.599487 32 24 32 C 28.400513 32 32 28.40051 32 24 C 32 19.59949 28.400513 16 24 16 z M 24 19 C 26.779194 19 29 21.220808 29 24 C 29 26.779192 26.779194 29 24 29 C 21.220806 29 19 26.779192 19 24 C 19 21.220808 21.220806 19 24 19 z"/></svg>
        </div>
    </div>
<div class="remind">
    eeeeeeeeeeeeeeeeeeeeeeeeeeeeeee
</div>

</div><br><br><br><br><br>
</div>


<nav>
    <button>
        <svg class="line" style="fill: none" viewBox="0 0 24 24"><g transform="translate(2.400000, 2.000000)"><line class="svgC" x1="6.6787" x2="12.4937" y1="14.1354" y2="14.1354"></line><path d="M1.24344979e-14,11.713 C1.24344979e-14,6.082 0.614,6.475 3.919,3.41 C5.365,2.246 7.615,0 9.558,0 C11.5,0 13.795,2.235 15.254,3.41 C18.559,6.475 19.172,6.082 19.172,11.713 C19.172,20 17.213,20 9.586,20 C1.959,20 1.24344979e-14,20 1.24344979e-14,11.713 Z"></path></g></svg>
    </button>

    <button>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
    </button>

    <button class="mid-navigate" id="" onclick="travis()">

    <script>
        function travis() {
            var trav = document.getElementById("travel");
            var trave = document.getElementById("travel-now");

            setTimeout(sinm, 300);
       
      
    
        }
        
        function sinm() {
            var trav = document.getElementById("travel");
            var trave = document.getElementById("travel-now");

                trav.style.visibility = 'visible';
                trav.style.opacity = '1';

                setTimeout(sim, 700);
            
    
            }
                        function sim() {
                            var trav = document.getElementById("travel");
            var trave = document.getElementById("travel-now");

                trave.style.visibility = 'visible';
                trave.style.opacity = '1';
                trave.style.marginTop = 'unset';
            }


    </script>
<img src="maskable_icon.png" alt="">
    </button>

    <button>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
    </button>

    <button>
    <svg viewBox="0 0 20 20" class="c012133" style="stroke-width: 1;"><path d="M4.5 17A1.5 1.5 0 013 15.64V4.5c0-.78.6-1.42 1.36-1.5H9c.78 0 1.42.6 1.5 1.36v.39l2.19-2.26a1.5 1.5 0 012-.14l.12.1 2.76 2.72c.55.55.6 1.42.11 2.01l-.1.12-2.31 2.2h.23c.78 0 1.42.6 1.5 1.36v4.64c0 .78-.6 1.42-1.36 1.5H4.5zm5-6.5H4v5c0 .21.14.4.33.47l.08.02.09.01h5v-5.5zm6 0h-5V16h5a.5.5 0 00.5-.41V11a.5.5 0 00-.41-.5h-.09zm-5-2.8v1.8h1.79L10.5 7.7zM9 4H4.5a.5.5 0 00-.5.41V9.5h5.5v-5a.5.5 0 00-.33-.47l-.08-.02L9 4zm5.12-.83a.5.5 0 00-.64-.05l-.07.06-2.62 2.71a.5.5 0 00-.05.63l.06.07 2.61 2.62c.17.17.43.2.62.07l.08-.06 2.76-2.63a.5.5 0 00.05-.64l-.05-.07-2.75-2.7z" fill-rule="nonzero"></path></svg>    </button>
</nav>


<div class="config" id="config">
<div class="close off" id="close" onclick="config()">
    <text>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" id="XS-max"><rect fill="none"></rect><line x1="200" x2="56" y1="56" y2="200" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="40"></line><line x1="200" x2="56" y1="200" y2="56" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="40"></line></svg>
    </text>
</div>

<div class="profile-container">
<img src="user.png" width="70" alt="">
    <div class="edit">
    <svg viewBox="0 0 20 20" class="c013434"><path d="M11.5 8H16v-.59a1.5 1.5 0 00-.06-.4V7a1.5 1.5 0 00-.38-.65l-3.91-3.91A1.5 1.5 0 0010.59 2H6a2 2 0 00-2 2v12c0 1.1.9 2 2 2h2.22l-.01-.03A1.86 1.86 0 018 17H6a1 1 0 01-1-1V4a1 1 0 011-1h4v3.5c0 .83.67 1.5 1.5 1.5zm0-1a.5.5 0 01-.5-.5V3.2L14.8 7h-3.3z"></path><path d="M14.8 9.55a1.87 1.87 0 112.65 2.64l-4.83 4.83a2.2 2.2 0 01-1.02.58l-1.5.37a.89.89 0 01-1.07-1.07l.37-1.5c.1-.39.3-.74.58-1.02l4.83-4.83z"></path></svg>
    </div>

</div>
<div class="prz0">
<center>
<text>
<?= htmlspecialchars($_SESSION["username"]); ?>
</text><br><div class="account-select">

<div class="pin">

</div>
<a>********@gmail.com</a>

<svg viewBox="0 0 20 20" class="select_toggle" aria-hidden="true"><path d="M15.85 7.65c.2.2.2.5 0 .7l-5.46 5.49a.55.55 0 01-.78 0L4.15 8.35a.5.5 0 01.7-.7L10 12.8l5.15-5.16c.2-.2.5-.2.7 0z" class="c018082"></path></svg>
</div>

<div class="function-btn">
<button>
<svg viewBox="0 0 20 20" class="c012771 "><path d="M15 6a1 1 0 11-2 0 1 1 0 012 0z"></path><path d="M12.5 2a5.45 5.45 0 00-5.38 6.67c.06.27 0 .5-.14.64l-4.54 4.54A1.5 1.5 0 002 14.91v1.59c0 .83.67 1.5 1.5 1.5h2c.83 0 1.5-.67 1.5-1.5V16h1a1 1 0 001-1v-1h1a1 1 0 001-1v-.18c.5.13 1 .18 1.5.18 3.08 0 5.5-2.42 5.5-5.5S15.58 2 12.5 2zM8 7.5C8 4.98 9.98 3 12.5 3S17 4.98 17 7.5 15.02 12 12.5 12c-.66 0-1.27-.1-1.78-.35a.5.5 0 00-.72.45v.9H9a1 1 0 00-1 1v1H7a1 1 0 00-1 1v.5a.5.5 0 01-.5.5h-2a.5.5 0 01-.5-.5v-1.59a.5.5 0 01.15-.35l4.54-4.54c.43-.43.52-1.04.4-1.56-.06-.3-.09-.63-.09-.96z"></path></svg>
</button>
<button>
<svg viewBox="0 0 20 20" class="c017488 "><path d="M13.5 13a.5.5 0 000 1h2a.5.5 0 000-1h-2z"></path><path d="M2 6.5A2.5 2.5 0 014.5 4h11A2.5 2.5 0 0118 6.5v7a2.5 2.5 0 01-2.5 2.5h-11A2.5 2.5 0 012 13.5v-7zm1 7c0 .83.67 1.5 1.5 1.5h11c.83 0 1.5-.67 1.5-1.5V9H3v4.5zm14-7c0-.83-.67-1.5-1.5-1.5h-11C3.67 5 3 5.67 3 6.5V8h14V6.5z"></path></svg>
</button>
<button>
<svg viewBox="0 0 24 24" class="c012771 "><defs></defs><path d="M11 15c0-.35.06-.687.17-1H4.253a2.249 2.249 0 00-2.249 2.249v.578c0 .892.319 1.756.899 2.435 1.566 1.834 3.952 2.74 7.098 2.74.397 0 .783-.015 1.156-.044A2.998 2.998 0 0111 21v-.535c-.321.024-.655.036-1 .036-2.738 0-4.704-.746-5.958-2.213a2.25 2.25 0 01-.539-1.462v-.577c0-.414.336-.75.75-.75H11V15zM10 2.005a5 5 0 110 10 5 5 0 010-10zm0 1.5a3.5 3.5 0 100 7 3.5 3.5 0 000-7zM12 15a2 2 0 012-2h7a2 2 0 012 2v6a2 2 0 01-2 2h-7a2 2 0 01-2-2v-6zm2.5 1a.5.5 0 000 1h6a.5.5 0 000-1h-6zm0 3a.5.5 0 000 1h6a.5.5 0 000-1h-6z"></path></svg>
</button>
</div>

<div class="additional">

</div>

<div class="additional">
    
</div>

<div class="additional">
    
</div>

<a href="logout.php" class="loged-out">
<div class="btn-primary logout-btn">
    Log out
</div>
</a>
<br>
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



<div class="travel" id="travel">
    <div class="travel-now" id="travel-now">
        <div class="live-content">
        <div class="close closeoff" id="close" onclick="travisDown()">

            <script>
                   function travisDown() {
            var trav = document.getElementById("travel");
            var trave = document.getElementById("travel-now");

            setTimeout(sin, 300);
       
      
    
        }
        
        function simn() {
            var trav = document.getElementById("travel");
            var trave = document.getElementById("travel-now");

                trav.style.visibility = 'hidden';
                trav.style.opacity = '0';

                
            
    
            }
                        function sin() {
                            var trav = document.getElementById("travel");
            var trave = document.getElementById("travel-now");

                trave.style.visibility = 'hidden';
                trave.style.opacity = '.8';
                trave.style.marginTop = '75em';
                
                setTimeout(simn, 700);
            }
            </script>

    <text>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" id="x"><rect fill="none"></rect><line x1="200" x2="56" y1="56" y2="200" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="40"></line><line x1="200" x2="56" y1="200" y2="56" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="40"></line></svg>
    </text>
</div>
           <br><br><br>
  <center>         
    <text>Flights</text>


</center>

<br><br>
<div class="book-card">
 <div class="card">
    <div class="first">
        <div class="pick from">
            <section>
            <svg fill="grey" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12 16.5a4.5 4.5 0 100-9 4.5 4.5 0 000 9zm0 1.5a6 6 0 100-12 6 6 0 000 12z"/></svg>
            </section>
            <section>
                <input type="text" placeholder="From where?">
            </section>
        </div>
        <div class="pick slice">
        <svg fill="white" width="25px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 492.001 492.001" xml:space="preserve"><g><g><path d="M487.971,235.993l-85.468-85.464c-5.22-5.228-14.396-5.228-19.616,0l-7.452,7.448c-5.4,5.408-5.4,14.548,0.004,19.956l48.456,48.792H67.911l48.696-49.02c5.408-5.412,5.408-14.384,0-19.796l-7.444-7.524c-5.232-5.232-14.404-5.272-19.624-0.044L4.035,235.813c-2.672,2.676-4.1,6.24-4.032,9.916c-0.072,3.82,1.36,7.396,4.032,10.068l85.464,85.464c5.228,5.232,14.396,5.228,19.62,0l7.444-7.448c5.416-5.416,5.416-13.784,0-19.192l-49.856-49.436h358.792l-50.096,49.668c-2.612,2.604-4.052,5.884-4.052,9.592s1.436,7.088,4.052,9.7l7.444,7.396c2.616,2.612,6.1,4.02,9.812,4.02c3.716,0,7.196-1.448,9.812-4.06l85.5-85.508c2.664-2.668,4.096-6.248,4.028-9.924C492.075,242.245,490.639,238.665,487.971,235.993z"/></g></g></svg>
        </div>
        <div class="pick where">
        <section>
        <svg viewBox="0 0 24 24" fill="grey" xmlns="http://www.w3.org/2000/svg">
<path d="M12.8159 20.6077C16.8509 18.5502 20 15.1429 20 11C20 6.58172 16.4183 3 12 3C7.58172 3 4 6.58172 4 11C4 15.1429 7.14909 18.5502 11.1841 20.6077C11.6968 20.8691 12.3032 20.8691 12.8159 20.6077Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M15 11C15 12.6569 13.6569 14 12 14C10.3431 14 9 12.6569 9 11C9 9.34315 10.3431 8 12 8C13.6569 8 15 9.34315 15 11Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>          </section>
            <section>
                <input type="text" placeholder="To where?">
            </section>
        </div>
    </div>
 </div>
 <div class="card">
 <div class="first">
        <div class="pick from">
            <section>
            <svg stroke="grey" stroke-width="1.5" style="scale: .9" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
            </section>
            <section>
                <input type="text" placeholder="Departure"><div class="hv"></div>
            </section>
        </div>
        <div class="pick where">
            <section>
                <input type="text" placeholder="Return">
            </section>
        </div>
    </div>
 </div>
</div><br><br>
<center>
    <small>Book a flight with</small>
    <br>
        <section class="book-now">
        <div class="google-flight">
            <img src="ggleflight.png" alt="">
        </div>

        <div class="expedia">
            <img src="ex.png" alt="">
        </div>

        <div class="expedia" onclick="linkWin()">
        <script>
            function linkWin() {
                var window = document.getElementById("link-window");
                var t2 = document.getElementById("t2");

                t2.src = 'https://www.wakanow.com/en-ng/flight';

                window.style.bottom = '2em';
                window.style.visibility = 'visible';
                window.style.opacity = '1';
            }



            function refresh() {
                var t2 = document.getElementById("t2");

t2.src = 'https://www.wakanow.com/en-ng/flight';
            }
        </script>
            <img src="wakanow.png" alt="">
        </div>
</section>
<br>
<section style="margin-top: .5em">
<small>Powerd by <text style="color: #0066ff;font-size: 15px;">Routify</text></small>
</section>
</center>
        </div>
        
    </div>



    <div class="link-window" id="link-window">
        <section>
            <div>
                <input type="button" value="Done" onclick="WindowDown()">
                <script>
                                function WindowDown() {
                var window = document.getElementById("link-window");
                var t2 = document.getElementById("t2");

                window.style.bottom = '-40em';
                window.style.visibility = 'hidden';
                window.style.opacity = '.99';
            }
                </script>
            </div>
            <div>
                <div class="url">
                    <text> <small>wakanow.com</small> </text>
                </div>
            </div>
            <div>
            <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="red">
  <path fill="#008cff" stroke="none" fill-rule="evenodd" d="M19 2a1 1 0 00-1-1h-6a1 1 0 100 2h3.586l-3.793 3.793a1 1 0 001.414 1.414L17 4.414V8a1 1 0 102 0V2zM1 18a1 1 0 001 1h6a1 1 0 100-2H4.414l3.793-3.793a1 1 0 10-1.414-1.414L3 15.586V12a1 1 0 10-2 0v6z"/>
</svg>

            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" onclick="refresh()">
<path d="M3 3V8M3 8H8M3 8L6 5.29168C7.59227 3.86656 9.69494 3 12 3C16.9706 3 21 7.02944 21 12C21 16.9706 16.9706 21 12 21C7.71683 21 4.13247 18.008 3.22302 14" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
            </div>
        </section>
        <iframe class="t2" id="t2" src="" frameborder="0"></iframe>
        <section>

        </section>
    </div>
</div>


<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7161629677556667"
    crossorigin="anonymous">

</script>


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

    function configure() {
        document.getElementById("config").className = 'configure';
    }

    function config() {
        document.getElementById("config").className = 'config';
    }

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


        document.getElementById("dfr").style.dislay = 'block';
        document.getElementById("dfr").style.visibility = 'visible';

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

    document.getElementById("dfr").style.dislay = 'block';
        document.getElementById("dfr").style.visibility = 'visible';

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
  window.location.reload();<![CDATA[ <-- For SVG support if ('WebSocket' in window) { (function () { function refreshCSS() { var sheets = [].slice.call(document.getElementsByTagName("link")); var head = document.getElementsByTagName("head")[0]; for (var i = 0; i < sheets.length; ++i) { var elem = sheets[i]; var parent = elem.parentElement || head; parent.removeChild(elem); var rel = elem.rel; if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") { var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, ''); elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf()); } parent.appendChild(elem); } } var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://'; var address = protocol + window.location.host + window.location.pathname + '/ws'; var socket = new WebSocket(address); socket.onmessage = function (msg) { if (msg.data == 'reload') window.location.reload(); else if (msg.data == 'refreshcss') refreshCSS(); }; if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) { console.log('Live reload enabled.'); sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true); } })(); } else { console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.'); } // ]]>
  window.stop();
},100)*/



</script>

</body>
</html>
