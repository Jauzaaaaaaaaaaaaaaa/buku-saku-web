<?php
/*
  ==========================================================
  FILE: belajar.php
  FUNGSI: Catatan belajar PHP Native.
  PHP Native artinya memakai PHP murni tanpa framework seperti Laravel/CodeIgniter.

  Cara menjalankan:
  1. Simpan folder ini di htdocs jika memakai XAMPP, lalu buka:
     http://localhost/materi_php_html_css_native/belajar.php

  2. Atau pakai server bawaan PHP dari terminal:
     php -S localhost:8000
     lalu buka:
     http://localhost:8000/belajar.php
  ==========================================================
*/

/*
  echo
  Digunakan untuk menampilkan teks/output ke browser.
*/
$judulHalaman = "Belajar PHP Native";

/*
  Variable diawali tanda $
  Contoh:
  $nama = "Jauza";
*/
$namaDefault = "Teman Belajar";

/*
  Tipe data dasar:
  string  = teks
  integer = angka bulat
  float   = angka desimal
  boolean = true/false
  array   = kumpulan data
*/
$umur = 20;
$nilai = 88.5;
$aktif = true;

/*
  Array indexed:
  Data dipanggil memakai nomor index mulai dari 0.
*/
$materi = ["HTML", "CSS", "PHP Native"];

/*
  Array associative:
  Data dipanggil memakai key/nama.
*/
$profil = [
  "nama" => "Jauza",
  "role" => "Pemula Web Developer",
  "target" => "Membuat aplikasi web sederhana"
];

/*
  Function:
  Blok kode yang bisa dipanggil berulang.
*/
function e($text)
{
  /*
    htmlspecialchars digunakan untuk mencegah XSS sederhana
    saat menampilkan data dari user ke HTML.
  */
  return htmlspecialchars($text, ENT_QUOTES, "UTF-8");
}

function hitungLuasPersegiPanjang($panjang, $lebar)
{
  /*
    return mengembalikan hasil dari function.
  */
  return $panjang * $lebar;
}

/*
  $_SERVER["REQUEST_METHOD"]
  Mengecek metode request yang dipakai, misalnya GET atau POST.
*/
$hasilForm = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  /*
    $_POST digunakan untuk mengambil data dari form method POST.
    Operator ?? artinya jika data tidak ada, gunakan nilai default.
  */
  $nama = $_POST["nama"] ?? "";
  $email = $_POST["email"] ?? "";
  $pesan = $_POST["pesan"] ?? "";
  $kelas = $_POST["kelas"] ?? "";
  $setuju = $_POST["setuju"] ?? "tidak";

  /*
    trim menghapus spasi di awal dan akhir teks.
  */
  $nama = trim($nama);
  $email = trim($email);
  $pesan = trim($pesan);

  /*
    Percabangan if/else:
    Digunakan untuk membuat keputusan.
  */
  if ($nama === "" || $email === "") {
    $hasilForm = "Nama dan email wajib diisi.";
  } else {
    $hasilForm = "Halo, " . e($nama) . ". Data kamu berhasil diterima.";
  }
}

/*
  Contoh class sederhana.
  Class adalah cetakan/object blueprint.
*/
class Siswa
{
  public $nama;
  public $kelas;

  public function __construct($nama, $kelas)
  {
    /*
      $this mengacu pada object saat ini.
    */
    $this->nama = $nama;
    $this->kelas = $kelas;
  }

  public function perkenalan()
  {
    return "Nama saya {$this->nama}, saya belajar {$this->kelas}.";
  }
}

$siswa = new Siswa("Jauza", "PHP Native");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo e($judulHalaman); ?></title>
  <link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500&family=Rubik:wght@400;500;700;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="atelier/atelier.css">
<link rel="stylesheet" href="atelier/theme.css">
<script src="atelier/theme.js"></script>
<script src="atelier/atelier.js"></script>
</head>
<body>
  <header class="site-header">
    <div class="container header-layout">
      <div>
        <h1><?php echo e($judulHalaman); ?></h1>
        <p>Contoh PHP Native dengan komentar fungsi perintah.</p>
      </div>

      <nav class="navbar">
        <a href="index.html">HTML/CSS</a>
        <a href="#dasar">Dasar PHP</a>
        <a href="#form">Form</a>
        <a href="#crud">CRUD</a>
      </nav>
    </div>
  </header>

  <main>
    <section class="hero">
      <div class="container">
        <h2>PHP Dipakai untuk Apa?</h2>
        <p>
          PHP berjalan di server. PHP bisa menerima form, login, membaca database,
          membuat halaman dinamis, upload file, dan membuat fitur CRUD.
        </p>
      </div>
    </section>

    <section id="dasar" class="container section-card">
      <h2>1. Menampilkan Output</h2>

      <p>
        Contoh echo:
        <strong><?php echo "Halo, " . e($namaDefault); ?></strong>
      </p>

      <pre><code>&lt;?php
echo "Halo dunia";
?&gt;</code></pre>

      <h2>2. Variable dan Tipe Data</h2>

      <table>
        <thead>
          <tr>
            <th>Perintah</th>
            <th>Fungsi</th>
            <th>Contoh Hasil</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><code>$nama = "Jauza";</code></td>
            <td>Membuat variable teks/string.</td>
            <td><?php echo e($profil["nama"]); ?></td>
          </tr>
          <tr>
            <td><code>$umur = 20;</code></td>
            <td>Membuat variable angka integer.</td>
            <td><?php echo e($umur); ?></td>
          </tr>
          <tr>
            <td><code>$nilai = 88.5;</code></td>
            <td>Membuat variable angka desimal/float.</td>
            <td><?php echo e($nilai); ?></td>
          </tr>
          <tr>
            <td><code>$aktif = true;</code></td>
            <td>Membuat variable boolean.</td>
            <td><?php echo $aktif ? "Aktif" : "Tidak aktif"; ?></td>
          </tr>
        </tbody>
      </table>

      <h2>3. Array dan Looping</h2>

      <ul>
        <?php foreach ($materi as $item): ?>
          <!-- foreach digunakan untuk mengulang isi array. -->
          <li><?php echo e($item); ?></li>
        <?php endforeach; ?>
      </ul>

      <pre><code>&lt;?php
$materi = ["HTML", "CSS", "PHP"];
foreach ($materi as $item) {
  echo $item;
}
?&gt;</code></pre>

      <h2>4. Percabangan if / else</h2>

      <?php if ($nilai >= 75): ?>
        <p>Nilai <?php echo e($nilai); ?> berarti <strong>Lulus</strong>.</p>
      <?php else: ?>
        <p>Nilai <?php echo e($nilai); ?> berarti <strong>Belum lulus</strong>.</p>
      <?php endif; ?>

      <pre><code>&lt;?php
if ($nilai &gt;= 75) {
  echo "Lulus";
} else {
  echo "Belum lulus";
}
?&gt;</code></pre>

      <h2>5. Function</h2>

      <p>
        Luas persegi panjang 10 x 5 =
        <strong><?php echo hitungLuasPersegiPanjang(10, 5); ?></strong>
      </p>

      <pre><code>&lt;?php
function hitungLuasPersegiPanjang($panjang, $lebar) {
  return $panjang * $lebar;
}
?&gt;</code></pre>

      <h2>6. Class dan Object</h2>

      <p><?php echo e($siswa->perkenalan()); ?></p>

      <pre><code>&lt;?php
class Siswa {
  public $nama;

  public function __construct($nama) {
    $this-&gt;nama = $nama;
  }
}

$siswa = new Siswa("Jauza");
?&gt;</code></pre>
    </section>

    <section id="form" class="container section-card">
      <h2>7. Menerima Data Form POST</h2>

      <?php if ($hasilForm !== null): ?>
        <div class="info-card">
          <?php echo $hasilForm; ?>
        </div>
      <?php endif; ?>

      <form action="belajar.php#form" method="POST" class="form-box">
        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama" placeholder="Masukkan nama">

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="nama@email.com">

        <label for="pesan">Pesan</label>
        <textarea id="pesan" name="pesan" rows="4" placeholder="Tulis pesan"></textarea>

        <label for="kelas">Kelas</label>
        <select id="kelas" name="kelas">
          <option value="">-- Pilih Kelas --</option>
          <option value="html">HTML</option>
          <option value="css">CSS</option>
          <option value="php">PHP Native</option>
        </select>

        <div class="checkbox-row">
          <input type="checkbox" id="setuju" name="setuju" value="ya">
          <label for="setuju">Saya setuju belajar rutin</label>
        </div>

        <button type="submit" class="btn-primary">Kirim</button>
      </form>

      <pre><code>&lt;?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $nama = $_POST["nama"] ?? "";
  echo htmlspecialchars($nama);
}
?&gt;</code></pre>
    </section>

    <section id="crud" class="container section-card">
      <h2>8. Kerangka CRUD PHP Native + MySQLi</h2>

      <p>
        Bagian ini adalah contoh struktur dasar. Jangan lupa sesuaikan nama database,
        username, password, dan nama tabel.
      </p>

      <h3>Koneksi Database</h3>
      <pre><code>&lt;?php
$host = "localhost";      // Alamat server database.
$user = "root";           // Username database.
$pass = "";               // Password database.
$db   = "nama_database";  // Nama database.

$koneksi = mysqli_connect($host, $user, $pass, $db);
// mysqli_connect digunakan untuk menghubungkan PHP ke MySQL.

if (!$koneksi) {
  die("Koneksi gagal: " . mysqli_connect_error());
  // die menghentikan program dan menampilkan pesan error.
}
?&gt;</code></pre>

      <h3>Create / Insert Data</h3>
      <pre><code>&lt;?php
$nama = $_POST["nama"];
$email = $_POST["email"];

$query = "INSERT INTO users (nama, email) VALUES ('$nama', '$email')";
// INSERT INTO digunakan untuk menambah data ke tabel.

mysqli_query($koneksi, $query);
// mysqli_query menjalankan query SQL.
?&gt;</code></pre>

      <h3>Read / Tampil Data</h3>
      <pre><code>&lt;?php
$query = "SELECT * FROM users";
// SELECT digunakan untuk mengambil data.

$result = mysqli_query($koneksi, $query);

while ($row = mysqli_fetch_assoc($result)) {
  echo $row["nama"];
}
// while mengulang selama data masih ada.
// mysqli_fetch_assoc mengambil data sebagai array associative.
?&gt;</code></pre>

      <h3>Update Data</h3>
      <pre><code>&lt;?php
$id = $_POST["id"];
$nama = $_POST["nama"];

$query = "UPDATE users SET nama='$nama' WHERE id=$id";
// UPDATE digunakan untuk mengubah data.
// WHERE menentukan data mana yang diubah.

mysqli_query($koneksi, $query);
?&gt;</code></pre>

      <h3>Delete Data</h3>
      <pre><code>&lt;?php
$id = $_GET["id"];

$query = "DELETE FROM users WHERE id=$id";
// DELETE digunakan untuk menghapus data.

mysqli_query($koneksi, $query);
?&gt;</code></pre>

      <h3>Catatan Keamanan Penting</h3>
      <p>
        Contoh CRUD di atas sengaja dibuat sederhana untuk belajar konsep.
        Untuk aplikasi nyata, gunakan prepared statement agar lebih aman dari SQL Injection.
      </p>

      <pre><code>&lt;?php
$stmt = mysqli_prepare($koneksi, "INSERT INTO users (nama, email) VALUES (?, ?)");
mysqli_stmt_bind_param($stmt, "ss", $nama, $email);
mysqli_stmt_execute($stmt);

// ? adalah placeholder.
// "ss" artinya dua parameter bertipe string.
// Prepared statement lebih aman untuk input user.
?&gt;</code></pre>
    </section>

    <section class="container section-card">
      <h2>9. Ringkasan Command PHP Native</h2>

      <table>
        <thead>
          <tr>
            <th>Command</th>
            <th>Fungsi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><code>echo</code></td>
            <td>Menampilkan output ke browser.</td>
          </tr>
          <tr>
            <td><code>$variable</code></td>
            <td>Menyimpan data sementara.</td>
          </tr>
          <tr>
            <td><code>if / else</code></td>
            <td>Membuat percabangan/kondisi.</td>
          </tr>
          <tr>
            <td><code>for</code></td>
            <td>Perulangan dengan jumlah tertentu.</td>
          </tr>
          <tr>
            <td><code>while</code></td>
            <td>Perulangan selama kondisi benar.</td>
          </tr>
          <tr>
            <td><code>foreach</code></td>
            <td>Perulangan khusus array.</td>
          </tr>
          <tr>
            <td><code>function</code></td>
            <td>Membuat blok kode yang bisa dipakai ulang.</td>
          </tr>
          <tr>
            <td><code>include</code></td>
            <td>Memanggil file lain; warning jika file tidak ada.</td>
          </tr>
          <tr>
            <td><code>require</code></td>
            <td>Memanggil file lain; error fatal jika file tidak ada.</td>
          </tr>
          <tr>
            <td><code>$_GET</code></td>
            <td>Mengambil data dari URL/query string.</td>
          </tr>
          <tr>
            <td><code>$_POST</code></td>
            <td>Mengambil data dari form method POST.</td>
          </tr>
          <tr>
            <td><code>$_SESSION</code></td>
            <td>Menyimpan data login/session user.</td>
          </tr>
          <tr>
            <td><code>mysqli_connect</code></td>
            <td>Menghubungkan PHP ke database MySQL.</td>
          </tr>
          <tr>
            <td><code>mysqli_query</code></td>
            <td>Menjalankan query SQL.</td>
          </tr>
          <tr>
            <td><code>header("Location: ...")</code></td>
            <td>Mengarahkan user ke halaman lain.</td>
          </tr>
        </tbody>
      </table>
    </section>
  </main>

  <footer class="site-footer">
    <div class="container">
      <p>&copy; 2026 - Belajar PHP Native</p>
    </div>
  </footer>
</body>
</html>
