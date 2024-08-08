<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test</title>
</head>
<body>

    <form action="{{ route('testForm') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">name:</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div></br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</body>
</html>