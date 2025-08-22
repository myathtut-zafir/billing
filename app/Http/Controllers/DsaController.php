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
}
