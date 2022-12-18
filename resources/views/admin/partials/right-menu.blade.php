<nav class="navbar navbar-light bg-white shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="/admin/menu">Админ панель</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Навигация</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/admin/menu">Меню</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/category">Категории</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
