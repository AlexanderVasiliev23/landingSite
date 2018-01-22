<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Images</th>
            <th>Filter</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($portfolios as $portfolio)
            <tr>
                <td>{{ $portfolio['id'] }}</td>
                <td>{{ $portfolio['name'] }}</td>
                <td>{{ $portfolio['images'] }}</td>
                <td>{{ $portfolio['filter'] }}</td>
                <td>
                    {!! Html::link(route('portfolioEdit', ['portfolio' => $portfolio['id']]), 'Редактировать', [
                        'class' => 'btn btn-warning',
                    ]) !!}
                </td>
                <td>
                    {!! Form::open([
                    'url' => route('portfolioEdit', [
                        'portfolio' => $portfolio['id'],
                        'class' => 'form-horizontal',
                        'method' => 'post'
                        ])
                    ]) !!}

                    {{ method_field('DELETE') }}
                    {!! Form::button('Удалить', [
                        'class' => 'btn btn-danger',
                        'type'  => 'submit'
                    ]) !!}

                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ Html::link(route('portfolioAdd'), 'Добавить портфолио', [
    'class' => 'btn btn-success'
]) }}