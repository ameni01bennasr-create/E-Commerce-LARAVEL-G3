<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DREAM - Immersive Journeys</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root { --purple-dream: #6f42c1; --dark-purple: #4b2c85; }
        body { font-family: 'Poppins', sans-serif; }
        .navbar { background: var(--dark-purple); }
        .hero-section { background: linear-gradient(135deg, var(--purple-dream), #a64dff); color: white; padding: 100px 0; }
        .btn-purple { background: var(--purple-dream); color: white; border-radius: 25px; padding: 10px 30px; border: none; }
        .btn-purple:hover { background: var(--dark-purple); color: white; }
        .card-product { border: none; border-radius: 15px; transition: 0.3s; height: 100%; }
        .card-product:hover { transform: scale(1.05); }
        footer { background: #1a1a1a; color: white; padding: 40px 0; margin-top: 50px; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">DREAM</a>
            <div class="ms-auto d-flex align-items-center">
    @auth
        <a href="{{ route('cart.index') }}" class="btn btn-outline-light btn-sm me-3">
             Cart
        </a>

        <div class="dropdown">
            <button class="btn btn-light dropdown-toggle btn-sm text-purple" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                 {{ Auth::user()->name }}
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userMenu">
                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                
                <li><a class="dropdown-item fw-bold text-purple" href="{{ route('videos.my_videos') }}" style="color: #6f42c1;">My Journeys</a></li>
                
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="dropdown-item text-danger" type="submit">Log Out</button>
                    </form>
                </li>
            </ul>
        </div>
    @else
        <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm me-2">Log in</a>
        <a href="{{ route('register') }}" class="btn btn-light btn-sm text-purple">Register</a>
    @endauth
</div>
        </div>
    </nav>

    <header class="hero-section text-center">
        <div class="container">
            <h1 class="display-3 fw-bold">Experience Your Dreams</h1>
            <p class="lead">AI-powered immersive video journeys tailored for you.</p>
        </div>
    </header>

    <section id="products" class="py-5">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Our Experiences</h2>
            <div class="row g-4">
                @php 
                    $products = [
                        ['title' => 'Cultural Trip', 'icon' => '🏛️', 'desc' => 'Explore heritage sites.'],
                        ['title' => 'Memories', 'icon' => '📸', 'desc' => 'Revive your best moments.'],
                        ['title' => 'Future', 'icon' => '🚀', 'desc' => 'Visualize tomorrow.']
                    ];
                @endphp
                @foreach($products as $product)
                <div class="col-md-4 text-center">
                    <div class="card card-product shadow-sm p-4">
                        <div class="display-4 mb-3">{{ $product['icon'] }}</div>
                        <h4>{{ $product['title'] }}</h4>
                        <p class="text-muted">{{ $product['desc'] }}</p>
                        @auth
                            <a href="{{ route('videos.index', ['type' => $product['title']]) }}" class="btn btn-purple">Start Experience</a>
                        @else
                            <button type="button" class="btn btn-purple" data-bs-toggle="modal" data-bs-target="#authModal">Start Experience</button>
                        @endauth
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <footer class="text-center">
        <p>&copy; 2026 DREAM Project. All rights reserved.</p>
    </footer>

    <div class="modal fade" id="authModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background: rgba(255,255,255,0.2); backdrop-filter: blur(15px); border-radius: 20px; border: 1px solid rgba(255,255,255,0.3);">
                <div class="modal-body text-center p-5">
                    <h3 class="text-white fw-bold mb-4">Join the Dream</h3>
                    <div class="d-grid gap-3">
                        <a href="{{ route('login') }}" class="btn btn-light fw-bold">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-outline-light fw-bold">Create Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>