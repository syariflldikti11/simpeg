-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Bulan Mei 2023 pada 17.07
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpeg`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `arsip_kepegawaian`
--

CREATE TABLE `arsip_kepegawaian` (
  `id_arsip_kepegawaian` char(100) NOT NULL,
  `id_jenis_arsip` char(100) NOT NULL,
  `keterangan` char(100) NOT NULL,
  `file` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `arsip_kepegawaian`
--

INSERT INTO `arsip_kepegawaian` (`id_arsip_kepegawaian`, `id_jenis_arsip`, `keterangan`, `file`) VALUES
('180103e1-fd0c-11ed-9f05-ea3c6f7707bf', '4be5f93f-fd07-11ed-9f05-ea3c6f7707bf', 'Konsumsi', '2022_Undangan_Budaya_Prima_u__Pegawai.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `arsip_pegawai`
--

CREATE TABLE `arsip_pegawai` (
  `id_arsip_pegawai` char(100) NOT NULL,
  `nik` char(100) NOT NULL,
  `id_jenis_arsip` char(100) NOT NULL,
  `keterangan` char(100) NOT NULL,
  `file` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` char(100) NOT NULL,
  `nama_jabatan` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
('c65b69e3-fc65-11ed-9f05-ea3c6f7707bf', 'Gurus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_arsip`
--

CREATE TABLE `jenis_arsip` (
  `id_jenis_arsip` char(100) NOT NULL,
  `nama_jenis_arsip` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_arsip`
--

INSERT INTO `jenis_arsip` (`id_jenis_arsip`, `nama_jenis_arsip`) VALUES
('4be5f93f-fd07-11ed-9f05-ea3c6f7707bf', 'Ijazah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluarga`
--

CREATE TABLE `keluarga` (
  `id_keluarga` char(100) NOT NULL,
  `id_pegawai` char(100) NOT NULL,
  `jenis_keluarga` char(100) NOT NULL,
  `nama_keluarga` char(100) NOT NULL,
  `tempat_lahir_keluarga` char(100) NOT NULL,
  `tgl_lahir_keluarga` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` char(100) NOT NULL,
  `nip` char(100) NOT NULL,
  `nik` char(100) NOT NULL,
  `kk` char(100) NOT NULL,
  `tempat_lahir` char(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` char(200) NOT NULL,
  `agama` char(10) NOT NULL,
  `email` char(100) NOT NULL,
  `no_hp` char(13) NOT NULL,
  `status_kawin` char(100) NOT NULL,
  `id_jabatan` char(100) NOT NULL,
  `pendidikan_terakhir` char(100) NOT NULL,
  `tmt` date NOT NULL,
  `file` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nip`, `nik`, `kk`, `tempat_lahir`, `tgl_lahir`, `alamat`, `agama`, `email`, `no_hp`, `status_kawin`, `id_jabatan`, `pendidikan_terakhir`, `tmt`, `file`) VALUES
('ec3f5a25-fd64-11ed-9f05-ea3c6f7707bf', '197101161992032001', '6309112608980002', '123', 'Tabalong', '2023-05-28', 'handil bakti', 'Islamm', 'mujib@gmail.com', '085849658066', 'Menikah', 'c65b69e3-fc65-11ed-9f05-ea3c6f7707bf', 'D3', '2023-05-28', 'SIM_A.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pendidikan` char(100) NOT NULL,
  `nik` char(100) NOT NULL,
  `jenjang` char(100) NOT NULL,
  `nama_sekolah` char(100) NOT NULL,
  `jurusan` char(100) NOT NULL,
  `tahun_lulus` char(100) NOT NULL,
  `no_ijazah` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--
-- Kesalahan membaca struktur untuk tabel simpeg.pengguna: #1932 - Table 'simpeg.pengguna' doesn't exist in engine
-- Kesalahan membaca data untuk tabel simpeg.pengguna: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `simpeg`.`pengguna`' at line 1

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `arsip_kepegawaian`
--
ALTER TABLE `arsip_kepegawaian`
  ADD PRIMARY KEY (`id_arsip_kepegawaian`);

--
-- Indeks untuk tabel `arsip_pegawai`
--
ALTER TABLE `arsip_pegawai`
  ADD PRIMARY KEY (`id_arsip_pegawai`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `jenis_arsip`
--
ALTER TABLE `jenis_arsip`
  ADD PRIMARY KEY (`id_jenis_arsip`);

--
-- Indeks untuk tabel `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`id_keluarga`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
