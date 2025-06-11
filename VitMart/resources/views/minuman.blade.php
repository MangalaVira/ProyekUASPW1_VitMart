<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  </head>
  <html lang="id">
    <head>
      <meta charset="UTF-8" />
      <title>Keranjang Belanja</title>
      <style>
        body {
          font-family: Arial, sans-serif;
          padding: 20px;
        }

        .grid-container {
          display: grid;
          grid-template-columns: repeat(3, 1fr);
          gap: 20px;
        }

        .item {
          border: 1px solid #ccc;
          border-radius: 10px;
          padding: 15px;
          text-align: center;
        }

        .item img {
          width: 130px;
          height: 130px;
          object-fit: contain;
          margin: 10px 0;
        }

        .quantity-control {
          display: flex;
          justify-content: center;
          align-items: center;
          gap: 10px;
          margin-top: 10px;
        }

        button {
          padding: 5px 10px;
          font-size: 18px;
          cursor: pointer;
        }

        .total {
          margin-top: 10px;
          font-weight: bold;
        }
      </style>
    </head>
    <body>
      <h1>Keranjang Belanja Minuman</h1>

      <div class="grid-container" id="produk-container"></div>

      <script>
        const produkList = [
          { id: 1, nama: "Cocacola", harga: 10000, gambar: 
                    src="{{ asset("/assets/assets/img/MiCocaColaK.png") }}" },
          { id: 2, nama: "Fanta", harga: 17000, gambar: 
                    src="{{ asset("/assets/assets/img/MiFanta.png") }}" },
          { id: 3, nama: "Golda", harga: 6500, gambar: 
                    src="{{ asset("/assets/assets/img/MiGolda.png") }}" },
          { id: 4, nama: "Le Mineral", harga: 9500, gambar: 
                    src="{{ asset("/assets/assets/img/MiLeMineral.png") }}" },
          { id: 5, nama: "Mizone", harga: 8000, gambar: 
                    src="{{ asset("/assets/assets/img/MiMizone.png") }}" },
          { id: 6, nama: "Pocari Sweat", harga: 9500, gambar: 
                    src="{{ asset("/assets/assets/img/MiPocari.png") }}" },
          { id: 7, nama: "Teh Pucuk Harum", harga: 5500, gambar: 
                    src="{{ asset("/assets/assets/img/MiPucuk.png") }}" },
          { id: 8, nama: "Sprite", harga: 9000, gambar: 
                    src="{{ asset("/assets/assets/img/MiSprite.png") }}" },
          { id: 9, nama: "Starbuck", harga: 18500, gambar: 
                    src="{{ asset("/assets/assets/img/MiStarbuck.png") }}" },
          { id: 10, nama: "Ultra Milk", harga: 8500, gambar: 
                    src="{{ asset("/assets/assets/img/MiUltraMilk.png") }}" },
          { id: 11, nama: "You C1000", harga: 13000, gambar: 
                    src="{{ asset("/assets/assets/img/MiYouC1000.png") }}" },
          { id: 12, nama: "Pepsi", harga: 10500, gambar: 
                  src="{{ asset("/assets/assets/img/MiPepsi.png") }}" },
        ];

        const jumlahMap = {};

        function formatRupiah(angka) {
          return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        function ubahJumlah(id, delta) {
          jumlahMap[id] += delta;
          if (jumlahMap[id] < 1) jumlahMap[id] = 1;

          const produk = produkList.find((p) => p.id === id);
          const total = jumlahMap[id] * produk.harga;

          document.getElementById("jumlah-" + id).textContent = jumlahMap[id];
          document.getElementById("total-" + id).textContent = formatRupiah(total);
        }

        const container = document.getElementById("produk-container");

        produkList.forEach((produk) => {
          jumlahMap[produk.id] = 1;

          const item = document.createElement("div");
          item.classList.add("item");

          item.innerHTML = `
      <h3>${produk.nama}</h3>
      <img src="${produk.gambar}" alt="${produk.nama}">
      <p>Harga: Rp ${formatRupiah(produk.harga)}</p>
      <div class="quantity-control">
        <button onclick="ubahJumlah(${produk.id}, -1)">-</button>
        <span id="jumlah-${produk.id}">1</span>
        <button onclick="ubahJumlah(${produk.id}, 1)">+</button>
      </div>
      <p class="total">Total: Rp <span id="total-${produk.id}">${formatRupiah(produk.harga)}</span></p>
    `;

          container.appendChild(item);
        });
      </script>
    </body>
  </html>
</html>