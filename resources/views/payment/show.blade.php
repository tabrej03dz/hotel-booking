<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center bg-white shadow-md px-6 py-4 rounded-lg">
            <h2 class="font-bold text-2xl text-gray-800">
                Payment Details
            </h2>

            <a href="{{ route('payment.index') }}"
               class="px-5 py-2 bg-gray-700 hover:bg-gray-800 text-white rounded-xl shadow-md text-sm">
                Back
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-xl rounded-2xl p-6 border border-gray-100">

                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">💰 Payment Information</h2>

                    <span class="px-4 py-2 rounded-full text-sm font-semibold
                        @if($payment->status == 'paid') bg-green-100 text-green-700
                        @elseif($payment->status == 'pending') bg-yellow-100 text-yellow-700
                        @else bg-red-100 text-red-700
                        @endif">
                        {{ ucfirst($payment->status) }}
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div class="bg-gray-50 rounded-2xl border border-gray-200 p-5">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">Basic Details</h3>

                        <div class="space-y-3 text-sm">
                            <div class="flex justify-between border-b pb-2">
                                <span class="font-semibold text-gray-600">Payment ID</span>
                                <span class="text-gray-800">{{ $payment->id }}</span>
                            </div>

                            <div class="flex justify-between border-b pb-2">
                                <span class="font-semibold text-gray-600">Booking ID</span>
                                <span class="text-gray-800">{{ $payment->booking_id }}</span>
                            </div>

                            <div class="flex justify-between border-b pb-2">
                                <span class="font-semibold text-gray-600">Payment Method</span>
                                <span class="text-gray-800 capitalize">{{ $payment->payment_method }}</span>
                            </div>

                            <div class="flex justify-between border-b pb-2">
                                <span class="font-semibold text-gray-600">Gateway</span>
                                <span class="text-gray-800">{{ $payment->gateway ?? '-' }}</span>
                            </div>

                            <div class="flex justify-between">
                                <span class="font-semibold text-gray-600">Amount</span>
                                <span class="text-gray-900 font-bold">₹{{ number_format($payment->amount, 2) }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-2xl border border-gray-200 p-5">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">Transaction Details</h3>

                        <div class="space-y-3 text-sm">
                            <div class="flex justify-between border-b pb-2">
                                <span class="font-semibold text-gray-600">Transaction ID</span>
                                <span class="text-gray-800 break-all">{{ $payment->transaction_id ?? '-' }}</span>
                            </div>

                            <div class="flex justify-between border-b pb-2">
                                <span class="font-semibold text-gray-600">PayU Mihpay ID</span>
                                <span class="text-gray-800 break-all">{{ $payment->payu_mihpayid ?? '-' }}</span>
                            </div>

                            <div class="flex justify-between border-b pb-2">
                                <span class="font-semibold text-gray-600">Created At</span>
                                <span class="text-gray-800">{{ optional($payment->created_at)->format('d M Y, h:i A') }}</span>
                            </div>

                            <div class="flex justify-between">
                                <span class="font-semibold text-gray-600">Updated At</span>
                                <span class="text-gray-800">{{ optional($payment->updated_at)->format('d M Y, h:i A') }}</span>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="mt-6 bg-gray-50 rounded-2xl border border-gray-200 p-5">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Customer / Booking Details</h3>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                        <div>
                            <p class="font-semibold text-gray-600">Customer Name</p>
                            <p class="text-gray-800 mt-1">{{ $payment->booking->user->name ?? $payment->booking->name ?? '-' }}</p>
                        </div>

                        <div>
                            <p class="font-semibold text-gray-600">Email</p>
                            <p class="text-gray-800 mt-1">{{ $payment->booking->user->email ?? $payment->booking->email ?? '-' }}</p>
                        </div>

                        <div>
                            <p class="font-semibold text-gray-600">Phone</p>
                            <p class="text-gray-800 mt-1">{{ $payment->booking->phone ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                {{-- <div class="mt-6 bg-gray-50 rounded-2xl border border-gray-200 p-5">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Response Data</h3>

                    <pre class="bg-gray-900 text-green-300 rounded-xl p-4 text-xs overflow-x-auto whitespace-pre-wrap">{{ json_encode(json_decode($payment->response_data), JSON_PRETTY_PRINT) ?: ($payment->response_data ?? '-') }}</pre>
                </div> --}}

                <div class="mt-6 bg-gray-50 rounded-2xl border border-gray-200 p-5">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Raw Request</h3>

                    <pre class="bg-gray-900 text-green-300 rounded-xl p-4 text-xs overflow-x-auto whitespace-pre-wrap">{{ json_encode(json_decode($payment->raw_request), JSON_PRETTY_PRINT) ?: ($payment->raw_request ?? '-') }}</pre>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>