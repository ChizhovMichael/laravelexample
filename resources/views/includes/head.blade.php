<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="canonical" href="{{ URL::current() }}">
<meta name="theme-color" content="#fbfbfb" />
<meta name="msapplication-TileColor" content="#fbfbfb">
<meta name="robots" content="index, follow">
<meta name="author" content="WebArt Studio" />
<meta name="copyright" content="Telezapchasti 2019">


<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">

<!-- Styles -->

@if ($agent->isMobile())
<link rel="stylesheet" href="{{ URL::asset('css/mobile.css') }}" type="text/css">
@else
<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" type="text/css">
@endif




<!-- Favicon -->
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes"/>
<link rel="shortcut icon" href="{{{ asset('img/favicon/favicon.ico') }}}" />
<link rel="icon" type="image/png" sizes="32x32" href="{{{ asset('img/favicon/favicon-32x32.png') }}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{{ asset('img/favicon/favicon-16x16.png') }}}">
<link rel="apple-touch-icon" sizes="180x180" href="{{{ asset('img/favicon/apple-touch-icon.png') }}}">
<link rel="icon" sizes="192x192" href="{{{ asset('img/favicon/android-chrome-192x192.png') }}}">
<link rel="icon" sizes="512x512" href="{{{ asset('img/favicon/android-chrome-512x512.png') }}}">
<meta name="msapplication-TileImage" content="{{{ asset('img/favicon/mstile-144x144.png') }}}">
<link rel="mask-icon" href="{{ asset('img/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
<link rel="manifest" href="{{{ asset('img/favicon/site.webmanifest') }}}">
<meta name="msapplication-config" content="{{ asset('img/favicon/browserconfig.xml') }}" />
<meta name="apple-mobile-web-app-title" content="Telezapchasti Shop">
<meta name="application-name" content="Telezapchasti Shop">




<!-- Scripts -->
<script src="{{ URL::asset('js/app.js') }}"></script>





<meta property="og:locale" content="ru_RU">
<meta property="og:type" content="website">
<meta property="og:title" content=""><!-- -->
<meta property="og:description" content=""><!-- -->
<meta property="og:url" content="{{ URL::current() }}">
<meta property="og:site_name" content="Telezapchasti">
<meta property="fb:app_id" content=""><!-- -->
<meta property="og:image" content="{{ asset('img/favicon/twitter.png') }}">
<meta property="og:image:alt" content="Og изображение Telezapchasti. Логотип компании и элементы фирменного стиля">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:description" content=""><!-- -->
<meta name="twitter:title" content=""><!-- -->
<meta name="twitter:site" content="@Mick_Chizhov">
<meta name="twitter:image" content="{{ asset('img/favicon/twitter.png') }}">
<meta name="twitter:creator" content="@Mick_Chizhov">
<script type="application/ld+json">
	{
		"@context": "https://schema.org",
		"@type": "WebSite",
		"@id": "http://telezapchasti.ru/#website",
		"url": "http://telezapchasti.ru/",
		"name": "Telezapchasti",
		"potentialAction":
		{
			"@type": "SearchAction",
			"target": "http://telezapchasti.ru/?s={search_term_string}",
			"query-input": "required name=search_term_string"
		}
	}
</script>
<script type="application/ld+json">
	{
		"@context": "https://schema.org",
		"@type": "Organization",
		"name": "Telezapchasti",
		"url": "http://telezapchasti.ru/",
		"sameAs": [
			
		],
		"@id": "http://telezapchasti.ru/#organization",		
		"logo": "http://telezapchasti.ru/img/icon/logo.svg"
	}
</script>