<?php

namespace Database\Seeders;

use App\Models\Registration;
use App\Models\RegistrationApplication;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RegistrationApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $registrations = Registration::all();
        
        $religions = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu', 'Lainnya'];
        $lastEducations = ['SD/MI', 'SMP/MTs', 'SMA/MA/SMK', 'D3', 'S1', 'S2', 'S3'];
        $occupations = [
            'PNS/ASN', 'TNI/Polri', 'Karyawan Swasta', 'Wirausaha', 
            'Dokter', 'Guru/Dosen', 'Petani/Nelayan', 'Buruh', 'Lainnya'
        ];
        $incomes = [
            'Kurang dari Rp 1.000.000', 'Rp 1.000.000 - Rp 3.000.000', 
            'Rp 3.000.001 - Rp 5.000.000', 'Rp 5.000.001 - Rp 10.000.000', 
            'Lebih dari Rp 10.000.000'
        ];
        
        foreach ($registrations as $registration) {
            // Generate between 30-100 applications for each registration
            $applicationsCount = rand(30, 100);
            
            for ($i = 0; $i < $applicationsCount; $i++) {
                // Generate a random date between registration start and end date
                $createdAt = Carbon::createFromTimestamp(
                    rand($registration->start_date->timestamp, $registration->end_date->timestamp)
                );
                
                // Generate random gender
                $gender = rand(0, 1) === 0 ? 'Laki-laki' : 'Perempuan';
                
                // Generate random birthday (for junior high graduates, around 14-16 years old)
                $birthYear = $registration->start_date->year - rand(14, 16);
                $birthMonth = rand(1, 12);
                $birthDay = rand(1, 28);
                $birthDate = Carbon::create($birthYear, $birthMonth, $birthDay);
                
                // Generate school status
                $schoolStatus = rand(0, 1) === 0 ? 'Negeri' : 'Swasta';
                
                // Generate NISN (10 digits)
                $nisn = (string) rand(1000000000, 9999999999);
                
                // Create registration ID format: REG-{year}-{registration_id}-{sequential_number}
                $sequential = DB::table('registration_applications')
                    ->where('registration_id', $registration->id)
                    ->count() + 1;
                $registrationId = "REG-{$registration->start_date->format('Y')}-{$registration->id}-" . str_pad($sequential, 4, '0', STR_PAD_LEFT);
                
                // Generate dummy file paths
                $baseFilePath = "storage/applications/{$registration->id}/{$nisn}";
                
                RegistrationApplication::create([
                    'registration_id' => $registration->id,
                    'full_name' => $this->generateFullName($gender),
                    'nisn' => $nisn,
                    'gender' => $gender,
                    'birth_place' => $this->getRandomCity(),
                    'birth_date' => $birthDate,
                    'religion' => $religions[array_rand($religions)],
                    'full_address' => $this->generateAddress(),
                    'current_domicile' => $this->generateAddress(),
                    'personal_phone_number' => '08' . rand(100000000, 999999999),
                    'email' => Str::slug(strtolower($this->generateFullName($gender)), '') . rand(10, 99) . '@gmail.com',
                    'father_name' => $this->generateFullName('Laki-laki'),
                    'mother_name' => $this->generateFullName('Perempuan'),
                    'parents_last_education' => $lastEducations[array_rand($lastEducations)],
                    'parents_occupation' => $occupations[array_rand($occupations)],
                    'parents_occupation_other' => null,
                    'parents_address' => null,
                    'parents_phone_number' => '08' . rand(100000000, 999999999),
                    'parents_income' => $incomes[array_rand($incomes)],
                    'previous_school_name' => 'SMP ' . $schoolStatus . ' ' . rand(1, 20) . ' ' . $this->getRandomCity(),
                    'previous_school_address' => $this->generateAddress(),
                    'school_status' => $schoolStatus,
                    'exam_participant_number' => rand(10000000, 99999999),
                    'birth_certificate_filepath' => $baseFilePath . '/birth_certificate.pdf',
                    'family_card_filepath' => $baseFilePath . '/family_card.pdf',
                    'report_card_filepath' => $baseFilePath . '/report_card.pdf',
                    'recent_photo_filepath' => $baseFilePath . '/photo.jpg',
                    'achievement_certificate_filepath' => rand(0, 1) ? $baseFilePath . '/achievement.pdf' : null,
                    'domicile_certificate_filepath' => rand(0, 1) ? $baseFilePath . '/domicile.pdf' : null,
                    'proof_of_payment_filepath' => $baseFilePath . '/payment.jpg',
                    'created_at' => $createdAt,
                    'updated_at' => $createdAt,
                ]);
            }
        }
    }
    
    private function generateFullName($gender)
    {
        $maleFirstNames = [
            'Agus', 'Budi', 'Cahyo', 'Dedi', 'Eko', 'Firman', 'Gunawan', 'Hadi',
            'Irwan', 'Joko', 'Krisna', 'Lukman', 'Muhammad', 'Noval', 'Oscar', 'Pram',
            'Rudi', 'Supri', 'Tono', 'Udin', 'Vicky', 'Wahyu', 'Yusuf', 'Zaki'
        ];
        
        $femaleFirstNames = [
            'Ani', 'Bintang', 'Citra', 'Dewi', 'Erni', 'Fitri', 'Gita', 'Hana',
            'Indah', 'Juwita', 'Kartika', 'Lina', 'Mawar', 'Nita', 'Olivia', 'Putri',
            'Ratna', 'Sari', 'Tari', 'Utami', 'Vina', 'Wulan', 'Yanti', 'Zahra'
        ];
        
        $lastNames = [
            'Saputra', 'Wijaya', 'Kusuma', 'Hidayat', 'Nugraha', 'Pratama', 'Putra', 'Santoso',
            'Wibowo', 'Setiawan', 'Susanto', 'Widodo', 'Gunawan', 'Iskandar', 'Pranowo', 'Sukmana',
            'Haryanto', 'Firmansyah', 'Hartono', 'Permadi', 'Suryanto', 'Budiman', 'Ibrahim', 'Mulya'
        ];
        
        $firstNames = $gender === 'Laki-laki' ? $maleFirstNames : $femaleFirstNames;
        
        $firstName = $firstNames[array_rand($firstNames)];
        
        // 70% chance to add a middle name for more variation
        if (rand(1, 10) <= 7) {
            $middleName = $firstNames[array_rand($firstNames)];
            $firstName .= ' ' . $middleName;
        }
        
        // 80% chance to add a last name
        if (rand(1, 10) <= 8) {
            $lastName = $lastNames[array_rand($lastNames)];
            return $firstName . ' ' . $lastName;
        }
        
        return $firstName;
    }
    
    private function getRandomCity()
    {
        $cities = [
            'Jakarta', 'Surabaya', 'Bandung', 'Medan', 'Semarang', 'Makassar', 'Palembang', 
            'Tangerang', 'Depok', 'Bekasi', 'Bogor', 'Malang', 'Yogyakarta', 'Solo', 
            'Denpasar', 'Banjarmasin', 'Balikpapan', 'Samarinda', 'Pontianak', 'Padang',
            'Pekanbaru', 'Lampung', 'Manado', 'Jambi', 'Bengkulu'
        ];
        
        return $cities[array_rand($cities)];
    }
    
    private function generateAddress()
    {
        $streetTypes = ['Jalan', 'Jl.'];
        $streetNames = [
            'Sudirman', 'Gatot Subroto', 'Ahmad Yani', 'Diponegoro', 'Pahlawan', 
            'Merdeka', 'Hayam Wuruk', 'Gajah Mada', 'Thamrin', 'Sisingamangaraja',
            'Wahid Hasyim', 'Pangeran Antasari', 'Imam Bonjol', 'Teuku Umar', 'Cendrawasih',
            'Pemuda', 'Veteran', 'Agus Salim', 'Cokroaminoto', 'Ki Hajar Dewantara'
        ];
        
        $houseNumber = rand(1, 200);
        $rt = rand(1, 20);
        $rw = rand(1, 15);
        
        $districts = [
            'Kebayoran Baru', 'Menteng', 'Tebet', 'Kemang', 'Cempaka Putih',
            'Tanjung Priok', 'Kebon Jeruk', 'Pluit', 'Pondok Indah', 'Kelapa Gading',
            'Cilandak', 'Bintaro', 'Cinere', 'Serpong', 'Ciputat'
        ];
        
        $city = $this->getRandomCity();
        $postalCode = rand(10000, 99999);
        
        return sprintf(
            '%s %s No. %d, RT %d/RW %d, %s, %s, %d',
            $streetTypes[array_rand($streetTypes)],
            $streetNames[array_rand($streetNames)],
            $houseNumber,
            $rt,
            $rw,
            $districts[array_rand($districts)],
            $city,
            $postalCode
        );
    }
}
