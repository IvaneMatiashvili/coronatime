@props(['fontUrl'])
<!doctype html>
<title>coronatime</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
@vite('resources/css/app.css')

<style>
    @font-face {
        font-family: 'Inter';
        font-style: normal;
        src:  url({{ $fontUrl }}) format("truetype");
    }
    body {
        height: 100vh;
        display: block;
        overflow: hidden;
        width: 100vw;
    }

    img {
        display: block;
        margin-top: 5rem;
        margin-left: auto;
        margin-right: auto;
        width: 40%;
    }

    .confirmation {
        font-weight: 900;
        font-size: 25px;
        width: 100%;
        text-align: center;
        margin-top: 3.5rem;
        color: #010414;
        font-family: 'Inter', 'sans-serif';
    }

    .info {
        font-weight: 400;
        font-size: 18px;
        text-align: center;
        margin-top: 1rem;
        color: #010414;
        width: 100%;
        font-family: 'Inter', 'sans-serif';

    }
    a {
        font-weight: 900;
        font-size: 1rem;
        color: #FFFFFF;
        background: #0FBA68;
        display: block;
        margin: auto;
        text-align: center;
        width: 25%;
        border: 1rem solid #0FBA68;
        height: 1.5rem;
        border-radius: 8px;
        text-decoration: none;
        font-family: 'Inter', 'sans-serif';
    }
    @media (max-width: 600px) {
        body{
            width: 95vw;
            height: 85vh;
        }
        a {
            width: 16rem;
        }
        img {
            margin-top: 0 !important;
            height: 20rem;
            width: 19rem;
        }
    }
</style>

<body>
        {{ $slot }}
</body>
</html>
