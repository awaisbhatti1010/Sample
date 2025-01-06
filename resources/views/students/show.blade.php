<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Student</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
 
        img {
            float: left;
            margin: 5px;
        }
 
        p {
            text-align: justify;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Student Details</h2>
        <img src="{{ url($student->image) }}" style="float:right;"/>
        <p><strong>Name:</strong> {{ $student->Name }}</p>
        <p><strong>Email:</strong> {{ $student->Email }}</p>
        <p><strong>Roll Number:</strong> {{ $student->Roll_Number }}</p>
        <a href="{{ route('students.index') }}" class="btn btn-primary">Back to List</a>
    </div>
</body>
</html>
