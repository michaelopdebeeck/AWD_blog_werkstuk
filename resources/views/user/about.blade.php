@extends('user.layouts.index')

@section('bg-img', asset('public/user/img/home-bg.jpg'))
@section('title', "Contacteer mij")
@section('sub-title', '')

@section('main-content')
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <p>Wilt u in contact komen met mij? Vul dan onderstaand formulier in en ik contacteer je zo snel mogelijk terug!</p>
                <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
                <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
                <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
                <form name="sentMessage" id="contactForm" novalidate>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Naam</label>
                            <input type="text" class="form-control" placeholder="Naam" id="name" required data-validation-required-message="Please enter your name.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>E-mailadres</label>
                            <input type="email" class="form-control" placeholder="E-mailadres" id="email" required data-validation-required-message="Please enter your email address.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Gsmnummer</label>
                            <input type="tel" class="form-control" placeholder="Gsmnummer" id="phone" required data-validation-required-message="Please enter your phone number.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Bericht</label>
                            <textarea rows="5" class="form-control" placeholder="Bericht" id="message" required data-validation-required-message="Please enter a message."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" id="sendMessageButton">Verzenden</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <hr>
@endsection
@section('footerSection')
    <script src="{{ asset('public/user/js/jqBootstrapValidation.js') }}"></script>
    <script src="{{ asset('public/user/js/contact_me.js') }}"></script>
@endsection