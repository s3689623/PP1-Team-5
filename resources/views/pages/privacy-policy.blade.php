{{-- Extends layout --}}
@extends('layout.default')

@section('styles')
    <style>
        .car {
            height: 100%;
            width: 100%;
        }
    </style>
@endsection

{{-- Content --}}
@section('content')
    @php
        $content = [
            'PRIVACY POLICY' => 'Shareber is a part of Sharber company (hereinafter referred to as We). We respect to the privacy rights of our user. This privacy policy describes personal information we collect and how we use it. This privacy policy includes collection and the use of information when you use Shareber website and/or application, when you join Shareber and use our services. This privacy policy does not apply to other websites or Internet or mobile application accessed through our site. By submitting your personal information to us and accepting privacy policy, you agree to the use of Shareber and disclosure of your personal information as contained in this privacy notice. This privacy notice is incorporated into, and part of, Contract of Terms & Conditions of Shareber Member usage.',
            'INFORMATION THAT WE COLLECT, ACCEPT AND MANAGE' => 'Your personal information that we collect includes but is not limited to the name, email address, postal address, phone number, your image or other document identification, and order history. We also collect non-personal information including but not limited to IP address, browser type, operating system, browser language and your service provider, data related to other general Internet usage, GPS data and other tracking data.
We collect your personal information for the purpose of processing your application, enabling you to order and use our vehicle, payment and to improve our products, marketing promo strategy and services.
',
            'ACCESS & CORRECTION OF PERSONAL INFORMATION' => 'If you have made an account and registered as our member, you may access, correct or delete your information. You are responsible for maintaining confidentiality and ensuring that Login access and password are only used by you.',
            'SECURITY' => '
All information collected is protected by reasonable means and security procedures to prevent unauthorized access to and use of data. Our partners and third-party service providers have committed to managing information in accordance with our terms of equality and privacy in accordance with the provisions of laws and regulations of the Republic of Indonesia.
',
            'COOKIES' => 'Shareber may use cookies to store information about member preference and setting on a computer, mobile phone or other user device to make site usage easier for user or for third party needs in advertising or data analysis.',
            'LINK TO OTHER WEBSITE' => 'Our website may provide links to other website or other application. If you submit personal information to such sites, your information is governed by their privacy policy and is not entirely our responsibility.',
            'CHANGES OF PRIVACY POLICY' => 'We may update this privacy policy at any time and you are advised to check this page from time to time. By continuing to use our website and services, you confirm your consent to continue the use of the Service for any updates to this Privacy Policy.',
            'CONTACT US' => 'It is important that you take the time to read, understand and accept the terms of this privacy policy. If you have any questions about handling our personal information, you can write us e-mail at info@Shareber.co.id.',
        ];
    @endphp
    <div class="row">
        @foreach($content as $topic => $value)
        <div class="col-12">
            <div class="card card-custom card-stretch gutter-b">
                {{-- Header --}}
                <div class="card-header">
                    <h1>{{$topic}}</h1>
                </div>

                {{-- Body --}}
                <div class="card-body pt-0">
                    {{-- Item --}}
                    <p>{{$value}}</p>
                </div>
            </div>

        </div>
        @endforeach
    </div>
@endsection

{{-- Scripts Section --}}
@section('scripts')
@endsection
