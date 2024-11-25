const tables = document.querySelectorAll('.table');
const bookButton = document.getElementById('bookButton');
const nameInput = document.getElementById('name');
const listCard = document.querySelector(".listCard");
const total = document.querySelector(".total");
const body = document.querySelector("body");
const quantity = document.querySelector(".quantity");


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
 let produks = 
 localStorage.setItem('cart', JSON.stringify(produks))
let listCards = [];

const initApp = () => {
    produks.forEach((value, key) => {
        let newDiv = document.createElement("div");
        newDiv.classList.add("item");
        newDiv.innerHTML = `
                <img src ="img/${value.images}">  
                <div class ="title">${value.name}</div>
                <div class="harga">${value.price.toLocaleString()}</div>
                <button onclick="addToCard(${key})">Add To Card</button>
        `
        list.appendChild(newDiv)
    })
}

initApp()

const addToCard = (key) => {
    if(listCards[key] == null){
        listCards[key] = JSON.parse(JSON.stringify(produks[key]));
        listCards[key].quantity = 1
    }
    reloadCard();
}
const reloadCard = () => {
    listCard.innerHTML = "";
    let count = 0;
    let totalPrice = 0;

    listCards.forEach((value, key) => {
        totalPrice = totalPrice + value.price,
        count = count + value.quantity;

        if(value != null){
            let newDiv = document.createElement("li");
            newDiv.innerHTML = `
                <div><img src ="img/${value.image}"></div>
                <div class ="cardTitle">${value.name}</div>
                <div class ="cardPrice">${value.price.toLocaeString()}</div>

                <div>
                    <button style="background-color: #560bad"
                    class="cardButton" onclick = "changeQuantity(${key}, ${value.quantity - 1}")>-</button>
                    <div class ="count">${count}</div>
                    <button style="background-color: #560bad"
                    class="cardButton" onclick = "changeQuantity(${key}, ${value.quantity + 1}")>+</button>
                </div>
            `
            listCard.appendChild(newDiv);
        }
        total.innerHTML = totalPrice.toLocaleString();
        quantity.innerText = count;
    })
}

const changeQuantity = (key, quantity) => {
    if(quantity == 0){
        delete listCards[key]
    }
    else{
        listCard[key].quantity = quantity,
        listCard[key].price = quantity * produks[key].price
    }

    reloadCard()
}