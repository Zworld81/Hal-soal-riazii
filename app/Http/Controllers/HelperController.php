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
     * @param string $text
     */
    public static function flash($type, $title, $text = '')
    {
        session()->flash('type', $type);
        session()->flash('title', $title);
        session()->flash('text', $text);
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
            case 0:
                return '<div class="progress-dasti"><p>در انتظار تایید</p><div class="yellow-circle-dasti"></div></div>';
            case 1:
                return '<div class="finished-dasti"><p>حل شده</p><div class="green-circle-dasti"></div></div>';
            case 2:
                return '<div class="reject-dasti"><p>رد شده</p><div class="black-circle-dasti"></div></div>';
            case 3:
                return '<div class="progress-dasti"><p>در انتظار مدرس</p><div class="yellow-circle-dasti"></div></div>';
            case 4:
                return '<div class="progress-dasti"><p>در حال حل شدن</p><div class="yellow-circle-dasti"></div></div>';
            default:
                return '<div class="progress-dasti"><p>در حال حل شدن</p><div class="yellow-circle-dasti"></div></div>';
        }
    }

    public static function getCurrentLevel(int $level): string
    {
        switch ($level) {
            case 0:
                return 'ادمین';
            case 1:
                return 'کاربر';
            case 2:
                return 'مدرس';
        }
    }
    public static function getClass(int $class): string
    {
        return config('custom.class')[$class];
    }
}
