<?php
use Framework\Authentication\Authentication;
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">КОМПЬЮТЕР UA</a>
        <div class="collapse navbar-collapse justify-content-between">
            <div class="navbar-nav">
                <a class="nav-link" href="/catalog">КАТАЛОГ</a>
            </div>
            <form class="d-flex" action="/catalog">
                <input class="form-control" name="query" autocomplete="off" type="search" placeholder="Поиск"
                       aria-label="Search">
                <button class="btn btn-outline-success ms-2" type="submit">Поиск</button>
            </form>
            <div>
                <?php if (Authentication::isAuth()) :?>
                    <a href="/cart" class="nav-item">
                        <img class="cart-icon" src="/public/img/cart.png" alt="Cart">
                    </a>
                    <a href="/history" class="nav-item">
                        <img class="cart-icon" src="/public/img/list.png" alt="History">
                    </a>
                    <a href="/logout" class="btn btn-danger">Выход</a>
                <?php else :?>
                    <a href="/login" class="btn btn-success">Вход</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>