<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Verify Your Email Address</h2>

<div>
    Thank you for registering on IngredientDaddy, the best recipe search engine on the web! <br/>
    Please follow the link below to verify your email address:
    {{ URL::to('register/verify/' . $confirmation_code) }}.<br/>
</div>

</body>
</html>