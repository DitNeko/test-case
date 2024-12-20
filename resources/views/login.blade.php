<x-layouts>
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
            width: 100%;
            max-width: 500px;
        }

        .logo img {
            width: 80px;
            height: 80px;
        }

        .logo-name p {
            font-size: 28px;
            font-weight: 600;
            color: #007bff;
            margin-top: 10px;
            text-align: center;
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
            background-color: #6c757d;
            border: none;
            transition: background-color 0.3s;
        }

        .btn-secondary:hover {
            background-color: #616161;
        }
    </style>


    <div class="container-fluid">
    
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <form class="form-container" method="POST">
                @csrf
                <div class="logo text-center mb-4">
                    <img src="images/1720752709883.png" alt="Chlorine Logo">
                    <div class="logo-name">
                        <p>TrustyBite</p>
                    </div>
                </div>

                
                    <label for="exampleInputEmail1" class="form-label">Email Address</label>
                    <div class="mb-3">
                        @if (Session::has('error'))
                        <div class="fw-bold" style="color:red">
                          *{{Session::get('error')}}
                        </div>
                    @endif
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{ old('email') }}" aria-describedby="emailHelp" required>
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="/" class="btn btn-secondary">Cancel</a>
                </div>

                <p class="mt-3 text-center">Belum punya akun? <a href="/register">Register</a></p>
            </form>
        </div>
    </div>
</x-layouts>
