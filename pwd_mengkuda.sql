-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Des 2025 pada 11.21
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwd_mengkuda`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `arena`
--

CREATE TABLE `arena` (
  `id_arena` int(11) NOT NULL,
  `nama_arena` varchar(255) NOT NULL,
  `foto_arena` varchar(255) NOT NULL,
  `deskripsi_arena` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `arena`
--

INSERT INTO `arena` (`id_arena`, `nama_arena`, `foto_arena`, `deskripsi_arena`, `created_at`) VALUES
(2, 'Lapangan Pacuan Kuda Gadang', 'gadangpayakumbuh.jpeg', 'Lapangan Pacuan Kuda Gadang (yang lebih dikenal dengan nama Lapangan Pacuan Kuda Kubu Gadang) merupakan gelanggang pacuan kuda legendaris yang terletak di Kota Payakumbuh, Sumatera Barat. Arena ini merupakan salah satu pusat tradisi Pacu Kudo yang sangat kuat di Ranah Minang dan telah menjadi bagian tak terpisahkan dari identitas budaya masyarakat setempat. Berbeda dengan arena modern yang kaku, Kubu Gadang menyajikan suasana pesta rakyat setiap kali perlombaan diadakan, di mana ribuan orang akan berkumpul tidak hanya untuk menonton balapan, tetapi juga untuk bersilaturahmi dan merayakan budaya lokal.', '2025-12-14 22:04:00'),
(3, 'Lapangan Pacuan Kuda Sultan Agung', 'sultanagung.jpg', 'Lapangan Pacuan Kuda Sultan Agung merupakan fasilitas olahraga berkuda berstandar nasional yang berlokasi di kompleks Stadion Sultan Agung (SSA), tepatnya di Desa Timbulharjo, Kecamatan Sewon, Kabupaten Bantul, Daerah Istimewa Yogyakarta. Arena ini dikenal sebagai salah satu lintasan pacuan kuda terbaik di Indonesia yang sering menjadi tuan rumah berbagai kejuaraan bergengsi, baik di tingkat regional maupun nasional. Keberadaannya di sisi barat stadion sepak bola utama menjadikan kawasan SSA sebagai pusat olahraga terpadu yang sangat vital bagi masyarakat Bantul dan sekitarnya.', '2025-12-16 00:34:14'),
(6, 'Lapangan Pacuan Kuda Legok Jawa', 'legokjawa.jpg', 'Lapangan Pacuan Kuda Legok Jawa merupakan sebuah destinasi olahraga dan wisata yang sangat ikonik karena letaknya yang berada tepat di bibir pantai Desa Legokjawa, Kecamatan Cimerak, Kabupaten Pangandaran. Keberadaan lintasan balap ini dianggap sangat istimewa dan langka karena jarang sekali ada arena pacuan kuda yang berbatasan langsung dengan Samudera Hindia. Pemandangan alam yang ditawarkan sangat mempesona, di mana penonton dapat menyaksikan deru lari kuda yang berpadu dengan suara deburan ombak serta hamparan pasir pantai yang luas.', '2025-12-17 13:19:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuda`
--

CREATE TABLE `kuda` (
  `id_kuda` int(11) NOT NULL,
  `nama_kuda` varchar(100) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `peternakan` varchar(150) NOT NULL,
  `foto_kuda` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kuda`
--

INSERT INTO `kuda` (`id_kuda`, `nama_kuda`, `tanggal_lahir`, `jenis_kelamin`, `peternakan`, `foto_kuda`) VALUES
(4, 'King Argentin', '0000-00-00', 'Jantan', 'King Halim Stable', 'kingargentin.jpg'),
(5, 'Naga Sembilan', '0000-00-00', 'Jantan', 'Red Stone Stable', 'nagasembilan.jpg'),
(6, 'Dominator', '0000-00-00', 'Jantan', 'Ciello Stable', 'dominator.jpg'),
(7, 'Prince Loupan', '0000-00-00', 'Jantan', 'King Halim Stable', 'princeloupan.jpg'),
(8, 'Romantic Spartan', '0000-00-00', 'Betina', 'San Marino Stable', 'romanticspartan.jpg'),
(9, 'Wonder Land', '0000-00-00', 'Betina', 'Rama Sinta Stable', 'wonderland.jpg'),
(22, 'bocchi', '0000-00-00', 'Betina', 'Utopia Farm', 'bocchi merinding.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sejarah`
--

CREATE TABLE `sejarah` (
  `id_sejarah` int(11) NOT NULL,
  `nama_sejarah` varchar(255) NOT NULL,
  `foto_sejarah` varchar(255) NOT NULL,
  `deskripsi_sejarah` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sejarah`
--

INSERT INTO `sejarah` (`id_sejarah`, `nama_sejarah`, `foto_sejarah`, `deskripsi_sejarah`, `created_at`) VALUES
(1, 'Indonesia Derby 2025', 'derby.jpg', 'Indonesia Derby 2025 merupakan puncak dari rangkaian kejuaraan pacuan kuda paling bergengsi di tanah air yang diselenggarakan pada tanggal 27 Juli 2025. Perhelatan akbar ini berlangsung di Lapangan Pacuan Kuda Sultan Agung, Bantul, Yogyakarta, dan menjadi magnet bagi ribuan pecinta olahraga berkuda serta wisatawan. Sebagai seri ketiga atau seri penutup dalam kalender utama Indonesia\'s Horse Racing (IHR), ajang ini mempertandingkan kelas paling prestisius, yaitu Kelas 3 Tahun Derby dengan jarak lintasan sejauh 2.000 meter.\r\nMomen ini menjadi sangat bersejarah karena kuda bernama King Argentine berhasil keluar sebagai juara dan resmi menyandang gelar Triple Crown Indonesia 2025. Keberhasilan King Argentine yang dimiliki oleh King Halim Stable dari Jawa Barat ini mengakhiri penantian panjang selama 11 tahun bagi dunia pacuan kuda nasional untuk kembali melahirkan sang juara \"Tiga Mahkota\". Di bawah bimbingan pelatih Farooq Ali Khan dan joki Jemmy Runtu, King Argentine tampil dominan mengalahkan rival-rival kuatnya seperti Wonderland dan Sidney Allstar di hadapan publik yang memadati tribun.', '2025-12-16 11:02:15'),
(3, 'Triple Crown', 'kuda-menang.jpg', 'Triple Crown atau Tiga Mahkota merupakan gelar kehormatan tertinggi dan paling bergengsi dalam dunia pacuan kuda, yang diberikan kepada seekor kuda pacu berusia tiga tahun jika mampu memenangkan tiga balapan utama dalam satu musim kompetisi. Gelar ini dianggap sebagai \"level dewa\" karena tingkat kesulitannya yang sangat tinggi, di mana seekor kuda hanya memiliki satu kali kesempatan seumur hidup untuk meraihnya saat mereka berada di usia emas tersebut. Untuk menjadi juara, seekor kuda harus memiliki kombinasi sempurna antara kecepatan murni di jarak pendek serta daya tahan fisik dan mental yang kuat di jarak jauh dalam rentang waktu pemulihan yang relatif singkat.', '2025-12-16 11:28:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$HYBcxPA1ICkK5heTCz8BoOHvsbngYQ/yTLzXNJCly07yP5c8yLHdq', '2025-12-06 05:36:46'),
(2, 'aji', 'aji@gmail.com', '$2y$10$FGFny5DhZ0llr7QEUxXJ5eb3Kc4p4PHvR2PFYKS69e//01s1WvmVS', '2025-12-08 09:38:25'),
(3, 'indra', 'indra@gmail.com', '$2y$10$sII6dUaOO.ilo9ZYPnawye885RZeW1xaXS7YF1KqmaGTOGe.TrhIK', '2025-12-09 06:55:30'),
(4, 'Ajikan', 'maumakan@gmail.com', '$2y$10$igmN1/jGXuc4Mln5SJBozuWx7ntcqfUkDPxD1j/TXwZFq4FdWq/eK', '2025-12-17 14:18:24');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `arena`
--
ALTER TABLE `arena`
  ADD PRIMARY KEY (`id_arena`);

--
-- Indeks untuk tabel `kuda`
--
ALTER TABLE `kuda`
  ADD PRIMARY KEY (`id_kuda`);

--
-- Indeks untuk tabel `sejarah`
--
ALTER TABLE `sejarah`
  ADD PRIMARY KEY (`id_sejarah`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `arena`
--
ALTER TABLE `arena`
  MODIFY `id_arena` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kuda`
--
ALTER TABLE `kuda`
  MODIFY `id_kuda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `sejarah`
--
ALTER TABLE `sejarah`
  MODIFY `id_sejarah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
