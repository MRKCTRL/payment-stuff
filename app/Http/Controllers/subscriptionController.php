<?php

namespace App\Http\Controllers;

use App\Http\Middleware\doNotAllowUserToMakePayment;
use App\Http\Middleware\isEmployer;
use App\Mail\purchaseMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Mail\MailQueue;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class subscriptionController extends Controller
{
    const WEEKLY_AMT = 300;
    const MONTHLY_AMT = 540;
    const YEARLY_AMT = 840;

    const CURRENCY = 'ZAR';
    //
    public function __construct()
    {
     $this->middleware(['auth', isEmployer::class, doNotAllowUserToMakePayment::class]);
    }

    public function subscribe()
    {
        return view('subscription.index');
    }
    public function initPayment(Request $request)
    // $request->pri
    {
        $plan = [
            'weekly' => [
                'name' => 'weekly',
                'description' => 'weekly payment',
                'amount' => self::WEEKLY_AMT,
                'currency' => self::CURRENCY,
                'quantity' =>1,
            ],
            'monthly' => [
                'name' => 'monthly',
                'description' => 'monthly payment',
                'amount' => self::MONTHLY_AMT,
                'currency' => self::CURRENCY,
                'quantity' =>1,
            ],
            'yearly' => [
                'name' => 'yearly',
                'description' => 'yearly payment',
                'amount' => self::YEARLY_AMT,
                'currency' => self::CURRENCY,
                'quantity' =>1,
            ],
        ];
        Stripe::setApiKey(config('services.stripe.secret'));

        try{
            $selectPlan = null;
            if($request->is('pay/weekly')){
                $selectPlan = $plan['weekly'];
                $billingDebit = now()->addWeek()->startOfDay()->toDateString();
            }elseif($request->is('pay/monthly')) {
                $selectPlan = $plan['monthly'];
                $billingDebit = now()->addMonth()->startOfDay()->toDateString();
            }elseif($request->is('pay/yearly')) {
                $selectPlan = $plan['yearly'];
                $billingDebit = now()->addYear()->startOfDay()->toDateString();
            }
            if($selectPlan){
                $successUrl = URL::signedRoute('payment.success',[
                    'plan' => $selectPlan['name'],
                    'billing_ends' => $billingDebit
                ]);
                // dd($session);
                $session = Session::create([
                    'payment_method_types' => ['card'],
                    'line_item' => [
                        [
                            'name' => $selectPlan['name'],
                            'description' => $selectPlan['description'],
                            'amount' => $selectPlan['amount']*100,
                            'currency' => $selectPlan['quantity']
                        ]
                    ],
                    'success_url' => $successUrl,
                    'cancel_url' => route('payment.cancel')

                ]);

                return redirect($session->url);

            }
        } catch(\Exception $e){
            return response()->json($e);

        }
    }

    public function paymentSuccessful(Request $request)
    {
        $plan = $request->plan;
        $billingDebit = $request->billing_ends;
        User::where('id', auth()->user()->id)->update([
            'plan' => $plan,
            'billing_ends' => $billingDebit,
            'status' => 'paid'
        ]);
        try {
             Mail::to(auth()->user())->queue(new purchaseMail($plan, $billingDebit));
        }catch (\Exception) {
            return response()->json($e)
        }

       

        return redirect()->route('dashboard')->with('success', 'Transaction was successful');


    }
    public function cancellation()
    {
        return redirect()->route('dashboard')->with('error', 'Transaction Failed');

    }
}
