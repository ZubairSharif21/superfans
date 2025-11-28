<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Redsys InSite Iframe Payment</title>
    <script src="https://sis-t.redsys.es:25443/sis/NC/sandbox/redsysV3.js"></script>
</head>
<body>
    <h2>Pay €10.00 using Redsys InSite</h2>

    <div id="card-form"></div>

    <form id="paymentForm" method="POST" action="{{ route('redsys.insite.charge') }}">
        @csrf
        <input type="hidden" id="token" name="token">
        <input type="hidden" id="order" name="order">
        <input type="hidden" id="errorCode" name="errorCode">
        <button type="submit" id="submitBtn" style="display:none;">Complete Payment</button>
    </form>

    <script>
        function generateOrderId() {
            return 'order' + Math.floor(Math.random() * 100000000);
        }

        const orderId = generateOrderId();
        document.getElementById('order').value = orderId;

        function merchantValidationExample() {
            return true; // You can add your own logic here
        }

        window.addEventListener("message", function receiveMessage(event) {
            storeIdOper(event, "token", "errorCode", merchantValidationExample);

            setTimeout(() => {
                const token = document.getElementById('token').value;
                const error = document.getElementById('errorCode').value;

                if (token && !error) {
                    document.getElementById('submitBtn').click();
                } else {
                    alert('Error during card tokenization: ' + error);
                }
            }, 1000);
        });

        getInSiteForm(
            'card-form', '', '', '', '', 'Pay Now',
            '{{ env("REDSYS_MERCHANT_CODE") }}',
            '{{ env("REDSYS_TERMINAL") }}',
            orderId,
            'ES',
            true
        );
    </script>
</body>
</html>
