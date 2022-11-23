<?php

namespace App\Imports;

use App\Models\ProductWorkContractor;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductWorkContractorImport implements ToModel, WithHeadingRow
{
    private $project_id;

    public function __construct(int $project_id)
    {
        $this->project_id = $project_id;
    }

    public function model(array $row)
    {
        return new ProductWorkContractor([
            'number'=>$row['numero'],
            'mdg' => $row['mdg'],
            'sub_circuit' => $row['subcircuito'],
            'typography' => $row['tipografia'],
            'soil_study' => $row['estudio_suelos'],
            'environmental_certificate' => $row['certificado_ambiental'],
            'typographical_revision' => $row['revision_topografica'],
            'implantations' => $row['implantaciones'],
            'architectural_memories' => $row['memorias_arquitectonicas'],
            'structural' => $row['estructural'],
            'electrical_electronic' => $row['electrica_electronica'],
            'hydro_sanitary' => $row['hidrosanitario'],
            'mechanical_study' => $row['estudio_mecanico'],
            'project_id' => $this->project_id,
        ]);
    }
}
