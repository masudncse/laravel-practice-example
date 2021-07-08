<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Content</th>
        <th>User Name</th>
        <th>Comments</th>
    </tr>
    @foreach($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->content }}</td>
            <td>{{ $post->user->name }}</td>
            <td>
                <ul>
                    @foreach($post->comments as $comment)
                        <li style="font-size: 4px">{{ $comment->comment }}</li>
                    @endforeach
                </ul>
            </td>
        </tr>
    @endforeach
</table>

</body>
</html>
