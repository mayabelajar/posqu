<!DOCTYPE html>
<html>
<head>
    <title>Payment Method</title>
</head>
<body>
    <h1>Choose Payment Method</h1>

    <form action="{{ route('payment.index') }}" method="POST">
        @csrf

        <div>
            <label for="payment_method">Payment Method:</label>
            <select name="payment_method" id="payment_method">
                <option value="cash">Cash</option>
                <option value="card">Card</option>
                <option value="bank