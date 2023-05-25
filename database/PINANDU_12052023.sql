-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Bulan Mei 2023 pada 05.43
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pinandu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(10) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `level` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `level`) VALUES
('oye       ', 'mimin', '$2y$10$/TgfHJZM4VKTeUEBnHAMm.zECRqNsCMV1Oq0926zKHgtb8otA0T.i', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bagian`
--

CREATE TABLE `bagian` (
  `id_bagian` char(8) NOT NULL,
  `nama_bagian` char(50) NOT NULL,
  `id_pokja` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bagian`
--

INSERT INTO `bagian` (`id_bagian`, `nama_bagian`, `id_pokja`) VALUES
('43ter4tc', 'Kelembagaan', '198808042015041001'),
('5ydretwe', 'Hukum, Kepegawaian, dan Tata Laksana', '196608081992032002'),
('6ujrtfh5', 'Perencanaan dan Anggaran', '196608081992032002'),
('jytui654', 'Akademik dan Kemahasiswaan', '198404102010121005'),
('lowsr3Z4', 'Tata Usaha', '196608081992032002'),
('tjh5978u', 'Sumber Daya', '197301181992032001'),
('yfu758e5', 'Sistem Informasi dan Kerjasama', '197106191993031001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_sp`
--

CREATE TABLE `detail_sp` (
  `id_detail_sp` char(100) NOT NULL,
  `id_sp` char(100) NOT NULL,
  `id_syarat` char(100) NOT NULL,
  `status_detail_sp` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_sp`
--

INSERT INTO `detail_sp` (`id_detail_sp`, `id_sp`, `id_syarat`, `status_detail_sp`) VALUES
('0f1ac724-ed50-11ed-aff9-c454445434d3', '0d00bb8d-cc6b-11ed-ae35-6c3c8c5f1f57', '03cffe18-ab72-11ed-9937-c454445434d3', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen`
--

CREATE TABLE `dokumen` (
  `id_dokumen` char(100) NOT NULL,
  `id_layanan` char(100) NOT NULL,
  `id_status_sokumen` char(100) NOT NULL,
  `komentar` char(200) NOT NULL,
  `id_syarat` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` char(100) NOT NULL,
  `no_tiket` char(100) NOT NULL,
  `id_sp` char(100) NOT NULL,
  `id_status_layanan` char(100) NOT NULL,
  `id_pegawai` char(100) NOT NULL,
  `kode_pt` int(11) NOT NULL,
  `nama_pengusul` char(200) NOT NULL,
  `no_hp` char(13) NOT NULL,
  `email` char(100) NOT NULL,
  `pekerjaan` char(100) NOT NULL,
  `asal_institusi` char(100) NOT NULL,
  `alamat` char(200) NOT NULL,
  `ket` char(200) NOT NULL,
  `catatan` char(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `no_tiket`, `id_sp`, `id_status_layanan`, `id_pegawai`, `kode_pt`, `nama_pengusul`, `no_hp`, `email`, `pekerjaan`, `asal_institusi`, `alamat`, `ket`, `catatan`) VALUES
('f00b09de-f05d-11ed-b672-c454445434d3', 'TK-120523084256', '7e53537a-cc6b-11ed-ae35-6c3c8c5f1f57', '', '', 0, 'Syarif Firdaus', '082157876927', 'syrif.firdaus@gmail.com', 'pns', 'lldikti', 'aaa', 'aa', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `id_bagian_pegawai` char(100) NOT NULL,
  `nip` char(18) DEFAULT NULL,
  `nama_pegawai` varchar(50) DEFAULT NULL,
  `gelar_depan` varchar(50) DEFAULT NULL,
  `gelar_belakang` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `id_pangkat` int(11) DEFAULT NULL,
  `tmt_cpns` date DEFAULT NULL,
  `masa_kerja_tahun` tinyint(4) DEFAULT NULL,
  `masa_kerja_bulan` tinyint(4) DEFAULT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `aktif` enum('Y','T') DEFAULT 'Y',
  `ganti_password` enum('Y','T') DEFAULT 'Y',
  `foto` varchar(50) DEFAULT 'no-profile.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `id_bagian_pegawai`, `nip`, `nama_pegawai`, `gelar_depan`, `gelar_belakang`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `id_jabatan`, `id_pangkat`, `tmt_cpns`, `masa_kerja_tahun`, `masa_kerja_bulan`, `no_hp`, `password`, `aktif`, `ganti_password`, `foto`) VALUES
(1, '', '196707021994031004', 'Muhammad Akbar', 'Dr. Drs.', 'M.Si.', NULL, NULL, NULL, 1, 3, NULL, NULL, NULL, NULL, '6a4e914f67b3c5017ab72d721cebc5a4', 'Y', 'Y', 'no-profile.png'),
(2, 'lowsr3Z4', '196608081992032002', 'Rinawati Agustini', NULL, 'SH., MH.', NULL, NULL, NULL, 2, 4, NULL, NULL, NULL, NULL, 'adbbc644d96f999b0d7c84301c876e37', 'Y', 'Y', 'no-profile.png'),
(3, '', '197104141992031003', 'Surya Apriadi', NULL, 'SE.', NULL, NULL, NULL, 3, 6, NULL, NULL, NULL, NULL, 'c3cd56f38e6ba1e061c1ba4052a35fbd', 'Y', 'Y', 'no-profile.png'),
(4, '', '196411071986021005', 'Maswiansyah', NULL, 'S.Sos.', NULL, NULL, NULL, 4, 6, NULL, NULL, NULL, NULL, '4046fb7a3ed6cb6b452aceee55e3f7bf', 'Y', 'Y', 'no-profile.png'),
(5, '', '197002021993031001', 'Nazib', NULL, 'S.Sos.', NULL, NULL, NULL, 5, 6, NULL, NULL, NULL, NULL, '2e7ac90b7216a31faa6a256121cc2b71', 'Y', 'Y', 'no-profile.png'),
(6, 'tjh5978u', '197301181992032001', 'Ida Adhiyati', NULL, 'SE.', NULL, NULL, NULL, 6, 6, NULL, NULL, NULL, NULL, 'a3031b2f71de5fd921841b704699eec6', 'Y', 'Y', 'no-profile.png'),
(7, '6ujrtfh5', '198902012010121005', 'Muhammad Muslim Asyari', NULL, 'S.Kom.', NULL, NULL, NULL, 7, 6, NULL, NULL, NULL, NULL, 'ebecf84da2476c360d4394abe4dbf6d5', 'Y', 'Y', 'no-profile.png'),
(8, 'yfu758e5', '197106191993031001', 'Farid', NULL, 'SE.', NULL, NULL, NULL, 8, 6, NULL, NULL, NULL, NULL, '44ccb55fcc3ad386b7e614651222dcaa', 'Y', 'Y', 'no-profile.png'),
(9, 'yfu758e5', '197101161992032001', 'Iriani Mayasari', NULL, 'SE., MM.', NULL, NULL, NULL, 9, 5, NULL, NULL, NULL, NULL, '696a1f5747c240f24c9444c7a8911dba', 'Y', 'Y', 'no-profile.png'),
(10, '43ter4tc', '196901121993031003', 'Junaidi', NULL, 'SH.', NULL, NULL, NULL, 10, 6, NULL, NULL, NULL, NULL, 'a955bd290d68c9c0bac58371441e3894', 'Y', 'Y', 'no-profile.png'),
(11, '5ydretwe', '197203231992031002', 'Maksum', NULL, 'S.Sos.', NULL, NULL, NULL, 11, 6, NULL, NULL, NULL, NULL, 'cd0b47728f7ef5998298e8753fb501ce', 'Y', 'Y', 'no-profile.png'),
(12, '6ujrtfh5', '197810172008122001', 'Nur Fadilah', NULL, 'SE.', NULL, NULL, NULL, 12, 6, NULL, NULL, NULL, NULL, '6be4d3c12a556ec4e980a5181cde6c77', 'Y', 'Y', 'no-profile.png'),
(13, '6ujrtfh5', '198108102008122002', 'Lydia Mayasari', NULL, 'SE.', NULL, NULL, NULL, 12, 6, NULL, NULL, NULL, NULL, '8dc2e711e86691e129125a35057c0f18', 'Y', 'Y', 'no-profile.png'),
(14, 'tjh5978u', '198702032009122003', 'Rezky Hastuti', NULL, 'SE.', NULL, NULL, NULL, 13, 6, NULL, NULL, NULL, NULL, 'e2c96f41a9bf6fea96c2523cacf523e1', 'Y', 'Y', 'no-profile.png'),
(15, 'jytui654', '198404102010121005', 'Denny Lazuardy', NULL, 'SH.', NULL, NULL, NULL, 14, 7, NULL, NULL, NULL, NULL, '8719802ff86ac2fae09734ab1123e530', 'Y', 'Y', 'no-profile.png'),
(16, '5ydretwe', '198604192010121004', 'Muammar Khalid', NULL, 'SE.', NULL, NULL, NULL, 10, 7, NULL, NULL, NULL, NULL, 'e7bf8c7871e3c9e1072c3b0a65e2bcf1', 'Y', 'Y', 'no-profile.png'),
(17, 'tjh5978u', '198608212010122005', 'Enny Wijaya', NULL, 'S.Kom.', NULL, NULL, NULL, 13, 7, NULL, NULL, NULL, NULL, '4214522e06426fc46faf6034c31f7616', 'Y', 'Y', 'no-profile.png'),
(18, 'jytui654', '198706142010122007', 'Khairunnisa', NULL, 'S.Ikom.', NULL, NULL, NULL, 15, 7, NULL, NULL, NULL, NULL, '9922cf90d0f9874a59e036c006247b16', 'Y', 'Y', 'no-profile.png'),
(19, '5ydretwe', '198901032010121004', 'Angga Budikoesuma', NULL, 'SE., MM.', NULL, NULL, NULL, 11, 7, NULL, NULL, NULL, NULL, '6e2eb2e41b65791f0f007787f6e0ecef', 'Y', 'Y', 'no-profile.png'),
(20, '6ujrtfh5', '198901242010122004', 'Nina Mahdiana Noor', NULL, 'SE.', NULL, NULL, NULL, 12, 7, NULL, NULL, NULL, NULL, '1195234d7e43e3e6ec3c65a81dcc83dc', 'Y', 'Y', 'no-profile.png'),
(21, 'lowsr3Z4', '198506102010121005', 'Adiat Surya Ramadhani', NULL, 'S.Kom.', NULL, NULL, NULL, 16, 7, NULL, NULL, NULL, NULL, '15d7b6d635f9fa61666e893dfb951bb7', 'Y', 'Y', 'no-profile.png'),
(22, 'lowsr3Z4', '197808142001121002', 'Puadinoor', NULL, 'A.Md.', NULL, NULL, NULL, 17, 7, NULL, NULL, NULL, NULL, '3c311158275e308c993136f4236e4e38', 'Y', 'Y', 'no-profile.png'),
(23, '5ydretwe', '197411092005011003', 'Muhammad Roosdianto', NULL, 'SE.', NULL, NULL, NULL, 18, 8, NULL, NULL, NULL, NULL, '26d29239bef61a5a5fabe8055eb7f6ec', 'Y', 'Y', 'no-profile.png'),
(24, '5ydretwe', '198506172015041003', 'Mohammad Luddy Patra', NULL, 'S.H.', NULL, NULL, NULL, 19, 8, NULL, NULL, NULL, NULL, '4a5394e98c4fa609708e65333f745fa4', 'Y', 'Y', 'no-profile.png'),
(25, '43ter4tc', '198808042015041001', 'Fariduddin Al Ayuby', NULL, 'SH., MH.', NULL, NULL, NULL, 10, 8, NULL, NULL, NULL, NULL, '33cbf459c7758102de2eab1c20e0fa6d', 'Y', 'Y', 'no-profile.png'),
(26, '6ujrtfh5', '199104212015042002', 'Rizka Fitria', NULL, 'SE.', NULL, NULL, NULL, 20, 8, NULL, NULL, NULL, NULL, '99d01e7b8cc4a5a4f5f0a84ee298db19', 'Y', 'Y', 'no-profile.png'),
(27, 'jytui654', '199209242015042001', 'Hastin Rubiati Yasminda', NULL, 'S.Kom.', NULL, NULL, NULL, 21, 8, NULL, NULL, NULL, NULL, 'abacaf52118273f39ab574aa2f640888', 'Y', 'Y', 'no-profile.png'),
(28, 'tjh5978u', '198009212015042002', 'Hidayah Hijrah', NULL, 'S.E.', NULL, NULL, NULL, 22, 8, NULL, NULL, NULL, NULL, '087328e63f80a8895aceabbd69f96f98', 'Y', 'Y', 'no-profile.png'),
(29, '6ujrtfh5', '198204072015042002', 'Rezki Amelia Noor', NULL, 'S.E.', NULL, NULL, NULL, 23, 8, NULL, NULL, NULL, NULL, '2f8647f7f25d1831cd2b06a44c0bec19', 'Y', 'Y', 'no-profile.png'),
(30, 'jytui654', '198304282015041002', 'Gusti Hidayat Noor Gusda', NULL, 'S.T.', NULL, NULL, NULL, 24, 8, NULL, NULL, NULL, NULL, '6aa3cf16f9d7d70f54b5cd43fba21a55', 'Y', 'Y', 'no-profile.png'),
(31, 'lowsr3Z4', '199002152015041001', 'Muhammad Adie Karya', NULL, 'S.E.', NULL, NULL, NULL, 16, 8, NULL, NULL, NULL, NULL, '1666d30cb16dab82d27a71edb47a3a67', 'Y', 'Y', 'no-profile.png'),
(32, 'yfu758e5', '197909132009121004', 'Muhammad Iswahyudi', NULL, 'A.Md.Kom.', NULL, NULL, NULL, 25, 8, NULL, NULL, NULL, NULL, '79da7341cf264c8e2a25c5f4bba2ba7a', 'Y', 'Y', 'no-profile.png'),
(33, 'lowsr3Z4', '198605272009121005', 'Taufik Rachmadani', NULL, 'A.Md.', NULL, NULL, NULL, 16, 8, NULL, NULL, NULL, NULL, '7cda3bc5cf50e8b73f6d01ceeda2302c', 'Y', 'Y', 'no-profile.png'),
(34, 'lowsr3Z4', '198510152008121001', 'Gunawan Wicaksono', NULL, 'ST.', NULL, NULL, NULL, 26, 8, NULL, NULL, NULL, NULL, '650926033e58f5855311ce62d57d9329', 'Y', 'Y', 'pegawai-34-13122022151556.jpg'),
(35, 'lowsr3Z4', '199303292019031017', 'Angga Primajaya', NULL, 'SM.', NULL, NULL, NULL, 17, 9, NULL, NULL, NULL, NULL, 'c9948e22a8dc1d470630ecd310ee01ba', 'Y', 'Y', 'no-profile.png'),
(36, 'tjh5978u', '198001182005011005', 'Riza Rakhmadian', NULL, 'S.Sos.', NULL, NULL, NULL, 16, 8, NULL, NULL, NULL, NULL, '1dc7c5a08ef770de478bdfd466c7d050', 'Y', 'Y', 'no-profile.png'),
(37, 'tjh5978u', '198203032005012004', 'Noorhayati', NULL, 'SE., MM.', NULL, NULL, NULL, 16, 5, NULL, NULL, NULL, NULL, '3211dab0b1a407cdacfbed3fb9df378b', 'Y', 'Y', 'no-profile.png'),
(38, '5ydretwe', '197811282009012002', 'Ida Nurulita', NULL, 'S.Pi., MM.', NULL, NULL, NULL, 16, 6, NULL, NULL, NULL, NULL, '2175db6d5e7da7eda77530f3ef829ea6', 'Y', 'Y', 'no-profile.png'),
(39, 'yfu758e5', '199404302022032012', 'Anis Fairizza', NULL, 'S.Kom.', NULL, NULL, NULL, 8, 9, NULL, NULL, NULL, NULL, 'e04a96fbedfa03315ed9c821ec382d61', 'Y', 'Y', 'no-profile.png'),
(40, '43ter4tc', '199608152022032015', 'Nor Anisa', NULL, 'S.E.', NULL, NULL, NULL, 10, 9, NULL, NULL, NULL, NULL, '6b4ccd38a4e321624e373869cfa0d18f', 'Y', 'Y', 'no-profile.png'),
(41, 'tjh5978u', '198712292022031002', 'Setiawan', NULL, 'S.Pd.', NULL, NULL, NULL, 27, 9, NULL, NULL, NULL, NULL, 'a6e0889f2bd6fcaccbcfa9982d14dfe6', 'Y', 'Y', 'no-profile.png'),
(42, 'jytui654', '198902222022032004', 'Eka Ardiani', NULL, 'A.Md.', NULL, NULL, NULL, 28, 11, NULL, NULL, NULL, NULL, 'a7bb16ae925ae862568d65ecc66010a9', 'Y', 'Y', 'no-profile.png'),
(43, 'jytui654', '199404162022031012', 'Gusti Dicky Asparilla Ananto', NULL, 'A.Md.', NULL, NULL, NULL, 21, 11, NULL, NULL, NULL, NULL, '13c61776713c7122e3e5c6545e2865a8', 'Y', 'Y', 'no-profile.png'),
(44, 'lowsr3Z4', '199702032022032015', 'Leila Larasati', NULL, 'A.Md.', NULL, NULL, NULL, 29, 11, NULL, NULL, NULL, NULL, '0fc8663d90fa4045d14bbc517465624d', 'Y', 'Y', 'no-profile.png'),
(45, '5ydretwe', '199904172022031002', 'Muhammad Rizqon Kasiran Lillah', NULL, 'A.Md.Kom.', 'Banjarmasin', '1999-04-17', 'Banjarmasin', 16, 11, '2022-03-01', 3, 0, '085771825523', '827ccb0eea8a706c4c34a16891f84e7b', 'Y', 'T', 'pegawai-45-13122022144351.jpg'),
(46, 'yfu758e5', '199808262022031005', 'Syarif Firdaus', NULL, 'A.Md.Kom.', NULL, NULL, NULL, 9, 11, NULL, NULL, NULL, NULL, '536f7979293792c6f61d486eddee1fab', 'Y', 'Y', 'pegawai-46-15032023125404.jpg'),
(47, '6ujrtfh5', '199812152022031006', 'Rizky Sya\'Ban', NULL, 'A.Md.', NULL, NULL, NULL, 20, 11, NULL, NULL, NULL, NULL, 'd6493d1608f197170eebf3c99541397c', 'Y', 'Y', 'no-profile.png'),
(48, 'lowsr3Z4', '197204082007011003', 'Alfian', NULL, NULL, NULL, NULL, NULL, 30, 10, NULL, NULL, NULL, NULL, '818c1f7810d7193ff6e035cd02f8a5b9', 'Y', 'Y', 'no-profile.png'),
(49, 'lowsr3Z4', '197401112007011002', 'Abdul Halim', NULL, NULL, NULL, NULL, NULL, 31, 10, NULL, NULL, NULL, NULL, 'aa1373288cc26fd3caf85e24eb7958cd', 'Y', 'Y', 'no-profile.png'),
(50, 'lowsr3Z4', '196808282007011002', 'Supianur', NULL, NULL, NULL, NULL, NULL, 30, 10, NULL, NULL, NULL, NULL, '28a3e904b27d67101e63bfef98eaef42', 'Y', 'Y', 'no-profile.png'),
(51, 'lowsr3Z4', '197004032007011003', 'M.Juhdi', NULL, NULL, NULL, NULL, NULL, 32, 10, NULL, NULL, NULL, NULL, '53fde7063e573de6f0adc930135ff384', 'Y', 'Y', 'no-profile.png'),
(52, 'lowsr3Z4', '197408062007101001', 'Heriyadi', NULL, NULL, NULL, NULL, NULL, 30, 10, NULL, NULL, NULL, NULL, '3b5314b6b27ee2b8e1a7371d5cb76053', 'Y', 'Y', 'no-profile.png'),
(53, 'lowsr3Z4', '198408242009101002', 'M. Rizali Noor', NULL, NULL, NULL, NULL, NULL, 30, 10, NULL, NULL, NULL, NULL, '4548cb6c8d2bbd09d751afbabed5b510', 'Y', 'Y', 'no-profile.png'),
(54, 'lowsr3Z4', '197103242007011001', 'Nahyudin', NULL, NULL, NULL, NULL, NULL, 33, 10, NULL, NULL, NULL, NULL, 'a8d72ee4ae4e14ab730a6fccfcd1b361', 'Y', 'Y', 'no-profile.png'),
(55, 'lowsr3Z4', '196509122007011002', 'Rivani', NULL, NULL, NULL, NULL, NULL, 31, 12, NULL, NULL, NULL, NULL, '3d1923793e4495e558e20d4710a14977', 'Y', 'Y', 'no-profile.png'),
(56, 'lowsr3Z4', '197403172007011001', 'Muhammad Fathan', NULL, NULL, NULL, NULL, NULL, 30, 12, NULL, NULL, NULL, NULL, '1b683989d4dc4f301939111ddd106622', 'Y', 'Y', 'no-profile.png'),
(57, 'lowsr3Z4', '197710052008011001', 'Syar\'I Yadi', NULL, NULL, NULL, NULL, NULL, 31, 12, NULL, NULL, NULL, NULL, '5cacecb4ef95d652894ebcc44156d63d', 'Y', 'Y', 'no-profile.png'),
(58, 'lowsr3Z4', '197204032007011037', 'Muhdari', NULL, NULL, NULL, NULL, NULL, 31, 15, NULL, NULL, NULL, NULL, '26d252d3f45cc82a5f49cdded9a12976', 'Y', 'Y', 'no-profile.png'),
(59, '', NULL, 'Muhammad Farid', NULL, NULL, NULL, NULL, NULL, 30, 18, NULL, NULL, NULL, NULL, NULL, 'Y', 'Y', 'no-profile.png'),
(60, '', NULL, 'Syamsi', NULL, NULL, NULL, NULL, NULL, 30, 18, NULL, NULL, NULL, NULL, NULL, 'Y', 'Y', 'no-profile.png'),
(61, '', NULL, 'Fakhrul Razi', NULL, NULL, NULL, NULL, NULL, 30, 18, NULL, NULL, NULL, NULL, NULL, 'Y', 'Y', 'no-profile.png'),
(62, '', NULL, 'Holdani Ansari', NULL, NULL, NULL, NULL, NULL, 30, 18, NULL, NULL, NULL, NULL, NULL, 'Y', 'Y', 'no-profile.png'),
(63, '', NULL, 'Muhammad Abriansyah', NULL, NULL, NULL, NULL, NULL, 34, 18, NULL, NULL, NULL, NULL, NULL, 'T', 'T', 'no-profile.png'),
(64, '', NULL, 'Arkasi', NULL, NULL, NULL, NULL, NULL, 34, 18, NULL, NULL, NULL, NULL, NULL, 'Y', 'Y', 'no-profile.png'),
(65, '', NULL, 'Herman', NULL, NULL, NULL, NULL, NULL, 34, 18, NULL, NULL, NULL, NULL, NULL, 'Y', 'Y', 'no-profile.png'),
(66, '', NULL, 'Nur Hasanah', NULL, NULL, NULL, NULL, NULL, 31, 18, NULL, NULL, NULL, NULL, NULL, 'Y', 'Y', 'no-profile.png'),
(67, '', NULL, 'Noor Ifansyah', NULL, NULL, NULL, NULL, NULL, 34, 18, NULL, NULL, NULL, NULL, NULL, 'Y', 'Y', 'no-profile.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sp`
--

CREATE TABLE `sp` (
  `id_sp` char(100) NOT NULL,
  `nama_sp` char(240) NOT NULL,
  `produk` varchar(300) NOT NULL,
  `id_bagian` char(100) NOT NULL,
  `jangka_waktu` char(100) NOT NULL,
  `status_sp` enum('On','Off') NOT NULL,
  `jenis_layanan` enum('PTS','Umum') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sp`
--

INSERT INTO `sp` (`id_sp`, `nama_sp`, `produk`, `id_bagian`, `jangka_waktu`, `status_sp`, `jenis_layanan`) VALUES
('0d00bb8d-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN MUTASI DOSEN PEGAWAI NEGERI SIPIL DPK ANTAR LLDIKTI', '', '5ydretwe', '', 'Off', 'PTS'),
('1372a8fe-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN PENETAPAN PENSIUN BUP/JANDA/DUDA/ANAK', '', '5ydretwe', '', 'On', 'PTS'),
('24610002-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN CUTI MELAHIRKAN/BESAR/ALASAN PENTING PEGAWAI DOSEN PNS DPK', '', '5ydretwe', '', 'On', 'PTS'),
('2c57b074-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN PENGUSULAN KARPEG/KARIS/KARSU', '', '5ydretwe', '', 'On', 'PTS'),
('3298eca7-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN PEMBERIAN PENGHARGAAN/TANDA JASA SATYALANCANA KARYA SATYA PENDIDIK DAN TENAGA KEPENDIDIKAN', '', '5ydretwe', '', 'On', 'PTS'),
('3a3e4195-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN TUGAS  BELAJAR  PEGAWAI  NEGERI  SIPIL DIPEKERJAKAN', '', '5ydretwe', '', 'On', 'PTS'),
('45de8233-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN IZIN BELAJAR DOSEN PEGAWAI NEGERI SIPIL DIPEKERJAKAN (DPK) GOLONGAN III', '', '5ydretwe', '', 'On', 'PTS'),
('4c4106c3-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN IZIN BELAJAR DOSEN PEGAWAI NEGERI SIPIL DIPEKERJAKAN (DPK) GOLONGAN IV', '', '5ydretwe', '', 'On', 'PTS'),
('52c27698-cc6a-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN PEMBERIAN SURAT IZIN MELAMAR BEASISWA DALAM NEGERI DAN LUAR NEGERI BAGI DOSEN LLDIKTI WILAYAH XI', '', 'tjh5978u', '', 'On', 'PTS'),
('53dd89c2-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN REKOMENDASI TUGAS BELAJAR DOSEN TETAP YAYASAN', '', '5ydretwe', '', 'On', 'PTS'),
('5bf81c12-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN AKTIF  KEMBALI  DOSEN  SETELAH  TUGAS BELAJAR', '', '5ydretwe', '', 'On', 'PTS'),
('61c8628a-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN PINDAH HOMEBASE EKSTERNAL DOSEN TETAP', '', '5ydretwe', '', 'On', 'PTS'),
('6723cf8e-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN IJIN MENDUDUKI JABATAN DOSEN PNS DPK', '', '5ydretwe', '', 'On', 'PTS'),
('785ce61d-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN PENERBITAN SURAT KETERANGAN PENGHENTIAN PEMBAYARAN MUTASI', '', '6ujrtfh5', '', 'On', 'PTS'),
('7bab4bb4-cc6a-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN PEMBERIAN REKOMENDASI PERPANJANGAN BEASISWA LUAR NEGERI BAGI DOSEN LLLDIKTI WILAYAH XI', '', 'tjh5978u', '', 'On', 'PTS'),
('7e53537a-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN PERMINTAAN SLIP GAJI ATAU SURAT KETERANGAN PENGHASILAN', '', '6ujrtfh5', '', 'On', 'Umum'),
('83deda5b-cc6a-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN PEMBERIAN SURAT PERMOHONAN IZIN PERJALANAN DINAS LUAR NEGERI BAGI DOSEN LLDIKTI WILAYAH XI', '', 'tjh5978u', '', 'On', 'PTS'),
('840ae576-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN PERUBAHAN DATA KELUARGA PEGAWAI', '', '6ujrtfh5', '', 'On', 'Umum'),
('88cc9849-28cb-11ed-8b44-c454445434d3', 'STANDAR PELAYANAN PENETAPAN INPASSING PANGKAT DOSEN\r\nBUKAN PEGAWAI NEGERI SIPIL GOLONGAN III', '', '5ydretwe', '', 'On', 'PTS'),
('8dad2f8c-cc6a-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN SURAT KETERANGAN PERMOHONAN ASESOR', '', 'tjh5978u', '', 'On', 'PTS'),
('94b1a581-cc6a-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN USULAN JABATAN FUNGSIONAL ASISTEN AHLI DAN LEKTOR BAGI DOSEN LLDIKTI WILAYAH XI MELALUI APLIKASI SINGKRON 3', '', 'tjh5978u', '', 'On', 'PTS'),
('953e0abf-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN PENGELOLAAN PENYEWAAN GEDUNG SERBAGUNA', '', 'lowsr3Z4', '', 'On', 'Umum'),
('9b400dd5-cc6a-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN USULAN JABATAN FUNGSIONAL LEKTOR KEPALA DAN GURU BESAR BAGI DOSEN LLDIKTI WILAYAH XI MELALUI APLIKASI SINGKRON 3', '', 'tjh5978u', '', 'On', 'PTS'),
('9bc0d228-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN PENGADUAN PUBLIK', '', 'lowsr3Z4', '', 'On', 'Umum'),
('a1867d37-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN INFORMASI PUBLIK', '', 'lowsr3Z4', '', 'On', 'Umum'),
('a4e80889-cc6a-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN PEMBERIAN REKOMENDASI HIBAH SARANA DAN PRASARANA PERGURUAN TINGGI', '', 'tjh5978u', '', 'On', 'PTS'),
('ab800f92-c38a-11ed-886b-6c3c8c5f1f57', 'STANDAR PELAYANAN SURAT KLARIFIKASI IJAZAH DAN TRANSKRIP AKADEMIK', '', 'jytui654', '', 'On', 'Umum'),
('b03a0220-cc6a-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN REKOMENDASI PENDIRIAN PERGURUAN TINGGI SWASTA', '', '43ter4tc', '', 'On', 'PTS'),
('b15c5bd1-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN VERIFIKASI PROSES PERBAIKAN PELAPORAN PERIODE LAMPAU PERGURUAN TINGGI', '', 'yfu758e5', '', 'On', 'PTS'),
('b26e442f-c38a-11ed-886b-6c3c8c5f1f57', 'STANDAR PELAYANAN LEGALISIR FOTOKOPI IJAZAH DAN TRANSKRIP AKADEMIK BAGI PTS YANG TUTUP', '', 'jytui654', '', 'On', 'Umum'),
('b7218a04-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN VALIDASI IJAZAH DAN VALIDASI CALON PESERTA YUDISIUM', '', 'yfu758e5', '', 'On', 'PTS'),
('b8c27285-c38a-11ed-886b-6c3c8c5f1f57', 'STANDAR PELAYANAN SURAT KETERANGAN IJAZAH DAN TRANSKRIP AKADEMIK YANG HILANG ATAU RUSAK', '', 'jytui654', '', 'On', 'PTS'),
('b9faee04-cc6a-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN REKOMENDASI PERUBAHAN PERGURUAN TINGGI SWASTA', '', '43ter4tc', '', 'On', 'PTS'),
('bd054791-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN VERIFIKASI REGISTRASI PENDIDIK DAN PERUBAHAN DATA POKOK DOSEN PADA PANGKALAN DATA PENDIDIKAN TINGGI', '', 'yfu758e5', '', 'On', 'PTS'),
('c2e7c0ea-cc6a-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN REKOMENDASI PEMBUKAAN PROGRAM STUDI DI KAMPUS UTAMA PADA PERGURUAN TINGGI SWASTA', '', '43ter4tc', '', 'On', 'PTS'),
('c8f02a67-cc6a-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN REKOMENDASI PEMBUKAAN PROGRAM STUDI DI KAMPUS UTAMA PADA PERGURUAN TINGGI NEGERI (PTN)', '', '43ter4tc', '', 'On', 'PTS'),
('cf5062f8-cc6a-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN REKOMENDASI PEMBUKAAN PROGRAM STUDI DI LUAR KAMPUS UTAMA (PSDKU)', '', '43ter4tc', '', 'On', 'PTS'),
('d530b0f9-cc6a-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN REKOMENDASI PEMBUKAAN PROGRAM STUDI PENDIDIKAN JARAK JAUH (PJJ)', '', '43ter4tc', '', 'On', 'PTS'),
('dfb1032a-cc6a-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN REKOMENDASI PENYESUAIAN / PERUBAHAN NAMA BADAN PENYELENGGARA PERGURUAN TINGGI SWASTA (PTS)', '', '43ter4tc', '', 'On', 'PTS'),
('e1c99fad-28e3-11ed-8b44-c454445434d3', 'STANDAR PELAYANAN PENETAPAN INPASSING PANGKAT DOSEN\r\nBUKAN PEGAWAI NEGERI SIPIL GOLONGAN IV', '', '5ydretwe', '', 'On', 'PTS'),
('e74cb6ee-cc6a-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN REKOMENDASI PERUBAHAN NAMA PROGRAM STUDI', '', '43ter4tc', '', 'On', 'PTS'),
('eb2e9840-28e3-11ed-8b44-c454445434d3', 'STANDAR PELAYANAN KENAIKAN PANGKAT/GOLONGAN DOSEN\r\nPEGAWAI NEGERI SIPIL DIPEKERJAKAN (DPK)', '', '5ydretwe', '', 'On', 'PTS'),
('fee4680d-cc6a-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN ALIH TUGAS PEGAWAI NEGERI SIPIL NON DOSEN MENJADI PEGAWAI NEGERI SIPIL DOSEN', '', '5ydretwe', '', 'On', 'PTS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_dokumen`
--

CREATE TABLE `status_dokumen` (
  `id_status_dokumen` char(100) NOT NULL,
  `nama_status_dokumen` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_layanan`
--

CREATE TABLE `status_layanan` (
  `id_status_layanan` char(100) NOT NULL,
  `nama_status_layanan` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `syarat`
--

CREATE TABLE `syarat` (
  `id_syarat` char(100) NOT NULL,
  `nama_syarat` char(200) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `syarat`
--

INSERT INTO `syarat` (`id_syarat`, `nama_syarat`, `size`) VALUES
('03cffe18-ab72-11ed-9937-c454445434d3', 'ktp', 1),
('61c6ffbc-ed4f-11ed-be85-c454445434d3', 'surat pengantar', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indeks untuk tabel `detail_sp`
--
ALTER TABLE `detail_sp`
  ADD PRIMARY KEY (`id_detail_sp`);

--
-- Indeks untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indeks untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `sp`
--
ALTER TABLE `sp`
  ADD PRIMARY KEY (`id_sp`);

--
-- Indeks untuk tabel `status_dokumen`
--
ALTER TABLE `status_dokumen`
  ADD PRIMARY KEY (`id_status_dokumen`);

--
-- Indeks untuk tabel `status_layanan`
--
ALTER TABLE `status_layanan`
  ADD PRIMARY KEY (`id_status_layanan`);

--
-- Indeks untuk tabel `syarat`
--
ALTER TABLE `syarat`
  ADD PRIMARY KEY (`id_syarat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
