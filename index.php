<?php
# Initialize the session
session_start();

# If user is not logged in then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== TRUE) {
  echo "<script>" . "window.location.href='./login.php';" . "</script>";
  exit;
}
?>

<?php
/**
 * Optional convenience class. Objects extending the
 * StateHandler class can register with a StateArchivist
 * instance; then calling remember() or restore() on the 
 * archivist will be propagated to all registered objects.
 */
class StateArchivist {

  /**
   * The array of objects
   * @var array
   */
  private $objects = [];

  /**
   * Register an object that extends the StateHandler 
   * class and initially have it remember its state 
   * (unless specified otherwise).
   * @param  StateHandler  $object
   * @param  boolean       $remember
   */
  public function register(
    StateHandler $object, 
    $remember = true
  ) {

    if ($remember) {
      $object->remember(); 
    }

    $this->objects[] = $object;
  }

  /**
   * Call the remember() function on
   * all registered objects
   */
  public function remember() {

    foreach ($this->objects as $object) {
      $object->remember();
    }
  }

  /**
   * Call the restore function on all objects
   */
  public function restore() {

    foreach ($this->objects as $object) {
      $object->restore();
    }
  }
}
?>
<?php
/**
 * Objects extending this class can remember
 * and later restore their state
 */
class StateHandler {

  /**
   * The array of states
   * @var array
   */
  private $states = [];

  /**
   * Optionally takes an instance of a StateArchivist
   * as parameter where it immediately registers itself
   * @param StateArchivist|null $archivist
   */
  public function __construct(StateArchivist $archivist = null) {

    if ($archivist) {
      $archivist->register($this);
    }
  }

  /**
   * Store the current state
   */
  public function remember() {
    $state = get_object_vars($this);

    unset($state['states']);
    $this->states[] = $state;
  }

  /**
   * Restore the last state
   */
  public function restore() {
    $state = array_pop($this->states);

    if (!$state) return;

    foreach ($state as $key => $value) {
      $this->$key = $value;
    }
  }  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="manifest" href="save.json">
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

            (function(console){

console.save = function(data, filename){

    if(!data) {
        console.error('Console.save: No data')
        return;
    }

    if(!filename) filename = 'console.json'

    if(typeof data === "object"){
        data = JSON.stringify(data, undefined, 4)
    }

    var blob = new Blob([data], {type: 'text/json'}),
        e    = document.createEvent('MouseEvents'),
        a    = document.createElement('a')

    a.download = filename
    a.href = window.URL.createObjectURL(blob)
    a.dataset.downloadurl =  ['text/json', a.download, a.href].join(':')
    e.initMouseEvent('click', true, false, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null)
    a.dispatchEvent(e)
 }
})(console);

console.save(JSON.stringify(lunr_index.toJSON()), '_indexed.json');
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

<small>
    <div class="day" id="day">
    
    </div>
</small>

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


<nav class="nav">
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
           <br><br>
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
                <input type="text" id="inp2" placeholder="To where?">
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
</div>
<center><br>
<div class="btn-optional" id="w2s">Next</div>

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
<small>Powerd by <text style="color: #0066ff;font-size: 15px;cursor: pointer">Routify</text></small>
</section>
</center>
        </div>
        
    </div>

    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
   <script src="map.js"></script>
   <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
   <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
   <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
   <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
   



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
<div class="map" id="mapx">
<div class="cover-body" id="cover-body">

<div id="chartdiv"></div>
<script>

am5.ready(function() {
 
 // Create root element
 // https://www.amcharts.com/docs/v5/getting-started/#Root_element
 var root = am5.Root.new("chartdiv");
 
 // Set themes
 // https://www.amcharts.com/docs/v5/concepts/themes/
 root.setThemes([
   am5themes_Animated.new(root)
 ]);
 
 
 // Create the map chart
 // https://www.amcharts.com/docs/v5/charts/map-chart/
 var chart = root.container.children.push(am5map.MapChart.new(root, {
   panX: "rotateX",
   panY: "translateY",
   projection: am5map.geoMercator(),
   homeGeoPoint: { latitude: 2, longitude: 2 }
 }));
 

 
 var cont = chart.children.push(am5.Container.new(root, {
   layout: root.horizontalLayout,
   x: 20,
   y: 40
 }));
 
 // Add labels and controls
 cont.children.push(
  am5.Label.new(root, {
   centerY: am5.p50,
   text: "Map"
 }));

 var switchButton = cont.children.push(am5.Button.new(root, {
   themeTags: ["switch"],
   centerY: am5.p50,
   icon: am5.Circle.new(root, {
     themeTags: ["icon"]
   })
 }));
 
 switchButton.on("active", function() {
   if (!switchButton.get("active")) {
     chart.set("projection", am5map.geoMercator());
     chart.set("panY", "translateY");
     chart.set("rotationY", 0);
     backgroundSeries.mapPolygons.template.set("fillOpacity", 0);
   } else {
     chart.set("projection", am5map.geoOrthographic());
     chart.set("panY", "rotateY")
 
     backgroundSeries.mapPolygons.template.set("fillOpacity", .9);
   }
 });
 
 cont.children.push(
   am5.Label.new(root, {
     centerY: am5.p50,
     text: "Globe"
   })
 );
 
 // Create series for background fill
 // https://www.amcharts.com/docs/v5/charts/map-chart/map-polygon-series/#Background_polygon
 var backgroundSeries = chart.series.push(am5map.MapPolygonSeries.new(root, {}));
 backgroundSeries.mapPolygons.template.setAll({
   fill: root.interfaceColors.get("alternativeBackground"),
   fillOpacity: 0,
   strokeOpacity: 0
 });
 
 // Add background polygon
 // https://www.amcharts.com/docs/v5/charts/map-chart/map-polygon-series/#Background_polygon
 backgroundSeries.data.push({
   geometry: am5map.getGeoRectangle(90, 180, -90, -180)
 });

 var polygonSeries = chart.series.push(am5map.MapPolygonSeries.new(root, {
  geoJSON: am5geodata_worldLow,
  exclude: ["AQ"]
}));

polygonSeries.mapPolygons.template.setAll({
  tooltipText: "{name}",
  toggleKey: "active",
  interactive: true
});

polygonSeries.mapPolygons.template.states.create("hover", {
  fill: root.interfaceColors.get("primaryButtonHover")
});

polygonSeries.mapPolygons.template.states.create("active", {
  fill: root.interfaceColors.get("primaryButtonHover")
});
 
 // Create main polygon series for countries
 // https://www.amcharts.com/docs/v5/charts/map-chart/map-polygon-series/
 var polygonSeries = chart.series.push(am5map.MapPolygonSeries.new(root, {
   geoJSON: am5geodata_worldLow
 }));

 var polygonSeries = chart.series.push(
am5map.MapPolygonSeries.new(root, {
  geoJSON: am5geodata_worldLow
})
);

polygonSeries.mapPolygons.template.setAll({
tooltipText: "{name}",
fillOpacity: 0.8
});

var colorSet = am5.ColorSet.new(root, {});

var i = 0;
polygonSeries.mapPolygons.template.adapters.add("fill", function (fill, target) {
if (i < 10) {
  i++;
}
else {
  i = 0;
}
var dataContext = target.dataItem.dataContext;
if (!dataContext.colorWasSet) {
  dataContext.colorWasSet = true;
  var color = am5.Color.saturate(colorSet.getIndex(i), 0.3);
  target.setRaw("fill", color);
  return color;
}
else {
  return fill;
}
})

polygonSeries.mapPolygons.template.states.create("hover", { fillOpacity: 1 });

var graticuleSeries = chart.series.push(am5map.GraticuleSeries.new(root, {}));
graticuleSeries.mapLines.template.setAll({
stroke: root.interfaceColors.get("alternativeBackground"),
strokeOpacity: 0
});



 var polygonSeries = chart.series.push(am5map.MapPolygonSeries.new(root, {
      geoJSON: am5geodata_worldLow
  }));

  polygonSeries.mapPolygons.template.setAll({
      tooltipText: "{name}",
      toggleKey: "active",
      interactive: true
  });

  polygonSeries.mapPolygons.template.states.create("hover", {
      fill: root.interfaceColors.get("primaryButtonHover")
  });


  
 

 
 // Create line series for trajectory lines
 // https://www.amcharts.com/docs/v5/charts/map-chart/map-line-series/
 var lineSeries = chart.series.push(am5map.MapLineSeries.new(root, {}));
 lineSeries.mapLines.template.setAll({
   stroke: am5.color(0x003391),
   strokeOpacity: 1,
   strokeWidth: 4
 });
 
 // Create point series for markers
 // https://www.amcharts.com/docs/v5/charts/map-chart/map-point-series/
 var pointSeries = chart.series.push(am5map.MapPointSeries.new(root, {}));
 
 pointSeries.bullets.push(function() {
   var circle = am5.Circle.new(root, {
     radius: 10,
     tooltipText: "Drag to edit",
     cursorOverStyle: "pointer",
     tooltipY: 0,
     fill: am5.color(0xff0000),
     stroke: root.interfaceColors.get("background"),
     strokeWidth: 3,
     draggable: true
   });

   var pointSeries = chart.series.push(am5map.MapPointSeries.new(root, {}));

pointSeries.bullets.push(function () {
var circle = am5.Circle.new(root, {
  radius: 4,
  tooltipY: 0,
  cursorOverStyle: "pointer",
  fill: am5.color(0xffba00),
  stroke: root.interfaceColors.get("background"),
  strokeWidth: 1.5,
  tooltipText: "{title}"
});

return am5.Bullet.new(root, {
  sprite: circle
});
});

var cities = [
{
  title: "Vienna",
  latitude: 48.2092,
  longitude: 16.3728
},
{
  title: "Minsk",
  latitude: 53.9678,
  longitude: 27.5766
},
{
  title: "Brussels",
  latitude: 50.8371,
  longitude: 4.3676
},
{
  title: "Sarajevo",
  latitude: 43.8608,
  longitude: 18.4214
},
{
  title: "Sofia",
  latitude: 42.7105,
  longitude: 23.3238
},
{
  title: "Zagreb",
  latitude: 45.815,
  longitude: 15.9785
},
{
  title: "Pristina",
  latitude: 42.666667,
  longitude: 21.166667
},
{
  title: "Prague",
  latitude: 50.0878,
  longitude: 14.4205
},
{
  title: "Copenhagen",
  latitude: 55.6763,
  longitude: 12.5681
},
{
  title: "Tallinn",
  latitude: 59.4389,
  longitude: 24.7545
},
{
  title: "Helsinki",
  latitude: 60.1699,
  longitude: 24.9384
},
{
  title: "Paris",
  latitude: 48.8567,
  longitude: 2.351
},
{
  title: "Berlin",
  latitude: 52.5235,
  longitude: 13.4115
},
{
  title: "Athens",
  latitude: 37.9792,
  longitude: 23.7166
},
{
  title: "Budapest",
  latitude: 47.4984,
  longitude: 19.0408
},
{
  title: "Reykjavik",
  latitude: 64.1353,
  longitude: -21.8952
},
{
  title: "Dublin",
  latitude: 53.3441,
  longitude: -6.2675
},
{
  title: "Rome",
  latitude: 41.8955,
  longitude: 12.4823
},
{
  title: "Riga",
  latitude: 56.9465,
  longitude: 24.1049
},
{
  title: "Vaduz",
  latitude: 47.1411,
  longitude: 9.5215
},
{
  title: "Vilnius",
  latitude: 54.6896,
  longitude: 25.2799
},
{
  title: "Luxembourg",
  latitude: 49.61,
  longitude: 6.1296
},
{
  title: "Skopje",
  latitude: 42.0024,
  longitude: 21.4361
},
{
  title: "Valletta",
  latitude: 35.9042,
  longitude: 14.5189
},
{
  title: "Chisinau",
  latitude: 47.0167,
  longitude: 28.8497
},
{
  title: "Monaco",
  latitude: 43.7325,
  longitude: 7.4189
},
{
  title: "Podgorica",
  latitude: 42.4602,
  longitude: 19.2595
},
{
  title: "Amsterdam",
  latitude: 52.3738,
  longitude: 4.891
},
{
  title: "Oslo",
  latitude: 59.9138,
  longitude: 10.7387
},
{
  title: "Warsaw",
  latitude: 52.2297,
  longitude: 21.0122
},
{
  title: "Lisbon",
  latitude: 38.7072,
  longitude: -9.1355
},
{
  title: "Bucharest",
  latitude: 44.4479,
  longitude: 26.0979
},
{
  title: "Moscow",
  latitude: 55.7558,
  longitude: 37.6176
},
{
  title: "San Marino",
  latitude: 43.9424,
  longitude: 12.4578
},
{
  title: "Belgrade",
  latitude: 44.8048,
  longitude: 20.4781
},
{
  title: "Bratislava",
  latitude: 48.2116,
  longitude: 17.1547
},
{
  title: "Ljubljana",
  latitude: 46.0514,
  longitude: 14.506
},
{
  title: "Madrid",
  latitude: 40.4167,
  longitude: -3.7033
},
{
  title: "Stockholm",
  latitude: 59.3328,
  longitude: 18.0645
},
{
  title: "Bern",
  latitude: 46.948,
  longitude: 7.4481
},
{
  title: "Kiev",
  latitude: 50.4422,
  longitude: 30.5367
},
{
  title: "London",
  latitude: 51.5002,
  longitude: -0.1262
},
{
  title: "Gibraltar",
  latitude: 36.1377,
  longitude: -5.3453
},
{
  title: "Saint Peter Port",
  latitude: 49.466,
  longitude: -2.5522
},
{
  title: "Douglas",
  latitude: 54.167,
  longitude: -4.4821
},
{
  title: "Saint Helier",
  latitude: 49.1919,
  longitude: -2.1071
},
{
  title: "Longyearbyen",
  latitude: 78.2186,
  longitude: 15.6488
},
{
  title: "Kabul",
  latitude: 34.5155,
  longitude: 69.1952
},
{
  title: "Yerevan",
  latitude: 40.1596,
  longitude: 44.509
},
{
  title: "Baku",
  latitude: 40.3834,
  longitude: 49.8932
},
{
  title: "Manama",
  latitude: 26.1921,
  longitude: 50.5354
},
{
  title: "Dhaka",
  latitude: 23.7106,
  longitude: 90.3978
},
{
  title: "Thimphu",
  latitude: 27.4405,
  longitude: 89.673
},
{
  title: "Bandar Seri Begawan",
  latitude: 4.9431,
  longitude: 114.9425
},
{
  title: "Phnom Penh",
  latitude: 11.5434,
  longitude: 104.8984
},
{
  title: "Peking",
  latitude: 39.9056,
  longitude: 116.3958
},
{
  title: "Nicosia",
  latitude: 35.1676,
  longitude: 33.3736
},
{
  title: "T'bilisi",
  latitude: 41.701,
  longitude: 44.793
},
{
  title: "New Delhi",
  latitude: 28.6353,
  longitude: 77.225
},
{
  title: "Jakarta",
  latitude: -6.1862,
  longitude: 106.8063
},
{
  title: "Teheran",
  latitude: 35.7061,
  longitude: 51.4358
},
{
  title: "Baghdad",
  latitude: 33.3157,
  longitude: 44.3922
},
{
  title: "Jerusalem",
  latitude: 31.76,
  longitude: 35.17
},
{
  title: "Tokyo",
  latitude: 35.6785,
  longitude: 139.6823
},
{
  title: "Amman",
  latitude: 31.9394,
  longitude: 35.9349
},
{
  title: "Astana",
  latitude: 51.1796,
  longitude: 71.4475
},
{
  title: "Kuwait",
  latitude: 29.3721,
  longitude: 47.9824
},
{
  title: "Bishkek",
  latitude: 42.8679,
  longitude: 74.5984
},
{
  title: "Vientiane",
  latitude: 17.9689,
  longitude: 102.6137
},
{
  title: "Beyrouth / Beirut",
  latitude: 33.8872,
  longitude: 35.5134
},
{
  title: "Kuala Lumpur",
  latitude: 3.1502,
  longitude: 101.7077
},
{
  title: "Ulan Bator",
  latitude: 47.9138,
  longitude: 106.922
},
{
  title: "Pyinmana",
  latitude: 19.7378,
  longitude: 96.2083
},
{
  title: "Kathmandu",
  latitude: 27.7058,
  longitude: 85.3157
},
{
  title: "Muscat",
  latitude: 23.6086,
  longitude: 58.5922
},
{
  title: "Islamabad",
  latitude: 33.6751,
  longitude: 73.0946
},
{
  title: "Manila",
  latitude: 14.579,
  longitude: 120.9726
},
{
  title: "Doha",
  latitude: 25.2948,
  longitude: 51.5082
},
{
  title: "Riyadh",
  latitude: 24.6748,
  longitude: 46.6977
},
{
  title: "Singapore",
  latitude: 1.2894,
  longitude: 103.85
},
{
  title: "Seoul",
  latitude: 37.5139,
  longitude: 126.9828
},
{
  title: "Colombo",
  latitude: 6.9155,
  longitude: 79.8572
},
{
  title: "Damascus",
  latitude: 33.5158,
  longitude: 36.2939
},
{
  title: "Taipei",
  latitude: 25.0338,
  longitude: 121.5645
},
{
  title: "Dushanbe",
  latitude: 38.5737,
  longitude: 68.7738
},
{
  title: "Bangkok",
  latitude: 13.7573,
  longitude: 100.502
},
{
  title: "Dili",
  latitude: -8.5662,
  longitude: 125.588
},
{
  title: "Ankara",
  latitude: 39.9439,
  longitude: 32.856
},
{
  title: "Ashgabat",
  latitude: 37.9509,
  longitude: 58.3794
},
{
  title: "Abu Dhabi",
  latitude: 24.4764,
  longitude: 54.3705
},
{
  title: "Tashkent",
  latitude: 41.3193,
  longitude: 69.2481
},
{
  title: "Hanoi",
  latitude: 21.0341,
  longitude: 105.8372
},
{
  title: "Sanaa",
  latitude: 15.3556,
  longitude: 44.2081
},
{
  title: "Buenos Aires",
  latitude: -34.6118,
  longitude: -58.4173
},
{
  title: "Bridgetown",
  latitude: 13.0935,
  longitude: -59.6105
},
{
  title: "Belmopan",
  latitude: 17.2534,
  longitude: -88.7713
},
{
  title: "Sucre",
  latitude: -19.0421,
  longitude: -65.2559
},
{
  title: "Brasilia",
  latitude: -15.7801,
  longitude: -47.9292
},
{
  title: "Ottawa",
  latitude: 45.4235,
  longitude: -75.6979
},
{
  title: "Santiago",
  latitude: -33.4691,
  longitude: -70.642
},
{
  title: "Bogota",
  latitude: 4.6473,
  longitude: -74.0962
},
{
  title: "San Jose",
  latitude: 9.9402,
  longitude: -84.1002
},
{
  title: "Havana",
  latitude: 23.1333,
  longitude: -82.3667
},
{
  title: "Roseau",
  latitude: 15.2976,
  longitude: -61.39
},
{
  title: "Santo Domingo",
  latitude: 18.479,
  longitude: -69.8908
},
{
  title: "Quito",
  latitude: -0.2295,
  longitude: -78.5243
},
{
  title: "San Salvador",
  latitude: 13.7034,
  longitude: -89.2073
},
{
  title: "Guatemala",
  latitude: 14.6248,
  longitude: -90.5328
},
{
  title: "Ciudad de Mexico",
  latitude: 19.4271,
  longitude: -99.1276
},
{
  title: "Managua",
  latitude: 12.1475,
  longitude: -86.2734
},
{
  title: "Panama",
  latitude: 8.9943,
  longitude: -79.5188
},
{
  title: "Asuncion",
  latitude: -25.3005,
  longitude: -57.6362
},
{
  title: "Lima",
  latitude: -12.0931,
  longitude: -77.0465
},
{
  title: "Castries",
  latitude: 13.9972,
  longitude: -60.0018
},
{
  title: "Paramaribo",
  latitude: 5.8232,
  longitude: -55.1679
},
{
  title: "Washington D.C.",
  latitude: 38.8921,
  longitude: -77.0241
},
{
  title: "Montevideo",
  latitude: -34.8941,
  longitude: -56.0675
},
{
  title: "Caracas",
  latitude: 10.4961,
  longitude: -66.8983
},
{
  title: "Oranjestad",
  latitude: 12.5246,
  longitude: -70.0265
},
{
  title: "Cayenne",
  latitude: 4.9346,
  longitude: -52.3303
},
{
  title: "Plymouth",
  latitude: 16.6802,
  longitude: -62.2014
},
{
  title: "San Juan",
  latitude: 18.45,
  longitude: -66.0667
},
{
  title: "Algiers",
  latitude: 36.7755,
  longitude: 3.0597
},
{
  title: "Luanda",
  latitude: -8.8159,
  longitude: 13.2306
},
{
  title: "Porto-Novo",
  latitude: 6.4779,
  longitude: 2.6323
},
{
  title: "Gaborone",
  latitude: -24.657,
  longitude: 25.9089
},
{
  title: "Ouagadougou",
  latitude: 12.3569,
  longitude: -1.5352
},
{
  title: "Bujumbura",
  latitude: -3.3818,
  longitude: 29.3622
},
{
  title: "Yaounde",
  latitude: 3.8612,
  longitude: 11.5217
},
{
  title: "Bangui",
  latitude: 4.3621,
  longitude: 18.5873
},
{
  title: "Brazzaville",
  latitude: -4.2767,
  longitude: 15.2662
},
{
  title: "Kinshasa",
  latitude: -4.3369,
  longitude: 15.3271
},
{
  title: "Yamoussoukro",
  latitude: 6.8067,
  longitude: -5.2728
},
{
  title: "Djibouti",
  latitude: 11.5806,
  longitude: 43.1425
},
{
  title: "Cairo",
  latitude: 30.0571,
  longitude: 31.2272
},
{
  title: "Asmara",
  latitude: 15.3315,
  longitude: 38.9183
},
{
  title: "Addis Abeba",
  latitude: 9.0084,
  longitude: 38.7575
},
{
  title: "Libreville",
  latitude: 0.3858,
  longitude: 9.4496
},
{
  title: "Banjul",
  latitude: 13.4399,
  longitude: -16.6775
},
{
  title: "Accra",
  latitude: 5.5401,
  longitude: -0.2074
},
{
  title: "Conakry",
  latitude: 9.537,
  longitude: -13.6785
},
{
  title: "Bissau",
  latitude: 11.8598,
  longitude: -15.5875
},
{
  title: "Nairobi",
  latitude: -1.2762,
  longitude: 36.7965
},
{
  title: "Maseru",
  latitude: -29.2976,
  longitude: 27.4854
},
{
  title: "Monrovia",
  latitude: 6.3106,
  longitude: -10.8047
},
{
  title: "Tripoli",
  latitude: 32.883,
  longitude: 13.1897
},
{
  title: "Antananarivo",
  latitude: -18.9201,
  longitude: 47.5237
},
{
  title: "Lilongwe",
  latitude: -13.9899,
  longitude: 33.7703
},
{
  title: "Bamako",
  latitude: 12.653,
  longitude: -7.9864
},
{
  title: "Nouakchott",
  latitude: 18.0669,
  longitude: -15.99
},
{
  title: "Port Louis",
  latitude: -20.1654,
  longitude: 57.4896
},
{
  title: "Rabat",
  latitude: 33.9905,
  longitude: -6.8704
},
{
  title: "Maputo",
  latitude: -25.9686,
  longitude: 32.5804
},
{
  title: "Windhoek",
  latitude: -22.5749,
  longitude: 17.0805
},
{
  title: "Niamey",
  latitude: 13.5164,
  longitude: 2.1157
},
{
  title: "Abuja",
  latitude: 9.058,
  longitude: 7.4891
},
{
  title: "Kigali",
  latitude: -1.9441,
  longitude: 30.0619
},
{
  title: "Dakar",
  latitude: 14.6953,
  longitude: -17.4439
},
{
  title: "Freetown",
  latitude: 8.4697,
  longitude: -13.2659
},
{
  title: "Mogadishu",
  latitude: 2.0411,
  longitude: 45.3426
},
{
  title: "Pretoria",
  latitude: -25.7463,
  longitude: 28.1876
},
{
  title: "Mbabane",
  latitude: -26.3186,
  longitude: 31.141
},
{
  title: "Dodoma",
  latitude: -6.167,
  longitude: 35.7497
},
{
  title: "Lome",
  latitude: 6.1228,
  longitude: 1.2255
},
{
  title: "Tunis",
  latitude: 36.8117,
  longitude: 10.1761
}
];

for (var i = 0; i < cities.length; i++) {
var city = cities[i];
addCity(city.longitude, city.latitude, city.title);
}

function addCity(longitude, latitude, title) {
pointSeries.data.push({
  geometry: { type: "Point", coordinates: [longitude, latitude] },
  title: title
});
}
 
   circle.events.on("dragged", function(event) {
     var dataItem = event.target.dataItem;
     var projection = chart.get("projection");
     var geoPoint = chart.invert({ x: circle.x(), y: circle.y() });
 
     dataItem.setAll({
       longitude: geoPoint.longitude,
       latitude: geoPoint.latitude
     });
   });
 
   return am5.Bullet.new(root, {
     sprite: circle
   });
 });
 
 var first = true;
 var second = true;
 var third = true;
 var last = true;






 
if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(showPosition);
}

function showPosition(position) {
let canlog = true;
let canlat = true;

let addislog = 9.0192;
let addislat = 38.7525;

let cairolog = 30.1118;
let cairolat = 31.3987;



 document.getElementById("w2s").onclick = th2;


 
 function th2() {
    if(document.getElementById("inp2").value == '') {
        document.getElementById("inp2").className = 'shake';
    }
else {



    document.getElementById("mapx").style.display = 'flex';
setTimeout(coverBd, 2000);
setTimeout(loaded, 5000);

if(document.getElementById("inp2").value == 'canada') {
canlog = 56.1304;
canlat = -106.3468;
}

if(document.getElementById("inp2").value == 'toronto') {
canlog = 43.6532;
canlat = -79.3832;
}

if(document.getElementById("inp2").value == 'united states') {
canlog = 37.0902;
canlat = -95.7129;
}

if(document.getElementById("inp2").value == 'us') {
canlog = 37.0902;
canlat = -95.7129;
}

if(document.getElementById("inp2").value == 'usa') {
canlog = 37.0902;
canlat = -95.7129;
}

if(document.getElementById("inp2").value == 'united states of america') {
canlog = 37.0902;
canlat = -95.7129;
}

if(document.getElementById("inp2").value == 'russia') {
canlog = 61.5240;
canlat = 105.3188;
}

first = addCity({ latitude: position.coords.latitude, longitude: position.coords.longitude }, "Paris");
second = addCity({ latitude: position.coords.latitude, longitude: position.coords.longitude }, "Toronto");

last = addCity({ latitude: canlog, longitude: canlat}, "Havana");


  third = addCity({ latitude: addislog, longitude: addislat}, "Los Angeles");


  var lineDataItem = lineSeries.pushDataItem({
   pointsToConnect: [first, second, third, last]
 });

 var planeSeries = chart.series.push(am5map.MapPointSeries.new(root, {}));
 
 var plane = am5.Graphics.new(root, {
   svgPath:
     "m2,106h28l24,30h72l-44,-133h35l80,132h98c21,0 21,34 0,34l-98,0 -80,134h-35l43,-133h-71l-24,30h-28l15,-47",
   scale: 0.08,
   centerY: am5.p50,
   centerX: am5.p50,
   fill: am5.color(0xffffff)
 });
 
 planeSeries.bullets.push(function() {
   var container = am5.Container.new(root, {});
   container.children.push(plane);
   return am5.Bullet.new(root, { sprite: container });
 });
 
 
 var planeDataItem = planeSeries.pushDataItem({
   lineDataItem: lineDataItem,
   positionOnLine: 0,
   autoRotate: true
 });
 planeDataItem.dataContext = {};
 
 planeDataItem.animate({
   key: "positionOnLine",
   to: 1,
   duration: 200000,
   loops: Infinity,
   easing: am5.ease.yoyo(am5.ease.linear)
 });
 
 planeDataItem.on("positionOnLine", (value) => {
   if (planeDataItem.dataContext.prevPosition < value) {
     plane.set("rotation", 0);
   }
 
   if (planeDataItem.dataContext.prevPosition > value) {
     plane.set("rotation", -180);
   }
   planeDataItem.dataContext.prevPosition = value;
 });
 
 function addCity(coords, title) {
   return pointSeries.pushDataItem({
     latitude: coords.latitude,
     longitude: coords.longitude
   });
 }
 
 }



 }}




 // Make stuff animate on load
 chart.appear(2000, 1000);
 
 }); // end am5.ready()

 function coverBd() {
  var bdy =  document.getElementById("cover-body");

  bdy.style.opacity = '1';
  bdy.style.visibility = 'visible';
 }

 function loaded() {
  var cntl =  document.getElementById("content-loader");

  cntl.style.opacity = '0';
  cntl.style.visibility = 'hidden';
 }

</script>



<div class="we3">


    <div class="minz" id="minz"></div>
<script>
    document.getElementById("minz").onclick = sint;


    function sint() {
      document.getElementById("minz").onclick = control;

        var contro = document.getElementById("control");
        var fdt = document.getElementById("fdtxt");
        var fldet = document.getElementById("fldet");
        var minz = document.getElementById("minz");
        var sin01 = document.getElementById("sin01");
        var xtra = document.getElementById("xtra");
        var vieme = document.getElementById("viewm");
        var sin02 = document.getElementById("sin02");
        var airtxt = document.getElementById("airtxt");
        var sintxt = document.getElementById("sintxt");
        var cnt = document.getElementById("cnt");
        var sincose = document.getElementById("sinclose");
        var hours = document.getElementById("hours");
        var country_img = document.getElementById("country-img");
        var cimg = document.getElementById("img-co");


        hours.style.visibility = 'hidden';
        hours.style.opacity = '0';
        hours.style.scale = '.5';
        contro.style.height = '5.5em';
        fdt.style.fontSize = '1.3em';
        minz.style.bottom = '4.5em';
        sin01.style.marginTop = '-1.5em';
        fldet.style.width = '70%';
        cnt.style.bottom = '-.5em';
        cnt.style.marginLeft = '6em';
        cnt.style.scale = '1.2';
        sin01.style.transform = 'translateX(-1em)';
        sin01.style.float = 'right';
        sin01.style.scale = '.8';
        vieme.style.display = 'none';
        airtxt.style.display = 'none';
        sintxt.style.marginLeft = '-2.5em';
        sin01.style.width = '30%';
        cimg.style.width = '15%';
        cimg.style.height = '90%';
        cimg.style.marginTop = '.3em';
        sincose.style.display = 'none';
        sincose.style.visibility = 'hidden';

    }
</script>

<script>

      document.getElementById("control").onclick = control;
    function control() {
      document.getElementById("minz").onclick = sint;

        var contro = document.getElementById("control");
        var fdt = document.getElementById("fdtxt");
        var fldet = document.getElementById("fldet");
        var minz = document.getElementById("minz");
        var sin01 = document.getElementById("sin01");
        var extras = document.getElementById("extras");
        var hele = document.getElementById("hele");
        var vieme = document.getElementById("viewm");
        var sin02 = document.getElementById("sin02");
        var airtxt = document.getElementById("airtxt");
        var sintxt = document.getElementById("sintxt");
        var cnt = document.getElementById("cnt");
        var sincose = document.getElementById("sinclose");
        var hours = document.getElementById("hours");
        var country_img = document.getElementById("rr");
        var cimg = document.getElementById("img-co");

        hele.style.display = 'none';
        hours.style.visibility = 'visible';
        hours.style.opacity = '1';
        hours.style.scale = '1';
        contro.style.height = '12em';
        fdt.style.fontSize = '1.6em';
        minz.style.bottom = '11em';
        sin01.style.marginTop = '0';
        fldet.style.width = '66%';
        cnt.style.bottom = '1.2em';
        cnt.style.marginLeft = '-1em';
        cnt.style.scale = '1';
        sin01.style.transform = 'none';
        sin01.style.float = 'right';
        sin01.style.scale = '1';
        vieme.style.display = 'unset';
        airtxt.style.display = 'block';
        sintxt.style.marginLeft = '-2.5em';
        sin01.style.width = '30%';
        cimg.style.width = '30%';
        cimg.style.height = '100%';
        cimg.style.marginTop = '0';

    }
    </script>

<div class="control-center" id="control" onclick="control()">

<section id="img-co">
<div class="country-img-prev" id="country-img">

</div>
</section>

<section id="fldet">
<div class="main-flight-details">
<nav id="sin02">
<br id="xtra">
<text class="fd-txt" id="fdtxt">Toronto ON, Canada</text>
<br>

<text class="airline-txt" id="airtxt">
<small>Landing at <span>Addis Ababa International Airport</span></small>
</text>
<br id="hele">
<br id="extras">
<a href="#" class="viewmore" id="viewm">View in Country</a>
</nav>
<nav id="sin01">

<br>
<br>

<div class="countdownblock days" hidden>
        <svg class="pie days" viewPort="0 0 100 100">
          <circle class="bg" r="90" cx="100" cy="100" fill="transparent" stroke-dasharray="565.48" stroke-dashoffset="0"></circle>
          <circle class="bar" r="90" cx="100" cy="100" fill="transparent" stroke-dasharray="565.48" stroke-dashoffset="0"></circle>
        </svg>
        <p><span class="number"></span> <span class="unit">days</span></p>
    </div>    
    <div class="countdownblock hours" id="hours">
        <svg class="pie hours" viewPort="0 0 100 100">
          <circle class="bg" r="90" cx="100" cy="100" fill="transparent" stroke-dasharray="565.48" stroke-dashoffset="0"></circle>
          <circle class="bar" r="90" cx="100" cy="100" fill="transparent" stroke-dasharray="565.48" stroke-dashoffset="0"></circle>
        </svg>
        <p id="sintxt"><span class="number"></span> <span class="unit">hours <br>Left</span></p>
    </div>    
    <div class="countdownblock minutes" hidden>
        <svg class="pie minutes" viewPort="0 0 100 100">
          <circle class="bg" r="90" cx="100" cy="100" fill="transparent" stroke-dasharray="565.48" stroke-dashoffset="0"></circle>
          <circle class="bar" r="90" cx="100" cy="100" fill="transparent" stroke-dasharray="565.48" stroke-dashoffset="0"></circle>
        </svg>
        <p><span class="number"></span> <span class="unit">minutes</span></p>
    </div>    
    <div class="countdownblock seconds" hidden>
        <svg class="pie seconds" viewPort="0 0 100 100">
          <circle class="bg" r="90" cx="100" cy="100" fill="transparent" stroke-dasharray="565.48" stroke-dashoffset="0"></circle>
          <circle class="bar" r="90" cx="100" cy="100" fill="transparent" stroke-dasharray="565.48" stroke-dashoffset="0"></circle>
        </svg>
        <p><span class="number"></span> <span class="unit">seconds</span></p>
    </div>

    <input type="button" class="cancel-trip" id="cnt" value="cancel this trip">
<script>
 (function () {
    'use strict';
    if(!$)var $=a=>{let r=document.querySelectorAll(a);return r.length>1?r:r[0]}
    let target = new Date(Date.UTC(2024, 5, 60, 16, 0)),
    origin = new Date(Date.UTC(2024, 4, 25)),
    total = target-origin,
    progressBarUpdate= (bar, val, of) => {
       let pct = (1-val/of)*(Math.PI*180);
       $(bar+' .bar').style.strokeDashoffset=pct;
       $(bar+' .number').innerText = Math.trunc(val);
    },
    update = (updateTotal)=>{
      let na=new Date(),
          diff=target-na,
          d=new Date(diff),
          days=diff/(24*60*60*1000);
      if(updateTotal) return $('.totalbar .fill').style.width = ((1-(diff/total))*100)+"%"                
      progressBarUpdate('.days', (days),Math.trunc(target-origin)/(24*60*60*1000));
      progressBarUpdate('.hours', d.getHours(),24);
      progressBarUpdate('.minutes', d.getMinutes(),60);
      progressBarUpdate('.seconds', d.getSeconds(),60);
    },
    ready = ()=>{
        update();
        update(true);
        setInterval(update, 1000);
        setInterval(function () { update(true); }, 30000);
    };
    if (document.readyState != 'loading')
      ready();
    else
      document.addEventListener('DOMContentLoaded', ready);    
})();
</script>
</nav>
</div>
</section>
</div>

<div class="active-controls" id="active-controls">
<center>
<div class="ac0 aup">
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
 viewBox="0 0 354 354" xml:space="preserve">
<g id="XMLID_818_">
<g>
    <path d="M229.513,52.659L125.024,6.685L0,31.914v294.214l122.805-24.781l106.204,45.969L354,322.091V27.914L229.513,52.659z
         M114.951,282.526L20,301.688V48.281l94.951-19.162V282.526z M219.049,321.209l-84.098-36.4V32.901l84.098,37.003V321.209z
         M334,305.724l-94.951,19.161V71.154L334,52.281V305.724z"/>
</g>
</g>
</svg>
</div>
<div class="ac0 adw">
<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M17.35 9.05004L15.01 16.59C14.45 18.38 11.94 18.41 11.35 16.63L10.65 14.56C10.46 13.99 10.01 13.53 9.43997 13.35L7.35997 12.65C5.58997 12.06 5.61997 9.53004 7.40997 8.99004L14.95 6.64003C16.43 6.19003 17.82 7.58004 17.35 9.05004Z" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke-width="1.5" stroke="none" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
</div>
<br>
<div class="ac0 abd">
<svg viewBox="0 0 56 56" xmlns="http://www.w3.org/2000/svg"><path d="M 2.0241 44.9686 L 21.3578 44.9686 C 22.5443 44.9686 23.2888 44.2241 23.2888 43.0841 C 23.2888 41.9674 22.5443 41.2229 21.3578 41.2229 L 5.8629 41.2229 L 5.8629 41.1065 L 14.9597 32.2656 C 20.4969 26.8913 22.1255 24.0994 22.1255 20.5165 C 22.1255 15.1888 17.4026 11.1172 11.0977 11.1172 C 6.1421 11.1172 1.9078 13.7928 .4886 17.8875 C .2094 18.6786 .1 19.3300 .1 19.9117 C .1 21.0749 .7910 21.8427 1.9310 21.8427 C 3.0245 21.8427 3.4898 21.3308 3.8388 20.1676 C 4.0250 19.4463 4.2809 18.7949 4.6531 18.1900 C 5.8862 16.1194 8.1895 14.7932 11.0977 14.7932 C 14.8667 14.7932 17.8679 17.4455 17.8679 20.7492 C 17.8679 23.4247 16.7745 25.2394 12.1679 29.7762 L 1.2796 40.5947 C .3025 41.5718 0 42.1535 0 43.0143 C 0 44.2241 .7910 44.9686 2.0241 44.9686 Z M 30.0125 44.9221 L 39.5514 44.9221 C 49.9745 44.9221 56 38.7102 56 28.2174 C 56 17.7247 49.9745 11.6524 39.5514 11.6524 L 30.0125 11.6524 C 28.7329 11.6524 27.9187 12.4899 27.9187 13.7928 L 27.9187 42.7584 C 27.9187 44.0845 28.7329 44.9221 30.0125 44.9221 Z M 32.1297 41.1065 L 32.1297 15.4214 L 39.2489 15.4214 C 47.2523 15.4214 51.6960 20.0745 51.6960 28.2407 C 51.6960 36.4534 47.2523 41.1065 39.2489 41.1065 Z"/></svg>
</div>
<br>
<svg xmlns="http://www.w3.org/2000/svg" class="compass" viewBox="0 0 856 856"><defs><style>.a,.b,.c,.d,.e,.f,.g,.h{fill:none;stroke-linecap:round;stroke-miterlimit:10;}.a,.h,.j{stroke:#fff;}.a{stroke-width:9.73px;}.b,.c,.d,.e,.f,.g{stroke:#b3b3b3;}.b{stroke-width:8.73px;}.c{stroke-width:7.69px;}.d{stroke-width:11.32px;}.e{stroke-width:11.32px;}.f{stroke-width:11.15px;}.g{stroke-width:11px;}.h{stroke-width:9px;}.i,.j{fill:#fff;}.j{stroke-width:0.3px;}.k{fill:red;}</style></defs>><path d="M268.3,0H641.88A214.12,214.12,0,0,1,856,214.12V587.7A268.3,268.3,0,0,1,587.7,856H268.3A268.3,268.3,0,0,1,0,587.7V268.3A268.3,268.3,0,0,1,268.3,0Z"/><line class="a" x1="53.83" y1="525.88" x2="104.77" y2="513"/><line class="a" x1="41.28" y1="477.44" x2="93.33" y2="470.24"/><line class="a" x1="37.93" y1="426.44" x2="90.47" y2="427.22"/><line class="a" x1="41.77" y1="374.84" x2="93.62" y2="383.36"/><line class="a" x1="50.89" y1="324.28" x2="101.04" y2="339.96"/><line class="a" x1="67.08" y1="276.3" x2="114.5" y2="298.92"/><line class="a" x1="66.32" y1="574.25" x2="115.36" y2="555.39"/><line class="b" x1="81.34" y1="625.83" x2="150.72" y2="586.47"/><line class="a" x1="528.18" y1="56.67" x2="513.49" y2="107.12"/><line class="a" x1="576.3" y1="70.38" x2="556.16" y2="118.91"/><line class="a" x1="621.97" y1="93.31" x2="594.7" y2="138.22"/><line class="a" x1="664.53" y1="122.75" x2="630.93" y2="163.15"/><line class="a" x1="703.51" y1="156.21" x2="664.6" y2="191.52"/><line class="a" x1="736.69" y1="194.47" x2="693.17" y2="223.91"/><line class="a" x1="480.14" y1="42.95" x2="471.57" y2="94.79"/><line class="c" x1="428.05" y1="29.78" x2="426.91" y2="106.73"/><line class="a" x1="155.44" y1="153.8" x2="191.98" y2="191.56"/><line class="a" x1="191.19" y1="118.8" x2="223.36" y2="160.35"/><line class="a" x1="233.75" y1="90.5" x2="259.24" y2="136.44"/><line class="a" x1="280.4" y1="68.13" x2="298.84" y2="117.33"/><line class="a" x1="328.79" y1="50.85" x2="340.17" y2="102.15"/><line class="a" x1="378.46" y1="40.99" x2="382.47" y2="93.38"/><line class="a" x1="119.71" y1="188.72" x2="160.49" y2="221.86"/><line class="d" x1="82.46" y1="227.44" x2="143.5" y2="263.48"/><line class="a" x1="799.78" y1="330.6" x2="748.84" y2="343.48"/><line class="a" x1="812.33" y1="379.04" x2="760.28" y2="386.24"/><line class="a" x1="815.68" y1="430.03" x2="763.14" y2="429.26"/><line class="a" x1="811.84" y1="481.64" x2="759.99" y2="473.12"/><line class="a" x1="802.72" y1="532.19" x2="752.57" y2="516.52"/><line class="a" x1="786.53" y1="580.18" x2="739.11" y2="557.56"/><line class="a" x1="787.29" y1="282.23" x2="738.25" y2="301.09"/><line class="e" x1="772.27" y1="230.65" x2="700.59" y2="271.32"/><line class="a" x1="698.23" y1="703.03" x2="661.44" y2="665.51"/><line class="a" x1="662.71" y1="738.27" x2="630.27" y2="696.93"/><line class="a" x1="620.34" y1="766.85" x2="594.54" y2="721.07"/><line class="a" x1="573.83" y1="789.53" x2="555.07" y2="740.44"/><line class="a" x1="525.56" y1="807.12" x2="513.84" y2="755.9"/><line class="a" x1="475.96" y1="817.31" x2="471.61" y2="764.94"/><line class="a" x1="733.73" y1="667.87" x2="692.73" y2="635"/><line class="f" x1="770.72" y1="628.91" x2="701.55" y2="588.68"/><line class="a" x1="323.69" y1="799.83" x2="339.02" y2="749.58"/><line class="a" x1="275.74" y1="785.51" x2="296.51" y2="737.24"/><line class="a" x1="230.37" y1="762" x2="258.21" y2="717.44"/><line class="a" x1="188.2" y1="732.02" x2="222.31" y2="692.05"/><line class="a" x1="149.65" y1="698.06" x2="189.01" y2="663.25"/><line class="a" x1="116.95" y1="659.38" x2="160.85" y2="630.5"/><line class="a" x1="371.55" y1="814.17" x2="380.78" y2="762.44"/><line class="g" x1="423.46" y1="828" x2="425.61" y2="750.09"/><line class="h" x1="426" y1="311.11" x2="426" y2="540.89"/><line class="h" x1="312.33" y1="426" x2="542.11" y2="426"/><text x="-532" y="-115"/><path class="i" d="M699.72,575.08l-18.24-63.62h6.72l15.73,55,16.54-55H728l16.57,55,15.67-55h6.43l-18.16,63.62h-7.63l-16.62-55.23-16.62,55.23Z" transform="translate(-532 -115)"/><path class="i" d="M977.63,272.42H984V336h-5.45l-35.44-51.8V336h-6.37V272.42h5.55l35.35,51.66Z" transform="translate(-532 -115)"/><path class="i" d="M956.92,812.86A26.37,26.37,0,0,1,942,808.72a21.52,21.52,0,0,1-8.68-11.41l5.45-3.18a16.72,16.72,0,0,0,6.36,9.23q4.64,3.32,11.91,3.32,7.08,0,11-3.14a10.09,10.09,0,0,0,4-8.31,8.62,8.62,0,0,0-3.63-7.55q-3.64-2.53-12-5.27-9.9-3.27-13.09-5.27A13.92,13.92,0,0,1,936,764.51q0-8.09,5.64-12.77a21,21,0,0,1,13.9-4.68,21.8,21.8,0,0,1,12.91,3.86,23.55,23.55,0,0,1,8.09,9.86l-5.36,3q-4.37-10.54-15.64-10.54a14.79,14.79,0,0,0-9.54,2.91,9.78,9.78,0,0,0-3.63,8.08q0,4.74,3.27,7.09t10.81,4.82l4.95,1.68c1,.34,2.46.88,4.37,1.64a26.74,26.74,0,0,1,4.22,2c.91.57,2,1.36,3.32,2.36a10.78,10.78,0,0,1,2.82,3,18.85,18.85,0,0,1,1.54,3.63,14.9,14.9,0,0,1,.68,4.59,15.93,15.93,0,0,1-5.9,13Q966.55,812.87,956.92,812.86Z" transform="translate(-532 -115)"/><path class="j" d="M1199.1,564.5H1230v6h-37.26V506.88h36.81v6H1199.1v22.54h28.17v6H1199.1Z" transform="translate(-532 -115)"/><polygon class="k" points="773.73 57.55 674.31 99.05 759.96 164.4 773.73 57.55"/></svg>

</center>

</div>
</div>
</div>
<div class="bg-process" id="content-loader">
  <div class="loaded">
    <section class="loaded-section">

<br>
       <center>
          <text>Preparing Your trip</text>
          <br><br><br>
            <div class="loder"></div>
            
            <small>Loading maps</small>
    </div>
 </center>
</section>
  </div>
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
