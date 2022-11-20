<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\InspectionContract;
use App\Models\InspectionReport;
use App\Models\IntervenedWorkIdentification;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Project;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Ponsiano De Loor',
            'email' => 'ponsianodeloor@gmail.com',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'password'=>Hash::make('ponsiano'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Project::create([
            'project' => 'CONTRATACION DE LA EJECUCIÓN DE LOS ESTUDIOS DEFINITIVOS, CONSTRUCCIÓN Y EQUIPAMIENTO BÁSICOS Y TECNOLÓGICOS DE 100 UPC y 6 UVC ARTICULADAS CON EL SISTEMA DE RESPUESTA INMEDIATA E INTEGRAL ECU 911 EN TODO EL TERRITORIO NACIONAL, BAJO MODALIDAD DE COSTO REFERENCIAL',
            'contractor'=> 'CHINA ROAD AND BRIDGE CORPORATION (CRBC)',
            'inspection' => 'ASOCIACION INFRACORP',
            'place' => 'Quito - Camal Metropolitano',
            'reference_value_contract'=> 95791362.84,
            'date_start_text'=> '18 de diciembre de 2019 y protocolización 9 de diciembre de 2020',
            'advance_payment_date_text'=> '20 de diciembre de 2019',
            'project_term_start_date_text'=> '4 de agosto de 2022 (Acta de inicio de trabajos)',
            'contract_term'=> 773,
            'term_extensions'=> 0,
            'contract_termination_date_text'=> '15 de septiembre de 2024',
            'advance'=> 40,
            'price_adjustments'=> 'SI',
            'total_current_amount'=> 95791362.84,
            'user_id' => 1,
            'date_start' => '2022-10-22',
            'date_end' => '2023-05-30',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        InspectionReport::create([
            'project_id' => 1
        ]);

        IntervenedWorkIdentification::create([
            'project_id'=>1
        ]);

        InspectionContract::create([
            'project_inspection'=>'SERVICIO DE FISCALIZACION DE “EJECUTAR, TERMINAR Y ENTREGAR A ENTERA SATISFACCION DE LA MISMA EL SERVICIO DE FISCALIZACIO DEL CONTRATO ADMINISTRATIVO Nro. 001-2019 DENOMINADO PARA LA CONTRATACION DE LA EJECUCION DE LA EJECUCIÓN DE LOS ESTUDIOS DEFINITIVOS, CONSTRUCCIÓN Y EQUIPAMIENTO BÁSICOS Y TECNOLÓGICOS PARA DE 100 UPC y 6 UVC ARTICULADAS CON EL SISTEMA DE RESPUESTA INMEDIATA E INTEGRAL ECU 911 EN TODO EL TERRITORIO NACIONAL, BAJO MODALIDAD DE COSTO REFERENCIAL',
            'place'=>'Nivel Nacional',
            'contractor'=>'ASOCIACION INFRACORP',
            'reference_value_contract'=>4250000,
            'date_start_text'=>'15 de julio de 2022 protocolizado el 21 de julio de 2022',
            'project_term_start_date_text'=>'4 de agosto de 2022 (Acta de inicio de trabajos)',
            'contract_term'=>953,
            'term_extensions'=>0,
            'contract_termination_date_text'=>'14 de marzo de 2025',
            'advance'=>40,
            'price_adjustments'=>'NO',
            'readjustment_formula'=>'NO CONTEMPLA REAJUSTE',
            'way_to_pay'=>'1.- El anticipo se cancelará el 40% del monto del contrato, sin IVA previa la presentación de la garantía de buen uso de anticipo. 2.- El valor restante, el 60% se cancelará previo la presentación y aprobación de informes por productos, debidamente aprobados por el Administrador de contrato. Para determinar el valor de cada producto, se multiplicará el valor total del contrato por el correspondiente coeficiente porcentual, según tabla.',
            'total_current_amount'=>4250000,
            'project_id'=>1
        ]);

    }
}
