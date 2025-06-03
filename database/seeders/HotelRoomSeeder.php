<?php

namespace Database\Seeders;

use App\Models\Amenity;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HotelRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          // Create Hotel
        $hotel = Hotel::create([
            'name' => 'Krinoscco Grand',
            'address' => '123 Heritage Road, Ayodhya',
            'city' => 'Ayodhya',
            'state' => 'Uttar Pradesh',
            'country' => 'India',
            'phone' => '9876543210',
        ]);

        // Create Room Types
        $deluxe = RoomType::create([
            'name' => 'Deluxe',
            'description' => 'Spacious deluxe room',
        ]);

        $suite = RoomType::create([
            'name' => 'Suite',
            'description' => 'Luxury suite with extra amenities',

        ]);

        // Create Rooms
        $room1 = Room::create([
            'hotel_id' => $hotel->id,
            'room_type_id' => $deluxe->id,
            'room_number' => '101',
            'status' => 'available',

        ]);

        $room2 = Room::create([
            'hotel_id' => $hotel->id,
            'room_type_id' => $suite->id,
            'room_number' => '201',
            'status' => 'booked',

        ]);

        // Create Amenities
        $wifi = Amenity::create(['name' => 'Free WiFi', 'icon' => 'fa fa-wifi']);
        $ac = Amenity::create(['name' => 'Air Conditioning', 'icon' => 'fa fa-snowflake']);
        $tv = Amenity::create(['name' => 'Television', 'icon' => 'fa fa-tv']);
        $service = Amenity::create(['name' => 'Room Service', 'icon' => 'fa fa-concierge-bell']);

        // Attach amenities to rooms
        $deluxe->amenities()->attach([$wifi->id, $ac->id]);

    }
}
