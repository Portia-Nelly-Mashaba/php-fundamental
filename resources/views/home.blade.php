<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week 1 Activities | PHP Fundamentals</title>
    <style>
        :root {
            --primary: #3498db;
            --primary-dark:rgb(32, 111, 163);
            --secondary: #f9fafb;
            --text: #1f2937;
            --text-light: #6b7280;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            line-height: 1.5;
            color: var(--text);
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        header {
            text-align: center;
            margin-bottom: 3rem;
        }
        
        h1 {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 1rem;
        }
        
        .subtitle {
            font-size: 1.25rem;
            color: var(--text-light);
            max-width: 800px;
            margin: 0 auto 2rem;
        }
        
        .activities-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .activity-card {
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            overflow: hidden;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        
        .activity-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        
        .card-content {
            padding: 1.5rem;
        }
        
        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
            color: var(--primary-dark);
        }
        
        .card-description {
            color: var(--text-light);
            margin-bottom: 1.5rem;
        }
        
        .btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background-color: var(--primary);
            color: white;
            text-align: center;
            font-weight: 500;
            border-radius: 0.375rem;
            text-decoration: none;
            transition: background-color 0.2s;
        }
        
        .btn:hover {
            background-color: var(--primary-dark);
        }
        
        footer {
            text-align: center;
            margin-top: 4rem;
            color: var(--text-light);
            font-size: 0.875rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Week 1 Activities</h1>
            <p class="subtitle">
                This week focuses on reinforcing PHP fundamentals including variables, data types, 
                debugging techniques, and conditional logic through practical exercises.
            </p>
        </header>
        
        <div class="activities-grid">
            <div class="activity-card">
                <div class="card-content">
                    <h2 class="card-title">User Profile Generator</h2>
                    <p class="card-description">Generate multiple formatted sentences from user data with type validation and default handling.</p>
                    <a href="{{ route('profile-generator') }}" class="btn">Start Activity</a>
                </div>
            </div>
            
            <div class="activity-card">
                <div class="card-content">
                    <h2 class="card-title">Debugging Challenge</h2>
                    <p class="card-description">Practice identifying and fixing common PHP errors in broken scripts.</p>
                    <a href="{{ route('debugging-challenge') }}" class="btn">Start Activity</a>
                </div>
            </div>
            
            <div class="activity-card">
                <div class="card-content">
                    <h2 class="card-title">Access Control Logic</h2>
                    <p class="card-description">Implement role-based access control with conditional logic for different user types.</p>
                    <a href="{{ route('access-control', ['role' => 'admin']) }}" class="btn">Start Activity</a>
                </div>
            </div>
        </div>
        
        <footer>
            <p>© {{ date('Y') }} DigiInc PHP Fundamentals Refresher</p>
        </footer>
    </div>
</body>
</html>