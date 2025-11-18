<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Todo app</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])           
        @endif
    </head>
    <body class="mt-2 ml-2 mr-2 bg-gray-300 text-center">
		<header>
			<h1 class="text-5xl">Welkom bij de Laravel todo app!</h1>
		</header>

		<main class="mt-5">
			<section>
				<h2 class="text-4xl mb-3">Inhoud</h2>
				<p class="mb-5">
					Klik op de knop hieronder om je todo's te bekijken, voltooien, verwijderen en aan te maken.
				</p>
			</section>

			<a href="/todo"
				class="bg-blue-500 hover:bg-blue-600 active:bg-blue-700 p-5 rounded-3xl text-white">
				Naar todo's
			</a>
		</main>
	</body>
</html>
