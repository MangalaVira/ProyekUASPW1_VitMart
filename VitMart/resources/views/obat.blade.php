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
          width: 135px;
          height: 135px;
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
      <h1>Keranjang Belanja Obat-Obatan</h1>

      <div class="grid-container" id="produk-container"></div>

      <script>
        const produkList = [
          { id: 1, nama: "Bodrex", harga: 12500, gambar: 
                    src="{{ asset("/assets/assets/img/ObBodrex.png") }}" },
          { id: 2, nama: "Entro Stop", harga: 16000, gambar: 
                    src="{{ asset("/assets/assets/img/ObEntroStop.png") }}" },
          { id: 3, nama: "Hansaplast", harga: 11500, gambar: 
                    src="{{ asset("/assets/assets/img/ObHansaplast.png") }}" },
          { id: 4, nama: "Hot In Cream", harga: 23000, gambar: 
                    src="{{ asset("/assets/assets/img/ObHotInCream.png") }}" },
          { id: 5, nama: "Koyo Cabe", harga: 17000, gambar: 
                    src="{{ asset("/assets/assets/img/ObKoyoCabe.png") }}" },
          { id: 6, nama: "Minyak Kayu Putih", harga: 30000, gambar: 
                    src="{{ asset("/assets/assets/img/ObMinyakKayuPutih.png") }}" },
          { id: 7, nama: "Mylanta", harga: 85000, gambar: 
                    src="{{ asset("/assets/assets/img/ObMylanta.png") }}" },
          { id: 8, nama: "OBH Combi", harga: 27500, gambar: 
                    src="{{ asset("/assets/assets/img/ObOBHCombi.png") }}" },
          { id: 9, nama: "Sangobion", harga: 26000, gambar: 
                    src="{{ asset("/assets/assets/img/ObSangobion.png") }}" },
          { id: 10, nama: "Tolak Angin", harga: 5000, gambar: 
                    src="{{ asset("/assets/assets/img/ObTolakAngin.png") }}" },
          { id: 11, nama: "Antimo", harga: 7000, gambar: 
                    src="{{ asset("/assets/assets/img/ObAntimo.png") }}" },
          { id: 12, nama: "Oskadon", harga: 3000, gambar: 
                    src="{{ asset("/assets/assets/img/ObOskadon.png") }}" },
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