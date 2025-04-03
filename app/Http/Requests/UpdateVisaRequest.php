<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVisaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
     public function rules(): array
    {
         return [
            'visa_number'         => 'required|string|max:255',
            'visa_type_en'        => 'required|string|max:255',
            'visa_purpose'        => 'required|string|max:255',
            'place_of_issue'      => 'required|string|max:255',
            'visa_type_ar'        => 'required|string|max:255',
            'issue_date'          => 'required|date',
            'expiry_date'         => 'required|date|after_or_equal:issue_date',
            'full_name_ar'        => 'required|string|max:255',
            'full_name_en'        => 'required|string|max:255',
            'moi_reference'       => 'nullable|string|max:255',
            'nationality_en'      => 'required|string|max:255',
            'nationality_ar'      => 'required|string|max:255',
            'gender'              => 'required|string|max:50',
            'gender_ar'           => 'required|string|max:50',
            'occupation_ar'       => 'required|string|max:255',
            'occupation_en'       => 'required|string|max:255',
            'dob'                 => 'required|date',
            'passport_no'         => 'required|string|max:255',
            'passport_issue_date' => 'required|date',
            'passport_expiry_date'=> 'required|date|after_or_equal:passport_issue_date',
            'company_name_ar'     => 'required|string|max:255',
            'passport_type_ar'    => 'required|string|max:255',
            'barcode_text_up'     => 'required|string|max:255',
            'barcode_text_down'   => 'required|string|max:255',
            'passport_issue_place'=> 'required|string|max:255',
            'passport_type_en'    => 'required|string|max:255',
            'visa_status'         => 'string',
            'phone_number'       => 'required|string|max:20',
            'barcode'             => 'string',
        ];
    }

   public function messages()
{
    return [
        'visa_number.required'         => 'Visa number is required.',
        'visa_number.string'           => 'Visa number must be a valid string.',
        
        'visa_type_en.required'        => 'Visa type (English) is required.',
        'visa_purpose.required'        => 'Visa purpose is required.',
        
        'place_of_issue.required'      => 'Place of issue is required.',
        'visa_type_ar.required'        => 'Visa type (Arabic) is required.',
        
        'issue_date.required'          => 'Issue date is required.',
        'issue_date.date'              => 'Issue date must be a valid date.',
        
        'expiry_date.required'         => 'Expiry date is required.',
        'expiry_date.date'             => 'Expiry date must be a valid date.',
        'expiry_date.after_or_equal'   => 'Expiry date must be after or equal to the issue date.',
        
        'full_name_ar.required'        => 'Full name (Arabic) is required.',
        'full_name_en.required'        => 'Full name (English) is required.',
        
        'nationality_en.required'      => 'Nationality (English) is required.',
        'nationality_ar.required'      => 'Nationality (Arabic) is required.',
        
        'gender.required'              => 'Gender is required.',
        'gender_ar.required'           => 'Gender (Arabic) is required.',
        
        'occupation_ar.required'       => 'Occupation (Arabic) is required.',
        'occupation_en.required'       => 'Occupation (English) is required.',
        
        'dob.required'                 => 'Date of birth is required.',
        'dob.date'                     => 'Date of birth must be a valid date.',
        
        'passport_no.required'         => 'Passport number is required.',
        'passport_issue_date.required' => 'Passport issue date is required.',
        'passport_issue_date.date'     => 'Passport issue date must be a valid date.',
        
        'passport_expiry_date.required'=> 'Passport expiry date is required.',
        'passport_expiry_date.date'    => 'Passport expiry date must be a valid date.',
        'passport_expiry_date.after_or_equal' => 'Passport expiry date must be after or equal to the passport issue date.',
        
        'company_name_ar.required'     => 'Company name (Arabic) is required.',
        'passport_type_ar.required'    => 'Passport type (Arabic) is required.',
        
        'barcode_text_up.required'     => 'Upper barcode text is required.',
        'barcode_text_down.required'   => 'Lower barcode text is required.',
        
        'passport_issue_place.required'=> 'Passport issue place is required.',
        'passport_type_en.required'    => 'Passport type (English) is required.',
        
        'visa_status.required'         => 'Visa status is required.',
        'visa_status.in'               => 'Visa status must be either approved, rejected, or pending.',
        
        'phone_number.required'       => 'Mobile number is required.',
        'phone_number.string'         => 'Mobile number must be a valid string.',
    ];
}}