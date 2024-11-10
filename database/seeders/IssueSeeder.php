<?php

namespace Database\Seeders;
use App\Models\Issue;
use App\Models\IssueTranslation;
use App\Models\Language;
use Illuminate\Database\Seeder;

class IssueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $langs = Language::all();
        $issues = [
            'uz' => ["Stressni kamaytirish", "Uyquni yaxshilash", "Diqqatni jamlash", "Kayfiyatni yaxshilash"],
            'en' => ["Reduce stress", "Improve sleep", "Increase focus", "Improve mood"],
            'ru' => ["Уменьшить стресс", "Улучшить сон", "Повысить концентрацию", "Улучшить настроение"]
        ];
        $results = [
            'uz' => ["74% inson stresdan aziyat chekadi", "41.5% inson sifatsiz uyqudan qiynaladi", "31% inson diqqatini jamlay olmaydi", "34% inson kayfiyat tez o\'zgarishidan shikoyat qiladi"],
            'en' => ["95% report less stress", "82% report better sleep", "75% report improved focus", "92% report improved mood"],
            'ru' => ["95% сообщают об уменьшении стресса", "82% сообщают об улучшении сна", "75% сообщают об улучшении концентрации внимания", "92% сообщают об улучшении настроения"]
        ];
        $images = [
            'calm/img/home-3/blog/zulfiqor.png',
            'calm/img/home-3/blog/img_1.png',
            'calm/img/home-3/blog/zulfiqor.png',
            'calm/img/home-3/blog/img_1.png'
        ];
        for ($i = 0; $i < count($issues['uz']); $i++){
            $issue = Issue::create([]);
            $issue->image()->create([
                'path' => $images[$i],
                'info' => '[]'
            ]);
            foreach ($langs as $lang) {
                IssueTranslation::create([
                    'name' => $issues[$lang->code][$i],
                    'results' =>  $results[$lang->code][$i],
                    'object_id' => $issue->id,
                    'language_code' => $lang->code
                ]);
            }
        }
    }
}
