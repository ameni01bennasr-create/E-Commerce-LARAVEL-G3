<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DREAM - Your Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root { --purple-dream: #6f42c1; --dark-purple: #4b2c85; }
        body { background: #f4f0fa; font-family: 'Poppins', sans-serif; }
        .navbar { background: var(--dark-purple); }
        .cart-card { border-radius: 15px; border: none; box-shadow: 0 5px 15px rgba(0,0,0,0.05); background: white; }
        .btn-checkout { background: var(--purple-dream); color: white; border-radius: 10px; font-weight: bold; border: none; }
        .btn-checkout:hover { background: var(--dark-purple); color: white; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top mb-5">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">DREAM</a>
            <div class="ms-auto d-flex align-items-center">
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle btn-sm" type="button" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow">
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item text-danger" type="submit">Log Out</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

<div class="container">
    <h2 class="fw-bold mb-4" style="color: var(--purple-dream);">Your Shopping Cart</h2>

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm">{{ session('success') }}</div>
    @endif

    <div class="row">
        <div class="col-md-8">
            @forelse($items as $item)
                <div class="card cart-card mb-3 p-3">
                    <div class="d-flex justify-content-between align-items-center text-dark">
                        <div>
                            <h5 class="fw-bold mb-1">{{ $item->titre }}</h5>
                            <span class="badge bg-soft-purple text-dark" style="background: #e9ecef;">{{ $item->type }}</span>
                            <p class="text-muted small mb-0 mt-2">{{ $item->description }}</p>
                        </div>
                        <div class="text-end text-dark">
                            <p class="fw-bold mb-2">{{ $item->prix }} TND</p>
                            <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-link text-danger text-decoration-none">Remove</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-5">
                    <h4>Your cart is empty.</h4>
                    <a href="/" class="btn btn-purple mt-3">Start a Journey</a>
                </div>
            @endforelse
        </div>

        @if($items->count() > 0)
        <div class="col-md-4">
            <div class="card cart-card p-4">
                <h4 class="fw-bold mb-4 text-dark">Summary</h4>
                <div class="d-flex justify-content-between mb-2 text-dark">
                    <span>Subtotal</span>
                    <span>{{ $total }} TND</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between mb-4 text-dark">
                    <span class="fw-bold">Total</span>
                    <span class="fw-bold text-primary fs-4">{{ $total }} TND</span>
                </div>
                <a href="{{ route('payment.index') }}" class="btn btn-checkout w-100 py-3">Proceed to Payment</a>
                <a href="/" class="btn btn-link w-100 text-muted mt-2 text-decoration-none">Continue Shopping</a>
            </div>
        </div>
        @endif
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>