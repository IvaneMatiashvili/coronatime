<!doctype html>
<title>coronatime</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
@vite('resources/css/app.css')

<style>
    body {
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }


    .content-container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 32.5rem;
    }


    .confirmation {
        font-weight: 900;
        font-size: 25px;
        margin-top: 3.5rem;
        color: #010414;
    }

    .info {
        font-weight: 400;
        font-size: 18px;
        margin-top: 1rem;
        color: #010414;
    }
    a {
        font-weight: 900;
        font-size: 1rem;
        margin-top: 1.5rem;
        color: #FFFFFF;
        background: #0FBA68;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 24.5rem;
        height: 3.5rem;
        border-radius: 8px;
        text-decoration: none;
    }
</style>

<body>
        {{ $slot }}
</body>
</html>
