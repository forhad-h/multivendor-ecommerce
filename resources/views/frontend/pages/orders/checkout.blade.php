@extends('frontend.layouts.app')

@push('styles')
@endpush

@section('content')
    <main id="content" role="main" class="checkout-page">
        <!-- breadcrumb -->
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a
                                    href="/">Home</a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">
                                Checkout
                            </li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="mb-5">
                <h1 class="text-center">Checkout</h1>
            </div>
            <!-- Accordion -->
            @guest
                <div id="shopCartAccordion" class="accordion rounded mb-5">
                    <!-- Card -->
                    <div class="card border-0">
                        <div id="shopCartHeadingOne" class="alert alert-primary mb-0" role="alert">
                            Returning customer? <a href="#" class="alert-link" data-toggle="collapse"
                                                   data-target="#shopCartOne" aria-expanded="false"
                                                   aria-controls="shopCartOne">Click here to login</a>
                        </div>
                        <div id="shopCartOne" class="collapse border border-top-0" aria-labelledby="shopCartHeadingOne"
                             data-parent="#shopCartAccordion" style="">
                            <!-- Form -->
                            <form method="post" class="js-validate p-5" action="{{ route('login') }}">
                            @csrf
                            <!-- Title -->
                                <div class="mb-5">
                                    <p class="text-gray-90 mb-2">Welcome back! Sign in to your account.</p>
                                    <p class="text-gray-90">If you have shopped with us before, please enter your
                                        details
                                        below. If you are a new customer, please proceed to the Billing & Shipping
                                        section.</p>
                                </div>
                                <!-- End Title -->

                                <div class="row">
                                    <div class="col-lg-6">
                                        <!-- Form Group -->
                                        <div class="js-form-message form-group">
                                            <label class="form-label" for="signinSrEmailExample3">Email address</label>
                                            <input type="email" class="form-control" name="email"
                                                   id="signinSrEmailExample3"
                                                   placeholder="Email address" aria-label="Email address" required
                                                   data-msg="Please enter a valid email address."
                                                   data-error-class="u-has-error"
                                                   data-success-class="u-has-success">
                                        </div>
                                        <!-- End Form Group -->
                                    </div>
                                    <div class="col-lg-6">
                                        <!-- Form Group -->
                                        <div class="js-form-message form-group">
                                            <label class="form-label" for="signinSrPasswordExample2">Password</label>
                                            <input type="password" class="form-control" name="password"
                                                   id="signinSrPasswordExample2"
                                                   placeholder="Please enter your valid password"
                                                   aria-label="Please enter your valid password" required
                                                   data-msg="Your password is invalid. Please try again."
                                                   data-error-class="u-has-error"
                                                   data-success-class="u-has-success">
                                        </div>
                                        <!-- End Form Group -->
                                    </div>
                                </div>

                                <!-- Checkbox -->
                                <div class="js-form-message mb-3">
                                    <div class="custom-control custom-checkbox d-flex align-items-center">
                                        <input type="checkbox" class="custom-control-input" id="rememberCheckbox"
                                               name="rememberCheckbox" required
                                               data-error-class="u-has-error"
                                               data-success-class="u-has-success">
                                        <label class="custom-control-label form-label" for="rememberCheckbox">
                                            Remember me
                                        </label>
                                    </div>
                                </div>
                                <!-- End Checkbox -->

                                <!-- Button -->
                                <div class="mb-1">
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary-dark-w px-5">Login</button>
                                    </div>
                                    <div class="mb-2">
                                        <a class="text-blue" href="#">Lost your password?</a>
                                    </div>
                                </div>
                                <!-- End Button -->
                            </form>
                            <!-- End Form -->
                        </div>
                    </div>
                    <!-- End Card -->
                </div>
        @endguest
        <!-- End Accordion -->

            <!-- Accordion -->
            <div id="shopCartAccordion1" class="accordion rounded mb-6">
                <!-- Card -->
                <div class="card border-0">
                    <div id="shopCartHeadingTwo" class="alert alert-primary mb-0" role="alert">
                        Have a coupon? <a href="#" class="alert-link" data-toggle="collapse" data-target="#shopCartTwo"
                                          aria-expanded="false" aria-controls="shopCartTwo">Click here to enter your
                            code</a>
                    </div>
                    <div id="shopCartTwo" class="collapse border border-top-0" aria-labelledby="shopCartHeadingTwo"
                         data-parent="#shopCartAccordion1" style="">
                        <form class="js-validate p-5" novalidate="novalidate">
                            <p class="w-100 text-gray-90">If you have a coupon code, please apply it below.</p>
                            <div class="input-group input-group-pill max-width-660-xl">
                                <input type="text" class="form-control" name="name" placeholder="Coupon code"
                                       aria-label="Promo code">
                                <div class="input-group-append">
                                    <button type="submit"
                                            class="btn btn-block btn-dark font-weight-normal btn-pill px-4">
                                        <i class="fas fa-tags d-md-none"></i>
                                        <span class="d-none d-md-inline">Apply coupon</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End Card -->
            </div>
            <!-- End Accordion -->


            <form method="post" action="{{ route('cart.order.store') }}" class="js-validate" novalidate="novalidate">
                @csrf
                <div class="row">
                    <div class="col-lg-5 order-lg-2 mb-7 mb-lg-0">
                        <div class="pl-lg-3 ">
                            <div class="bg-gray-1 rounded-lg">
                                <!-- Order Summary -->
                                <div class="p-4 mb-4 checkout-table">
                                    <!-- Title -->
                                    <div class="border-bottom border-color-1 mb-5">
                                        <h3 class="section-title mb-0 pb-2 font-size-25">Your order</h3>
                                    </div>
                                    <!-- End Title -->

                                    <!-- Product Content -->
                                    <table class="table">
                                        <tr>
                                            <th>Subtotal</th>
                                            <td>{{ getCurrencyIcon() }} {{ Cart::instance('cart')->subtotalFloat() }}</td>
                                        </tr>
                                        @if(Session::get('coupon'))
                                            @php
                                                $coupon = \App\Models\Coupon::where('code', Session::get('coupon'))->first();
                                                $coupon_amount = $coupon->apply_type ? $coupon->amount : ($coupon->amount/100)* Cart::instance('cart')->subtotalFloat();
                                            @endphp
                                            <tr>
                                                <th>Coupon</th>
                                                <td>
                                                    <span>{{ getCurrencyIcon() }} {{ $coupon_amount }}</span>
                                                </td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <th>Total</th>
                                            <td>
                                                <strong>{{getCurrencyIcon()}} {{ Cart::instance('cart')->totalFloat() -  @$coupon_amount }}</strong>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- End Product Content -->
                                    <div class="border-top border-width-3 border-color-1 pt-3 mb-3">
                                        <!-- Basics Accordion -->
                                        <div id="basicsAccordion1">
                                            <!-- Card -->
                                            <div class="border-bottom border-color-1 border-dotted-bottom">
                                                <div class="p-3" id="basicsHeadingOne">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                               id="stylishRadio1" name="payment_method" checked>
                                                        <label class="custom-control-label form-label"
                                                               for="stylishRadio1"
                                                               data-toggle="collapse"
                                                               data-target="#basicsCollapseOnee"
                                                               aria-expanded="true"
                                                               aria-controls="basicsCollapseOnee">
                                                            Direct bank transfer
                                                        </label>
                                                    </div>
                                                </div>
                                                <div id="basicsCollapseOnee"
                                                     class="collapse show border-top border-color-1 border-dotted-top bg-dark-lighter"
                                                     aria-labelledby="basicsHeadingOne"
                                                     data-parent="#basicsAccordion1">
                                                    <div class="p-4">
                                                        Make your payment directly into our bank account. Please use
                                                        your Order ID as the payment reference. Your order will not be
                                                        shipped until the funds have cleared in our account.
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Card -->

                                            <!-- Card -->
                                            <div class="border-bottom border-color-1 border-dotted-bottom">
                                                <div class="p-3" id="basicsHeadingTwo">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                               id="secondStylishRadio1" name="payment_method">
                                                        <label class="custom-control-label form-label"
                                                               for="secondStylishRadio1"
                                                               data-toggle="collapse"
                                                               data-target="#basicsCollapseTwo"
                                                               aria-expanded="false"
                                                               aria-controls="basicsCollapseTwo">
                                                            Check payments
                                                        </label>
                                                    </div>
                                                </div>
                                                <div id="basicsCollapseTwo"
                                                     class="collapse border-top border-color-1 border-dotted-top bg-dark-lighter"
                                                     aria-labelledby="basicsHeadingTwo"
                                                     data-parent="#basicsAccordion1">
                                                    <div class="p-4">
                                                        Please send a check to Store Name, Store Street, Store Town,
                                                        Store State / County, Store Postcode.
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Card -->

                                            <!-- Card -->
                                            <div class="border-bottom border-color-1 border-dotted-bottom">
                                                <div class="p-3" id="basicsHeadingThree">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                               id="thirdstylishRadio1" name="payment_method">
                                                        <label class="custom-control-label form-label"
                                                               for="thirdstylishRadio1"
                                                               data-toggle="collapse"
                                                               data-target="#basicsCollapseThree"
                                                               aria-expanded="false"
                                                               aria-controls="basicsCollapseThree">
                                                            Cash on delivery
                                                        </label>
                                                    </div>
                                                </div>
                                                <div id="basicsCollapseThree"
                                                     class="collapse border-top border-color-1 border-dotted-top bg-dark-lighter"
                                                     aria-labelledby="basicsHeadingThree"
                                                     data-parent="#basicsAccordion1">
                                                    <div class="p-4">
                                                        Pay with cash upon delivery.
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Card -->

                                            <!-- Card -->
                                            <div class="border-bottom border-color-1 border-dotted-bottom">
                                                <div class="p-3" id="basicsHeadingFour">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                               id="FourstylishRadio1" name="payment_method">
                                                        <label class="custom-control-label form-label"
                                                               for="FourstylishRadio1"
                                                               data-toggle="collapse"
                                                               data-target="#basicsCollapseFour"
                                                               aria-expanded="false"
                                                               aria-controls="basicsCollapseFour">
                                                            PayPal <a href="#" class="text-blue">What is PayPal?</a>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div id="basicsCollapseFour"
                                                     class="collapse border-top border-color-1 border-dotted-top bg-dark-lighter"
                                                     aria-labelledby="basicsHeadingFour"
                                                     data-parent="#basicsAccordion1">
                                                    <div class="p-4">
                                                        Pay via PayPal; you can pay with your credit card if you don???t
                                                        have a PayPal account.
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Card -->
                                        </div>
                                        <!-- End Basics Accordion -->
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between px-3 mb-5">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="terms_and_condition"
                                                   id="defaultCheck10"
                                                   required
                                                   data-msg="Please agree terms and conditions."
                                                   data-error-class="u-has-error"
                                                   data-success-class="u-has-success">
                                            <label class="form-check-label form-label" for="defaultCheck10">
                                                I have read and agree to the website <a href="#" class="text-blue">terms
                                                    and conditions </a>
                                                <span class="text-danger">*</span>
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit"
                                            class="btn btn-primary-dark-w btn-block btn-pill font-size-20 mb-3 py-3">
                                        Place order
                                    </button>
                                </div>
                                <!-- End Order Summary -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 order-lg-1">
                        <div class="pb-7 mb-7">
                            <!-- Title -->
                            <div class="border-bottom border-color-1 mb-5">
                                <h3 class="section-title mb-0 pb-2 font-size-25">Billing details</h3>
                            </div>
                            <!-- End Title -->

                            <!-- Billing Form -->
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Input -->
                                    <div class="js-form-message mb-6">
                                        <label class="form-label">
                                            First name
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="first_name"
                                               placeholder="Please enter your first name."
                                               aria-label="Jack" required="" data-msg="Please enter your first name."
                                               data-error-class="u-has-error" data-success-class="u-has-success"
                                               autocomplete="off">
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="col-md-6">
                                    <!-- Input -->
                                    <div class="js-form-message mb-6">
                                        <label class="form-label">
                                            Last name
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="last_name"
                                               placeholder="Please enter your last name."
                                               aria-label="Wayley" required="" data-msg="Please enter your last name."
                                               data-error-class="u-has-error" data-success-class="u-has-success">
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="w-100"></div>
                                <div class="col-md-12">
                                    <!-- Input -->
                                    <div class="js-form-message mb-6">
                                        <label class="form-label">
                                            Address
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="address"
                                               placeholder="Please enter a valid address."
                                               aria-label="Please enter a valid address." required=""
                                               data-msg="Please enter a valid address." data-error-class="u-has-error"
                                               data-success-class="u-has-success">
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="col-md-6">
                                    <!-- Input -->
                                    <div class="js-form-message mb-6">
                                        <label class="form-label">
                                            City
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="city"
                                               placeholder="Please enter your city"
                                               aria-label="London" required="" data-msg="Please enter a valid address."
                                               data-error-class="u-has-error" data-success-class="u-has-success"
                                               autocomplete="off">
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="col-md-6">
                                    <!-- Input -->
                                    <div class="js-form-message mb-6">
                                        <label class="form-label">
                                            Postcode/Zip
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="postcode"
                                               placeholder="Please enter a postcode or zip code"
                                               aria-label="Please enter a postcode or zip code" required=""
                                               data-msg="Please enter a postcode or zip code."
                                               data-error-class="u-has-error" data-success-class="u-has-success">
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="w-100"></div>

                                <div class="col-md-12">
                                    <!-- Input -->
                                    <div class="js-form-message mb-6">
                                        <label class="form-label">
                                            State
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input class="form-control" type="text" name="state"
                                               placeholder="Please enter your state">
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="col-md-6">
                                    <!-- Input -->
                                    <div class="js-form-message mb-6">
                                        <label class="form-label">
                                            Email address
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="email" class="form-control" name="email"
                                               placeholder="Please enter a valid email address."
                                               aria-label="Please enter a valid email address."
                                               required="" data-msg="Please enter a valid email address."
                                               data-error-class="u-has-error" data-success-class="u-has-success">
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="col-md-6">
                                    <!-- Input -->
                                    <div class="js-form-message mb-6">
                                        <label class="form-label">
                                            Phone
                                        </label>
                                        <input name="phone" type="text" class="form-control"
                                               placeholder="Please enter a valid phone number."
                                               aria-label="Please enter a valid phone number."
                                               data-msg="Please enter a valid phone number."
                                               data-error-class="u-has-error" data-success-class="u-has-success">
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="w-100"></div>
                            </div>
                            <!-- End Billing Form -->

                            <!-- Accordion -->
                            @guest
                                <div id="shopCartAccordion2" class="accordion rounded mb-6">
                                    <!-- Card -->
                                    <div class="card border-0">
                                        <div id="shopCartHeadingThree"
                                             class="custom-control custom-checkbox d-flex align-items-center">
                                            <input type="checkbox" class="custom-control-input" id="createAnaccount"
                                                   name="is_create_account">
                                            <label class="custom-control-label form-label" for="createAnaccount"
                                                   data-toggle="collapse" data-target="#shopCartThree"
                                                   aria-expanded="false"
                                                   aria-controls="shopCartThree">
                                                Create an account?
                                            </label>
                                        </div>
                                        <div id="shopCartThree" class="collapse" aria-labelledby="shopCartHeadingThree"
                                             data-parent="#shopCartAccordion2" style="">
                                            <!-- Form Group -->
                                            <div class="js-form-message form-group py-5">
                                                <label class="form-label" for="signinSrPasswordExample1">
                                                    Create account password
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input type="password" class="form-control" name="password"
                                                       id="signinSrPasswordExample1"
                                                       placeholder="Please enter your password"
                                                       aria-label="Please enter your password" required
                                                       data-msg="Enter password."
                                                       data-error-class="u-has-error"
                                                       data-success-class="u-has-success">
                                            </div>
                                            <!-- End Form Group -->
                                        </div>
                                    </div>
                                    <!-- End Card -->
                                </div>
                            @endguest
                        <!-- End Accordion -->
                            <!-- Title -->
                            <div class="border-bottom border-color-1 mb-5">
                                <h3 class="section-title mb-0 pb-2 font-size-25">Shipping Details details</h3>
                            </div>
                            <!-- End Title -->
                            <!-- Accordion -->
                            <div id="shopCartAccordion3" class="accordion rounded mb-5">
                                <!-- Card -->
                                <div class="card border-0">
                                    <div id="shopCartHeadingFour"
                                         class="custom-control custom-checkbox d-flex align-items-center">
                                        <input type="checkbox" class="custom-control-input" id="shippingdiffrentAddress"
                                               name="is_shipping_different_address">
                                        <label class="custom-control-label form-label" for="shippingdiffrentAddress"
                                               data-toggle="collapse" data-target="#shopCartfour" aria-expanded="false"
                                               aria-controls="shopCartfour">
                                            Ship to a different address?
                                        </label>
                                    </div>
                                    <div id="shopCartfour" class="collapse mt-5" aria-labelledby="shopCartHeadingFour"
                                         data-parent="#shopCartAccordion3" style="">
                                        <!-- Shipping Form -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Input -->
                                                <div class="js-form-message mb-6">
                                                    <label class="form-label">
                                                        First name
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" name="ship_to_first_name"
                                                           placeholder="Please enter your first name."
                                                           aria-label="Please enter your first name." required=""
                                                           data-msg="Please enter your first name."
                                                           data-error-class="u-has-error"
                                                           data-success-class="u-has-success" autocomplete="off">
                                                </div>
                                                <!-- End Input -->
                                            </div>

                                            <div class="col-md-6">
                                                <!-- Input -->
                                                <div class="js-form-message mb-6">
                                                    <label class="form-label">
                                                        Last name
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" name="ship_to_last_name"
                                                           placeholder="Please enter your last name."
                                                           aria-label="Please enter your last name." required=""
                                                           data-msg="Please enter your last name."
                                                           data-error-class="u-has-error"
                                                           data-success-class="u-has-success">
                                                </div>
                                                <!-- End Input -->
                                            </div>
                                            <div class="w-100"></div>

                                            <div class="col-md-12">
                                                <!-- Input -->
                                                <div class="js-form-message mb-6">
                                                    <label class="form-label">
                                                        Address
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" name="ship_to_address"
                                                           placeholder="Please enter a valid address."
                                                           aria-label="Please enter a valid address."
                                                           required="" data-msg="Please enter a valid address."
                                                           data-error-class="u-has-error"
                                                           data-success-class="u-has-success">
                                                </div>
                                                <!-- End Input -->
                                            </div>

                                            <div class="col-md-6">
                                                <!-- Input -->
                                                <div class="js-form-message mb-6">
                                                    <label class="form-label">
                                                        City
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" name="ship_to_city"
                                                           placeholder="Please enter your valid city"
                                                           aria-label="Please enter your valid city" required=""
                                                           data-msg="Please enter your valid city"
                                                           data-error-class="u-has-error"
                                                           data-success-class="u-has-success" autocomplete="off">
                                                </div>
                                                <!-- End Input -->
                                            </div>

                                            <div class="col-md-6">
                                                <!-- Input -->
                                                <div class="js-form-message mb-6">
                                                    <label class="form-label">
                                                        Postcode/Zip
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" name="ship_to_postcode"
                                                           placeholder="Please enter a postcode or zip code."
                                                           aria-label="Please enter a postcode or zip code." required=""
                                                           data-msg="Please enter a postcode or zip code."
                                                           data-error-class="u-has-error"
                                                           data-success-class="u-has-success">
                                                </div>
                                                <!-- End Input -->
                                            </div>

                                            <div class="w-100"></div>

                                            <div class="col-md-12">
                                                <!-- Input -->
                                                <div class="js-form-message mb-6">
                                                    <label class="form-label">
                                                        State
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text" name="ship_to_state"
                                                           placeholder="Please enter your state." class="form-control">
                                                </div>
                                                <!-- End Input -->
                                            </div>

                                            <div class="col-md-6">
                                                <!-- Input -->
                                                <div class="js-form-message mb-6">
                                                    <label class="form-label">
                                                        Email address
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="email" class="form-control" name="ship_to_email"
                                                           placeholder="Please enter a valid email address."
                                                           aria-label="Please enter a valid email address." required=""
                                                           data-msg="Please enter a valid email address."
                                                           data-error-class="u-has-error"
                                                           data-success-class="u-has-success">
                                                </div>
                                                <!-- End Input -->
                                            </div>

                                            <div class="col-md-6">
                                                <!-- Input -->
                                                <div class="js-form-message mb-6">
                                                    <label class="form-label">
                                                        Phone
                                                    </label>
                                                    <input name="ship_to_phone" type="text" class="form-control"
                                                           placeholder="Please enter a valid phone number."
                                                           aria-label="Please enter a valid phone number."
                                                           data-msg="Please enter a valid phone number."
                                                           data-error-class="u-has-error"
                                                           data-success-class="u-has-success">
                                                </div>
                                                <!-- End Input -->
                                            </div>

                                            <div class="w-100"></div>
                                        </div>
                                        <!-- End Shipping Form -->
                                    </div>
                                </div>
                                <!-- End Card -->
                            </div>
                            <!-- End Accordion -->
                            <!-- Input -->
                            <div class="js-form-message mb-6">
                                <label class="form-label">
                                    Order notes (optional)
                                </label>

                                <div class="input-group">
                                    <textarea class="form-control p-5" rows="4" name="order_note"
                                              placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>
                            </div>
                            <!-- End Input -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection

@push('scripts')
@endpush
