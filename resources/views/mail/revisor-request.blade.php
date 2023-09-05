<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nuova richiesta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>

    <div class="container-fluid bg-mail position-relative vh-100">

        {{-- <img src="{{ $message->embed(public_path() . '/media/logo-navbar-transformed.png') }}" alt="" --}}
        {{-- class="immagine-mail"> --}}

        <div class="row h-100">
            <div class="col-12 text-center colonna-mail">
                <h1 class="tx-s tx-shadow ff-p display-3">Un utente ha richiesto di diventare <span
                        class="tx-p tx-shadow">Revisor</span></h1>
                <p class="tx-p mt-5 fs-3">Nome:<span class="ms-2 tx-s">{{ $user->name }}</span></p>
                <p class="tx-p fs-3">Email:<span class="ms-2 tx-s">{{ $user->email }}</span></p>
                <p class="tx-p fs-3">Messaggio:<span class="ms-2 tx-s">{{ $description }}</span>
                </p>
                <a href="{{ route('make.revisor', compact('user')) }}" class="text-decoration-none mt-2 fs-4"><button
                        class="btn btn-primary"> Rendi
                        revisore</button> </a>
            </div>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
