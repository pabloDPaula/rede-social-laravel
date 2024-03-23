<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link href="https://bootswatch.com/5/cyborg/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div style="background-color: #f7ebeb; height: 50vh;" class="w-100">
    </div>
    <div style='width: 300px; height: 300px; background-color:#fff; position: absolute; top: 50%; left: 50%; transform:translate(-50%, -50%); box-shadow: 3px 4px 5px #e5e5e5; padding: 40px;' class='d-flex justify-content-center align-items-center'>   
        <form action="{{ route('admin.login') }}" method="post" class="w-100">
            @csrf
            @error('login')
                <div class="mt-3 mb-3 d-block invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name='email' id="email" placeholder="name@example.com" value='{{ old('email') }}'>
                @error('email')
                    <div class="mt-3 d-block invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" name='password' id="password">
                @error('password')
                    <div class="mt-3 d-block invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div>
                <button type="submit" class="btn btn-outline-info w-100 mb-3">Logar</button>
              </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"></script>
</body>

</html>