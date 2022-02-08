-- SQL MANUAL

-- ---------------- BUKU ---------------------------
-- BUKU KATEGORI
DROP TABLE IF EXISTS `tbl_web_buku_kategori`;
CREATE TABLE `tbl_web_buku_kategori` (
    `buku_kategori_id` int(11) NOT NULL,
    `buku_kategori_nama` varchar(50) NOT NULL,
    `buku_kategori_deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `tbl_web_buku_kategori`
    ADD PRIMARY KEY (`buku_kategori_id`),
    MODIFY `buku_kategori_id` int(11) NOT NULL AUTO_INCREMENT;

-- BUKU KLASIFIKASI
DROP TABLE IF EXISTS `tbl_web_buku_klasifikasi`;
CREATE TABLE `tbl_web_buku_klasifikasi` (
    `buku_klasifikasi_id` int(11) NOT NULL,
    `buku_klasifikasi_nama` varchar(200) NOT NULL,
    `buku_klasifikasi_deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `tbl_web_buku_klasifikasi`
    ADD PRIMARY KEY (`buku_klasifikasi_id`),
    MODIFY `buku_klasifikasi_id` int(11) NOT NULL AUTO_INCREMENT;

-- BUKU
DROP TABLE IF EXISTS `tbl_web_buku`;
CREATE TABLE `tbl_web_buku` (
    `buku_id` int(11) NOT NULL,
    `buku_kategori_id` int(11) NOT NULL,
    `buku_klasifikasi_id` int(11) NOT NULL,
    `buku_judul` varchar(100) NOT NULL,
    `buku_pengarang` varchar(50) NOT NULL,
    `buku_edisi` varchar(50) NOT NULL,
    `buku_no_panggil` varchar(50) NOT NULL,
    `buku_ISSN` varchar(50) NOT NULL,
    `buku_bahasa` varchar(50) NOT NULL,
    `buku_penerbit` varchar(50) NOT NULL,
    `buku_tahun_penerbit` int(11) NOT NULL,
    `buku_tempat_terbit` varchar(200) NOT NULL,
    `buku_deskripsi_fisik` text NOT NULL,
    `buku_tanggal_entri` datetime NOT NULL,
    `buku_stok` int(11) NOT NULL,
    `createtime` datetime NOT NULL,
    `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `tbl_web_buku`
    ADD PRIMARY KEY (`buku_id`),
    MODIFY `buku_id` int(11) NOT NULL AUTO_INCREMENT;



-- ---------------- SKRIPSI ---------------------------
-- SKRIPSI
DROP TABLE IF EXISTS `tbl_web_skripsi`;
CREATE TABLE `tbl_web_skripsi` (
    `skripsi_id` int(11) NOT NULL,
    `skripsi_jenis` enum('Skripsi', 'Thesis', 'Disertasi') NOT NULL,
    `skripsi_judul` varchar(200) NOT NULL,
    `skripsi_nama` varchar(50) NOT NULL,
    `skripsi_nim` varchar(20) NOT NULL,
    `skripsi_abstrak` text NOT NULL,
    `skripsi_keyword` varchar(200) NOT NULL,
    `skripsi_bahasa` varchar(50) NOT NULL,
    `skripsi_pembimbing` varchar(200) NOT NULL,
    `skripsi_penerbit` varchar(200) NOT NULL,
    `skripsi_tahun_terbit` int(11) NOT NULL,
    `skripsi_tempat_terbit` varchar(200) NOT NULL,
    `skripsi_deskripsi_fisik` text NOT NULL,
    `skripsi_tanggal_entri` date NOT NULL,
    `skripsi_lampiran_berkas` varchar(200) NOT NULL,
    `skripsi_stok` int(11) NOT NULL,
    `createtime` datetime NOT NULL,
    `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `tbl_web_skripsi`
    ADD PRIMARY KEY (`skripsi_id`),
    MODIFY `skripsi_id` int(11) NOT NULL AUTO_INCREMENT;


-- ---------------- EBOOK ---------------------------
-- EBOOK

-- EBOOK KATEGORI
DROP TABLE IF EXISTS `tbl_web_skripsi_kategori`;
CREATE TABLE `tbl_web_skripsi_kategori` (
    `skripsi_kategori_id` int(11) NOT NULL,
    `skripsi_kategori_nama` varchar(50) NOT NULL,
    `skripsi_kategori_deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `tbl_web_skripsi_kategori`
    ADD PRIMARY KEY (`skripsi_kategori_id`),
    MODIFY `skripsi_kategori_id` int(11) NOT NULL AUTO_INCREMENT;

-- EBOOK KLASIFIKASI
DROP TABLE IF EXISTS `tbl_web_skripsi_klasifikasi`;
CREATE TABLE `tbl_web_skripsi_klasifikasi` (
    `skripsi_klasifikasi_id` int(11) NOT NULL,
    `skripsi_klasifikasi_nama` varchar(200) NOT NULL,
    `skripsi_klasifikasi_deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `tbl_web_skripsi_klasifikasi`
    ADD PRIMARY KEY (`skripsi_klasifikasi_id`),
    MODIFY `skripsi_klasifikasi_id` int(11) NOT NULL AUTO_INCREMENT;


DROP TABLE IF EXISTS `tbl_web_ebook`;
CREATE TABLE `tbl_web_ebook` (
    `ebook_id` int(11) NOT NULL,
    `ebook_kategori` int(11) NOT NULL,
    `ebook_klasifikasi` int(11) NOT NULL,
    `ebook_judul` varchar(200) NOT NULL,
    `ebook_pengarang` varchar(50) NOT NULL,
    `ebook_edisi` varchar(50) NOT NULL,
    `ebook_no_panggil` varchar(50) NOT NULL,
    `ebook_issn` varchar(50) NOT NULL,
    `ebook_bahasa` varchar(50) NOT NULL,
    `ebook_penerbit` varchar(50) NOT NULL,
    `ebook_tahun_terbit` int(11) NOT NULL,
    `ebook_tempat_terbit` varchar(200) NOT NULL,
    `ebook_tanggal_entri` date NOT NULL,
    `ebook_lampiran_berkas` varchar(200) NOT NULL,
    `ebook_cover` varchar(200) NOT NULL,
    `ebok_ringkasan` text NOT NULL,
    `creatime` datetime NOT NULL,
    `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `tbl_web_ebook`
    ADD PRIMARY KEY (`ebook_id`),
    MODIFY `ebook_id` int(11) NOT NULL AUTO_INCREMENT;


-- ------------------------ E-JURNAL -------------------------------
-- E-JURNAL

-- E-JURNAL KATEGORI
DROP TABLE IF EXISTS `tbl_web_ejurnal_kategori`;
CREATE TABLE `tbl_web_ejurnal_kategori` (
    `ejurnal_kategori_id` int(11) NOT NULL,
    `ejurnal_kategori_nama` varchar(50) NOT NULL,
    `ejurnal_kategori_deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `tbl_web_ejurnal_kategori`
    ADD PRIMARY KEY (`ejurnal_kategori_id`),
    MODIFY `ejurnal_kategori_id` int(11) NOT NULL AUTO_INCREMENT;


DROP TABLE IF EXISTS `tbl_web_ejurnal`;
CREATE TABLE `tbl_web_ejurnal` (
    `ejurnal_id` int(11) NOT NULL,
    `ejurnal_kategori` int(11) NOT NULL,
    `ejurnal_judul` varchar(200) NOT NULL,
    `ejurnal_penulis` varchar(50) NOT NULL,
    `ejurnal_tempat_publikasi` varchar(200) NOT NULL,
    `ejurnal_volume` varchar(50) NOT NULL,
    `ejurnal_nomor` varchar(50) NOT NULL,
    `ejurnal_tahun` int(11) NOT NULL,
    `ejurnal_halaman` int(11) NOT NULL,
    `ejurnal_doi` varchar(50) NOT NULL,
    `ejurnal_issn` varchar(50) NOT NULL,
    `ejurnal_eissn` varchar(50) NOT NULL,
    `ejurnal_isbn` varchar(50) NOT NULL,
    `ejurnal_deskripsi` text NOT NULL,
    `creatime` datetime NOT NULL,
    `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `tbl_web_ejurnal`
    ADD PRIMARY KEY (`ejurnal_id`),
    MODIFY `ejurnal_id` int(11) NOT NULL AUTO_INCREMENT;


-- ------------------------ JURUSAN -------------------------------
-- JURUSAN
DROP TABLE IF EXISTS `tbl_web_jurusan`;
CREATE TABLE `tbl_web_jurusan` (
    `jurusan_id` int(11) NOT NULL,
    `fakultas_id` int(11) NOT NULL,
    `jurusan_nama` varchar(50) NOT NULL,
    `jurusan_deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `tbl_web_jurusan`
    ADD PRIMARY KEY (`jurusan_id`),
    MODIFY `jurusan_id` int(11) NOT NULL AUTO_INCREMENT;

-- FAKULTAS
DROP TABLE IF EXISTS `tbl_web_fakultas`;
CREATE TABLE `tbl_web_fakultas` (
    `fakultas_id` int(11) NOT NULL,
    `fakultas_nama` varchar(50) NOT NULL,
    `fakultas_deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `tbl_web_fakultas`
    ADD PRIMARY KEY (`fakultas_id`),
    MODIFY `fakultas_id` int(11) NOT NULL AUTO_INCREMENT;


-- ------------------------ ANGGOTA -------------------------------

-- ANGGOTA KATEGORI
DROP TABLE IF EXISTS `tbl_web_anggota_kategori`;
CREATE TABLE `tbl_web_anggota_kategori` (
    `anggota_kategori_id` int(11) NOT NULL,
    `anggota_kategori_nama` varchar(50) NOT NULL,
    `anggota_kategori_deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `tbl_web_anggota_kategori`
    ADD PRIMARY KEY (`anggota_kategori_id`),
    MODIFY `anggota_kategori_id` int(11) NOT NULL AUTO_INCREMENT;


-- ANGGOTA
DROP TABLE IF EXISTS `tbl_web_anggota`;
CREATE TABLE `tbl_web_anggota` (
    `anggota_id` int(11) NOT NULL,
    `anggota_kategori_id` int(11) NOT NULL,
    `jurusan_id` int(11) NOT NULL,
    `anggota_nama` varchar(50) NOT NULL,
    `creatime` datetime NOT NULL,
    `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `tbl_web_anggota`
    ADD PRIMARY KEY (`anggota_id`),
    MODIFY `anggota_id` int(11) NOT NULL AUTO_INCREMENT;


-- ------------------------ PEMINJAMAN + PENGEMBALIAN -------------------------------
-- PINJAM
DROP TABLE IF EXISTS `tbl_web_pinjam`;
CREATE TABLE `tbl_web_pinjam` (
    `pinjam_id` int(11) NOT NULL,
    `buku_id` int(11) NOT NULL,
    `anggota_id` int(11) NOT NULL,
    `user_id` int(11) NOT NULL,
    `pinjam_tanggal_pinjam` datetime NOT NULL,
    `pinjam_deadline` datetime NOT NULL,
    `pinjam_tanggal_kembali` datetime NOT NULL,
    `pinjam_denda` int(11) NOT NULL,
    `pinjam_status` enum('pinjam', 'kembali') NOT NULL,
    `creatime` datetime NOT NULL,
    `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `tbl_web_pinjam`
    ADD PRIMARY KEY (`pinjam_id`),
    MODIFY `pinjam_id` int(11) NOT NULL AUTO_INCREMENT;