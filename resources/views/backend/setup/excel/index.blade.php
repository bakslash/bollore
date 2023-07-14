<!-- resources/views/import.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Import</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-size: 24px;
        }

        .form-container {
            text-align: center;
        }

        .submit-button {
            background-color: green;
            color: white;
            font-size: inherit;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file">
            <br>
            <button type="submit" class="submit-button">Import</button>
        </form>

        @if(session('success'))
            <div>{{ session('success') }}</div>
        @endif
    </div>
</body>
</html>
