<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body>
        <nav>
            <ul>
                <x-navlink href="/">Home</x-navlink>
                <x-navlink href="/about">About</x-navlink>
                <x-navlink href="/posts/myfirstpost">Posts</x-navlink>
                <x-navlink href="/contact">Contact</x-navlink>
            </ul>
        </nav>
       {{ $slot }}
    </body>
</html>