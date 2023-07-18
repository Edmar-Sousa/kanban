<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

use App\Models\Plans;
use App\Models\User;

use Stripe;

class PaymentController extends Controller
{
    protected Plans $plan_model;
    protected User $user_model;

    public function __construct( Plans $plan, User $user ) {
        $this->plan_model = $plan;
        $this->user_model = $user;
    }


    public function index( Request $request ) 
    {
        $plan = $this->plan_model->get_plan_with_id( $request->get( 'id' ) );

        Stripe\Stripe::setApiKey( env( 'STRIPE_API_PRIVATE_KEY' ) );

        $payment_intent = Stripe\PaymentIntent::create( [
            'amount' => $plan->price * 100,
            'currency' => 'brl',
            'payment_method_types' => [ 'card' ],
            'metadata' => [
                'user' => Auth::user()->id,
                'plan_id' => $plan->id,
            ],
        ] );

        return Inertia::render( 'Payment', [
            'client_secret' => $payment_intent->client_secret,
            'stripe_public_key' => env( 'STRIPE_API_PUBLIC_KEY' ),
        ] );
    }


    /**
     * Codigo de teste temporario por não ter a STRIPE CLI para
     * testar o webhook :(
     */
    public function status( Request $request )
    {
        $stripe = new Stripe\StripeClient( env( 'STRIPE_API_PRIVATE_KEY' ) );

        $payment_intent = $stripe->paymentIntents->search([
            'query' => "status:'succeeded' AND metadata['user']:'" . Auth::user()->id . "'",
        ]);

        if( empty( $payment_intent->data[ 0 ] ) || !isset( $payment_intent->data[ 0 ]->metadata[ 'plan_id' ] ) || !isset( $payment_intent->data[ 0 ]->metadata[ 'user' ] ) )
            return redirect()->back();

        $this->user_model->update_plan( $payment_intent->data[ 0 ]->metadata[ 'user' ], $payment_intent->data[ 0 ]->metadata[ 'plan_id' ] );

        return redirect()->route( 'taskboard' );
    }
}
