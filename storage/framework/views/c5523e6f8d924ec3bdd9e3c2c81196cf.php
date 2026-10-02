<?php $__env->startSection('title', 'Profile Sekolah'); ?>

<?php $__env->startSection('content'); ?>
<main class="content">
    <div class="container">
        <h1 class="page-title">Profile Sekolah</h1>
        <p class="page-subtitle">Informasi lengkap tentang <?php echo e($profil->nama_sekolah); ?>.</p>
        <hr class="divider">

        <?php if(session('success')): ?>
            <div class="alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <?php if($profil->foto): ?>
            <div class="card" style="padding:0; overflow:hidden;">
                <img src="<?php echo e(asset('storage/' . $profil->foto)); ?>"
                     alt="<?php echo e($profil->nama_sekolah); ?>"
                     style="width:100%; max-height:300px; object-fit:cover; display:block;">
            </div>
        <?php endif; ?>

        <div class="card">
            <h2>🏫 Tentang Sekolah</h2>
            <p class="muted" style="line-height:1.8;">
                <?php echo nl2br(e($profil->tentang ?? 'Belum ada deskripsi.')); ?>

            </p>
        </div>

        <div class="card">
            <h2>🎯 Visi & Misi</h2>

            <?php if($profil->visi): ?>
                <h3 style="color:#d99a22; font-size:16px; margin:12px 0 6px;">Visi</h3>
                <p class="muted" style="font-style:italic;">"<?php echo e($profil->visi); ?>"</p>
            <?php endif; ?>

            <?php if($profil->misi): ?>
                <h3 style="color:#d99a22; font-size:16px; margin:16px 0 6px;">Misi</h3>
                <ol class="muted" style="padding-left:20px; line-height:1.9;">
                    <?php $__currentLoopData = explode("\n", $profil->misi); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $misi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(trim($misi)): ?>
                            <li><?php echo e(trim($misi)); ?></li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ol>
            <?php endif; ?>
        </div>

        <div class="card">
            <h2>📊 Statistik Sekolah</h2>

            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(140px, 1fr)); gap:16px; margin-top:16px;">
                <div style="background:#f7f5ef; border-radius:8px; padding:20px; text-align:center;">
                    <div style="font-size:28px; font-weight:bold; color:#d99a22;">
                        <?php echo e($profil->jumlah_siswa ?? 0); ?>+
                    </div>
                    <div class="muted" style="font-size:13px;">Siswa Aktif</div>
                </div>

                <div style="background:#f7f5ef; border-radius:8px; padding:20px; text-align:center;">
                    <div style="font-size:28px; font-weight:bold; color:#d99a22;">
                        <?php echo e($profil->tahun_berdiri ?? '-'); ?>

                    </div>
                    <div class="muted" style="font-size:13px;">Tahun Berdiri</div>
                </div>

                <div style="background:#f7f5ef; border-radius:8px; padding:20px; text-align:center;">
                    <div style="font-size:22px; font-weight:bold; color:#d99a22;">
                        <?php echo e($profil->jenjang ?? '-'); ?>

                    </div>
                    <div class="muted" style="font-size:13px;">Jenjang</div>
                </div>
            </div>
        </div>

        <?php if($profil->prestasi): ?>
            <div class="card">
                <h2>🏆 Prestasi</h2>
                <ul class="muted" style="padding-left:20px; line-height:1.9; margin-top:12px;">
                    <?php $__currentLoopData = explode("\n", $profil->prestasi); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(trim($p)): ?>
                            <li><?php echo e(trim($p)); ?></li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="card">
            <h2>📞 Kontak & Lokasi</h2>

            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(220px, 1fr)); gap:16px; margin-top:16px;">
                <div style="display:flex; gap:12px;">
                    <span style="font-size:22px;">📍</span>
                    <div>
                        <strong style="font-size:14px; color:#0d1b3e;">Alamat</strong>
                        <p class="muted" style="font-size:14px; margin-top:2px;">
                            <?php echo e($profil->alamat ?? 'Belum diisi'); ?>

                        </p>
                    </div>
                </div>

                <div style="display:flex; gap:12px;">
                    <span style="font-size:22px;">📅</span>
                    <div>
                        <strong style="font-size:14px; color:#0d1b3e;">Tahun Berdiri</strong>
                        <p class="muted" style="font-size:14px; margin-top:2px;">
                            <?php echo e($profil->tahun_berdiri ?? '-'); ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>

        <?php if(auth()->guard()->check()): ?>
            <?php if(Auth::user()->role === 'admin' || Auth::user()->role === 'operator'): ?>
                <div class="action-buttons" style="margin-top:20px;">
                    <a href="<?php echo e(route('profile-sekolah.edit')); ?>" class="btn-action">
                        ✏️ Edit Profile Sekolah
                    </a>
                </div>
            <?php endif; ?>
        <?php endif; ?>

    </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\XII RPL 1 ALFA\SERKOM\SerKom-26\project2026_2\project2026\resources\views/profile-sekolah/index.blade.php ENDPATH**/ ?>