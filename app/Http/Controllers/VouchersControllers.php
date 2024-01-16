<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VouchersModels;

class VouchersControllers extends Controller
{

    public function checkVoucher(Request $request)
    {
        $totalPurchase = $request->input('totalPurchase');
        $result = $this->generateVoucher($totalPurchase);

        if ($result['status']) {
            $voucherAmount = $result['voucherAmount'];
            if ($totalPurchase >= 2000000) {
                $totalAfterVoucher = $totalPurchase - $voucherAmount - 10000;
            }
            return redirect('/')->with([
                'status' => true,
                'message' => $result['message'],
                'voucherAmount' => $voucherAmount,
            ]);
        } else {
            return redirect('/')->with([
                'status' => false,
                'message' => $result['message'],
            ]);
        }
    }


    public function generateVoucher($totalPurchase)
    {
        if ($totalPurchase >= 2000000) {
            $voucherCode = uniqid('Voucher');
            $voucherAmount = 10000;
            $voucher = VouchersModels::create([
                'code' => $voucherCode,
                'amount' => $voucherAmount,
                'expiration_date' => now()->addMonths(3),
                'is_used' => false,
            ]);
            return [
                'status' => true,
                'message' => "Anda mendapatkan voucher dengan kode: $voucherCode",
                'voucherAmount' => $voucherAmount,
            ];
        }
        return [
            'status' => false,
            'message' => "Anda belum memenuhi syarat untuk mendapatkan voucher.",
        ];
    }

    public function useVoucher(Request $request)
    {
        $voucherCode = $request->input('voucherCode');
        $voucher = VouchersModels::where('code', $voucherCode)->first();

        if ($voucher && !$voucher->is_used && now() <= $voucher->expiration_date) {
            $voucher->update(['is_used' => true]);
            return redirect('/use-voucher')->with([
                'status' => true,
                'message' => 'Voucher berhasil digunakan.',
            ]);
        } else {
            return redirect('/use-voucher')->with([
                'status' => false,
                'message' => 'Voucher tidak valid atau sudah digunakan.',
            ]);
        }
    }
}
