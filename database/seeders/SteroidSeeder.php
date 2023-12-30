<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\Steroid;
use App\Models\Steroidinfo;
use App\Models\SteroidinfoTranslation;
use App\Models\Steroidtest;
use App\Models\SteroidTranslation;
use Illuminate\Database\Seeder;

class SteroidSeeder extends Seeder
{
    public function run()
    {
        $langs = Language::all();
        $steroids = [
            'uz' => ["Uyqu", "Buqoq", "O'ziga baho berish", "Kayfiyat beqarorligi", "Iroda kuchsizligi", "Fikrni jamlay olmaslik"],
            'en' => ["Sleep", "Adenois", "Selfishness", "Mood stability", "Will", "Concentration"],
            'ru' => ["Сон", "Аденуа", "Эгоизм", "Устойчивость настроения", "Воля", "Концентрация"],
        ];

        $arr = [41.5 , 75 , 41.1 , 34 , 29 , 31];
        $info_name[0] = [
            "Uyqu markazi faoliyati, tushlar ko'rish uchun ilm fan doimo qiziq izlanishlardan biri bo'lib kelgan. Ammo uyqu buzilishlari sabablari haligacha to'liq o'rganilmagan. Uyqu buzilishi ko'pincha stress gormonlari faoliyati bilan bog'liq bo'lib, tiroksin (buqoq bezi gormoni) kamayishi, kortizol (stress gormoni) ko'payishi ham uyqu sifatini buzuvchi omil. Odatda tinchlantiruvchi preparatlar sog'lom uyquni taminlashga yordam beradi. Ammo eng yaxshi davo organizmdagi gormonal fonni yaxshilash, tinchlantiruvchi meditatsiyalar qilish hisoblanadi.",
            "Uyqu markazi faoliyati, tushlar ko'rish uchun ilm fan doimo qiziq izlanishlardan biri bo'lib kelgan. Ammo uyqu buzilishlari sabablari haligacha to'liq o'rganilmagan. Uyqu buzilishi ko'pincha stress gormonlari faoliyati bilan bog'liq bo'lib, tiroksin (buqoq bezi gormoni) kamayishi, kortizol (stress gormoni) ko'payishi ham uyqu sifatini buzuvchi omil. Odatda tinchlantiruvchi preparatlar sog'lom uyquni taminlashga yordam beradi. Ammo eng yaxshi davo organizmdagi gormonal fonni yaxshilash, tinchlantiruvchi meditatsiyalar qilish hisoblanadi.",
            "Uyqu markazi faoliyati, tushlar ko'rish uchun ilm fan doimo qiziq izlanishlardan biri bo'lib kelgan. Ammo uyqu buzilishlari sabablari haligacha to'liq o'rganilmagan. Uyqu buzilishi ko'pincha stress gormonlari faoliyati bilan bog'liq bo'lib, tiroksin (buqoq bezi gormoni) kamayishi, kortizol (stress gormoni) ko'payishi ham uyqu sifatini buzuvchi omil. Odatda tinchlantiruvchi preparatlar sog'lom uyquni taminlashga yordam beradi. Ammo eng yaxshi davo organizmdagi gormonal fonni yaxshilash, tinchlantiruvchi meditatsiyalar qilish hisoblanadi.",
            "Uyqu markazi faoliyati, tushlar ko'rish uchun ilm fan doimo qiziq izlanishlardan biri bo'lib kelgan. Ammo uyqu buzilishlari sabablari haligacha to'liq o'rganilmagan. Uyqu buzilishi ko'pincha stress gormonlari faoliyati bilan bog'liq bo'lib, tiroksin (buqoq bezi gormoni) kamayishi, kortizol (stress gormoni) ko'payishi ham uyqu sifatini buzuvchi omil. Odatda tinchlantiruvchi preparatlar sog'lom uyquni taminlashga yordam beradi. Ammo eng yaxshi davo organizmdagi gormonal fonni yaxshilash, tinchlantiruvchi meditatsiyalar qilish hisoblanadi.",
            "Sizda aynan uyqu bilan muammolaringiz yoq. Bazan kuzatiluvchi uyqusizlik yoki tinch uyqu bo'lmasligi sizdagi charchashlar, kun tartibi o'zgarishi hisobiga paydo bo'layotgan bo'lishi mumkin."
        ];

        $info_name[1] = [
            "Qalqonsimon yani buqoq bezingizda ishlar joyida emas. Umuman agar siz O'rta Osiyo fuqorosi bo'lsangiz bu hayratlanarli holat emas, chunki bu mamlakatlar dengizdan uzoqda, yodga boy bo'lgan mahsulotlarni kam istemol qilishadi. Shu sababli ham ular doimiy yod preparatlarini qabul qilib yurishlari lozim. Aks holatda keyinchalik bitta gormondagi o'zgarish boshqa gormonlar holatini ham o'zgartirishi va umumiy gormonal fonning buzilishiga olib keladi.",
            "Qalqonsimon yani buqoq bezingizda ishlar joyida emas. Umuman agar siz O'rta Osiyo fuqorosi bo'lsangiz bu hayratlanarli holat emas, chunki bu mamlakatlar dengizdan uzoqda, yodga boy bo'lgan mahsulotlarni kam istemol qilishadi. Shu sababli ham ular doimiy yod preparatlarini qabul qilib yurishlari lozim. Aks holatda keyinchalik bitta gormondagi o'zgarish boshqa gormonlar holatini ham o'zgartirishi va umumiy gormonal fonning buzilishiga olib keladi.",
            "Qalqonsimon yani buqoq bezingiz holati o'rtacha ammo etiborsiz qoldirish mumkin emas. Ushbu holat sizda keyinchalik boshqa gormonal kasalliklar kelib chiqishiga ham sabab bo'lishi mumkin. Umuman agar siz O'rta Osiyo fuqorosi bo'lsangiz bu hayratlanarli holat emas, chunki bu mamlakatlar dengizdan uzoqda, yodga boy bo'lgan mahsulotlarni kam istemol qilishadi. Shu sababli ham ular doimiy yod preparatlarini qabul qilib yurishlari lozim.",
            "Qalqonsimon yani buqoq bezingiz holati o'rtacha. Etibor ammo etibor berish sizga sog'lom va to'laqonli hayotni taminlashga yordam beradi. Umuman agar siz O'rta Osiyo fuqorosi bo'lsangiz bu hayratlanarli holat emas, chunki bu mamlakatlar dengizdan uzoqda, yodga boy bo'lgan mahsulotlarni kam istemol qilishadi. Shu sababli ham ular doimiy yod preparatlarini qabul qilib yurishlari lozim.",
            "Qalqonsimon yoki buqoq bezingiz holati yaxshi holatda deyish mumkin. Ammo sog'lom turmush tarzi, to'g'ri ovqatlanish, vitamin, mineral komplekslarni qabul qilish sizga bu holatni doimiy ushlab turishga yordam beradi."
        ];

        $info_name[2] = [
            "O'zingizga baho berishingiz holati achinarli holatta, tashqi muhit tasiri, doimiy stresslar sizdagi o'zingizdan qoniqish hissini yoqotgan bo'lishi mumkin. Stress tasirida bosh miyada qon aylanishi buziladi, gipoksiya yani kislorod yetishmovchiligi yuz beradi, ularning asorat sifatida esa insonning o'ziga hurmati va mehri kamayishi mumkin. Balki sizni doimo kim bilandir taqqoslashgan bo'lishi mumkin, va siz buni asosli deb qabul qilgansiz. Bu tashqi ko'rinish bilan ham bog'liq bo'lishi mumkin.",
            "O'zingizga baho berishingiz holati achinarli holatta, tashqi muhit tasiri, doimiy stresslar sizdagi o'zingizdan qoniqish hissini yoqotgan bo'lishi mumkin. Stress tasirida bosh miyada qon aylanishi buziladi, gipoksiya yani kislorod yetishmovchiligi yuz beradi, ularning asorat sifatida esa insonning o'ziga hurmati va mehri kamayishi mumkin. Balki sizni doimo kim bilandir taqqoslashgan bo'lishi mumkin, va siz buni asosli deb qabul qilgansiz. Bu tashqi ko'rinish bilan ham bog'liq bo'lishi mumkin.",
            "O'zingizga baho berishingiz holati biroz yomonroq deyish mumkin, tashqi muhit tasiri, doimiy stresslar sizdagi o'zingizdan qoniqish hissini yoqotgan bo'lishi mumkin. Stress tasirida bosh miyada qon aylanishi buziladi, gipoksiya yani kislorod yetishmovchiligi yuz beradi, ularning asorati sifatida esa insonning o'ziga hurmati va mehri kamayishi mumkin. Doimiy kim bilandir ishingizni, tashqi ko'rinishingizni, harakteringizni taqqoslagan bo'lishingiz mumkin.",
            "O'zingizga baho berishingiz holati o'rtacha, o'zingizdan va ishlaringizdan ko'nglingiz to'ladi. Ammo bazan sizni taqqoslashlarini asosli deb hisoblaysiz yoki bu ishni o'zingiz qilasiz. ",
            "O'zingizga yaxshi baho berasiz, ishda yoki atrofdagilar bilan munosabatta bu narsa sizga omad keltiradi."
        ];

        $info_name[3] = [
            "Kayfiyatingizda barqarorlik deyarli yo'q deyish mumkin. 10 yil oldin siz etibor bermaydigan narsalar bugun sizni hafa qilishi, jahlingizni chiqarishi mumkin. Bu holat ko'pincha gormonal kasallik+vitamin minerallar yetishmovchiligi+surunkali stresslar sababli yuzaga keladi. Shuning uchun avvalo jismniy holatingizga etibor qarating. Sog'lom uyquga erishing, 8 soatlik sifatli uxlashga harakat qiling.",
            "Kayfiyatingizda barqarorlik deyarli yo'q deyish mumkin. 10 yil oldin siz etibor bermaydigan narsalar bugun sizni hafa qilishi, jahlingizni chiqarishi mumkin. Bu holat ko'pincha gormonal kasallik+vitamin minerallar yetishmovchiligi+surunkali stresslar sababli yuzaga keladi. Shuning uchun avvalo jismniy holatingizga etibor qarating. Sog'lom uyquga erishing, 8 soatlik sifatli uxlashga harakat qiling.",
            "Kayfiyatingizdagi barqarorlik o'rtacha holatda deyish mumkin ammo bu barqarorlik juda kuchsiz va hoxlagan payt yo'qolib ketishi mumkin. Kayfiyatingiz tez o'zgarganligi sababli yaqinlaringiz bilan muammollar paydo bo'layotgan bo'lishi mumkin. Holatingizda eng avvola miya neyronlari holatini yaxshilash, ularni zarur vitaminlar bilan to'yintirish lozim.",
            "Kayfiyatingiz barqarorligi boshqarish mumkin bo'lgan holatda. Kun tartibingizni yo'lga qo'ying. Ertaroq uxlash va ertaroq turishga harakat qiling.o'zingizga kundalik sizni hursand qiluvchi hobby toping, meditatsiya musiqa tinglash yoki chalish, sport bilan shug'ullanish va hokazo",
            "Sizning kayfiyatingiz barqarorligi juda yaxshi holatda deyish mumkin."
        ];

        $info_name[4] = [
            "Iroda susayishi ko'pincha turli darajali depressiya hisobiga ham yuzaga keladi. Depressiya esa polietiologik yani ko'p sababli holat hisoblanadi. Bu gormonal fonning o'zgarishi, doimiy havotir, qo'rquv, kuchli stresslardan qolgan asoratdir. Eng avvalo organizmda mavjud kasalliklarni davolash, yetishmagan qismlarni to'ldirish zarur.",
            "Iroda susayishi ko'pincha turli darajali depressiya hisobiga ham yuzaga keladi. Depressiya esa polietiologik yani ko'p sababli holat hisoblanadi. Bu gormonal fonning o'zgarishi, doimiy havotir, qo'rquv, kuchli stresslardan qolgan asoratdir. Eng avvalo organizmda mavjud kasalliklarni davolash, yetishmagan qismlarni to'ldirish zarur.",
            "Boshlagan ishlaringizni oxiriga yetqizaolmayisz, yangiliklardan o'zgarishlardan qo'rqasiz yoki kuch topa olmaysiz. Balki bu narsadan o'zingiz ham aziyat chekarsiz. Iroda susayishi ko'pincha turli darajali depressiya hisobiga yuzaga keladi. Depressiya esa polietiologik yani ko'p sababli holat hisoblanadi. Bu gormonal fonning o'zgarishi, doimiy havotir, qo'rquv, kuchli stresslardan qolgan asoratdir. Eng avvalo organizmda mavjud kasalliklarni davolash, yetishmagan qismlarni to'ldirish zarur.",
            "Doimiy ishlashga, o'qishga, o'rganishga siz xoxish topa olasiz ammo bu doimiy emas. Bazida esa aynan sizga kerak paytta bu sizga pand berishi ham mumkin. Bunday holatta eng avvalo mavjud kasalliklarni davolash, yetishmagan qismlarni to'ldirish zarur. Sog'lom uyqu, dam olishning yetishmasligi ham bunga sabab bo'lishi mumkin. ",
            "Yangiliklarni yaxshi ko'rasiz, tabiatan erinchoq insonlar toifasiga kirmaysiz, ammo o'z ustungizda ishlash, sog'lom turmush tarzi, sog'lom gormonal fon sizga zarar qilmaydi. Maqsad qo'yish va unga erishishda kun tartibi, to'g'ri rejalashtirilgan bo'lishi muhimdir, kun tartibingizni to'g'ri yo'lga qo'yishga harakat qiling siz uchun muhim ishlarni iloji boricha ertalabga qo'ying. ",
        ];

        $info_name[5] = [
            "Havotirlanish bu hali sodir bo'lmagan narsaning oqibatidan qo'rqishdir. Siz aqlan buni qo'rqinchli deb hisoblamagan taqdiringizda ham yurak urishingiz, qon bosimingiz, bosh miyangiz faoliyati bunga javob beradi. Bu esa hayot sifatini pasayishiga olib keladi. Ko'pincha anemiya, gipotireoz (buqoq) ushbu holatga sabab bo'ladi, shuning uchun fikrni jamlash ish sifatini oshirish uchun Vitamin D, Kalsiy, Yod kabilarni qabul qilish lozim.",
            "Havotirlanish bu hali sodir bo'lmagan narsaning oqibatidan qo'rqishdir. Siz aqlan buni qo'rqinchli deb hisoblamagan taqdiringizda ham yurak urishingiz, qon bosimingiz, bosh miyangiz faoliyati bunga javob beradi. Bu esa hayot sifatini pasayishiga olib keladi. Ko'pincha anemiya, gipotireoz (buqoq) ushbu holatga sabab bo'ladi, shuning uchun fikrni jamlash ish sifatini oshirish uchun Vitamin D, Kalsiy, Yod kabilarni qabul qilish lozim.",
            "Havotirlanish bu hali sodir bo'lmagan narsaning oqibatidan qo'rqishdir. Siz aqlan buni qo'rqinchli deb hisoblamagan taqdiringizda ham yurak urishingiz, qon bosimingiz, bosh miyangiz faoliyati bunga javob beradi. Bu esa hayot sifatini pasayishiga olib keladi. Ko'pincha anemiya, gipotireoz (buqoq) ushbu holatga sabab bo'ladi, shuning uchun fikrni jamlash ish sifatini oshirish uchun Vitamin D, Kalsiy, Yod kabilarni qabul qilish lozim.",
            "Diqqatingizni jamlash qobiliyati sizda mavjyd ammo doim ham emas. Bunga ko'pincha anemiya, gipotireoz (buqoq) ushbu holatga sabab bo'ladi, shuning uchun fikrni jamlash ish sifatini oshirish uchun Vitamin D, Kalsiy, Yod kabilarni qabul qilish lozim.",
            "Aqliy mehnat, kitob o'qish, o'rganishga ishtiyoqingizni yaxshi saqlab qolgansiz. Buni rivojlantirish uchun Vitamin D, yod preparatlari qabul qilish sizga judaham foydali bo'ladi."
        ];

        for ($i = 0; $i < count($steroids['uz']); $i++){
            $steroid = Steroid::create([
                'avg' => $arr[$i]
            ]);
            $tests = $this->tests()[$i];
            foreach ($tests as $test) {
                Steroidtest::create([
                    'steroid_id' => $steroid->id,
                    'test_id' => $test['id'],
                    'percent' => $test['percent']
                ]);
            }
            foreach ($langs as $lang) {
                SteroidTranslation::create([
                    'name' => $steroids[$lang->code][$i],
                    'object_id' => $steroid->id,
                    'language_code' => $lang->code
                ]);
            }
            $j=0;
            foreach ($this->infos() as $key => $info) {
                $streroidInfo = Steroidinfo::create([
                    'steroid_id' => $steroid->id,
                    'min' => $info['min'],
                    'max' => $info['max']
                ]);
                foreach ($langs as $lang) {
                    SteroidinfoTranslation::create([
                        // 'name' => $steroids[$lang->code][$i] . " " . $info['min'] ."-". $info['max'],
                        'name' => $info_name[$i][$j],
                        'object_id' => $streroidInfo->id,
                        'language_code' => $lang->code
                    ]);
                }
                $j++;
            }
        }
    }

    private function infos()
    {
        return [
            [
                'min' => 0,
                'max' => 19
            ],
            [
                'min' => 20,
                'max' => 39
            ],
            [
                'min' => 40,
                'max' => 59
            ],
            [
                'min' => 60,
                'max' => 79
            ],
            [
                'min' => 80,
                'max' => 10000
            ],
        ];
    }

    private function infosText()
    {
        return [
            'uz' => [
                "Sizning holatingiz",
                "Buqoq",
                "Xudbinlik",
                "Kayfiyat barqarorligi",
                "Iroda",
                "Fikrni jamlash"
            ],
            'en' => [
                "Sleep", "Adenois", "Selfishness", "Mood stability", "Will", "Concentration"],
            'ru' => ["Сон", "Аденуа", "Эгоизм", "Устойчивость настроения", "Воля", "Концентрация"],
        ];
    }

    private function tests()
    {
        return [
            0 => [
                [
                    'id' => 13,
                    'percent' => 50
                ],
                [
                    'id' => 14,
                    'percent' => 50
                ],
            ],
            1 => [
                [
                    'id' => 1,
                    'percent' => 10
                ],
                [
                    'id' => 2,
                    'percent' => 20
                ],
                [
                    'id' => 3,
                    'percent' => 10
                ],
                [
                    'id' => 4,
                    'percent' => 10
                ],
                [
                    'id' => 5,
                    'percent' => 15
                ],
                [
                    'id' => 7,
                    'percent' => 15
                ],
                [
                    'id' => 14,
                    'percent' => 10
                ],
                [
                    'id' => 15,
                    'percent' => 10
                ],
            ],
            2 => [
                [
                    'id' => 2,
                    'percent' => 5
                ],
                [
                    'id' => 3,
                    'percent' => 5
                ],
                [
                    'id' => 10,
                    'percent' => 30
                ],
                [
                    'id' => 11,
                    'percent' => 30
                ],
                [
                    'id' => 12,
                    'percent' => 30
                ]
            ],
            3 => [
                [
                    'id' => 3,
                    'percent' => 50
                ],
                [
                    'id' => 9,
                    'percent' => 25
                ],
                [
                    'id' => 15,
                    'percent' => 25
                ]
            ],
            4 => [
                [
                    'id' => 3,
                    'percent' => 10
                ],
                [
                    'id' => 5,
                    'percent' => 10
                ],
                [
                    'id' => 8,
                    'percent' => 40
                ],
                [
                    'id' => 9,
                    'percent' => 30
                ],
                [
                    'id' => 15,
                    'percent' => 10
                ]
            ],
            5 => [
                [
                    'id' => 3,
                    'percent' => 10
                ],
                [
                    'id' => 8,
                    'percent' => 10
                ],
                [
                    'id' => 9,
                    'percent' => 10
                ],
                [
                    'id' => 6,
                    'percent' => 20
                ],
                [
                    'id' => 13,
                    'percent' => 10
                ],
                [
                    'id' => 15,
                    'percent' => 40
                ]
            ]
        ];
    }
}
