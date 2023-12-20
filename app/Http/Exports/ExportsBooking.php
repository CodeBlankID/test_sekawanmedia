<?php
namespace App\Http\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Http\Controllers\KendaraanController;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportsBooking implements FromCollection, WithHeadings, WithStyles
{
    use Exportable;
    private $collection;

    public function __construct(array $collect)
    {
        $this->collection = $collect;
    }

    public function collection()
    {
        $remove = ['id', 'id_kendaraan', "id_users", "booking_status_by", "id_driver", "id_requested_by", "is_deleted"];
        foreach ($this->collection as $key => $value)
        {
            $data_export[$key] = array_diff_key((array)$value, array_flip($remove));
        }
        return collect($data_export);
    }
    public function headings(): array
    {
        return ["Durasi", "Deskripsi", "Booking Status", "Date Request", "Mechanical Check Date", "Booking Status Date", "Done Date", "User Approval", "Driver", "Kendaraan", "Nomor Kendaraan", "Request"];
    }
    public function styles(Worksheet $sheet)
    {
        return [
           1 => ['font' => ['bold' => true]],
        ];
    }
}

?>