-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 17 Okt 2021 pada 12.07
-- Versi server: 10.3.31-MariaDB-log-cll-lve
-- Versi PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `samudrap_db_e-commerce`
--
CREATE DATABASE IF NOT EXISTS `samudrap_db_e-commerce` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `samudrap_db_e-commerce`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` int(255) DEFAULT NULL,
  `berat` int(11) NOT NULL,
  `deskripsi` mediumtext DEFAULT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `id_kategori`, `nama_barang`, `harga`, `stok`, `berat`, `deskripsi`, `gambar`) VALUES
(3, 2, 'Batik Tulis Pekalongan', 250000, 90, 100, ' Ukuran 2 x 1,25 meter\r\nWarna motif pada kain bagian depan dan belakang sama, sebab proses membatik dilakukan di kedua sisi kain\r\nMemiliki aroma khas lilin atau malam dan menggunakan pewarna alami, misalnya kulit kayu teger untuk warna kuning, daun tom dan akarnya untuk warna biru, kulit kayu tingi untuk warna hitam, dan kayu jambal untuk warna cokelat.\r\n', 'Batik_Tulis_Pekalongan.jpg'),
(4, 1, 'Kain Batik motif Geblek Renteng', 175000, 77, 200, 'Ukuran 200x115\r\nBahan Primatex\r\nWarna Dasar Hitam Motif gold\r\n', 'Kain_Batik_Cap_motif_Geblek_Renteng.jpg'),
(5, 2, 'Kain Katun Batik Baturaden Batu Raden', 85000, 87, 400, 'Lebar / Bidang Kain : 115cm x 1.15cm', 'Kain_Katun_Batik_Baturaden_Batu_Raden.jpg'),
(6, 2, 'Kain Jarik Asli Solo - Motif Sido Mukti', 240000, 42, 150, 'Ukuran kain 230 x 110 cm.\r\nKain halus. Tidak menyusut ukurannya kalau dicuci.\r\nBisa dibuat jarik, rok, dijahit menjadi blus, dress, outer, atau gendongan bayi', 'kain_Jarik_Asli_Solo_-_Motif_Sido_Mukti.jpg'),
(7, 2, 'Kain batik Baturraden batik Pekalongan bahan batik halus', 84000, 41, 300, 'Bahan halus, sejuk dipakai, Referensi bisa dijadikan kemeja gamis dll\r\n\r\nukuran kain 2x1meter', 'Kain_batik_Baturraden_Pekalongan_bahan_batik_halus.jpg'),
(8, 1, 'kain batik sejagad', 414000, 23, 500, 'Ukuran Kain : 230 cm x 115 cm\r\nBahan : Primisima\r\n', 'kain_batik_sejagad.jpg'),
(9, 2, 'Kain Batik Lasem Sekar Jagad Primissima Halusan', 770000, 59, 300, 'Bahan: Katun Mori Primissima (katun lebih halus / higher grade cotton)\r\nUkuran: 230 x 110 cm\r\nSetiap titik dan garis pada motif batik, digambar satu-persatu menggunakan canting, sehingga apabila ada 2 lembar kain dengan motif/design yang sama, baju yang dibuat tidak akan sama persis.', 'Kain_Batik_Tulis_Lasem_Sekar_Jagad_Primissima_Halusan.jpg'),
(10, 3, 'kain batik solo parang coklat burung', 90000, 50, 300, '- Ukuran kain : 240cm x 115cm\r\nKain batik ini nyaman dipakai, tidak panas, menyerap keringat serta terasa halus bila disentuh/diusap.', 'Kain_Batik_SOLO_motif_parang_burung_merak_terbang.jpg'),
(11, 2, 'batik lasem corak bunga', 200000, 36, 100, 'kain batik tidak mudah luntur ukuran 2m x 115 cm', 'kjb8.jpg'),
(12, 2, 'Batik motif jarik cap parang', 80000, 7, 270, 'ukuran 100cm x 235cm', 'kjb11-min.jpg'),
(13, 2, 'batik tulis motif kotak kotak ', 250000, -5, 230, 'ukuran panjang 240 x lebar 100cm', 'kjb10-min.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_detail_penjualan` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_barang`, `jumlah`, `tanggal`) VALUES
(5, 5, 3, 10, '2021-05-27'),
(6, 5, 9, 2, '2021-05-27'),
(7, 5, 8, 1, '2021-05-27'),
(15, 6, 9, 1, '2021-05-30'),
(16, 7, 6, 1, '2021-05-30'),
(17, 8, 6, 1, '2021-05-30'),
(18, 9, 9, 3, '2021-06-03'),
(19, 10, 7, 1, '2021-06-05'),
(20, 10, 10, 1, '2021-06-05'),
(21, 11, 10, 3, '2021-06-16'),
(22, 11, 8, 1, '2021-06-16'),
(23, 12, 8, 1, '2021-06-16'),
(24, 12, 9, 1, '2021-06-16'),
(25, 13, 10, 1, '2021-06-16'),
(26, 13, 7, 1, '2021-06-16'),
(27, 14, 12, 1, '2021-06-16'),
(28, 15, 10, 1, '2021-06-16'),
(29, 15, 11, 1, '2021-06-16'),
(30, 16, 7, 2, '2021-06-16'),
(31, 16, 10, 3, '2021-06-16'),
(32, 17, 13, 1, '2021-06-16'),
(33, 17, 11, 1, '2021-06-16'),
(34, 18, 12, 1, '2021-06-16'),
(35, 19, 4, 1, '2021-06-16'),
(36, 19, 6, 1, '2021-06-16'),
(37, 20, 6, 2, '2021-06-16'),
(38, 21, 13, 2, '2021-06-16'),
(39, 22, 10, 1, '2021-06-16'),
(40, 23, 13, 9, '2021-06-17');

--
-- Trigger `detail_penjualan`
--
DELIMITER $$
CREATE TRIGGER `stockmin` AFTER INSERT ON `detail_penjualan` FOR EACH ROW BEGIN
UPDATE barang SET barang.stok =  barang.stok - new.jumlah
WHERE barang.id_barang = new.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `id_barang`, `keterangan`, `gambar`) VALUES
(1, 3, 'Batik Tulis Pekalongan1', 'Batik_Tulis_Pekalongan1.jpg'),
(2, 3, 'Batik Tulis Pekalongan2', 'Batik_Tulis_Pekalongan2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_barang`
--

INSERT INTO `kategori_barang` (`id_kategori`, `nama_kategori`) VALUES
(1, 'batik cap'),
(2, 'Batik Tulis'),
(3, 'Batik Printing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_barang` int(25) DEFAULT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `jumlah` int(25) DEFAULT NULL,
  `total` int(25) DEFAULT NULL,
  `total_berat` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_barang`, `id_pelanggan`, `jumlah`, `total`, `total_berat`) VALUES
(1, 10, 1, 1, 90000, 300);

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `namaweb` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telepon` varchar(25) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `facebook` varchar(25) DEFAULT NULL,
  `instagram` varchar(25) DEFAULT NULL,
  `icon` varchar(25) DEFAULT NULL,
  `slider_1` varchar(255) DEFAULT NULL,
  `slider_2` varchar(255) DEFAULT NULL,
  `slider_3` varchar(255) DEFAULT NULL,
  `kontak` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `namaweb`, `alamat`, `telepon`, `email`, `facebook`, `instagram`, `icon`, `slider_1`, `slider_2`, `slider_3`, `kontak`, `about`) VALUES
(1, 'Kusuma Jaya Batik', 'Jalan Kebon Agung, Toragan, Tlogoadi, Mlati, Area Sawah, Tlogoadi, Kec. Mlati, Kabupaten Sleman, Daerah Istimewa Yogyakartaa', '0817-4731-30122', 'kusumajayabatik@gmail.com', 'kusuma jaya batik', 'kusuma_jaya_batik', 'kjb.png', 'batik_slide03.jpg', 'batik2.png', 'malam1.jpg', 'bannerbatik1.jpg', 'bannerbatik.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `nohp` text NOT NULL,
  `alamat` text NOT NULL,
  `is_active` int(1) NOT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email`, `password`, `nohp`, `alamat`, `is_active`, `tanggal`) VALUES
(1, 'jefri tonay', 'codotwakwa18@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '089673363150', 'jakal kaliurang sleman DI Yogyakarta', 1, '2021-04-07'),
(2, 'dicky wahyudi', 'kjbjaya78@gmail.com', '376c81c22af638120196baca49b92075cd4fddfc', '+6289673363150', 'jl sodomulyo km18 kijang bintan kepulauan riau', 1, '2021-05-12'),
(4, 'jumantono', 'daiconlapas@gmail.com', '376c81c22af638120196baca49b92075cd4fddfc', '089673363150', 'Purwomartani Kalasan, Sleman Yogyakata', 1, '2021-06-03'),
(5, 'Samsudin', 'pranomojoko7@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '089777653452', 'Jombokan, Tawangsari, Pengasih,Kulonprogo', 1, '2021-06-16'),
(6, 'wiyarto', 'parjiman2001@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '089673363150', 'Bayen, Purwomartani, Kalasan,Sleman', 1, '2021-06-16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `kode_penjualan` varchar(255) DEFAULT NULL,
  `tanggal_beli` date DEFAULT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `provinsi` varchar(225) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `nohp` text NOT NULL,
  `sub_total` int(11) DEFAULT NULL,
  `berat_total` int(11) DEFAULT NULL,
  `paket` varchar(50) DEFAULT NULL,
  `estimasi` text DEFAULT NULL,
  `expedisi` varchar(50) DEFAULT NULL,
  `ongkir` varchar(50) DEFAULT NULL,
  `total_bayar` varchar(50) DEFAULT NULL,
  `status_bayar` varchar(255) DEFAULT NULL,
  `status_order` varchar(25) NOT NULL,
  `no_resi` varchar(25) DEFAULT NULL,
  `metode_pembayaran` varchar(50) DEFAULT NULL,
  `invoice` text DEFAULT NULL,
  `pembayaran` varchar(50) DEFAULT NULL,
  `pdf` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `kode_penjualan`, `tanggal_beli`, `id_pelanggan`, `provinsi`, `kota`, `nama`, `alamat`, `nohp`, `sub_total`, `berat_total`, `paket`, `estimasi`, `expedisi`, `ongkir`, `total_bayar`, `status_bayar`, `status_order`, `no_resi`, `metode_pembayaran`, `invoice`, `pembayaran`, `pdf`) VALUES
(5, 'KJB-8674127052021', '2021-05-27', 1, 'Kepulauan Riau', 'Bintan', 'yusril fauzi', 'jl sidomulyo km 18kijang bintan kepulauan riau', '089673363150', 3454000, 1110, 'ECO', '4 Hari', 'tiki', '28000', '3482000', 'settlement', '3', '37089100252619', 'bank_transfer', 'bni', '9882570516527666', 'https://app.sandbox.midtrans.com/snap/v1/transactions/6f3edbf9-c442-403f-8c8d-68d0dde61d37/pdf'),
(6, 'KJB-8639430052021', '2021-04-30', 1, 'DI Yogyakarta', 'Sleman', 'jefri tonay', 'purwomartani kalasan sleman yogyakarta', '089673363150', 770000, 300, 'ONS', '1 Hari', 'tiki', '38000', '808000', 'settlement', '3', '67543710025269', 'bank_transfer', 'bni', '9882570550863126', 'https://app.sandbox.midtrans.com/snap/v1/transactions/fbe30608-aed3-4d15-bd7b-b25ef217ced6/pdf'),
(7, 'KJB-6125930052021', '2021-05-30', 1, 'DI Yogyakarta', 'Sleman', 'jefri tonay', 'purwomartani kalasan sleman yogyakarta', '089673363150', 240000, 50, 'ECO', '4 Hari', 'tiki', '13000', '253000', 'settlement', '3', '130080013756519', 'bank_transfer', 'bni', '9882570556334597', 'https://app.sandbox.midtrans.com/snap/v1/transactions/a8ccaeea-125f-40b6-985a-5cf6871f7f2d/pdf'),
(8, 'KJB-2415330052021', '2021-05-30', 1, 'Kepulauan Riau', 'Batam', 'rahman', 'jl sidomulyo km 18kijang bintan kepulauan riau', '089673363150', 240000, 50, 'ECO', '4 Hari', 'tiki', '39000', '279000', 'settlement', '3', '016050066223519', 'bank_transfer', 'bni', '9882570565123741', 'https://app.sandbox.midtrans.com/snap/v1/transactions/9d0b545f-61d4-4c08-813f-4d37ffed6c3f/pdf'),
(9, 'KJB-9874303062021', '2021-06-03', 4, 'DI Yogyakarta', 'Sleman', 'jumantono', 'Purwomartani Kalasan, Sleman Yogyakata', '089673363150', 2310000, 900, 'ECO', '4 Hari', 'tiki', '7000', '2317000', 'settlement', '3', 'jda366036630596', 'bank_transfer', 'bni', '9882570535791187', 'https://app.sandbox.midtrans.com/snap/v1/transactions/3d4820b4-7d64-4913-b327-c5580c1c254d/pdf'),
(10, 'KJB-2475105062021', '2021-06-05', 1, 'DI Yogyakarta', 'Sleman', 'wiyarto', 'purwomartani kalasan Sleman yogyakarta', '089673363150', 174000, 600, 'CTC', '1-2 Hari', 'jne', '6000', '180000', 'settlement', '3', 'jogd500120944813', 'bank_transfer', 'bni', '9882570527014488', 'https://app.sandbox.midtrans.com/snap/v1/transactions/5026dd68-19f6-4edf-bef9-309f39ea3103/pdf'),
(11, 'KJB-6572416062021', '2021-06-16', 5, 'DI Yogyakarta', 'Kulon Progo', 'Samsudin', 'Jombokan, Tawangsari, Pengasih,Kulonprogo', '089777653452', 684000, 1400, 'OKE', '3-4 Hari', 'jne', '16000', '700000', 'settlement', '3', '002544100809', 'bank_transfer', 'bca', '25705942365', 'https://app.sandbox.midtrans.com/snap/v1/transactions/ee2c9d8b-543d-41cf-b413-e080d73451e1/pdf'),
(12, 'KJB-9604316062021', '2021-06-16', 6, 'DI Yogyakarta', 'Sleman', 'wiyarto', 'Bayen, Purwomartani, Kalasan,Sleman', '089673363150', 1184000, 800, 'CTC', '1-2 Hari', 'jne', '6000', '1190000', 'settlement', '3', 'jp9967123576', 'bank_transfer', 'bri', '257056281910194246', 'https://app.sandbox.midtrans.com/snap/v1/transactions/dfd61319-eec7-49ef-81de-6893e86bc746/pdf'),
(13, 'KJB-4782516062021', '2021-06-16', 5, 'DI Yogyakarta', 'Kulon Progo', 'Samsudin', 'Jombokan, Tawangsari, Pengasih,Kulonprogo', '089777653452', 174000, 600, 'OKE', '3-4 Hari', 'jne', '8000', '182000', 'pending', '0', NULL, 'bank_transfer', 'bca', '25705169142', 'https://app.sandbox.midtrans.com/snap/v1/transactions/79c9f9d9-9d99-4b30-adaa-c8c803470268/pdf'),
(14, 'KJB-9154016062021', '2021-06-16', 5, 'DI Yogyakarta', 'Sleman', 'Samsudin', 'Jombokan, Tawangsari, Pengasih,Kulonprogo', '089777653452', 80000, 270, 'CTC', '1-2 Hari', 'jne', '6000', '86000', 'pending', '0', NULL, 'bank_transfer', 'bca', '25705697285', 'https://app.sandbox.midtrans.com/snap/v1/transactions/9ce35bde-cf7d-459c-a040-33093df11fd2/pdf'),
(15, 'KJB-9037816062021', '2021-06-16', 5, 'DI Yogyakarta', 'Kulon Progo', 'Samsudin', 'Jombokan, Tawangsari, Pengasih,Kulonprogo', '089777653452', 290000, 400, 'OKE', '3-4 Hari', 'jne', '8000', '298000', 'pending', '0', NULL, 'bank_transfer', 'bri', '257051410654874511', 'https://app.sandbox.midtrans.com/snap/v1/transactions/4eda615e-3d9a-44e2-8cc8-a9f075098727/pdf'),
(16, 'KJB-5698316062021', '2021-06-16', 1, 'DI Yogyakarta', 'Sleman', 'jefri tonay', 'jakal kaliurang sleman DI Yogyakarta', '089673363150', 438000, 1500, 'ECO', '4 Hari', 'tiki', '14000', '452000', 'expire', '0', NULL, 'bank_transfer', 'bca', '25705283741', 'https://app.sandbox.midtrans.com/snap/v1/transactions/e1245ce1-a8b4-4618-9966-225f370a3f67/pdf'),
(17, 'KJB-3260116062021', '2021-06-16', 2, 'Kepulauan Riau', 'Bintan', 'dicky wahyudi', 'jl sodomulyo km18 kijang bintan kepulauan riau', '089673363150', 450000, 330, 'OKE', '9-10 Hari', 'jne', '61000', '511000', 'settlement', '3', 'jp9967123589', 'bank_transfer', 'bni', '9882570576915475', 'https://app.sandbox.midtrans.com/snap/v1/transactions/1499adf3-10c4-4984-a648-15f82011d890/pdf'),
(18, 'KJB-9548616062021', '2021-06-16', 2, 'Kepulauan Riau', 'Bintan', 'dicky wahyudi', 'jl sodomulyo km18 kijang bintan kepulauan riau', '+6289673363150', 80000, 270, 'OKE', '9-10 Hari', 'jne', '61000', '141000', 'settlement', '3', 'jp9967123576', 'bank_transfer', 'bni', '9882570507836004', 'https://app.sandbox.midtrans.com/snap/v1/transactions/a3375f56-acd7-4761-a1b1-b9b2eade4ace/pdf'),
(19, 'KJB-8354016062021', '2021-06-16', 2, 'Kepulauan Riau', 'Bintan', 'dicky wahyudi', 'jl sodomulyo km18 kijang bintan kepulauan riau', '089673363150', 415000, 350, 'OKE', '9-10 Hari', 'jne', '61000', '476000', 'settlement', '3', 'jp9967123567', 'bank_transfer', 'bni', '9882570509593270', 'https://app.sandbox.midtrans.com/snap/v1/transactions/0e01ee71-a1e7-497d-820b-65dbf6ccc8f5/pdf'),
(20, 'KJB-3098416062021', '2021-06-16', 2, 'Kepulauan Riau', 'Bintan', 'dicky wahyudi', 'jl sodomulyo km18 kijang bintan kepulauan riau', '+6289673363150', 480000, 300, 'OKE', '9-10 Hari', 'jne', '61000', '541000', 'settlement', '3', 'jp9967123576', 'bank_transfer', 'bni', '9882570516149694', 'https://app.sandbox.midtrans.com/snap/v1/transactions/1f65ea9a-490c-4be9-a269-df6dba046e41/pdf'),
(21, 'KJB-5637216062021', '2021-06-16', 2, 'Kepulauan Riau', 'Bintan', 'dicky wahyudi', 'jl sodomulyo km18 kijang bintan kepulauan riau', '+6289673363150', 500000, 460, 'OKE', '9-10 Hari', 'jne', '61000', '561000', 'expire', '0', NULL, 'bank_transfer', 'bni', '9882570570922071', 'https://app.sandbox.midtrans.com/snap/v1/transactions/2cd03eb0-9f83-4a0a-91f0-3767675b9acf/pdf'),
(22, 'KJB-3708616062021', '2021-06-16', 2, 'Kepulauan Riau', 'Bintan', 'dicky wahyudi', 'jl sodomulyo km18 kijang bintan kepulauan riau', '+6289673363150', 90000, 300, 'OKE', '9-10 Hari', 'jne', '61000', '151000', 'expire', '0', NULL, 'bank_transfer', 'bri', '257058147981344108', 'https://app.sandbox.midtrans.com/snap/v1/transactions/b5946984-374a-460b-873c-71522084d69b/pdf'),
(23, 'KJB-0261717062021', '2021-06-17', 6, 'DI Yogyakarta', 'Sleman', 'wiyarto', 'Bayen, Purwomartani, Kalasan,Sleman', '089673363150', 2250000, 2070, 'CTC', '1-2 Hari', 'jne', '12000', '2262000', 'settlement', '3', 'jne33344666', 'bank_transfer', 'bni', '9882570579008975', 'https://app.sandbox.midtrans.com/snap/v1/transactions/ef755b7c-9dfb-48a1-9470-fd61728e09df/pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id` int(5) NOT NULL,
  `nama_toko` varchar(255) DEFAULT NULL,
  `lokasi` int(11) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `nohp` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id`, `nama_toko`, `lokasi`, `alamat`, `nohp`) VALUES
(1, 'Kusuma Jaya Batik', 419, 'JL.Gendekan RT 02 RW 09 Tlogoadi Mlati, Sleman, Yogyakarta.', '089673363159');

-- --------------------------------------------------------

--
-- Struktur dari tabel `token_p`
--

CREATE TABLE `token_p` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `token_p`
--

INSERT INTO `token_p` (`id`, `email`, `token`, `date`) VALUES
(1, 'codotwakwa18@gmail.com', 'BeSpQKuyVr/EFaVulnHlJ34JwhMedi2Sp1WhT6Kcv/w=', 1619967466),
(2, 'codotwakwa18@gmail.com', 'P1aqx9xOKFLuRxgrQ6UebmnnhYhQ4HNhlR2GiCvOFU0=', 1619970819),
(3, 'codotwakwa18@gmail.com', 'WTXkyz9fvh1x5yfDyNP+PCgqc2oARS5NK/qMozrO980=', 1619970964),
(4, 'codotwakwa18@gmail.com', 'z5DzLyhll6OuKskh0JpV1ZIFAC6Wg85Hn2yixjqYY48=', 1619971134),
(5, 'daiconlapas@gmail.com', 'QlvehdJq4+9MWaryQo4w4bTccET+bkL6OIJJ9Gw5vW0=', 1621316991),
(6, 'daiconlapas@gmail.com', 'N7loGKg5svQLA9bwcY087gHivdEbbNeIXKAnmI0Rcv8=', 1621317064),
(7, 'codotwakwa18@gmail.com', 'kmO03W+nGwemiS/FF75f8Ef9U7cF0AB7BfTW6+Gd6S0=', 1621527416),
(8, 'codotwakwa18@gmail.com', 'ySz6RTp+3LLYQsgzRI8NOmywisRK7cFZiXwrfgji+u4=', 1621529406),
(9, 'codotwakwa18@gmail.com', 'C/h3fJ6VfM8m1zCZq3AxTB2ahTMoo0hVLvvbHrpPWas=', 1621531468),
(10, 'codotwakwa18@gmail.com', 'cO66mq+d1gbugAzgvN/oolSUElyHx9FUFLIP8l2kgtA=', 1621532130),
(11, 'codotwakwa18@gmail.com', 'BqTCtf8P/2gwSj58Hs9wyNolkS8AF1pqElXQbOT+y0M=', 1621532640),
(12, 'kusumajayabatik362@gmail.com', 'QbX3cvmBue62YmZJwa1Y1R7AAIXVu8LSTz6U7wfaGsk=', 1621654474),
(13, 'codotwakwa18@gmail.com', 'Ap7crpTPeh+tRaWK53cyPqm3z2mC37uXN4dCYJ/x2yQ=', 1621845059),
(14, 'codotwakwa18@gmail.com', 'rTcerCV9Qlf7ybvmf2Hlm9l57LiD5sh1xheFydICmW0=', 1621863461),
(15, 'daiconlapas@gmail.com', 'vdAkB5+nUU9CBIjXyoT+J9jQEsdvAJVLwth6R5/tDOQ=', 1621867877),
(16, 'daiconlapas@gmail.com', 'uKpM3AZ9SvwQkI/g+OEZ7vbx0CNTCH7Xh5Hn8ruQccQ=', 1621868465),
(17, 'daiconlapas@gmail.com', 'iJdYW7WfJBWM0/6BZGnPHGdso9YijTpwx7vs0X361LU=', 1621868549),
(18, 'daiconlapas@gmail.com', 'p71FO01iHEMAZKUk7qK1pcNV625mAxeagV/1SRP4J18=', 1621869287),
(19, 'daiconlapas@gmail.com', 'HZ3kCzj68RiT6ZZkZreKtKvq8hJbYTH3MFJCa05TjmE=', 1621870304),
(20, 'daiconlapas@gmail.com', 'CA7teVLQKdWTPSI1/Xbw9oJppqKiVrxVYwe3ANimeh8=', 1622092533),
(21, 'daiconlapas@gmail.com', 'yn1rUNcEm5+W4B9SxFqGfowtDQe/MYI3qFE0pCX5uNI=', 1622096487),
(22, 'codotwakwa18@gmail.com', 'UHUPXGpx8fG385DmYzd9LOujNg2LVtM1ex+6luOyDB4=', 1622189980),
(23, 'codotwakwa18@gmail.com', 'iczaVld2qUJWMv7n2Y5l+eFGZPYfHCCZfyxOJq+02GA=', 1622190327),
(24, 'daiconlapas@gmail.com', 'NK26g7NwNtYWog1K2j1vkZ+gMLQWMIaTt1LLKCpR/Uk=', 1622191731),
(25, 'codotwakwa18@gmail.com', 'oMm4P5TxTSwu/lbHcn53IntDWyzi+AIGNGXPCHTR5Dw=', 1622191793),
(26, 'daiconlapas@gmail.com', 'q5Gz6/re3RWFCnD1AkHl6Zdiqf9FISREp/aLTzvv1G8=', 1622191978),
(27, 'daiconlapas@gmail.com', '79ZoDgAU8Xcuv1le7aMAEe8IGi86uOAMBsx5FdD9mq4=', 1622192141),
(28, 'daiconlapas@gmail.com', 'C9AgDhBgWhX8g2f1no8beFn82i43G4b64yKCHr2KkuI=', 1622192229),
(29, 'daiconlapas@gmail.com', 'ceP6nVdmVCqV6oy7+yL2hGN7mTgFS6Cu8GHUX3rLbPo=', 1622192286),
(30, 'daiconlapas@gmail.com', '7hXVKqo+uapNqv+NSfzcxAAMhD2hVZKFfsKyQkWh/wA=', 1622337947),
(31, 'daiconlapas@gmail.com', '260R27/5alJOEV2aWEdSbUvyrY63BOxvqEHe/lUbvJk=', 1622646976),
(32, 'kjbjaya78@gmail.com', 'bMSstwSBPNDFon6TnmXBfK43e3mg7zHlwbEMQEYsQ0I=', 1622734900),
(33, 'daiconlapas@gmail.com', 'ZBi1GErFLsylLseNGgoqBX/CPxSTtoKit/0KaQYdVhg=', 1622735107),
(34, 'daiconlapas@gmail.com', '4vO5CKpBIutrhnouiLVtJ5OLir9qeLIDzDQ1l5zKfo8=', 1622735155),
(35, 'pranomojoko7@gmail.com', 'FdgKqOjsrwX9YP874PS3PUm/5JRFh29sQcmapWwyJRs=', 1623837235),
(36, 'parjiman2001@gmail.com', 'uMz3Pp9HqXRZxjwEyzaYqOpICEP2kMn0D4c6MhZf0Ec=', 1623846470);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(25) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(25) DEFAULT NULL,
  `nohp` varchar(255) DEFAULT NULL,
  `level` int(1) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `email`, `password`, `nohp`, `level`, `gambar`) VALUES
(1, 'Edi Tiawan', 'editiawan99', 'daiconlapas@gmail.com', 'tiawan', '89673363154', 1, 'images_(2)2.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_detail_penjualan`),
  ADD KEY `id_penjualan` (`id_penjualan`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `token_p`
--
ALTER TABLE `token_p`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id_detail_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kategori_barang`
--
ALTER TABLE `kategori_barang`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `token_p`
--
ALTER TABLE `token_p`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_barang` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD CONSTRAINT `detail_penjualan_ibfk_1` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id_penjualan`),
  ADD CONSTRAINT `detail_penjualan_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `gambar`
--
ALTER TABLE `gambar`
  ADD CONSTRAINT `gambar_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);
--
-- Database: `samudrap_ramuan`
--
CREATE DATABASE IF NOT EXISTS `samudrap_ramuan` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `samudrap_ramuan`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(100) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `job_title` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `fullname`, `email`, `alamat`, `no_hp`, `job_title`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Alwy Muhammad', 'almusya16@gmail.com', 'jalan Kaliurang', '0811234567891', 'Data Security');

-- --------------------------------------------------------

--
-- Struktur dari tabel `durasi_dec`
--

CREATE TABLE `durasi_dec` (
  `id_dec` int(100) NOT NULL,
  `nama_file_asli` varchar(100) NOT NULL,
  `nama_file_dec` varchar(100) NOT NULL,
  `file_size` float NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_pelanggan` int(100) NOT NULL,
  `lama_waktu_dec` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `durasi_enc`
--

CREATE TABLE `durasi_enc` (
  `id_enc` int(100) NOT NULL,
  `nama_file_asli` varchar(100) NOT NULL,
  `nama_file_enc` varchar(100) NOT NULL,
  `file_size` float NOT NULL,
  `id_pelanggan` int(100) NOT NULL,
  `tanggal` datetime NOT NULL,
  `lama_waktu_enc` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `durasi_enc`
--

INSERT INTO `durasi_enc` (`id_enc`, `nama_file_asli`, `nama_file_enc`, `file_size`, `id_pelanggan`, `tanggal`, `lama_waktu_enc`) VALUES
(27, '66103-ramuan-sapi-ternak.pdf', '12871-ramuan-sapi-ternak.enc', 85.9355, 14, '2021-05-31 15:39:56', 10.8894),
(28, '95309-ramuan-sapi-ternak.pdf', '58759-ramuan-sapi-ternak.enc', 85.9355, 14, '2021-05-31 15:47:56', 10.0389);

-- --------------------------------------------------------

--
-- Struktur dari tabel `file`
--

CREATE TABLE `file` (
  `id_file` int(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `id_pelanggan` int(100) NOT NULL,
  `file_name_source` varchar(255) DEFAULT NULL,
  `file_name_finish` varchar(255) DEFAULT NULL,
  `file_url` varchar(255) DEFAULT NULL,
  `file_size` float DEFAULT NULL,
  `password` varchar(16) DEFAULT NULL,
  `tgl_upload` timestamp NULL DEFAULT NULL,
  `status` enum('1','2') DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `status_kunci` enum('0','1') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `file`
--

INSERT INTO `file` (`id_file`, `username`, `id_pelanggan`, `file_name_source`, `file_name_finish`, `file_url`, `file_size`, `password`, `tgl_upload`, `status`, `keterangan`, `status_kunci`) VALUES
(321, 'admin', 14, '95309-ramuan-sapi-ternak.pdf', '58759-ramuan-sapi-ternak.enc', 'file_encrypt/58759-ramuan-sapi-ternak.enc', 85.9355, 'ecdc7aa1144699d3', '2021-05-31 08:47:46', '1', 'ramuan sapi ternak', '1'),
(320, 'admin', 14, '66103-ramuan-sapi-ternak.pdf', '12871-ramuan-sapi-ternak.enc', 'file_encrypt/12871-ramuan-sapi-ternak.enc', 85.9355, 'ecdc7aa1144699d3', '2021-05-31 08:39:45', '1', 'ramuan sapi ternak', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `file_pelanggan`
--

CREATE TABLE `file_pelanggan` (
  `id_file` int(11) NOT NULL,
  `id_pelanggan` int(100) NOT NULL,
  `file_name_source` varchar(255) DEFAULT NULL,
  `file_name_finish` varchar(255) DEFAULT NULL,
  `file_url` varchar(255) DEFAULT NULL,
  `file_size` float DEFAULT NULL,
  `password` varchar(16) DEFAULT NULL,
  `tgl_upload` timestamp NULL DEFAULT NULL,
  `status` enum('1','2') DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `status_kunci` enum('0','1') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `file_pelanggan`
--

INSERT INTO `file_pelanggan` (`id_file`, `id_pelanggan`, `file_name_source`, `file_name_finish`, `file_url`, `file_size`, `password`, `tgl_upload`, `status`, `keterangan`, `status_kunci`) VALUES
(232, 14, '95309-ramuan-sapi-ternak.pdf', '58759-ramuan-sapi-ternak.enc', 'file_encrypt/58759-ramuan-sapi-ternak.enc', 85.9355, 'ecdc7aa1144699d3', '2021-05-31 08:47:46', '1', 'ramuan sapi ternak', '0'),
(231, 14, '66103-ramuan-sapi-ternak.pdf', '12871-ramuan-sapi-ternak.enc', 'file_encrypt/12871-ramuan-sapi-ternak.enc', 85.9355, 'ecdc7aa1144699d3', '2021-05-31 08:39:45', '2', 'ramuan sapi ternak', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(100) NOT NULL,
  `nama_pelanggan` varchar(100) DEFAULT NULL,
  `alamat_pelanggan` varchar(100) DEFAULT NULL,
  `email_pelanggan` varchar(100) DEFAULT NULL,
  `no_hp` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `email_pelanggan`, `no_hp`, `username`, `password`) VALUES
(2, 'alwy', 'adsadas', 'almusyagame779@gmail.com', '019201920192', 'almusya890', 'a7777999e260290f68a1455cacdabf6c'),
(14, 'alwy', 'Jl Kaliurang KM 6.5', 'almusya16@gmail.com', '081332899292', 'alwy', 'a7777999e260290f68a1455cacdabf6c');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `durasi_dec`
--
ALTER TABLE `durasi_dec`
  ADD PRIMARY KEY (`id_dec`);

--
-- Indeks untuk tabel `durasi_enc`
--
ALTER TABLE `durasi_enc`
  ADD PRIMARY KEY (`id_enc`);

--
-- Indeks untuk tabel `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id_file`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `file_pelanggan`
--
ALTER TABLE `file_pelanggan`
  ADD PRIMARY KEY (`id_file`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `durasi_dec`
--
ALTER TABLE `durasi_dec`
  MODIFY `id_dec` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `durasi_enc`
--
ALTER TABLE `durasi_enc`
  MODIFY `id_enc` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `file`
--
ALTER TABLE `file`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=322;

--
-- AUTO_INCREMENT untuk tabel `file_pelanggan`
--
ALTER TABLE `file_pelanggan`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Database: `samudrap_sale`
--
CREATE DATABASE IF NOT EXISTS `samudrap_sale` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `samudrap_sale`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` varchar(25) NOT NULL,
  `publish` int(1) NOT NULL COMMENT '1:publish, 2:non-publish',
  `nama_brg` varchar(100) NOT NULL,
  `harga_brg` varchar(100) NOT NULL,
  `stock_brg` varchar(100) NOT NULL,
  `gambar_brg` varchar(100) DEFAULT NULL,
  `kategori_brg` int(11) NOT NULL,
  `kode_brg` varchar(100) NOT NULL,
  `detail_brg` text NOT NULL,
  `create` datetime NOT NULL DEFAULT current_timestamp(),
  `id_user` int(11) DEFAULT NULL,
  `berat_brg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `publish`, `nama_brg`, `harga_brg`, `stock_brg`, `gambar_brg`, `kategori_brg`, `kode_brg`, `detail_brg`, `create`, `id_user`, `berat_brg`) VALUES
('BRG-210qVRYm8v0524', 1, 'Probiotik Bakteri  Udang', '35000', '55', 'item-212405-dd53864241.png', 43, 'VU-0002', ' <p><span xss=removed>Probiotik untuk menurunkan dan menguraikan Amonia Dan Nitrit, serta menjaga kestabilan air.\r\n\r\nProbiotik Kemasan 100 gr\r\n\r\nProbiotik ini mengandung bakteri nitrosomonas 10^14 (10 pangkat 14), dan jumlah CFU yg tinggi, sehingga penggunaannya lebih irit.\r\n\r\nBisa digunakan juga untuk menguraikan kotoran ternak.\r\n\r\nBerperan dalam proses nitrifikasi.\r\n\r\nMampu menurunkan dan menjaga kestabilan PH air.\r\n</span></p><p><span xss=removed>Bersifat Aerob.\r\n</span></p><p><span xss=removed>Bisa digunakan langsung tanpa dikultur, karena jumlah bakteri yg sudah cukup banyak.\r\n</span></p><p><span xss=removed>Apabila pada kolam sedang dipush pakan / menggenjot pertumbuhan, baiknya diberikan kekolam perhari. \r\n</span></p><p><span xss=removed>Atau juga bisa diberikan secara berkala, tergantung kondisi air.</span> </p>', '2021-05-24 08:27:44', 9, '100'),
('BRG-211qVsaRIv0524', 1, 'MAXINOS Susu  Ternak', '21000', '21', 'item-212405-b6c43f32dd.png', 48, 'VK-0442', ' <p><span xss=removed><b><u>Maxins </u></b>adalah Feed Suplement berupa susu bubuk yang mengandung nutrisi mikro lengkap terdiri dari Protein, Mineral, Asam Amino dan Multivitamin yang diformulasikan khusus untuk Hewan Ternak.</span></p><p><span xss=removed><br></span><span xss=removed>INDIKASI</span></p><ul><li><span xss=removed>Meningkatkan Nafsu Makan Hewan Ternak & Memperbaiki Metabbolisme Tubuh.</span></li><li><span xss=removed>Mempercepat Pertumbuhan Hewan Ternak</span></li><li><span xss=removed> Mencegah Penyakit akibat Defisiensi Nutrisi</span></li><li><span xss=removed>Meningkatkan Efisiensi Penggunaan Pakan sehingga mampu Menurunkan Feed Conversi</span></li><li><span xss=removed>Meningkatkan daya tahan tubuh dan meningkatkan produksi hewan ternak.</span></li><li><span xss=removed>Mengatasi Keterbatasan Susu Induk (Menjadi Susu Pengganti) bagi anak sapi, kerbau, kuda, babi, kambing, dan domba</span><span xss=removed><br></span></li></ul><p><span xss=removed><br></span> </p>', '2021-05-24 08:33:59', 9, '1000'),
('BRG-212nC6WEuX0524', 1, 'Desthin obat hama', '60000', '19', 'item-212405-e00ccd8056.png', 46, 'OBT-TN-00024', ' <p><span xss=removed><b><u>Desthin </u></b></span></p><p xss=removed><span xss=removed>Merupakan Insektisida/Obat Hama siap pakai yg Efektif membasmi hama pada tanaman dan juga mengandung Obat Anti Jamur yang sangat diperlukan untuk semua jenis tanaman terutama. Pada musim hujan. Jadi Desthin Obat Hama siap pakai yang sudah ada campuran Obat Anti Jamur didalam kandungannya.</span> </p>', '2021-05-24 07:49:06', 9, '2000'),
('BRG-213fjsvD4z0616', 1, 'Tempat Minum Ayam 1 Liter', '6500', '24', 'item-211606-57dacaaa6f.png', 49, 'PAT-0011', ' Tempat Minum Ayam dengan volume air 1 liter', '2021-06-16 16:25:02', 9, '250'),
('BRG-214XBhARon0524', 1, 'Pakan Ayam Raksasa KYOJIN Kemasan 1 Kg', '75000', '24', 'item-212405-14ba65d548.png', 42, 'PK-PTK-00891', ' <p><span xss=\"removed\"><span xss=\"removed\"><u>KYOJIN</u></span></span></p><p xss=removed><span xss=\"removed\">bahan racikan tidak berpengaruh secara maksimal tanpa ada nya ENZIM</span></p><p xss=removed><span xss=\"removed\">Kyojin menyempurnakannya dengan enzim untuk tujuan penyerapan secara menyeluruh sehingga semua kandungan yang terdapat dalam bahan pakan bisa berfungsi 100 dari mulai pertumbuhan badan sampai keindahan bulu.\r\n</span></p><p xss=removed><span xss=\"removed\">Jika ada yang bertanya tentang kelincahan berlaga, tentu tidak diragukan lagi karena enzim yang terkandung mampu menyerap seluruh lemak sebagai sumber energi.\r\n</span></p><ul><li xss=removed><span xss=\"removed\">1 hari 2 sendok makan kyojin + campuran bekatul untuk ayam laga kesayangan anda...sangat murah, dan kaya manfaat\r\n</span></li><li xss=removed><span xss=\"removed\">kurang lebih terpakai 2 bulan untuk 1 ekor ayam laga mulai usia 2 bulan.\r\n</span></li></ul><p xss=removed><span xss=\"removed\">Artinya pada saat ayam laga usia 7 bulan ( masuk fase dewasa ) hanya menghabiskan sebanyak 3 dus saja. Harga yg sangat murah untuk sebuah eksperimen yang sangat sangar.</span></p> ', '2021-05-24 07:33:03', 9, '1000'),
('BRG-215IdCmSaL0319', 1, 'Cat Choize', '16000', '36', 'item-211903-c944bada00.jpg', 45, 'PK-KCG-006289', '  <p dir=\"ltr\"><span xss=removed>Makanan Kucing CAT CHOIZE Cat Food Rasa Tuna FRESHPACK 800Gr Bagus dan Murah</span></p>\r\n<p dir=\"ltr\"><span xss=removed>Rasa TUNA</span><br>\r\n<span xss=removed>Bebas Babi!! No Pork!!</span><br>\r\n<span xss=removed>Exp Feb 2022</span></p>\r\n<p dir=\"ltr\"><span xss=removed>Sangat cocok untuk kucing kesayangan anda.</span><br>\r\n<span xss=removed>Mengandung Nutrisi Lengkap, Vitamin dan Mineral yang berguna utk:</span><br>\r\n<span xss=removed>- Kesehatan Gigi</span><br>\r\n<span xss=removed>- Fungsi Pencernaan</span><br>\r\n<span xss=removed>- Kesehatan Kulit dan Bulu</span><br>\r\n<span xss=removed>- Penglihatan</span></p>\r\n<p dir=\"ltr\"><span xss=removed>Kandungan Gizi:</span><br>\r\n<span xss=removed>Crude Protein 27%</span><br>\r\n<span xss=removed>Crude Fat 9%</span><br>\r\n<span xss=removed>Crude Fiber 4%</span><br>\r\n<span xss=removed>Moisture 10%</span></p> ', '2021-03-20 05:58:52', 8, '800'),
('BRG-216CxGYwSq0524', 1, 'Probiotik Tambak Udang', '120000', '11', 'item-212405-5785ec9484.png', 43, 'VU-0001', '<p><span xss=removed><u><b>Probiotik Tambak Udang Untuk Budidaya Udang</b></u>\r\n</span></p><ol><li><span xss=removed> Menjernihkan air, meningkatkan kualitas air dan transparansi,</span></li><li><span xss=removed> Memperbaiki dasar tambak,</span></li><li><span xss=removed>Mengusir racun,</span></li><li><span xss=removed> Menjaga keseimbangan mikro-lingkungan air,</span></li><li><span xss=removed>Promosikan keseimbangan mikroflora budidaya di usus,</span></li><li><span xss=removed>Meningkatkan pencernaan dan penyerapan</span></li><li><span xss=removed>Meningkatkan kemampuan anti-stres,</span> </li></ol>', '2021-05-24 08:24:44', 9, '10000'),
('BRG-218MoKJsq60616', 1, 'Tempat Minum Ayam 3 Liter', '16000', '21', 'item-211606-5264a6cbee.png', 49, 'PAT-0012', ' Tempat Minum Ayam dengan kapasitas volume air 3 liter', '2021-06-16 17:52:02', 9, '500'),
('BRG-218QAkJavX0524', 1, 'WHISKAS 85gr JUNIOR MACKEREL', '7000', '56', 'item-212405-aaadcaa280.png', 45, 'PK-KCG-0009', '<p><span xss=removed><b><u>MAKANAN KUCING Cat Food Whiskas junior POUCH 85 gr untuk kitten </u></b></span></p><p xss=removed><span xss=removed>Kelebihan makanan kucing basah Makanan basah memiliki struktur daging yang segar dan beraroma kuat, sehingga dapat menarik perhatian kucing kamu. Jika kucing anda lagi males makan, coba aja di berikan whiskas basah ini. Whiskas wet yang di balut dalam gabungan jelly dengan potongan ikan ini, merupakan makanan favorit kucing anda. Dibalut dalam kemasan 85g, menjadikan whiskas ini kemasan ekonomis dan praktis. Ditambah dengan kemasan yang higienis, sehingga aman di berikan untuk menjadi makanan kucing sehat dan dapat di berikan harian untuk kucing anda. </span><span xss=removed><b><u><br></u></b></span> </p>', '2021-05-24 08:09:24', 9, '100'),
('BRG-218RivpCIQ0616', 1, 'INSEKTISIDA YASITHRIN 400 ML', '45000', '23', 'item-211606-463033bc13.png', 46, 'OBT-TN-00881', ' <p><span xss=removed><b>YASITHRIN 30 EC</b></span></p><p><span xss=removed>insektisida racun kontak dan lambung berbentuk pekatan  yang dapat diemulsikan untuk mengendalikan hama pada tanaman jagung, kedelai, kubis, lada, semangka, dan teh.</span></p><p><span xss=removed><b>PETUNJUK PENGGUNAAN</b></span></p><ul><li><span xss=removed>Gunakan air lapang biasa yang tidak mengandung lumpur dan kotoran lainnya. Bila perlu siapkan air satu malam sebelum penyemperotan agar lumpur dan kotoran lainnya mengendap.</span></li><li><span xss=removed>Waktu aplikasi pagi hari sebelum jam 9 atau sore hari setelah jam 4.\r\nLakukan penyemperotan pada waktu cuaca cerah dan diperkirakan hujan tidak turun dalam waktu 4-6 jam setelah penyemperotan.</span></li><li><span xss=removed>Gunakan dosis dan volume semperot yang dianjurkan.\r\n</span></li><li><span xss=removed>Volume semperot:  500 g/l</span><span xss=removed><br></span></li></ul>', '2021-06-16 16:06:09', 9, '500'),
('BRG-21AahTzxCr0303', 1, 'Vitacik', '25000', '125', 'item-212003-82f7ab9640.jpg', 44, 'KD-56Kiiss', '<p dir=\"ltr\"><span xss=removed>Vitachik </span><br>\r\n<span xss=removed>Indikasi :</span><br>\r\n<span xss=removed>- mempercepat pertumbuhan</span><br>\r\n<span xss=removed>- mencegah kekurangan vitamin</span><br>\r\n<span xss=removed>- mengatasi stres</span><br>\r\n<span xss=removed>- mengurangi angka kematian pada anak ayam</span></p>\r\n<p dir=\"ltr\"><span xss=removed>Aturan pakai dalam kemasan.</span></p>\r\n<p dir=\"ltr\"><span xss=removed>Berat produk 100 gram.</span></p>     ', '2021-03-03 23:25:40', 8, '100'),
('BRG-21AlVOfcdv0522', 1, 'Insektisida BASSA 500 EC 400ML', '39000', '15', 'item-212205-4d128cf2b4.png', 46, 'OBT-TN00882', '<p><span xss=removed><b><u>Bassa 500 EC</u></b>\r\n( BPMC 480 g/l )\r\n\r\nInsektisida racun kontak dan lambung berbentuk pekatan berwarna coklat muda yang dapat diemulsikan untuk mengendalikan hama-hama penting pada tanaman padi seperti wereng coklat, wereng hijau, wereng punggung putih, walang sangit, lalat daun, hama putih palsu dan hama-hama penting lainnya pada tanaman kedelai, kakao, jagung, kopi, lada, lamtoro, padi dan teh.</span></p><p><span xss=removed>Manfaat Produk :\r\n</span></p><ul><li><span xss=removed>Insektisida ini yang direkomendasikan oleh Kementerian Pertanian untuk pengendalian hama tanaman padi sehingga bermanfaat untuk tanaman dan aman. tanaman palawija, sayuran & tanaman lainnya.Selain itu dapat melindungi</span></li></ul><p><span xss=removed>Keunggulan Produk :\r\n</span></p><ul><li><span xss=removed>Insektisida pengendali wereng yang ekonomis, dan sudah teruji. Mampu mengendalikan berbagai jenis hama penting pada berbagai tanaman</span> </li></ul>', '2021-05-22 06:51:14', 8, '500'),
('BRG-21alx2VcYq0303', 1, 'Matador Super', '22500', '84', 'item-212003-9c2ec8e180.jpg', 46, 'OBT-TN-16007', ' <p dir=\"ltr\"><span xss=removed>MATADOR 25 EC (50mL) merupakan insektisida racun kontak dan lambung, berbentuk pekatan yang dapat diemulsikan dalam air, berwarna kuning jerami untuk mengendalikan hama-hama pada tanaman bawang merah, bawang putih, cabai, jagung, jeruk, kacang panjang, kakao, kapas, kedelai, kelapa sawit, kubis, lada, lamtoro, manga, teh, tembakau dan tomat</span></p>\r\n<p dir=\"ltr\"><span xss=removed>Untuk mengendalikan hama pada tanaman :</span><br>\r\n<span xss=removed>• Bawang merah: Ulat grayak Spodoptera exigua</span><br>\r\n<span xss=removed>• Bawang putih: Ulat grayak Spodoptera sp</span><br>\r\n<span xss=removed>• Cabai: Ulat grayak Spodoptera litura</span><br>\r\n<span xss=removed>• Jagung: Ulat grayak Spodoptera sp, perusak buah Heliothis sp; belalang Oxya sp</span><br>\r\n<span xss=removed>• Jeruk: Diaphorina citri</span><br>\r\n<span xss=removed>• Kacang panjang: Kutu daun Aphis craccivora, penggerek polong Maruca testulalis</span><br>\r\n<span xss=removed>• Kakao: ulat kilan Hyposidra talaca, penghisap buah Helopeltis sp, penggerek buah Conopomorpha cramerella</span><br>\r\n<span xss=removed>• Kedelai: Perusak daun Plusia chalcites, penggulung daun Lamprosema indicata, penggerek polong Etiella sp, kepik hijau Nezara viridula, ulat grayak Spodoptera sp</span><br>\r\n<span xss=removed>• kapas: Penggerek pucuk Heliothis sp, dan penggerek buah Earias sp</span><br>\r\n<span xss=removed>• Kelapa sawit: ulat api Thosea asigna</span><br>\r\n<span xss=removed>• Kubis: Perusak daun Crocidolomia binotalis dan Plutella xylostella</span><br>\r\n<span xss=removed>• Lada: Penghisap buah Dasynus piperis dan penghisap bunga Diplogomphus hewitti</span><br>\r\n<span xss=removed>• Lamtoro: Kutu loncat Heteropsylla sp</span><br>\r\n<span xss=removed>• Mangga: Wereng Idiocerus spp</span><br>\r\n<span xss=removed>• Tembakau: Penggerek pucuk Heliothis sp, ulat grayak Spodoptera litura</span><br>\r\n<span xss=removed>• Teh: Penghisap daun Helopeltis sp</span><br>\r\n<span xss=removed>• Tomat: Ulat buah Heliothis armiger</span><br></p>\r\n<p dir=\"ltr\"><span xss=removed>Cara pemakaian: campurkan sebyk 2-4 ml/L air. Semprotkan kebagian tanaman yg terserang hama sesuai kebutuhan & serangan hama</span><br>\r\n</p>', '2021-03-03 22:19:45', 8, '100'),
('BRG-21B2whVvMD0521', 1, 'Gayemi Ruminal Stimulant 25 gr', '5000', '24', 'item-212105-b70dda3186.png', 48, 'VS-00998', '<p><u><b>Vitamin untuk hewan ternak.</b></u></p><p><span xss=removed>Keunggulan : </span></p><ul><li><span xss=removed>Meningkatkan nafsu makan </span></li><li><span xss=removed>membantu pencernaan hewan ternak</span></li></ul><p><span xss=removed><b><u>Khusus untuk sapi, kerbau, domba, dan kambing</u></b></span><br></p>', '2021-05-22 01:06:20', 9, '250'),
('BRG-21d9tGz4sq0524', 1, 'Tetes Tebu', '18000', '74', 'item-212405-0ee2c82b4f.png', 48, 'VS-01111', '<p><span xss=removed><u><b>Molase Tetes Tebu</b>.</u></span></p><p><span xss=removed>foodgrade bisa di buat olahan makanan/minuman. warnanya hitam, kental, murni tanpa campuran</span></p><p><span xss=removed>\r\njangan terkecoh dengan molase murah, molase yg bermutu adalah kental dan berwarna hitam (bukan coklat)\r\n</span></p><p><span xss=removed><b><u>Molase </u></b>biasanya digunakan untuk</span></p><ul><li><span xss=removed> eco enzym</span></li><li><span xss=removed>permentas pupuk,</span></li><li><span xss=removed> pengemuk ternak  sapi/ kambing/kelinci, </span></li><li><span xss=removed>budidaya  udang/ikan/lele, industri dll</span></li></ul><p><span xss=removed>Berat 2kg / botol</span></p><div><span xss=removed><br></span></div><p></p>', '2021-05-24 07:22:44', 9, '2000'),
('BRG-21FMxYK3sq0320', 1, 'Pedaging 511', '10000', '42', 'item-212003-ff7255dccb.jpg', 42, 'PK-PTK-0779201', ' <p dir=\"ltr\"><span xss=removed><b>Pakan Ayam Pedaging 511 Voer Makanan Ayam</b></span></p>\r\n<p dir=\"ltr\"><span xss=removed>Untuk Ayam Baru Menetas : Starter (0 - 5 minggu)</span></p>\r\n<p dir=\"ltr\"><span xss=removed>Kategori :</span><br>\r\n<span xss=removed>makanan ayam, pakan ayam</span></p>\r\n<p dir=\"ltr\"><span xss=removed>isi 1kg</span></p>\r\n<p dir=\"ltr\"><span xss=removed>Cara pakai :</span><br>\r\n<span xss=removed>Dapat diberikan tanpa tambahan bahan pakan lain, Berikan pakan harian secara teratur pada Ayam kesayangan</span></p>\r\n<p dir=\"ltr\"><span xss=removed>Manfaat kegunaan :</span><br>\r\n<span xss=removed>Nutrisi lengkap yang dibutuhkan untuk masa pertumbuhan & menambah berat Ayam</span></p> ', '2021-03-20 06:10:37', 8, '1000'),
('BRG-21h2tO4Rfw0522', 1, 'Tetrakrol', '13000', '24', 'item-212205-86dee61bde.png', 44, 'KD-0051', '   <p><span xss=\"removed\"><b><u>VITA TETRA-CHLOR</u></b>\r\n\r\nVita Tetra chlor adalah sediaan kapsul mengandung kombinasi antibiotik tetracycline HCl dan erythromycin kombinasi ini memilik spektrum luas dan bekerja secara sinergis dengan cara mengikat ribosom 30S dan 50 S sehingga sintesis protein bakteri terhambat, Sangat cokok digunakan untuk ayam, bebek, menthok, dan hewan unggas lainnya.</span></p><p><span xss=\"removed\">\r\nINDIKASI: </span></p><ul><li><span xss=\"removed\">Korisa (snot pilek muka bengkak kolera berak hijau) </span></li><li><span xss=\"removed\">Pullorum (berak kapur) </span></li><li><span xss=\"removed\">CRD (ngorok)\r\n</span></li></ul><p><span xss=\"removed\">\r\nAturan Pakai:\r\n</span></p><p><span xss=\"removed\" xss=removed><u xss=\"removed\"><b><font xss=\"removed\" xss=removed>Sampai umur 4 Minggu sehari satu kali isi setengah kaps</font><font xss=\"removed\">ul </font></b></u></span></p><ul><li><span xss=\"removed\"> Umur 4 sampai 8 Minggu sehari dua kali isi setengah kapsul</span></li><li><span xss=\"removed\"> Lebih dari 8 Minggu sehari dua kali isi 1 kapsul obat diberikan selama 4 sampai 5 hari berturut-turut \r\n\r\n</span> </li></ul>', '2021-05-22 06:15:19', 8, '250'),
('BRG-21HPEW7CpX0524', 1, 'Obat Pertanian Koge 50gr/obat anti busuk pada cabe', '50000', '47', 'item-212405-cc47028247.png', 46, 'OBT-TN-00023', '<p><span xss=removed><b><u>KOGE</u></b></span></p><p><span xss=removed>Merupakan fungisida protektif untuk mengendalikan penyakit pada tanaman cabe, kubis(kol), tomat dll. Berbentuk serbuk yang mudah dilarutkan pada air.</span></p><p><span xss=removed>Selain itu pada tanaman cabe dapat untuk mengendalikan penyakit patek (antraknosa/ colletotrichum spp) dan penyakit busuk daun (phytophtora infestans)</span></p><p><span xss=removed>Dosis penggunaan:</span></p><ul><li><span xss=removed>1 gr /1 ltr air (1 tutup kemasan per tangki 16lt)\r\n</span> <div><span xss=removed><br></span></div></li></ul>', '2021-05-24 07:40:27', 9, '100'),
('BRG-21KTyoVLlB0522', 1, 'Cacing Exitor', '3000', '50', 'item-212205-292f375cb4.png', 44, 'KD-00019', '<p><span xss=removed><b><u>Obat cacing exitor</u></b> adalah obat cacing untuk unggas khusus nya ayam.\r\n</span></p><ul><li><span xss=removed>Bila ayam keliatan lesu tak bersemangat makan, bisa jadi ayam anda terkena cacingan. \r\n</span></li></ul><p><span xss=removed>Segera obati menggunakan obat cacing exitor.</span> </p>', '2021-05-22 06:32:43', 8, '50'),
('BRG-21lwpJ2zdI0521', 1, 'Mineral Kambing Eka-Farm', '10000', '34', 'item-212105-1e48bd3206.png', 48, 'VK-0441', '<p><span xss=removed><u><b>Mineral khusus untuk Kambing / Domba</b></u></span></p><p><span xss=removed>Mencegah : </span></p><ol><li><span xss=removed>kelumpuhan dan keguguran,</span></li><li><span xss=removed> meningkatkan produksi air susu, </span></li><li><span xss=removed>mempercepat pertumbuhan dan berat badan. </span></li></ol><p><span xss=removed><b>Kemasan:1kg.</b></span><span xss=removed><br></span> </p>', '2021-05-22 00:58:32', 9, '1000'),
('BRG-21ME1GgI650319', 1, 'Bolt', '23000', '30', 'item-211903-bc355d4e2d.jpg', 45, 'PK-KCG-5267710', '  <p dir=\"ltr\"><span xss=removed>Bolt diformulasikan untuk memenuhi nutrisi standar (Profil Nutrist) makanan kucing yang disahkan oleh AAFCO. </span></p>\r\n<p dir=\"ltr\"><span xss=removed>Kulit Sehat dan Bulu Berkilau</span><br>\r\n<span xss=removed>Asam lemak omega-6, Asam linoleic, Niacin, Asam Pantothenic, Biotin dan Zinc berfungsi meningkatkan kesehatan kulit dan kilau pada bulu.</span></p>\r\n<p dir=\"ltr\"><span xss=removed>Penglihatan Tajam</span><br>\r\n<span xss=removed>Taurine dan vitamin A berfungsi memelihara kesehatan mata kucing sehingga penglihatan lebih tajam.</span></p>\r\n<p dir=\"ltr\"><span xss=removed>Kesehatan Gigi</span><br>\r\n<span xss=removed>Kibble yang renyah mengurangi akumulasi plak dan memutihkan gigi</span></p>\r\n<p dir=\"ltr\"><span xss=removed>Mengurangi Resiko FLUTD</span><br>\r\n<span xss=removed>Magnesium terkontrol mengurangi resiko penyakit saluran kemih pada kucing (FLUTD)</span></p>\r\n<p dir=\"ltr\"><span xss=removed>Meningkatkan Sistem Imunitas</span><br>\r\n<span xss=removed>Diperkaya dengan Antioksidan, Vitamin E, Vitamin C dan Selenium untuk menjaga imunitas tubuh</span></p>\r\n<p dir=\"ltr\"><span xss=removed>Kandungan Bolt</span><br>\r\n<span xss=removed>Jagung, Tepung daging unggas, Tepung gandum, Protein, Kedelai isolate, Tepung tuna, Lemak Unggas, Hati ayam digest, Vitamin dan Mineral (Vitamin A Palmitate, D3, E, L-ascorbyl-2-polyphosphate, Thiamin, Riboflavin, Pantothenic Acid, Pyridoxine, Biotin, Choline chloride, Ferrous Sulfate, Zinc Sulfate, Copper Sulfate, Manganese Sulfate, Sodium Selenite, Calcium, iodate), Taurine, Antioksidan.</span></p>\r\n<p dir=\"ltr\"><span xss=removed>Nilai Gizi Terjamin</span><br>\r\n<span xss=removed>Protein kasar: Min 28%</span><br>\r\n<span xss=removed>Lemak kasar: Min 9%</span><br>\r\n<span xss=removed>Serat kasar: Max 4%</span><br>\r\n<span xss=removed>Kelembapan: Max 10%</span></p>\r\n<p dir=\"ltr\"><span xss=removed>Petunjuk Pemberian Pakan</span><br>\r\n<span xss=removed>2,2 - 2,9 : 40-60 gr/hari</span><br>\r\n<span xss=removed>3,0 - 3,9 : 60-75 gr/hari</span><br>\r\n<span xss=removed>4,0 - 4,9 : 75-90 gr/hari</span><br>\r\n<span xss=removed>5,0-6,0 : 90-100 gr/hari</span></p>\r\n<p dir=\"ltr\"><span xss=removed>Kandungan Kalori (Energi metabolik terukur): 3850 kcal/kg</span></p> ', '2021-03-20 05:56:23', 8, '1000'),
('BRG-21MuVyxaoe0616', 1, 'Tempat Pakan Ayam', '10000', '18', 'item-211606-81cf2df9c7.png', 49, 'PAT-0013', ' <span xss=removed><b>Tempat pakan ayam  MERK MEDION</b>\r\n\r\nDigunakan sebagai tempat makan anak ayam mudah dan higienis.</span>', '2021-06-16 17:55:26', 9, '250'),
('BRG-21OKUAn1H90521', 1, 'Ultra Mineral', '12000', '61', 'item-212105-b123c82a77.png', 48, 'VS-00997', '<p>   <span xss=\"removed\"><b>INDIKASI :</b>\r\n</span></p><ol><li><span xss=\"removed\">MENAMBAH NAFSU MAKAN.\r\n</span></li><li><span xss=\"removed\">MENAMBAH BERAT BADAN.\r\n</span></li><li><span xss=\"removed\">MEMPERCEPAT PERTUMBUHAN.\r\n</span></li><li><span xss=\"removed\">MEMPERBAIKI KUALITAS SUSU.</span></li><li><span xss=\"removed\">MENCEGAH DEFISIENSI VITAMIN dan MINERAL</span></li><li><span xss=\"removed\">MENINGKATKAN KESUBURAN/ FERTILITAS.\r\nDOSIS :\r\n- Anak Sapi /Pedet\r\n- Sapi Muda\r\n- Sapi Perah<br></span></li></ol>', '2021-05-22 00:32:29', 9, '1000'),
('BRG-21OPYHpkB00524', 1, 'Pakan Kucing Felibite Ikan dan Donat 500 gr', '12500', '98', 'item-212405-084c25e128.png', 45, 'PK-KCG-001', '<span xss=removed>Pakan kucing Felibite 500 gr bentuk ikan dan donat mengandung omega 3 & 6 untuk menjaga kesehatan bulu dan kulit kucing. taurine asam amino essential untuk kesehatan mata.\r\nVit C untuk meningkatkan daya tahan tubuh serta yucca extract untuk menjaga kesehatan pencernaan dan urinary</span> ', '2021-05-24 08:04:06', 9, '500'),
('BRG-21PK4aw6HG0303', 1, 'Hi Por Vit', '11000', '48', 'item-212003-62347fb079.jpg', 42, 'PK-PTK-0836111', '   <p dir=\"ltr\"><span xss=removed><b>Pur ayam tinggi vitamin untuk ayam baru menetas</b></span><br>\r\n<span xss=removed>Berat bersih 1kg dari PT. Charoen Pokphand Indonesia</span></p>    ', '2021-03-03 23:36:12', 8, '1000'),
('BRG-21Q4zfB7NK0319', 1, 'Feng Li', '5000', '78', 'item-211903-9424b0ffa9.jpg', 43, 'PK-UDG-003561', ' <p dir=\"ltr\"><span xss=removed>Feng Li 100gram</span></p><p dir=\"ltr\"><span xss=removed>Keunggulan Feng-Li 0:</span></p>\r\n<p dir=\"ltr\"><span xss=removed>- Formula pakan telah terbukti pada udang budidaya dan burayak segala jenis ikan air tawar.</span></p>\r\n<p dir=\"ltr\"><span xss=removed>- Mengandung asam amino esensial sehingga udang dan burayak ikan tumbuh lebih sehat dan cepat</span></p>\r\n<p dir=\"ltr\"><span xss=removed>- Daya tahan udang dan burayak ika lebih baik dengan survival rate yang tinggi</span></p>\r\n<p dir=\"ltr\"><span xss=removed>- Mendukung pengelolaan less water exchange karena dengan Feng-Li tingkat kestabilan air baik.</span><br><br></p>\r\n<p dir=\"ltr\"><span xss=removed>Spesifikasi & Nutrisi</span></p>\r\n<p dir=\"ltr\"><span xss=removed>Feng Li 0</span><br>\r\n<span xss=removed>Butiran : < 0><br>\r\n<span xss=removed>Protein 40% (min)</span><br>\r\n<span xss=removed>Lemak 5% (min)</span><br>\r\n<span xss=removed>Serat 2% (max)</span><br>\r\n<span xss=removed>Abu 13% (max)</span><br>\r\n<span xss=removed>Kadar Air 11% (max)</span><br>\r\n<span xss=removed>Kestabilan Dalam Air 90% (min)</span></p> ', '2021-03-20 05:53:27', 8, '100'),
('BRG-21vXAi0E680616', 1, 'Jamu Pawang Jago', '55000', '22', 'item-211606-79289f5584.png', 44, 'KD-001PWJ', '<p><span xss=removed><b>jamu pawang jago</b> telah terbukti ampuh menambah tenaga ayam aduan atau ayam bangkok. </span></p><p><span xss=removed>selain itu sangat berpengaruh terhadap ayam yg rutin komsunsi jamu ini. </span></p><p><span xss=removed>ayam sehat ceria nafsu makan tinggi. agresif dalam adu dan bagus juga untuk pejantan atau induk dalam proses produksi</span> </p>', '2021-06-16 20:31:46', 9, '200'),
('BRG-21X9prx3hT0616', 1, 'Tas Ayam', '45000', '19', 'item-211606-cf54894640.png', 49, 'PAT-0015', ' <p><span xss=removed><b>Tas Ayam jago </b>model anyaman dari rotan plastik halus</span></p><p><span xss=removed>Panjang 50cm</span></p><p><span xss=removed>Tinggi 27cm</span></p><p><span xss=removed>Lebar 24cm</span> </p>', '2021-06-16 20:11:18', 9, '800'),
('BRG-21Zdu8JyxD0522', 1, 'Sidabas 500 EC isi 400 ml Insektisida', '40000', '17', 'item-212205-5d9f4e7fe3.png', 46, 'OBT-TN-00883', '   <p><span xss=removed><b><u>SIDABAS 500 EC</u></b> adalah insektisida racun kontak berbentuk pekatan yang dapat diemulsikan (emulsifiable concentrate/EC) berwarna kuning untuk mengendalikan hama wereng pada pertanaman padi dan hama-hama penting pada pertanaman bawang merah, cabai, jagung, kakao, kedelai dan teh. BPMC atau fenobucarb dalam penggolongan IRAC (Insecticide Resistance Action Committee) termasuk golongan 1A Karbamat. Golongan karbamat merupakan racun kontak yang menurunkan aktivitas enzim kolinesterase darah dan bekerja sebagai racun saraf.</span></p><ol><li><span xss=removed>Gunakan air lapang biasa yang tidak mengandung lumpur dan kotoran lainnya. Bila perlu siapkan air satu malam sebelum penyemperotan agar lumpur dan kotoran lainnya mengendap.\r\n</span></li><li><span xss=removed>Waktu aplikasi pagi hari sebelum jam 9 atau sore hari setelah jam 4.\r\n</span></li><li><span xss=removed>Lakukan penyemperotan pada waktu cuaca cerah dan diperkirakan hujan tidak turun dalam waktu 4-6 jam setelah penyemperotan.\r\n</span></li><li><span xss=removed>Gunakan dosis dan volume semperot yang dianjurkan.\r\n</span></li><li><span xss=removed>Volume semperot: 500 g/l.</span><span xss=removed><br></span> </li></ol>', '2021-05-22 06:43:01', 8, '500');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_penjualan`
--

CREATE TABLE `tb_detail_penjualan` (
  `id_detail` varchar(25) NOT NULL,
  `id_barang` varchar(25) DEFAULT NULL,
  `harga` varchar(100) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `total` int(100) NOT NULL,
  `id_penjualan` varchar(25) DEFAULT NULL,
  `tgl_create` date DEFAULT NULL,
  `berat` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detail_penjualan`
--

INSERT INTO `tb_detail_penjualan` (`id_detail`, `id_barang`, `harga`, `jumlah`, `total`, `id_penjualan`, `tgl_create`, `berat`) VALUES
('DTL-2109en60523', 'BRG-21B2whVvMD0521', '5000', 10, 50000, 'PJL-21QyPic0523', '2021-04-13', '250'),
('DTL-210yMNR0616', 'BRG-21vXAi0E680616', '55000', 1, 55000, 'PJL-21sALJ90523', '2021-06-16', '200'),
('DTL-2110rHU0616', 'BRG-21X9prx3hT0616', '45000', 2, 90000, 'PJL-21J7PR00616', '2021-06-16', '800'),
('DTL-211XJEh0523', 'BRG-21Zdu8JyxD0522', '40000', 1, 40000, 'PJL-21Klg3Q0523', '2021-03-10', '500'),
('DTL-2142WXL0522', 'BRG-21Q4zfB7NK0319', '5000', 1, 5000, 'PJL-21bX7Rl0522', '2021-05-22', '100'),
('DTL-215bSxQ0523', 'BRG-21ME1GgI650319', '23000', 2, 46000, 'PJL-21aTf3L0523', '2021-05-23', '1000'),
('DTL-215yCBW0616', 'BRG-21OPYHpkB00524', '12500', 1, 12500, 'PJL-215HUbm0616', '2021-06-16', '500'),
('DTL-216d7HP0523', 'BRG-215IdCmSaL0319', '16000', 2, 16000, 'PJL-21pk48c0523', '2021-05-23', '800'),
('DTL-216wG1K0523', 'BRG-21h2tO4Rfw0522', '13000', 1, 13000, 'PJL-21Klg3Q0523', '2021-03-10', '250'),
('DTL-216ZoSk0523', 'BRG-21KTyoVLlB0522', '3000', 10, 30000, 'PJL-21IfBOq0523', '2021-03-28', '50'),
('DTL-217TylY0617', 'BRG-212nC6WEuX0524', '60000', 1, 60000, 'PJL-218bvXA0617', '2021-06-17', '2000'),
('DTL-218qCkm0616', 'BRG-21OPYHpkB00524', '12500', 1, 12500, 'PJL-217CabR0616', '2021-06-16', '500'),
('DTL-219Ayav0522', 'BRG-21Zdu8JyxD0522', '40000', 1, 40000, 'PJL-21bX7Rl0522', '2021-05-22', '500'),
('DTL-219oHvT0603', 'BRG-21alx2VcYq0303', '22500', 2, 45000, 'PJL-21gqXEh0603', '2021-06-03', '100'),
('DTL-21b7iCR0523', 'BRG-21alx2VcYq0303', '22500', 1, 22500, 'PJL-21Klg3Q0523', '2021-03-10', '100'),
('DTL-21BaYcN0616', 'BRG-21ME1GgI650319', '23000', 1, 23000, 'PJL-215HUbm0616', '2021-06-16', '1000'),
('DTL-21bOxE10616', 'BRG-21PK4aw6HG0303', '11000', 1, 11000, 'PJL-217CabR0616', '2021-06-16', '1000'),
('DTL-21c7yek0530', 'BRG-211qVsaRIv0524', '21000', 1, 21000, 'PJL-21zXDhG0530', '2021-05-30', '1000'),
('DTL-21ctvSK0616', 'BRG-21vXAi0E680616', '55000', 1, 55000, 'PJL-213IJlL0616', '2021-06-16', '200'),
('DTL-21EBKx20616', 'BRG-21X9prx3hT0616', '45000', 1, 45000, 'PJL-21UtWJy0616', '2021-06-16', '800'),
('DTL-21EJYon0616', 'BRG-218RivpCIQ0616', '45000', 1, 45000, 'PJL-21sALJ90523', '2021-06-16', '500'),
('DTL-21FSBtZ0618', 'BRG-21Zdu8JyxD0522', '40000', 1, 40000, 'PJL-21sq4Ok0527', '2021-06-18', '500'),
('DTL-21GNQ810530', 'BRG-21Zdu8JyxD0522', '40000', 1, 40000, 'PJL-21zXDhG0530', '2021-05-30', '500'),
('DTL-21h8Ekl0616', 'BRG-21AahTzxCr0303', '25000', 5, 125000, 'PJL-213oN0y0616', '2021-06-16', '100'),
('DTL-21hO24o0523', 'BRG-21OKUAn1H90521', '12000', 1, 12000, 'PJL-21Dltj50523', '2021-03-29', '1000'),
('DTL-21i5OW00523', 'BRG-21AlVOfcdv0522', '39000', 3, 39000, 'PJL-21pk48c0523', '2021-05-23', '500'),
('DTL-21ihqOf0523', 'BRG-21Zdu8JyxD0522', '40000', 1, 40000, 'PJL-21ygjAM0523', '2021-05-23', '500'),
('DTL-21jCVk50519', 'BRG-21ME1GgI650319', '23000', 1, 23000, 'PJL-21X5Rno0519', '2021-04-04', '1000'),
('DTL-21KhyST0523', 'BRG-21ME1GgI650319', '23000', 1, 23000, 'PJL-21IfBOq0523', '2021-03-28', '1000'),
('DTL-21KNP4Y0617', 'BRG-21alx2VcYq0303', '22500', 5, 112500, 'PJL-21CQvLE0603', '2021-06-17', '100'),
('DTL-21L07yH0523', 'BRG-215IdCmSaL0319', '16000', 1, 16000, 'PJL-21quxwL0523', '2021-05-23', '800'),
('DTL-21loqye0616', 'BRG-21Zdu8JyxD0522', '40000', 1, 40000, 'PJL-217CabR0616', '2021-06-16', '500'),
('DTL-21lXIGU0523', 'BRG-215IdCmSaL0319', '16000', 3, 48000, 'PJL-21IfBOq0523', '2021-03-28', '800'),
('DTL-21mcGPq0524', 'BRG-216CxGYwSq0524', '120000', 1, 120000, 'PJL-21aTf3L0523', '2021-05-24', '10000'),
('DTL-21Mo94L0616', 'BRG-211qVsaRIv0524', '21000', 1, 21000, 'PJL-213IJlL0616', '2021-06-16', '1000'),
('DTL-21N18aK0518', 'BRG-21PK4aw6HG0303', '11000', 1, 11000, 'PJL-21ilzSD0518', '2021-05-18', '1000'),
('DTL-21N7CX90519', 'BRG-21ME1GgI650319', '23000', 1, 23000, 'PJL-21oDV4N0519', '2021-05-19', '1000'),
('DTL-21nDkKh0616', 'BRG-21MuVyxaoe0616', '10000', 2, 20000, 'PJL-21UtWJy0616', '2021-06-16', '250'),
('DTL-21nDp8H0616', 'BRG-21HPEW7CpX0524', '50000', 1, 50000, 'PJL-21Bv1uE0616', '2021-06-16', '100'),
('DTL-21NLRC50616', 'BRG-215IdCmSaL0319', '16000', 1, 16000, 'PJL-21xwDFI0616', '2021-06-16', '800'),
('DTL-21NnEAx0617', 'BRG-211qVsaRIv0524', '21000', 1, 21000, 'PJL-218bvXA0617', '2021-06-17', '1000'),
('DTL-21ob9Kk0617', 'BRG-21FMxYK3sq0320', '10000', 2, 20000, 'PJL-218bvXA0617', '2021-06-17', '1000'),
('DTL-21P8CY70616', 'BRG-21FMxYK3sq0320', '10000', 1, 10000, 'PJL-21Bv1uE0616', '2021-06-16', '1000'),
('DTL-21Pgdoa0616', 'BRG-218MoKJsq60616', '16000', 1, 16000, 'PJL-21UtWJy0616', '2021-06-16', '500'),
('DTL-21Q9Ow10523', 'BRG-21KTyoVLlB0522', '3000', 10, 30000, 'PJL-21quxwL0523', '2021-05-23', '50'),
('DTL-21rdI7S0616', 'BRG-21PK4aw6HG0303', '11000', 1, 11000, 'PJL-21y9nkx0616', '2021-06-16', '1000'),
('DTL-21Rp4MN0523', 'BRG-215IdCmSaL0319', '16000', 1, 16000, 'PJL-21Klg3Q0523', '2021-03-10', '800'),
('DTL-21Rw4Vi0616', 'BRG-21Q4zfB7NK0319', '5000', 1, 5000, 'PJL-21y9nkx0616', '2021-06-16', '100'),
('DTL-21Sip7w0518', 'BRG-21AahTzxCr0303', '25000', 1, 25000, 'PJL-21uHRG10518', '2021-05-18', '100'),
('DTL-21t5V2N0616', 'BRG-21d9tGz4sq0524', '18000', 1, 18000, 'PJL-213IJlL0616', '2021-06-16', '2000'),
('DTL-21TiO6w0519', 'BRG-21PK4aw6HG0303', '11000', 1, 11000, 'PJL-21X5Rno0519', '2021-04-04', '1000'),
('DTL-21toxHP0523', 'BRG-21OKUAn1H90521', '12000', 2, 24000, 'PJL-21loDr70523', '2021-02-01', '1000'),
('DTL-21uGw4O0616', 'BRG-210qVRYm8v0524', '35000', 1, 35000, 'PJL-21Bv1uE0616', '2021-06-16', '100'),
('DTL-21UQ7EH0523', 'BRG-21lwpJ2zdI0521', '10000', 2, 20000, 'PJL-21loDr70523', '2021-02-01', '1000'),
('DTL-21VhQsW0617', 'BRG-210qVRYm8v0524', '35000', 4, 140000, 'PJL-21CQvLE0603', '2021-06-17', '100'),
('DTL-21VuCvU0523', 'BRG-21PK4aw6HG0303', '11000', 1, 11000, 'PJL-21quxwL0523', '2021-05-23', '1000'),
('DTL-21wxhdm0523', 'BRG-21Zdu8JyxD0522', '40000', 1, 40000, 'PJL-21loDr70523', '2021-02-01', '500'),
('DTL-21XnGEu0523', 'BRG-215IdCmSaL0319', '16000', 1, 16000, 'PJL-210ZL5C0523', '2021-03-17', '800'),
('DTL-21xOekP0616', 'BRG-21AlVOfcdv0522', '39000', 5, 195000, 'PJL-21kt3yG0616', '2021-06-16', '500'),
('DTL-21xY8gW0616', 'BRG-218QAkJavX0524', '7000', 4, 28000, 'PJL-21xwDFI0616', '2021-06-16', '100'),
('DTL-21YyBAZ0523', 'BRG-21AlVOfcdv0522', '39000', 1, 39000, 'PJL-21loDr70523', '2021-02-01', '500'),
('DTL-21zNrtO0523', 'BRG-21KTyoVLlB0522', '3000', 1, 3000, 'PJL-21Klg3Q0523', '2021-03-10', '50');

--
-- Trigger `tb_detail_penjualan`
--
DELIMITER $$
CREATE TRIGGER `stock_retrun` BEFORE UPDATE ON `tb_detail_penjualan` FOR EACH ROW BEGIN
UPDATE tb_barang SET tb_barang.stock_brg = tb_barang.stock_brg + old.jumlah
WHERE tb_barang.id_barang = old.id_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stock_retrun_de` AFTER DELETE ON `tb_detail_penjualan` FOR EACH ROW BEGIN
UPDATE tb_barang SET tb_barang.stock_brg = tb_barang.stock_brg + old.jumlah
WHERE tb_barang.id_barang = old.id_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stok_min` AFTER UPDATE ON `tb_detail_penjualan` FOR EACH ROW BEGIN
UPDATE tb_barang SET tb_barang.stock_brg =  tb_barang.stock_brg - new.jumlah
WHERE tb_barang.id_barang = new.id_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stok_min_1` AFTER INSERT ON `tb_detail_penjualan` FOR EACH ROW BEGIN
UPDATE tb_barang SET tb_barang.stock_brg =  tb_barang.stock_brg - new.jumlah
WHERE tb_barang.id_barang = new.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gambar`
--

CREATE TABLE `tb_gambar` (
  `id_gambar` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `id_barang` varchar(25) DEFAULT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_gambar`
--

INSERT INTO `tb_gambar` (`id_gambar`, `gambar`, `id_barang`, `nama`) VALUES
(69, 'item-211903-fbe584b7c1.jpg', 'BRG-21Q4zfB7NK0319', 'Feng Li'),
(70, 'item-211903-ddf52692db.jpg', 'BRG-21Q4zfB7NK0319', 'Feng Li'),
(71, 'item-211903-54dbb046fa.jpg', 'BRG-21ME1GgI650319', 'Bolt'),
(72, 'item-211903-52eb852322.jpg', 'BRG-215IdCmSaL0319', 'Cat Choize'),
(73, 'item-211903-aeddadc1ec.jpg', 'BRG-215IdCmSaL0319', 'Cat Choize'),
(74, 'item-212003-8c63ca5494.jpg', 'BRG-21AahTzxCr0303', 'Vitacik'),
(75, 'item-212003-07f1a66986.jpg', 'BRG-21PK4aw6HG0303', 'Hi Por Vit'),
(76, 'item-212003-ae1cf81fb5.jpg', 'BRG-21alx2VcYq0303', 'Matador Super'),
(80, 'item-212105-ccadb1c301.png', 'BRG-21OKUAn1H90521', 'Ultra Mineral'),
(81, 'item-212105-a830b8d149.png', 'BRG-21lwpJ2zdI0521', 'Mineral Kambing Eka-Farm'),
(82, 'item-212105-bf92a7ea13.png', 'BRG-21B2whVvMD0521', 'Gayemi Ruminal Stimulant 25 gr'),
(83, 'item-212205-c2a9a1b1d7.png', 'BRG-21h2tO4Rfw0522', 'Tetrakrol'),
(84, 'item-212205-a0493ad944.png', 'BRG-21KTyoVLlB0522', 'Cacing Exitor'),
(85, 'item-212205-8ec3a4768e.png', 'BRG-21Zdu8JyxD0522', 'Sidabas 500 EC isi 400 ml Insektisida'),
(86, 'item-212205-25ce4a9740.png', 'BRG-21Zdu8JyxD0522', 'Sidabas 500 EC isi 400 ml Insektisida'),
(87, 'item-212205-ac4ccd725b.png', 'BRG-21AlVOfcdv0522', 'Insektisida BASSA 500 EC 400ML'),
(88, 'item-212405-6536ad4712.png', 'BRG-21d9tGz4sq0524', 'Tetes Tebu'),
(89, 'item-212405-6dfdaab456.png', 'BRG-214XBhARon0524', 'Pakan Ayam Raksasa KYOJIN Kemasan 1 Kg'),
(90, 'item-212405-ddd2f3c7e7.png', 'BRG-21HPEW7CpX0524', 'Obat Pertanian Koge 50gr/obat anti busuk pada cabe'),
(91, 'item-212405-13c4ee5721.png', 'BRG-21HPEW7CpX0524', 'Obat Pertanian Koge 50gr/obat anti busuk pada cabe'),
(92, 'item-212405-540799e548.png', 'BRG-212nC6WEuX0524', 'Desthin obat hama tanaman ulat, kutu putih, jamur, hama daun'),
(93, 'item-212405-a655cf3970.png', 'BRG-212nC6WEuX0524', 'Desthin obat hama tanaman ulat, kutu putih, jamur, hama daun'),
(94, 'item-212405-31a9b05881.png', 'BRG-21OPYHpkB00524', 'Pakan Kucing Felibite Ikan dan Donat 500 gr'),
(95, 'item-212405-86072a6106.png', 'BRG-218QAkJavX0524', 'WHISKAS 85gr JUNIOR MACKEREL'),
(96, 'item-212405-d2ec559fc1.png', 'BRG-218QAkJavX0524', 'WHISKAS 85gr JUNIOR MACKEREL'),
(97, 'item-212405-741d46c35f.png', 'BRG-211qVsaRIv0524', 'Susu Hewan Ternak Premium MAXINOS 1Kg Pengganti Sapi Kerbau Kuda Kambing'),
(98, 'item-211606-f21c1cfb7d.png', 'BRG-218RivpCIQ0616', 'INSEKTISIDA YASITHRIN 400 ML'),
(99, 'item-211606-ef8af96a4b.png', 'BRG-21MuVyxaoe0616', 'Tempat Pakan Ayam'),
(100, 'item-211606-c9f14e347a.png', 'BRG-21X9prx3hT0616', 'Tas Ayam'),
(101, 'item-211606-d5a6cf268d.png', 'BRG-21X9prx3hT0616', 'Tas Ayam'),
(102, 'item-211606-1ac97f09cf.png', 'BRG-21vXAi0E680616', 'Jamu Pawang Jago');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jasa`
--

CREATE TABLE `tb_jasa` (
  `id_jasa` varchar(25) NOT NULL,
  `id_penjualan` varchar(25) DEFAULT NULL,
  `nama_penerima` varchar(225) NOT NULL,
  `nama_penrima_belakang` varchar(225) NOT NULL,
  `provinsi` varchar(60) DEFAULT NULL,
  `kabupaten` varchar(60) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `pengiriman` enum('dikirim','selesai','diproses','') NOT NULL,
  `expedisi` varchar(60) DEFAULT NULL,
  `estimasi` varchar(50) DEFAULT NULL,
  `ongkir` varchar(50) DEFAULT NULL,
  `paket` varchar(50) DEFAULT NULL,
  `berat` int(11) NOT NULL,
  `no_resi` varchar(50) DEFAULT NULL,
  `tgl_create` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jasa`
--

INSERT INTO `tb_jasa` (`id_jasa`, `id_penjualan`, `nama_penerima`, `nama_penrima_belakang`, `provinsi`, `kabupaten`, `alamat`, `pengiriman`, `expedisi`, `estimasi`, `ongkir`, `paket`, `berat`, `no_resi`, `tgl_create`) VALUES
('JAS-211WGqL0523', 'PJL-210ZL5C0523', 'Verry', 'Styawan', 'DI Yogyakarta', 'Kulon Progo', 'Sederhana Auto, Jalan wates Purworjo Km 6 Depan Jembatan Timbang Wates', 'dikirim', 'jne', '1-1 Hari', '7000', 'YES', 800, 'JP4037006074', '2021-05-23'),
('JAS-212nUyu0523', 'PJL-21ygjAM0523', 'Abdul', 'Qodar Aris Fauzi', 'DI Yogyakarta', 'Kulon Progo', 'Siluwok Lor 48/24, Tawangsari, Pengasih', 'dikirim', 'pos', '2 HARI Hari', '7000', 'Paket Kilat Khusus', 500, 'IDS005476527830', '2021-05-23'),
('JAS-2132UNl0616', 'PJL-21Bv1uE0616', 'Jefri', 'Tonny Efendi', 'DI Yogyakarta', 'Sleman', 'Jl. Ngapak - Kentheng No.Km. 5, Area Sawah, Banyuraden, Kec. Gamping', 'dikirim', 'pos', '3 HARI Hari', '7000', 'Paket Kilat Khusus', 1200, NULL, '2021-06-16'),
('JAS-214ntPd0523', 'PJL-21sALJ90523', 'tri', 'Yono', 'Jawa Tengah', 'Cilacap', 'Jeruk Legi 09/08', 'dikirim', 'pos', '2 HARI Hari', '10000', 'Paket Kilat Khusus', 700, NULL, '2021-06-16'),
('JAS-214Y2Ti0603', 'PJL-21gqXEh0603', 'Winarjoyono', '', 'DI Yogyakarta', 'Kulon Progo', 'Sederhana Auto, Jalan wates Purworjo Km 6 Depan Jembatan Timbang Wates', 'dikirim', 'jne', '1-1 Hari', '7000', 'YES', 200, NULL, '2021-06-03'),
('JAS-215KsCL0616', 'PJL-215HUbm0616', 'Alwy', 'Muhammad Syafi\'i', 'DI Yogyakarta', 'Sleman', 'Jl. Ngapak - Kentheng No.Km. 5, Area Sawah, Banyuraden, Kec. Gamping,', 'dikirim', 'jne', '3-4 Hari', '6000', 'OKE', 1500, 'JP1878253360', '2021-06-16'),
('JAS-216E2Od0616', 'PJL-21kt3yG0616', 'Sasa', 'Marwanti', 'Jawa Tengah', 'Purworejo', 'Dusun I, Dadirejo, Kec. Bagelen', 'dikirim', 'pos', '2 HARI Hari', '25500', 'Paket Kilat Khusus', 2500, 'IDS007027111785', '2021-06-16'),
('JAS-217mTQB0616', 'PJL-21xwDFI0616', 'Alwy', 'Muhammad Syafi\'i', 'DI Yogyakarta', 'Sleman', 'Jl. Ngapak - Kentheng No.Km. 5, Area Sawah, Banyuraden, Kec. Gamping,', 'dikirim', 'pos', '3 HARI Hari', '7000', 'Paket Kilat Khusus', 1200, NULL, '2021-06-16'),
('JAS-21Bvura0616', 'PJL-217CabR0616', 'condro', '', 'DI Yogyakarta', 'Sleman', 'sleman', 'dikirim', 'jne', '1-2 Hari', '10000', 'REG', 2000, 'JP9967123576', '2021-06-16'),
('JAS-21BzaPf0527', 'PJL-21sq4Ok0527', '', '', NULL, NULL, NULL, 'dikirim', NULL, NULL, NULL, NULL, 0, NULL, '2021-05-27'),
('JAS-21c5oEG0518', 'PJL-21ilzSD0518', 'Abdul', 'Qodar Aris Fauzi', 'DI Yogyakarta', 'Kulon Progo', 'Siluwok Lor 48/24, Tawangsari, Pengasih', 'dikirim', 'jne', '1-1 Hari', '7000', 'YES', 1000, NULL, '2021-05-18'),
('JAS-21c9r060530', 'PJL-21zXDhG0530', 'Winarjoyono', '', 'DI Yogyakarta', 'Kulon Progo', 'Sederhana Auto, Jalan wates Purworjo Km 6 Depan Jembatan Timbang Wates', 'dikirim', 'jne', '1-1 Hari', '14000', 'YES', 1500, 'JP3337423432', '2021-05-30'),
('JAS-21cFH3n0523', 'PJL-21Klg3Q0523', 'tri', 'Yono', 'Jawa Tengah', 'Cilacap', 'Jeruk Legi 09/08', 'dikirim', 'pos', '1 HARI Hari', '48000', 'Express Next Day Barang', 1700, 'ID2147856860054', '2021-05-23'),
('JAS-21CPHTK0523', 'PJL-21IfBOq0523', 'Winarjoyono', '', 'DI Yogyakarta', 'Yogyakarta', 'Sederhana Auto, Jalan wates Purworjo Km 6 Depan Jembatan Timbang Wates', 'dikirim', 'jne', '3-4 Hari', '12000', 'OKE', 3900, 'ID012995431533', '2021-05-23'),
('JAS-21DhEa30616', 'PJL-21UtWJy0616', 'condro', '', 'DI Yogyakarta', 'Sleman', 'Jl. MPR No.3, Dayakan, Sardonoharjo, Kec. Ngaglik,', 'dikirim', 'jne', '3-4 Hari', '6000', 'OKE', 1800, NULL, '2021-06-16'),
('JAS-21e3yRJ0523', 'PJL-21quxwL0523', 'Gris ', 'Hartanto', 'DI Yogyakarta', 'Kulon Progo', 'Siluwok Lor 48/24, Tawangsari, Pengasih', 'dikirim', 'jne', '1-1 Hari', '14000', 'YES', 2300, NULL, '2021-05-23'),
('JAS-21i1CF60518', 'PJL-21uHRG10518', 'Abdul', 'Qodar Aris Fauzi', 'DI Yogyakarta', 'Kulon Progo', 'Siluwok Lor 48/24, Tawangsari, Pengasih', 'dikirim', 'jne', '1-2 Hari', '7000', 'CTC', 100, '141370004988820', '2021-05-18'),
('JAS-21JexGg0523', 'PJL-21QyPic0523', 'Ryon', 'Arif Rochman', 'DI Yogyakarta', 'Kulon Progo', 'Ryon Motor, Kedundang, Kedundang, Temon', 'dikirim', 'jne', '1-1 Hari', '21000', 'YES', 2500, '002527167521', '2021-05-23'),
('JAS-21jW1JX0523', 'PJL-21aTf3L0523', 'Abdul', 'Qodar Aris Fauzi', 'DI Yogyakarta', 'Kulon Progo', 'Siluwok Lor 48/24, Tawangsari, Pengasih', 'dikirim', 'pos', '2 HARI Hari', '84000', 'Paket Kilat Khusus', 12000, 'IDS005476527831', '2021-05-24'),
('JAS-21k3CIY0523', 'PJL-21pk48c0523', 'tri', 'Yono', 'Jawa Tengah', 'Cilacap', 'Jeruk Legi 09/08', 'dikirim', 'jne', '4-5 Hari', '27000', 'OKE', 3100, 'JP3337423434', '2021-05-23'),
('JAS-21k7omG0617', 'PJL-218bvXA0617', 'Winarjoyono', '', 'DI Yogyakarta', 'Kulon Progo', 'Sederhana Auto, Jalan wates Purworjo Km 6 Depan Jembatan Timbang Wates', 'dikirim', 'jne', '1-1 Hari', '35000', 'YES', 5000, NULL, '2021-06-17'),
('JAS-21LhNZT0603', 'PJL-21CQvLE0603', 'Winarjoyono', '', 'DI Yogyakarta', 'Kulon Progo', 'Sederhana Auto, Jalan wates Purworjo Km 6 Depan Jembatan Timbang Wates', 'dikirim', 'jne', '1-1 Hari', '7000', 'YES', 900, NULL, '2021-06-17'),
('JAS-21mNQFg0519', 'PJL-21X5Rno0519', 'Abdul', 'Qodar Aris Fauzi', 'DI Yogyakarta', 'Kulon Progo', 'Siluwok Lor 48/24, Tawangsari, Pengasih', 'dikirim', 'jne', '1-1 Hari', '14000', 'YES', 2000, 'JP4066261216', '2021-05-19'),
('JAS-21nAZsE0523', 'PJL-21Dltj50523', 'Abdul', 'Qodar Aris Fauzi', 'DI Yogyakarta', 'Kulon Progo', 'Siluwok Lor 48/24, Tawangsari, Pengasih', 'dikirim', 'jne', '1-1 Hari', '7000', 'YES', 1000, '959776456199', '2021-05-23'),
('JAS-21PR6OB0616', 'PJL-21J7PR00616', 'Sasa', 'Marwanti', 'Jawa Tengah', 'Purworejo', 'Dusun I, Dadirejo, Kec. Bagelen', 'dikirim', 'jne', '6-7 Hari', '24000', 'OKE', 1600, NULL, '2021-06-16'),
('JAS-21Qnldw0616', 'PJL-213oN0y0616', 'tri', 'Yono', 'Jawa Tengah', 'Cilacap', 'Jeruk Legi 09/08', 'dikirim', 'jne', '4-5 Hari', '9000', 'OKE', 500, NULL, '2021-06-16'),
('JAS-21qSbFo0616', 'PJL-21y9nkx0616', 'condro', 'silva', 'DI Yogyakarta', 'Sleman', 'sleman cangkringan rt 29 rw  46', 'dikirim', 'jne', '1-2 Hari', '5000', 'REG', 1100, NULL, '2021-06-16'),
('JAS-21SC1RO0522', 'PJL-21bX7Rl0522', 'Abdul', 'Qodar Aris Fauzi', 'DI Yogyakarta', 'Kulon Progo', 'Siluwok Lor 48/24, Tawangsari, Pengasih', 'dikirim', 'jne', '1-1 Hari', '7000', 'YES', 600, 'JP2919213006', '2021-05-22'),
('JAS-21tpbk70523', 'PJL-21loDr70523', 'Gris ', 'Hartanto', 'DI Yogyakarta', 'Kulon Progo', 'Siluwok Lor 48/24, Tawangsari, Pengasih', 'dikirim', 'jne', '1-1 Hari', '35000', 'YES', 5000, 'JP4849211015', '2021-05-23'),
('JAS-21UsTPC0519', 'PJL-21oDV4N0519', 'Abdul', 'Qodar Aris Fauzi', 'DI Yogyakarta', 'Kulon Progo', 'Siluwok Lor 48/24, Tawangsari, Pengasih', 'dikirim', 'jne', '1-1 Hari', '7000', 'YES', 1000, NULL, '2021-05-19'),
('JAS-21ZvtdS0616', 'PJL-213IJlL0616', 'Jefri', 'Tonny Efendi', 'DI Yogyakarta', 'Yogyakarta', 'Jl. Ngapak - Kentheng No.Km. 5, Area Sawah, Banyuraden, Kec. Gamping', 'dikirim', 'jne', '3-4 Hari', '9000', 'OKE', 3200, NULL, '2021-06-16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_ktg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_ktg`) VALUES
(42, 'Pakan Ayam'),
(43, 'Pakan Udang'),
(44, 'Vitamin Ayam'),
(45, 'Pakan Kucing'),
(46, 'Obat Tani'),
(48, 'Vitamin Sapi & Kambing'),
(49, 'Peralatan Ternak'),
(50, 'Pakan Ikan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_konfigurasi`
--

CREATE TABLE `tb_konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `nama_toko` varchar(100) NOT NULL,
  `alamat_toko` varchar(225) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `slider1` varchar(30) NOT NULL,
  `detail1` text DEFAULT NULL,
  `slider2` varchar(30) DEFAULT NULL,
  `detail2` text DEFAULT NULL,
  `slider3` varchar(30) DEFAULT NULL,
  `detail3` text DEFAULT NULL,
  `iconh1` varchar(50) NOT NULL,
  `iconh2` varchar(50) NOT NULL,
  `beranda1` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_konfigurasi`
--

INSERT INTO `tb_konfigurasi` (`id_konfigurasi`, `nama_toko`, `alamat_toko`, `provinsi`, `kabupaten`, `slider1`, `detail1`, `slider2`, `detail2`, `slider3`, `detail3`, `iconh1`, `iconh2`, `beranda1`) VALUES
(1, 'Samudra PS II', 'Sindutan A, Sindutan, Kec. Temon, Kabupaten Kulon Progo, Daerah Istimewa Yogyakarta ', '5', '210', 'item-212705-8e5270d7e6.png', '<h1><span xss=\"removed\"><u>Samudra PS 2</u></span></h1><h2><span xss=\"removed\">Toko Pakan & Obat-Obatan Ternak</span></h2><h2><span xss=\"removed\">Alamat : Sindutan A, Sindutan, Kec. Temon, Kab. Kulon Progo, Yogyakarta</span></h2><h2><span xss=\"removed\"><br></span></h2>      ', 'item-212705-aabde934ae.jpg', '<h1 xss=\"removed\"><span xss=\"removed\"><u>Samudra PS 2</u></span></h1><h2 xss=\"removed\"><span xss=\"removed\">Toko Pakan & Obat-Obatan Ternak</span></h2><h2 xss=\"removed\">Buka Pada Hari Senin-Sabtu (09:00 - 16:00) </h2><h2 xss=\"removed\"> </h2>  ', 'item-212705-2986a4ae52.jpg', '<h1 xss=\"removed\"><span xss=\"removed\"><u>Samudra PS 2</u></span></h1><h1><span xss=\"removed\">Toko Pakan & Obat-Obatan Ternak</span></h1><h2 xss=\"removed\"><span xss=\"removed\"><br></span></h2><h4><span xss=\"removed\">Kami menjual berbagai macam Pakan Dan Obat Ternak </span>Seperti pakan ikan pakan ayam obat-obatan baik untuk vitamin ternak maupaun obat pertanian. </h4><h6><b><br></b></h6>         ', 'item-212705-1cc56b9861.png', 'item-211004-bcfccf13f3.png', '<div xss=removed><span xss=removed>Samudra PS II berlokasi Sindutan A, Sindutan, Kec.Temon, Kab.Kulon Progo, Daerah Istimewa Yogyakarta</span><span xss=removed>. Kami adalah sebuah toko yang menjual berbagai macam <b><u>Pakan dan Obat-obatan Ternak.</u></b> seperti pakan ikan pakan ayam obat-obatan vaksin serta  peralatan kandang hewan ternak. Kami selalu menjunjung tinggi mutu dan kualitas serta pelayanan optimal kepada pelanggan.</span></div><div xss=removed><br xss=removed></div>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telpon` varchar(100) NOT NULL,
  `jk` enum('L','P','','') DEFAULT NULL,
  `nama_belakang` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `aktivasi` enum('0','1','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `password`, `nama`, `email`, `alamat`, `no_telpon`, `jk`, `nama_belakang`, `provinsi`, `kabupaten`, `tgl_lahir`, `aktivasi`) VALUES
('PLG21amMdRFrX0304', '77963b7a931377ad4ab5ad6a9cd718aa', 'Yudi', 'furqonfauzi28@gmail.com', 'Siluwok Lor 47/24, Tawangsari, Pengasih', '082223330110', 'L', 'Kristanto', 'DI Yogyakarta', 'Kulon Progo', '1998-04-13', '1'),
('PLG21kEFpDHYS0616', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'Sasa', 'sasamarwanti@gmail.com', 'Dusun I, Dadirejo, Kec. Bagelen', '087662453678', 'P', 'Marwanti', 'Jawa Tengah', 'Purworejo', '1995-03-21', '1'),
('PLG21n7WDKbxy0617', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', '!!!!!!!', 'parjiman2001@gmail.com', '', '', NULL, '', '', '', '0000-00-00', '1'),
('PLG21oZYhmCRX0616', 'e10adc3949ba59abbe56e057f20f883e', 'condro', 'daiconlapas@gmail.com', 'sleman', '089888756435', 'L', '', 'DI Yogyakarta', 'Sleman', '1999-06-10', '1'),
('PLG21qgpXvyjM0616', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'Jefri', 'jejeptoni@gmail.com', 'Jl. Ngapak - Kentheng No.Km. 5, Area Sawah, Banyuraden, Kec. Gamping', '081223567876', 'L', 'Tonny Efendi', 'DI Yogyakarta', 'Sleman', '1998-08-12', '1'),
('PLG21u5hkN8tr0523', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'Winarjoyono', 'winarjiono95@gmail.com', 'Sederhana Auto, Jalan wates Purworjo Km 6 Depan Jembatan Timbang Wates', '08241044104', 'L', '', 'DI Yogyakarta', 'Kulon Progo', '1995-07-09', '1'),
('PLG21V0wGFpfT0523', '47bce5c74f589f4867dbd57e9ca9f808', 'Gris ', 'grisshartanto@gmail.com', 'Siluwok Lor 48/24, Tawangsari, Pengasih', '085667545349', 'L', 'Hartanto', 'DI Yogyakarta', 'Kulon Progo', '2000-01-17', '1'),
('PLG21WyxPsSIF0523', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'tri', 'tyono4824@gmail.com', 'Jeruk Legi 09/08', '082223443589', 'L', 'Yono', 'Jawa Tengah', 'Cilacap', '1997-11-01', '1'),
('PLG21xb8guE3a0616', 'e10adc3949ba59abbe56e057f20f883e', 'Alwy', 'j4kir1999@gmail.com', 'Jl. Ngapak - Kentheng No.Km. 5, Area Sawah, Banyuraden, Kec. Gamping,', '081332677054', 'L', 'Muhammad Syafi\'i', 'DI Yogyakarta', 'Sleman', '1997-08-01', '1'),
('PLGyCzNBbMJ030321', '47bce5c74f589f4867dbd57e9ca9f808', 'Abdul', 'pukon@gmail.com', 'Siluwok Lor 48/24, Tawangsari, Pengasih', '089776456199', 'L', 'Qodar Aris Fauzi', 'DI Yogyakarta', 'Kulon Progo', '1997-08-08', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id_penjualan` varchar(25) NOT NULL,
  `no_transaksi` varchar(100) NOT NULL,
  `tgl_beli` varchar(25) DEFAULT NULL,
  `status_transaksi` enum('menunggu','chekout','diproses','diterima') NOT NULL,
  `id_pelanggan` varchar(25) DEFAULT NULL,
  `sub_total` varchar(100) DEFAULT NULL,
  `status_pembayaran` varchar(60) DEFAULT NULL,
  `pembayaran` varchar(20) NOT NULL,
  `metode_bayar` text DEFAULT NULL,
  `kode_bayar` varchar(60) NOT NULL,
  `panduan` text NOT NULL,
  `tgl_terima` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`id_penjualan`, `no_transaksi`, `tgl_beli`, `status_transaksi`, `id_pelanggan`, `sub_total`, `status_pembayaran`, `pembayaran`, `metode_bayar`, `kode_bayar`, `panduan`, `tgl_terima`) VALUES
('PJL-210ZL5C0523', 'SMDRA-21725130480523', '2021-05-23 08:05:40', 'diterima', 'PLG21u5hkN8tr0523', '23000', 'settlement', 'bca', 'bank_transfer', '17479396531', 'https://app.sandbox.midtrans.com/snap/v1/transactions/41c81faa-0de0-464b-bbb5-878624b23b57/pdf', '2021-03-17'),
('PJL-213IJlL0616', 'SMDRA-21768203190616', '2021-06-16 21:01:42', 'diproses', 'PLG21qgpXvyjM0616', '103000', 'settlement', 'bri', 'bank_transfer', '174797879840561412', 'https://app.sandbox.midtrans.com/snap/v1/transactions/86ea2506-1119-4da0-a2dc-64ace40351ed/pdf', NULL),
('PJL-213oN0y0616', 'SMDRA-21569123480616', '2021-06-16 20:40:37', 'diproses', 'PLG21WyxPsSIF0523', '134000', 'settlement', 'bri', 'bank_transfer', '174799092509502426', 'https://app.sandbox.midtrans.com/snap/v1/transactions/b9b99203-a64d-4aa1-95fd-458d0c60a989/pdf', NULL),
('PJL-215HUbm0616', 'SMDRA-21608714520616', '2021-06-16 20:43:36', 'diproses', 'PLG21xb8guE3a0616', '41500', 'settlement', 'indomaret', 'cstore', '631332677054', 'https://app.sandbox.midtrans.com/snap/v1/transactions/d0269aae-064b-4dfd-8399-d6f94724a6d9/pdf', NULL),
('PJL-217CabR0616', 'SMDRA-21740529610616', '2021-06-16 11:14:26', 'diterima', 'PLG21oZYhmCRX0616', '73500', 'settlement', 'bca', 'bank_transfer', '17479685295', 'https://app.sandbox.midtrans.com/snap/v1/transactions/09526d1f-b345-4cfa-9e3a-06769dcb51b2/pdf', '2021-06-16'),
('PJL-218bvXA0617', 'SMDRA-21790523410617', '2021-06-17 10:37:40', 'diproses', 'PLG21u5hkN8tr0523', '136000', 'settlement', 'bca', 'bank_transfer', '17479364979', 'https://app.sandbox.midtrans.com/snap/v1/transactions/82e23752-96e5-4466-a9bc-170ff1a3e278/pdf', NULL),
('PJL-21aTf3L0523', 'SMDRA-21170952340523', '2021-05-24 08:51:45', 'diterima', 'PLGyCzNBbMJ030321', '250000', 'settlement', 'indomaret', 'cstore', '919776456199', 'https://app.sandbox.midtrans.com/snap/v1/transactions/44ec0b4d-44ba-4148-b4bb-97f9980cf821/pdf', '2021-05-24'),
('PJL-21Bv1uE0616', 'SMDRA-21049658230616', '2021-06-16 21:09:34', 'diproses', 'PLG21qgpXvyjM0616', '102000', 'expire', 'bri', 'bank_transfer', '174799040781539473', 'https://app.sandbox.midtrans.com/snap/v1/transactions/b0787d77-ac23-4424-9d42-c2c62c86bfff/pdf', NULL),
('PJL-21bX7Rl0522', 'SMDRA-21608512390522', '2021-05-22 11:23:31', 'diterima', 'PLGyCzNBbMJ030321', '52000', 'settlement', 'bni', 'bank_transfer', '9881747966910494', 'https://app.sandbox.midtrans.com/snap/v1/transactions/3bfd2132-4a4d-484d-bbe7-e578d7e719fd/pdf', '2021-02-01'),
('PJL-21CQvLE0603', 'SMDRA-21914078560603', '2021-06-17 06:23:45', 'diproses', 'PLG21u5hkN8tr0523', '259500', 'settlement', 'bni', 'bank_transfer', '9881747920997542', 'https://app.sandbox.midtrans.com/snap/v1/transactions/98e54a71-0a6d-4292-8c01-88c7b072be92/pdf', NULL),
('PJL-21Dltj50523', 'SMDRA-21627498130523', '2021-05-23 06:02:44', 'diterima', 'PLGyCzNBbMJ030321', '19000', 'settlement', 'indomaret', 'cstore', '959776456199', 'https://app.sandbox.midtrans.com/snap/v1/transactions/13c10f7f-4697-464f-b6e2-1e7f90061f8f/pdf', '2021-03-29'),
('PJL-21gqXEh0603', 'SMDRA-21487362190603', '2021-06-03 09:17:54', 'diproses', 'PLG21u5hkN8tr0523', '52000', 'expire', 'indomaret', 'cstore', '948241044104', 'https://app.sandbox.midtrans.com/snap/v1/transactions/4a34789f-2ee7-499a-b555-b0435b167829/pdf', NULL),
('PJL-21IfBOq0523', 'SMDRA-21294518600523', '2021-05-23 07:59:20', 'diterima', 'PLG21u5hkN8tr0523', '113000', 'settlement', 'indomaret', 'cstore', '978241044104', 'https://app.sandbox.midtrans.com/snap/v1/transactions/78f9cd14-b977-4c93-a885-4518974f88ff/pdf', '2021-03-28'),
('PJL-21ilzSD0518', 'SMDRA-21697541030518', '2021-05-18 06:26:38', 'diproses', 'PLGyCzNBbMJ030321', '18000', 'expire', 'indomaret', 'cstore', '679776456199', 'https://app.sandbox.midtrans.com/snap/v1/transactions/6c29a8d7-16ec-47b7-8537-2d724e5c90ed/pdf', NULL),
('PJL-21J7PR00616', 'SMDRA-21519637480616', '2021-06-16 21:18:11', 'diproses', 'PLG21kEFpDHYS0616', '114000', 'expire', 'bni', 'bank_transfer', '9881747944707043', 'https://app.sandbox.midtrans.com/snap/v1/transactions/c8ed05f6-9c68-489f-ab61-9d492c248fbb/pdf', NULL),
('PJL-21Klg3Q0523', 'SMDRA-21956184230523', '2021-05-23 13:15:29', 'diterima', 'PLG21WyxPsSIF0523', '142500', 'settlement', 'bca', 'bank_transfer', '17479878736', 'https://app.sandbox.midtrans.com/snap/v1/transactions/2adab8a1-d04b-4aec-a559-a3b1ba284b89/pdf', '2021-03-10'),
('PJL-21kt3yG0616', 'SMDRA-21469802150616', '2021-06-16 21:14:34', 'diterima', 'PLG21kEFpDHYS0616', '220500', 'settlement', 'bca', 'bank_transfer', '17479485315', 'https://app.sandbox.midtrans.com/snap/v1/transactions/53b07c7e-ebcb-42ed-a3f3-df1ad7fb331f/pdf', '2021-06-16'),
('PJL-21loDr70523', 'SMDRA-21291043560523', '2021-05-23 12:54:42', 'diterima', 'PLG21V0wGFpfT0523', '158000', 'settlement', 'bri', 'bank_transfer', '174799971834709646', 'https://app.sandbox.midtrans.com/snap/v1/transactions/e800dbfc-3d44-4fc1-835d-2af8ae01f6d2/pdf', '2021-04-18'),
('PJL-21oDV4N0519', 'SMDRA-21974280630519', '2021-05-19 13:46:05', 'diproses', 'PLGyCzNBbMJ030321', '30000', 'expire', 'bni', 'bank_transfer', '9881747903399601', 'https://app.sandbox.midtrans.com/snap/v1/transactions/8cd9d542-ca95-4df0-9558-10c3fa951f32/pdf', NULL),
('PJL-21pk48c0523', 'SMDRA-21173542090523', '2021-05-23 13:30:04', 'diterima', 'PLG21WyxPsSIF0523', '82000', 'settlement', 'indomaret', 'cstore', '212223443589', 'https://app.sandbox.midtrans.com/snap/v1/transactions/7a8e1db4-3ed7-436f-9ca7-6471a83c37aa/pdf', '2021-05-23'),
('PJL-21quxwL0523', 'SMDRA-21407365820523', '2021-05-23 13:01:36', 'diproses', 'PLG21V0wGFpfT0523', '71000', 'expire', 'bri', 'bank_transfer', '174794178834439316', 'https://app.sandbox.midtrans.com/snap/v1/transactions/10fbc5a2-39be-45d2-b162-530610c0697a/pdf', NULL),
('PJL-21QyPic0523', 'SMDRA-21287950310523', '2021-05-23 08:24:51', 'diterima', 'PLG21u5hkN8tr0523', '71000', 'settlement', 'indomaret', 'cstore', '981554786556', 'https://app.sandbox.midtrans.com/snap/v1/transactions/ef787074-b27f-4afa-9d65-91360fa52239/pdf', '2021-04-13'),
('PJL-21sALJ90523', 'SMDRA-21437918560523', '2021-06-16 20:39:38', 'diproses', 'PLG21WyxPsSIF0523', '110000', 'expire', 'bni', 'bank_transfer', '9881747913716250', 'https://app.sandbox.midtrans.com/snap/v1/transactions/ee3e9862-9107-472e-8ef8-0188dd108a15/pdf', NULL),
('PJL-21sq4Ok0527', 'SMDRA-21501834760527', '2021-05-27', 'menunggu', 'PLGyCzNBbMJ030321', NULL, NULL, '', NULL, '', '', NULL),
('PJL-21uHRG10518', 'SMDRA-21427531980518', '2021-05-18 06:28:47', 'diterima', 'PLGyCzNBbMJ030321', '32000', 'settlement', 'indomaret', 'cstore', '699776456199', 'https://app.sandbox.midtrans.com/snap/v1/transactions/cc9cc35f-2de8-485b-9f46-5f811f5db895/pdf', '2021-05-23'),
('PJL-21UtWJy0616', 'SMDRA-21170693450616', '2021-06-16 20:53:47', 'diproses', 'PLG21oZYhmCRX0616', '87000', 'expire', 'indomaret', 'cstore', '649888756435', 'https://app.sandbox.midtrans.com/snap/v1/transactions/7be6958a-a6f2-49d7-bb61-86915b528112/pdf', NULL),
('PJL-21X5Rno0519', 'SMDRA-21532710480519', '2021-05-19 13:42:55', 'diterima', 'PLGyCzNBbMJ030321', '48000', 'settlement', 'indomaret', 'cstore', '839776456199', 'https://app.sandbox.midtrans.com/snap/v1/transactions/0ddd1dab-3f05-4f6c-9a31-2289f253b5b3/pdf', '2021-04-04'),
('PJL-21xwDFI0616', 'SMDRA-21069524310616', '2021-06-16 20:45:15', 'diproses', 'PLG21xb8guE3a0616', '51000', 'expire', 'bri', 'bank_transfer', '174799972293922814', 'https://app.sandbox.midtrans.com/snap/v1/transactions/e32c03fa-8475-4070-9bbb-e45940a59342/pdf', NULL),
('PJL-21y9nkx0616', 'SMDRA-21304271850616', '2021-06-16 11:11:26', 'diproses', 'PLG21oZYhmCRX0616', '21000', 'deny', 'indomaret', 'cstore', '719888756435', 'https://app.sandbox.midtrans.com/snap/v1/transactions/a5859c8c-2544-4795-898c-7001038ebb98/pdf', NULL),
('PJL-21ygjAM0523', 'SMDRA-21374169850523', '2021-05-23 05:51:42', 'diterima', 'PLGyCzNBbMJ030321', '47000', 'settlement', 'bri', 'bank_transfer', '174798679263152134', 'https://app.sandbox.midtrans.com/snap/v1/transactions/99776e80-87f7-48dc-a224-bcd611ff2ca5/pdf', '2021-05-23'),
('PJL-21zXDhG0530', 'SMDRA-21492376050530', '2021-05-30 06:23:30', 'diterima', 'PLG21u5hkN8tr0523', '75000', 'settlement', 'bri', 'bank_transfer', '174799887215375161', 'https://app.sandbox.midtrans.com/snap/v1/transactions/55fe0fc6-a641-4e2a-bb95-0088db6e0792/pdf', '2021-06-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_token`
--

CREATE TABLE `tb_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_token`
--

INSERT INTO `tb_token` (`id`, `email`, `token`, `date`) VALUES
(1, 'widiyasulastri@gmail.com', 'i2/EYm56WB12TcpL+iBq/zKd1wRxpOLeL9LNJeZOVrg=', 1617602010),
(2, 'codotwakwa18@gmail.com', 'bh+tmFngaMyaRGoXAJHMuyenbCbFAKMYcUzo2LNt/ag=', 1617602498),
(3, 'pukon@gmail.com', 'fnvzl6yKF5r5bGnP6KMTBoLUYkpdCa6thzhRnx4ThhM=', 1620265801),
(4, 'pukon@gmail.com', 'eg65H4fob8DGqQ8Q+G+CE6sKdumHtX2Z8ibRM5Vzxng=', 1620266020),
(5, 'pukon@gmail.com', 'mYgW7CYtdOyIBPY3+Yi3tgxg5Gwmh5kNgrp/uhpx3jo=', 1620266058),
(6, 'furqonfauzi28@gmail.com', 'TPORfxi3VnhiNuUdN6KDLmQlBjfwYIpLPiC51vIn1W0=', 1620266129),
(7, 'j4kir1999@gmail.com', 'UUXfviDzh897UX0djDRn+sp88oG4RQY5cnbJJt3zo4o=', 1620699949),
(8, 'j4kir1999@gmail.com', '+9ak7WTWXeLEavcp6PVkEh3Gd2KJWWRpmdb0yW+j5as=', 1620700245),
(9, 'j4kir1999@gmail.com', 'NS8VqtClb6AVDKrFFjljyd/yfdSPoMHE/us5jZzUUV8=', 1620700254),
(10, 'j4kir1999@gmail.com', 'At8K5eBF/1ziB7B6vuKnloh3zLo5o20yRmj6WTfZE2k=', 1620700365),
(11, 'winarjiono95@gmail.com', 'ObqboRGfDI8JNzGGuO0cbSNTBezpMtYHOotSsCdK164=', 1621731088),
(12, 'grisshartanto@gmail.com', 'A8uwBteaNtC0lrWIV48S/bR8LmbBQiaGEWxQ+cULd+w=', 1621749060),
(13, 'tyono4824@gmail.com', 'OYiGx0IicN87CyttDLRanHyXSUjnZeULYMKJVZrvXkw=', 1621750269),
(14, 'tyono4824@gmail.com', 'Eq5pA62fZiXJ8nNUAnSMPENejZmRpIEPBGnqgJp3g28=', 1621750390),
(15, 'samudraps2002@gmail.com', 'eift9uJAdfvvxfZIbaYeGFaZsq6gHHVt+aiQFA56jdE=', 1622190874),
(16, 'samudraps2002@gmail.com', 'rOo1EaXOUgtw1jvXNMpb6TIv0Ld3mDdrhCbj0eVOD3s=', 1622190985),
(17, 'pranomojoko7@gmail.com', 'e3z3MEqdRknPwqAF60wKvtQe9LBuk46e/6lQoAKZ6Zs=', 1622191098),
(18, 'daiconlapas@gmail.com', 'hs0HivcmnOVqe6E/S+S+dLUUdLf/F1oJYIEsbgDeGVY=', 1623816331),
(19, 'j4kir1999@gmail.com', 'C3ddeZJmqatF6h/mR7LFmWtYdDxFopKrUeKuuOUQohM=', 1623818364),
(20, 'jejeptoni@gmail.com', 'OBQFZqjB2aDcTE+u0WXcSloIwepMHVDi+T/bXiGJJ7Y=', 1623851852),
(21, 'sasamarwanti@gmail.com', 'eat13TLk1YvUnG7lRjzXtEvRyAOtJcWPRNhbqZsqnVs=', 1623852654),
(22, 'parjiman2001@gmail.com', '0Qg5qUDrtDwqGsnAOjmzajoFzxutUMDTK862mgApAIE=', 1623900782),
(23, 'furqonfauzi28@gmail.com', 'ZIhlTIFg6dcrXaIHhRutUFXuscIN232196kyLI0Zqzk=', 1629857906),
(24, 'furqonfauzi28@gmail.com', 'NRqwYmkVX8840HdM+Mqb97nc0UC2qWZxf9Fds6AGgdM=', 1631480191);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username_user` varchar(100) NOT NULL,
  `password_user` varchar(100) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `aktiv` int(1) NOT NULL COMMENT '1:aktiv, 2:nonaktiv,',
  `gambar_user` varchar(100) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `alamat_user` text NOT NULL,
  `no_telp_user` varchar(100) NOT NULL,
  `gender_user` enum('L','P','') NOT NULL,
  `otp` varchar(5) NOT NULL,
  `waktu` time DEFAULT NULL,
  `level` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username_user`, `password_user`, `nama_user`, `aktiv`, `gambar_user`, `email_user`, `alamat_user`, `no_telp_user`, `gender_user`, `otp`, `waktu`, `level`) VALUES
(8, 'simbah123', '89fa38ebc5257fa08ce7acd2f881f9d4', 'Muhammad Furqon Fajar Fauzi', 1, 'item-213105-896201da93.jpg', 'furqonfauzi28@gmail.com', 'Siluwok Lor, Tawangsari, Pengasih, Kulon Progo, Yogyakarta', '089776556445', 'L', '67128', '09:19:19', 0),
(9, 'samudraps2', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'Surajiyo', 1, 'item-213105-c14bb40987.png', 'pranomojoko7@gmail.com', 'Sindutan A, Sindutan, Temon, Kulon Progo, DIY', '081393474459', 'L', '01476', '09:13:26', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `kategori_brg` (`kategori_brg`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_detail_penjualan`
--
ALTER TABLE `tb_detail_penjualan`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_penjualan` (`id_penjualan`);

--
-- Indeks untuk tabel `tb_gambar`
--
ALTER TABLE `tb_gambar`
  ADD PRIMARY KEY (`id_gambar`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `tb_jasa`
--
ALTER TABLE `tb_jasa`
  ADD PRIMARY KEY (`id_jasa`),
  ADD KEY `id_penjualan` (`id_penjualan`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_konfigurasi`
--
ALTER TABLE `tb_konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indeks untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `tb_token`
--
ALTER TABLE `tb_token`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_gambar`
--
ALTER TABLE `tb_gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `tb_konfigurasi`
--
ALTER TABLE `tb_konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_token`
--
ALTER TABLE `tb_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD CONSTRAINT `tb_barang_ibfk_1` FOREIGN KEY (`kategori_brg`) REFERENCES `tb_kategori` (`id_kategori`),
  ADD CONSTRAINT `tb_barang_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `tb_detail_penjualan`
--
ALTER TABLE `tb_detail_penjualan`
  ADD CONSTRAINT `tb_detail_penjualan_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`),
  ADD CONSTRAINT `tb_detail_penjualan_ibfk_3` FOREIGN KEY (`id_penjualan`) REFERENCES `tb_penjualan` (`id_penjualan`);

--
-- Ketidakleluasaan untuk tabel `tb_gambar`
--
ALTER TABLE `tb_gambar`
  ADD CONSTRAINT `tb_gambar_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `tb_jasa`
--
ALTER TABLE `tb_jasa`
  ADD CONSTRAINT `tb_jasa_ibfk_1` FOREIGN KEY (`id_penjualan`) REFERENCES `tb_penjualan` (`id_penjualan`);

--
-- Ketidakleluasaan untuk tabel `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD CONSTRAINT `tb_penjualan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pelanggan` (`id_pelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
