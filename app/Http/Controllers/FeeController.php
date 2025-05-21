<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Fee;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    public function index()
    {
        $fee = Fee::first();
        return view('admin.fees.index', compact('fee'));
    }

    public function update(Request $request)
    {
        $request->merge([
            'sfp_option_1' => str_replace('.', '', $request->input('sfp_option_1')),
            'sfp_option_2' => str_replace('.', '', $request->input('sfp_option_2')),
            'sfp_option_3' => str_replace('.', '', $request->input('sfp_option_3')),
            'sfp_option_4' => str_replace('.', '', $request->input('sfp_option_4')),
            'sfp_option_5' => str_replace('.', '', $request->input('sfp_option_5')),
            'dpp_amount' => str_replace('.', '', $request->input('dpp_amount')),
            'spp_amount' => str_replace('.', '', $request->input('spp_amount')),
        ]);

        $validated = $request->validate([
            'sfp_option_1' => 'required|numeric|min:0',
            'sfp_option_2' => 'required|numeric|min:0',
            'sfp_option_3' => 'required|numeric|min:0',
            'sfp_option_4' => 'required|numeric|min:0',
            'sfp_option_5' => 'required|numeric|min:0',
            'dpp_amount' => 'required|numeric|min:0',
            'dpp_items' => 'required|array',
            'dpp_items.*' => 'required|string',
            'spp_amount' => 'required|numeric|min:0',
            'payment_phone' => 'required|string',
            'payment_email' => 'required|email',
        ]);

        $fee = Fee::first();
        $fee->update($validated);

        return redirect()->route('fees.index')->with('success', 'Biaya berhasil diperbarui.');
    }
}
