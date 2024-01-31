if ("serviceWorker" in navigator) {
    navigator.serviceWorker
      .register("sw.js")
      .then(function (registration) {
        console.log("success load");
      })
      .catch(function (err) {
        console.log(err);
      });
   }

   document.onclick = hideMenu;
   document.oncontextmenu = rightClick;

   function hideMenu() {
    document.getElementById("contextmenu").className = 'none';
 setTimeout(ini, 250)
  }

   function rightClick(e) {
  var menu = document.getElementById("contextmenu");

    if(document.oncontextmenu) {
      menu.className = 'block';
      e.preventDefault();
menu.style.top = e.pageY + 'px';
menu.style.left = e.pageX + 'px';

    }
   }


   function ini() {
    document.getElementById("contextmenu").innerHTML = 
    '<li>Home</li><li>Search</li><li>Bookmarks</li><li>Profile</li><li>Settings</li>';
    
   }