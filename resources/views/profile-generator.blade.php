<!DOCTYPE html>
<html>
<head>
    <title>User Profile Generator</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            line-height: 1.6; 
            max-width: 800px; 
            margin: 20px auto; 
            padding: 20px;
            background: #f9f9f9;
        }
        h1 { 
            color: #2c3e50; 
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
        }
        .sentence-card {
            background: white;
            padding: 15px;
            margin-bottom: 15px;
            border-left: 4px solid #3498db;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .sentence-card:nth-child(even) {
            border-left-color: #e74c3c;
        }
        .original-data {
            background: #f0f8ff;
            padding: 15px;
            margin: 20px 0;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>User Profile Variations</h1>
    
    <div class="original-data">
        <h3>Original User Data:</h3>
        <pre><?php echo json_encode($user, JSON_PRETTY_PRINT); ?></pre>
    </div>

    <h2>Generated Sentences:</h2>
    @foreach($sentences as $sentence)
        <div class="sentence-card">
            {!! nl2br(e($sentence)) !!}
        </div>
    @endforeach
    
    <div class="meta">
        <small>Generated on: {{ now()->format('Y-m-d H:i:s') }}</small>
    </div>
</body>
</html>