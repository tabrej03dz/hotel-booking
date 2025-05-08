<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Payment
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">
                    Add Payment
                </h2>

                @if ($errors->any())
                    <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('payment.store') }}" method="POST" class="space-y-4">
                    @csrf

                    <input type="hidden" name="booking_id" value="{{ $booking->id }}">

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Payment Method</label>
                        <select name="payment_method" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200" required>
                            <option value="">Select payment method</option>
                            <option value="card" {{ old('payment_method') == 'card' ? 'selected' : '' }}>Card</option>
                            <option value="cash" {{ old('payment_method') == 'cash' ? 'selected' : '' }}>Cash</option>
                            <option value="online" {{ old('payment_method') == 'online' ? 'selected' : '' }}>Online</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Amount</label>
                        <input type="number" name="amount" step="0.01"
                               value="{{ old('amount') }}"
                               class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200"
                               placeholder="Enter amount" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Status</label>
                        <select name="status" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200" required>
                            @php
                                $statuses = ['pending' => 'Pending', 'paid' => 'Paid', 'failed' => 'Failed'];
                            @endphp
                            @foreach($statuses as $value => $label)
                                <option value="{{ $value }}" {{ old('status', 'pending') == $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <button type="submit"
                                class="px-6 py-2 bg-green-500 text-black font-semibold rounded-lg shadow-md hover:bg-green-600 transition">
                            Submit Payment
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
