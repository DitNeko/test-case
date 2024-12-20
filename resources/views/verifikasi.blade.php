<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3 class="text-center mb-4">Email Verification Required</h3>

                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif

                <p class="text-center">Please check your email for a verification link. If you didn't receive the email, click the button below to request a new link.</p>

                <!-- Form untuk Mengirim Ulang Email Verifikasi -->
                <form action="{{route('verification.send')}}" method="POST">
                    @csrf
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Resend Verification Email</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Link Bootstrap JS dan Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
