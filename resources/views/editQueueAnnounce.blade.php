<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/editQueue/{{$post->id}}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="appointment_status" id="" value="{{ $post-> {'appointment_status'} }}">
        <input type="submit" value="Continue">
    </form>
</body>
</html>