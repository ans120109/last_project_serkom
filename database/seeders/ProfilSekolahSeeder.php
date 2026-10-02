<?php

namespace Database\Seeders;

use App\Models\ProfilSekolah;
use Illuminate\Database\Seeder;

class ProfilSekolahSeeder extends Seeder
{
    public function run(): void
    {
        ProfilSekolah::updateOrCreate(
            ['id' => 1],
            [
                'nama_sekolah'  => 'SMA Cendekia Nusantara',
                'alamat'        => 'Jl. Pendidikan Raya No. 45, Tasikmalaya, Jawa Barat 46113',
                'jenjang'       => 'Sekolah Menengah Atas',
                'tahun_berdiri' => '1998',
                'jumlah_siswa'  => 850,
                'prestasi'      => "Juara 1 Lomba Fisika Tingkat Nasional\nJuara Harapan 1 Lomba Kimia Tingkat Internasional\nJuara 1 Lomba Matematika Tingkat Nasional",
                'tentang'       => 'SMA Cendekia Nusantara adalah sekolah menengah atas yang berdiri sejak tahun 1998, berkomitmen mencetak generasi muda yang unggul dalam akademik, berkarakter kuat, dan siap menghadapi tantangan global.',
                'visi'          => 'Menjadi sekolah unggulan yang melahirkan generasi berprestasi, berakhlak mulia, dan berwawasan global.',
                'misi'          => "Menyelenggarakan pembelajaran aktif, kreatif, dan menyenangkan.\nMengembangkan potensi akademik dan non-akademik siswa.\nMenanamkan nilai religius, disiplin, dan cinta tanah air.\nMeningkatkan kompetensi guru dan tenaga kependidikan.\nMembangun kerja sama dengan orang tua, masyarakat, dan dunia industri.",
            ]
        );
    }
}
