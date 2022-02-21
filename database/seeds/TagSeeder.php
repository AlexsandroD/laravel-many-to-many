<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Tag;
class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['meat','fish','dairy free','vegan','gluten free'];

        foreach ($tags as $tag) {
            $newTag = new Tag();
            $newTag->name = $tag;
            $newTag->slug = Str::of($newTag->name)->slug("-");
            $newTag->save();
        }
    }
}
