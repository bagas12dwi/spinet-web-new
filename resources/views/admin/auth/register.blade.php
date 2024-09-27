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
                            <form class="auth-form auth-signup-form" method="POST" action="{{ route('postRegister') }}">
                                @csrf
                                <div class="email mb-3">
                                    <label class="sr-only" for="signup-email">Your Name</label>
                                    <input id="signup-name" name="name" type="text" class="form-control signup-name"
                                        placeholder="Full name" required="required">
                                </div>
                                <div class="email mb-3">
                                    <label class="sr-only" for="signup-email">Username</label>
                                    <input id="signup-name" name="username" type="text" class="form-control signup-name"
                                        placeholder="Username" required="required">
                                </div>
                                <div class="email mb-3">
                                    <label class="sr-only" for="signup-email">Your Email</label>
                                    <input id="signup-email" name="email" type="email" class="form-control signup-email"
                                        placeholder="Email" required="required">
                                </div>
                                <div class="password mb-3">
                                    <label class="sr-only" for="signup-password">Password</label>
                                    <input id="signup-password" name="password" type="password"
                                        class="form-control signup-password" placeholder="Create a password"
                                        required="required">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Sign
                                        Up</button>
                                </div>
                            </form><!--//auth-form-->

                            <div class="auth-option text-center pt-2">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <hr>
                                    </div>
                                    <span class="px-2">Or Register With</span>
                                    <div class="flex-grow-1">
                                        <hr>
                                    </div>
                                </div>
                            </div>
                            <a href="/auth/google" class="btn app-btn-secondary w-100 theme-btn mx-auto mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-google" viewBox="0 0 16 16">
                                    <path
                                        d="M15.545 6.558a9.4 9.4 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.7 7.7 0 0 1 5.352 2.082l-2.284 2.284A4.35 4.35 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.8 4.8 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.7 3.7 0 0 0 1.599-2.431H8v-3.08z" />
                                </svg>
                                Google
                            </a>

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
