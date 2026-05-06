<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BookingsExport implements FromCollection, WithHeadings
{
    protected $bookings;

    public function __construct(Collection $bookings)
    {
        $this->bookings = $bookings;
    }

    public function collection()
    {
        return $this->bookings->map(function ($booking) {
            return [
                'Booking ID' => $booking->booking_id,
                'Name' => $booking->name,
                'Email' => $booking->email,
                // 'Phone' => $booking->phone,
                'Phone' => " " . ($payment->booking->phone ?? '-'),
                'Room Type' => $booking->roomType->name ?? '-',
                'Check In' => $booking->check_in_date,
                'Check Out' => $booking->check_out_date,
                'Days' => $booking->staying_days,
                'Adults' => $booking->adults,
                'Children' => $booking->children,
                'Extra Person' => $booking->extra_person,
                'Rooms' => $booking->rooms,
                'Amount' => $booking->amount,
                'Service Charge' => $booking->additional_service_charge,
                'Tax & Fee' => $booking->tax_and_fee,
                'Total Amount' => $booking->total_amount,
                'GST Number' => $booking->gst_number,
                'Company Name' => $booking->company_name,
                'Status' => $booking->status,
                'Created At' => optional($booking->created_at)->format('d-m-Y h:i A'),
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Booking ID',
            'Name',
            'Email',
            'Phone',
            'Room Type',
            'Check In',
            'Check Out',
            'Days',
            'Adults',
            'Children',
            'Extra Person',
            'Rooms',
            'Amount',
            'Service Charge',
            'Tax & Fee',
            'Total Amount',
            'GST Number',
            'Company Name',
            'Status',
            'Created At',
        ];
    }
}