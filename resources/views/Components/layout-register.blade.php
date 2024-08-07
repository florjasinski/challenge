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
    
    <title>BuildOnline</title>
    
</head>
<body style="font-family: 'Open Sans', sans-serif;">
    <section class="px-6 py-8 min-h-screen flex flex-col">
        <nav class="flex justify-between items-center mb-12">
            <div>
                <a href="/">
                    <img src="/images/logoBuild.jpg" alt="BuildOnline Logo" class="h-10">
                </a>
            </div>
            <div class="flex-grow flex justify-center space-x-4">
                <a href="/" class="text-xs font-bold uppercase text-gray-700">Contacts</a>
                <a href="/" class="text-xs font-bold uppercase text-gray-700">Notes</a>
            </div>
            <div class="space-x-4">
                <a href="/" class="text-xs font-bold uppercase text-gray-700">Log in</a>
                <a href="/" class="bg-purple-500 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Sign in
                </a>
            </div>
        </nav>

        {{ $slot }}

    </section>
</body>
</html>
