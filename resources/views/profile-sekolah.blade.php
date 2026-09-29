@extends('layout.app')

@section('title', 'Profil Sekolah')

@section('content')

<div class="profile-sekolah">

    <!-- HERO -->
    <section class="profile-hero">
        <div class="profile-hero-content">
            <span class="profile-label">PROFIL SEKOLAH</span>

            <h1>SMA Cendekia Nusantara</h1>

            <p>
                Mewujudkan generasi yang berkarakter, berprestasi,
                kreatif, dan siap menghadapi perkembangan zaman.
            </p>
        </div>
    </section>


    <!-- IDENTITAS SEKOLAH -->
    <section class="profile-section">
        <div class="section-title">
            <span>IDENTITAS</span>
            <h2>Profil Sekolah</h2>
        </div>

        <div class="profile-grid">

            <div class="profile-card">
                <div class="profile-icon">🏫</div>
                <div>
                    <h3>Nama Sekolah</h3>
                    <p>SMA Cendekia Nusantara</p>
                </div>
            </div>

            <div class="profile-card">
                <div class="profile-icon">📍</div>
                <div>
                    <h3>Alamat</h3>
                    <p>Jl. Pendidikan No. 10, Tasikmalaya</p>
                </div>
            </div>

            <div class="profile-card">
                <div class="profile-icon">🎓</div>
                <div>
                    <h3>Jenjang</h3>
                    <p>Sekolah Menengah Atas</p>
                </div>
            </div>

            <div class="profile-card">
                <div class="profile-icon">📅</div>
                <div>
                    <h3>Tahun Berdiri</h3>
                    <p>2010</p>
                </div>
            </div>

            <div class="profile-card">
                <div>
                    <div class="profile-icon">👥</div>
                    <h3>Jumlah Siswa</h3>
                    <p>1543</p>
                </div>
            </div>

            <div class="profile-card">
                <div>
                    <div class="profile-icon">🏆</div>
                    <h3>Prestasi</h3>
                    <p>Juara 1 Lomba Fisika Tingkat Nasional</p>
                    <p>Juara Harapan 1 Lomba Kimia Tingkat Internasional</p>
                    <p>Juara 1 Lomba Matematika Tingkat Nasional</p>
                </div>
            </div>

        </div>
    </section>


    <!-- TENTANG SEKOLAH -->
    <section class="profile-section profile-about">

        <div class="about-content">

            <div class="section-title">
                <span>TENTANG KAMI</span>
                <h2>Tentang Sekolah</h2>
            </div>

            <p>
                SMA Cendekia Nusantara merupakan lembaga pendidikan
                yang berkomitmen memberikan pendidikan berkualitas
                kepada peserta didik.
            </p>

            <p>
                Sekolah berupaya mengembangkan kemampuan akademik,
                keterampilan, karakter, kreativitas, serta kepedulian
                sosial siswa melalui berbagai kegiatan pembelajaran
                dan kegiatan sekolah.
            </p>

        </div>

        <div class="about-box">
            <div class="about-number">01</div>
            <h3>Pendidikan Berkualitas</h3>
            <p>
                Mendorong siswa untuk berkembang sesuai potensi
                dan minat masing-masing.
            </p>
        </div>

    </section>


    <!-- VISI MISI -->
    <section class="profile-section visi-misi">

        <div class="section-title center">
            <span>VISI & MISI</span>
            <h2>Visi dan Misi Sekolah</h2>
        </div>

        <div class="visi-misi-grid">

            <div class="visi-card">
                <div class="vm-icon">👁</div>

                <h3>Visi</h3>

                <p>
                    Menjadi sekolah yang unggul dalam prestasi,
                    berkarakter, berwawasan teknologi, serta mampu
                    menghasilkan generasi yang mandiri dan bertanggung jawab.
                </p>
            </div>


            <div class="misi-card">
                <div class="vm-icon">🎯</div>

                <h3>Misi</h3>

                <ul>
                    <li>
                        Meningkatkan kualitas pembelajaran.
                    </li>

                    <li>
                        Membentuk siswa yang berkarakter dan berintegritas.
                    </li>

                    <li>
                        Mengembangkan kreativitas dan keterampilan siswa.
                    </li>

                    <li>
                        Mendorong pemanfaatan teknologi dalam pendidikan.
                    </li>

                    <li>
                        Membangun lingkungan sekolah yang aman dan nyaman.
                    </li>
                </ul>
            </div>

        </div>

    </section>


    <!-- FASILITAS -->
    <section class="profile-section">

        <div class="section-title center">
            <span>FASILITAS</span>
            <h2>Fasilitas Sekolah</h2>
        </div>

        <div class="facility-grid">

            <div class="facility-card">
                <div class="facility-icon">💻</div>
                <h3>Laboratorium Komputer</h3>
                <p>
                    Fasilitas komputer untuk mendukung pembelajaran
                    teknologi dan informatika.
                </p>
            </div>

            <div class="facility-card">
                <div class="facility-icon">📚</div>
                <h3>Perpustakaan</h3>
                <p>
                    Menyediakan berbagai sumber belajar dan bahan bacaan
                    untuk siswa.
                </p>
            </div>

            <div class="facility-card">
                <div class="facility-icon">🧪</div>
                <h3>Laboratorium</h3>
                <p>
                    Fasilitas praktik untuk mendukung kegiatan pembelajaran.
                </p>
            </div>

            <div class="facility-card">
                <div class="facility-icon">⚽</div>
                <h3>Lapangan</h3>
                <p>
                    Area olahraga dan kegiatan ekstrakurikuler siswa.
                </p>
            </div>

        </div>

    </section>

</div>


<style>

.profile-sekolah {
    background: #f7f5ef;
    color: #0d1b3e;
    padding-bottom: 70px;
}


/* HERO */

.profile-hero {
    background: linear-gradient(
        135deg,
        #0d1b3e,
        #172b59
    );

    padding: 80px 8%;
    color: white;
}

.profile-hero-content {
    max-width: 900px;
    margin: auto;
}

.profile-label {
    color: #d99a22;
    font-weight: 700;
    letter-spacing: 2px;
    font-size: 14px;
}

.profile-hero h1 {
    font-size: 42px;
    margin: 15px 0;
}

.profile-hero p {
    max-width: 650px;
    line-height: 1.8;
    color: #e6eaf2;
}


/* SECTION */

.profile-section {
    max-width: 1100px;
    margin: auto;
    padding: 70px 25px;
}

.section-title {
    margin-bottom: 35px;
}

.section-title span {
    color: #d99a22;
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 2px;
}

.section-title h2 {
    margin-top: 8px;
    font-size: 30px;
    color: #0d1b3e;
}

.section-title.center {
    text-align: center;
}


/* IDENTITAS */

.profile-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}

.profile-card {
    display: flex;
    align-items: center;
    gap: 18px;
    background: white;
    padding: 22px;
    border-radius: 12px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.06);
}

.profile-icon {
    width: 55px;
    height: 55px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #fff3d6;
    border-radius: 12px;
    font-size: 25px;
}

.profile-card h3 {
    margin: 0 0 5px;
    font-size: 16px;
}

.profile-card p {
    margin: 0;
    color: #666;
}


/* ABOUT */

.profile-about {
    display: grid;
    grid-template-columns: 1.5fr 1fr;
    gap: 50px;
    align-items: center;
}

.about-content p {
    line-height: 1.8;
    color: #555;
}

.about-box {
    background: #0d1b3e;
    color: white;
    padding: 35px;
    border-radius: 15px;
}

.about-number {
    color: #d99a22;
    font-size: 35px;
    font-weight: bold;
}

.about-box h3 {
    font-size: 22px;
}

.about-box p {
    line-height: 1.7;
    color: #dce2ef;
}


/* VISI MISI */

.visi-misi {
    max-width: 1200px;
}

.visi-misi-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 25px;
}

.visi-card,
.misi-card {
    padding: 35px;
    border-radius: 15px;
    background: white;
    box-shadow: 0 5px 20px rgba(0,0,0,0.06);
}

.visi-card {
    border-top: 5px solid #d99a22;
}

.misi-card {
    border-top: 5px solid #0d1b3e;
}

.vm-icon {
    font-size: 35px;
    margin-bottom: 15px;
}

.visi-card h3,
.misi-card h3 {
    font-size: 22px;
    margin-bottom: 15px;
}

.visi-card p {
    color: #555;
    line-height: 1.8;
}

.misi-card ul {
    padding-left: 20px;
}

.misi-card li {
    margin-bottom: 12px;
    line-height: 1.6;
    color: #555;
}


/* FASILITAS */

.facility-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}

.facility-card {
    background: white;
    padding: 25px;
    border-radius: 12px;
    text-align: center;
    box-shadow: 0 5px 20px rgba(0,0,0,0.06);
}

.facility-icon {
    font-size: 40px;
    margin-bottom: 15px;
}

.facility-card h3 {
    font-size: 17px;
}

.facility-card p {
    color: #666;
    line-height: 1.6;
    font-size: 14px;
}


/* RESPONSIVE */

@media (max-width: 800px) {

    .profile-hero {
        padding: 60px 25px;
    }

    .profile-hero h1 {
        font-size: 32px;
    }

    .profile-grid,
    .visi-misi-grid,
    .profile-about {
        grid-template-columns: 1fr;
    }

    .facility-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 500px) {

    .facility-grid {
        grid-template-columns: 1fr;
    }

    .profile-section {
        padding: 50px 18px;
    }

}

</style>

@endsection
