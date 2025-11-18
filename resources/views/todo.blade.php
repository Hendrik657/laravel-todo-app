<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Todo app</title>
	<link rel="preconnect" href="https://fonts.bunny.net">
	<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

	@if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
		@vite(['resources/css/app.css', 'resources/js/app.js'])           
	@endif
</head>
<body class="mt-2 ml-2 mr-2 bg-gray-300">
	<header class="relative flex items-center justify-between">
		<a href="/" class="bg-blue-500 hover:bg-blue-600 active:bg-blue-700 p-5 rounded-3xl text-white">Terug</a>
		<h1 class="absolute left-1/2 transform -translate-x-1/2 text-5xl">Todo's</h1>
	</header>

	<main>
		<div class="relative flex w-full">
			{{-- Nieuwe todo --}}
			<section class="mt-5 w-100">
				<h2 class="text-4xl mb-3">Nieuwe todo</h2>
				<form action="{{ route('todo.create') }}" method="post" class="max-w-md">
					@csrf
					{{-- Titel --}}
					<div class="mb-5">
						<label for="titel" class="block mb-2 font-medium">Titel</label>
						<input type="text" name="titel" id="titel" class="w-full border rounded p-2" required>
					</div>
					
					{{-- Omschrijving --}}
					<div class="mb-5">
						<label for="omschrijving" class="block mb-2 font-medium">Omschrijving</label>
						<input type="text" name="omschrijving" id="omschrijving" class="w-full border rounded p-2" required>
					</div>

					<input type="submit" value="Opslaan" class="cursor-pointer bg-blue-500 hover:bg-blue-600 active:bg-blue-700 p-3 rounded-3xl text-white w-full">
				</form>
			</section>

			{{-- Todo lijst --}}
			<section class="mt-5 absolute left-1/2 transform -translate-x-1/2">
				<h2 class="text-4xl mb-3">Todo lijst</h2>

				@foreach ($todos as $todo)
					<div class="bg-white p-2 rounded-xl mb-3">
						<h3 class="text-2xl mb-2">{{ $todo->title }}</h3>
						<p class="mb-2">{{ $todo->description }}</p>

						<div class="flex mb-2">
							<p class="mr-4">Voltooid:</p>
							@if ($todo->isCompleted)
								<input type="checkbox" name="completed" id="completed" checked>
							@else
								<input type="checkbox" name="completed" id="completed">
							@endif
						</div>

						<form action="{{ route('todo.delete', $todo->id) }}" method="POST">
							@csrf
							@method('DELETE')
							<button type="submit" class="bg-red-500 text-white p-2 rounded-xl cursor-pointer hover:bg-red-600 active:bg-red-700">
								Verwijderen
							</button>
						</form>
					</div>
				@endforeach
			</section>
		</div>
	</main>
</body>
</html>