<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle ?? 'Laravel-HW' }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
            color: #333;
        }

        header {
            background-color: #4CAF50;
            padding: 20px;
            color: white;
            text-align: center;
        }

        nav {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        nav a {
            margin: 0 20px;
            text-decoration: none;
            color: white;
            font-weight: bold;
            font-size: 16px;
            transition: color 0.3s ease-in-out;
        }

        nav a:hover {
            color: #ff9900;
        }

        footer {
            background-color: #4CAF50;
            padding: 20px;
            color: white;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .content {
            margin: 20px;
        }

        .username {
            position: fixed;
            bottom: 10px;
            right: 10px;
            font-size: 14px;
            color: #555;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        form input[type="text"],
        form textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        form button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        form button:hover {
            background-color: #45a049;
        }

        .notes {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .note {
            max-width: 300px;
            background-color: #fff;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.3s ease-in-out;
        }

        .note:hover {
            transform: scale(1.05);
        }

        .note h3 {
            color: #4CAF50;
            margin-bottom: 8px;
        }

        .note p {
            color: #555;
        }

        .notes-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .notes-table th,
        .notes-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .notes-table th {
            background-color: #4CAF50;
            color: white;
        }

        .notes-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .notes-table tr:hover {
            background-color: #ddd;
        }

    </style>
</head>

<body>
    @include('partials.header', ['pageTitle' => $pageTitle])
    
    <div class="content">
        @yield('content')
    </div>

    @include('partials.footer')
</body>

</html>
