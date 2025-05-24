<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <form action="{{ route('web-user-update', $user->id) }}" method="POST">
        @csrf
        <div>
            <label for="">Name</label>
            <input type="text" name="name" value={{ $user->name }} style='width: 300px;'>
        </div>
        <div>
            <label for="">Email</label>
            <input type="email" name="email" id="" value={{ $user->email }} style="width: 300px;">
        </div>
        <div>
            <input type="submit" value="Edit">
        </div>
    </form>

</body>

</html>
