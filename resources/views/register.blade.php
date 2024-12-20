<x-layouts>
    {{-- Custom CSS --}}
    <style>
        body {
            background: linear-gradient(to right, #b36cd4, #896acc);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
        }

        .form-container {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 800px;
            width: 100%;
        }

        .logo img {
            width: 64px;
            height: 64px;
        }

        .logo h2 {
            font-weight: 700;
            color: #007bff;
            margin: 0;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color:#6c757d;
            border: none;
            transition: background-color 0.3s;
        }

        .btn-secondary:hover {
            background-color: #616161;
        }
    </style>
    {{-- End of Custom CSS --}}

    <div class="container-fluid">
        <div class="container">
            <div class="row justify-content-center align-items-center" style="height: 100vh;">
                <div class="col-md-9">
                        <div class="form-container">
                            <div class="logo d-flex align-items-center mb-4">
                            <img src="images/1720752709883.png" alt="TrustyBite Logo">
                            <h2 class="ms-3">TrustyBite</h2>
                        </div>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Terjadi kesalahan!</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                        <form action="/CreateRegister" method="POST" class="row g-4">
                            @csrf

                            <div class="col-md-6">
                                <label class="form-label" for="name">Nama</label>
                                <input type="text" name="name" class="form-control" id="name" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="name_company">Nama Usaha</label>
                                <input type="text" name="name_company" class="form-control" id="name_company" required>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label" for="address">Alamat</label>
                                <input type="text" name="address" class="form-control" id="address" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="number">No. Telpon/WA</label>
                                <input type="number" name="number" class="form-control" id="number" placeholder="+62 xxx xxx xxx" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="email">Email</label>
                            
                                <input type="email" name="email" class="form-control" id="email" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" required>
                            </div>

                            <div class="col-12 d-flex justify-content-between mt-3">
                                <a href="/" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Sign in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts>
