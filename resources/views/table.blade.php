<table class="table table-borderless fresh-table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Игрок 1</th>
        <th scope="col">Игрок 2</th>
    </tr>
    </thead>
    <tbody>

    @foreach($turns as $key => $turn)
        <tr>
            <th scope="row">{{$key}}</th>
            @foreach($turn as $word)
                <td>{{$word['word']}}</td>
            @endforeach
        </tr>
    @endforeach

    </tbody>
</table>
