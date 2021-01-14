<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $document->name }}</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="http://127.0.0.1:8000/css/app.css">
</head>

<body class="font-sans antialiased py-0">
    <div class="py-0">
        <div style="max-width: 21cm;">
            <div class="w-full">
                <div id="full-container">
                    <div class="editor ql-container ql-editor" style="margin:0;box-shadow:none;border:0!important;padding:0;width:auto;">{!! $document->content !!}</div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Quill editörü gereksinimleri -->
    <script src="{{ asset('editor/highlight.min.js') }}" type="text/javascript"></script>
    <link href="{{ asset('editor/quill.css') }}" rel="stylesheet">
    <script>
        setTimeout(() => {
            alert("Çıkan yazdırma ekranında PDF olarak kaydet seçeneğini seçiniz.");
            window.print();
            window.history.back();
        }, 1000);
    </script>
</body>

</html>