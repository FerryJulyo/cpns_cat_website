<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Exam;
use App\Models\Question;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create sample exams - Sesuai standar SKD CPNS resmi
        Exam::create([
            'title' => 'Tes Wawasan Kebangsaan (TWK)',
            'description' => 'Tes yang mengukur pengetahuan dan kemampuan mengimplementasikan nilai-nilai 4 pilar kebangsaan Indonesia (Pancasila, UUD 1945, NKRI, dan Bhinneka Tunggal Ika)',
            'type' => 'TWK',
            'duration_minutes' => 100,
            'total_questions' => 30,
            'passing_grade' => 65,
            'is_active' => true,
        ]);

        Exam::create([
            'title' => 'Tes Intelegensia Umum (TIU)',
            'description' => 'Tes yang mengukur kemampuan verbal (sinonim, antonim, analogi), numerik (aritmatika, deret angka), dan logika berpikir (penalaran analitis)',
            'type' => 'TIU',
            'duration_minutes' => 100,
            'total_questions' => 35,
            'passing_grade' => 80,
            'is_active' => true,
        ]);

        Exam::create([
            'title' => 'Tes Karakteristik Pribadi (TKP)',
            'description' => 'Tes yang mengukur karakteristik kepribadian yang relevan dengan tugas dan fungsi jabatan ASN (integritas, kejujuran, profesionalisme, dll)',
            'type' => 'TKP',
            'duration_minutes' => 100,
            'total_questions' => 45,
            'passing_grade' => 143,
            'is_active' => true,
        ]);

        $questions = [
            // ===== TES WAWASAN KEBANGSAAN (TWK) - 30 SOAL =====
            [
                'exam_id' => 1,
                'question_text' => 'Pancasila sebagai dasar negara mengandung makna bahwa Pancasila menjadi...',
                'option_a' => 'Sumber dari segala sumber hukum',
                'option_b' => 'Pedoman dalam kehidupan bermasyarakat',
                'option_c' => 'Dasar penyelenggaraan negara',
                'option_d' => 'Alat pemersatu bangsa',
                'option_e' => 'Lambang identitas nasional',
                'correct_answer' => 'c',
                'point' => 5
            ],
            [
                'exam_id' => 1,
                'question_text' => 'Bhinneka Tunggal Ika mengandung makna bahwa...',
                'option_a' => 'Indonesia terdiri dari banyak suku bangsa',
                'option_b' => 'Perbedaan bukanlah penghalang persatuan',
                'option_c' => 'Bangsa Indonesia harus bersatu dalam keragaman',
                'option_d' => 'Keragaman budaya adalah kekayaan bangsa',
                'option_e' => 'Semua jawaban benar',
                'correct_answer' => 'e',
                'point' => 5
            ],
            [
                'exam_id' => 1,
                'question_text' => 'Sistem pemerintahan Indonesia berdasarkan UUD 1945 menganut prinsip...',
                'option_a' => 'Pemisahan kekuasaan',
                'option_b' => 'Pembagian kekuasaan',
                'option_c' => 'Pemusatan kekuasaan',
                'option_d' => 'Desentralisasi asimetris',
                'option_e' => 'Sentralisasi kewenangan',
                'correct_answer' => 'b',
                'point' => 5
            ],
            [
                'exam_id' => 1,
                'question_text' => 'Ibu Kota Nusantara (IKN) yang sedang dibangun memiliki filosofi sebagai...',
                'option_a' => 'Kota metropolitan modern',
                'option_b' => 'Kota hutan berkelanjutan',
                'option_c' => 'Smart city terdepan',
                'option_d' => 'Pusat pertumbuhan ekonomi baru',
                'option_e' => 'Simbol persatuan bangsa',
                'correct_answer' => 'b',
                'point' => 5
            ],
            [
                'exam_id' => 1,
                'question_text' => 'Kebijakan Merdeka Belajar Kampus Merdeka bertujuan untuk...',
                'option_a' => 'Meningkatkan kualitas pendidikan tinggi',
                'option_b' => 'Memberikan otonomi kepada perguruan tinggi',
                'option_c' => 'Menciptakan lulusan yang kompeten',
                'option_d' => 'Meningkatkan link and match dengan dunia kerja',
                'option_e' => 'Semua jawaban benar',
                'correct_answer' => 'e',
                'point' => 5
            ],
            [
                'exam_id' => 1,
                'question_text' => 'Dalam konteks ketahanan nasional, konsep "Poros Maritim Dunia" bertujuan untuk...',
                'option_a' => 'Memperkuat pertahanan laut Indonesia',
                'option_b' => 'Menjadikan Indonesia sebagai pusat maritim global',
                'option_c' => 'Mengoptimalkan potensi ekonomi kelautan',
                'option_d' => 'Memperkuat kedaulatan di wilayah perairan',
                'option_e' => 'Semua jawaban benar',
                'correct_answer' => 'e',
                'point' => 5
            ],
            [
                'exam_id' => 1,
                'question_text' => 'Nilai-nilai yang terkandung dalam Sumpah Pemuda tahun 1928 masih relevan hingga kini, terutama dalam hal...',
                'option_a' => 'Persatuan dan kesatuan bangsa',
                'option_b' => 'Semangat kebangsaan pemuda',
                'option_c' => 'Penggunaan bahasa persatuan',
                'option_d' => 'Pengakuan satu tanah air',
                'option_e' => 'Semua jawaban benar',
                'correct_answer' => 'e',
                'point' => 5
            ],
            [
                'exam_id' => 1,
                'question_text' => 'Dalam menghadapi perkembangan teknologi digital, bangsa Indonesia perlu...',
                'option_a' => 'Menjaga identitas dan jati diri bangsa',
                'option_b' => 'Mengadopsi teknologi secara selektif',
                'option_c' => 'Memperkuat literasi digital masyarakat',
                'option_d' => 'Memanfaatkan teknologi untuk kemajuan bangsa',
                'option_e' => 'Semua jawaban benar',
                'correct_answer' => 'e',
                'point' => 5
            ],
            [
                'exam_id' => 1,
                'question_text' => 'Kebijakan food estate merupakan upaya pemerintah untuk...',
                'option_a' => 'Mewujudkan ketahanan pangan nasional',
                'option_b' => 'Meningkatkan produksi pertanian',
                'option_c' => 'Mengoptimalkan lahan pertanian',
                'option_d' => 'Mengantisipasi krisis pangan global',
                'option_e' => 'Semua jawaban benar',
                'correct_answer' => 'e',
                'point' => 5
            ],
            [
                'exam_id' => 1,
                'question_text' => 'Dalam konteks globalisasi, diplomasi ekonomi Indonesia bertujuan untuk...',
                'option_a' => 'Meningkatkan ekspor produk Indonesia',
                'option_b' => 'Menarik investasi asing',
                'option_c' => 'Memperkuat posisi tawar internasional',
                'option_d' => 'Membangun kemitraan strategis',
                'option_e' => 'Semua jawaban benar',
                'correct_answer' => 'e',
                'point' => 5
            ],
            [
                'exam_id' => 1,
                'question_text' => 'Undang-Undang Dasar 1945 mengatur bahwa kedaulatan berada di tangan rakyat dan dilaksanakan menurut...',
                'option_a' => 'Undang-Undang Dasar',
                'option_b' => 'Kebijakan Presiden',
                'option_c' => 'Keputusan MPR',
                'option_d' => 'Peraturan Pemerintah',
                'option_e' => 'Hukum Adat',
                'correct_answer' => 'a',
                'point' => 5
            ],
            [
                'exam_id' => 1,
                'question_text' => 'Kebijakan transformasi ekonomi Indonesia di tahun 2025 fokus pada...',
                'option_a' => 'Ekonomi hijau dan digital',
                'option_b' => 'Industrialisasi massal',
                'option_c' => 'Ekspor bahan mentah',
                'option_d' => 'Import substitusi',
                'option_e' => 'Liberalisasi perdagangan',
                'correct_answer' => 'a',
                'point' => 5
            ],
            [
                'exam_id' => 1,
                'question_text' => 'Wawasan Nusantara merupakan cara pandang bangsa Indonesia yang mencakup...',
                'option_a' => 'Kesatuan politik, ekonomi, dan sosial budaya',
                'option_b' => 'Kedaulatan wilayah darat saja',
                'option_c' => 'Kepentingan nasional di luar negeri',
                'option_d' => 'Pembangunan ekonomi semata',
                'option_e' => 'Pertahanan militer',
                'correct_answer' => 'a',
                'point' => 5
            ],
            [
                'exam_id' => 1,
                'question_text' => 'Dalam sistem pemerintahan Indonesia, Presiden berkedudukan sebagai...',
                'option_a' => 'Kepala Negara dan Kepala Pemerintahan',
                'option_b' => 'Kepala Negara saja',
                'option_c' => 'Kepala Pemerintahan saja',
                'option_d' => 'Pemimpin Tertinggi Angkatan Bersenjata',
                'option_e' => 'Ketua Dewan Menteri',
                'correct_answer' => 'a',
                'point' => 5
            ],
            [
                'exam_id' => 1,
                'question_text' => 'Nilai-nilai demokrasi yang dikembangkan di Indonesia berdasarkan...',
                'option_a' => 'Pancasila dan UUD 1945',
                'option_b' => 'Nilai-nilai liberal',
                'option_c' => 'Sistem parlementer',
                'option_d' => 'Tradisi kerajaan',
                'option_e' => 'Hukum internasional',
                'correct_answer' => 'a',
                'point' => 5
            ],
            [
                'exam_id' => 1,
                'question_text' => 'Kebijakan pembangunan rendah karbon merupakan komitmen Indonesia dalam...',
                'option_a' => 'Perubahan iklim global',
                'option_b' => 'Industrialisasi',
                'option_c' => 'Pertumbuhan ekonomi',
                'option_d' => 'Ekspor migas',
                'option_e' => 'Pembangunan infrastruktur',
                'correct_answer' => 'a',
                'point' => 5
            ],
            [
                'exam_id' => 1,
                'question_text' => 'Sistem ekonomi Indonesia berdasarkan UUD 1945 menganut prinsip...',
                'option_a' => 'Demokrasi Ekonomi',
                'option_b' => 'Liberalisme Ekonomi',
                'option_c' => 'Sosialisme',
                'option_d' => 'Kapitalisme',
                'option_e' => 'Mercantilisme',
                'correct_answer' => 'a',
                'point' => 5
            ],
            [
                'exam_id' => 1,
                'question_text' => 'Kebijakan Indonesia dalam menghadapi konflik regional didasarkan pada...',
                'option_a' => 'Politik Bebas Aktif',
                'option_b' => 'Aliansi Militer',
                'option_c' => 'Netralitas Mutlak',
                'option_d' => 'Intervensi Kemanusiaan',
                'option_e' => 'Deterensi Militer',
                'correct_answer' => 'a',
                'point' => 5
            ],
            [
                'exam_id' => 1,
                'question_text' => 'Pembangunan manusia Indonesia seutuhnya mencakup aspek...',
                'option_a' => 'Spiritual, intelektual, dan fisik',
                'option_b' => 'Ekonomi saja',
                'option_c' => 'Politik praktis',
                'option_d' => 'Teknologi',
                'option_e' => 'Militer',
                'correct_answer' => 'a',
                'point' => 5
            ],
            [
                'exam_id' => 1,
                'question_text' => 'Kebijakan desentralisasi dalam otonomi daerah bertujuan untuk...',
                'option_a' => 'Meningkatkan pelayanan publik',
                'option_b' => 'Memusatkan kekuasaan',
                'option_c' => 'Memperlemah daerah',
                'option_d' => 'Menciptakan negara federal',
                'option_e' => 'Mengurangi peran pusat',
                'correct_answer' => 'a',
                'point' => 5
            ],
            [
                'exam_id' => 1,
                'question_text' => 'Peran Indonesia dalam ASEAN adalah sebagai...',
                'option_a' => 'Founding Father dan pemimpin',
                'option_b' => 'Anggota biasa',
                'option_c' => 'Pengamat',
                'option_d' => 'Donor utama',
                'option_e' => 'Penengah konflik',
                'correct_answer' => 'a',
                'point' => 5
            ],
            [
                'exam_id' => 1,
                'question_text' => 'Kebijakan toleransi beragama di Indonesia dijamin oleh...',
                'option_a' => 'UUD 1945 Pasal 29',
                'option_b' => 'Keputusan Presiden',
                'option_c' => 'Perda tertentu',
                'option_d' => 'Hukum Adat',
                'option_e' => 'Konsensus internasional',
                'correct_answer' => 'a',
                'point' => 5
            ],
            [
                'exam_id' => 1,
                'question_text' => 'Pembangunan berkelanjutan di Indonesia mengedepankan...',
                'option_a' => 'Keseimbangan ekonomi, sosial, lingkungan',
                'option_b' => 'Pertumbuhan ekonomi maksimal',
                'option_c' => 'Eksploitasi sumber daya',
                'option_d' => 'Industrialisasi cepat',
                'option_e' => 'Modernisasi total',
                'correct_answer' => 'a',
                'point' => 5
            ],
            [
                'exam_id' => 1,
                'question_text' => 'Sistem pertahanan negara Indonesia menganut prinsip...',
                'option_a' => 'Pertahanan Semesta',
                'option_b' => 'Pertahanan Militer',
                'option_c' => 'Pertahanan Sipil',
                'option_d' => 'Pertahanan Regional',
                'option_e' => 'Pertahanan Aliansi',
                'correct_answer' => 'a',
                'point' => 5
            ],
            [
                'exam_id' => 1,
                'question_text' => 'Kebijakan nol toleransi terhadap korupsi menunjukkan komitmen...',
                'option_a' => 'Penegakan hukum dan good governance',
                'option_b' => 'Pembangunan ekonomi',
                'option_c' => 'Stabilitas politik',
                'option_d' => 'Reformasi birokrasi',
                'option_e' => 'Modernisasi administrasi',
                'correct_answer' => 'a',
                'point' => 5
            ],
            [
                'exam_id' => 1,
                'question_text' => 'Peran pemuda dalam pembangunan nasional diatur dalam...',
                'option_a' => 'UU Kepemudaan',
                'option_b' => 'Kebijakan Presiden',
                'option_c' => 'Peraturan Daerah',
                'option_d' => 'Konsensus Nasional',
                'option_e' => 'Program Internasional',
                'correct_answer' => 'a',
                'point' => 5
            ],
            [
                'exam_id' => 1,
                'question_text' => 'Kebijakan kemandirian pangan bertujuan untuk...',
                'option_a' => 'Ketahanan nasional',
                'option_b' => 'Ekspor pertanian',
                'option_c' => 'Industrialisasi',
                'option_d' => 'Urbanisasi',
                'option_e' => 'Modernisasi',
                'correct_answer' => 'a',
                'point' => 5
            ],
            [
                'exam_id' => 1,
                'question_text' => 'Sistem pendidikan nasional berdasarkan UU Sisdiknas bertujuan...',
                'option_a' => 'Mencerdaskan kehidupan bangsa',
                'option_b' => 'Menciptakan tenaga kerja',
                'option_c' => 'Modernisasi pendidikan',
                'option_d' => 'Globalisasi pendidikan',
                'option_e' => 'Komersialisasi pendidikan',
                'correct_answer' => 'a',
                'point' => 5
            ],
            [
                'exam_id' => 1,
                'question_text' => 'Kebijakan pengentasan kemiskinan merupakan implementasi sila...',
                'option_a' => 'Keadilan Sosial',
                'option_b' => 'Ketuhanan',
                'option_c' => 'Kemanusiaan',
                'option_d' => 'Persatuan',
                'option_e' => 'Kerakyatan',
                'correct_answer' => 'a',
                'point' => 5
            ],
            [
                'exam_id' => 1,
                'question_text' => 'Peran Indonesia dalam G20 menunjukkan...',
                'option_a' => 'Posisi strategis di dunia',
                'option_b' => 'Kekuatan militer',
                'option_c' => 'Kekuatan ekonomi',
                'option_d' => 'Pengaruh politik',
                'option_e' => 'Kepemimpinan regional',
                'correct_answer' => 'a',
                'point' => 5
            ],

            // ===== TES INTELEGENSI UMUM (TIU) - 35 SOAL =====
            [
                'exam_id' => 2,
                'question_text' => 'Jika 2x + 3y = 16 dan 3x + 2y = 19, maka nilai x - y adalah...',
                'option_a' => '1',
                'option_b' => '2',
                'option_c' => '3',
                'option_d' => '4',
                'option_e' => '5',
                'correct_answer' => 'c',
                'point' => 5
            ],
            [
                'exam_id' => 2,
                'question_text' => 'SEMANGAT : MOTIVASI = _____ : _____',
                'option_a' => 'Lelah : Istirahat',
                'option_b' => 'Haus : Minum',
                'option_c' => 'Lapar : Makan',
                'option_d' => 'Sakit : Obat',
                'option_e' => 'Bosan : Hiburan',
                'correct_answer' => 'b',
                'point' => 5
            ],
            [
                'exam_id' => 2,
                'question_text' => 'Sebuah toko memberikan diskon 20% untuk semua produk. Jika Rina membeli barang seharga Rp 200.000,-, berapa yang harus dibayar setelah diskon?',
                'option_a' => 'Rp 140.000,-',
                'option_b' => 'Rp 150.000,-',
                'option_c' => 'Rp 160.000,-',
                'option_d' => 'Rp 180.000,-',
                'option_e' => 'Rp 190.000,-',
                'correct_answer' => 'c',
                'point' => 5
            ],
            [
                'exam_id' => 2,
                'question_text' => 'KAKTUS : GURUN = _____ : _____',
                'option_a' => 'Pinguin : Kutub',
                'option_b' => 'Ikan : Laut',
                'option_c' => 'Burung : Udara',
                'option_d' => 'Cacing : Tanah',
                'option_e' => 'Beruang : Hutan',
                'correct_answer' => 'a',
                'point' => 5
            ],
            [
                'exam_id' => 2,
                'question_text' => 'Jika 4 pekerja dapat menyelesaikan proyek dalam 12 hari, berapa hari yang dibutuhkan 6 pekerja untuk menyelesaikan proyek yang sama?',
                'option_a' => '6 hari',
                'option_b' => '8 hari',
                'option_c' => '10 hari',
                'option_d' => '12 hari',
                'option_e' => '14 hari',
                'correct_answer' => 'b',
                'point' => 5
            ],
            [
                'exam_id' => 2,
                'question_text' => 'SEMINAR : PEMBICARA = KONSER : _____',
                'option_a' => 'Penyanyi',
                'option_b' => 'Penonton',
                'option_c' => 'Panggung',
                'option_d' => 'Tiket',
                'option_e' => 'Musik',
                'correct_answer' => 'a',
                'point' => 5
            ],
            [
                'exam_id' => 2,
                'question_text' => 'Sebuah segitiga memiliki alas 12 cm dan tinggi 8 cm. Berapa luas segitiga tersebut?',
                'option_a' => '48 cm²',
                'option_b' => '64 cm²',
                'option_c' => '72 cm²',
                'option_d' => '84 cm²',
                'option_e' => '96 cm²',
                'correct_answer' => 'a',
                'point' => 5
            ],
            [
                'exam_id' => 2,
                'question_text' => 'BUKU : PERPUSTAKAAN = _____ : _____',
                'option_a' => 'Uang : Bank',
                'option_b' => 'Makanan : Restoran',
                'option_c' => 'Obat : Apotik',
                'option_d' => 'Baju : Toko',
                'option_e' => 'Mobil : Garasi',
                'correct_answer' => 'a',
                'point' => 5
            ],
            [
                'exam_id' => 2,
                'question_text' => 'Jika a = 3, b = 4, dan c = 5, maka nilai dari (a² + b² - c²) adalah...',
                'option_a' => '0',
                'option_b' => '1',
                'option_c' => '2',
                'option_d' => '3',
                'option_e' => '4',
                'correct_answer' => 'a',
                'point' => 5
            ],
            [
                'exam_id' => 2,
                'question_text' => 'MATAHARI : TERANG = BULAN : _____',
                'option_a' => 'Gelap',
                'option_b' => 'Cahaya',
                'option_c' => 'Malam',
                'option_d' => 'Bintang',
                'option_e' => 'Purnama',
                'correct_answer' => 'b',
                'point' => 5
            ],
            [
                'exam_id' => 2,
                'question_text' => 'Sebuah mobil menempuh jarak 180 km dengan kecepatan 60 km/jam. Berapa waktu yang dibutuhkan?',
                'option_a' => '2 jam',
                'option_b' => '2.5 jam',
                'option_c' => '3 jam',
                'option_d' => '3.5 jam',
                'option_e' => '4 jam',
                'correct_answer' => 'c',
                'point' => 5
            ],
            [
                'exam_id' => 2,
                'question_text' => 'DOktor : STETOSKOP = _____ : _____',
                'option_a' => 'Montir : Obeng',
                'option_b' => 'Guru : Buku',
                'option_c' => 'Koki : Pisau',
                'option_d' => 'Pelukis : Kuas',
                'option_e' => 'Semua benar',
                'correct_answer' => 'e',
                'point' => 5
            ],
            [
                'exam_id' => 2,
                'question_text' => 'Jika 3x - 7 = 8, maka nilai x adalah...',
                'option_a' => '3',
                'option_b' => '4',
                'option_c' => '5',
                'option_d' => '6',
                'option_e' => '7',
                'correct_answer' => 'c',
                'point' => 5
            ],
            [
                'exam_id' => 2,
                'question_text' => 'AIR : HAUS = MAKANAN : _____',
                'option_a' => 'Lapar',
                'option_b' => 'Enak',
                'option_c' => 'Sehat',
                'option_d' => 'Kenyang',
                'option_e' => 'Lezat',
                'correct_answer' => 'a',
                'point' => 5
            ],
            [
                'exam_id' => 2,
                'question_text' => 'Sebuah persegi panjang memiliki panjang 15 cm dan lebar 10 cm. Keliling persegi panjang tersebut adalah...',
                'option_a' => '40 cm',
                'option_b' => '45 cm',
                'option_c' => '50 cm',
                'option_d' => '55 cm',
                'option_e' => '60 cm',
                'correct_answer' => 'c',
                'point' => 5
            ],
            [
                'exam_id' => 2,
                'question_text' => 'PENULIS : BUKU = KOMPOSER : _____',
                'option_a' => 'Lagu',
                'option_b' => 'Piano',
                'option_c' => 'Not',
                'option_d' => 'Konser',
                'option_e' => 'Musik',
                'correct_answer' => 'a',
                'point' => 5
            ],
            [
                'exam_id' => 2,
                'question_text' => 'Jika 2/5 dari suatu bilangan adalah 40, maka bilangan tersebut adalah...',
                'option_a' => '80',
                'option_b' => '100',
                'option_c' => '120',
                'option_d' => '140',
                'option_e' => '160',
                'correct_answer' => 'b',
                'point' => 5
            ],
            [
                'exam_id' => 2,
                'question_text' => 'MATA : MELIHAT = HIDUNG : _____',
                'option_a' => 'Membau',
                'option_b' => 'Mencium',
                'option_c' => 'Bernapas',
                'option_d' => 'Bersin',
                'option_e' => 'Menghirup',
                'correct_answer' => 'b',
                'point' => 5
            ],
            [
                'exam_id' => 2,
                'question_text' => 'Sebuah tabung memiliki jari-jari 7 cm dan tinggi 10 cm. Volume tabung tersebut adalah... (π = 22/7)',
                'option_a' => '1.540 cm³',
                'option_b' => '1.540 cm²',
                'option_c' => '1.540 cm',
                'option_d' => '1.540 liter',
                'option_e' => '1.540 m³',
                'correct_answer' => 'a',
                'point' => 5
            ],
            [
                'exam_id' => 2,
                'question_text' => 'KAYU : POHON = _____ : _____',
                'option_a' => 'Emas : Tambang',
                'option_b' => 'Besi : Bijih',
                'option_c' => 'Kertas : Pulp',
                'option_d' => 'Kaca : Pasir',
                'option_e' => 'Semua benar',
                'correct_answer' => 'e',
                'point' => 5
            ],
            [
                'exam_id' => 2,
                'question_text' => 'Jika 5 orang dapat menyelesaikan pekerjaan dalam 8 hari, berapa orang yang dibutuhkan untuk menyelesaikan pekerjaan yang sama dalam 4 hari?',
                'option_a' => '8 orang',
                'option_b' => '10 orang',
                'option_c' => '12 orang',
                'option_d' => '15 orang',
                'option_e' => '20 orang',
                'correct_answer' => 'b',
                'point' => 5
            ],
            [
                'exam_id' => 2,
                'question_text' => 'PANAS : DINGIN = TINGGI : _____',
                'option_a' => 'Rendah',
                'option_b' => 'Jauh',
                'option_c' => 'Dekat',
                'option_d' => 'Kecil',
                'option_e' => 'Pendek',
                'correct_answer' => 'a',
                'point' => 5
            ],
            [
                'exam_id' => 2,
                'question_text' => 'Sebuah lingkaran memiliki diameter 28 cm. Luas lingkaran tersebut adalah... (π = 22/7)',
                'option_a' => '616 cm²',
                'option_b' => '628 cm²',
                'option_c' => '638 cm²',
                'option_d' => '648 cm²',
                'option_e' => '658 cm²',
                'correct_answer' => 'a',
                'point' => 5
            ],
            [
                'exam_id' => 2,
                'question_text' => 'GURU : MENGAJAR = DOKTER : _____',
                'option_a' => 'Mengobati',
                'option_b' => 'Merawat',
                'option_c' => 'Mendiagnosa',
                'option_d' => 'Menyembuhkan',
                'option_e' => 'Semua benar',
                'correct_answer' => 'e',
                'point' => 5
            ],
            [
                'exam_id' => 2,
                'question_text' => 'Jika harga 3 buku adalah Rp 45.000,-, maka harga 5 buku adalah...',
                'option_a' => 'Rp 60.000,-',
                'option_b' => 'Rp 65.000,-',
                'option_c' => 'Rp 70.000,-',
                'option_d' => 'Rp 75.000,-',
                'option_e' => 'Rp 80.000,-',
                'correct_answer' => 'd',
                'point' => 5
            ],
            [
                'exam_id' => 2,
                'question_text' => 'MATAHARI : BUMI = BUMI : _____',
                'option_a' => 'Bulan',
                'option_b' => 'Mars',
                'option_c' => 'Jupiter',
                'option_d' => 'Venus',
                'option_e' => 'Saturnus',
                'correct_answer' => 'a',
                'point' => 5
            ],
            [
                'exam_id' => 2,
                'question_text' => 'Sebuah kubus memiliki volume 1.000 cm³. Panjang rusuk kubus tersebut adalah...',
                'option_a' => '8 cm',
                'option_b' => '9 cm',
                'option_c' => '10 cm',
                'option_d' => '11 cm',
                'option_e' => '12 cm',
                'correct_answer' => 'c',
                'point' => 5
            ],
            [
                'exam_id' => 2,
                'question_text' => 'API : PANAS = ES : _____',
                'option_a' => 'Dingin',
                'option_b' => 'Beku',
                'option_c' => 'Air',
                'option_d' => 'Mencair',
                'option_e' => 'Padat',
                'correct_answer' => 'a',
                'point' => 5
            ],
            [
                'exam_id' => 2,
                'question_text' => 'Jika 15% dari suatu bilangan adalah 75, maka bilangan tersebut adalah...',
                'option_a' => '400',
                'option_b' => '450',
                'option_c' => '500',
                'option_d' => '550',
                'option_e' => '600',
                'correct_answer' => 'c',
                'point' => 5
            ],
            [
                'exam_id' => 2,
                'question_text' => 'PENA : MENULIS = KUAS : _____',
                'option_a' => 'Melukis',
                'option_b' => 'Mengecat',
                'option_c' => 'Membersihkan',
                'option_d' => 'Memoles',
                'option_e' => 'Menggambar',
                'correct_answer' => 'a',
                'point' => 5
            ],
            [
                'exam_id' => 2,
                'question_text' => 'Sebuah trapesium memiliki panjang sisi sejajar 8 cm dan 12 cm, tinggi 5 cm. Luas trapesium tersebut adalah...',
                'option_a' => '40 cm²',
                'option_b' => '45 cm²',
                'option_c' => '50 cm²',
                'option_d' => '55 cm²',
                'option_e' => '60 cm²',
                'correct_answer' => 'c',
                'point' => 5
            ],
            [
                'exam_id' => 2,
                'question_text' => 'AYAM : TELUR = SAPI : _____',
                'option_a' => 'Susu',
                'option_b' => 'Daging',
                'option_c' => 'Anak',
                'option_d' => 'Kulit',
                'option_e' => 'Tanduk',
                'correct_answer' => 'a',
                'point' => 5
            ],
            [
                'exam_id' => 2,
                'question_text' => 'Jika rata-rata dari 5, 7, 8, x, 10 adalah 8, maka nilai x adalah...',
                'option_a' => '8',
                'option_b' => '9',
                'option_c' => '10',
                'option_d' => '11',
                'option_e' => '12',
                'correct_answer' => 'c',
                'point' => 5
            ],
            [
                'exam_id' => 2,
                'question_text' => 'BUNGA : TAMAN = _____ : _____',
                'option_a' => 'Ikan : Kolam',
                'option_b' => 'Buku : Perpustakaan',
                'option_c' => 'Mobil : Garasi',
                'option_d' => 'Uang : Bank',
                'option_e' => 'Semua benar',
                'correct_answer' => 'e',
                'point' => 5
            ],

            // ===== TES KARAKTERISTIK PRIBADI (TKP) - 45 SOAL =====
            [
                'exam_id' => 3,
                'question_text' => 'Ketika atasan memberikan tugas yang menurut Anda terlalu sulit, Anda akan...',
                'option_a' => 'Menolak tugas tersebut dengan sopan',
                'option_b' => 'Menerima tugas dan berusaha sebaik mungkin',
                'option_c' => 'Meminta bantuan rekan kerja',
                'option_d' => 'Mencari informasi dan belajar terlebih dahulu',
                'option_e' => 'Mengatakan bahwa Anda butuh pelatihan',
                'correct_answer' => 'b',
                'point' => 5
            ],
            [
                'exam_id' => 3,
                'question_text' => 'Anda menemukan rekan kerja melakukan kesalahan dalam laporan. Tindakan Anda adalah...',
                'option_a' => 'Membiarkan saja karena bukan urusan Anda',
                'option_b' => 'Langsung melaporkan ke atasan',
                'option_c' => 'Mengingatkan dengan sopan dan membantu memperbaiki',
                'option_d' => 'Menyimpan bukti untuk jaga-jaga',
                'option_e' => 'Mengatakan kepada seluruh tim tentang kesalahan tersebut',
                'correct_answer' => 'c',
                'point' => 5
            ],
            [
                'exam_id' => 3,
                'question_text' => 'Ketika deadline pekerjaan sudah dekat tetapi hasil kerja belum maksimal, Anda akan...',
                'option_a' => 'Meminta perpanjangan waktu',
                'option_b' => 'Bekerja lembur untuk menyelesaikan',
                'option_c' => 'Menyerahkan yang ada saja',
                'option_d' => 'Menyalahkan kondisi yang tidak mendukung',
                'option_e' => 'Meminta bantuan atasan untuk meringankan beban',
                'correct_answer' => 'b',
                'point' => 5
            ],
            [
                'exam_id' => 3,
                'question_text' => 'Anda mendapat kritik pedas dari atasan di depan rekan-rekan. Reaksi Anda adalah...',
                'option_a' => 'Membalas dengan kata-kata yang sama pedasnya',
                'option_b' => 'Diam saja dan menyimpan rasa kesal',
                'option_c' => 'Menerima dengan lapang dada dan memperbaiki kesalahan',
                'option_d' => 'Mengundurkan diri dari pekerjaan',
                'option_e' => 'Mencari dukungan dari rekan kerja',
                'correct_answer' => 'c',
                'point' => 5
            ],
            [
                'exam_id' => 3,
                'question_text' => 'Dalam bekerja tim, Anda lebih memilih untuk...',
                'option_a' => 'Mengambil alih semua tugas penting',
                'option_b' => 'Membagi tugas sesuai kemampuan masing-masing',
                'option_c' => 'Mengikuti apa yang dikatakan pemimpin',
                'option_d' => 'Bekerja sendiri-sendiri',
                'option_e' => 'Menunggu instruksi yang jelas',
                'correct_answer' => 'b',
                'point' => 5
            ],
            [
                'exam_id' => 3,
                'question_text' => 'Ketika ada kesempatan untuk mengikuti pelatihan yang tidak berkaitan langsung dengan pekerjaan saat ini, Anda akan...',
                'option_a' => 'Menolak karena tidak relevan',
                'option_b' => 'Mengikuti jika disuruh atasan',
                'option_c' => 'Mengikuti untuk menambah pengetahuan',
                'option_d' => 'Mempertimbangkan manfaat jangka panjang',
                'option_e' => 'Mengikuti jika gratis dan waktunya pas',
                'correct_answer' => 'c',
                'point' => 5
            ],
            [
                'exam_id' => 3,
                'question_text' => 'Anda menemukan praktik tidak etis di tempat kerja. Tindakan Anda adalah...',
                'option_a' => 'Membiarkan karena bukan urusan Anda',
                'option_b' => 'Langsung melaporkan ke pihak berwajib',
                'option_c' => 'Membicarakan dengan rekan terdekat',
                'option_d' => 'Melaporkan melalui jalur yang benar',
                'option_e' => 'Mengumpulkan bukti terlebih dahulu',
                'correct_answer' => 'd',
                'point' => 5
            ],
            [
                'exam_id' => 3,
                'question_text' => 'Ketika menghadapi perubahan sistem kerja yang baru, Anda akan...',
                'option_a' => 'Menolak karena sudah nyaman dengan sistem lama',
                'option_b' => 'Menerima dengan terpaksa',
                'option_c' => 'Mempelajari dan beradaptasi dengan cepat',
                'option_d' => 'Berkonsultasi dengan atasan tentang kekhawatiran',
                'option_e' => 'Menunggu sampai dipaksa untuk berubah',
                'correct_answer' => 'c',
                'point' => 5
            ],
            [
                'exam_id' => 3,
                'question_text' => 'Anda memiliki ide untuk meningkatkan efisiensi kerja, tetapi atasan kurang merespons. Tindakan Anda adalah...',
                'option_a' => 'Menyimpan ide untuk diri sendiri',
                'option_b' => 'Mencoba menerapkan sendiri tanpa izin',
                'option_c' => 'Menyampaikan dengan data dan argumentasi yang lebih kuat',
                'option_d' => 'Mengeluh kepada rekan kerja',
                'option_e' => 'Mencari atasan yang lain untuk diajak kerjasama',
                'correct_answer' => 'c',
                'point' => 5
            ],
            [
                'exam_id' => 3,
                'question_text' => 'Dalam mengambil keputusan penting, Anda lebih mengedepankan...',
                'option_a' => 'Intuisi dan perasaan',
                'option_b' => 'Pertimbangan logis dan data',
                'option_c' => 'Saran dari orang lain',
                'option_d' => 'Pengalaman masa lalu',
                'option_e' => 'Kebijakan yang berlaku',
                'correct_answer' => 'b',
                'point' => 5
            ],
            [
                'exam_id' => 3,
                'question_text' => 'Ketika rekan kerja mengalami kesulitan, Anda akan...',
                'option_a' => 'Membiarkan saja karena itu urusannya',
                'option_b' => 'Menunggu sampai diminta bantuan',
                'option_c' => 'Segera menawarkan bantuan',
                'option_d' => 'Melaporkan ke atasan',
                'option_e' => 'Memberi saran dari jauh',
                'correct_answer' => 'c',
                'point' => 5
            ],
            [
                'exam_id' => 3,
                'question_text' => 'Anda diberikan target yang sangat tinggi oleh atasan. Sikap Anda adalah...',
                'option_a' => 'Langsung protes dan menolak',
                'option_b' => 'Menerima dengan ragu-ragu',
                'option_c' => 'Menerima dan berusaha mencapainya',
                'option_d' => 'Meminta target yang lebih realistis',
                'option_e' => 'Bekerja biasa saja',
                'correct_answer' => 'c',
                'point' => 5
            ],
            [
                'exam_id' => 3,
                'question_text' => 'Ketika terjadi konflik antar rekan kerja, Anda akan...',
                'option_a' => 'Ikut memihak salah satu pihak',
                'option_b' => 'Menjauhi dan tidak ikut campur',
                'option_c' => 'Mencoba menjadi penengah',
                'option_d' => 'Melaporkan ke atasan',
                'option_e' => 'Membiarkan mereka menyelesaikan sendiri',
                'correct_answer' => 'c',
                'point' => 5
            ],
            [
                'exam_id' => 3,
                'question_text' => 'Anda menemukan kesalahan dalam pekerjaan sendiri yang sudah selesai. Tindakan Anda adalah...',
                'option_a' => 'Membiarkan saja karena sudah selesai',
                'option_b' => 'Segera memperbaiki meski harus lembur',
                'option_c' => 'Meminta bantuan rekan untuk memperbaiki',
                'option_d' => 'Menyembunyikan kesalahan',
                'option_e' => 'Berkata itu bukan kesalahan Anda',
                'correct_answer' => 'b',
                'point' => 5
            ],
            [
                'exam_id' => 3,
                'question_text' => 'Dalam rapat, Anda memiliki pendapat yang berbeda dengan mayoritas. Sikap Anda adalah...',
                'option_a' => 'Diam saja mengikuti mayoritas',
                'option_b' => 'Tetap menyampaikan dengan sopan',
                'option_c' => 'Memaksa pendapat Anda',
                'option_d' => 'Meninggalkan rapat',
                'option_e' => 'Menyimpan untuk diri sendiri',
                'correct_answer' => 'b',
                'point' => 5
            ],
            [
                'exam_id' => 3,
                'question_text' => 'Ketika atasan memberikan pujian atas kerja keras Anda, Anda akan...',
                'option_a' => 'Menerima dengan sombong',
                'option_b' => 'Mengatakan itu berkat kerja tim',
                'option_c' => 'Minta kenaikan gaji',
                'option_d' => 'Menganggap itu wajar',
                'option_e' => 'Malu dan menolak pujian',
                'correct_answer' => 'b',
                'point' => 5
            ],
            [
                'exam_id' => 3,
                'question_text' => 'Anda harus memilih antara menyelesaikan pekerjaan tepat waktu atau menghasilkan karya terbaik. Pilihan Anda adalah...',
                'option_a' => 'Tepat waktu meski kurang maksimal',
                'option_b' => 'Karya terbaik meski terlambat',
                'option_c' => 'Mencari keseimbangan keduanya',
                'option_d' => 'Meminta pendapat atasan',
                'option_e' => 'Menyerahkan kepada tim',
                'correct_answer' => 'c',
                'point' => 5
            ],
            [
                'exam_id' => 3,
                'question_text' => 'Ketika ada lowongan promosi jabatan, Anda akan...',
                'option_a' => 'Langsung mendaftar tanpa persiapan',
                'option_b' => 'Mempersiapkan diri dengan baik lalu mendaftar',
                'option_c' => 'Menunggu ditawari',
                'option_d' => 'Tidak berminat',
                'option_e' => 'Mendukung rekan lain',
                'correct_answer' => 'b',
                'point' => 5
            ],
            [
                'exam_id' => 3,
                'question_text' => 'Anda melihat rekan kerja mengambil barang kantor untuk keperluan pribadi. Tindakan Anda...',
                'option_a' => 'Membiarkan saja',
                'option_b' => 'Ikut mengambil',
                'option_c' => 'Menegur dengan baik',
                'option_d' => 'Langsung melaporkan',
                'option_e' => 'Pura-pura tidak tahu',
                'correct_answer' => 'c',
                'point' => 5
            ],
            [
                'exam_id' => 3,
                'question_text' => 'Dalam bekerja, Anda lebih mementingkan...',
                'option_a' => 'Hasil akhir',
                'option_b' => 'Proses yang benar',
                'option_c' => 'Kedua-duanya',
                'option_d' => 'Kepuasan atasan',
                'option_e' => 'Kenyamanan kerja',
                'correct_answer' => 'c',
                'point' => 5
            ],
            [
                'exam_id' => 3,
                'question_text' => 'Ketika membuat kesalahan, Anda akan...',
                'option_a' => 'Menyembunyikan kesalahan',
                'option_b' => 'Mencari kambing hitam',
                'option_c' => 'Mengakui dan memperbaiki',
                'option_d' => 'Beralasan',
                'option_e' => 'Berkata itu bukan kesalahan Anda',
                'correct_answer' => 'c',
                'point' => 5
            ],
            [
                'exam_id' => 3,
                'question_text' => 'Anda diberikan tugas yang tidak sesuai dengan keahlian. Tindakan Anda...',
                'option_a' => 'Menolak mentah-mentah',
                'option_b' => 'Menerima dan belajar',
                'option_c' => 'Minta diganti',
                'option_d' => 'Bekerja asal-asalan',
                'option_e' => 'Mendelegasikan ke orang lain',
                'correct_answer' => 'b',
                'point' => 5
            ],
            [
                'exam_id' => 3,
                'question_text' => 'Ketika atasan tidak di tempat, Anda akan...',
                'option_a' => 'Bermalas-malasan',
                'option_b' => 'Bekerja seperti biasa',
                'option_c' => 'Pulang lebih awal',
                'option_d' => 'Mengerjakan hal lain',
                'option_e' => 'Memanfaatkan waktu untuk istirahat',
                'correct_answer' => 'b',
                'point' => 5
            ],
            [
                'exam_id' => 3,
                'question_text' => 'Anda memiliki teman dekat yang melakukan pelanggaran aturan. Sikap Anda...',
                'option_a' => 'Membela mati-matian',
                'option_b' => 'Membiarkan saja',
                'option_c' => 'Menasehati dengan baik',
                'option_d' => 'Melaporkan ke atasan',
                'option_e' => 'Ikut melanggar',
                'correct_answer' => 'c',
                'point' => 5
            ],
            [
                'exam_id' => 3,
                'question_text' => 'Dalam menyelesaikan masalah, Anda lebih mengutamakan...',
                'option_a' => 'Kepentingan pribadi',
                'option_b' => 'Kepentingan organisasi',
                'option_c' => 'Kepentingan atasan',
                'option_d' => 'Kepentingan rekan kerja',
                'option_e' => 'Keseimbangan semua pihak',
                'correct_answer' => 'e',
                'point' => 5
            ],
            [
                'exam_id' => 3,
                'question_text' => 'Ketika rekan kerja mendapat penghargaan, Anda akan...',
                'option_a' => 'Iri dan dengki',
                'option_b' => 'Acuh tak acuh',
                'option_c' => 'Memberi selamat dengan tulus',
                'option_d' => 'Mencari kesalahannya',
                'option_e' => 'Menganggap itu tidak adil',
                'correct_answer' => 'c',
                'point' => 5
            ],
            [
                'exam_id' => 3,
                'question_text' => 'Anda diminta bekerja pada hari libur. Sikap Anda...',
                'option_a' => 'Menolak dengan tegas',
                'option_b' => 'Menerima dengan senang hati',
                'option_c' => 'Menerima dengan syarat',
                'option_d' => 'Beralasan tidak bisa',
                'option_e' => 'Minta ganti rugi',
                'correct_answer' => 'b',
                'point' => 5
            ],
            [
                'exam_id' => 3,
                'question_text' => 'Ketika ada informasi penting, Anda akan...',
                'option_a' => 'Menyimpannya untuk diri sendiri',
                'option_b' => 'Memberitahu rekan terdekat',
                'option_c' => 'Menyebarkan ke semua orang',
                'option_d' => 'Menyampaikan melalui jalur resmi',
                'option_e' => 'Menunggu perintah atasan',
                'correct_answer' => 'd',
                'point' => 5
            ],
            [
                'exam_id' => 3,
                'question_text' => 'Anda melihat ada pemborosan dalam penggunaan sumber daya. Tindakan Anda...',
                'option_a' => 'Membiarkan saja',
                'option_b' => 'Melaporkan ke atasan',
                'option_c' => 'Menghemat sendiri',
                'option_d' => 'Mengingatkan rekan terkait',
                'option_e' => 'Membuat proposal penghematan',
                'correct_answer' => 'e',
                'point' => 5
            ],
            [
                'exam_id' => 3,
                'question_text' => 'Dalam bekerja, Anda lebih suka...',
                'option_a' => 'Bekerja sendiri',
                'option_b' => 'Bekerja dalam tim',
                'option_c' => 'Dipimpin atasan',
                'option_d' => 'Memimpin tim',
                'option_e' => 'Bergantung situasi',
                'correct_answer' => 'b',
                'point' => 5
            ],
            [
                'exam_id' => 3,
                'question_text' => 'Ketika menghadapi kegagalan, Anda akan...',
                'option_a' => 'Menyalahkan orang lain',
                'option_b' => 'Menyalahkan keadaan',
                'option_c' => 'Mengevaluasi dan mencoba lagi',
                'option_d' => 'Menyerah',
                'option_e' => 'Mencari alasan',
                'correct_answer' => 'c',
                'point' => 5
            ],
            [
                'exam_id' => 3,
                'question_text' => 'Anda diberikan wewenang untuk mengambil keputusan. Sikap Anda...',
                'option_a' => 'Menggunakan sebesar-besarnya',
                'option_b' => 'Berkonsultasi dulu dengan atasan',
                'option_c' => 'Menggunakan dengan bijak',
                'option_d' => 'Tidak berani mengambil keputusan',
                'option_e' => 'Mendelegasikan ke bawahan',
                'correct_answer' => 'c',
                'point' => 5
            ],
            [
                'exam_id' => 3,
                'question_text' => 'Ketika ada program baru di kantor, Anda akan...',
                'option_a' => 'Menunggu dipaksa mengikuti',
                'option_b' => 'Aktif mencari informasi',
                'option_c' => 'Mengikuti jika diwajibkan',
                'option_d' => 'Tidak tertarik',
                'option_e' => 'Mencari kelemahan program',
                'correct_answer' => 'b',
                'point' => 5
            ],
            [
                'exam_id' => 3,
                'question_text' => 'Anda memiliki kemampuan lebih dibanding rekan kerja. Sikap Anda...',
                'option_a' => 'Sombong dan merasa paling hebat',
                'option_b' => 'Membantu rekan yang kurang mampu',
                'option_c' => 'Menyembunyikan kemampuan',
                'option_d' => 'Memamerkan kemampuan',
                'option_e' => 'Memanfaatkan untuk kepentingan pribadi',
                'correct_answer' => 'b',
                'point' => 5
            ],
            [
                'exam_id' => 3,
                'question_text' => 'Dalam menghadapi tekanan kerja, Anda akan...',
                'option_a' => 'Mengeluh terus menerus',
                'option_b' => 'Bekerja dengan tenang',
                'option_c' => 'Minta bantuan orang lain',
                'option_d' => 'Menghindar dari tugas',
                'option_e' => 'Berkata tidak mampu',
                'correct_answer' => 'b',
                'point' => 5
            ],
            [
                'exam_id' => 3,
                'question_text' => 'Ketika atasan membuat keputusan yang menurut Anda kurang tepat, Anda akan...',
                'option_a' => 'Menerima dengan patuh',
                'option_b' => 'Menyampaikan pendapat dengan sopan',
                'option_c' => 'Membantah secara terbuka',
                'option_d' => 'Menggerutu di belakang',
                'option_e' => 'Mengabaikan keputusan',
                'correct_answer' => 'b',
                'point' => 5
            ],
            [
                'exam_id' => 3,
                'question_text' => 'Anda ditawari pekerjaan sampingan yang menguntungkan. Sikap Anda...',
                'option_a' => 'Menerima tanpa pikir panjang',
                'option_b' => 'Menolak karena sibuk',
                'option_c' => 'Mempertimbangkan dampaknya terhadap pekerjaan utama',
                'option_d' => 'Minta izin atasan',
                'option_e' => 'Mengerjakan diam-diam',
                'correct_answer' => 'c',
                'point' => 5
            ],
            [
                'exam_id' => 3,
                'question_text' => 'Ketika ada kesempatan untuk berkembang, Anda akan...',
                'option_a' => 'Menunggu disuruh',
                'option_b' => 'Memanfaatkan sebaik-baiknya',
                'option_c' => 'Ragu-ragu',
                'option_d' => 'Tidak tertarik',
                'option_e' => 'Membiarkan orang lain',
                'correct_answer' => 'b',
                'point' => 5
            ],
            [
                'exam_id' => 3,
                'question_text' => 'Dalam bekerja, Anda selalu...',
                'option_a' => 'Mengutamakan kualitas',
                'option_b' => 'Mengejar kuantitas',
                'option_c' => 'Menyeimbangkan keduanya',
                'option_d' => 'Mengikuti perintah',
                'option_e' => 'Bekerja sesuai mood',
                'correct_answer' => 'c',
                'point' => 5
            ],
            [
                'exam_id' => 3,
                'question_text' => 'Ketika ada masalah dengan rekan kerja, Anda akan...',
                'option_a' => 'Menghindar',
                'option_b' => 'Konfrontasi langsung',
                'option_c' => 'Mencari solusi bersama',
                'option_d' => 'Melaporkan ke atasan',
                'option_e' => 'Diam saja',
                'correct_answer' => 'c',
                'point' => 5
            ],
            [
                'exam_id' => 3,
                'question_text' => 'Anda mengetahui ada kebocoran informasi penting. Tindakan Anda...',
                'option_a' => 'Memanfaatkan untuk keuntungan pribadi',
                'option_b' => 'Menyebarkan ke rekan lain',
                'option_c' => 'Segera melaporkan ke atasan',
                'option_d' => 'Diam saja',
                'option_e' => 'Mencari tahu sumbernya dulu',
                'correct_answer' => 'c',
                'point' => 5
            ],
            [
                'exam_id' => 3,
                'question_text' => 'Dalam melayani masyarakat, Anda akan...',
                'option_a' => 'Bekerja sesuai prosedur',
                'option_b' => 'Memberikan pelayanan terbaik',
                'option_c' => 'Bekerja seadanya',
                'option_d' => 'Mementingkan atasan',
                'option_e' => 'Mengutamakan yang bayar',
                'correct_answer' => 'b',
                'point' => 5
            ]
        ];

        foreach ($questions as $question) {
            Question::create([
                'exam_id' => $question['exam_id'],
                'question_text' => $question['question_text'],
                'option_a' => $question['option_a'],
                'option_b' => $question['option_b'],
                'option_c' => $question['option_c'],
                'option_d' => $question['option_d'],
                'option_e' => $question['option_e'],
                'correct_answer' => $question['correct_answer'],
                'point' => $question['point'],
            ]);
        }

        // Create sample user for testing
        User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'nik' => '1234567890123456',
            'phone' => '081234567890',
            'birth_date' => '1995-01-01',
            'gender' => 'L',
            'address' => 'Jl. Test No. 123, Jakarta',
            'password' => bcrypt('12345678'),
        ]);

        // Create admin user
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@cpns.com',
            'nik' => '1111111111111111',
            'phone' => '081111111111',
            'birth_date' => '1990-01-01',
            'gender' => 'L',
            'address' => 'Jl. Admin No. 1, Jakarta',
            'password' => bcrypt('12345678'),
            'is_admin' => true,
        ]);
    }
}
