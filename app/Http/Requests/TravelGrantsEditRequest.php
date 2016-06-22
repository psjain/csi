<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TravelGrantsEditRequest extends Request
{
    private $travelgrant = [
        'travel_event_name' => 'required|string',
        'travel_event_date' => 'required|date_format:Y-m-d',
        'travel_event_venue' => 'required|string',
        'travel_start_date' => 'required|date_format:Y-m-d|before:travel_event_date',
        'travel_end_date' => 'required|date_format:Y-m-d|after:travel_start_date',
        'travel_members_count' => 'required|numeric',
        'travel_event_member_role' => 'required',
        'travel_event_request_justification' => 'required',
        'travel_event_member_document' => 'required_with:doc|mimes:pdf',
        //'travel_event_member_document' => 'mimes:pdf',
        'travel_event_mode' => 'required|string',
        'travel_event_grant_requested' => 'required|numeric',
        'travel_event_member_role'=> 'required',

    ];

     public function authorize()
    {

        return true;
    }
 public function rules()
    {
        $validation = array();
        $validation = array_merge( $validation, $this->travelgrant);
        return $validation;
    }


    public function messages() {
        return [
            'travel_event_name.required' => 'The name is required',
            'travel_event_name.string' => 'The name should be string',
            'travel_event_venue.required' => 'The venue is required',
            'travel_event_venue.string' => 'The venue should be required',
            'travel_event_date.required' => 'The event date is required',
            'travel_event_date.date_format' => 'The date should be valid (YYYY-mm-dd)',
            'travel_start_date.required' => 'The travel start date is required',
            'travel_start_date.before' => 'The travel start date must be a date before event date and End Date of travel',
            'travel_start_date.date_format' => 'The travel start date should be valid (YYYY-mm-dd)',
            'travel_end_date.required' => 'The travel end date is required',
            'travel_end_date.date_format' => 'The travel end date should be valid (YYYY-mm-dd)',
            'travel_end_date.after' => 'The travel end date must be a date after event date and Start Date of travel',
            'travel_members_count.required' => 'Th members count is required',
            'travel_members_count.string' => 'The members count should be numeric',
            'travel_event_request_justification.required' => 'The justification is required',
            'travel_event_request_justification.string' => 'The justification should be string',
            'travel_event_member_role.required' => 'The role is required',
            'travel_event_mode.required' => 'The mode is required',
            'travel_event_mode.string' => 'The mode should be string',
            'travel_event_grant_requested.required' => 'The grant requested is required',
            'travel_event_grant_requested.string' => 'The grant requested should be numeric',
            'travel_event_member_document.required_with' => 'The document is required',
            ];
    }
}