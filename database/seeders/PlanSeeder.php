<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $plans = [
            [
                'name' => 'Premium Plan',
                'slug' => 'premium-plan',
                'stripe_plan' => 'price_1NSfaQEUXj56HOPm6ppAXLka',
                'price' => 3,
                'description' => 'Premium Plan'
            ]
        ];

        foreach ($plans as $plan) {
            Plan::create($plan);
        }


    }
}
