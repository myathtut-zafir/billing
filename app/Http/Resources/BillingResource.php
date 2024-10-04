<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Config;

class BillingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            "id" => $this->id,
            "user_id" => $this->user_id,
            "billing_month" => $this->billing_month,
            "billing_year" => $this->billing_year,
            "billing_amount" => $this->billing_amount,
            "deleted_at" => $this->deleted_at,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "welcole" => trans('Welcome to our Bill'),
            "welcome" => __('account-next-action.escalate_to_ops_mgr'),
            "welcome2" => trans(Config::get('app.locale_test_welcome')),
        ];
    }
}
