<div class="container-fluid wrapper">
    {!! Form::open([
        'url'       => route('serviceEdit', ['service' => $data['id']]),
        'class'     => 'form-horizontal',
        'method'    => 'POST',
        'enctype'   => 'multipart/form-data'
    ]) !!}

    {!! Form::hidden('id', $data['id']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Название сервиса:', ['class' => 'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('name', $data['name'], [
                'class'         => 'form-control',
                'placeholder'   => 'Введите название сервиса'
            ]) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('text', 'Текст сервиса:', ['class' => 'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::textarea('text', $data['text'], [
                'id'            => 'editor',
                'class'         => 'form-control',
                'placeholder'   => 'Введите текст сервиса',
                'rows'          => 10
            ]) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('old_icon', 'Изображение:', [
            'class' => 'col-xs-2 control-label'
        ]) !!}
        <div class="col-xs-offset-2 col-xs-10">
            {{ Html::image('assets/img/' . $data['icon'], '', [
                'class' => 'image-circle'
            ]) }}
            {!! Form::hidden('old_icon', $data['icon']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('icon', 'Иконка:', ['class' => 'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::file('icon', [
                'class'             => 'filestyle',
                'data-buttonText'   => 'Выберите изображение',
                'data-buttonName'   => 'btn-primary',
                'data-placeholder'  => 'Файла нет',
            ]) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
            {!! Form::button('Сохранить', [
                'class' => 'btn btn-primary',
                'type'  => 'submit'
            ]) !!}
        </div>
    </div>

    {!! Form::close() !!}

    <script>
        CKEDITOR.replace( 'editor' );
    </script>
</div>