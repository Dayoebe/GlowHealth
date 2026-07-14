@php
    $configuredName = config('app.name', 'Laravel');
    $appName = $configuredName === 'Laravel' ? 'Glow Health Outreach Initiative' : $configuredName;
    $pageTitle = filled($title ?? null) && $title !== $appName ? $title.' - '.$appName : $appName;
@endphp

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Glow Health Outreach Initiative provides free consultations, health screenings, medication support, health education, and referrals for residents of Ondo State." />
<meta name="theme-color" content="#071b57" />
<meta name="application-name" content="{{ $appName }}" />
<meta name="apple-mobile-web-app-title" content="Glow Medical" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
<meta name="mobile-web-app-capable" content="yes" />
<meta name="format-detection" content="telephone=no" />
<meta property="og:site_name" content="{{ $appName }}" />
<meta property="og:title" content="{{ $pageTitle }}" />
<meta property="og:description" content="Glow Health Outreach Initiative provides free consultations, health screenings, medication support, health education, and referrals for residents of Ondo State." />
<meta property="og:image" content="{{ asset('glow-health-social.png') }}" />
<meta property="og:image:alt" content="Glow Health Outreach Initiative logo" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:image" content="{{ asset('glow-health-social.png') }}" />

<script>
    (() => {
        const theme = localStorage.theme || 'system';
        document.documentElement.classList.toggle('dark', theme === 'dark' || (theme === 'system' && matchMedia('(prefers-color-scheme: dark)').matches));
    })();
</script>

<title>
    {{ $pageTitle }}
</title>

<link rel="icon" href="/favicon.ico" sizes="32x32">
<link rel="icon" href="/icons/icon-192x192.png" type="image/png" sizes="192x192">
<link rel="apple-touch-icon" href="/icons/apple-touch-icon.png">
<link rel="manifest" href="/site.webmanifest">

@fonts

@vite(['resources/css/app.css', 'resources/js/app.js'])
