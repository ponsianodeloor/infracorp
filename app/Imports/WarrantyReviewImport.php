<?php

namespace App\Imports;

use App\Models\WarrantyReview;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class WarrantyReviewImport implements ToModel, WithHeadingRow
{
    private $project_id;

    public function __construct(int $project_id)
    {
        $this->project_id = $project_id;
    }

    public function model(array $row)
    {
        return new WarrantyReview([
            'type_guarantee'=>$row['tipo_garantia'],
            'issuing_entity' => $row['entidad_emisora'],
            'number' => $row['numero'],
            'reference' => $row['referencia'],
            'amount' => $row['monto'],
            'valid_since' => $row['vigencia_desde'],
            'valid_until' => $row['vigencia_hasta'],
            'project_id' => $this->project_id,
        ]);
    }
}
