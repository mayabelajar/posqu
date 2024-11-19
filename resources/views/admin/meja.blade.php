<html lang="id">
<head>
    <!-- jQuery -->
    <script src="{{ asset('/lte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('/lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <link rel="stylesheet" href="{{ asset('/lte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/ini.css') }}">
    <link rel="stylesheet" href="{{ asset('/ini.js') }}">
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
             
            <div class="border border-yellow-500 p-4 rounded-lg mb-4 ml-2">
                <h2 class="text-lg font-semibold mb-4">Indoor</h2>
                <div id="tables">
                <div class="grid grid-cols-4 gap-4">
                    <button data-mj="01" class="tombol border py-2 px-4 rounded-lg">Meja 1</button>
                    <button data-mj="05" class="tombol border py-2 px-4 rounded-lg">Meja 5</button>
                    <button data-mj="09" class="tombol border py-2 px-4 rounded-lg">Meja 9</button>
                    <button data-mj="13" class="tombol border py-2 px-4 rounded-lg">Meja 13</button>
                    <button data-mj="02" class="tombol border py-2 px-4 rounded-lg">Meja 2</button>
                    <button data-mj="06" class="tombol border py-2 px-4 rounded-lg">Meja 6</button>
                    <button data-mj="10" class="tombol border py-2 px-4 rounded-lg">Meja 10</button>
                    <button data-mj="14" class="tombol border py-2 px-4 rounded-lg">Meja 14</button>
                    <button data-mj="03" class="tombol border py-2 px-4 rounded-lg">Meja 3</button>
                    <button data-mj="07" class="tombol border py-2 px-4 rounded-lg">Meja 7</button>
                    <button data-mj="11" class="tombol border py-2 px-4 rounded-lg">Meja 11</button>
                    <button data-mj="15" class="tombol border py-2 px-4 rounded-lg">Meja 15</button>
                    <button data-mj="04" class="tombol border py-2 px-4 rounded-lg">Meja 4</button>
                    <button data-mj="08" class="tombol border py-2 px-4 rounded-lg">Meja 8</button>
                    <button data-mj="12" class="tombol border py-2 px-4 rounded-lg">Meja 12</button>
                    <button data-mj="16" class="tombol border py-2 px-4 rounded-lg">Meja 16</button>
                </div>
                </div>
            </div>
            <!-- Outdoor Section -->
            <div class="border border-yellow-500 p-4 rounded-lg mb-4 ml-2">
                <h2 class="text-lg font-semibold mb-4">Outdoor</h2>
                <div id="tables">
                <div class="grid grid-cols-4 gap-4">
                    <button data-mj="01" class="tombol border py-2 px-4 rounded-lg">Meja 1</button>
                    <button data-mj="05" class="tombol border py-2 px-4 rounded-lg">Meja 5</button>
                    <button data-mj="09" class="tombol border py-2 px-4 rounded-lg">Meja 9</button>
                    <button data-mj="13" class="tombol border py-2 px-4 rounded-lg">Meja 13</button>
                    <button data-mj="02" class="tombol border py-2 px-4 rounded-lg">Meja 2</button>
                    <button data-mj="06" class="tombol border py-2 px-4 rounded-lg">Meja 6</button>
                    <button data-mj="10" class="tombol border py-2 px-4 rounded-lg">Meja 10</button>
                    <button data-mj="14" class="tombol border py-2 px-4 rounded-lg">Meja 14</button>
                    <button data-mj="03" class="tombol border py-2 px-4 rounded-lg">Meja 3</button>
                    <button data-mj="07" class="tombol border py-2 px-4 rounded-lg">Meja 7</button>
                    <button data-mj="11" class="tombol border py-2 px-4 rounded-lg">Meja 11</button>
                    <button data-mj="15" class="tombol border py-2 px-4 rounded-lg">Meja 15</button>
                    <button data-mj="04" class="tombol border py-2 px-4 rounded-lg">Meja 4</button>
                    <button data-mj="08" class="tombol border py-2 px-4 rounded-lg">Meja 8</button>
                    <button data-mj="12" class="tombol border py-2 px-4 rounded-lg">Meja 12</button>
                    <button data-mj="16" class="tombol border py-2 px-4 rounded-lg">Meja 16</button>
                </div>
                </div>
            </div>
        </div>
        <div class="bumej">
        <button type="button" class="kbl" ><a href="{{ url('/payment') }}">Kembali</a> </button>
        <button type="button" class="smp" ><a href="{{ url('/payment') }}">Simpan</a> </button>
        </div>
    </div>
    
    <!-- <div id="booking-info">
        <h2>Booking Info</h2>
        <input type="text" id="name" placeholder="Nama Anda" />
        <button id="bookButton">Booking Meja</button>
    </div> -->
    <script src="ini.js"></script> 
    <script>
        $(document).ready(function(){
            $(".tombol").click(function(){
                $(".tombol").css('background-color', 'white');
                $(this).css('background-color', '#F6C029');
                // console.log($(this).attr("data-mj"))
            });
        });
    </script>
</body>
</html>