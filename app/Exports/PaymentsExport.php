<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PaymentsExport implements FromCollection, WithHeadings
{
    protected $payments;

    public function __construct(Collection $payments)
    {
        $this->payments = $payments;
    }

    public function collection()
    {
        return $this->payments->map(function ($payment) {
            return [
                'Booking ID' => $payment->booking_id,
                'Customer' => $payment->booking->name ?? $payment->booking->user->name ?? '-',
                // 'Phone' => $payment->booking->phone ?? '-',
                'Phone' => " " . ($payment->booking->phone ?? '-'),
                'Payment Method' => $payment->payment_method,
                'Gateway' => $payment->gateway,
                // 'Transaction ID' => $payment->transaction_id,
                'Amount' => $payment->amount,
                'Status' => ucfirst($payment->status),
                'Paid Date' => optional($payment->created_at)->format('d-m-Y h:i A'),
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Booking ID',
            'Customer',
            'Phone',
            'Payment Method',
            'Gateway',
            // 'Transaction ID',
            'Amount',
            'Status',
            'Paid Date',
        ];
    }
}