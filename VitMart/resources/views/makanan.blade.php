<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Keranjang Belanja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
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
        width: 100px;
        height: 100px;
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
    <h1>Keranjang Belanja Makanan</h1>

    <form id="keranjangForm" action="{{ route('keranjang.store') }}" method="POST">
        @csrf
        <div class="grid-container" id="produk-container"></div>
        <input type="hidden" name="multi" value="1">
        <div class="text-center mt-4">
          <button type="submit" class="btn btn-success">Masukkan ke Keranjang</button>
        </div>
      </form>

    <script>
      const produkList = [
        { id: "MA1", nama: "Big Babol", harga: 13500, gambar: "/assets/assets/img/MaBigBabol.png" },
        { id: "MA2", nama: "Chitato", harga: 20000, gambar: "/assets/assets/img/MaChitato.png" },
        { id: "MA3", nama: "Kacang 2 Kelinci", harga: 35000, gambar: "/assets/assets/img/MaKacang.png" },
        { id: "MA4", nama: "Khong Guan", harga: 140000, gambar: "/assets/assets/img/MaKhongGuan.png" },
        { id: "MA5", nama: "Monde", harga: 170000, gambar: "/assets/assets/img/MaMonde.png" },
        { id: "MA6", nama: "Nano-Nano", harga: 10000, gambar: "/assets/assets/img/MaNano.png" },
        { id: "MA7", nama: "Pringles", harga: 30000, gambar: "/assets/assets/img/MaPringles.png" },
        { id: "MA8", nama: "SilverQueen", harga: 30000, gambar: "/assets/assets/img/MaQueen.png" },
        { id: "MA9", nama: "Kanzler Chicken Nuggget", harga: 65000, gambar: "/assets/assets/img/MaNugget.png" },
        { id: "MA10", nama: "Oreo Supreme", harga: 650000, gambar: "/assets/assets/img/MaSupreme.png" },
        { id: "MA11", nama: "Tango", harga: 7000, gambar: "/assets/assets/img/MaTango.png" },
        { id: "MA12", nama: "Roma Kelapa", harga: 14500, gambar: "/assets/assets/img/MaRomaKelapa.png" }
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
    document.getElementById("input-" + id).value = jumlahMap[id];
  }

  const container = document.getElementById("produk-container");

  produkList.forEach((produk) => {
    jumlahMap[produk.id] = 0;

    const item = document.createElement("div");
    item.classList.add("item");

    item.innerHTML = `
      <h3>${produk.nama}</h3>
      <img src="${produk.gambar}" alt="${produk.nama}">
      <p>Harga: Rp ${formatRupiah(produk.harga)}</p>
      <div class="quantity-control">
        <button type="button" onclick="ubahJumlah('${produk.id}', -1)">-</button>
        <span id="jumlah-${produk.id}">0</span>
        <button type="button" onclick="ubahJumlah('${produk.id}', 1)">+</button>
      </div>
      <p class="total">Total: Rp <span id="total-${produk.id}">0</span></p>
      <input type="hidden" name="products[${produk.id}]" id="input-${produk.id}" value="0">
    `;

    container.appendChild(item);
  });
</script>