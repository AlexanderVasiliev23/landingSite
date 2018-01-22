<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CKEditor 5 - Classic editor</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.2/classic/ckeditor.js"></script>
</head>
<body>
<h1>Classic editor</h1>
<textarea name="content" id="editor">
        <p>This is some sample content.</p>
    </textarea>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
        console.error( error );
    } );
</script>
</body>
</html>