<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define esoteric, spiritual, and manifestation categories
        $categories = [
            [
                'name' => 'Astrology',
                'description' => 'Study of the movements and relative positions of celestial bodies interpreted as having an influence on human affairs and the natural world.',
            ],
            [
                'name' => 'Tarot',
                'description' => 'A pack of playing cards, used from the mid-15th century in various parts of Europe to play games, now mainly used for divination.',
            ],
            [
                'name' => 'Numerology',
                'description' => 'The branch of knowledge that deals with the occult significance of numbers.',
            ],
            [
                'name' => 'Alchemy',
                'description' => 'A seemingly magical process of transformation, creation, or combination, traditionally aimed at turning base metals into gold or finding a universal elixir.',
            ],
            [
                'name' => 'Hermeticism',
                'description' => 'A religious, philosophical, and esoteric tradition based primarily upon writings attributed to Hermes Trismegistus.',
            ],
            [
                'name' => 'Kabbalah',
                'description' => 'An esoteric method, discipline, and school of thought in Jewish mysticism.',
            ],
            [
                'name' => 'Wicca & Witchcraft',
                'description' => 'Modern pagan religion centered on reverence for nature and often involving witchcraft.',
            ],
            [
                'name' => 'Shamanism',
                'description' => 'A practice that involves a practitioner reaching altered states of consciousness in order to perceive and interact with a spirit world and channel these transcendental energies into this world.',
            ],
            [
                'name' => 'Mindfulness & Meditation',
                'description' => 'Practices focusing on awareness of the present moment, thoughts, feelings, bodily sensations, and surrounding environment.',
            ],
            [
                'name' => 'Law of Attraction',
                'description' => 'The belief that positive or negative thoughts bring positive or negative experiences into a person\'s life.',
            ],
            [
                'name' => 'Manifestation Techniques',
                'description' => 'Methods and practices aimed at bringing something tangible into your life through attraction and belief.',
            ],
            [
                'name' => 'Spiritual Healing',
                'description' => 'Practices aimed at restoring balance and harmony to the body, mind, and spirit.',
            ],
            [
                'name' => 'Chakras',
                'description' => 'Energy centers within the human body in Hindu and yogic traditions.',
            ],
            [
                'name' => 'Crystals & Gemstones',
                'description' => 'Study and use of crystals for healing and energy work.',
            ],
            [
                'name' => 'Dream Interpretation',
                'description' => 'The process of assigning meaning to dreams.',
            ],
            [
                'name' => 'General Spirituality',
                'description' => 'Books covering broader spiritual concepts, philosophies, and practices.',
            ],
            [
                'name' => 'Esoteric Philosophy',
                'description' => 'Philosophical traditions concerned with hidden or secret knowledge.',
            ],
            [
                'name' => 'Spiritual',
                'description' => 'Books focusing on spiritual growth and practices.',
            ],
            [
                'name' => 'Manifestation',
                'description' => 'Books about manifestation techniques and the law of attraction.',
            ],
            [
                'name' => 'Meditation',
                'description' => 'Books on mindfulness and meditation practices.',
            ],
            [
                'name' => 'Self-Improvement',
                'description' => 'Books aimed at personal growth and self-improvement.',
            ],
        ];

        // Insert categories into the database
        foreach ($categories as $categoryData) {
            // Use updateOrCreate to avoid duplicates if seeder is run multiple times
            Category::updateOrCreate(['name' => $categoryData['name']], $categoryData);
        }
    }
}

