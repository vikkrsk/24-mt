<header class="header">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{route('index')}}"><img src="{{asset('images/logo.png')}}" width="250px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navbar-dark" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto ">
                    <li class="nav-item">
                        <a href="{{ route('index') }}">Главная</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-item dropdown-toggle" data-toggle="dropdown" href="#">Создать</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('provider.index') }}">Поставщик</a></li>
                            <li><a class="dropdown-item" href="{{ route('client.index') }}">Клиента</a></li>
                            <li><a class="dropdown-item" href="{{ route('unit.index') }}">Ед. изм.</a></li>
                            <li><a class="dropdown-item" href="{{ route('client.managers') }}">Добавить менеджера</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?view=agree">Согласованные заказы</a>
                    </li>
                    <li class="nav-item">
                        <a class="dropdown-item" href="index.php?view=new_order">Новый заказ</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" method="post" action="index.php?view=search">
                    <input class="form-control mr-sm-2" type="search" placeholder="текст для поиска" aria-label="Search" name="s">
                    <button class="btn btn-primary my-2 my-sm-0" type="submit">Поиск</button>
                </form>
            </div>
        </div>
    </nav>
</header>
