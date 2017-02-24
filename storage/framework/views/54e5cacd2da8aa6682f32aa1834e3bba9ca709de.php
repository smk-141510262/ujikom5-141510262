<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <style>
        header, footer {
            padding: 1em;
            color: white;
            background-color:   #6495ED;
            clear: left;
            text-align: center;
        }

        h1, h2, h3 {
            font-family:verdana;
            color: blue;
            text-shadow: 2px 2px 4px red;
        }
    </style>
</head>
<header>
    <h1>"APLIKASI SISTEM PENGGAJIAN"</h1>
    <h3>SMK ASSALAAM BANDUNG</h3>
</header>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <ul class="nav navbar-nav">
                        <li><a class="active" href="<?php echo e(url('/home')); ?>">Home</a></li>
                        <li><a href="<?php echo e(url('/Jabatan')); ?>">Jabatan</a></li>
                        <li><a class="active" href="<?php echo e(url('/Golongan')); ?>">Golongan</a></li>
                        <li><a href="<?php echo e(url('/Tunjangan')); ?>">Tunjangan</a></li>
                        <li><a href="<?php echo e(url('/Pegawai')); ?>">Pegawai</a></li>
                        <li><a class="active" href="<?php echo e(url('/TunjanganPegawai')); ?>">Tunjangan Pegawai</a></li>
                        <li><a href="<?php echo e(url('/KategoriLembur')); ?>">Kategori Lembur</a></li>
                        <li><a class="active" href="<?php echo e(url('/LemburPegawai')); ?>">Lembur Pegawai</a></li>
                        <li><a class="active" href="<?php echo e(url('/Penggajian')); ?>">Penggajian</a></li>
                    </ul>
                </div>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <?php if(Auth::guest()): ?><br>
                        <?php else: ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="<?php echo e(url('/logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <footer>Yuyu Denella &copy; 141510262@smkassalaambandung.sch.id</footer>
</body>
</html>
