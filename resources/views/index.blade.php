<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel-Exam</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="form-container">

        <form action="http://127.0.0.1:8000/api/store-position" method="POST">
            @csrf
            <div>
                <label for="position-name">Name:</label>
                <input type="text" name="position-name" class="position-name">
            </div>
            <div>
                <label for="reports-to">Reports to:</label>
                <select name="reports-to" class="reports-to">
                    <option value="" selected>Select an option</option>
                    <option value="CEO">CEO</option>
                    <option value="Manager">Manager</option>
                    <option value="Development Lead">Development Lead</option>
                    <option value="Senior Developer 1">Senior Developer 1</option>
                    <option value="Senior Developer 2">Senior Developer 2</option>
                    <option value="QA Lead">QA Lead</option>
                    <option value="Senior QA Tester">Senior QA Tester</option>
                    <option value="Developer 3">Developer 3</option>
                    <option value="QA Tester 1">QA Tester 1</option>
                    <option value="QA Tester 2">QA Tester 2</option>
                    <option value="Developer 2">Developer 2</option>
                    <option value="Developer 1">Developer 1</option>
                </select>
            </div>
            <input type="submit" class="submit-report" value="Submit">
        </form>
        <button class="show-positions">asdasdasdasa</button>
    </div>

</body>

</html>