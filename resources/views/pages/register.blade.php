@extends('layouts.shell')

@section('title')
    <title>User Login & Registration - Legal Indaba</title>
    <meta name="description" content="Legal Indaba, Zambian Legal Magazine. User Login & Registration" />
@endsection

@section('content')
    <section class="block inner-head">
        <div class="container">
            <ul class="breadcrums">
                <li><a href="/" title="">HOME</a></li>
                <li><a>User Login & Registration</a></li>
            </ul>
            <h1>User Login & Registration</h1>

        </div>
    </section>

    <section class="block gray">
        <div class="container">
            <div class="row">
                <div class="col-md-6 column">
                    <div class="contact-form">
                        <h3><i class="fa fa-users"></i> Log In Here</h3>

                        <form role="form" method="POST" action="/login">
                            {{ csrf_field() }}

                            <label><i class="fa fa-user"></i><input id="username" name = "username" type="text" placeholder="Enter your Username" value="{{ old('username') }}"></label>

                            @if ($errors->has('username'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                            @endif



                            <label><i class="fa fa-lock"></i><input id= "password" name = "password" type="password" placeholder="Enter your Password"></label>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif


                            <p><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me</p>

                            <p><br>Check the box below to indicate that you accept the LEGAL INDABA <a href="/terms-and-conditions/">Terms & Conditions</a><br></p>

                            <p><input style="" type="checkbox"  id="tick" onchange="document.getElementById('login').disabled = !this.checked;"> I accept</p>

                            <input disabled name="login" id="login" type="submit" value="Log In">
                        </form>

                    </div><!-- Contact Form -->
                </div>

                <div class="col-md-6 column">
                    <div class="contact-form">
                        <h3><i class="fa fa-users"></i>Subscription Request</h3>

                        <form method="POST" action="/register/req">
                            {{ csrf_field() }}
                            <label><i class="fa fa-user"></i><input type="text" name="first_name" placeholder="Enter your First Name" required></label>
                            <label><i class="fa fa-user"></i><input type="text" name="last_name" placeholder="Enter your Last Name" required></label>
                            <label><i class="fa fa-envelope"></i><input type="email" name="email" placeholder="Enter your Email"required></label>
                            <p>Date of birth</p>
                            <label><input type="date" value="<?php echo date('Y-m-d'); ?>" name="dob" placeholder="Date of birth" required></label>
                            <label><i class="fa fa-phone"></i><input type="text" name="phone_number" placeholder="Enter your Mobile Phone Number" required></label>


                            <p class="help-block">Select what applies to you</p>
                            <label><i class="fa fa-gavel"></i>
                                <select class="form-control input-lg m-b-10" name="what_are_you">
                                    <option value="Legal Practitioner">Legal Practitioner</option>
                                    <option value="Lawyer">Lawyer</option>
                                    <option value="Law Student">Law Student</option>
                                </select>
                            </label>
                            <label><i class="fa fa-university"></i><input type="text" name="firm" placeholder="Law firm/Institution affiliated to" required></label>
                            <label><i class="fa fa-gavel"></i><input type="text" name="position_held" placeholder="Position held if any" required></label>

                            <p>Date of admission to the bar/institution.</p>
                            <label><input type="date" value="<?php echo date('Y-m-d'); ?>" name="admission_date" placeholder="Date of admission to the bar/institution" required></label>

                            <p class="help-block">Leave Empty if not applicable.</p>
                            <label><i class="fa fa-gavel"></i><input type="text" name="mem_number" placeholder="Membership/student number"></label>

                            <p>Fill in the form and we will contact you with further details.</p>

                            <input onclick="return confirm('Are you sure you all the information entered is legitimate?')" type="submit" name="send" id="send" value="Send Request">

                        </form>

                    </div><!-- Contact Form -->
                </div>
            </div>
        </div>
        </div>

        </div>
        </div>
    </section>
@endsection