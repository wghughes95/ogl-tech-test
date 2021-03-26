<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    </head>
    <body>
        <div>
            <a class="p-3 m-2" href="/">Sort By Default</a>
            <a class="p-3 m-2" href="/price">Sort By Price</a>
            <a class="p-3 m-2" href="/sku">Sort By SKU</a>
        </div>
        <div class="justify-center min-h-screen bg-gray-100 sm:items-center py-4 sm:pt-0 grid grid-cols-3 gap-2">
            @foreach ($sortedProducts as $product)
                <div class="bg-blue-300 m-2 p-2 text-white">
                    <ul style="list-style: none; text-align: center;">
                        <li style="font-size: 20px;"><strong>{{ $product->name }}</strong></li>
                        <li><img src="{{ $product->image }}" style="width: 50%;" class="m-1 mr-auto ml-auto"></li>
                        <li><strong>Description:</strong> {{ $product->description }}</li>
                        <li><strong>SKU:</strong> {{ $product->sku }}</li>
                        <li><strong>Price:</strong> {{ $product->price }}</li>
                        <li><strong>Stock Level:</strong> {{ $product->{'stock-level'} }}</li>
                    </ul>
                </div>
            @endforeach
        </div>
    </body>
</html>
