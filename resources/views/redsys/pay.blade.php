<!DOCTYPE html>
<html>
<head>
    <title>Test Payment</title>
</head>
<body>
    <h2>Test Redsys Payment</h2>

    <form action="{{ route('redsys.test') }}" method="POST">
        @csrf
        <label for="amount">Enter amount (€):</label>
        <input type="number" name="amount" id="amount" step="0.01" min="0.01" required>

        <button type="submit">💳 Pay Now</button>
    </form>
</body>
</html>
