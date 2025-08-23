<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DsaController extends Controller
{
    public function store(Request $request)
    {

        $sorted_items = range(1, 1000000);
        $value = 987654;
        $low = 0;
        $high = count($sorted_items) - 1;

        while ($low <= $high) {
            $mid = floor(($low + $high) / 2);

            if ($sorted_items[$mid] == $value) {
                dd("Value found at index: $mid");
            }
            Log::info('mid', [
                "mid" => $mid,
                "low" => $low,
                "high" => $high,
                "sorted_items" => $sorted_items[$mid]]);
            if ($value < $sorted_items[$mid]) {
                $high = $mid - 1; // ရှာရမယ့်နေရာကို ဘယ်ဘက်အခြမ်း(တစ်ဝက်) လျှော့ချလိုက်တယ်
                Log::info('if', [
                    $high => $high]);
            } else {
                $low = $mid + 1; // ရှာရမယ့်နေရာကို ညာဘက်အခြမ်း(တစ်ဝက်) လျှော့ချလိုက်တယ်
                Log::info('else', [
                    $low => $low]);
            }
        }
        dd("Value not found in the array");

    }

    function sorting()
    {
        $unsorted_array = [6, 2, 8, 1, 9, 4, 7, 3, 5];
        return $this->mergeSort($unsorted_array);

    }

    function mergeSort(array $arr) {
        $count = count($arr);
        if ($count <= 1) {
            return $arr;
        }

        $mid = (int)($count / 2);
        $left = array_slice($arr, 0, $mid);
        $right = array_slice($arr, $mid);
        Log::info('', ["a"=>$left]);
        Log::info('', ["a"=>$right]);
        $left = $this->mergeSort($left);
        $right = $this->mergeSort($right);
        Log::info('', [
            'left' => $left,
            'right' => $right
        ]);
        return $this->merge($left, $right);
    }

    function merge(array $left, array $right) {
        $result = [];
        while (count($left) > 0 && count($right) > 0) {
            if ($left[0] <= $right[0]) {
                $result[] = array_shift($left);
            } else {
                $result[] = array_shift($right);
            }
        }
//        Log::info("dd",["r"=> $result]);
        Log::info("dd",["r"=> array_merge($result, $left, $right)]);
        return array_merge($result, $left, $right);
    }
}
