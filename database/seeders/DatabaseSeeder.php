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
        $twk = Exam::create([
            'title' => 'Tes Wawasan Kebangsaan (TWK)',
            'description' => 'Tes yang mengukur pengetahuan dan kemampuan mengimplementasikan nilai-nilai 4 pilar kebangsaan Indonesia (Pancasila, UUD 1945, NKRI, dan Bhinneka Tunggal Ika)',
            'type' => 'TWK',
            'duration_minutes' => 100,
            'total_questions' => 30,
            'passing_grade' => 65,
            'is_active' => true,
        ]);

        $tiu = Exam::create([
            'title' => 'Tes Intelegensia Umum (TIU)',
            'description' => 'Tes yang mengukur kemampuan verbal (sinonim, antonim, analogi), numerik (aritmatika, deret angka), dan logika berpikir (penalaran analitis)',
            'type' => 'TIU',
            'duration_minutes' => 100,
            'total_questions' => 35,
            'passing_grade' => 80,
            'is_active' => true,
        ]);

        $tkp = Exam::create([
            'title' => 'Tes Karakteristik Pribadi (TKP)',
            'description' => 'Tes yang mengukur karakteristik kepribadian yang relevan dengan tugas dan fungsi jabatan ASN (integritas, kejujuran, profesionalisme, dll)',
            'type' => 'TKP',
            'duration_minutes' => 100,
            'total_questions' => 45,
            'passing_grade' => 143,
            'is_active' => true,
        ]);

        // ==================== SOAL TWK (30 SOAL) ====================
        $twkQuestions = [
            // Soal Pancasila
            [
                'question_text' => 'Pancasila sebagai dasar negara Indonesia tercantum dalam...',
                'option_a' => 'UUD 1945 Pasal 1',
                'option_b' => 'Pembukaan UUD 1945 Alinea ke-4',
                'option_c' => 'Pembukaan UUD 1945 Alinea ke-3',
                'option_d' => 'UUD 1945 Pasal 33',
                'option_e' => 'Tap MPR No. XVIII/MPR/1998',
                'correct_answer' => 'B',
            ],
            [
                'question_text' => 'Hari Lahir Pancasila diperingati setiap tanggal...',
                'option_a' => '17 Agustus',
                'option_b' => '1 Juni',
                'option_c' => '18 Agustus',
                'option_d' => '20 Mei',
                'option_e' => '28 Oktober',
                'correct_answer' => 'B',
            ],
            [
                'question_text' => 'Sila pertama Pancasila "Ketuhanan Yang Maha Esa" mengandung makna bahwa Indonesia adalah negara yang...',
                'option_a' => 'Mengakui satu agama resmi',
                'option_b' => 'Berdasarkan hukum agama',
                'option_c' => 'Mengakui keberadaan Tuhan dan kebebasan beragama',
                'option_d' => 'Menganut teokrasi',
                'option_e' => 'Memisahkan agama dan negara',
                'correct_answer' => 'C',
            ],
            [
                'question_text' => 'Konsep "Keadilan sosial bagi seluruh rakyat Indonesia" merupakan pengamalan dari sila...',
                'option_a' => 'Pertama',
                'option_b' => 'Kedua',
                'option_c' => 'Ketiga',
                'option_d' => 'Keempat',
                'option_e' => 'Kelima',
                'correct_answer' => 'E',
            ],

            // Soal UUD 1945
            [
                'question_text' => 'Sistem pemerintahan Indonesia menurut UUD 1945 adalah...',
                'option_a' => 'Sistem Parlementer',
                'option_b' => 'Sistem Presidensial',
                'option_c' => 'Sistem Campuran',
                'option_d' => 'Sistem Komunis',
                'option_e' => 'Sistem Liberal',
                'correct_answer' => 'B',
            ],
            [
                'question_text' => 'Amandemen UUD 1945 pertama kali dilakukan pada tahun...',
                'option_a' => '1999',
                'option_b' => '2000',
                'option_c' => '2001',
                'option_d' => '2002',
                'option_e' => '2003',
                'correct_answer' => 'A',
            ],
            [
                'question_text' => 'Lembaga negara yang memiliki kewenangan untuk mengubah UUD 1945 adalah...',
                'option_a' => 'Presiden',
                'option_b' => 'DPR',
                'option_c' => 'MPR',
                'option_d' => 'MK',
                'option_e' => 'MA',
                'correct_answer' => 'C',
            ],
            [
                'question_text' => 'Pasal 33 UUD 1945 mengatur tentang...',
                'option_a' => 'Hak Asasi Manusia',
                'option_b' => 'Perekonomian Nasional',
                'option_c' => 'Pertahanan Negara',
                'option_d' => 'Pemerintahan Daerah',
                'option_e' => 'Pendidikan Nasional',
                'correct_answer' => 'B',
            ],

            // Soal NKRI
            [
                'question_text' => 'Bentuk negara Indonesia adalah...',
                'option_a' => 'Negara Federal',
                'option_b' => 'Negara Serikat',
                'option_c' => 'Negara Kesatuan',
                'option_d' => 'Negara Konfederasi',
                'option_e' => 'Negara Dominion',
                'correct_answer' => 'C',
            ],
            [
                'question_text' => 'Wilayah Indonesia secara geografis terletak di antara dua benua, yaitu...',
                'option_a' => 'Asia dan Australia',
                'option_b' => 'Asia dan Afrika',
                'option_c' => 'Australia dan Amerika',
                'option_d' => 'Asia dan Eropa',
                'option_e' => 'Australia dan Afrika',
                'correct_answer' => 'A',
            ],
            [
                'question_text' => 'Semboyan "Bhinneka Tunggal Ika" pertama kali dicetuskan oleh...',
                'option_a' => 'Mpu Tantular',
                'option_b' => 'Mpu Prapanca',
                'option_c' => 'Mpu Sindok',
                'option_d' => 'Mpu Panuluh',
                'option_e' => 'Mpu Sedah',
                'correct_answer' => 'A',
            ],
            [
                'question_text' => 'Bhinneka Tunggal Ika yang menjadi semboyan negara Indonesia berasal dari kitab...',
                'option_a' => 'Sutasoma',
                'option_b' => 'Negarakertagama',
                'option_c' => 'Arjunawiwaha',
                'option_d' => 'Pararaton',
                'option_e' => 'Kakawin',
                'correct_answer' => 'A',
            ],

            // Soal Sejarah Nasional
            [
                'question_text' => 'Peristiwa Sumpah Pemuda terjadi pada tanggal...',
                'option_a' => '20 Mei 1908',
                'option_b' => '28 Oktober 1928',
                'option_c' => '17 Agustus 1945',
                'option_d' => '10 November 1945',
                'option_e' => '1 Juni 1945',
                'correct_answer' => 'B',
            ],
            [
                'question_text' => 'Organisasi pergerakan nasional pertama di Indonesia adalah...',
                'option_a' => 'Budi Utomo',
                'option_b' => 'Sarekat Islam',
                'option_c' => 'Indische Partij',
                'option_d' => 'Perhimpunan Indonesia',
                'option_e' => 'Partai Nasional Indonesia',
                'correct_answer' => 'A',
            ],
            [
                'question_text' => 'Proklamasi Kemerdekaan Indonesia dibacakan oleh...',
                'option_a' => 'Soekarno dan Mohammad Hatta',
                'option_b' => 'Soekarno saja',
                'option_c' => 'Mohammad Hatta saja',
                'option_d' => 'Soekarno dan Soeharto',
                'option_e' => 'Mohammad Hatta dan Soeharto',
                'correct_answer' => 'B',
            ],

            // Soal Kewarganegaraan
            [
                'question_text' => 'Hak untuk memilih dan dipilih dalam pemilihan umum merupakan hak...',
                'option_a' => 'Ekonomi',
                'option_b' => 'Politik',
                'option_c' => 'Sosial',
                'option_d' => 'Budaya',
                'option_e' => 'Hukum',
                'correct_answer' => 'B',
            ],
            [
                'question_text' => 'Kewajiban utama setiap warga negara adalah...',
                'option_a' => 'Membayar pajak',
                'option_b' => 'Menjaga keamanan',
                'option_c' => 'Menghormati hak orang lain',
                'option_d' => 'Mentaati hukum dan pemerintahan',
                'option_e' => 'Membela negara',
                'correct_answer' => 'D',
            ],
        ];

        // Tambahkan soal TWK hingga 30
        foreach ($twkQuestions as $q) {
            Question::create(array_merge(['exam_id' => $twk->id], $q));
        }

        // Soal TWK tambahan
        $additionalTwk = [
            'Pancasila sebagai pandangan hidup bangsa berarti...',
            'Kedaulatan berada di tangan rakyat merupakan implementasi sila...',
            'Lambang negara Indonesia adalah...',
            'Lagu kebangsaan Indonesia Raya pertama kali dikumandangkan pada...',
            'Wawasan Nusantara mencakup aspek...',
            'Pembukaan UUD 1945 terdiri dari... alinea',
            'BPUPKI dibentuk pada tanggal...',
            'PPKI mengesahkan UUD 1945 pada tanggal...',
            'Bendera Merah Putih pertama kali dikibarkan pada...',
            'Bahasa Indonesia diikrarkan sebagai bahasa persatuan dalam...',
            'Pancasila sebagai ideologi terbuka artinya...',
            'Nilai-nilai Pancasila bersifat...',
            'Pancasila sebagai sumber dari segala sumber hukum tercantum dalam...',
            'Kebebasan beragama di Indonesia dijamin dalam UUD 1945 Pasal...',
        ];

        foreach ($additionalTwk as $index => $question) {
            Question::create([
                'exam_id' => $twk->id,
                'question_text' => $question,
                'option_a' => 'Pilihan A untuk soal ' . ($index + 1),
                'option_b' => 'Pilihan B untuk soal ' . ($index + 1),
                'option_c' => 'Pilihan C untuk soal ' . ($index + 1),
                'option_d' => 'Pilihan D untuk soal ' . ($index + 1),
                'option_e' => 'Pilihan E untuk soal ' . ($index + 1),
                'correct_answer' => ['A', 'B', 'C', 'D', 'E'][array_rand(['A', 'B', 'C', 'D', 'E'])],
            ]);
        }

        // ==================== SOAL TIU (35 SOAL) ====================
        $tiuQuestions = [
            // Soal Verbal (Sinonim)
            [
                'question_text' => 'Sinonim dari kata EKSPRESI adalah...',
                'option_a' => 'Ungkapan',
                'option_b' => 'Perasaan',
                'option_c' => 'Ekspresif',
                'option_d' => 'Penampilan',
                'option_e' => 'Gerakan',
                'correct_answer' => 'A',
            ],
            [
                'question_text' => 'Antonim dari kata OPTIMIS adalah...',
                'option_a' => 'Pesimis',
                'option_b' => 'Gembira',
                'option_c' => 'Senang',
                'option_d' => 'Bahagia',
                'option_e' => 'Ceria',
                'correct_answer' => 'A',
            ],
            [
                'question_text' => 'Sinonim dari kata AKURAT adalah...',
                'option_a' => 'Tepat',
                'option_b' => 'Cepat',
                'option_c' => 'Lambat',
                'option_d' => 'Salah',
                'option_e' => 'Kasar',
                'correct_answer' => 'A',
            ],

            // Soal Verbal (Antonim)
            [
                'question_text' => 'Antonim dari kata KOMPLEKS adalah...',
                'option_a' => 'Sederhana',
                'option_b' => 'Rumit',
                'option_c' => 'Sulit',
                'option_d' => 'Berat',
                'option_e' => 'Panjang',
                'correct_answer' => 'A',
            ],
            [
                'question_text' => 'Antonim dari kata PRODUKTIF adalah...',
                'option_a' => 'Improduktif',
                'option_b' => 'Aktif',
                'option_c' => 'Kreatif',
                'option_d' => 'Efisien',
                'option_e' => 'Cepat',
                'correct_answer' => 'A',
            ],

            // Soal Analogi
            [
                'question_text' => 'ANALOGI = PERBANDINGAN, maka DEDUKSI = ...',
                'option_a' => 'Kesimpulan',
                'option_b' => 'Penjelasan',
                'option_c' => 'Perhitungan',
                'option_d' => 'Perkiraan',
                'option_e' => 'Pengurangan',
                'correct_answer' => 'A',
            ],
            [
                'question_text' => 'MATAHARI : TERANG = BULAN : ...',
                'option_a' => 'Gelap',
                'option_b' => 'Cahaya',
                'option_c' => 'Bintang',
                'option_d' => 'Malam',
                'option_e' => 'Redup',
                'correct_answer' => 'E',
            ],
            [
                'question_text' => 'GURU : MENGAJAR = DOKTER : ...',
                'option_a' => 'Obat',
                'option_b' => 'Rumah Sakit',
                'option_c' => 'Merawat',
                'option_d' => 'Stetoskop',
                'option_e' => 'Pasien',
                'correct_answer' => 'C',
            ],

            // Soal Numerik (Aritmatika)
            [
                'question_text' => 'Jika harga 5 buku adalah Rp 75.000, berapa harga 8 buku?',
                'option_a' => 'Rp 100.000',
                'option_b' => 'Rp 110.000',
                'option_c' => 'Rp 120.000',
                'option_d' => 'Rp 125.000',
                'option_e' => 'Rp 130.000',
                'correct_answer' => 'C',
            ],
            [
                'question_text' => '15% dari 2000 adalah...',
                'option_a' => '150',
                'option_b' => '200',
                'option_c' => '250',
                'option_d' => '300',
                'option_e' => '350',
                'correct_answer' => 'D',
            ],
            [
                'question_text' => 'Jika a = 5, b = 3, maka nilai dari 2a² - 3b adalah...',
                'option_a' => '37',
                'option_b' => '41',
                'option_c' => '45',
                'option_d' => '49',
                'option_e' => '53',
                'correct_answer' => 'B',
            ],

            // Soal Deret Angka
            [
                'question_text' => 'Lengkapi deret: 2, 6, 12, 20, 30, ...',
                'option_a' => '40',
                'option_b' => '42',
                'option_c' => '44',
                'option_d' => '46',
                'option_e' => '48',
                'correct_answer' => 'B',
            ],
            [
                'question_text' => 'Lengkapi deret: 3, 8, 15, 24, 35, ...',
                'option_a' => '46',
                'option_b' => '48',
                'option_c' => '50',
                'option_d' => '52',
                'option_e' => '54',
                'correct_answer' => 'B',
            ],
            [
                'question_text' => 'Lengkapi deret: 1, 4, 9, 16, 25, ...',
                'option_a' => '36',
                'option_b' => '49',
                'option_c' => '64',
                'option_d' => '81',
                'option_e' => '100',
                'correct_answer' => 'A',
            ],

            // Soal Logika
            [
                'question_text' => 'Jika semua A adalah B, dan semua B adalah C, maka...',
                'option_a' => 'Semua A adalah C',
                'option_b' => 'Semua C adalah A',
                'option_c' => 'Tidak ada hubungan',
                'option_d' => 'Beberapa A adalah C',
                'option_e' => 'Tidak dapat disimpulkan',
                'correct_answer' => 'A',
            ],
            [
                'question_text' => 'Jika hari ini hari Senin, maka 100 hari lagi adalah hari...',
                'option_a' => 'Rabu',
                'option_b' => 'Kamis',
                'option_c' => 'Jumat',
                'option_d' => 'Sabtu',
                'option_e' => 'Minggu',
                'correct_answer' => 'A',
            ],
        ];

        foreach ($tiuQuestions as $q) {
            Question::create(array_merge(['exam_id' => $tiu->id], $q));
        }

        // Soal TIU tambahan
        $additionalTiu = [
            'Sinonim dari kata PROFESIONAL adalah...',
            'Antonim dari kata EFISIEN adalah...',
            'PENA : MENULIS = GUNTING : ...',
            'AIR : HAUS = MAKANAN : ...',
            '25% dari 800 adalah...',
            'Jika 3x + 5 = 20, maka x = ...',
            'Lengkapi deret: 5, 10, 20, 40, ...',
            'Lengkapi deret: 2, 4, 8, 16, ...',
            'Jika sebagian A adalah B, dan semua B adalah C, maka...',
            'Semua dokter adalah lulusan SMA. Sebagian lulusan SMA adalah guru. Maka...',
            'Harga 1 lusin pensil Rp 24.000. Harga 5 pensil adalah...',
            'Waktu di Jakarta 3 jam lebih cepat dari Arab Saudi. Jika di Arab Saudi jam 10.00, di Jakarta jam...',
            'Usia A : B = 2 : 3. Jika jumlah usia mereka 25 tahun, usia A adalah...',
            'Sebuah mobil menempuh 120 km dengan 8 liter bensin. Untuk menempuh 180 km diperlukan bensin...',
            'Jika 4 pekerja menyelesaikan pekerjaan dalam 6 hari, maka 8 pekerja menyelesaikan dalam...',
            'Nilai rata-rata 5 siswa adalah 80. Jika ditambah satu siswa dengan nilai 90, rata-rata menjadi...',
            'Luas persegi panjang dengan panjang 12 cm dan lebar 8 cm adalah...',
            'Keliling lingkaran dengan diameter 14 cm adalah...',
            'Volume kubus dengan sisi 5 cm adalah...',
        ];

        foreach ($additionalTiu as $index => $question) {
            Question::create([
                'exam_id' => $tiu->id,
                'question_text' => $question,
                'option_a' => 'Pilihan A untuk soal ' . ($index + 1),
                'option_b' => 'Pilihan B untuk soal ' . ($index + 1),
                'option_c' => 'Pilihan C untuk soal ' . ($index + 1),
                'option_d' => 'Pilihan D untuk soal ' . ($index + 1),
                'option_e' => 'Pilihan E untuk soal ' . ($index + 1),
                'correct_answer' => ['A', 'B', 'C', 'D', 'E'][array_rand(['A', 'B', 'C', 'D', 'E'])],
            ]);
        }

        // ==================== SOAL TKP (45 SOAL) ====================
        $tkpQuestions = [
            // Soal Integritas
            [
                'question_text' => 'Ketika menemukan dompet berisi uang dan kartu identitas di jalan, Anda akan...',
                'option_a' => 'Mengambil uangnya lalu membuang dompet',
                'option_b' => 'Mengambil dompet dan mencoba mencari pemiliknya',
                'option_c' => 'Membiarkan saja karena bukan urusan Anda',
                'option_d' => 'Mengambil dan menyimpannya',
                'option_e' => 'Melaporkan ke pihak berwajib',
                'correct_answer' => 'B',
            ],
            [
                'question_text' => 'Atasan meminta Anda untuk memanipulasi data laporan, Anda akan...',
                'option_a' => 'Mentaati perintah atasan tanpa bertanya',
                'option_b' => 'Menolak dengan tegas dan melaporkan',
                'option_c' => 'Melakukan dengan berat hati',
                'option_d' => 'Meminta penjelasan dan menolak jika melanggar aturan',
                'option_e' => 'Mengajak rekan untuk bersama-sama menolak',
                'correct_answer' => 'D',
            ],

            // Soal Profesionalisme
            [
                'question_text' => 'Ketika menghadapi deadline yang ketat, sikap Anda adalah...',
                'option_a' => 'Panik dan meminta bantuan orang lain',
                'option_b' => 'Tetap tenang dan memprioritaskan pekerjaan',
                'option_c' => 'Menyerah dan mengakui ketidakmampuan',
                'option_d' => 'Mengerjakan asal jadi saja',
                'option_e' => 'Meminta perpanjangan waktu',
                'correct_answer' => 'B',
            ],
            [
                'question_text' => 'Anda mendapatkan tugas di luar job description, Anda akan...',
                'option_a' => 'Menolak karena bukan tanggung jawab Anda',
                'option_b' => 'Menerima dengan senang hati sebagai pembelajaran',
                'option_c' => 'Menerima dengan syarat ada tambahan gaji',
                'option_d' => 'Mengeluh kepada rekan kerja',
                'option_e' => 'Menyelesaikan seadanya saja',
                'correct_answer' => 'B',
            ],

            // Soal Kerjasama Tim
            [
                'question_text' => 'Dalam tim kerja, peran yang paling Anda sukai adalah...',
                'option_a' => 'Pemimpin yang mengarahkan',
                'option_b' => 'Anggota yang mengikuti',
                'option_c' => 'Kontributor aktif yang memberikan ide',
                'option_d' => 'Pengamat yang mengevaluasi',
                'option_e' => 'Pekerja mandiri',
                'correct_answer' => 'C',
            ],
            [
                'question_text' => 'Jika Anda melihat rekan kerja melakukan kesalahan, Anda akan...',
                'option_a' => 'Diam saja agar tidak menciptakan konflik',
                'option_b' => 'Melaporkan langsung ke atasan',
                'option_c' => 'Menegur secara langsung dengan keras',
                'option_d' => 'Memberitahu dengan baik dan membantu memperbaiki',
                'option_e' => 'Mengabaikan karena bukan urusan Anda',
                'correct_answer' => 'D',
            ],

            // Soal Pelayanan Publik
            [
                'question_text' => 'Ketika menghadapi masyarakat yang marah karena pelayanan, Anda akan...',
                'option_a' => 'Membalas dengan marah juga',
                'option_b' => 'Tetap tenang dan mendengarkan keluhannya',
                'option_c' => 'Mengabaikan dan melanjutkan pekerjaan',
                'option_d' => 'Meminta security mengusirnya',
                'option_e' => 'Langsung menutup pintu',
                'correct_answer' => 'B',
            ],
            [
                'question_text' => 'Ada warga yang datang di luar jam kerja membutuhkan bantuan, Anda akan...',
                'option_a' => 'Mengusirnya karena sudah lewat jam kerja',
                'option_b' => 'Meminta datang besok',
                'option_c' => 'Membantu sebisanya dengan senang hati',
                'option_d' => 'Meminta uang tambahan untuk lembur',
                'option_e' => 'Pura-pura tidak mendengar',
                'correct_answer' => 'C',
            ],

            // Soal Adaptasi
            [
                'question_text' => 'Anda dipindahkan ke unit kerja yang sama sekali baru, Anda akan...',
                'option_a' => 'Menolak dan meminta tetap di posisi lama',
                'option_b' => 'Menerima dengan terpaksa',
                'option_c' => 'Menerima dengan antusias dan belajar cepat',
                'option_d' => 'Mengeluh kepada rekan kerja',
                'option_e' => 'Bekerja asal-asalan',
                'correct_answer' => 'C',
            ],
            [
                'question_text' => 'Perusahaan menerapkan sistem kerja baru yang digital, Anda akan...',
                'option_a' => 'Menolak dan tetap menggunakan cara lama',
                'option_b' => 'Belajar dengan sungguh-sungguh',
                'option_c' => 'Minta diajari berulang kali',
                'option_d' => 'Menyuruh orang lain mengerjakan',
                'option_e' => 'Pura-pura tidak bisa',
                'correct_answer' => 'B',
            ],

            // Soal Pengembangan Diri
            [
                'question_text' => 'Dalam bekerja, yang paling memotivasi Anda adalah...',
                'option_a' => 'Gaji yang tinggi',
                'option_b' => 'Pengakuan dari atasan',
                'option_c' => 'Kesempatan berkembang dan belajar',
                'option_d' => 'Jabatan yang tinggi',
                'option_e' => 'Jam kerja yang fleksibel',
                'correct_answer' => 'C',
            ],
            [
                'question_text' => 'Ketika ada kesempatan training untuk pengembangan skill, Anda akan...',
                'option_a' => 'Menghindari karena takut tambahan kerja',
                'option_b' => 'Mengikuti dengan antusias',
                'option_c' => 'Mengikuti jika diwajibkan',
                'option_d' => 'Mencari alasan untuk tidak ikut',
                'option_e' => 'Mengikuti tapi tidak serius',
                'correct_answer' => 'B',
            ],

            // Soal Kreativitas
            [
                'question_text' => 'Ketika menghadapi masalah kerja yang rumit, Anda akan...',
                'option_a' => 'Menyerah dan minta orang lain menyelesaikan',
                'option_b' => 'Mencari solusi kreatif dan inovatif',
                'option_c' => 'Mengikuti cara yang biasa dilakukan',
                'option_d' => 'Menunggu instruksi atasan',
                'option_e' => 'Mengabaikan masalah tersebut',
                'correct_answer' => 'B',
            ],
            [
                'question_text' => 'Anda memiliki ide untuk meningkatkan efisiensi kerja, Anda akan...',
                'option_a' => 'Menyimpannya untuk diri sendiri',
                'option_b' => 'Menyampaikan kepada atasan dan rekan',
                'option_c' => 'Takut menyampaikan karena takut ditolak',
                'option_d' => 'Hanya menceritakan kepada teman dekat',
                'option_e' => 'Langsung menerapkan tanpa koordinasi',
                'correct_answer' => 'B',
            ],

            // Soal Mengelola Konflik
            [
                'question_text' => 'Ketika terjadi konflik dengan rekan kerja, Anda akan...',
                'option_a' => 'Menghindar dan tidak bertegur sapa',
                'option_b' => 'Mencari waktu untuk berdiskusi menyelesaikan masalah',
                'option_c' => 'Langsung melaporkan ke atasan',
                'option_d' => 'Membicarakan dengan rekan lain',
                'option_e' => 'Membalas dengan tindakan yang sama',
                'correct_answer' => 'B',
            ],
            [
                'question_text' => 'Anda mengetahui ada konflik antara dua rekan kerja, Anda akan...',
                'option_a' => 'Ikut memihak salah satu',
                'option_b' => 'Mencoba menjadi penengah',
                'option_c' => 'Pura-pura tidak tahu',
                'option_d' => 'Menambah masalah dengan gosip',
                'option_e' => 'Langsung melaporkan ke HRD',
                'correct_answer' => 'B',
            ],
        ];

        foreach ($tkpQuestions as $q) {
            Question::create(array_merge(['exam_id' => $tkp->id], $q));
        }

        // Soal TKP tambahan
        $additionalTkp = [
            'Ketika atasan memberikan kritik terhadap pekerjaan Anda, Anda akan...',
            'Anda melihat rekan kerja mengambil barang kantor untuk kepentingan pribadi, Anda akan...',
            'Ketika bekerja lembur tanpa tambahan insentif, sikap Anda...',
            'Anda diminta menggantikan rekan yang sakit, padahal pekerjaan Anda juga menumpuk...',
            'Ketika ada rapat penting tetapi Anda ada urusan keluarga, Anda akan...',
            'Anda mengetahui ada kecurangan dalam pengadaan barang, Anda akan...',
            'Ketika gagal mencapai target, Anda akan...',
            'Anda diberikan tugas yang sama sekali tidak Anda kuasai, Anda akan...',
            'Ketika ada promosi jabatan, tetapi yang dipilih rekan Anda, sikap Anda...',
            'Anda harus mengambil keputusan cepat dalam kondisi darurat, Anda akan...',
            'Ketima ada warga yang memberikan "imbalan" untuk mempercepat pelayanan, Anda...',
            'Anda menemukan dokumen rahasia di meja rekan yang lupa disimpan, Anda akan...',
            'Ketika atasan melakukan kesalahan dalam meeting, Anda akan...',
            'Anda diminta bekerja pada hari libur untuk acara keluarga atasan, Anda...',
            'Ketika rekan kerja meminta bantuan padahal Anda sedang sibuk, Anda akan...',
            'Anda mengetahui ada kebocoran informasi internal ke pihak luar, Anda akan...',
            'Ketika menghadapi client yang sangat demanding, Anda akan...',
            'Anda harus memilih antara menyelesaikan pekerjaan tepat waktu atau dengan kualitas terbaik...',
            'Ketima ada perubahan regulasi yang mempengaruhi pekerjaan Anda, Anda akan...',
            'Anda melihat atasan melakukan pelanggaran prosedur, Anda akan...',
            'Ketika diberikan tanggung jawab memimpin proyek pertama kali, Anda akan...',
            'Anda harus mengambil cuti karena keluarga sakit, tetapi pekerjaan menumpuk...',
            'Ketika rekan kerja tidak kooperatif dalam tim, Anda akan...',
            'Anda menemukan cara kerja yang lebih efisien dari prosedur resmi, Anda akan...',
            'Ketika atasan memberikan pujian atas kerja tim, padahal Anda yang paling berjasa...',
            'Anda harus bekerja dengan rekan yang memiliki kepribadian sulit, Anda akan...',
            'Ketika ada kesempatan untuk melanjutkan studi tetapi harus cuti lama...',
            'Anda diminta memberikan keterangan yang tidak sebenarnya untuk melindungi institusi...',
            'Ketika terjadi kesalahan dalam tim, tetapi atasan menuduh Anda sebagai penyebabnya...',
            'Anda mengetahui ada nepotisme dalam rekruitmen, Anda akan...',
        ];

        foreach ($additionalTkp as $index => $question) {
            Question::create([
                'exam_id' => $tkp->id,
                'question_text' => $question,
                'option_a' => 'Pilihan A untuk soal ' . ($index + 1),
                'option_b' => 'Pilihan B untuk soal ' . ($index + 1),
                'option_c' => 'Pilihan C untuk soal ' . ($index + 1),
                'option_d' => 'Pilihan D untuk soal ' . ($index + 1),
                'option_e' => 'Pilihan E untuk soal ' . ($index + 1),
                'correct_answer' => ['A', 'B', 'C', 'D', 'E'][array_rand(['A', 'B', 'C', 'D', 'E'])],
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