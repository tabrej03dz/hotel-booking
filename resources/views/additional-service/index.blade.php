<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg mb-6 shadow-md">
                    ✅ {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-xl rounded-2xl p-6 border border-gray-100">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">💰 Additional Service</h2>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left border border-gray-200 rounded-lg overflow-hidden">
                        <thead class="bg-gradient-to-r from-indigo-50 to-indigo-100 text-gray-700 uppercase font-semibold text-xs">
                        <tr>
                            <th class="px-6 py-4">#</th>
                            <th class="px-6 py-4">Booking ID</th>
                            <th class="px-6 py-4">Customer</th>
                            <th class="px-6 py-4">Payment Method</th>
                            <th class="px-6 py-4">Amount</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4">Paid At</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                        @forelse ($payments as $payment)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 font-medium text-gray-800">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 text-gray-700">{{ $payment->booking_id }}</td>
                                <td class="px-6 py-4 text-gray-700">
                                    {{ $payment->booking->customer->name ?? '-' }}
                                </td>
                                <td class="px-6 py-4 text-gray-700 capitalize">{{ $payment->payment_method }}</td>
                                <td class="px-6 py-4 text-gray-700">₹{{ number_format($payment->amount, 2) }}</td>
                                <td class="px-6 py-4 text-gray-700 capitalize">
                                    <form action="{{ route('payment.status', $payment->id) }}" method="GET" onsubmit="return confirm('Are you sure you want to change the payment status?')">
                                        @csrf
                                        <select name="status"
                                                onchange="if(confirm('Are you sure you want to change the payment status?')) this.form.submit(); else this.value = '{{ $payment->status }}';"
                                                class="px-2 py-1 rounded text-xs font-semibold
                                            @if($payment->status == 'paid') bg-green-100 text-green-700
                                            @elseif($payment->status == 'pending') bg-yellow-100 text-yellow-700
                                            @else bg-red-100 text-red-700
                                            @endif">
                                            <option value="paid" {{ $payment->status == 'paid' ? 'selected' : '' }}>Paid</option>
                                            <option value="pending" {{ $payment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="failed" {{ $payment->status == 'failed' ? 'selected' : '' }}>Failed</option>
                                        </select>
                                    </form>

                                </td>

                                <td class="px-6 py-4 text-gray-700">{{ $payment->created_at->format('d M Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-6 text-gray-400 text-base">
                                    No payments found.
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
