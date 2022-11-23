<?php

namespace App\Imports;

use App\Models\CrossDocumentation;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CrossDocumentationImport implements ToModel, WithHeadingRow
{
    private $project_id;

    public function __construct(int $project_id)
    {
        $this->project_id = $project_id;
    }

    public function model(array $row)
    {
        return new CrossDocumentation([
            'date'=>$row['fecha'],
            'document' => $row['oficio_o_memorandum'],
            'for' => $row['para'],
            'of' => $row['de'],
            'affair' => $row['asunto'],
            'project_id' => $this->project_id,
        ]);
    }
}
