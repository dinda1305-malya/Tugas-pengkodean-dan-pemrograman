// Array untuk menyimpan data produk
let inventory = [];
let transactions = [];

// Fungsi untuk menambahkan produk
function addProduct() {
    const name = document.getElementById("productName").value;
    const stock = parseInt(document.getElementById("productStock").value);

    if (name && stock > 0) {
        inventory.push({ name, stock });
        updateInventory();
        document.getElementById("productName").value = "";
        document.getElementById("productStock").value = "";
    } else {
        alert("Mohon isi data dengan benar!");
    }
}

// Fungsi untuk memperbarui daftar stok
function updateInventory() {
    const inventoryList = document.getElementById("inventoryList");
    const sellProductSelect = document.getElementById("sellProduct");
    
    inventoryList.innerHTML = "";
    sellProductSelect.innerHTML = "";

    inventory.forEach((item, index) => {
        // Menambahkan ke tabel stok
        inventoryList.innerHTML += `
            <tr>
                <td>${item.name}</td>
                <td>${item.stock}</td>
                <td><button onclick="deleteProduct(${index})">Hapus</button></td>
            </tr>
        `;

        // Menambahkan ke daftar pilihan penjualan
        sellProductSelect.innerHTML += `<option value="${index}">${item.name}</option>`;
    });
}

// Fungsi untuk menghapus produk dari stok
function deleteProduct(index) {
    inventory.splice(index, 1);
    updateInventory();
}

// Fungsi untuk menjual produk
function sellProduct() {
    const productIndex = document.getElementById("sellProduct").value;
    const quantity = parseInt(document.getElementById("sellQuantity").value);

    if (productIndex !== "" && quantity > 0) {
        if (inventory[productIndex].stock >= quantity) {
            inventory[productIndex].stock -= quantity;

            // Simpan transaksi
            transactions.push(`${inventory[productIndex].name} terjual ${quantity} unit`);
            updateInventory();
            updateTransactions();
        } else {
            alert("Stok tidak mencukupi!");
        }
    } else {
        alert("Mohon isi data dengan benar!");
    }
}

// Fungsi untuk memperbarui daftar transaksi
function updateTransactions() {
    const transactionList = document.getElementById("transactionList");
    transactionList.innerHTML = transactions.map(item => `<li>${item}</li>`).join("");
}

// Inisialisasi tampilan
updateInventory();
updateTransactions();
