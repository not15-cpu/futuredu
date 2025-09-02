// This is the "Offline page" service worker

importScripts('https://storage.googleapis.com/workbox-cdn/releases/5.1.2/workbox-sw.js');

const CACHE = "pwabuilder-page";
const offlineFallbackPage = "index.php"; // substitua pelo seu arquivo offline

self.addEventListener("message", (event) => {
  if (event.data && event.data.type === "SKIP_WAITING") {
    self.skipWaiting();
  }
});

self.addEventListener('install', async (event) => {
  event.waitUntil(
    caches.open(CACHE)
      .then((cache) => cache.add(offlineFallbackPage))
  );
});

if (workbox.navigationPreload.isSupported()) {
  workbox.navigationPreload.enable();
}

self.addEventListener('fetch', (event) => {
  if (event.request.mode === 'navigate') {
    event.respondWith((async () => {
      try {
        const preloadResp = await event.preloadResponse;
        if (preloadResp) return preloadResp;

        const networkResp = await fetch(event.request);
        return networkResp;
      } catch (error) {
        const cache = await caches.open(CACHE);
        const cachedResp = await cache.match(offlineFallbackPage);
        return cachedResp;
      }
    })());
  }
});

// ==================== PUSH NOTIFICATIONS ====================

self.addEventListener('push', function(event) {
    let data = { title: "Nova notificação!", body: "Você recebeu uma mensagem" };

    if (event.data) {
        // Tenta ler o dado como texto simples primeiro,
        // pois a maioria dos payloads de teste são textos.
        const textData = event.data.text();
        
        try {
            // Tenta analisar o texto como JSON.
            // Se falhar, a variável `data` não será atualizada.
            data = JSON.parse(textData);
        } catch(e) {
            // Se o JSON for inválido, usa o texto como corpo da notificação.
            data.body = textData;
        }
    }

    // Restante do código...
    const title = data.title;
    const options = {
      body: data.body,
      data: { url: data.url || "/" }
    };
    event.waitUntil(
        self.registration.showNotification(title, options)
    );
});


// Clique na notificação
self.addEventListener('notificationclick', function(event) {
  event.notification.close();
  event.waitUntil(
    clients.openWindow(event.notification.data.url)
  );
});
