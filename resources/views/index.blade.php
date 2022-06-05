<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
<form
    id="update-form"
    method="post"
    action="{{ route('film.create') }}"
>
    @csrf
    <input name="title" type="text">
    <input name="actor" type="text">
    <button class="btn btn-primary" type="submit">Создать</button>
</form>


<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Film</th>
        <th scope="col">Actor</th>
    </tr>
    </thead>
    <tbody>
    @foreach($films as $film)
    <tr>
        <td>
            <button name="{{$film->id}}" id="delete" type="button" class="btn btn-primary">Удалить</button>
            <button name="{{$film->id}}" id="update" type="button" class="btn btn-primary">Изменить</button>
        </td>
        <td>{{$film->title}}</td>
        <td>{{$film->actor}}</td>
    </tr>
    @endforeach

    </tbody>
</table>
</body>

<script>

    document.querySelector('#update-form').addEventListener('submit', (e) => {
        e.preventDefault();
        var formData = new FormData(e.target);
        fetch("{{ route('film.create')}}", {
            method: 'post',
            body: formData
        }).then(() => console.log('success')).catch(() => console.log('123'));
    });

    document.querySelector('#delete').addEventListener('click', () => {
        var id = document.querySelector('#delete').name
        fetch("/films/delete/" + id, {
            method: 'delete',
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}"
            }
        }).then(() => console.log('success')).catch(() => console.log('123'));
    });

</script>
</html>
