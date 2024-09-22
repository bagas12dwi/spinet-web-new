@extends('admin.layouts.auth')

@section('content')

    <body class="app app-signup p-0">
        <div class="row g-0 app-auth-wrapper">
            <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
                <div class="d-flex flex-column align-content-end">
                    <div class="app-auth-body mx-auto">
                        <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon me-2"
                                    src="{{ URL::asset('admin/assets/images/app-logo.svg') }}" alt="logo"></a></div>
                        <h2 class="auth-heading text-center mb-4">Sign up to Dashboard</h2>

                        <div class="auth-form-container text-start mx-auto">
                            <form class="auth-form auth-signup-form">
                                <div class="email mb-3">
                                    <label class="sr-only" for="signup-email">Your Name</label>
                                    <input id="signup-name" name="signup-name" type="text"
                                        class="form-control signup-name" placeholder="Full name" required="required">
                                </div>
                                <div class="email mb-3">
                                    <label class="sr-only" for="signup-email">Your Email</label>
                                    <input id="signup-email" name="signup-email" type="email"
                                        class="form-control signup-email" placeholder="Email" required="required">
                                </div>
                                <div class="password mb-3">
                                    <label class="sr-only" for="signup-password">Password</label>
                                    <input id="signup-password" name="signup-password" type="password"
                                        class="form-control signup-password" placeholder="Create a password"
                                        required="required">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Sign
                                        Up</button>
                                </div>
                            </form><!--//auth-form-->

                            <div class="auth-option text-center pt-5">Already have an account? <a class="text-link"
                                    href="{{ route('login') }}">Log in</a></div>
                        </div><!--//auth-form-container-->



                    </div><!--//auth-body-->

                    <footer class="app-auth-footer">
                        <div class="container text-center py-3">
                            <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
                            <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart"
                                    style="color: #fb866a;"></i> by <a class="app-link"
                                    href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for
                                developers</small>

                        </div>
                    </footer><!--//app-auth-footer-->
                </div><!--//flex-column-->
            </div><!--//auth-main-col-->
            <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
                <div class="auth-background-holder">
                </div>
                <div class="auth-background-mask"></div>
            </div><!--//auth-background-col-->

        </div><!--//row-->


    </body>
@endsection
