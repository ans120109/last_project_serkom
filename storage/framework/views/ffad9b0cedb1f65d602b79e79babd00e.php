<?php $__env->startSection('title', 'Edit Profile Sekolah'); ?>

<?php $__env->startSection('content'); ?>
<main class="content">
    <div class="container">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:10px;">
            <div>
                <h1 class="page-title">Edit Profil Sekolah</h1>
                <p class="page-subtitle">Perbarui informasi sekolah.</p>
            </div>
            <a href="<?php echo e(route('profile-sekolah')); ?>" class="btn-action" style="background:#6c757d;">
                ← Kembali
            </a>
        </div>

        <hr class="divider">

        <?php if($errors->any()): ?>
            <div style="background:#f8d7da; color:#721c24; padding:12px 16px; border-radius:5px; margin-bottom:16px; border-left:4px solid #dc3545;">
                <strong>Data belum bisa disimpan:</strong>
                <ul style="margin:8px 0 0 0; padding-left:20px;">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($err); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="card">
            <form action="<?php echo e(route('profile-sekolah.update')); ?>"
                  method="POST"
                  enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div style="margin-bottom:16px;">
                    <label style="display:block; font-weight:600; margin-bottom:6px;">
                        Nama Sekolah <span style="color:red;">*</span>
                    </label>
                    <input type="text"
                           name="nama_sekolah"
                           value="<?php echo e(old('nama_sekolah', $profil->nama_sekolah)); ?>"
                           required
                           style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">
                </div>

                <div style="margin-bottom:16px;">
                    <label style="display:block; font-weight:600; margin-bottom:6px;">Alamat</label>
                    <input type="text"
                           name="alamat"
                           value="<?php echo e(old('alamat', $profil->alamat)); ?>"
                           style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">
                </div>

                <div style="margin-bottom:16px;">
                    <label style="display:block; font-weight:600; margin-bottom:6px;">Jenjang</label>
                    <input type="text"
                           name="jenjang"
                           value="<?php echo e(old('jenjang', $profil->jenjang)); ?>"
                           style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">
                </div>

                <div style="margin-bottom:16px;">
                    <label style="display:block; font-weight:600; margin-bottom:6px;">Tahun Berdiri</label>
                    <input type="text"
                           name="tahun_berdiri"
                           value="<?php echo e(old('tahun_berdiri', $profil->tahun_berdiri)); ?>"
                           style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">
                </div>

                <div style="margin-bottom:16px;">
                    <label style="display:block; font-weight:600; margin-bottom:6px;">Jumlah Siswa</label>
                    <input type="number"
                           name="jumlah_siswa"
                           value="<?php echo e(old('jumlah_siswa', $profil->jumlah_siswa)); ?>"
                           min="0"
                           style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">
                </div>

                <div style="margin-bottom:16px;">
                    <label style="display:block; font-weight:600; margin-bottom:6px;">
                        Prestasi <span style="color:#888; font-weight:400;">(satu prestasi per baris)</span>
                    </label>
                    <textarea name="prestasi" rows="4"
                              style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;"><?php echo e(old('prestasi', $profil->prestasi)); ?></textarea>
                </div>

                <div style="margin-bottom:16px;">
                    <label style="display:block; font-weight:600; margin-bottom:6px;">Tentang Sekolah</label>
                    <textarea name="tentang" rows="4"
                              style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;"><?php echo e(old('tentang', $profil->tentang)); ?></textarea>
                </div>

                <div style="margin-bottom:16px;">
                    <label style="display:block; font-weight:600; margin-bottom:6px;">Visi</label>
                    <textarea name="visi" rows="2"
                              style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;"><?php echo e(old('visi', $profil->visi)); ?></textarea>
                </div>

                <div style="margin-bottom:16px;">
                    <label style="display:block; font-weight:600; margin-bottom:6px;">
                        Misi <span style="color:#888; font-weight:400;">(satu misi per baris)</span>
                    </label>
                    <textarea name="misi" rows="4"
                              style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;"><?php echo e(old('misi', $profil->misi)); ?></textarea>
                </div>

                <div style="margin-bottom:20px;">
                    <label style="display:block; font-weight:600; margin-bottom:6px;">
                        Foto Sekolah <span style="color:#888; font-weight:400;">(JPG/PNG/WEBP, maks 2 MB)</span>
                    </label>
                    <input type="file"
                           name="foto"
                           accept="image/*"
                           style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px; background:#fafafa;">

                    <?php if($profil->foto): ?>
                        <div style="margin-top:12px;">
                            <p class="muted" style="font-size:13px; margin-bottom:6px;">Foto saat ini:</p>
                            <img src="<?php echo e(asset('storage/' . $profil->foto)); ?>"
                                 style="max-height:180px; border-radius:6px; border:1px solid #ddd;">
                        </div>
                    <?php endif; ?>
                </div>

                <div class="action-buttons" style="margin-top:20px; padding-top:16px; border-top:1px solid #eee;">
                    <button type="submit" class="btn-action">💾 Simpan</button>
                    <a href="<?php echo e(route('profile-sekolah')); ?>" class="btn-action" style="background:#6c757d;">Batal</a>
                </div>

            </form>
        </div>

    </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\XII RPL 1 ALFA\SERKOM\SerKom-26\project2026_2\project2026\resources\views/profile-sekolah/edit.blade.php ENDPATH**/ ?>