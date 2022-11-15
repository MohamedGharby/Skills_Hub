<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SkillsHub Email</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">{{ $title }}</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <h2 class="offset-md-1">
                        Hello {{ $name }}
                    </h2>
                </div>
                <div class="row">
                    <p class="p-3">
                        {{ $body }}
                    </p>
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>