<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageUpsertRequest;
use App\Services\LanguageService;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    protected LanguageService $service;
    public function __construct(
        LanguageService $service
    )
    {
        $this->service = $service;
    }

//    public function changeLocale($locale)
//    {
//        $prev = url()->previous();
//        if($this->service->existsByColumn('code', $locale)) {
//            foreach (explode('/', $prev) as $item) {
//                if($this->service->existsByColumn('code', $item)) {
//                    app()->setLocale($locale);
//                    if ($locale == config('app.default_locale')){
//                        $prev = str_replace("/$item", '', $prev);
//                    } else {
//                        $prev = str_replace($item, $locale, $prev);
//                    }
//                    return redirect($prev);
//                }
//            }
//            if ($url = str_replace(asset(''), '', $prev)) {
//                $redirect = asset('') . "$locale/" . $url;
//                return redirect($redirect);
//            }
//            return redirect($locale . '/admin/language');
//        }
//    }
    public function changeLocale($locale)
    {
//        return $locale;
        // Ruxsat berilgan tillar ro'yxati
        $availableLocales = ['uz', 'ru', 'en'];

        // Agar kiritilgan til ruxsat berilgan bo'lsa, sessiyaga yozamiz
        if (in_array($locale, $availableLocales)) {
            Session::put('locale', $locale);

            // Laravel'ning global lokalini sozlash
            App::setLocale($locale);

            // Test: sessiya va App::getLocale()ni ko'rsatish
//            dd(Session::get('locale'), App::getLocale());
        } else {
            abort(404, 'Til topilmadi!');
        }

        // Foydalanuvchini orqaga qaytarish yoki boshqa joyga yo'naltirish
        return redirect()->back();
    }


    public function index(IndexRequest $indexRequest)
    {
        $languages = $this->service->getList($indexRequest);
        return view('admin.language.index', compact('languages'));
    }

    public function create()
    {
        return view('admin.language.create');
    }

    public function store(LanguageUpsertRequest $upsertRequest)
    {
        return $this->service->create($upsertRequest->validated(), true)->redirect('admin.language.index');
    }

    public function show($id)
    {
        $language = $this->service->show($id);
        return view('admin.language.show', compact('language'));
    }

    public function edit($id)
    {
        $language = $this->service->show($id);
        return view('admin.language.edit', compact('language'));
    }

    public function update($id, LanguageUpsertRequest $upsertRequest)
    {
        $data = $upsertRequest->validated();
        if(!isset($data['is_active'])) $data['is_active'] = '0';
        return $this->service->edit($id, $data, true)->redirect('admin.language.index');
    }

    public function destroy($id)
    {
        return $this->service->delete($id, true)->redirect('admin.language.index');
    }
}
