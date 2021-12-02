<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function buyStar(Request $request)
    {
        $data = $request->all();

        $invoice = new \Shetabit\Multipay\Invoice;

        $stars = (int)$data['star_count'];
        $invoice->amount($stars * config('custom.star_price'));

        $payment = \Shetabit\Payment\Facade\Payment::purchase($invoice,function($driver, $transactionId) {
            \App\Models\Payment::create([
                'user_id' => auth()->user()->id,
                'transactionId' => $transactionId
            ]);
        });

        \App\Models\Payment::where('transactionId', $invoice->getTransactionId())->update([
            'amount' => $invoice->getAmount(),
             'stars' => $stars
        ]);

        return $payment->pay()->render();
    }

    public function callBackPayment(Request $request){
        try {
            $authority = $request->Authority;
            $payment = \App\Models\Payment::where('transactionId', $authority)->first();
            $receipt = \Shetabit\Payment\Facade\Payment::amount($payment->amount)->transactionId($payment->transactionId)->verify();

            // You can show payment referenceId to the user.
            $payment->update([
                'referenceId' => $receipt->getReferenceId(),
                'is_payed' => true
            ]);
            $payment->user->increment('stars', $payment->stars);

        } catch (InvalidPaymentException $exception) {
            echo $exception->getMessage();
        }
        return redirect()->route('home');
    }
}
