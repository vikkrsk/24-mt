<x-head>@section('title', 'Все менеджеры клиентов')</x-head>

<body>
<!-- HEADER -->
<x-header></x-header>
<x-status></x-status>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<!-- MAIN -->
<div class="container-fluid">

    <section class="container" style="text-align: center; vertical-align: center; ">
        <!-- не работает -->
        @if (isset($data->id))
            <form method="post" action="{{ route('manager.update',[$data->id]) }}" class="form-inline">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <input class="form-control" type="text" placeholder="Наименование" name="name" style="width: 270px" value="{{$data->name}}"/>
                    <input class="form-control" type="text" placeholder="К-т" name="k" style="width: 70px" value="{{number_format($data->name, 2, ',', ' ')}}"/>
                </div>
                <button type="submit" class="btn btn-primary">Обновить</button>
            </form>
        @endif


            <form method="post" action="{{ route('manager.create') }}" class="form-inline">
                @csrf
                <div class="form-group">
                    <select name="clients_id" id="clients_id" class="form-control form-control">
                        <option selected="selected" class="form-group">Контрагент...</option>

                        @foreach($allclients as $allclient)
                            <option value="{{$allclient->id}}" class="form-group">{{$allclient->name}}</option>
                        @endforeach

                    <input class="form-control form-control" type="text" placeholder="Фамилия" name="last_name"
                           style="width: 270px"/>
                    <input class="form-control form-control" type="text" placeholder="Имя" name="first_name"
                           style="width: 270px"/>
                    <input class="form-control form-control" type="text" placeholder="E-mail" name="email"
                           style="width: 270px"/>
                    <button type="submit" class="btn btn-primary">Добавить</button>
                </div>
            </form>

    </section>

@if (count($managers) > 0)
    <section class="container" style="max-width: 900px">
        <table class="table table-bordered table-striped" style="text-align: center; vertical-align: center">
            <thead class="thead-dark">
            <tr>
                <th width="50px">п/п</th>
                <th width="400px">Менеджер</th>
                <th width="400px">Клиент</th>
                <th width="100px">E-mail</th>
                <th width="200px">Ред./удалить</th>
            </tr>
            </thead>
            <tbody>
            @php $i=1 @endphp
            {{ $client->name }}
            @foreach ($managers as $manager)
                <tr>
                    <td style="text-align: center" class="td-label">
                        {{$i++}}
                    </td>
                    <td style="text-align: center" class="td-label">
                        {{ $manager->last_name }} {{ $manager->first_name }}
                    </td>
                    <td style="text-align: center" class="td-label">
                        {{ $manager->client->name }} 123
                    </td>
                    <td style="text-align: center" class="td-label">
                        {{ $manager->email }}
                    </td>
                    <td style="text-align: center">
                        <a href="{{ route('manager.edit',[$manager->id]) }}"
                           style="background-image: url({{ asset('images/editdoc.png') }}); background-repeat: no-repeat; background-position: center; border: 0px solid;  padding: 15px"
                           value="  " name="edit" title="Редактировать"></a>

                        <a href="{{ route('manager.delete',[$manager->id]) }}"
                           style="background-image: url({{ asset('images/delorder.png')}}); background-repeat: no-repeat; background-position: center; border: 0px solid;  padding: 15px"
                           value="  " name="edit" title="Удалить"></a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </section>
    @else
    Добавьте первого менеджера
    @endif
</div>

<!-- FOOTER -->
<x-footer></x-footer>

</div>

</body>
</html>
