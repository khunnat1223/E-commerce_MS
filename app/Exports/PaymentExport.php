<?php
namespace App\Exports;

use App\Models\Payment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class PaymentExport implements FromCollection, WithHeadings
{
    use Exportable;

    protected $start_date;
    protected $end_date;

    public function __construct($start_date, $end_date)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    public function headings(): array
    {
        return ['OrderID', 'Date', 'Payment Type', 'Delivery', 'Amount'];
    }

    public function collection()
    {
        $query = Payment::select('order_id', 'created_date', 'type', 'delivery', 'amount');

        if ($this->start_date && $this->end_date) {
            $query->whereBetween('created_date', [$this->start_date, $this->end_date]);
        }

        return $query->get();
    }
}
