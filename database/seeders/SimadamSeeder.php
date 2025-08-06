<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SchoolProfile;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Payment;
use App\Models\ClassTeacher;
use App\Models\Letter;

class SimadamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create school profile
        SchoolProfile::create([
            'nama_madrasah' => 'MA Darul Muttaqien',
            'npsn' => '20513456',
            'alamat' => 'Jl. Pendidikan No. 123, Kota Serang, Banten',
            'no_telepon' => '0254-123456',
            'email' => 'info@madm.sch.id',
            'website' => 'https://www.madm.sch.id',
            'kepala_madrasah' => 'Dr. H. Ahmad Syarif, M.Pd.I',
            'visi' => 'Menjadi Madrasah Aliyah yang unggul dalam prestasi, berakhlak mulia, dan berwawasan global',
            'misi' => 'Menyelenggarakan pendidikan Islam yang berkualitas dengan mengintegrasikan ilmu agama dan umum',
            'sejarah' => 'MA Darul Muttaqien didirikan pada tahun 1985 sebagai lembaga pendidikan Islam yang fokus pada pengembangan karakter dan prestasi akademik siswa.'
        ]);

        // Create sample teachers
        $teachers = [
            [
                'nip' => '197501012005011001',
                'nama' => 'Dr. H. Muhammad Rizki, M.Pd',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1975-01-01',
                'tempat_lahir' => 'Jakarta',
                'alamat' => 'Jl. Guru No. 15, Jakarta',
                'no_telepon' => '081234567890',
                'bidang_studi' => 'Bahasa Arab',
                'status' => 'aktif',
            ],
            [
                'nip' => '198203152008012002',
                'nama' => 'Hj. Siti Fatimah, S.Ag, M.A',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '1982-03-15',
                'tempat_lahir' => 'Bandung',
                'alamat' => 'Jl. Pendidik No. 22, Bandung',
                'no_telepon' => '082345678901',
                'bidang_studi' => 'Fiqih',
                'status' => 'aktif',
            ],
            [
                'nip' => '197912252006021003',
                'nama' => 'Drs. Ahmad Fauzi, M.Pd',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1979-12-25',
                'tempat_lahir' => 'Surabaya',
                'alamat' => 'Jl. Ilmu No. 8, Surabaya',
                'no_telepon' => '083456789012',
                'bidang_studi' => 'Matematika',
                'status' => 'aktif',
            ],
        ];

        foreach ($teachers as $teacherData) {
            Teacher::create($teacherData);
        }

        // Create sample students
        $students = [
            [
                'nis' => '2024001',
                'nama' => 'Ahmad Rizki Pratama',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '2006-05-15',
                'tempat_lahir' => 'Jakarta',
                'alamat' => 'Jl. Mawar No. 10, Jakarta Selatan',
                'nama_orang_tua' => 'Bapak Suryanto',
                'no_telepon_orang_tua' => '081234567890',
                'kelas' => 'XI IPA 1',
                'status' => 'aktif',
            ],
            [
                'nis' => '2024002',
                'nama' => 'Siti Aisyah Nur',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '2006-08-20',
                'tempat_lahir' => 'Bandung',
                'alamat' => 'Jl. Melati No. 25, Bandung',
                'nama_orang_tua' => 'Ibu Sriati',
                'no_telepon_orang_tua' => '082345678901',
                'kelas' => 'XI IPS 1',
                'status' => 'aktif',
            ],
            [
                'nis' => '2024003',
                'nama' => 'Muhammad Fadli Rahman',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '2006-02-10',
                'tempat_lahir' => 'Surabaya',
                'alamat' => 'Jl. Anggrek No. 5, Surabaya',
                'nama_orang_tua' => 'Bapak Rahman',
                'no_telepon_orang_tua' => '083456789012',
                'kelas' => 'XI IPA 2',
                'status' => 'aktif',
            ],
            [
                'nis' => '2024004',
                'nama' => 'Fatimah Az-Zahra',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '2006-11-03',
                'tempat_lahir' => 'Medan',
                'alamat' => 'Jl. Dahlia No. 18, Medan',
                'nama_orang_tua' => 'Ibu Rohani',
                'no_telepon_orang_tua' => '084567890123',
                'kelas' => 'XI IPS 2',
                'status' => 'aktif',
            ],
            [
                'nis' => '2024005',
                'nama' => 'Zaid Ibn Harits',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '2006-07-12',
                'tempat_lahir' => 'Yogyakarta',
                'alamat' => 'Jl. Kenanga No. 30, Yogyakarta',
                'nama_orang_tua' => 'Bapak Harits',
                'no_telepon_orang_tua' => '085678901234',
                'kelas' => 'X IPA 1',
                'status' => 'aktif',
            ]
        ];

        foreach ($students as $studentData) {
            Student::create($studentData);
        }

        // Create sample payments
        $students = Student::all();
        foreach ($students as $student) {
            for ($i = 1; $i <= 3; $i++) {
                $month = now()->subMonths($i)->format('Y-m');
                Payment::create([
                    'student_id' => $student->id,
                    'bulan' => $month,
                    'jumlah' => 500000,
                    'tanggal_bayar' => now()->subMonths($i)->addDays(random_int(1, 28)),
                    'status' => 'lunas',
                    'keterangan' => 'Pembayaran SPP bulan ' . now()->subMonths($i)->format('F Y'),
                ]);
            }
        }

        // Create sample class teachers
        $teachers = Teacher::all();
        $classes = ['X IPA 1', 'X IPA 2', 'X IPS 1', 'XI IPA 1', 'XI IPS 1'];
        
        foreach ($classes as $index => $class) {
            if (isset($teachers[$index])) {
                ClassTeacher::create([
                    'teacher_id' => $teachers[$index]->id,
                    'kelas' => $class,
                    'tahun_ajaran' => '2023/2024',
                    'status' => 'aktif',
                ]);
            }
        }

        // Create sample letters
        Letter::create([
            'nomor_surat' => 'SM.001/XII/2023',
            'jenis' => 'masuk',
            'perihal' => 'Undangan Rapat Koordinasi Kepala Madrasah',
            'pengirim' => 'Kementerian Agama Kota Serang',
            'tanggal_surat' => now()->subDays(5),
            'tanggal_diterima' => now()->subDays(3),
            'keterangan' => 'Rapat koordinasi terkait kurikulum merdeka'
        ]);

        Letter::create([
            'nomor_surat' => 'SK.002/XII/2023',
            'jenis' => 'keluar',
            'perihal' => 'Surat Keterangan Siswa Aktif',
            'penerima' => 'Bank BNI Cabang Serang',
            'tanggal_surat' => now()->subDays(2),
            'keterangan' => 'Untuk keperluan pembukaan rekening tabungan siswa'
        ]);
    }
}