

const urlsToCache = ["/", "index.html", "script.js", "app.js", "styles.css", "logo.svg"];
self.addEventListener("install", (event) => {
   event.waitUntil((async () => {
      const cache = await caches.open("pwa-assets");
      return cache.addAll(urlsToCache);
   })());
});

