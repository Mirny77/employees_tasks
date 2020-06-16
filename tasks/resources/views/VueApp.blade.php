<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<link rel="stylesheet" href="{{asset('css/app.css')}}">

<link rel="stylesheet" href="{{asset('css/style.css')}}">
<body>
<div class="container">
    Задачи

</div>
<section id="app"></section>

<script>
    window.Laravel = <?php echo json_encode(['csrfToken'=>csrf_token(),])?>
</script>
<script src="{{asset('./resources/js/app.js')}}"></script>
</body>
</html>
