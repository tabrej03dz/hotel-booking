<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AyodhyaPlace;

class AyodhyaPlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $places = [
            ['name'=>'Shri Ram Janmabhoomi Mandir','slug'=>'shri-ram-janmabhoomi-mandir','category'=>'Temple','image'=>'https://uptourism.gov.in/downloadmedia/siteContent/Year_2024/202401241609363984ram-mandir.jpg','short_description'=>'The grand temple dedicated to Lord Shri Ram and the spiritual centre of Ayodhya.','description'=>'<p>Shri Ram Janmabhoomi Mandir is among the most important spiritual landmarks of Ayodhya. Visitors come here for darshan, prayer and to experience the sacred atmosphere associated with the birthplace of Lord Shri Ram.</p>','location'=>'Ram Janmabhoomi Path, Ayodhya','timing'=>'Timings may vary; confirm before visiting','entry_fee'=>'Free','sort_order'=>1,'status'=>true],
            ['name'=>'Hanuman Garhi','slug'=>'hanuman-garhi','category'=>'Sacred Site','image'=>'https://uptourism.gov.in/downloadmedia/siteContent/Year_2024/202401241658434109lord-ram-ayodhya.jpg','short_description'=>'A revered hilltop temple dedicated to Lord Hanuman, located in the heart of the city.','description'=>'<p>Hanuman Garhi is one of Ayodhya’s most visited temples. The shrine is reached by a flight of steps and is believed to protect the sacred city.</p>','location'=>'Sai Nagar, Ayodhya','timing'=>'Early morning to evening','entry_fee'=>'Free','sort_order'=>2,'status'=>true],
            ['name'=>'Ram Ki Paidi','slug'=>'ram-ki-paidi','category'=>'Ghat','image'=>'https://uptourism.gov.in/downloadmedia/PageGallary/PG_202401161030549074.jpg','short_description'=>'A beautiful series of ghats along the Saryu, famous for evening lights and holy bathing.','description'=>'<p>Ram Ki Paidi is a celebrated riverfront destination where pilgrims take a sacred dip and travellers enjoy the illuminated ghats, especially during Deepotsav.</p>','location'=>'Saryu Riverfront, Ayodhya','timing'=>'Open throughout the day','entry_fee'=>'Free','sort_order'=>3,'status'=>true],
            ['name'=>'Kanak Bhawan','slug'=>'kanak-bhawan','category'=>'Heritage','image'=>'https://uptourism.gov.in/downloadmedia/siteContent/Year_2024/202401241658434109lord-ram-ayodhya.jpg','short_description'=>'An ornate palace temple known for the beautiful idols of Lord Ram and Goddess Sita.','description'=>'<p>Kanak Bhawan is admired for its elegant architecture, decorated sanctum and the beautifully adorned idols of Lord Ram and Goddess Sita.</p>','location'=>'Tulsi Nagar, Ayodhya','timing'=>'Morning and evening darshan hours','entry_fee'=>'Free','sort_order'=>4,'status'=>true],
        ];

        foreach ($places as $place) {
            AyodhyaPlace::updateOrCreate(['slug' => $place['slug']], $place);
        }
    }
}
