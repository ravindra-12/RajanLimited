<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consultant Directory</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #e0c3fc 0%, #8ec5fc 100%);
            font-family: 'Segoe UI', 'Roboto', 'Arial', sans-serif;
        }
        .card {
            box-shadow: 0 4px 20px rgba(72, 81, 160, 0.16);
            border-radius: 1.25rem;
            border: none;
            background: rgba(255,255,255,0.93);
        }
        .list-group-item {
            font-size: 1.12rem;
            font-weight: 500;
            background: #f4faff;
            border: none;
            margin-bottom: 12px;
            border-radius: 0.75rem !important;
            transition: background 0.26s, transform 0.26s;
            box-shadow: 0 2px 8px rgba(140, 180, 255, 0.08);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .list-group-item:hover {
            background: #e0f0ff;
            transform: scale(1.02);
        }
        .directory-title {
            font-weight: 800;
            color: #40316e;
            letter-spacing: 1px;
            font-size: 2rem;
        }
        .back-btn {
            position: fixed;
            top: 2rem;
            left: 2rem;
            z-index: 1000;
            display: flex;
            align-items: center;
            background: linear-gradient(90deg, #8ec5fc 0%, #e0c3fc 100%);
            color: #40316e;
            font-weight: 600;
            border: none;
            border-radius: 2em;
            padding: 0.6em 1.5em;
            box-shadow: 0 2px 10px rgba(72, 81, 160, 0.13);
            transition: background 0.23s, box-shadow 0.23s;
            cursor: pointer;
        }
        .back-btn:hover {
            background: linear-gradient(90deg, #e0c3fc 0%, #8ec5fc 100%);
            box-shadow: 0 4px 18px rgba(72, 81, 160, 0.27);
            color: #5c469c;
        }
        .see-details-btn {
            font-size: 0.9rem;
            font-weight: 600;
            color: #4064bf;
            background-color: #d9e8ff;
            border: none;
            border-radius: 0.65rem;
            padding: 0.25em 1em;
            transition: background-color 0.25s, color 0.25s;
            cursor: pointer;
        }
        .see-details-btn:hover {
            background-color: #a7c1ff;
            color: #1a3a94;
        }
        @media (max-width: 767px) {
            .back-btn {
                top: 1rem;
                left: 1rem;
                padding: 0.5em 1em;
                font-size: 0.95em;
            }
            .card {
                padding: 1.2em !important;
            }
        }
    </style>
</head>
<body>
    <a href="/">
    <button class="back-btn">
        &larr; Back
    </button>
</a>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card p-5">
                    <h2 class="mb-4 text-center directory-title"> All Consultant </h2>
                    <ul class="list-group">
                        @foreach ($consultant as $item )
                            <li class="list-group-item">
                          {{ $item->consultant_name }}
                            <a href="{{ route('consultant.details', $item->id) }}">
                            <button class="see-details-btn">See Details</button>
                            </a>
                        </li>
                        @endforeach
                        
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
