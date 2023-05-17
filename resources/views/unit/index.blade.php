<x-head></x-head>

<body>
<!-- HEADER -->
<x-header></x-header>

<!-- MAIN -->
<div class="container-fluid">

    <section class="container" style="text-align: center; vertical-align: center; max-width: 300px ">
    @if (isset($data->id))
            <form method="post" action="{{ route('unit.update',[$data->id]) }}" class="form-inline">
                @csrf
                <div class="form-group">
                    <input class="form-control form-control-sm" type="text" placeholder="Наименование" name="unit" size="10" value="{{$data->unit}}"/>
                </div>
                <button type="submit" class="btn btn-primary">Обновить</button>
            </form>
    @else
            <form method="post" action="{{ route('unit.create') }}" class="form-inline">
                @csrf
                <div class="form-group">
                    <input class="form-control form-control-sm" type="text" placeholder="Наименование" name="unit" size="10"/>
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        @endif
    </section>



    <section class="container" style="max-width: 300px">
        <table class="table table-bordered table-striped" style="text-align: center; vertical-align: center">

            <thead class="thead-dark">
            <tr>
                <th width="100px">п/п</th>
                <th width="50px">Наименование</th>
                <th width="200px">Ред./удалить</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($units as $unit)
                <tr>
                    <td style="text-align: center" class="td-label">
                      {{$i++}}
                    </td>
                    <td style="text-align: center" class="td-label">
                        {!! $unit->unit !!}
                    </td>
                    <td style="text-align: center">
                        <a href="{{ route('unit.edit',[$unit->id]) }}" style="background-image: url({{ asset('images/editdoc.png') }}); background-repeat: no-repeat; background-position: center; border: 0px solid;  padding: 15px" value="  " name="edit" title="Редактировать"></a>

                        <a href="{{ route('unit.delete',[$unit->id]) }}" style="background-image: url({{ asset('images/delorder.png')}}); background-repeat: no-repeat; background-position: center; border: 0px solid;  padding: 15px" value="  " name="edit" title="Удалить" ></a>

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
