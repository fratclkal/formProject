<?php

namespace App\Exports;

use App\Models\Form;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\User;

class FormExport implements FromCollection, WithHeadings
{
    public $user_id;
    public $start_date;
    public $end_date;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $forms = Form::query();

        if ($this->user_id != 0){
            $forms->where('user_id', $this->user_id);
        }

        if ($this->start_date != 0){
            $forms->where('created_at', '>=', $this->start_date);
        }

        if ($this->end_date != 0){
            $forms->where('created_at', '<=', $this->end_date);
        }

        $collection = $forms->get();
        $i = 0;
        foreach ($collection as $item){

            $collection[$i]->user_id = User::where('id', $collection[$i]->user_id)->first()->name;

            if ($collection[$i]->payment_type == 0){
                $collection[$i]->payment_type = '0';
            }

            $i++;
        }

        return $collection;
    }

    public function __construct($user_id, $start_date, $end_date)
    {
        $this->user_id = $user_id;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    public function headings() : array
    {
        return ['ID', 'Oluşturucu', 'İsim', 'Soyisim', 'TC', 'Email', 'Telefon Numarası', 'KVKK', 'Kullanım Şartları', 'Başlangıç Tarihi', 'Bitiş Tarihi', 'Ücret', 'Ödeme Tipi (0 - Kredi Kartı)', 'Silinme Tarihi', 'Oluşturma Tarihi', 'Güncellenme Tarihi'];
    }
}
