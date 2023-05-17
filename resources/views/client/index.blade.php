<x-head></x-head>

<body>
<!-- HEADER -->
<x-header></x-header>

<!-- MAIN -->
<div class="container-fluid">

    <section class="container" style="text-align: center; vertical-align: center; max-width: 500px ">
        @if (isset($data->id))
            <form method="post" action="{{ route('client.update',[$data->id]) }}" class="form-inline">
                @csrf
                <div class="form-group">
                    <input class="form-control form-control-sm" type="text" placeholder="Наименование" name="name"
                           style="width: 350px" value="{{$data->name}}"/>
                </div>
                <button type="submit" class="btn btn-primary">Обновить</button>
            </form>
        @else
            <form method="post" action="{{ route('client.create') }}" class="form-inline">
                @csrf
                <div class="form-group">
                    <input class="form-control form-control" type="text" placeholder="Наименование" name="name"
                           style="width: 350px"/>
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        @endif
    </section>


    <section class="container" style="max-width: 500px">
        <table class="table table-bordered table-striped" style="text-align: center; vertical-align: center">
            <thead class="thead-dark">
            <tr>
                <th width="100px">п/п</th>
                <th width="300px">Наименование</th>
                <th width="200px">Ред./удалить</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($clients as $client)
                <tr>
                    <td style="text-align: center" class="td-label">
                        {{$loop->iteration}}
                    </td>
                    <td style="text-align: center" class="td-label">
                       <a href="{{ route('client.manager_id', [$client->id]) }}"> {{ $client->name }}</a>
                    </td>
                    <td style="text-align: center">
                        <a href="{{ route('client.edit',[$client->id]) }}"
                           style="background-image: url({{ asset('images/editdoc.png') }}); background-repeat: no-repeat; background-position: center; border: 0px solid;  padding: 15px"
                           value="  " name="edit" title="Редактировать"></a>

                        <a href="{{ route('client.delete',[$client->id]) }}"
                           style="background-image: url({{ asset('images/delorder.png')}}); background-repeat: no-repeat; background-position: center; border: 0px solid;  padding: 15px"
                           value="  " name="edit" title="Удалить"></a>

                </tr>
            @endforeach


            </tbody>
        </table>
    </section>


</div>

<!-- FOOTER -->
<x-footer></x-footer>

</div>

</body>
</html>
