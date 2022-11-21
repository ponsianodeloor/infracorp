<?php

namespace App\Imports;

use App\Models\ExecutedApprovedMount;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ExecutedApprovedMountImport implements ToModel, WithHeadingRow
{
    private $project_id;

    public function __construct(int $project_id)
    {
        $this->project_id = $project_id;
    }

    public function model(array $row)
    {
        return new ExecutedApprovedMount([
            'project'=>$row['proyecto'],
            'value_definitive_studies' => $row['monto_estudio_definitivos'],
            'value_approved_studies' => $row['monto_aprobado_estudios'],
            'project_id' => $this->project_id,
        ]);
    }
}
