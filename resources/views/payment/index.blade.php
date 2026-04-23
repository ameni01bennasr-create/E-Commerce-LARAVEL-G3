<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DREAM - Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root { --purple-dream: #6f42c1; }
        body { background: #f4f0fa; font-family: 'Poppins', sans-serif; }
        .payment-card { border-radius: 20px; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.1); background: white; }
        .credit-card-sim {
            background: linear-gradient(135deg, #6f42c1, #a64dff);
            color: white; border-radius: 15px; padding: 25px; margin-bottom: 30px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card payment-card p-4">
                <h3 class="fw-bold mb-4 text-center" style="color: var(--purple-dream);">Secure Checkout</h3>
                
                <div class="credit-card-sim shadow">
                    <div class="d-flex justify-content-between mb-4">
                        <span class="fw-bold">DREAM CARD</span>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Mastercard-logo.svg/1280px-Mastercard-logo.svg.png" width="50" alt="Mastercard">
                    </div>
                    <div class="fs-4 mb-4">**** **** **** 1234</div>
                    <div class="d-flex justify-content-between">
                        <span>{{ Auth::user()->name }}</span>
                        <span>12/28</span>
                    </div>
                </div>

                <form action="{{ route('payment.process') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Card Number</label>
                        <input type="text" class="form-control" placeholder="0000 0000 0000 0000" required>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label class="form-label">Expiry Date</label>
                            <input type="text" class="form-control" placeholder="MM/YY" required>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label">CVV</label>
                            <input type="password" class="form-control" placeholder="***" required>
                        </div>
                    </div>
                    
                    <div class="text-center my-4">
                        <h4 class="fw-bold">Total to pay: {{ $total }} TND</h4>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-3 fw-bold shadow" style="background: var(--purple-dream); border: none;">Confirm Payment</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>