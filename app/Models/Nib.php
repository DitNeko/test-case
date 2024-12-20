<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nib extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nik',
        'name',
        'gender',
        'phone',
        'id_card_address',
        'personal_npwp',
        'company_import_decision',
        'has_bpjs_employment',
        'has_bpjs_health',
        'is_npwp_different',
        'business_name',
        'kbli',
        'business_scala',
        'business_address',
        'province',
        'regency',
        'subdistrict',
        'ward',
        'pos_code',
        'business_capital',
        'business_description',
        'indonesian_workers',
        'business_status',
        'new_building_plan',
        'business_type',
        'land_based_business_location',
        'required_area',
        'required_length',
        'location_depth',
        'building_plan_area',
        'spatial_compatibility',
        'reclamation',
        'water_name',
        'coordinates',
        'cross_province_location',
        'business_land_area',
        'forest_approval_status',
        'required_forest_permit_type',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
