<table class="table">
    <thead>
        <tr>
            <th>№</th>
            <th>Name</th>
            <th>Text</th>
            <th>Icon</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $service)
            <tr>
                <td>{{ $service['id'] }}</td>
                <td>{{ $service['name'] }}</td>
                <td>{{ $service['text'] }}</td>
                <td>{{ $service['icon'] }}</td>
                <td>
                    {{ Html::link(route('serviceEdit', ['service' => $service['id']]), 'Edit', [
                        'class' => 'btn btn-warning'
                    ]) }}
                </td>
                <td>Delete</td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ Html::link(route('serviceAdd'), 'Добавить сервис', [
    'class' => 'btn btn-success'
]) }}