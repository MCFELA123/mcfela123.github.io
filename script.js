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