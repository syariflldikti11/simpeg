-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Bulan Mei 2023 pada 02.48
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
  `nama_bagian` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bagian`
--

INSERT INTO `bagian` (`id_bagian`, `nama_bagian`) VALUES
('43ter4tc', 'Kelembagaan'),
('5ydretwe', 'Hukum, Kepegawaian, dan Tata Laksana'),
('6ujrtfh5', 'Perencanaan dan Anggaran'),
('jytui654', 'Akademik dan Kemahasiswaan'),
('lowsr3Z4', 'Tata Usaha'),
('tjh5978u', 'Sumber Daya'),
('yfu758e5', 'Sistem Informasi dan Kerjasama');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_sp`
--

CREATE TABLE `detail_sp` (
  `id_detail_sp` char(100) NOT NULL,
  `id_sp` char(100) NOT NULL,
  `id_syarat` char(100) NOT NULL,
  `status_detail_sp` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `ket` char(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sp`
--

CREATE TABLE `sp` (
  `id_sp` char(100) NOT NULL,
  `nama_sp` char(240) NOT NULL,
  `produk` char(200) NOT NULL,
  `id_bagian` char(100) NOT NULL,
  `jangka_waktu` char(100) NOT NULL,
  `status_sp` enum('On','Off') NOT NULL,
  `jenis_layanan` enum('PTS','Umum') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sp`
--

INSERT INTO `sp` (`id_sp`, `nama_sp`, `produk`, `id_bagian`, `jangka_waktu`, `status_sp`, `jenis_layanan`) VALUES
('06d15ba4-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN MUTASI DOSEN PEGAWAI NEGERI SIPIL DIPEKERJAKAN (DPK) DI LLDIKTI WILAYAH XI', '', '5ydretwe', '', '', 'PTS'),
('0d00bb8d-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN MUTASI DOSEN PEGAWAI NEGERI SIPIL DPK ANTAR LLDIKTI', '', '5ydretwe', '', '', 'PTS'),
('1372a8fe-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN PENETAPAN PENSIUN BUP/JANDA/DUDA/ANAK', '', '5ydretwe', '', '', 'PTS'),
('24610002-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN CUTI MELAHIRKAN/BESAR/ALASAN PENTING PEGAWAI DOSEN PNS DPK', '', '5ydretwe', '', '', 'PTS'),
('2c57b074-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN PENGUSULAN KARPEG/KARIS/KARSU', '', '5ydretwe', '', '', 'PTS'),
('3298eca7-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN PEMBERIAN PENGHARGAAN/TANDA JASA SATYALANCANA KARYA SATYA PENDIDIK DAN TENAGA KEPENDIDIKAN', '', '5ydretwe', '', '', 'PTS'),
('3a3e4195-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN TUGAS  BELAJAR  PEGAWAI  NEGERI  SIPIL DIPEKERJAKAN', '', '5ydretwe', '', '', 'PTS'),
('45de8233-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN IZIN BELAJAR DOSEN PEGAWAI NEGERI SIPIL DIPEKERJAKAN (DPK) GOLONGAN III', '', '5ydretwe', '', '', 'PTS'),
('4c4106c3-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN IZIN BELAJAR DOSEN PEGAWAI NEGERI SIPIL DIPEKERJAKAN (DPK) GOLONGAN IV', '', '5ydretwe', '', '', 'PTS'),
('52c27698-cc6a-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN PEMBERIAN SURAT IZIN MELAMAR BEASISWA DALAM NEGERI DAN LUAR NEGERI BAGI DOSEN LLDIKTI WILAYAH XI', '', 'tjh5978u', '', '', 'PTS'),
('53dd89c2-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN REKOMENDASI TUGAS BELAJAR DOSEN TETAP YAYASAN', '', '5ydretwe', '', '', 'PTS'),
('5bf81c12-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN AKTIF  KEMBALI  DOSEN  SETELAH  TUGAS BELAJAR', '', '5ydretwe', '', '', 'PTS'),
('61c8628a-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN PINDAH HOMEBASE EKSTERNAL DOSEN TETAP', '', '5ydretwe', '', '', 'PTS'),
('6723cf8e-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN IJIN MENDUDUKI JABATAN DOSEN PNS DPK', '', '5ydretwe', '', '', 'PTS'),
('785ce61d-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN PENERBITAN SURAT KETERANGAN PENGHENTIAN PEMBAYARAN MUTASI', '', '6ujrtfh5', '', '', 'PTS'),
('7bab4bb4-cc6a-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN PEMBERIAN REKOMENDASI PERPANJANGAN BEASISWA LUAR NEGERI BAGI DOSEN LLLDIKTI WILAYAH XI', '', 'tjh5978u', '', '', 'PTS'),
('7e53537a-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN PERMINTAAN SLIP GAJI ATAU SURAT KETERANGAN PENGHASILAN', '', '6ujrtfh5', '', '', 'PTS'),
('83deda5b-cc6a-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN PEMBERIAN SURAT PERMOHONAN IZIN PERJALANAN DINAS LUAR NEGERI BAGI DOSEN LLDIKTI WILAYAH XI', '', 'tjh5978u', '', '', 'PTS'),
('840ae576-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN PERUBAHAN DATA KELUARGA PEGAWAI', '', '6ujrtfh5', '', '', 'PTS'),
('88cc9849-28cb-11ed-8b44-c454445434d3', 'STANDAR PELAYANAN PENETAPAN INPASSING PANGKAT DOSEN\r\nBUKAN PEGAWAI NEGERI SIPIL GOLONGAN III', '', '5ydretwe', '', '', 'PTS'),
('8dad2f8c-cc6a-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN SURAT KETERANGAN PERMOHONAN ASESOR', '', 'tjh5978u', '', '', 'PTS'),
('94b1a581-cc6a-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN USULAN JABATAN FUNGSIONAL ASISTEN AHLI DAN LEKTOR BAGI DOSEN LLDIKTI WILAYAH XI MELALUI APLIKASI SINGKRON 3', '', 'tjh5978u', '', '', 'PTS'),
('953e0abf-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN PENGELOLAAN PENYEWAAN GEDUNG SERBAGUNA', '', 'lowsr3Z4', '', '', 'PTS'),
('9b400dd5-cc6a-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN USULAN JABATAN FUNGSIONAL LEKTOR KEPALA DAN GURU BESAR BAGI DOSEN LLDIKTI WILAYAH XI MELALUI APLIKASI SINGKRON 3', '', 'tjh5978u', '', '', 'PTS'),
('9bc0d228-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN PENGADUAN PUBLIK', '', 'lowsr3Z4', '', '', 'PTS'),
('a1867d37-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN INFORMASI PUBLIK', '', 'lowsr3Z4', '', '', 'PTS'),
('a4e80889-cc6a-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN PEMBERIAN REKOMENDASI HIBAH SARANA DAN PRASARANA PERGURUAN TINGGI', '', 'tjh5978u', '', '', 'PTS'),
('ab800f92-c38a-11ed-886b-6c3c8c5f1f57', 'STANDAR PELAYANAN SURAT KLARIFIKASI IJAZAH DAN TRANSKRIP AKADEMIK', '', 'jytui654', '', '', 'PTS'),
('b03a0220-cc6a-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN REKOMENDASI PENDIRIAN PERGURUAN TINGGI SWASTA', '', '43ter4tc', '', '', 'PTS'),
('b15c5bd1-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN VERIFIKASI PROSES PERBAIKAN PELAPORAN PERIODE LAMPAU PERGURUAN TINGGI', '', 'yfu758e5', '', '', 'PTS'),
('b26e442f-c38a-11ed-886b-6c3c8c5f1f57', 'STANDAR PELAYANAN LEGALISIR FOTOKOPI IJAZAH DAN TRANSKRIP AKADEMIK BAGI PTS YANG TUTUP', '', 'jytui654', '', '', 'PTS'),
('b7218a04-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN VALIDASI IJAZAH DAN VALIDASI CALON PESERTA YUDISIUM', '', 'yfu758e5', '', '', 'PTS'),
('b8c27285-c38a-11ed-886b-6c3c8c5f1f57', 'STANDAR PELAYANAN SURAT KETERANGAN IJAZAH DAN TRANSKRIP AKADEMIK YANG HILANG ATAU RUSAK', '', 'jytui654', '', '', 'PTS'),
('b9faee04-cc6a-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN REKOMENDASI PERUBAHAN PERGURUAN TINGGI SWASTA', '', '43ter4tc', '', '', 'PTS'),
('bd054791-cc6b-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN VERIFIKASI REGISTRASI PENDIDIK DAN PERUBAHAN DATA POKOK DOSEN PADA PANGKALAN DATA PENDIDIKAN TINGGI', '', 'yfu758e5', '', '', 'PTS'),
('c2e7c0ea-cc6a-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN REKOMENDASI PEMBUKAAN PROGRAM STUDI DI KAMPUS UTAMA PADA PERGURUAN TINGGI SWASTA', '', '43ter4tc', '', '', 'PTS'),
('c8f02a67-cc6a-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN REKOMENDASI PEMBUKAAN PROGRAM STUDI DI KAMPUS UTAMA PADA PERGURUAN TINGGI NEGERI (PTN)', '', '43ter4tc', '', '', 'PTS'),
('cf5062f8-cc6a-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN REKOMENDASI PEMBUKAAN PROGRAM STUDI DI LUAR KAMPUS UTAMA (PSDKU)', '', '43ter4tc', '', '', 'PTS'),
('d530b0f9-cc6a-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN REKOMENDASI PEMBUKAAN PROGRAM STUDI PENDIDIKAN JARAK JAUH (PJJ)', '', '43ter4tc', '', '', 'PTS'),
('dfb1032a-cc6a-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN REKOMENDASI PENYESUAIAN / PERUBAHAN NAMA BADAN PENYELENGGARA PERGURUAN TINGGI SWASTA (PTS)', '', '43ter4tc', '', '', 'PTS'),
('e1c99fad-28e3-11ed-8b44-c454445434d3', 'STANDAR PELAYANAN PENETAPAN INPASSING PANGKAT DOSEN\r\nBUKAN PEGAWAI NEGERI SIPIL GOLONGAN IV', '', '5ydretwe', '', '', 'PTS'),
('e74cb6ee-cc6a-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN REKOMENDASI PERUBAHAN NAMA PROGRAM STUDI', '', '43ter4tc', '', '', 'PTS'),
('eb2e9840-28e3-11ed-8b44-c454445434d3', 'STANDAR PELAYANAN KENAIKAN PANGKAT/GOLONGAN DOSEN\r\nPEGAWAI NEGERI SIPIL DIPEKERJAKAN (DPK)', '', '5ydretwe', '', '', 'PTS'),
('fee4680d-cc6a-11ed-ae35-6c3c8c5f1f57', 'STANDAR PELAYANAN ALIH TUGAS PEGAWAI NEGERI SIPIL NON DOSEN MENJADI PEGAWAI NEGERI SIPIL DOSEN', '', '5ydretwe', '', '', 'PTS');

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
  `nama_syarat` char(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `syarat`
--

INSERT INTO `syarat` (`id_syarat`, `nama_syarat`) VALUES
('03cffe18-ab72-11ed-9937-c454445434d3', 'ktp');

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
