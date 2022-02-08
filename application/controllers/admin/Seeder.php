<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Load library phpspreadsheet
require('./vendor/autoload.php');

use fzaninotto\faker\src\autoload; /* dokumentasi = https://github.com/fzaninotto/Faker */

class Seeder extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_seeder');
        $this->load->model('m_buku_kategori');
        $this->load->model('m_buku_klasifikasi');
        if (!$this->session->userdata('user_id') or $this->session->userdata('user_group') != 1) {
            // ALERT
            $alertStatus  = 'failed';
            $alertMessage = 'Anda tidak memiliki Hak Akses atau Session anda sudah habis';
            getAlert($alertStatus, $alertMessage);
            redirect('admin/dashboard');
        }
    }

    public function index()
    {
        echo '<h1>Memulai Seeder</h1>';

        // SEEDING
        $this->tbl_web_buku_kategori();
        $this->tbl_web_buku_klasifikasi();
        $this->tbl_web_buku();
        // END SEEDING

        echo '<h1>Seeder Berhasil</h1>';
        echo '<a href="' . site_url('admin/dashboard') . '">Kembali ke dashboard</a>';
        die;
    }

    public function tbl_web_buku_kategori()
    {
        // Inisialisasi Tabel
        $table = __FUNCTION__;
        $this->m_seeder->empty_table($table);
        echo 'Mengosongkon <b>' . $table . '</b> berhasil <br>';

        // SEEDING
        $category   = ['000 – Publikasi Umum, informasi umum dan komputer', '010 – Bibiliografi', '020 – Perpustakaan dan informasi', '030 – Ensiklopedia dan buku yang memuat fakta-fakta', '040 – Tidak ada klasifikasi (sebelumnya untuk Biografi)', '050 – Majalah dan Jurnal', '060 – Asosiasi, Organisasi dan Museum', '070 – Media massa, junalisme dan publikasi', '080 – Kutipan', '090 – Manuskrip dan buku langka', '100 – Filsafat dan psikologi', '110 – Metafisika', '120 – Epistimologi', '130 – Parapsikologi dan Okultisme', '140 – Pemikiran Filosofis', '150 – Psikologi', '160 – Filosofis Logis', '170 – Etik', '180 – Filosofi kuno, zaman pertengahan, dan filosofi ketimuran', '190 – Filosofi barat modern', '200 – Agama', '300 – Ilmu sosial, sosiologi dan antropologi', '310 – Statistik', '320 – Ilmu politik', '330 – Ekonomi', '340 – Hukum', '350 – Administrasi publik dan ilmu kemiliteran', '360 – Masalah dan layanan sosial', '370 – Pendidikan', '380 – Perdagangan, komunikasi dan transportasi', '390 – Norma, etika dan tradisi', '400 – Bahasa', '500 – Sains', '510 – Matematika', '520 – Astronomi', '530 – Fisika', '540 – Kimia', '550 – Ilmu kebumian dan geologi', '560 – Fosil dan kehidupan prasejarah', '570 – Biologi', '580 – Tanaman', '590 – Zoologi', '600 – Teknologi', '610 – Kesehatan dan Obat-Obatan', '620 – Teknik', '630 – Pertanian', '640 – Managemen Rumah Tangga dan Keluarga', '650 – Manajemen dan Hubungan dengan Publik', '660 – Teknik Kimia', '670 – Manufaktur', '680 – Manufaktur untuk Keperluan Khusus', '690 – Konstruksi', '700 – Kesenian dan rekreasi', '710 – Perencanaan dan Arsitektur Lanskap', '720 – Arsitektur', '730 – Patung, Keramik dan Seni Metal', '740 – Seni Grafis dan Dekoratif', '750 – Lukisan', '760 – Percetakan', '770 – Fotografi, Film, Video', '780 – Musik', '790 – Olahraga, Permainan dan Hiburan', '800 – Literatur, Sastra, Retorika dan Kritik', '900 – Sejarah', '910 – Geografi dan Perjalanan', '920 – Biografi dan Asal-Usul', '930 – Sejarah Dunia Lama', '940 – Asal–Usul Eropa', '950 – Asal-Usul Asia', '960 – Asal-Usul Afrika', '970 – Asal-Usul Amerika Utara', '980 – Asal-Usul Amerika Selatan', '990 – Asal-Usul Wilayah Lain',];
        foreach ($category as $key => $value) {
            $data['buku_kategori_id']       = '';
            $data['buku_kategori_nama']     = $value;
            $data['buku_kategori_deskripsi']   = '';
            $this->m_seeder->create($table, $data);
        }
        echo 'Seeder <b>' . $table . '</b> berhasil <br><br>';
    }

    public function tbl_web_buku_klasifikasi()
    {
        // Inisialisasi Tabel
        $table = __FUNCTION__;
        $this->m_seeder->empty_table($table);
        echo 'Mengosongkon <b>' . $table . '</b> berhasil <br>';

        // SEEDING
        $clasification   = ['000 – 099 Karya Umum', '100 – 199 Filsafat', '300 – 399 Ilmu Sosial', '400 – 399 Bahasa', '500 – 599 Ilmu Murni', '600 – 699 Pengetahuan Praktis', '700 – 799 Kesenian dan Hiburan', '800 – 899 Kesusastraan', '900 – 999 Sejarah'];
        foreach ($clasification as $key => $value) {
            $data['buku_klasifikasi_id']       = '';
            $data['buku_klasifikasi_nama']     = $value;
            $data['buku_klasifikasi_deskripsi']   = '';
            $this->m_seeder->create($table, $data);
        }
        echo 'Seeder <b>' . $table . '</b> berhasil <br><br>';
    }

    public function tbl_web_buku()
    {
        // Inisialisasi Tabel
        $table = __FUNCTION__;
        $this->m_seeder->empty_table($table);
        echo 'Mengosongkon <b>' . $table . '</b> berhasil <br>';

        // SEEDING
        $faker = Faker\Factory::create('id_ID');

        $kategori = $this->m_buku_kategori->read('', '', '');
        $klasifikasi = $this->m_buku_klasifikasi->read('', '', '');
        $bahasa = ['Indonesia', 'English'];
        for ($i = 0; $i < 100; $i++) {
            $data['buku_id']                  = '';
            $data['buku_kategori_id']         = $kategori[rand(0, (count($kategori)) - 1)]->buku_kategori_id;
            $data['buku_klasifikasi_id']      = $klasifikasi[rand(0, (count($klasifikasi)) - 1)]->buku_klasifikasi_id;
            $data['buku_judul']               = 'Buku ' . $faker->name;
            $data['buku_pengarang']           = $faker->name;
            $data['buku_edisi']               = '';
            $data['buku_no_panggil']          = '';
            $data['buku_ISSN']                = $faker->isbn10;
            $data['buku_bahasa']              = $bahasa[rand(0, 1)];
            $data['buku_penerbit']            = $faker->company;
            $data['buku_tahun_penerbit']      = rand(1990, 2022);
            $data['buku_tempat_terbit']       = $faker->city;
            $data['buku_deskripsi_fisik']     = $faker->realText(150, 2);
            $data['buku_tanggal_entri']       = '';
            $data['buku_stok']                = rand(0, 10);
            $data['createtime']               = date('Y-m-d H:i:s');
            $data['last_update']              = date('Y-m-d H:i:s');
            $this->m_seeder->create($table, $data);
        }
        echo 'Seeder <b>' . $table . '</b> berhasil <br><br>';
    }
}
