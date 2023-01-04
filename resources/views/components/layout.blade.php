<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/css/dashbroad.css" />
    <link rel="stylesheet" type="text/css" href="/css/Detail.css" />
    <link rel="stylesheet" type="text/css" href="/css/user_Login_Register.css" />
    <link rel="stylesheet" type="text/css" href="/css/user_post_page.css" />
    <link rel="stylesheet" type="text/css" href="/css/invester_page.css" />
    <link rel="stylesheet" type="text/css" href="/css/project_detail.css" />

    <link rel="stylesheet" type="text/css" href="/css/flickity.css" />
    <script src="https://use.fontawesome.com/d684b030cb.js"></script>

    <title>BATDONGSAN-LARAVEL</title>
</head>

<body>
    {{-- View Output --}}
    @include('index_elements._header')

    {{$slot}}
    {{-- if not want to make "layout" as a component, we could use @yeild("content") instead of {{$slot}} --}}


    @include('index_elements._footer')
    
    <script src="/js/flickity.pkgd.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
    <script>
        // CK editor scripts
        ClassicEditor
        .create(document.querySelector('#editorUser'), {
            ckfinder:{
                openerMethod: 'popup',
                uploadUrl: '{{route('ckeditor.upload.user').'?_token='.csrf_token()}}'
            }
        })
        .then(editor => {
            console.log(editor);
        })
        .catch( error => {
            console.error(error);
        });
    </script>
</body>

</html>