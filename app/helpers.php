<?php

use App\Models\Category;
use App\Models\Language;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Collection AS SupportCollection;

if(!function_exists('getLanguages')) {
    function getLanguages()
    {
        return Language::all();
    }
}

if(!function_exists('getLabel')) {
    function getLabel($code)
    {
        if($code == 10)
        {
            return 'Kurs';

        }
        if($code == 20)
        {
            return 'Masterklass';
        }
    }
}

if(!function_exists('hasLessonBlocked')) {
    function hasLessonBlocked($usershow, $lesson)
    {
        $created = getProp($usershow->toArray(), '0.created_at');
        $daily = getProp($lesson->toArray(), 'daily');
        if ($created && $daily) {
            // $start = date("Y-m-d", strtotime($created));
            $lessonDay = date("Y-m-d", strtotime($created, strtotime("+$daily day")));
            if (date("Y-m-d") >= $lessonDay) {
                return true;
            }
        }
        return false;
    }
}

if(!function_exists('getCategories')) {
    function getCategories()
    {
        return Category::all();
    }
}

if (!function_exists("parseToRelation")) {
    function parseToRelation($relations = null)
    {
        $parsed = [];
        foreach ($relations as $key => $relation) {
            if (is_string($key)) {
                if ($relation instanceof Closure) $parsed[$key] = $relation;
                else if (is_array($relation)) $parsed[$key] = makeWithRelationQuery($relation);
            } else $parsed[] = $relation;
        }
        return $parsed;
    }
}

if (!function_exists("makeWithRelationQuery")) {
    function makeWithRelationQuery($relation)
    {
        $selects = [];
        $withs = [];
        if (empty($relation)) return fn ($q) => $q->select('*');
        $order = false;
        $closures = [];
        foreach ($relation as $key => $value) {
            if (is_numeric($key) && $value instanceof Closure) {
                $closures[] = $value;
                continue;
            }
            if ($key === 'order') {
                if (is_string($value) && !empty($value)) $order = $value;
                continue;
            }
            if (is_string($key)) {
                if ($value instanceof Closure) $withs[$key] = $value;
                else if (is_array($value)) $withs[$key] = makeWithRelationQuery($value);
            } else {
                if (str_contains($value, '|')) {
                    $selects[] = explode("|", $value)[0];
                    $order = $value;
                } else $selects[] = $value;
            }
        }
        return function ($q) use ($selects, $withs, $order, $closures) {
            if ($order) {
                $sort = explode('|', $order);
                $use = isset($sort[1]) && (strtolower($sort[1]) === 'asc' || strtolower($sort[1]) === 'desc');
                $q->orderBy($sort[0], $use ? strtolower($sort[1]) : 'asc');
            }
            if (empty($selects)) $q->select('*');
            else $q->selectRaw(implode(',', $selects));

            if (!empty($withs)) $q->with($withs);
            foreach ($closures as $closure) $closure($q);
        };
    }
}


if(!function_exists('mediaDelete')) {
    function mediaDelete($media)
    {
        $name = $media->name.'.'.$media->extension;
        $folder = $media->folder;
        $path = storage_path("app/$folder/$name");
        if(file_exists($path)) return unlink($path);
        return false;
    }
}

if (!function_exists('getProp')) {
    function getProp($data, $key, $default = null)
    {
        if(str_contains($key, '.') && ($arr = explode('.', $key))) {
            $first = array_shift($arr);
            $firstProp = getProp($data, $first, $default);
            return getProp($firstProp, implode('.', $arr), $default);
        }
        if (is_array($data)) return isset($data[$key]) ? $data[$key] : $default;
        else if  (is_object($data)) {
            if ($data instanceof Collection || $data instanceof SupportCollection) {
                return isset($data[$key]) ? $data[$key] : $default;
            }
            return isset($data->{$key}) ? $data->{$key} : $default;
        }
        else return $default;
    }
}

if (!function_exists('langPrefix')) {
    function langPrefix()
    {
        $defaultLocale = config('app.default_locale');
        $currentLocale = app()->getLocale();
        if ($currentLocale != $defaultLocale) {
            return "$currentLocale/";
        } else {
            return '';
        }
    }
}

if (!function_exists('scriptjs')) {
    function scriptjs($file)
    {
        return base_path("resources/views/scripts/$file.js");
    }
}

if (!function_exists('popper')) {
    function popper(&$array, $key, $default = null)
    {
        if (isset($array[$key])) {
            $data = $array[$key];
            unset($array[$key]);
            return $data;
        }
        return $default;
    }
}
