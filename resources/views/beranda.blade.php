@extends('layouts.master')
@section('title', 'Beranda')

@push('styles')
<style>

/* Reset & box-sizing */
*,
*::before,
*::after {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* Container hero penuh layar, background image */
.hero {
  position: relative;
  width: 100%;
  height: calc(100vh - 72px);
  display: flex;
  align-items: center;
  padding: 0 7vw;
  overflow: hidden;
}

/* Pseudo-element untuk background dengan opacity 8% */
.hero::before {
  content: "";
  position: absolute;
  inset: 0;
  background: url('{{ asset("assets/images/page1_1//bg.png") }}') center/cover no-repeat;
  opacity: 1;
  z-index: 1;
}

/* Lapisan putih di atas bg, untuk meratakan kontras */
.hero::after {
  content: "";
  position: absolute;
  inset: 0;
  background: rgba(255, 255, 255, 0.4);
  z-index: 2;
}

/* Wrapper teks kiri */
.hero-text {
  flex: 1;
  max-width: 650px;
  color: #000;
  font-family: 'Poppins';
  z-index: 3
}

.hero-text .subtitle {
  font-size: 14px;
  font-weight: 500;
  color: #678C2D;
  margin-bottom: 8px;
  text-transform: uppercase;
  letter-spacing: 1px;
  z-index: 3;
}

.hero-text h1 {
  font-size: 3rem;
  font-weight: 450;
  line-height: 1.2;
  margin-bottom: 16px;
}

.hero-text p {
  font-size: 1rem;
  line-height: 1.6;
  color: #555;
  margin-bottom: 32px;
  max-width: 480px;
}

.hero-text .btn-start {
  display: inline-block;
  padding: 12px 32px;
  background-color: #80A33E;
  color: #fff;
  font-family: 'Poppins', sans-serif;
  font-weight: 600;
  border-radius: 4px;
  text-decoration: none;
  transition: background .3s, transform .3s;
}

.hero-text .btn-start:hover {
  background-color: #5a7a1c;
  transform: translateY(-2px);
}

/* Lingkaran dekorasi */
.ellipse {
  position: absolute;
  width: 355px;
  height: 500px;
  background: url('{{ asset("assets/images/page1_1/ellipse.png") }}') center/contain no-repeat;
  pointer-events: none;
  opacity: 1;
  z-index: 3;
}

.ellipse.top-right {
  top: -40px;
  right: -40px;
}

/* Gambar kendaraan */
.img-motor,
.img-mobil {
  position: absolute;
  object-fit: cover;
  /* box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15); */
}

.img-motor {
  top: 25px;
  right: 230px;
  z-index: 4;
  width: 220px;
  height: auto;
}

.img-mobil {
  bottom: 80px;
  right: 50px;
  width: 280px;
  height: auto;
  z-index: 5;
}

/* ===== Section “Apa itu Carbon Footprint?” ===== */
.about {
  background-color: #FFFDE7;
  padding: 80px 0 60px 0;
  /* ruang atas dan bawah */
  position: relative;
}

.about-container {
  display: flex;
  justify-content: space-between;
  align-items: flex-end;
  /* semua anak dirapatkan ke bawah */
  gap: 60px;
  max-width: 1200px;
  margin: 0 auto;
  padding-bottom: 0;
  /* hapus padding/margin bottom di container */
}

.about-image-wrapper {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 380px;
  /* ukuran gambar yang lebih kecil */
  height: auto;
  z-index: 2;
}

.about-circle {
  width: 100%;
  height: auto;
  display: block;
}

.about-photo {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: auto;
  border-radius: 8px;
}

.about-text {
  text-align: left;
  /* teks rata kiri */
  max-width: 800px;
  margin-top: 2px;
  /* beri jarak atas */
  margin-bottom: 60px;
  /* dan juga jarak bawah */
  margin-left: 410px;
}


.about-text p {
  color: #777777;
  font-family: 'Poppins';
  font-size: 1.1rem;
  line-height: 1.6;
}


/* ===== Section “Kenali Sumber Jejak Karbonmu” ===== */
.sources {
  position: relative;
  background: #fff;
  padding: 80px 7vw 100px;
}

.sources-title {
  text-align: center;
  font-size: 2rem;
  font-weight: 700;
  margin-bottom: 40px;
  color: #222;
}

.sources-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  gap: 30px;
  max-width: 1200px;
  margin: 0 auto;
}

.source-card {
  position: relative;
  background: #FFFFFF;
  border-radius: 12px;
  padding: 24px 16px;
  text-align: center;
  box-shadow: 0 5px 8px rgba(0, 0, 0, 0.15);
  overflow: visible;
}

.source-icon {
  width: 64px;
  height: 64px;
  margin: 0 auto 16px;
  background-size: cover;
  border-radius: 50%;
}

.source-card h3 {
  font-size: 1.1rem;
  margin-bottom: 12px;
  font-weight: 600;
  color: #333;
}

.source-card p {
  font-size: 0.9rem;
  line-height: 1.4;
  color: #777;
}

/* Dekorasi kanan atas */
.decoration.top-right {
  position: absolute;
  top: 0;
  right: calc(-3vw);
  /* geser ke kanan sejauh padding */
  width: 200px;
  /* sesuaikan */
  height: 200px;
  /* sesuaikan */
  background: url('{{ asset("assets/images/page1_3/asset1_3.6.png") }}') center/contain no-repeat;
  z-index: 3;
}

/* Dekorasi kiri atas */
.decoration.top-left {
  position: absolute;
  top: 0;
  left: calc(-3vw);
  /* geser ke kiri sejauh padding */
  width: 200px;
  /* sama seperti top-right */
  height: 200px;
  background: url('{{ asset("assets/images/page1_3/asset1_3.5.png") }}') center/contain no-repeat;
  z-index: 3;
}

/* Dekorasi kiri atas */
.decoration_2 {
  position: absolute;
  top: -2px;
  right: 0px;
  width: 100px;
  height: 100px;
  background: url('{{ asset("assets/images/page1_3/asset1_3.7.png") }}') center/contain no-repeat;
  pointer-events: none;
  z-index: 2;
}

html,
body {
  overflow-x: hidden;
}



/* Responsive */
@media (max-width: 1024px) {
  .hero-text h1 {
    font-size: 2.5rem;
  }

  .ellipse {
    width: 300px;
    height: 300px;
  }

  .img-motor,
  .img-mobil {
    width: 180px;
    height: 180px;
  }

  .about-image-wrapper {
    width: 250px;
  }

  .about-text {
    margin-left: 270px;
  }
}

.infografik {
  background-color: #FFFDE7;
  padding: 80px 7vw;
  font-family: 'Poppins', sans-serif;
}

.infografik-container {
  display: flex;
  flex-wrap: wrap;
  gap: 60px;
  align-items: flex-start;
  justify-content: space-between;
}

.infografik-left {
  flex: 1;
  min-width: 300px;
}

.infografik-left h2 {
  font-size: 1.8rem;
  font-weight: 700;
  margin-bottom: 12px;
  color: #1d1d1d;
}

.infografik-left p {
  color: #666;
  font-size: 1rem;
  margin-bottom: 24px;
}

.infografik-image-wrapper {
  position: relative;
  max-width: 100%;
}

.infografik-image {
  width: 100%;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.icon1 {
  position: absolute;
  top: 12px;
  left: 12px;
  width: 48px;
  height: 48px;
}

.icon2 {
  position: absolute;
  bottom: 12px;
  right: 12px;
  width: 48px;
  height: 48px;
}

.infografik-right {
  flex: 1;
  min-width: 300px;
}

.infografik-right h3 {
  font-size: 1.3rem;
  font-weight: 600;
  margin-bottom: 16px;
  color: #1a1a1a;
}

.infografik-steps {
  list-style: none;
  padding: 0;
  margin: 0;
}

.infografik-steps li {
  display: flex;
  align-items: flex-start;
  gap: 16px;
  margin-bottom: 20px;
}

.infografik-steps li img {
  width: 44px;
  height: 44px;
  flex-shrink: 0;
}

.infografik-steps li strong {
  font-size: 1rem;
  font-weight: 600;
  color: #333;
}

.infografik-steps li p {
  font-size: 0.9rem;
  color: #555;
  margin-top: 4px;
}



@media (max-width: 768px) {
  .hero {
    flex-direction: column;
    justify-content: center;
    text-align: center;
  }

  .hero-text {
    max-width: 100%;
  }

  .img-motor,
  .img-mobil,
  .ellipse {
    display: none;
  }

  .about-container {
    flex-direction: column;
    text-align: center;
  }

  .about-image-wrapper {
    position: static;
    width: 100%;
    margin-bottom: 20px;
  }

  .about-photo {
    position: static;
    width: 80%;
    margin: 0 auto;
  }

  .about-text {
    margin-left: 0;
    margin-bottom: 40px;
  }

  .sources {
    padding: 60px 5vw 80px;
  }

  .sources-title {
    font-size: 1.75rem;
    margin-bottom: 24px;
  }

  .source-card {
    padding: 20px 12px;
}

  @media (max-width: 768px) {
    .infografik-container {
      flex-direction: column;
    }

    .infografik-left,
    .infografik-right {
      width: 100%;
    }
  }
</style>
@endpush



@section('content')
<div class="ellipse top-right"></div>
<section class="hero">

  <div class="hero-text">
    <div class="subtitle">Calculator Karbon</div>
    <h1>Hitung Jejak Karbon<br>Kendaraanmu Sekarang</h1>
    <p>
      Setiap perjalanan meninggalkan jejak—tapi kamu bisa bertanggung jawab. Mulai sekarang, ukur emisi kendaraanmu dan
      ambil langkah kecil untuk masa depan bumi yang lebih bersih dan lestari.
    </p>
    <a href="{{ route('kalkulator') }}" class="btn-start">Mulai Hitung Sekarang</a>
  </div>
  <img src="{{ asset('assets/images/page1_1//mobil.png') }}" alt="Mobil" class="img-mobil">
  <img src="{{ asset('assets/images/page1_1//motor.png') }}" alt="Motor" class="img-motor">
</section>

<section class="about">
  <div class="about-container">
    <div class="about-image-wrapper">
      <img src="{{ asset('assets/images/page1_2/asset1_2.2.png') }}" alt="Lingkaran Biru" class="about-circle">
      <img src="{{ asset('assets/images/page1_2/asset1_2.1.png') }}" alt="Orang & Turbin" class="about-photo">
    </div>
    <div class="about-text">
      <h2>Apa itu Carbon Footprint ?</h2> <br>
      <p>
        Jejak karbon adalah jumlah total emisi gas rumah kaca—terutama karbon dioksida (CO₂)—yang dihasilkan oleh
        aktivitas manusia.
        Contohnya, saat kita mengendarai motor atau mobil, membakar bahan bakar menghasilkan CO₂ yang ikut mencemari
        udara dan mempercepat perubahan iklim.
        Dengan menghitung jejak karbon kendaraanmu, kamu bisa lebih sadar dampak aktivitas sehari-hari terhadap
        lingkungan,
        dan ikut serta mengurangi emisi dengan langkah sederhana seperti menanam pohon atau ikut program carbon offset.
      </p>
    </div>
  </div>
</section>

<section class="sources">
  <div class="decoration top-right"></div>
  <div class="decoration top-left"></div>
  <h2 class="sources-title">Kenali Sumber Jejak Karbonmu</h2>
  <div class="sources-grid">
    <div class="source-card">
      <div class="decoration_2 "></div>
      <div class="source-icon" style="background-image:url('{{ asset('assets/images/page1_3/asset1_3.1.png') }}')">
      </div>
      <h3>Transportasi Darat</h3>
      <p>Emisi dari kendaraan pribadi seperti motor dan mobil yang digunakan sehari-hari.</p>
    </div>
    <div class="source-card">
      <div class="decoration_2 "></div>

      <div class="source-icon" style="background-image:url('{{ asset('assets/images/page1_3/asset1_3.2.png') }}')">
      </div>
      <h3>Transportasi Udara</h3>
      <p>Penerbangan menyumbang emisi tinggi per perjalanan, terutama jarak jauh.</p>
    </div>
    <div class="source-card">
      <div class="decoration_2 "></div>
      <div class="source-icon" style="background-image:url('{{ asset('assets/images/page1_3/asset1_3.3.png') }}')">
      </div>
      <h3>Transportasi Laut</h3>
      <p>Perjalanan menggunakan kapal menghasilkan karbon, terutama untuk jarak jauh.</p>
    </div>
    <div class="source-card">
      <div class="decoration_2 "></div>
      <div class="source-icon" style="background-image:url('{{ asset('assets/images/page1_3/asset1_3.4.png') }}')">
      </div>
      <h3>Peralatan Rumah Tangga</h3>
      <p>Penggunaan listrik dari alat-alat rumah seperti AC, kulkas, dan elektronik lainnya.</p>
    </div>
  </div>
</section>
<section style="background-color: #fefee6; padding: 60px 7vw; font-family: 'Poppins', sans-serif;">
  <div style="display: flex; flex-wrap: wrap; gap: 40px; align-items: center; justify-content: center;">
    
    <!-- KIRI -->
    <div style="flex: 1 1 400px; max-width: 500px;">
      <h2 style="font-size: 1.8rem; font-weight: 700; margin-bottom: 8px; color: #1a1a1a;">
        5 Langkah Infografik Kalkulator Karbon
      </h2>
      <p style="font-size: 1rem; color: #555; margin-bottom: 24px;">
        Yuk mulai sekarang! Setiap langkah kecilmu berarti untuk masa depan bumi.
      </p>
      <div style="position: relative; border-radius: 12px; overflow: hidden; box-shadow: 0 8px 16px rgba(0,0,0,0.1);">
        <img src="{{ asset('assets/images/infografik/windfarm.png') }}" alt="Infografik" style="width: 100%; height: auto; display: block;">
        <!-- Ikon overlay kiri atas -->
        <img src="{{ asset('assets/images/infografik/ikon1.png') }}" alt="icon1" style="position: absolute; top: 16px; left: 16px; width: 48px;">
        <!-- Ikon overlay kanan bawah -->
        <img src="{{ asset('assets/images/infografik/ikon2.png') }}" alt="icon2" style="position: absolute; bottom: 16px; right: 16px; width: 48px;">
      </div>
    </div>

    <!-- KANAN -->
    <div style="flex: 1 1 400px; max-width: 500px;">
      <h3 style="font-weight: 600; font-size: 1.2rem; margin-bottom: 20px;">Langkah-langkah :</h3>
      <ul style="display: flex; flex-direction: column; gap: 20px; padding: 0; margin: 0;">
        @php
          $steps = [
            ['ikon' => 'step1.png', 'judul' => 'Pilih Kendaraan & Hitung Emisi', 'desc' => 'Tentukan jenis kendaraan, bahan bakar, dan frekuensi penggunaan.'],
            ['ikon' => 'step2.png', 'judul' => 'Pilih Proyek Offset', 'desc' => 'Pilih lokasi dan jenis penanaman pohon untuk menebus emisi Anda.'],
            ['ikon' => 'step3.png', 'judul' => 'Isi Data Diri', 'desc' => 'Masukkan nama dan kontak untuk proses donasi.'],
            ['ikon' => 'step4.png', 'judul' => 'Konfirmasi Pembayaran', 'desc' => 'Cek ringkasan, lalu selesaikan transaksi dengan mudah dan aman.'],
            ['ikon' => 'step5.png', 'judul' => 'Terima kasih Sudah Berkontribusi!', 'desc' => 'Akses kalkulator untuk menghitung emisi karbon harian Anda.'],
          ];
        @endphp

        @foreach($steps as $step)
        <li style="display: flex; align-items: flex-start; gap: 16px;">
          <img src="{{ asset('assets/images/infografik/' . $step['ikon']) }}" alt="ikon" style="width: 42px; height: 42px;">
          <div>
            <p style="margin: 0; font-weight: 600;">{{ $step['judul'] }}</p>
            <p style="margin: 4px 0 0; font-size: 0.95rem; color: #555;">{{ $step['desc'] }}</p>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
</section>

<script src="//unpkg.com/alpinejs" defer></script>

<section class="offset-section" style="padding: 60px 7vw; background: #fff;">
  <h2 style="text-align: center; font-size: 2rem; font-weight: 700; margin-bottom: 40px; font-family: 'Poppins', sans-serif;">
    Kegiatan Karbon Offset
  </h2>

  @php
    $cards = [
      [
        'judul' => 'Reforestasi Hutan',
        'lokasi' => 'Sumatera',
        'gambar' => 'Reforestasi.jpeg',
        'deskripsi' => 'Proyek ini bertujuan untuk memulihkan hutan tropis di wilayah Sumatera dengan penanaman pohon dan konservasi tanah untuk menyerap emisi karbon secara alami.',
      ],
      [
        'judul' => 'Pengelolaan Lahan Berkelanjutan',
        'lokasi' => 'Jawa Barat',
        'gambar' => 'Pengelolaan Lahan.jpeg',
        'deskripsi' => 'Program ini mengoptimalkan penggunaan lahan pertanian dengan teknik ramah lingkungan seperti pertanian organik, rotasi tanaman, dan konservasi air untuk menyerap karbon.',
      ],
      [
        'judul' => 'Proyek Energi Terbarukan',
        'lokasi' => 'NTT',
        'gambar' => 'Energi Terbarukan.jpeg',
        'deskripsi' => 'Proyek ini menyediakan solusi energi bersih seperti tenaga surya dan angin untuk menggantikan bahan bakar fosil dan mengurangi emisi karbon.',
      ],
    ];
  @endphp

  <div 
    class="offset-cards" 
    x-data="{ openCard: null }"
    style="display: flex; flex-wrap: wrap; gap: 24px; justify-content: center;"
  >
    @foreach ($cards as $index => $card)
    <div 
      style="width: 300px; font-family: 'Poppins', sans-serif; background: #fff; border-radius: 16px; box-shadow: 0 6px 12px rgba(0,0,0,0.1); overflow: hidden; transition: all 0.3s;"
    >
      <!-- Gambar dan Judul -->
      <div style="position: relative;">
        <img 
          src="{{ asset('assets/images/infografik/' . $card['gambar']) }}" 
          alt="{{ $card['judul'] }}" 
          style="width: 100%; height: 250px; object-fit: cover;"
        >
        <div style="position: absolute; top: 0; left: 0; padding: 16px; color: white; background: linear-gradient(to bottom, rgba(0,0,0,0.7), rgba(0,0,0,0)); width: 100%;">
          <p style="font-weight: 700; font-size: 1rem; margin-bottom: 4px;">{{ $card['judul'] }}</p>
          <p style="font-size: 0.85rem;">Lokasi: {{ $card['lokasi'] }}</p>
        </div>
      </div>

      <!-- Tombol Lihat/Tutup -->
      <div style="padding: 16px; text-align: center;">
        <button 
          @click="openCard === {{ $index }} ? openCard = null : openCard = {{ $index }}"
          style="width: 100%; background: #f4f4f4; padding: 12px; border-radius: 24px; font-weight: 600; color: #000; border: 2px solid #000;">
          <span x-text="openCard === {{ $index }} ? 'Tutup Detail' : 'Lihat Detail'"></span>
        </button>
      </div>

      <!-- Detail Konten Expand -->
      <div 
        x-show="openCard === {{ $index }}" 
        x-transition 
        style="padding: 16px; background: #f9f9f9; font-size: 0.95rem; color: #333;"
      >
        <p style="margin-bottom: 8px;">{{ $card['deskripsi'] }}</p>
        <p><strong>Lokasi:</strong> {{ $card['lokasi'] }}</p>
      </div>
    </div>
    @endforeach
  </div>
</section>

@endsection