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
            <a class="p-3 m-2" onclick="load()">Sort By Default</a>
            <a class="p-3 m-2" onclick="sortByPrice()">Sort By Price</a>
            <a class="p-3 m-2" onclick="sortBySku()">Sort By SKU</a>
        </div>
        <div class="justify-center min-h-screen bg-gray-100 sm:items-center py-4 sm:pt-0 grid grid-cols-3 gap-2" id="container">
        </div>
    </body>
</html>

<script>
async function load() {
    let url = 'https://testapi.oglsoftware.co.uk/products';
    let obj = await (await fetch(url)).json();
    let data = obj.data;

    const generatedHtml = Object.keys(data).reduce((accum, currKey) => accum +
    `<div class="bg-blue-300 m-2 p-2 text-white">
        <ul style="list-style: none; text-align: center;">
            <li style="font-size: 20px;"><strong>${data[currKey].name}</strong></li>
            <li><img src="${data[currKey].image}" style="width: 50%;" class="m-1 mr-auto ml-auto"></li>
            <li><strong>Description:</strong> ${data[currKey].description}</li>
            <li><strong>SKU:</strong> ${data[currKey].sku}</li>
            <li><strong>Price:</strong> ${data[currKey].price}</li>
            <li><strong>Stock Level:</strong> ${data[currKey]["stock-level"]}</li>
        </ul>
    </div>`, '');

    document.getElementById('container').innerHTML = generatedHtml;
}

load();

async function sortByPrice() {
    let url = 'https://testapi.oglsoftware.co.uk/products';
    let obj = await (await fetch(url)).json();
    let entries = Object.entries(obj.data);

    let sorted = entries.sort((a, b) => (a[1].price < b[1].price) ? 1 : -1);

    let generatedHtml = [];

    sorted.forEach((item) => {
        html = `<div class="bg-blue-300 m-2 p-2 text-white">
                    <ul style="list-style: none; text-align: center;">
                        <li style="font-size: 20px;"><strong>${item[1].name}</strong></li>
                        <li><img src="${item[1].image}" style="width: 50%;" class="m-1 mr-auto ml-auto"></li>
                        <li><strong>Description:</strong> ${item[1].description}</li>
                        <li><strong>SKU:</strong> ${item[1].sku}</li>
                        <li><strong>Price:</strong> ${item[1].price}</li>
                        <li><strong>Stock Level:</strong> ${item[1]["stock-level"]}</li>
                    </ul>
                </div>`;

        generatedHtml.push(html);
    });

    document.getElementById('container').innerHTML = generatedHtml.toString();
}

async function sortBySku() {
    let url = 'https://testapi.oglsoftware.co.uk/products';
    let obj = await (await fetch(url)).json();
    let entries = Object.entries(obj.data);

    let sorted = entries.sort((a, b) => (a[1].sku < b[1].sku) ? 1 : -1);

    let generatedHtml = [];

    sorted.forEach((item) => {
        html = `<div class="bg-blue-300 m-2 p-2 text-white">
                    <ul style="list-style: none; text-align: center;">
                        <li style="font-size: 20px;"><strong>${item[1].name}</strong></li>
                        <li><img src="${item[1].image}" style="width: 50%;" class="m-1 mr-auto ml-auto"></li>
                        <li><strong>Description:</strong> ${item[1].description}</li>
                        <li><strong>SKU:</strong> ${item[1].sku}</li>
                        <li><strong>Price:</strong> ${item[1].price}</li>
                        <li><strong>Stock Level:</strong> ${item[1]["stock-level"]}</li>
                    </ul>
                </div>`;

        generatedHtml.push(html);
    });

    document.getElementById('container').innerHTML = generatedHtml.toString();
}
</script>
