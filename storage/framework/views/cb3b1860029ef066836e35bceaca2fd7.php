<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('title', 'SMA Cendekia Nusantara'); ?></title>

    <link rel="stylesheet" href="<?php echo e(asset('asset/css/style.css')); ?>">
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>

    
    <nav class="navbar-custom">
        <div class="nav-inner">

            <a href="<?php echo e(url('/')); ?>" class="nav-brand">
                SMA Cendekia Nusantara
            </a>

            <ul class="nav-menu">

                <li>
                    <a href="<?php echo e(route('profil')); ?>"
                       class="<?php echo e(request()->routeIs('profil') ? 'active' : ''); ?>">
                        Profil
                    </a>
                </li>

                <li>
                    <a href="<?php echo e(route('berita.index')); ?>"
                       class="<?php echo e(request()->routeIs('berita.*') ? 'active' : ''); ?>">
                        Berita & Pengumuman
                    </a>
                </li>

                <li>
                    <a href="<?php echo e(route('galeri.index')); ?>"
                       class="<?php echo e(request()->routeIs('galeri.*') ? 'active' : ''); ?>">
                        Galeri
                    </a>
                </li>

                <li>
                    <a href="<?php echo e(route('akademik')); ?>"
                       class="<?php echo e(request()->routeIs('akademik') ? 'active' : ''); ?>">
                        Akademik
                    </a>
                </li>

                <li>
                    <a href="<?php echo e(route('ekstrakurikuler.index')); ?>"
                       class="<?php echo e(request()->routeIs('ekstrakurikuler.*') ? 'active' : ''); ?>">
                        Ekstrakurikuler
                    </a>
                </li>

                <li>
                    <a href="<?php echo e(route('profile-sekolah')); ?>"
                       class="<?php echo e(request()->routeIs('profile-sekolah') ? 'active' : ''); ?>">
                        Profile Sekolah
                    </a>
                </li>

                <li>
                    <a href="<?php echo e(route('siswa-guru.create')); ?>"
                       class="<?php echo e(request()->routeIs('siswa-guru.*') ? 'active' : ''); ?>">
                        Siswa & Guru
                    </a>
                </li>

                <?php if(auth()->guard()->check()): ?>
                   <?php if(Auth::user()->role === 'admin' || Auth::user()->role === 'operator'): ?>
                        <li>
                            <a href="<?php echo e(route('admin.users.index')); ?>"
                            class="<?php echo e(request()->routeIs('admin.users.*') ? 'active' : ''); ?>">
                                Data User
                            </a>
                        </li>
                    <?php endif; ?>

                    <li>
                        <a href="<?php echo e(route('profile')); ?>" class="nav-user">
                            <span class="nav-user-avatar">
                                <?php echo e(strtoupper(substr(Auth::user()->name, 0, 1))); ?>

                            </span>
                            <span class="nav-user-name">
                                <?php echo e(Auth::user()->name); ?>

                            </span>
                        </a>
                    </li>
                    <?php else: ?>
                        <li>
                            <a href="<?php echo e(route('login')); ?>" class="btn-login">
                                Masuk Guru / Admin
                            </a>
                        </li>
                <?php endif; ?>

            </ul>

        </div>
    </nav>

    
    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    
    <footer class="footer-custom">
        <div class="footer-inner">
            <h3>SMA Cendekia Nusantara</h3>

            <div class="footer-contact">
                <div class="contact-item">
                    <span>📍</span>
                    <div>
                        <strong>Alamat</strong>
                        <p>Jl. Pendidikan Raya No. 45, Tasikmalaya, Jawa Barat 46113</p>
                    </div>
                </div>

                <div class="contact-item">
                    <span>☎️</span>
                    <div>
                        <strong>Telepon</strong>
                        <p>(0265) 555-0123</p>
                    </div>
                </div>

                <div class="contact-item">
                    <span>✉️</span>
                    <div>
                        <strong>Email</strong>
                        <p>tu@cendekianusantara.sch.id</p>
                    </div>
                </div>

                <div class="contact-item">
                    <span>🕐</span>
                    <div>
                        <strong>Jam Pelayanan</strong>
                        <p>Senin–Jumat, 07.00–15.00 WIB</p>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                &copy; <?php echo e(date('Y')); ?> SMA Cendekia Nusantara
            </div>
        </div>
    </footer>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH D:\XII RPL 1 ALFA\SERKOM\SerKom-26\project2026_2\project2026\resources\views/layout/app.blade.php ENDPATH**/ ?>