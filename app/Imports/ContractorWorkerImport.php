<?php

namespace App\Imports;

use App\Models\ContractorWorker;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ContractorWorkerImport implements ToModel, WithHeadingRow
{
    private $project_id;

    public function __construct(int $project_id)
    {
        $this->project_id = $project_id;
    }

    public function model(array $row)
    {
        return new ContractorWorker([
            'position'=>$row['cargo'],
            'amount' => $row['cantidad'],
            'name' => $row['nombre'],
            'observations' => $row['observaciones'],
            'project_id' => $this->project_id,
        ]);
    }
}
