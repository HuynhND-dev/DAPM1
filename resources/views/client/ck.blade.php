<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CKEditor 5 CDN</title>
</head>

<body>
<div class="container">
    <form action="/ck" method="post">
        @csrf
    <textarea name="ck" id="editor">Viết nội dung vào đây...</textarea>
        <button type="submit">dthjne</button>
    </form>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>

</body>

</html>
