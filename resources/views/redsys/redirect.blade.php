<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Redirecting to Redsys...</title>
</head>
<body onload="document.forms['redsys_form'].submit();">
    <h3>Redirecting to payment...</h3>

<form name="redsys_form" method="POST" action="{{ $redsysUrl }}">
    <input type="hidden" name="Ds_SignatureVersion" value="{{ $signatureVersion }}">
    <input type="hidden" name="Ds_MerchantParameters" value="{{ $merchantParameters }}">
    <input type="hidden" name="Ds_Signature" value="{{ $signature }}">
    <button type="submit">Pay with Redsys</button>
</form>

<script>
    // Auto-submit form (optional)
    document.redsys_form.submit();
</script>


</body>
</html>
    // Auto-submit form (optional)
    document.redsys_form.submit();
</script>


</body>
</html>
