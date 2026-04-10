<?php

namespace Database\Seeders;

use App\Models\Memory;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Database\Seeder;

class PersonaTripsSeeder extends Seeder
{
    /**
     * @var array<string, array{cover_image: string|null, images: array<int, string>}>
     */
    private array $tripMedia = [
        'Lisbon City Break' => [
            'cover_image' => 'trip-covers/3WVPOwuJcSeZNS520etcVyrjVPFcQE88I70zQvnF.webp',
            'images' => [
                'trip-images/Lisbon/irNfTnohrhsJH0OdnuIK5ifQ2DxCkCSDVukDaLCD.webp',
                'trip-images/Lisbon/7Ye1hBLAu9MUlLRK2P7Jg6CPBIwFqESMkDv0o1Wz.jpg',
                'trip-images/Lisbon/pexels-alina-chernii-682289345-31861323.jpg',
                'trip-images/Lisbon/pexels-buxteh-6723898.jpg',
                'trip-images/Lisbon/pexels-edwar-cruz-1869695441-28611328.jpg',
                'trip-images/Lisbon/pexels-efrem-efre-2786187-30709373.jpg',
                'trip-images/Lisbon/pexels-efrem-efre-2786187-35466242.jpg',
                'trip-images/Lisbon/pexels-gonzalo-mendiola-95842233-30917822.jpg',
                'trip-images/Lisbon/pexels-joao-aldeia-1232168247-25308902.jpg',
                'trip-images/Lisbon/pexels-thorl5-2154653228-33672645.jpg',
                'trip-images/Lisbon/pexels-zeydeey-2151723618-32837229.jpg',
            ],
        ],
        'Donegal Coastal Loop' => [
            'cover_image' => 'trip-images/Donegal/pexels-donegal-pics-236006906-12675298.jpg',
            'images' => [
                'trip-images/Donegal/pexels-donegal-pics-236006906-12675298.jpg',
                'trip-images/Donegal/pexels-donegal-pics-236006906-12965172.jpg',
                'trip-images/Donegal/pexels-donegal-pics-236006906-12993887.jpg',
                'trip-images/Donegal/pexels-donegal-pics-236006906-14962130.jpg',
                'trip-images/Donegal/pexels-fabianwiktor-3470473.jpg',
                'trip-images/Donegal/pexels-jaroslaw-zebrowski-307185908-13526805.jpg',
                'trip-images/Donegal/pexels-ludakavun-18104018.jpg',
            ],
        ],
        'Paris Art Weekend' => [
            'cover_image' => 'trip-images/Paris/pexels-daria-agafonova-2147746189-30278203.jpg',
            'images' => [
                'trip-images/Paris/pexels-daria-agafonova-2147746189-30278203.jpg',
                'trip-images/Paris/pexels-daria-agafonova-2147746189-30278211.jpg',
                'trip-images/Paris/pexels-daria-agafonova-2147746189-30278212.jpg',
                'trip-images/Paris/pexels-gfg48-33992812.jpg',
                'trip-images/Paris/pexels-ismail-abou-khalil-461417538-34199634.jpg',
                'trip-images/Paris/pexels-peter-kraeft-803097256-33223864.jpg',
                'trip-images/Paris/pexels-zoey-trocme-737732592-18492737.jpg',
            ],
        ],
        'London Weekend' => [
            'cover_image' => 'trip-images/London/pexels-anatoleos-35404967.jpg',
            'images' => [
                'trip-images/London/pexels-anatoleos-35404967.jpg',
                'trip-images/London/pexels-ekrulila-29438404.jpg',
                'trip-images/London/pexels-ivan-drazic-20457695-35696211.jpg',
                'trip-images/London/pexels-jack-brown-376393468-14555250.jpg',
                'trip-images/London/pexels-jorrynmorais-16955002.jpg',
                'trip-images/London/pexels-liam-broder-2155455606-35284525.jpg',
                'trip-images/London/pexels-sonya-livshits-113472440-9825919.jpg',
                'trip-images/London/pexels-sonya-livshits-113472440-9828253.jpg',
                'trip-images/London/pexels-yl-lew-88954986-35873553.jpg',
            ],
        ],
        'Galway Escape' => [
            'cover_image' => 'trip-images/Galway/pexels-alina-rossoshanska-338724645-23644598.jpg',
            'images' => [
                'trip-images/Galway/pexels-alina-rossoshanska-338724645-23644598.jpg',
                'trip-images/Galway/pexels-gonchifacello-36826071.jpg',
                'trip-images/Galway/pexels-jonathanborba-33865625.jpg',
                'trip-images/Galway/pexels-jonathanborba-33865634.jpg',
                'trip-images/Galway/pexels-jonathanborba-33865637.jpg',
                'trip-images/Galway/pexels-jonathanborba-33865642.jpg',
                'trip-images/Galway/pexels-jonathanborba-33865643.jpg',
                'trip-images/Galway/pexels-jonathanborba-33943881.jpg',
                'trip-images/Galway/pexels-jonathanborba-33943889.jpg',
                'trip-images/Galway/pexels-jonathanborba-33943892.jpg',
                'trip-images/Galway/pexels-maksuatravel-770165523-18865173.jpg',
                'trip-images/Galway/pexels-sergei-36892724.jpg',
                'trip-images/Galway/pexels-spencphoto-19728853.jpg',
            ],
        ],
        'Amsterdam Short Stay' => [
            'cover_image' => 'trip-images/Amsterdam/pexels-always-sunny-travels-198265663-16515234.jpg',
            'images' => [
                'trip-images/Amsterdam/pexels-always-sunny-travels-198265663-16515234.jpg',
                'trip-images/Amsterdam/pexels-bertellifotografia-18800471.jpg',
                'trip-images/Amsterdam/pexels-bertellifotografia-18999414.jpg',
                'trip-images/Amsterdam/pexels-dylangkz-32762723.jpg',
                'trip-images/Amsterdam/pexels-filiamariss-32350063.jpg',
                'trip-images/Amsterdam/pexels-frostroomhead-17006088.jpg',
                'trip-images/Amsterdam/pexels-marceloverfe-13059449.jpg',
                'trip-images/Amsterdam/pexels-matreding-17959988.jpg',
                'trip-images/Amsterdam/pexels-naimish17-29351195.jpg',
                'trip-images/Amsterdam/pexels-omergulen-19749717.jpg',
                'trip-images/Amsterdam/pexels-thatguycraig000-30201046.jpg',
                'trip-images/Amsterdam/pexels-wolfart-16092926.jpg',
            ],
        ],
    ];

    /**
     * Seed trips for the persona users.
     */
    public function run(): void
    {
        $sarah = User::where('email', 'sarah.smith@example.com')->first();
        $mark = User::where('email', 'mark.byrne@example.com')->first();

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

            $this->seedTripMedia($tripModel);
        }
    }

    private function seedTripMedia(Trip $trip): void
    {
        $media = $this->tripMedia[$trip->title] ?? null;

        if (! $media) {
            return;
        }

        if (($media['cover_image'] ?? null) && $trip->cover_image !== $media['cover_image']) {
            $trip->update(['cover_image' => $media['cover_image']]);
        }

        foreach ($media['images'] as $path) {
            $trip->images()->updateOrCreate(
                ['path' => $path],
                ['caption' => null]
            );
        }
    }
}
