<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Instituto</title>
    @vite(["resources/css/app.css","resources/js/app.js"])
</head>

<body class="min-h-screen flex flex-col">

    <x-layouts.header/>

    <x-layouts.nav/>

    <main class="flex-grow overflow-hidden px-4 py-4">
        {{ $slot }}
    </main>


    <x-layouts.footer/>

</body>
</html>
