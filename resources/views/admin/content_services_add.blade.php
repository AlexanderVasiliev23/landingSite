<div class="container-fluid wrapper">
    {!! Form::open([
        'url'       => route('serviceAdd'),
        'class'     => 'form-horizontal',
        'method'    => 'POST',
        'enctype'   => 'multipart/form-data'
    ]) !!}

    <div class="form-group">
        {!! Form::label('name', 'Название сервиса:', ['class' => 'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('name', old('name'), [
                'class'         => 'form-control',
                'placeholder'   => 'Введите название сервиса'
            ]) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('text', 'Текст сервиса:', ['class' => 'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::textarea('text', old('text'), [
                'id'            => 'editor',
                'class'         => 'form-control',
                'placeholder'   => 'Введите текст сервиса',
                'rows'          => 10
            ]) !!}
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