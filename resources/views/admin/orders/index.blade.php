<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-bold">Pesanan</h1>

            <form method="GET" class="flex items-center gap-2">
                <select name="status" class="border rounded px-3 py-2">
                    <option value="">Semua Status</option>
                    @foreach($statuses as $s)
                        <option value="{{ $s }}" {{ $status === $s ? 'selected' : '' }}>
                            {{ ucfirst($s) }}
                        </option>
                    @endforeach
                </select>
                <button class="px-3 py-2 bg-gray-200 rounded">Filter</button>
            </form>
        </div>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-50 text-green-700 rounded">{{ session('success') }}</div>
        @endif

        <div class="bg-white rounded shadow overflow-hidden">
            <table class="min-w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left">#ID</th>
                        <th class="px-4 py-3 text-left">User</th>
                        <th class="px-4 py-3 text-left">Total</th>
                        <th class="px-4 py-3 text-left">Status</th>
                        <th class="px-4 py-3 text-left">Tanggal</th>
                        <th class="px-4 py-3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $o)
                        <tr class="border-t">
                            <td class="px-4 py-3">#{{ $o->id }}</td>
                            <td class="px-4 py-3">{{ $o->user?->name ?? '-' }}</td>
                            <td class="px-4 py-3">Rp {{ number_format($o->total,0,',','.') }}</td>
                            <td class="px-4 py-3">
                                <form action="{{ route('admin.orders.update', $o) }}" method="POST" class="flex items-center gap-2">
                                    @csrf @method('PUT')
                                    <select name="status" class="border rounded px-2 py-1">
                                        @foreach($statuses as $s)
                                            <option value="{{ $s }}" {{ $o->status === $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
                                        @endforeach
                                    </select>
                                    <button class="px-3 py-1 bg-gray-200 rounded">Simpan</button>
                                </form>
                            </td>
                            <td class="px-4 py-3">{{ $o->created_at->format('d M Y H:i') }}</td>
                            <td class="px-4 py-3">
                                <a href="{{ route('admin.orders.show', $o) }}" class="text-indigo-600">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="p-4">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
