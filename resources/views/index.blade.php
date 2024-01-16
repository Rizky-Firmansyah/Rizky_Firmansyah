<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cek Total Belanja</title>
    <link rel="icon" href="{{ asset('/logo/logo-garuda.png') }}" type="image/x-icon" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Cek Total Belanja</h5>
            </div>
            <div class="card-body">
                <form action="/check-voucher" method="post">
                    @csrf
                    <div class="form-group">
                        <div id="shopping-list">
                            <!-- Container for shopping list -->
                        </div>
                        <button type="button" class="btn btn-success mt-2 mb-4" onclick="addShoppingItem()">Tambah
                            Belanja</button>
                        <br>
                        <label for="totalPurchase">Total Pembelian (Rp)</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="number" class="form-control" id="totalPurchase" name="totalPurchase" required
                                readonly>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Cek Voucher Diskon</button>
                    </div>
                </form>

                @if (session('message'))
                    <div class="alert {{ session('status') ? 'alert-success' : 'alert-danger' }}" role="alert"
                        id="alert-success">
                        {{ session('message') }}
                        @if (session('status'))
                            <br>
                            <a href="/use-voucher" class="btn btn-primary mt-2">Gunakan Voucher</a>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <script>
        let shoppingCounter = 0;

        function addShoppingItem() {
            shoppingCounter++;

            const shoppingList = document.getElementById('shopping-list');
            const newItem = document.createElement('div');
            newItem.innerHTML = `
                <label for="totalPurchase${shoppingCounter}">Harga Barang Belanja ${shoppingCounter}</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp.</span>
                    </div>
                    <input type="number" class="form-control shopping-item" id="totalPurchase${shoppingCounter}" 
                        name="totalPurchase${shoppingCounter}" placeholder="Masukkan Harga Barang Belanja ${shoppingCounter}" required oninput="calculateTotal()">
                </div>
            `;
            shoppingList.appendChild(newItem);
        }

        function calculateTotal() {
            const shoppingItems = document.querySelectorAll('.shopping-item');
            let total = 0;
            shoppingItems.forEach(item => {
                total += parseInt(item.value) || 0;
            });
            document.getElementById('totalPurchase').value = total;
        }
    </script>
</body>

</html>
