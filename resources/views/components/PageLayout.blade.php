<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>JOB POTAL</title>
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet"> <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script> 
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
         @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
        <!-- Fonts -->
        <script src="https://cdn.tailwindcss.com"></script>
        
        <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
        <script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
    </head>

    <body>
         <div>
          {{ $slot }}
         </div>
    </body>
</html>