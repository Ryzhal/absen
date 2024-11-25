-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Apr 2024 pada 06.44
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_absen`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `nid` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `hp` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `foto` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_dosen`
--

INSERT INTO `tb_dosen` (`nid`, `nama`, `hp`, `jabatan`, `prodi`, `alamat`, `foto`) VALUES
(927048702, 'Andi Zulkifli Nusri, S.Kom.,M.Kom.', '0811412221', 'Ketua Prodi', 'Teknik Informatika', 'Soppeng', '101-WhatsApp Image 2024-03-30 at 22.04.31 (1).jpeg'),
(927048703, 'M. Afdal Tahir,S.Kom,MMSI', '0123456', 'Dosen Pengajar', 'Teknik Informatika', 'Makassar', 'upload.jpg'),
(927048704, 'Dr. Asmini,SE,M.Si', '123456', 'Wakil Rektor', 'Manajemen', 'Soppeng', 'upload.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kampus`
--

CREATE TABLE `tb_kampus` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `akreditasi` char(1) NOT NULL,
  `status` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `visimisi` varchar(256) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kampus`
--

INSERT INTO `tb_kampus` (`id`, `nama`, `alamat`, `akreditasi`, `status`, `email`, `visimisi`, `gambar`) VALUES
(1, '', '', '', '', '', '', 'upload.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_matakuliah`
--

CREATE TABLE `tb_matakuliah` (
  `id` int(11) NOT NULL,
  `matakuliah` varchar(200) NOT NULL,
  `prodi` varchar(150) NOT NULL,
  `dosen` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_matakuliah`
--

INSERT INTO `tb_matakuliah` (`id`, `matakuliah`, `prodi`, `dosen`) VALUES
(30, 'Metode Penelitian', 'Teknik Informatika', 'Dr. Asmini,SE,M.Si'),
(32, 'Algoritma Pemograman', 'Teknik Informatika', 'M. Afdal Tahir,S.Kom,MMSI'),
(34, 'Jaringan Komputer', 'Teknik Informatika', 'Andi Zulkifli Nusri, S.Kom.,M.Kom.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nim` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `foto` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`nim`, `nama`, `alamat`, `kelas`, `jurusan`, `foto`) VALUES
(2204001, 'Mila Karmila Khair', ' Soppeng', 'Kelas A', 'Teknik Informatika', '279-WhatsApp Image 2024-03-30 at 22.04.31.jpeg'),
(2204025, 'Furqon ', 'Desa Pising', 'Kelas A', 'Teknik Informatika', 'upload.jpg'),
(2204054, 'Saddam Nugraha', ' Soppeng', 'Kelas B', 'Teknik Informatika', '475-WhatsApp Image 2024-03-30 at 22.08.00.jpeg'),
(2204080, 'M Rizal R', 'Makassar', 'Kelas B', 'Teknik Informatika', '176-NLHP1656.JPG'),
(2204081, 'Safaruddin', ' Bone', 'Kelas A', 'Teknik Informatika', '484-WhatsApp Image 2024-03-30 at 22.06.50.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `status` varchar(128) NOT NULL,
  `foto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `nama`, `alamat`, `status`, `foto`) VALUES
(1, 'admin', '$2y$10$ZfsrYhFAJXxBo5CTymbBue2ABheDorxE0N6X8u8.XihvR52eKN/02', 'Rizal', 'Jl.Kayangan', 'mahasiswa', 'upload.jpg'),
(2, 'ryz', '$2y$10$xhKz1Z3LpU8GkILHtQYj1e5bhJcBI40vRKAl6ioWP3kHP95ivmHI6', 'M Rizal R', 'Nusa indah', 'mahasiswa', 'upload.jpg'),
(7, 'ufa', '$2y$10$QxpnG/f210jYePASg4gz0OnzOvEMzs8WHVxsYcNL3XMhhEHB/IC1u', 'masfufa', 'Indramayu', 'mahasiswa', '968-foto.JPG'),
(8, 'Ryzhal', '$2y$10$QSwtjso8qF7K.ExEIT/gJuqSYHkDIXus7iX/9e7DOS37DhzHldgee', 'M RIZAL R', 'Gowa', 'mahasiswa', '917-NLHP1656.JPG');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`nid`);

--
-- Indeks untuk tabel `tb_kampus`
--
ALTER TABLE `tb_kampus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_matakuliah`
--
ALTER TABLE `tb_matakuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_kampus`
--
ALTER TABLE `tb_kampus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_matakuliah`
--
ALTER TABLE `tb_matakuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
