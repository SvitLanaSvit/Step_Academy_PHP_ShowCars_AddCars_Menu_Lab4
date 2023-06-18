<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        .title{
            text-align: center;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <hr>
        <h2 class="title">ADD CAR</h2>
        <div class="container">
            <form method="get">
                <div class="mb-3 w-25">
                    <label for="manufacturer" class="form-label">Manufacturer:</label>
                    <input type="text" name="manufacturer" class="form-control" required>
                </div>
                <div class="mb-3 w-25">
                    <label for="model" class="form-label">Model:</label>
                    <input type="text" name="model" class="form-control" required>
                </div>
                <div class="mb-3 w-25">
                    <label for="price" class="form-label">Price:</label>
                    <input type="number" name="price" class="form-control" min="0" required>
                </div>
                <div class="mb-3 w-25">
                    <label for="currency" class="form-label">Currency:</label>
                    <select class="form-select" name="currency" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="USD">USD</option>
                        <option value="EUR">EUR</option>
                    </select>
                </div>
                <div class="mb-3 w-25">
                    <label for="ps" class="form-label">PS:</label>
                    <input type="number" name="ps" class="form-control" min="0" required>
                </div>
                <div class="mb-3 w-25">
                    <label for="country" class="form-label">Country:</label>
                    <input type="text" name="country" class="form-control" required>
                </div>
                <input type="submit" name="submit" class="btn btn-outline-info" value="Save">
            </form>
        </div>
    </div>

</body>
</html>