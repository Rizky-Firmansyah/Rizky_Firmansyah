<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Use Voucher</title>
    <link rel="icon" href="{{ asset('/logo/logo-garuda.png') }}" type="image/x-icon" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <a href="/" class="btn btn-primary btn-sm mb-2">Back</a>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Gunakan Voucher</h5>
            </div>
            <div class="card-body">
                <form action="/use-voucher-purchase" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="voucherCode">Masukkan Kode Voucher</label>
                        <input type="text" class="form-control" id="voucherCode" name="voucherCode" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Gunakan Voucher</button>
                </form>
                <div class="mt-3">
                    @if (session('message'))
                        <div class="alert {{ session('status') ? 'alert-success' : 'alert-danger' }}" role="alert">
                            {{ session('message') }}

                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>
