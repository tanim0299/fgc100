<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Library\SslCommerz\SslCommerzNotification;
use App\Models\present_students;
use App\Models\ex_students;
use App\Models\pay_success_info;
use App\Models\SslCommerzPay_info;
use Illuminate\Support\Facades\Crypt;

class SslCommerzPaymentController extends Controller
{

    public function payViaAjax(Request $request)
    {
        // return $request->all();
        $request = json_decode($request->cart_json);
        $type = $request->type;
        $charge = $type == 'ex' ? $request->total_member * 75 : 25;
        $total_amount = $type == 'ex' ? $request->total_member * 3000 + $charge : 1000 + $charge;
        //  return $t->amount;
        //  dd($request->cart_json->cus_name);

        # Here you have to receive all the order data to initate the payment.
        # Lets your oder trnsaction informations are saving in a table called "orders"
        # In orders table order uniq identity is "transaction_id","status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.

        $post_data = array();
        $post_data['total_amount'] = $total_amount; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $request->cus_name;
        $post_data['cus_email'] = 'customer@mail.com';
        $post_data['cus_add1'] = 'Feni';
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = $request->cus_phone;
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = $request->cus_name;
        $post_data['ship_add1'] = "Feni FGC";
        $post_data['ship_add2'] = "Feni FGC";
        $post_data['ship_city'] = "Feni FGC";
        $post_data['ship_state'] = "Feni FGC";
        $post_data['ship_postcode'] = "3900";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Fees";
        $post_data['product_category'] = "Celebrations";
        $post_data['product_profile'] = "FGC 100 Celebrations";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = $request->cus_phone;
        $post_data['value_b'] = $request->reg_id;
        $post_data['value_c'] = $request->type;
        // $post_data['value_d'] = "ref004";


        #Before  going to initiate the payment order status need to update as Pending.

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'checkout', 'json');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }
    }

    public function success(Request $request)
    {
        // echo "Transaction is Successful";
        // dd($request->all());
        $tran_id = $request->input('tran_id');
        $bank_tran_id = $request->input('bank_tran_id');
        $amount = $request->input('amount');
        $currency = $request->input('currency');
        $mobile = $request->input('value_a');
        $reg_id = $request->input('value_b');
        $std_type = $request->input('value_c');
        $card_issuer = $request->input('card_issuer');

        $sslc = new SslCommerzNotification();

        #Check order status in order tabel against the transaction id or order id.
        if ($std_type == 'ex') {

            $order_details = ex_students::where('phone', $mobile)->first();
        } elseif ($std_type == 'present') {

            $order_details = present_students::where('phone', $mobile)->first();
        }
        if ($order_details->payment == '0') {
            // dd($order_details);
            $validation = $sslc->orderValidate($request->all(), $tran_id, $amount, $currency, $mobile);

            if ($validation == TRUE) {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel. Here you need to update order status
                in order table as Processing or Complete.
                Here you can also sent sms or email for successfull transaction to customer
                */
                $ssl = SslCommerzPay_info::create($request->all());
                $insert_amount = pay_success_info::create([
                    'tran_id' => Crypt::encrypt($bank_tran_id),
                    'reg_id' => $reg_id,
                    'mobile' => $mobile,
                    'payment_date_time' => date('Y-m-d h:i:s'),
                    'payment_date' => date('Y-m-d'),
                    'amount' => $amount,
                    'pay_type' => $card_issuer,
                    'std_type' => $std_type,
                ]);
                if ($std_type == 'ex') {

                    $update_fees = ex_students::where('phone', $mobile)
                        ->update([
                            'payment' => 1,
                            'payment_date' => date('Y-m-d h:i:s'),
                            'tran_id' => Crypt::encrypt($bank_tran_id),
                        ]);
                } elseif ($std_type == 'present') {

                    $update_fees = present_students::where('phone', $mobile)
                        ->update([
                            'payment' => 1,
                            'payment_date' => date('Y-m-d h:i:s'),
                            'tran_id' => Crypt::encrypt($bank_tran_id),
                        ]);
                }

                return redirect('/')->with('success_pay', 'Transaction is successfully Completed');
            } else {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel and Transation validation failed.
                Here you need to update order status as Failed in order table.
                */
                $ssl = SslCommerzPay_info::create($request->all());

                if ($std_type == 'ex') {

                    $update_fees = ex_students::where('phone', $mobile)
                        ->update([
                            'payment' => 0,
                            // 'payment_date' => date('Y-m-d h:i:s'),
                            // 'tran_id' => Crypt::encrypt($bank_tran_id),
                        ]);
                } elseif ($std_type == 'present') {

                    $update_fees = present_students::where('phone', $mobile)
                        ->update([
                            'payment' => 0,
                            // 'payment_date' => date('Y-m-d h:i:s'),
                            // 'tran_id' => Crypt::encrypt($bank_tran_id),
                        ]);
                }
                return redirect('/')->with('warning_pay', 'validation Fail');
            }
        } else if ($order_details->payment == '1') {

            #That means Order status already updated. No need to udate database.
            return redirect('/')->with('warning_pay', 'Transaction is already successfully Completed');
        } else {
            #That means something wrong happened. You can redirect customer to your product page.
            return redirect('/')->with('error_pay', 'Invalid Transaction');
            // echo "Invalid Transaction";
        }
    }

    public function fail(Request $request)
    {
        $tran_id = $request->input('tran_id');
        $bank_tran_id = $request->input('bank_tran_id');
        $mobile = $request->input('value_a');
        $reg_id = $request->input('value_b');
        $std_type = $request->input('value_c');
        // dd($request->all());
        if ($std_type == 'ex') {

            $order_details = ex_students::where('phone', $mobile)->first();
        } elseif ($std_type == 'present') {

            $order_details = present_students::where('phone', $mobile)->first();
        }
        // dd($order_details);
        if ($order_details->payment == '0') {
            $ssl = SslCommerzPay_info::create($request->all());
            if ($std_type == 'ex') {

                $update_fees = ex_students::where('phone', $mobile)
                    ->update([
                        'payment' => 0,
                        // 'payment_date' => date('Y-m-d h:i:s'),
                        // 'tran_id' => Crypt::encrypt($bank_tran_id),
                    ]);
            } elseif ($std_type == 'present') {

                $update_fees = present_students::where('phone', $mobile)
                    ->update([
                        'payment' => 0,
                        // 'payment_date' => date('Y-m-d h:i:s'),
                        // 'tran_id' => Crypt::encrypt($bank_tran_id),
                    ]);
            }

            return redirect('/')->with('error_pay', 'Transaction is Falied');
        } else if ($order_details->payment == '1') {
            return redirect('/')->with('warning_pay', 'Transaction is already Successful');
        } else {
            return redirect('/')->with('error_pay', 'Transaction is Invalid');
        }
    }

    public function cancel(Request $request)
    {
        $tran_id = $request->input('tran_id');
        $bank_tran_id = $request->input('bank_tran_id');
        $mobile = $request->input('value_a');
        $reg_id = $request->input('value_b');
        $std_type = $request->input('value_c');

        if ($std_type == 'ex') {

            $order_details = ex_students::where('phone', $mobile)->first();
        } elseif ($std_type == 'present') {

            $order_details = present_students::where('phone', $mobile)->first();
        }
        if ($order_details->payment == '0') {
            $ssl = SslCommerzPay_info::create($request->all());
            if ($std_type == 'ex') {

                $update_fees = ex_students::where('phone', $mobile)
                    ->update([
                        'payment' => 0,
                        // 'payment_date' => date('Y-m-d h:i:s'),
                        // 'tran_id' => Crypt::encrypt($bank_tran_id),
                    ]);
            } elseif ($std_type == 'present') {

                $update_fees = present_students::where('phone', $mobile)
                    ->update([
                        'payment' => 0,
                        // 'payment_date' => date('Y-m-d h:i:s'),
                        // 'tran_id' => Crypt::encrypt($bank_tran_id),
                    ]);
            }
            return redirect('/')->with('error_pay', 'Transaction is Cancel');
        } else if ($order_details->payment == '1') {
            return redirect('/')->with('warning_pay', 'Transaction is already Successful');
        } else {
            return redirect('/')->with('error_pay', 'Transaction is Invalid');
        }
    }

    public function ipn(Request $request)
    {
        #Received all the payement information from the gateway
        if ($request->input('tran_id')) #Check transation id is posted or not.
        {

            $tran_id = $request->input('tran_id');
            $bank_tran_id = $request->input('bank_tran_id');
            $amount = $request->input('amount');
            $currency = $request->input('currency');
            $mobile = $request->input('value_a');
            $reg_id = $request->input('value_b');
            $std_type = $request->input('value_c');
            $card_issuer = $request->input('card_issuer');

            if ($std_type == 'ex') {

                $order_details = ex_students::where('phone', $mobile)->first();
            } elseif ($std_type == 'present') {

                $order_details = present_students::where('phone', $mobile)->first();
            }

            if ($order_details->payment == '0') {
                $sslc = new SslCommerzNotification();
                $validation = $sslc->orderValidate($request->all(), $tran_id, $order_details->amount, $order_details->currency, $order_details->phone);
                if ($validation == TRUE) {
                    /*
                    That means IPN worked. Here you need to update order status
                    in order table as Processing or Complete.
                    Here you can also sent sms or email for successful transaction to customer
                    */
                    $ssl = SslCommerzPay_info::create($request->all());
                    $insert_amount = pay_success_info::create([
                        'tran_id' => Crypt::encrypt($bank_tran_id),
                        'reg_id' => $reg_id,
                        'mobile' => $mobile,
                        'payment_date_time' => date('Y-m-d h:i:s'),
                        'payment_date' => date('Y-m-d'),
                        'amount' => $amount,
                        'pay_type' => $card_issuer,
                        'std_type' => $std_type,
                    ]);
                    if ($std_type == 'ex') {

                        $update_fees = ex_students::where('phone', $mobile)
                            ->update([
                                'payment' => 1,
                                'payment_date' => date('Y-m-d h:i:s'),
                                'tran_id' => Crypt::encrypt($bank_tran_id),
                            ]);
                    } elseif ($std_type == 'present') {

                        $update_fees = present_students::where('phone', $mobile)
                            ->update([
                                'payment' => 1,
                                'payment_date' => date('Y-m-d h:i:s'),
                                'tran_id' => Crypt::encrypt($bank_tran_id),
                            ]);
                    }
                    return redirect('/')->with('success_pay', 'Transaction is successfully Completed');
                } else {
                    /*
                    That means IPN worked, but Transation validation failed.
                    Here you need to update order status as Failed in order table.
                    */
                    $ssl = SslCommerzPay_info::create($request->all());
                    if ($std_type == 'ex') {

                        $update_fees = ex_students::where('phone', $mobile)
                            ->update([
                                'payment' => 0,
                                // 'payment_date' => date('Y-m-d h:i:s'),
                                // 'tran_id' => Crypt::encrypt($bank_tran_id),
                            ]);
                    } elseif ($std_type == 'present') {

                        $update_fees = present_students::where('phone', $mobile)
                            ->update([
                                'payment' => 0,
                                // 'payment_date' => date('Y-m-d h:i:s'),
                                // 'tran_id' => Crypt::encrypt($bank_tran_id),
                            ]);
                    }
                    return redirect('/')->with('warning_pay', 'validation Fail');
                }
            } else if ($order_details->payment == '1') {

                #That means Order status already updated. No need to udate database.

                return redirect('/')->with('warning_pay', 'Transaction is already successfully Completed');
            } else {
                #That means something wrong happened. You can redirect customer to your product page.

                return redirect('/')->with('error_pay', 'Invalid Transaction');
            }
        } else {
            return redirect('/')->with('error_pay', 'Invalid Data');
        }
    }
}
