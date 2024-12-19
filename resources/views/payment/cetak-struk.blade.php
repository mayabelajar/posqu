<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Struk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            background-color: #f9f9f9;
            padding: 20px;
        }
        .struk {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px dashed #000;
            border-radius: 5px;
            background-color: #fff;
            text-align: center;
        }
        .struk-header {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .struk-subheader {
            font-size: 12px;
            margin-bottom: 20px;
        }
        .struk-table {
            width: 100%;
            font-size: 12px;
            margin-bottom: 15px;
        }
        .struk-table th, .struk-table td {
            text-align: left;
            padding: 4px 0;
        }
        .struk-footer {
            font-size: 12px;
            margin-top: 20px;
        }
        .btn-print {
            margin-top: 20px;
        }
        @media print {
        .btn-print {
            display: none;
        }
    }
    </style>
</head>
<body>
    <div class="struk">
        <div class="struk-header">POSq</div>
        <div class="struk-subheader">
            Address: 6010 Alpnach, Swiss<br>
            Tel: +62 812 3456 7890
        </div>
        <hr>
        <div id="data-struk"></div>
        <hr>
        <button class="btn btn-primary btn-sm w-100 btn-print" onclick="window.print()">Cetak Struk</button>
    </div>

    <script>
    $(document).ready(function () {
        const data = JSON.parse(sessionStorage.getItem("cetakStruk"));

        if (!data) {
            alert("Tidak ada data untuk dicetak.");
            window.close();
            return;
        }

        // Ambil tanggal dan waktu saat ini
        const now = new Date();
        const tanggal = now.toLocaleDateString('id-ID'); // Format: dd/mm/yyyy
        const waktu = now.toLocaleTimeString('id-ID');   // Format: hh:mm:ss

        let html = `
            <div style="text-align: center; margin-bottom: 15px;">
                <div style="margin-bottom: 5px;">${tanggal}</div>
                <div style="margin-bottom: 15px;">${waktu}</div>
            </div>
            <hr style="border: 1px solid #ccc; margin-bottom: 20px;">

            <!-- Bagian Tabel Transaksi -->
            <div style="text-align: center; margin-bottom: 20px;">
                <table class="struk-table" style="margin: 0 auto; text-align: center; width: 100%;">
                    <thead>
                        <tr>
                            <th>ITEM</th>
                            <th>QTY</th>
                            <th>HARGA/QTY</th>
                        </tr>
                    </thead>
                    <tbody>
        `;

        data.keranjang.forEach(item => {
            html += `
                <tr>
                    <td>${item.nama}</td>
                    <td>${item.quantity}</td>
                    <td>${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(item.harga)}</td>
                </tr>
            `;
        });

        html += `
                    </tbody>
                </table>
            </div>
            <hr style="border: 1px solid #ccc; margin-bottom: 20px;">

            <!-- Bagian Total, Bayar, dan Kembalian -->
            <div class="struk-footer" style="text-align: left; margin-top: 20px; margin-bottom: 20px;">
                <p><strong>Total: </strong>${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(data.total)}</p>
                <p><strong>Bayar: </strong>${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(data.bayar)}</p>
                <p><strong>Kembalian: </strong>${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(data.kembalian)}</p>
            </div>
            <hr style="border: 1px solid #ccc; margin-bottom: 20px;">

            <!-- Footer Terima Kasih -->
            <div style="text-align: center; margin-top: 20px;">
                <strong>Terimakasih</strong><br>
                Kutunggu kamu kembali kesini
            </div>
        `;
        $("#data-struk").html(html);
    });
</script>
</body>
</html>