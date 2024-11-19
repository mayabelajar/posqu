const tables = document.querySelectorAll('.table');
const bookButton = document.getElementById('bookButton');
const nameInput = document.getElementById('name');

let selectedTable = null;

tables.forEach(table => {
    table.addEventListener('click', function() {
        // Jika meja sudah dipesan, tidak melakukan apa-apa
        if (this.classList.contains('booked')) {
            alert('Meja ini sudah dipesan.');
            return;
        }

        // Menghapus pilihan meja sebelumnya
        if (selectedTable) {
            selectedTable.classList.remove('selected');
        }

        // Memilih meja baru
        selectedTable = this;
        selectedTable.classList.add('selected');
    });
});

bookButton.addEventListener('click', function() {
    if (!selectedTable) {
        alert('Silakan pilih meja terlebih dahulu.');
        return;
    }

    const name = nameInput.value.trim();
    if (!name) {
        alert('Silakan masukkan nama Anda.');
        return;
    }

    // Tandai meja sebagai dipesan
    selectedTable.classList.remove('available');
    selectedTable.classList.add('booked');
    selectedTable.innerText = `${selectedTable.dataset.table} (Dipesan oleh ${name})`;

    // Reset pilihan dan input
    selectedTable = null;
    nameInput.value = '';
    alert('Meja berhasil dipesan!');
});
function redirectToPage() {
    const form = document.getElementById('myForm');
    const pilihan = form.querySelector('input[name="pilihan"]:checked').value;

    if (pilihan === "meja") {
        window.location.href = "meja.blade.php";
    }
}