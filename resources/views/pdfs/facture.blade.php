<!DOCTYPE html>
<html>
<head>
    <title>Invoice #{{ $facture->id }}</title>
    <meta charset="utf-8">
    <style>
        /* Basic styling for the PDF. Keep it simple for better compatibility with DomPDF. */
        body {
            font-family: 'DejaVu Sans', sans-serif; /* Important for non-ASCII characters like Arabic, Cyrillic */
            font-size: 12px;
            line-height: 1.6;
            color: #333;
        }
        h1, h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }
        .container {
            width: 90%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
        .invoice-header, .invoice-footer {
            text-align: center;
            margin-bottom: 20px;
        }
        .invoice-details, .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .invoice-details th, .invoice-details td,
        .items-table th, .items-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .items-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .total-section {
            text-align: right;
            margin-top: 30px;
            font-size: 14px;
        }
        .total-section strong {
            font-size: 16px;
            color: #2c3e50;
        }
        .note {
            margin-top: 40px;
            font-size: 10px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="invoice-header">
            <h1>Invoice</h1>
            <h2>#{{ $facture->id }}</h2>
        </div>

        <table class="invoice-details">
            <tr>
                <th>Invoice Number:</th>
                <td>{{ $facture->id }}</td>
            </tr>
            <tr>
                <th>Date:</th>
                <td>{{ $facture->created_at->format('Y-m-d H:i:s') }}</td>
            </tr>
            <tr>
                <th>Status:</th>
                <td>{{ $facture->status }}</td>
            </tr>
            @if($facture->reservation)
            <tr>
                <th>Reservation ID:</th>
                <td>{{ $facture->reservation->id }}</td>
            </tr>
            <tr>
                <th>Reservation Date:</th>
                <td>{{ $facture->reservation->created_at->format('Y-m-d') }}</td>
            </tr>
            @endif
        </table>

        <h2>Summary</h2>
        <table class="items-table">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Total Charge for Services/Products</td>
                    <td>{{ number_format($facture->montant, 2) }}</td>
                </tr>
                </tbody>
        </table>

        <div class="total-section">
            Total Amount: <strong>{{ number_format($facture->montant, 2) }}</strong>
        </div>

        <div class="invoice-footer">
            <p class="note">Thank you for your business!</p>
        </div>
    </div>
</body>
</html>