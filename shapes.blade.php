<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Geometry Diagrams</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Language" content="ur">
    
    <!-- Link to the CSS file for styling -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/shapes.css') }}">
</head>
<body class="body">
<div class="container">
    <div class="shapes">
        <!-- SVG container for displaying shapes -->
        <svg width="400" height="400">
            <!-- Rectangle -->
            <rect x="50" y="50" width="100" height="100" style="fill:red;" />

            <!-- Square -->
            <rect x="200" y="50" width="100" height="100" style="fill:blue;" />

            <!-- Triangle -->
            <polygon points="50,250 150,250 100,150" style="fill:green;" />

          

            <!-- Box -->
            <rect x="200" y="200" width="150" height="200" style="fill:yellow;" />
        </svg>
    </div>
    
    <!-- Form section to input shape data -->
    <div class="formData">  
        <h1>Contact Us</h1>
        <!-- Form for submitting shape data -->
        <form method="POST" action="{{ route('shapes.process') }}">
            @csrf {{-- Cross-Site Request Forgery protection --}}
            <!-- Rectangle -->
            <label for="rectLength">Rectangle Length (X)</label>
    <input type="text" id="rectLength" name="rectLength" value="100"><br>
    <label for="rectWidth">Rectangle Width (Y)</label>
    <input type="text" id="rectWidth" name="rectWidth" value="50"><br>
    <!-- Square -->
    <label for="sqLength">Square Length (X)</label>
    <input type="text" id="sqLength" name="sqLength" value="20"><br>
    <label for="sqWidth">Square Width (Y)</label>
    <input type="text" id="sqWidth" name="sqWidth" value="40"><br>
            <!-- Additional shapes parameters -->
            <label for="message">Message:</label><br>
            <textarea id="message" name="message" ></textarea><br>

            <!-- Submit button -->
            <input type="submit" value="Submit">
        </form>
    </div>
</div>
</body>
</html>

