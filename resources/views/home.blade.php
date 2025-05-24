<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            border: 1px solid black;
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 10px;

        }
    </style>
</head>

<body>

    @php dump($users); @endphp
    <?php ?>
    <div>
        <a href="/">Index</a>
        <a href="/home">Home</a>
    </div>
    <h1>This is Home Page</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, sint similique. Saepe molestias repudiandae
        magnam necessitatibus itaque et recusandae minus assumenda. Quidem accusamus voluptatem minus autem perspiciatis
        quos eveniet placeat?</p>
    <ul>

        @foreach ($users as $user)
            <li>This is user {{ $user->name }}</li>
        @endforeach
    </ul>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>password</th>
                <th> Action </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->password }}</td>
                    <td>
                        <a href="{{ route('web-user-edit-form', $user->id) }}">edit</a>
                        <a href="{{ route('web-user-delete', $user->id) }}" style='color: red;'>delete</a>
                    </td>
                </tr>
            @endforeach

        </tbody>

    </table>
</body>

</html>
