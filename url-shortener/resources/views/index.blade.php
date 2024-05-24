<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Shortener</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
</head>
<body>
    <div class="container mx-auto mt-20">
        <div class="max-w-md mx-auto bg-white p-5 rounded shadow-lg">
            <h1 class="text-2xl font-bold mb-4 text-center">URL Shortener</h1>
            <form action="/shorten" method="POST" class="mb-4">
                @csrf
                <input type="text" name="original_url" placeholder="Enter URL" class="w-full p-2 border rounded mb-2" required>
                @if($errors->has('original_url'))
                    <p class="text-red-500">{{ $errors->first('original_url') }}</p>
                @endif
                <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded">Shorten</button>
            </form>
            @isset($short_url)
                <p class="text-center">Shortened URL: <a href="{{ $short_url }}" class="text-blue-500">{{ $short_url }}</a></p>
            @endisset
        </div>
    </div>
</body>
</html>
