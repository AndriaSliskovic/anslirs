<!DOCTYPE html>
<html lang="en">
<head>
    @component('pocetna.components.head')
    @endcomponent
</head>

<body data-sa-theme="7">
<main class="main">
    <!-- Header -->
    <header class="header">
        <div class="navigation-trigger hidden-xl-up" data-ma-action="aside-open" data-ma-target=".sidebar">
            <i class="zmdi zmdi-menu"></i>
        </div>

        <div class="logo hidden-sm-down">
            <h1><a href="index.html">Portfolio</a></h1>
        </div>

        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link active" href="#">Početna</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">FronEnd</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">BackEnd</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">CV</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Kontakt</a>
            </li>
        </ul>

        <!-- Other Header Contents -->
    </header>
    @yield($naslov)
    @yield($sadrzaj)



</main>


<!-- Javascript -->
<!-- Vendors -->
@component('pocetna.components.vendors')
@endcomponent


<!-- App functions -->
@component('pocetna.components.scripts')
</body>
</html>