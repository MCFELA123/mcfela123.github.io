// main.js

async function registerSync() {
    const swRegistration = await navigator.serviceWorker.ready;
    swRegistration.sync.register("send-message");
  }
// main.js

async function requestBackgroundFetch(movieData) {
    const swRegistration = await navigator.serviceWorker.ready;
    const fetchRegistration = await swRegistration.backgroundFetch.fetch(
      "download-movie",
      ["/my-movie-part-1.webm", "/my-movie-part-2.webm"],
      {
        icons: movieIcons,
        title: "Downloading my movie",
        downloadTotal: 60 * 1024 * 1024,
      },
    );
    //...
  }
// main.js

async function registerPeriodicSync() {
    const swRegistration = await navigator.serviceWorker.ready;
    swRegistration.periodicSync.register("update-news", {
      // try to update every 24 hours
      minInterval: 24 * 60 * 60 * 1000,
    });
  }
// main.js

async function registerPeriodicSync() {
    const swRegistration = await navigator.serviceWorker.ready;
    swRegistration.periodicSync.unregister("update-news");
  }
        