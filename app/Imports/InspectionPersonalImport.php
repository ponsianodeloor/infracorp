<?php

namespace App\Imports;

use App\Models\InspectionPersonal;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class InspectionPersonalImport implements ToModel, WithHeadingRow
{
    private $project_id;

    public function __construct(int $project_id)
    {
        $this->project_id = $project_id;
    }

    public function model(array $row)
    {
        return new InspectionPersonal([
            'name'=>$row['nombre'],
            'position' => $row['cargo'],
            'approval' => $row['aprobacion'],
            'project_id' => $this->project_id
        ]);
    }
}
