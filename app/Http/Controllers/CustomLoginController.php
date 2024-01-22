<?php
namespace App\Http\Controllers;

use App\AddSubVariant;
use App\Cart;
use App\Coupan;
use App\Product;
use App\SimpleProduct;
use Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\MessageBag;
use Redirect;
use Session;

class CustomLoginController extends Controller
{
    use ThrottlesLogins;

    protected $maxAttempts = 3;
    protected $decayMinutes = 1;


    public function doLogin(Request $request)
    {
//        return $request;

        if (Auth::attempt(['mobile' => $request->get('mobile'), 'password' => $request->get('password'),

            'is_verified' => 1, 'status' => 1], $request->remember)) {
//            return $request->mobile;


            if(!auth()->user()->can('login.can')){
                FacadesAuth::logout();
                $errors = new MessageBag(['mobile' => __('Login access blocked !')]);
                return Redirect::back()->withErrors($errors)->withInput($request->except('password'));
            }

            /*Check if user has item in his cart*/
            if (!empty(Session::get('guest_cart'))) {
                $this->cartitem();
                return redirect('cart');
            }

            return redirect()->intended('/');

        } else {
            
            $errors = new MessageBag(['mobile' => 'These credentials do not match our records.']);
            return Redirect::back()->withErrors($errors)->withInput($request->except('password'));

        }
    }

    public function cartitem()
    {

        $SessionCart = Session::get('guest_cart');

        foreach ($SessionCart as $c) {

//            $venderid = Product::find($c['pro_id']);
            $sp = SimpleProduct::where('id',$c)->first();

            if (count(Auth::user()->cart) > 0) {

                $x = Cart::where('simple_pro_id', $c)->where('user_id',\Illuminate\Support\Facades\Auth::id())->first();

                if (isset($x)) {

//                    $findvar = SimpleProduct::find($c);
//
//                    if ($findvar->max_order_qty == '') {
//
//                        if ($findvar->stock > 0) {
//
//                            $newqty = $x->qty + 0;
//                            $newofferprice = $c['qty'] * $c['varofferprice'];
//                            $newprice = $c['qty'] * $c['varprice'];
//
//                            Cart::where('user_id', Auth::user()->id)
//                                ->where('variant_id', $c['variantid'])->update(['qty' => $newqty, 'semi_total' => $newofferprice, 'price_total' => $newprice]);
//
//                        }

//                    }

                } else {

                    $cart = new Cart;
//                    $cart->user_id = Auth::user()->id;
                    $cart->simple_pro_id =$sp->id;
                    $cart->ori_price = $sp->price;
                    $cart->price_total = $sp->price*1;
                    $cart->ori_offer_price = $sp->offerprice;
                    $cart->semi_total = $sp->offerprice*1;
                    $cart->qty = 1;
                    $cart->user_id = auth()->id();
                    $cart->save();

//                    $t_price = $offerprice != 0 ? $offerprice : $price;
//
//                    $taxable_amount = $t_price * 1;
//
//                    $cart->tax_amount = $taxable_amount * $qty;

//                  $cart->vender_id = $product->store->user->id;

//                    $cart->save();

//                    $cart->qty = $c['qty'];
//                    $cart->pro_id = $c['pro_id'];
//                    $cart->variant_id = $c['variantid'];
//                    $cart->ori_price = $c['varprice'];
//                    $cart->ori_offer_price = $c['varofferprice'];
//                    $cart->semi_total = $c['qty'] * $c['varofferprice'];
//                    $cart->price_total = $c['qty'] * $c['varprice'];
//                    $cart->vender_id = $venderid->vender_id;
//                    $cart->save();

                }

            } else {
                $cart = new Cart;
//                    $cart->user_id = Auth::user()->id;
                $cart->simple_pro_id =$sp->id;
                $cart->ori_price = $sp->price;
                $cart->price_total = $sp->price*1;
                $cart->ori_offer_price = $sp->offerprice;
                $cart->semi_total = $sp->offerprice*1;
                $cart->qty = 1;
                $cart->user_id = auth()->id();
                $cart->save();

//                $cart = new Cart;
//                $cart->user_id = Auth::user()->id;
//                $cart->qty = $c['qty'];
//                $cart->pro_id = $c['pro_id'];
//                $cart->variant_id = $c['variantid'];
//                $cart->ori_price = $c['varprice'];
//                $cart->ori_offer_price = $c['varofferprice'];
//                $cart->semi_total = $c['qty'] * $c['varofferprice'];
//                $cart->price_total = $c['qty'] * $c['varprice'];
//                $cart->vender_id = $venderid->vender_id;
//                $cart->save();

            }

        }

        if (session()->has('coupanapplied')) {

            $cpn = Coupan::firstWhere('code', '=', session()->get('coupanapplied')['code']);

            if (isset($cpn)) {

                $applycoupan = new CouponApplyController;

                if (session()->get('coupanapplied')['appliedOn'] == 'category') {
                    $applycoupan->validCouponForCategory($cpn);
                }

                if (session()->get('coupanapplied')['appliedOn'] == 'cart') {
                    $applycoupan->validCouponForCart($cpn);
                }

                if (session()->get('coupanapplied')['appliedOn'] == 'product') {
                    $applycoupan->validCouponForProduct($cpn);
                }

                Session::forget('coupanapplied');
            }

        }

        //Clearing the guest cart
        Session::forget('guest_cart');
        Session::forget('guest_cart_count');

    }
}
