const CACHE_NAME = 'glow-medical-v11';
const PRECACHE_URLS = [
    '/',
    '/contact',
    '/impact',
    '/outreach',
    '/partner',
    '/services',
    '/volunteer',
    '/offline.html',
    '/favicon.ico',
    '/glow-health-logo.png',
    '/icons/glow-health-mark.png',
    '/site.webmanifest',
    '/icons/apple-touch-icon.png',
    '/icons/icon-192x192.png',
    '/icons/icon-512x512.png',
    '/icons/icon-512x512-maskable.png',
    '/images/outreach/community-medical-outreach-akure.webp',
    '/images/outreach/family-health-education-ondo.webp',
    '/images/outreach/medical-volunteers-outreach-table.webp',
];

self.addEventListener('install', (event) => {
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then((cache) => cache.addAll(PRECACHE_URLS))
            .then(() => self.skipWaiting())
    );
});

self.addEventListener('activate', (event) => {
    event.waitUntil(
        caches.keys()
            .then((keys) => Promise.all(
                keys
                    .filter((key) => key !== CACHE_NAME)
                    .map((key) => caches.delete(key))
            ))
            .then(() => self.clients.claim())
    );
});

self.addEventListener('fetch', (event) => {
    const { request } = event;

    if (request.method !== 'GET') {
        return;
    }

    const requestUrl = new URL(request.url);

    if (request.mode === 'navigate') {
        event.respondWith(
            fetch(request)
                .then((response) => {
                    const copy = response.clone();
                    caches.open(CACHE_NAME).then((cache) => cache.put('/', copy));

                    return response;
                })
                .catch(() => caches.match('/').then((cached) => cached || caches.match('/offline.html')))
        );

        return;
    }

    if (requestUrl.origin !== self.location.origin) {
        return;
    }

    event.respondWith(
        caches.match(request)
            .then((cached) => cached || fetch(request).then((response) => {
                if (!response || response.status !== 200) {
                    return response;
                }

                const copy = response.clone();
                caches.open(CACHE_NAME).then((cache) => cache.put(request, copy));

                return response;
            }))
    );
});
