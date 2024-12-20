<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CertificatesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_name' => fake()->company(),
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'country' => $this->faker->country,
            'zip_code' => $this->faker->postcode,
            'phone' => $this->faker->phoneNumber,
            'fax' => $this->faker->phoneNumber,
            'company_email' => $this->faker->companyEmail,

            // PIC Information
            'pic_name' => $this->faker->name,
            'pic_title' => $this->faker->jobTitle,
            'pic_phone' => $this->faker->phoneNumber,
            'pic_mobile_phone' => $this->faker->phoneNumber,
            'pic_email' => $this->faker->email,

            // CP Information
            'cp_name' => $this->faker->name,
            'cp_title' => $this->faker->jobTitle,
            'cp_phone' => $this->faker->phoneNumber,
            'cp_mobile_phone' => $this->faker->phoneNumber,
            'cp_email' => $this->faker->email,

            // Other fields
            'registration_type' => 'Standard',
            'application_type' => 'New',
            'registration_status' => 'Active',
            'product_type' => 'Consumer Goods',
            'product_marketing_type' => 'Retail',
            'total_employee' => $this->faker->numberBetween(10, 1000),
            'production_capacity' => $this->faker->randomNumber(5) . ' units/year',
            'npwp_number' => $this->faker->numerify('##.###.###.#-###.###'),

            // Facility Data
            'facility_manufacturer_name' => $this->faker->company,
            'facility_manufacturer_address' => $this->faker->address,
            'facility_city' => $this->faker->city,
            'facility_country' => $this->faker->country,
            'facility_zip_code' => $this->faker->postcode,
            'facility_phone' => $this->faker->phoneNumber,
            'facility_fax' => $this->faker->phoneNumber,
            'facility_email' => $this->faker->companyEmail,

            // PIC for Facility
            'facility_pic_name' => $this->faker->name,
            'facility_pic_title' => $this->faker->jobTitle,
            'facility_pic_phone' => $this->faker->phoneNumber,
            'facility_pic_mobile_phone' => $this->faker->phoneNumber,
            'facility_pic_email' => $this->faker->email,

            // CP for Facility
            'facility_cp_name' => $this->faker->name,
            'facility_cp_title' => $this->faker->jobTitle,
            'facility_cp_phone' => $this->faker->phoneNumber,
            'facility_cp_mobile_phone' => $this->faker->phoneNumber,
            'facility_cp_email' => $this->faker->email,

            // Other Facility
            'other_facility_name_and_address' => $this->faker->sentence,

            // Status
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
        ];
    }
}
