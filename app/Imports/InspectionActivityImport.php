<?php

namespace App\Imports;

use App\Models\InspectionActivity;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class InspectionActivityImport implements ToModel, WithHeadingRow
{
    private $project_id;

    public function __construct(int $project_id)
    {
        $this->project_id = $project_id;
    }

    public function model(array $row)
    {
        return new InspectionActivity([
            'specialty'=>$row['especialidad'],
            'date' => $row['fecha'],
            'act_number' => $row['num_de_acta'],
            'affair' => $row['asunto'],
            'revised_property' => $row['predio_revisado'],
            'revision_number' => $row['num_de_revision'],
            'project_id' => $this->project_id,
        ]);
    }
}
