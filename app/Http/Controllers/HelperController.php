<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HelperController extends Controller
{
    /**
     * @param $type
     * @param $title
     */
    public static function flash($type, $title)
    {
        session()->flash('type', $type);
        session()->flash('title', $title);
    }

    /**
     * @param $file
     * @param $dir
     * @param string $location
     * @return string
     */
    public static function uploadFile($file, $dir, $location = 'public'): string
    {
        switch ($location) {
            case 'public':
                $dir = public_path($dir);
                break;
            case 'storage':
                $dir = storage_path($dir);
                break;
            default:
                $dir = public_path($dir);
        }

        $fileName = Carbon::now()->timestamp . Str::random() . '.' . $file->getClientOriginalExtension();
        $file->move($dir, $fileName);

        return $fileName;
    }

    public static function getCurrentStatus(int $status): string
    {
        switch ($status) {
            case 1:
                return '<div class="finished"><p>حل شده</p><div class="green-circle"></div></div>';
            case 2:
                return '<div class="reject"><p>رد شده</p><div class="black-circle"></div></div>';
            default:
                return '<div class="progress"><p>در حال حل شدن</p><div class="yellow-circle"></div></div>';
        }
    }
    public static function getClass(int $class): string
    {
        return config('custom.class')[$class];
    }
}
