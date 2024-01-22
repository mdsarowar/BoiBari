@extends("front/layout.master")
@section('title',__('Login'))
@section('body')
<div class="body-content">
    <div class="container-fluid">
        <div class="sign-in-page">
            <div class="row">


                <div id="aniBox" class="col-md-6 col-sm-12 sign-in">
                    <h4 class="">{{__('Sign in')}}</h4>
                    <p class="">{{__('Login Welcome')}}</p>
                    <div class="social-sign-in outer-top-xs">

                        <div class="row">

                            @if($configs->fb_login_enable=='1')
                            <div class="col-md-4">
                                <a href="{{url('login/facebook')}}" title="{{__('SignInwithFacebook')}}"
                                    class="font-size-12 facebook-sign-in"><i class="fa fa-facebook"></i>Sign in with
                                    {{__("Facebook")}}    
                                </a>
                            </div>
                            @endif

                            @if($configs->google_login_enable=='1')
                            <div class="col-md-4">
                                <a title="{{__('SignInwithGoogle')}}" href="{{url('login/google')}}"
                                    class="google-sign-in"><i class="fa fa-google"></i>
                                    {{__('SignInwithGoogle')}}</a>
                            </div>
                            @endif

                            @if($configs->twitter_enable == 1)
                            <div class="col-md-4">
                                <a title="{{__('SignInwithTwitter')}}" href="{{url('login/twitter')}}"
                                    class="twitter-sign-in"><i
                                        class="fa fa-twitter"></i>{{ __('Sign In With Twitter') }}</a>
                            </div>
                            @endif


                        </div>

                        <div class="row margin-top-15">

                            @if(env('ENABLE_GITLAB') == 1 )
                                <div class="col-md-4">
                                    <a title="{{__('SignInwithGitLab')}}" href="{{url('login/gitlab')}}"
                                        class="gitlab"><i
                                            class="fa fa-gitlab"></i>{{__('Sign In with GitLab')}}</a>
                                </div>
                            @endif


                            @if($configs->linkedin_enable=='1')
                                <div class="col-md-4">
                                    <a title="{{__('SignInWithLinkedin')}}" href="{{url('login/linkedin')}}"
                                        class="linkedin-sign-in"><i class="fa fa-linkedin-square" aria-hidden="true"></i>
                                        {{ __('Sign In With Linkedin') }}</a>
                                </div>
                            @endif

                            @if($configs->amazon_enable=='1')
                                <div class="col-md-4">
                                    <a title="{{__('SignInWithAmazon')}}" href="{{url('login/amazon')}}"
                                        class="amazon-sign-in"><i class="fa fa-amazon" aria-hidden="true"></i>
                                        {{ __('Sign In With Amazon') }}</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    @if(Module::has('MimSms') && Module::find('MimSms')->isEnabled() && env('MIM_SMS_OTP_ENABLE') == 1 && env('DEFAULT_SMS_CHANNEL') == 'mim')
                        @include('mimsms::auth.login')
                    @elseif(Module::has('Exabytes') && Module::find('Exabytes')->isEnabled() && env('DEFAULT_SMS_CHANNEL') == 'exabytes')
                        @include('exabytes::auth.login')
                    @else
                        
                        <form novalidate id="loginform" method="POST" class="form register-form outer-top-xs" role="form"
                            action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">{{ __('Email') }}
                                    <span>*</span></label>
                                <input required type="email" name="email"
                                    class="form-control unicase-form-control text-input {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    id="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">{{ __('Password') }}
                                    <span>*</span></label>
                                <input required type="password" name="password"
                                    class="{{ $errors->has('password') ? ' is-invalid' : '' }} form-control unicase-form-control text-input"
                                    id="password">

                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="radio outer-xs form-check">
                                <label>
                                    <input type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>{{__('Remember me')}}
                                </label>
                                <a href="{{ route('password.request') }}"
                                    class="forgot-password pull-right">{{__('Forgot Your Password')}}</a>
                                <a href="{{ route('register') }}"
                                    class="forgot-password pull-right">{{__('New User Register Now')}}&nbsp;|&nbsp;&nbsp;</a>

                            </div>
                            <button type="submit" class="signin btn-upper btn btn-primary checkout-page-button">{{__('Login')}}</button>
                        </form>
                    @endif

                </div>
                <!-- Sign-in -->

                <div class="col-md-6">
                    <canvas id="canvas" class="float-right canvaslogin"></canvas>
                </div>

            </div><!-- /.row -->
        </div>
    </div><!-- /.container -->
</div><!-- /.body-content -->
@endsection
@section('head-script')
<script src="{{ url('admin_new/plugins/flare/Flare.min.js') }}"></script>
<script src="{{ url('admin_new/plugins/flare/gl-matrix.js') }}"></script>
<script src="{{ url('admin_new/plugins/flare/canvaskit.js') }}"></script>
<script src="{{url('front/vendor/js/Event.js')}}"></script>
<script src="{{ url('front/vendor/js/loginanimation.js') }}"></script>
<script>
    var baseUrl = @json(url('/'));
</script>
<script src="{{ url('js/login.js') }}"></script>
@endsection
@section('script')
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('form');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    } else {
                        $('.signin').html('<i class="fa fa-circle-o-notch fa-spin fa-fw"></i> {{ __("Login") }}');
                    }
                    form.classList.add('was-validated');

                }, false);

            });
        }, false);
    })();
</script>
@stack('module-script')
@endsection