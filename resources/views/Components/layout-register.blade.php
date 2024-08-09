<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="//unpkg.com/alpinejs@2.8.0/dist/alpine.js" defer></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://unpkg.com/vue-router@4/dist/vue-router.global.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

    
    <title>BuildOnline</title>
    
</head>
<body style="font-family: 'Open Sans', sans-serif;">
<section class="px-6 py-8 min-h-screen flex flex-col"> 
    <div id="app"> 
        <nav class="flex justify-between items-center mb-12 bg-pink-200 p-4 rounded-lg">
            <div>
                <a>
                <img :src="image" alt="logo" class="h-12">
                </a>
            </div>
            <div class="flex-grow flex justify-center space-x-4">
            <a class="text-xs font-bold uppercase text-gray-700"> [[ contact ]] </a>
                <a class="text-xs font-bold uppercase text-black-700"> [[ notes ]] </a>
            </div>
            <div class="space-x-4">
                <a href="/" class="text-xs font-bold uppercase text-gray-700"> [[ login ]] </a>
                <a class="bg-purple-500 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    [[ signin ]]
                </a>
            </div>
        </nav>

        {{ $slot }}
    </div>
</section>

    @vite('public/js/app.js')
    
</body>
</html>
