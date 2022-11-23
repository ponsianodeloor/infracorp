<?php

namespace App\Imports;

use App\Models\EntranceStudy;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EntranceStudyImport implements ToModel, WithHeadingRow
{
    private $project_id;

    public function __construct(int $project_id)
    {
        $this->project_id = $project_id;
    }

    public function model(array $row)
    {
        return new EntranceStudy([
            'entry'=>$row['ingreso'],
            'return' => $row['devolucion'],
            're_entry' => $row['reingreso'],
            'backup_document' => $row['documento_respaldo'],
            'project_id' => $this->project_id,
        ]);
    }
}
