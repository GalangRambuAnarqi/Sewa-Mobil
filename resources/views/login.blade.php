<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{-- Font Awesome --}}
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css'
        integrity='sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw=='
        crossorigin='anonymous' />
    <title>Login</title>
</head>

<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6 col-lg-5">
                <div class="w-100 p-4 bg-white shadow-sm rounded">
                    <div class="w-100 mb-4">
                        <div style="width: 70px;height:70px;"
                            class="text-white bg-primary rounded-circle d-flex justify-content-center align-items-center m-auto mb-2">
                            <i class="fas fa-user fs-3"></i>
                        </div>
                    </div>
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form action="{{ route('auth') }}" method="post">
                        @csrf
                        <div class="mb-4">
                            <input type="text" class="form-control" placeholder="Email" name="email">
                        </div>
                        <div class="mb-4">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        <hr>
                        <p class="fs-6 mb-3">Belum punya akun ? <a href="{{ route('register') }}"
                                class="link-primary">Daftar
                                sekarang</a>.</p>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>
