<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Modified Diagrams</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Language" content="ur">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/shapes.css') }}">
</head>


<body class="body">

<div class="container">
    <div class="shapes">
        <svg width="400" height="400">
        <!-- Rectangle -->
        <rect x="50" y="50" width="{{ $rectLength }}" height="{{ $rectWidth }}" style="fill:red;" />
            <!-- Square -->
            <rect x="200" y="50" width="{{ $sqLength }}" height="{{ $sqWidth }}" style="fill:blue;" />
            <!-- Triangle -->
            <polygon points="50,250 150,250 100,150" style="fill:green;" />
            <!-- Box -->
            <rect x="200" y="200" width="{{ $rectLength }}" height="{{ $rectWidth }}" style="fill:yellow;" />
        </svg>
    </div>
 
 
    <div class="formData">  
        <h1>Modified Shapes</h1>
        <!-- Display the parameters and any other modifications -->
        <p>Rectangle Length (X): {{ $rectLength }}  x  Width (Y): {{ $rectWidth }}</p>
        <p>Square Length (X): {{ $sqLength }}  x  Width (Y): {{ $sqWidth }}</p>
        <p>Message: {{ $message }}</p>
     </div>   
        {{-- Form to input new data --}}
        <div class="newFormData">
            <h2>Enter New Data</h2>
            
<form method="POST" action="{{ route('shapes.process') }}">
     @csrf {{-- Cross-Site Request Forgery protection --}}
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
    
            <input type="submit" value="Submit">
            </form>
        </div>
</div>
</body>
</html>
