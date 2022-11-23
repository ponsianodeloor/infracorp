<?php

namespace App\Imports;

use App\Models\EconomicState;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EconomicStateImport implements ToModel, WithHeadingRow
{
    private $project_id;

    public function __construct(int $project_id)
    {
        $this->project_id = $project_id;
    }

    public function model(array $row)
    {
        return new EconomicState([
            'concept'=>$row['concepto'],
            'execution_period' => $row['periodo_ejecucion'],
            'total_amount' => $row['monto_total'],
            'advance_discount' => $row['descuento_anticipo'],
            'liquid' => $row['liquido'],
            'economic_progress_percentage' => $row['porcentaje_avance_economico'],
            'project_id' => $this->project_id,
        ]);
    }
}
