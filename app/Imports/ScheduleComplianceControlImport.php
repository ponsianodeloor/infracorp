<?php

namespace App\Imports;

use App\Models\ScheduleComplianceControl;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ScheduleComplianceControlImport implements ToModel, WithHeadingRow
{
    private $project_id;

    public function __construct(int $project_id)
    {
        $this->project_id = $project_id;
    }

    public function model(array $row)
    {
        return new ScheduleComplianceControl([
            'month'=>$row['mes'],
            'calendar' => $row['calendario'],
            'cumulative_scheduled' => $row['programado_acumulado'],
            'executed_scheduled' => $row['ejecutado_acumulado'],
            'compliance_percentage' => $row['porcentaje_de_cumplimiento'],
            'difference_in_arrears' => $row['diferencia_en_mora'],
            'project_id' => $this->project_id,
        ]);
    }
}
