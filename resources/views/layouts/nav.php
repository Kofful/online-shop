<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">КОМПЬЮТЕР UA</a>
        <div class="collapse navbar-collapse justify-content-between">
            <div class="navbar-nav">
                <a class="nav-link" href="/?page=catalog">КАТАЛОГ</a>
            </div>
            <form class="d-flex" action="/">
                <input type="hidden" name="page" value="catalog" />
                <input class="form-control" name="query" autocomplete="off" type="search" placeholder="Поиск"
                       aria-label="Search">
                <button class="btn btn-outline-success ms-2" type="submit">Поиск</button>
            </form>
            <div>
                <a href="/?page=cart" class="nav-item"><img class="cart-icon" src="/public/img/cart.png" alt="Cart"></a>
                <a href="/?page=login" class="btn btn-success">Вход</a>
            </div>
        </div>
    </div>
</nav>