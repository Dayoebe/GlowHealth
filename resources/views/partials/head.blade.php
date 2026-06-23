@php
    $configuredName = config('app.name', 'Laravel');
    $appName = $configuredName === 'Laravel' ? 'Glow FM Free Medical Initiative' : $configuredName;
    $pageTitle = filled($title ?? null) && $title !== $appName ? $title.' - '.$appName : $appName;
@endphp

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Glow FM Free Medical Initiative provides free consultations, health screenings, medication support, health education, and referrals for residents of Ondo State." />
<meta name="theme-color" content="#0a0a0a" />
<meta name="application-name" content="{{ $appName }}" />
<meta name="apple-mobile-web-app-title" content="Glow Medical" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
<meta name="mobile-web-app-capable" content="yes" />
<meta name="format-detection" content="telephone=no" />

<title>
    {{ $pageTitle }}
</title>

<link rel="icon" href="/favicon.ico" sizes="any">
<link rel="icon" href="/icons/icon-192x192.png" type="image/png" sizes="192x192">
<link rel="apple-touch-icon" href="/icons/apple-touch-icon.png">
<link rel="manifest" href="/site.webmanifest">

@fonts

@vite(['resources/css/app.css', 'resources/js/app.js'])
@fluxAppearance
