<?php

namespace Database\Seeders;

use App\Models\Memory;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Database\Seeder;

class PersonaTripsSeeder extends Seeder
{
    /**
     * Seed trips for the persona users.
     */
    public function run(): void
    {
        $kornel = User::where('email', 'orikornel@yahoo.co.uk')->first();
        $sarah = User::where('email', 'sarah.smith@example.com')->first();
        $mark = User::where('email', 'mark.byrne@example.com')->first();

        if ($kornel) {
            $this->seedTripsForUser($kornel->id, [
                [
                    'title' => 'Spring Norway',
                    'location' => 'Bergen',
                    'start_date' => '2025-05-29',
                    'end_date' => '2025-05-30',
                    'description' => 'Cool Bergen',
                ],
            ]);
        }

        if ($sarah) {
            $this->seedTripsForUser($sarah->id, [
                [
                    'title' => 'Lisbon City Break',
                    'location' => 'Lisbon, Portugal',
                    'start_date' => '2024-03-12',
                    'end_date' => '2024-03-16',
                    'description' => 'Pastel de nata stops, rooftop sunsets, and tram rides.',
                ],
                [
                    'title' => 'Donegal Coastal Loop',
                    'location' => 'Donegal, Ireland',
                    'start_date' => '2024-06-01',
                    'end_date' => '2024-06-03',
                    'description' => 'Cliffs, sea air, and a notebook full of sketches.',
                ],
                [
                    'title' => 'Paris Art Weekend',
                    'location' => 'Paris, France',
                    'start_date' => '2024-10-18',
                    'end_date' => '2024-10-20',
                    'description' => 'Galleries, cafe stops, and late-night photo walks.',
                ],
            ]);
        }

        if ($mark) {
            $this->seedTripsForUser($mark->id, [
                [
                    'title' => 'London Weekend',
                    'location' => 'London, UK',
                    'start_date' => '2024-02-09',
                    'end_date' => '2024-02-11',
                    'description' => 'Quick city break with museums and river walk.',
                ],
                [
                    'title' => 'Galway Escape',
                    'location' => 'Galway, Ireland',
                    'start_date' => '2024-07-05',
                    'end_date' => '2024-07-07',
                    'description' => 'Seafood market, live music, and a quiet beach stroll.',
                ],
                [
                    'title' => 'Amsterdam Short Stay',
                    'location' => 'Amsterdam, Netherlands',
                    'start_date' => '2024-11-15',
                    'end_date' => '2024-11-17',
                    'description' => 'Canal views, bike ride, and a cozy coffee spot.',
                ],
            ]);
        }
    }

    /**
     * @param array<int, array<string, string|null>> $trips
     */
    private function seedTripsForUser(int $userId, array $trips): void
    {
        foreach ($trips as $trip) {
            $tripModel = Trip::updateOrCreate(
                ['user_id' => $userId, 'title' => $trip['title']],
                $trip
            );

            Memory::updateOrCreate(
                ['trip_id' => $tripModel->id, 'title' => 'Trip Highlight'],
                [
                    'location' => $tripModel->location,
                    'date' => $tripModel->start_date,
                    'description' => $tripModel->description ?: 'Highlight memory for this trip.',
                ]
            );
        }
    }
}
