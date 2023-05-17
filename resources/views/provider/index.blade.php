<x-head></x-head>

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

    <section class="container" style="text-align: center; vertical-align: center; max-width: 500px ">
        @if (isset($data->id))
            <form method="post" action="{{ route('provider.update',[$data->id]) }}" class="form-inline">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <input class="form-control" type="text" placeholder="Наименование" name="name" style="width: 270px" value="{{$data->name}}"/>
                    <input class="form-control" type="text" placeholder="К-т" name="k" style="width: 70px" value="{{number_format($data->k, 2, ',', ' ')}}"/>
                </div>
                <button type="submit" class="btn btn-primary">Обновить</button>
            </form>
        @else
            <form method="post" action="{{ route('provider.create') }}" class="form-inline">
                @csrf
                <div class="form-group">
                    <input class="form-control form-control" type="text" placeholder="Наименование" name="name"
                           style="width: 270px"/>
                    <input class="form-control form-control" type="text" placeholder="Коэф." name="k"
                           style="width: 70px"/>
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        @endif
    </section>

@if (count($providers) > 0)
    <section class="container" style="max-width: 500px">
        <table class="table table-bordered table-striped" style="text-align: center; vertical-align: center">
            <thead class="thead-dark">
            <tr>
                <th width="100px">п/п</th>
                <th width="300px">Наименование</th>
                <th width="100px">Коэф.</th>
                <th width="200px">Ред./удалить</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($providers as $provider)
                <tr>
                    <td style="text-align: center" class="td-label">
                        {{ $i++ }}
                    </td>
                    <td style="text-align: center" class="td-label">
                        {{ $provider->name }}
                    </td>
                    <td style="text-align: center" class="td-label">
                        {{ $provider->k }}
                    </td>
                    <td style="text-align: center">
                        <a href="{{ route('provider.edit',[$provider->id]) }}"
                           style="background-image: url({{ asset('images/editdoc.png') }}); background-repeat: no-repeat; background-position: center; border: 0px solid;  padding: 15px"
                           value="  " name="edit" title="Редактировать"></a>

                        <a href="{{ route('provider.delete',[$provider->id]) }}"
                           style="background-image: url({{ asset('images/delorder.png')}}); background-repeat: no-repeat; background-position: center; border: 0px solid;  padding: 15px"
                           value="  " name="edit" title="Удалить"></a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </section>
@else
    <section class="container" style="max-width: 500px">
            Добавьте первого поставщика
    </section>
@endif
</div>

<!-- FOOTER -->
<x-footer></x-footer>

</div>

</body>
</html>
