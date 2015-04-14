<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Reset your password</h2>

<div>
    You have requested a password reset on IngredientDaddy, the best recipe search engine on the web. <br/>
    Please follow the link below to reset your password:
    <a href="{{ url('password/reset/'.$token) }}">{{ url('password/reset/'.$token) }}</a>.<br/>
</div>

</body>
</html>
