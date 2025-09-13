<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Struk Pesanan #{{ $order->id }}</title>
    @vite('resources/css/app.css')
    <style>
        @media print {
            @page {
                size: A4 landscape;
                margin: 10mm;
            }
        }
    </style>
</head>
<body class="bg-white p-6">
    <div class="max-w-full">
        {{-- Header --}}
        <div class="flex justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold">Toko Online</h1>
                <p class="text-sm text-gray-600">Jl. Contoh No. 123, Kudus</p>
                <p class="text-sm text-gray-600">Telp: 0812-3456-7890</p>
            </div>
            <div class="text-right">
                <h2 class="font-semibold">Invoice #{{ $order->id }}</h2>
                <p class="text-sm">Tanggal: {{ $order->created_at->format('d M Y H:i') }}</p>
            </div>
        </div>

        {{-- Info Pengiriman --}}
        <div class="grid grid-cols-2 gap-6 mb-6">
            <div>
                <h3 class="font-semibold mb-1">Penerima:</h3>
                <p>{{ $order->user?->name ?? '-' }}</p>
                <p>{{ $order->shipping_address }}</p>
                <p class="text-sm text-gray-600">Metode Bayar: {{ $order->payment_method }}</p>
            </div>
            <div>
                <h3 class="font-semibold mb-1">Pengirim:</h3>
                <p>Toko Online</p>
                <p>Jl. Contoh No. 123, Kudus</p>
                <p class="text-sm text-gray-600">Telp: 0812-3456-7890</p>
            </div>
        </div>

        {{-- Table Produk --}}
        <table class="w-full border border-gray-300 text-sm mb-6">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 px-2 py-1 text-left">Produk</th>
                    <th class="border border-gray-300 px-2 py-1 text-center">Qty</th>
                    <th class="border border-gray-300 px-2 py-1 text-right">Harga</th>
                    <th class="border border-gray-300 px-2 py-1 text-right">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                    <tr>
                        <td class="border border-gray-300 px-2 py-1">{{ $item->product?->name ?? 'Produk dihapus' }}</td>
                        <td class="border border-gray-300 px-2 py-1 text-center">{{ $item->quantity }}</td>
                        <td class="border border-gray-300 px-2 py-1 text-right">Rp {{ number_format($item->price,0,',','.') }}</td>
                        <td class="border border-gray-300 px-2 py-1 text-right">Rp {{ number_format($item->price * $item->quantity,0,',','.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Total --}}
        <div class="text-right font-bold text-lg">
            Total: Rp {{ number_format($order->total,0,',','.') }}
        </div>
    </div>

    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</body>
</html>
