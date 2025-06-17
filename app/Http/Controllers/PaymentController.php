<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Midtrans\Config;
use Midtrans\Snap;

class PaymentController extends Controller
{
    public function __construct()
    {
        // Set your Merchant Server Key
        Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isProduction = config('midtrans.is_production', false);
        // Set sanitization on (default)
        Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        Config::$is3ds = true;
    }

    public function createPayment(Request $request)
    {
        try {
            // Validate request
            $request->validate([
                'customer_name' => 'required|string|max:255',
                'customer_email' => 'required|email|max:255',
                'customer_phone' => 'required|string|max:20',
                'checkin_date' => 'required|date',
                'checkout_date' => 'required|date|after:checkin_date',
                'persons' => 'required|integer|min:1|max:4',
                'total_amount' => 'required|numeric|min:0',
                'payment_method' => 'required|string|in:bank_transfer,credit_card,e_wallet'
            ]);

            // Generate unique order ID
            $orderId = 'BB-' . date('Ymd') . '-' . Str::random(8);

            // Prepare transaction details
            $transactionDetails = [
                'order_id' => $orderId,
                'gross_amount' => (int) $request->total_amount,
            ];

            // Customer details
            $customerDetails = [
                'first_name' => $request->customer_name,
                'email' => $request->customer_email,
                'phone' => $request->customer_phone,
            ];

            // Item details
            $itemDetails = [
                [
                    'id' => 'room-deluxe',
                    'price' => (int) $request->room_price,
                    'quantity' => $request->nights,
                    'name' => 'Deluxe Room (' . $request->nights . ' nights)',
                ]
            ];

            if ($request->extra_person_price > 0) {
                $itemDetails[] = [
                    'id' => 'extra-person',
                    'price' => (int) $request->extra_person_price,
                    'quantity' => 1,
                    'name' => 'Extra Person Fee',
                ];
            }

            if ($request->tax_amount > 0) {
                $itemDetails[] = [
                    'id' => 'tax-service',
                    'price' => (int) $request->tax_amount,
                    'quantity' => 1,
                    'name' => 'Tax & Service (10%)',
                ];
            }

            // Prepare payment parameters
            $params = [
                'transaction_details' => $transactionDetails,
                'customer_details' => $customerDetails,
                'item_details' => $itemDetails,
                'callbacks' => [
                    'finish' => url('/payment/finish'),
                    'unfinish' => url('/payment/unfinish'),
                    'error' => url('/payment/error'),
                ]
            ];

            // Enable specific payment methods based on selection
            $enabledPayments = [];
            
            switch ($request->payment_method) {
                case 'bank_transfer':
                    $enabledPayments = ['bank_transfer'];
                    if ($request->bank) {
                        $params['bank_transfer'] = [
                            'bank' => $request->bank
                        ];
                    }
                    break;
                    
                case 'credit_card':
                    $enabledPayments = ['credit_card'];
                    break;
                    
                case 'e_wallet':
                    $enabledPayments = ['gopay', 'shopeepay'];
                    if ($request->ewallet) {
                        switch ($request->ewallet) {
                            case 'gopay':
                                $enabledPayments = ['gopay'];
                                break;
                            case 'ovo':
                            case 'dana':
                                $enabledPayments = ['shopeepay'];
                                break;
                        }
                    }
                    break;
            }

            $params['enabled_payments'] = $enabledPayments;

            // Save booking to database (optional)
            // You can create a Booking model and save the booking details here
            
            // Get Snap Token
            $snapToken = Snap::getSnapToken($params);

            return response()->json([
                'success' => true,
                'snap_token' => $snapToken,
                'order_id' => $orderId
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create payment: ' . $e->getMessage()
            ], 500);
        }
    }
}