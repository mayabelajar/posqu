<html lang="id">
<head>
    <!-- jQuery -->
    <script src="{{ asset('/lte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('/lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/lte/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('/lte/ini.js') }}"></script>
    <script src="{{ asset('/lte/ini.css') }}"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Meja</title>
    <link rel="stylesheet" href="ini.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#e3e0c8] flex items-center justify-center min-h-screen">
    <div class="bg-white p-10 rounded-lg shadow-lg w-[80%]">
        <h1 class="text-center text-2xl font-semibold mb-8">Pilih Meja</h1>
        <div class="flex justify-around">
            <!-- Indoor Section -->

            <div class="border border-yellow-500 p-4 rounded-lg">
                <h2 class="text-lg font-semibold mb-4">Indoor</h2>
                <div id="tables">
                <div class="grid grid-cols-4 gap-4">
                    <button class="border border-yellow-500 py-2 px-4 rounded-lg">Meja 1</button>
                    <button class="border border-yellow-500 py-2 px-4 rounded-lg" >Meja 5</button>
                    <button class="border border-yellow-500 py-2 px-4 rounded-lg" >Meja 9</button>
                    <button class="border border-yellow-500 py-2 px-4 rounded-lg" >Meja 13</button>
                    <button class="border border-yellow-500 py-2 px-4 rounded-lg">Meja 2</button>
                    <button class="border border-yellow-500 py-2 px-4 rounded-lg">Meja 6</button>
                    <button class="border border-yellow-500 py-2 px-4 rounded-lg">Meja 10</button>
                    <button class="border border-yellow-500 py-2 px-4 rounded-lg">Meja 14</button>
                    <button class="border border-yellow-500 py-2 px-4 rounded-lg">Meja 3</button>
                    <button class="border border-yellow-500 py-2 px-4 rounded-lg">Meja 7</button>
                    <button class="border border-yellow-500 py-2 px-4 rounded-lg">Meja 11</button>
                    <button class="border border-yellow-500 py-2 px-4 rounded-lg">Meja 15</button>
                    <button class="border border-yellow-500 py-2 px-4 rounded-lg">Meja 4</button>
                    <button class="border border-yellow-500 py-2 px-4 rounded-lg">Meja 8</button>
                    <button class="border border-yellow-500 py-2 px-4 rounded-lg">Meja 12</button>
                    <button class="border border-yellow-500 py-2 px-4 rounded-lg">Meja 16</button>
                </div>
                </div>
            </div>
            <!-- Outdoor Section -->
            <div class="border border-yellow-500 p-4 rounded-lg">
                <h2 class="text-lg font-semibold mb-4">Outdoor</h2>
                <div id="tables">
                <div class="grid grid-cols-4 gap-4">
                    <button class="border border-yellow-500 py-2 px-4 rounded-lg">Meja 1</button>
                    <button class="border border-yellow-500 py-2 px-4 rounded-lg">Meja 5</button>
                    <button class="border border-yellow-500 py-2 px-4 rounded-lg">Meja 9</button>
                    <button class="border border-yellow-500 py-2 px-4 rounded-lg">Meja 13</button>
                    <button class="border border-yellow-500 py-2 px-4 rounded-lg">Meja 2</button>
                    <button class="border border-yellow-500 py-2 px-4 rounded-lg">Meja 6</button>
                    <button class="border border-yellow-500 py-2 px-4 rounded-lg">Meja 10</button>
                    <button class="border border-yellow-500 py-2 px-4 rounded-lg">Meja 14</button>
                    <button class="border border-yellow-500 py-2 px-4 rounded-lg">Meja 3</button>
                    <button class="border border-yellow-500 py-2 px-4 rounded-lg">Meja 7</button>
                    <button class="border border-yellow-500 py-2 px-4 rounded-lg">Meja 11</button>
                    <button class="border border-yellow-500 py-2 px-4 rounded-lg">Meja 15</button>
                    <button class="border border-yellow-500 py-2 px-4 rounded-lg">Meja 4</button>
                    <button class="border border-yellow-500 py-2 px-4 rounded-lg">Meja 8</button>
                    <button class="border border-yellow-500 py-2 px-4 rounded-lg">Meja 12</button>
                    <button class="border border-yellow-500 py-2 px-4 rounded-lg">Meja 16</button>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div id="booking-info">
        <h2>Booking Info</h2>
        <input type="text" id="name" placeholder="Nama Anda" />
        <button id="bookButton">Booking Meja</button>
    </div>
    <script src="ini.js"></script>
</body>
</html>