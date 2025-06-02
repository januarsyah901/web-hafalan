-- Create database projectuas2
create database projectuas2;

-- Use database projectuas2
use projectuas2;

-- show current database
SELECT DATABASE();

-- Create table
CREATE TABLE ustadz
(
    id       INT AUTO_INCREMENT PRIMARY KEY,
    nama     VARCHAR(100)       NOT NULL,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255)       NOT NULL
);

CREATE TABLE kelas
(
    id         INT AUTO_INCREMENT PRIMARY KEY,
    nama_kelas VARCHAR(10) NOT NULL
);

CREATE TABLE surah
(
    id         INT AUTO_INCREMENT PRIMARY KEY,
    nama_surah VARCHAR(100) NOT NULL
);

CREATE TABLE santri
(
    id            INT AUTO_INCREMENT PRIMARY KEY,
    nama          VARCHAR(100)                        NOT NULL,
    tempat_lahir  VARCHAR(100)                        NOT NULL,
    tanggal_lahir DATE                                NOT NULL,
    jenis_kelamin ENUM ('L', 'P')                     NOT NULL,
    kelas_id      INT                                 NOT NULL,
    alamat        TEXT,
    nama_ortu     VARCHAR(100),
    no_telp       VARCHAR(20),
    tanggal_masuk DATE                                NOT NULL,
    status        ENUM ('aktif', 'nonaktif') NOT NULL DEFAULT 'aktif',
    catatan       TEXT,
    FOREIGN KEY (kelas_id) REFERENCES kelas (id) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE setoran
(
    id        INT AUTO_INCREMENT PRIMARY KEY,
    tanggal   DATE NOT NULL,
    santri_id INT NOT NULL,
    surah_id  INT NOT NULL,
    ayat      VARCHAR(20) NOT NULL,
    jenis     ENUM ('Ziyadah', 'Murajaah') NOT NULL,
    skor      INT CHECK (skor >= 0 AND skor <= 100) NOT NULL,
    status    ENUM ('Lulus', 'Perlu diulang', 'Gagal', 'Proses') NOT NULL DEFAULT 'Proses',
    catatan   TEXT,
    FOREIGN KEY (santri_id) REFERENCES santri (id),
    FOREIGN KEY (surah_id) REFERENCES surah (id)
);
-- Data ustadz
INSERT INTO ustadz (nama, username, password)
values ('Abdullah', 'abdul', '$2y$10$qxiRXNWOWalOvSX3NOEfN.xeMkKGlAgC7S6/.epbMCTu3oRB35uWa');

-- Data kelas
INSERT INTO kelas (nama_kelas)
VALUES ('VII-A'),
       ('VII-B'),
       ('VIII-C'),
       ('IX-A'),
       ('IX-B'),
       ('VIII-A'),
       ('IX-c');

-- Data surah
INSERT INTO surah (nama_surah)
VALUES ('Al-Fatihah'),
       ('Al-Baqarah'),
       ('Ali \'Imran'),
       ('An-Nisa\''),
       ('Al-Ma\'idah'),
       ('Al-An\'am'),
       ('Al-A\'raf'),
       ('Al-Anfal'),
       ('At-Tawbah'),
       ('Yunus'),
       ('Hud'),
       ('Yusuf'),
       ('Ar-Ra\'d'),
       ('Ibrahim'),
       ('Al-Hijr'),
       ('An-Nahl'),
       ('Al-Isra\''),
       ('Al-Kahf'),
       ('Maryam'),
       ('Ta-Ha'),
       ('Al-Anbiya\''),
       ('Al-Hajj'),
       ('Al-Mu\'minun'),
       ('An-Nur'),
       ('Al-Furqan'),
       ('Ash-Shu\'ara\''),
       ('An-Naml'),
       ('Al-Qasas'),
       ('Al-\'Ankabut'),
       ('Ar-Rum'),
       ('Luqman'),
       ('As-Sajdah'),
       ('Al-Ahzab'),
       ('Saba\''),
       ('Fatir'),
       ('Ya-Sin'),
       ('As-Saffat'),
       ('Sad'),
       ('Az-Zumar'),
       ('Ghafir'),
       ('Fussilat'),
       ('Ash-Shura'),
       ('Az-Zukhruf'),
       ('Ad-Dukhan'),
       ('Al-Jathiyah'),
       ('Al-Ahqaf'),
       ('Muhammad'),
       ('Al-Fath'),
       ('Al-Hujurat'),
       ('Qaf'),
       ('Adh-Dhariyat'),
       ('At-Tur'),
       ('An-Najm'),
       ('Al-Qamar'),
       ('Ar-Rahman'),
       ('Al-Waqi\'ah'),
       ('Al-Hadid'),
       ('Al-Mujadila'),
       ('Al-Hashr'),
       ('Al-Mumtahanah'),
       ('As-Saff'),
       ('Al-Jumu\'ah'),
       ('Al-Munafiqun'),
       ('At-Taghabun'),
       ('At-Talaq'),
       ('At-Tahrim'),
       ('Al-Mulk'),
       ('Al-Qalam'),
       ('Al-Haqqah'),
       ('Al-Ma\'arij'),
       ('Nuh'),
       ('Al-Jinn'),
       ('Al-Muzzammil'),
       ('Al-Muddathir'),
       ('Al-Qiyamah'),
       ('Al-Insan'),
       ('Al-Mursalat'),
       ('An-Naba\''),
       ('An-Nazi\'at'),
       ('\'Abasa'),
       ('At-Takwir'),
       ('Al-Infitar'),
       ('Al-Mutaffifin'),
       ('Al-Inshiqaq'),
       ('Al-Buruj'),
       ('At-Tariq'),
       ('Al-A\'la'),
       ('Al-Ghashiyah'),
       ('Al-Fajr'),
       ('Al-Balad'),
       ('Ash-Shams'),
       ('Al-Layl'),
       ('Ad-Duhaa'),
       ('Ash-Sharh'),
       ('At-Tin'),
       ('Al-\'Alaq'),
       ('Al-Qadr'),
       ('Al-Bayyinah'),
       ('Az-Zalzalah'),
       ('Al-\'Adiyat'),
       ('Al-Qari\'ah'),
       ('At-Takathur'),
       ('Al-Asr'),
       ('Al-Humazah'),
       ('Al-Fil'),
       ('Quraysh'),
       ('Al-Ma\'un'),
       ('Al-Kawthar'),
       ('Al-Kafirun'),
       ('An-Nasr'),
       ('Al-Masad'),
       ('Al-Ikhlas'),
       ('Al-Falaq'),
       ('An-Nas');

-- Data santri
INSERT INTO santri (nama, tempat_lahir, tanggal_lahir, jenis_kelamin, kelas_id, alamat, nama_ortu, no_telp, tanggal_masuk, status, catatan)
VALUES
    ('Ahmad Fauzi', 'Surabaya', '2012-01-15', 'L', 1, 'Jl. Kenari 1', 'Budi Fauzi', '08123456701', '2023-07-01', 'aktif', NULL),
    ('Siti Aisyah', 'Jakarta', '2011-03-22', 'P', 2, 'Jl. Mawar 12', 'Rina Sari', '08123456702', '2023-07-02', 'aktif', 'Berprestasi di hafalan'),
    ('Muhammad Reza', 'Bandung', '2010-05-10', 'L', 3, 'Jl. Melati 5', 'Agus Santoso', '08123456703', '2023-07-03', 'aktif', NULL),
    ('Fatima Nur', 'Yogyakarta', '2013-07-19', 'P', 1, 'Jl. Anggrek 8', 'Slamet Riyadi', '08123456704', '2023-07-04', 'aktif', 'Perlu bimbingan ekstra'),
    ('Budi Santoso', 'Semarang', '2012-09-25', 'L', 2, 'Jl. Flamboyan 3', 'Wulan Sari', '08123456705', '2023-07-05', 'aktif', NULL),
    ('Rina Amalia', 'Medan', '2011-11-30', 'P', 3, 'Jl. Cendana 7', 'Hadi Wijaya', '08123456706', '2023-07-06', 'aktif', NULL),
    ('Eko Prasetyo', 'Makassar', '2010-02-14', 'L', 1, 'Jl. Kamboja 10', 'Siti Aminah', '08123456707', '2023-07-07', 'aktif', 'Aktif di kegiatan olahraga'),
    ('Nadia Putri', 'Bali', '2013-04-08', 'P', 2, 'Jl. Teratai 4', 'Made Susanto', '08123456708', '2023-07-08', 'aktif', NULL),
    ('Hasan Basri', 'Malang', '2012-06-17', 'L', 3, 'Jl. Dahlia 9', 'Rini Hartono', '08123456709', '2023-07-09', 'aktif', NULL),
    ('Lina Marlina', 'Palembang', '2011-08-23', 'P', 1, 'Jl. Sakura 2', 'Joko Widodo', '08123456710', '2023-07-10', 'aktif', 'Pemenang lomba pidato'),
    ('Rudi Hartono', 'Surakarta', '2010-10-05', 'L', 2, 'Jl. Bougenville 6', 'Sri Lestari', '08123456711', '2023-07-11', 'aktif', NULL),
    ('Aisyah Zahra', 'Bogor', '2013-12-12', 'P', 3, 'Jl. Merpati 15', 'Ahmad Yani', '08123456712', '2023-07-12', 'aktif', NULL),
    ('Fajar Nugroho', 'Pekanbaru', '2012-03-03', 'L', 1, 'Jl. Kenanga 11', 'Dewi Susanti', '08123456713', '2023-07-13', 'aktif', 'Perlu perhatian di pelajaran'),
    ('Sari Dewi', 'Bandar Lampung', '2011-05-27', 'P', 2, 'Jl. Cempaka 13', 'Bambang Sutrisno', '08123456714', '2023-07-14', 'aktif', NULL),
    ('Taufik Hidayat', 'Cirebon', '2010-07-09', 'L', 3, 'Jl. Tulip 7', 'Nur Aisyah', '08123456715', '2023-07-15', 'aktif', NULL),
    ('Zahra Fitri', 'Padang', '2013-09-14', 'P', 1, 'Jl. Raflesia 5', 'Hendra Wijaya', '08123456716', '2023-07-16', 'aktif', NULL),
    ('Arif Rahman', 'Banjarmasin', '2012-11-20', 'L', 2, 'Jl. Kutilang 8', 'Siti Fatimah', '08123456717', '2023-07-17', 'aktif', 'Berbakat di seni'),
    ('Mira Safitri', 'Denpasar', '2011-01-06', 'P', 3, 'Jl. Nusa Indah 4', 'Ketut Suryana', '08123456718', '2023-07-18', 'aktif', NULL),
    ('Dedi Kurniawan', 'Mataram', '2010-03-12', 'L', 1, 'Jl. Melur 9', 'Rina Wulandari', '08123456719', '2023-07-19', 'aktif', NULL),
    ('Nurul Huda', 'Jambi', '2013-05-18', 'P', 2, 'Jl. Kenanga 3', 'Samsul Hadi', '08123456720', '2023-07-20', 'aktif', NULL),
    ('Andi Saputra', 'Samarinda', '2012-07-24', 'L', 3, 'Jl. Anggrek 12', 'Lina Marlina', '08123456721', '2023-07-21', 'aktif', NULL),
    ('Rika Amelia', 'Manado', '2011-09-30', 'P', 1, 'Jl. Flamboyan 2', 'Ronald Tambunan', '08123456722', '2023-07-22', 'aktif', 'Aktif di organisasi'),
    ('Irfan Maulana', 'Kendari', '2010-11-05', 'L', 2, 'Jl. Sakura 10', 'Siti Rahmawati', '08123456723', '2023-07-23', 'aktif', NULL),
    ('Lia Safira', 'Gorontalo', '2013-01-11', 'P', 3, 'Jl. Cendana 6', 'Budi Santoso', '08123456724', '2023-07-24', 'aktif', NULL),
    ('Rizki Pratama', 'Ambon', '2012-03-17', 'L', 1, 'Jl. Mawar 8', 'Rina Susanti', '08123456725', '2023-07-25', 'aktif', NULL),
    ('Sofia Aulia', 'Ternatet', '2011-05-23', 'P', 2, 'Jl. Teratai 3', 'Ahmad Hidayat', '08123456726', '2023-07-26', 'aktif', 'Berprestasi akademik'),
    ('Yusuf Hadi', 'Banda Aceh', '2010-07-29', 'L', 3, 'Jl. Dahlia 11', 'Siti Aminah', '08123456727', '2023-07-27', 'aktif', NULL),
    ('Anisa Rahma', 'Pontianak', '2013-09-04', 'P', 1, 'Jl. Kamboja 5', 'Hadi Santoso', '08123456728', '2023-07-28', 'aktif', NULL),
    ('Agus Setiawan', 'Balikpapan', '2012-11-10', 'L', 2, 'Jl. Melati 7', 'Rina Wulandari', '08123456729', '2023-07-29', 'aktif', NULL),
    ('Dewi Lestari', 'Batam', '2011-01-16', 'P', 3, 'Jl. Kenari 9', 'Bambang Wijaya', '08123456730', '2023-07-30', 'aktif', NULL),
    ('Faisal Akbar', 'Pangkalpinang', '2010-03-22', 'L', 1, 'Jl. Cempaka 4', 'Siti Rahmawati', '08123456731', '2023-07-31', 'aktif', NULL),
    ('Alya Putri', 'Kupang', '2013-05-28', 'P', 2, 'Jl. Bougenville 8', 'Joko Santoso', '08123456732', '2023-08-01', 'aktif', NULL),
    ('Rian Hidayat', 'Jayapura', '2012-07-03', 'L', 3, 'Jl. Raflesia 6', 'Siti Fatimah', '08123456733', '2023-08-02', 'aktif', NULL),
    ('Nia Ramadhani', 'Palu', '2011-09-09', 'P', 1, 'Jl. Kutilang 2', 'Ahmad Yani', '08123456734', '2023-08-03', 'aktif', NULL),
    ('Hendra Wijaya', 'Serang', '2010-11-15', 'L', 2, 'Jl. Merpati 10', 'Rina Sari', '08123456735', '2023-08-04', 'aktif', NULL),
    ('Siti Khadijah', 'Bengkulu', '2013-01-21', 'P', 3, 'Jl. Tulip 12', 'Budi Santoso', '08123456736', '2023-08-05', 'aktif', NULL),
    ('Adi Nugroho', 'Tangerang', '2012-03-27', 'L', 1, 'Jl. Nusa Indah 7', 'Siti Aminah', '08123456737', '2023-08-06', 'aktif', NULL),
    ('Rina Wulandari', 'Depok', '2011-05-02', 'P', 2, 'Jl. Melur 4', 'Hadi Wijaya', '08123456738', '2023-08-07', 'aktif', NULL),
    ('Bima Sakti', 'Bekasi', '2010-07-08', 'L', 3, 'Jl. Kenanga 9', 'Rina Susanti', '08123456739', '2023-08-08', 'aktif', NULL),
    ('Aisyah Putri', 'Cimahi', '2013-09-14', 'P', 1, 'Jl. Sakura 5', 'Ahmad Hidayat', '08123456740', '2023-08-09', 'aktif', NULL),
    ('Rudi Setiawan', 'Tasikmalaya', '2012-11-20', 'L', 2, 'Jl. Cendana 3', 'Siti Fatimah', '08123456741', '2023-08-10', 'aktif', NULL),
    ('Lina Safitri', 'Cianjur', '2011-01-26', 'P', 3, 'Jl. Flamboyan 7', 'Bambang Sutrisno', '08123456742', '2023-08-11', 'aktif', NULL),
    ('Fajar Hidayat', 'Sukabumi', '2010-03-04', 'L', 1, 'Jl. Teratai 9', 'Rina Wulandari', '08123456743', '2023-08-12', 'aktif', NULL),
    ('Sari Aulia', 'Purwakarta', '2013-05-10', 'P', 2, 'Jl. Dahlia 2', 'Joko Widodo', '08123456744', '2023-08-13', 'aktif', NULL),
    ('Taufik Rahman', 'Garut', '2012-07-16', 'L', 3, 'Jl. Kamboja 8', 'Siti Rahmawati', '08123456745', '2023-08-14', 'aktif', NULL);


-- Data setoran
INSERT INTO setoran (tanggal, santri_id, surah_id, ayat, jenis, skor, status)
VALUES
    ('2025-06-01', 3, 5, '1-10', 'Ziyadah', 85, 'Proses'),
    ('2025-06-01', 7, 10, '2-12', 'Murajaah', 70, 'Perlu diulang'),
    ('2025-06-01', 12, 3, '5-15', 'Ziyadah', 92, 'Lulus'),
    ('2025-06-01', 5, 7, '1-8', 'Ziyadah', 78, 'Perlu diulang'),
    ('2025-06-01', 14, 12, '3-9', 'Murajaah', 88, 'Lulus'),

    ('2025-06-02', 1, 6, '1-5', 'Ziyadah', 81, 'Lulus'),
    ('2025-06-02', 10, 15, '6-16', 'Murajaah', 68, 'Perlu diulang'),
    ('2025-06-02', 13, 4, '1-11', 'Ziyadah', 93, 'Lulus'),
    ('2025-06-02', 2, 9, '2-10', 'Ziyadah', 76, 'Perlu diulang'),
    ('2025-06-02', 11, 8, '4-13', 'Murajaah', 84, 'Lulus'),

    ('2025-06-02', 4, 13, '1-7', 'Ziyadah', 91, 'Lulus'),
    ('2025-06-02', 8, 2, '3-8', 'Murajaah', 73, 'Perlu diulang'),
    ('2025-06-02', 15, 6, '1-10', 'Ziyadah', 89, 'Lulus'),
    ('2025-06-02', 6, 11, '5-15', 'Ziyadah', 77, 'Perlu diulang'),
    ('2025-06-02', 9, 14, '4-12', 'Murajaah', 82, 'Lulus'),

    ('2025-06-02', 3, 7, '2-6', 'Ziyadah', 94, 'Lulus'),
    ('2025-06-02', 7, 10, '6-11', 'Murajaah', 69, 'Perlu diulang'),
    ('2025-06-02', 12, 1, '1-5', 'Ziyadah', 88, 'Lulus'),
    ('2025-06-02', 5, 8, '3-7', 'Ziyadah', 80, 'Lulus'),
    ('2025-06-02', 14, 5, '4-10', 'Murajaah', 75, 'Perlu diulang'),

    ('2025-06-02', 1, 2, '5-10', 'Ziyadah', 91, 'Lulus'),
    ('2025-06-02', 10, 3, '6-12', 'Murajaah', 67, 'Perlu diulang'),
    ('2025-06-02', 13, 9, '1-9', 'Ziyadah', 90, 'Lulus'),
    ('2025-06-02', 2, 6, '4-8', 'Ziyadah', 74, 'Perlu diulang'),
    ('2025-06-02', 11, 12, '5-13', 'Murajaah', 85, 'Lulus'),

    ('2025-06-02', 4, 11, '2-10', 'Ziyadah', 86, 'Lulus'),
    ('2025-06-02', 8, 14, '1-6', 'Murajaah', 79, 'Perlu diulang'),
    ('2025-06-02', 15, 13, '3-9', 'Ziyadah', 92, 'Lulus'),
    ('2025-06-02', 6, 10, '2-7', 'Ziyadah', 83, 'Lulus'),
    ('2025-06-02', 9, 5, '6-14', 'Murajaah', 71, 'Perlu diulang'),

    ('2025-05-21', 3, 7, '1-6', 'Ziyadah', 90, 'Lulus'),
    ('2025-05-21', 7, 4, '2-9', 'Murajaah', 66, 'Perlu diulang'),
    ('2025-05-21', 12, 6, '5-11', 'Ziyadah', 87, 'Lulus'),
    ('2025-05-21', 5, 1, '3-10', 'Ziyadah', 70, 'Perlu diulang'),
    ('2025-05-21', 14, 9, '4-12', 'Murajaah', 82, 'Lulus'),

    ('2025-06-02', 1, 3, '2-8', 'Ziyadah', 89, 'Lulus'),
    ('2025-06-02', 10, 2, '1-5', 'Murajaah', 78, 'Perlu diulang'),
    ('2025-06-02', 13, 8, '6-13', 'Ziyadah', 94, 'Lulus'),
    ('2025-06-02', 2, 12, '2-9', 'Ziyadah', 84, 'Proses'),
    ('2025-06-02', 11, 14, '3-7', 'Murajaah', 76, 'Perlu diulang');



-- Query
SELECT s.tanggal,
       san.nama       AS nama_santri,
       k.nama_kelas   AS kelas,
       sur.nama_surah AS surat,
       s.ayat,
       s.jenis,
       s.skor,
       s.status
FROM setoran s
         JOIN santri san ON s.santri_id = san.id
         JOIN kelas k ON san.kelas_id = k.id
         JOIN surah sur ON s.surah_id = sur.id
ORDER BY s.tanggal DESC;

SELECT COUNT(*) AS hafalan_minggu_ini
FROM setoran
WHERE YEARWEEK(tanggal, 1) = YEARWEEK(CURDATE(), 1);

# delete semua data dari semua table
DELETE
FROM setoran;
DELETE
FROM santri
WHERE nama LIKE '%vian%';
DELETE
FROM kelas;
DELETE
FROM surah;
DELETE
FROM ustadz;

# drop semua table
DROP TABLE IF EXISTS setoran;
DROP TABLE IF EXISTS santri;
DROP TABLE IF EXISTS kelas;
DROP TABLE IF EXISTS surah;
DROP TABLE IF EXISTS ustadz;
-- drop table



