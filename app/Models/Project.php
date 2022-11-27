<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function volumes(){
        return $this->hasMany(Volume::class);
    }

    public function inspectionContract(){
        return $this->hasOne(InspectionContract::class);
    }

    public function inspectionReport(){
        return $this->hasOne(InspectionReport::class);
    }

    public function infraestructures(){
        return $this->hasMany(Infraestructure::class);
    }

    public function intervenedWorkIdentification(){
        return $this->hasOne(IntervenedWorkIdentification::class);
    }

    public function executeApprovedAmounts(){
        return $this->hasMany(ExecutedApprovedMount::class);
    }

    public function contractorWorkers(){
        return $this->hasMany(ContractorWorker::class);
    }

    public function productWorkContractors(){
        return $this->hasMany(ProductWorkContractor::class);
    }

    public function scheduleComplianceControls(){
        return $this->hasMany(ScheduleComplianceControl::class);
    }

    public function warrantyReviews(){
        return $this->hasMany(WarrantyReview::class);
    }

    public function inspectionPersonals(){
        return $this->hasMany(InspectionPersonal::class);
    }

    public function economicStates(){
        return $this->hasMany(EconomicState::class);
    }

    public function entranceStudies(){
        return $this->hasMany(EntranceStudy::class);
    }

    public function crossDocumentations(){
        return $this->hasMany(CrossDocumentation::class);
    }

    public function inspectionActivities(){
        return $this->hasMany(InspectionActivity::class);
    }
}
