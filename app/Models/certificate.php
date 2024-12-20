<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class certificate extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'company_name', 
        'address', 
        'city', 
        'country', 
        'zip_code', 
        'phone', 
        'fax', 
        'company_email', 
        'pic_name', 
        'pic_title', 
        'pic_phone', 
        'pic_mobile_phone', 
        'pic_email', 
        'cp_name', 
        'cp_title', 
        'cp_phone', 
        'cp_mobile_phone', 
        'cp_email', 
        'registration_type', 
        'application_type', 
        'registration_status', 
        'product_type', 
        'product_marketing_type', 
        'total_employee', 
        'production_capacity', 
        'npwp_number', 
        
        // Facility fields
        'facility_manufacturer_name',
        'facility_manufacturer_address',
        'facility_city',
        'facility_country',
        'facility_zip_code',
        'facility_phone',
        'facility_fax',
        'facility_email',
        'facility_pic_name',
        'facility_pic_title',
        'facility_pic_phone',
        'facility_pic_mobile_phone',
        'facility_pic_email',
        'facility_cp_name',
        'facility_cp_title',
        'facility_cp_phone',
        'facility_cp_mobile_phone',
        'facility_cp_email',
        'other_facility_name_and_address',
    ];

    public function user(): BelongsTo {
        return  $this->belongsTo(User::class);
    }
}
