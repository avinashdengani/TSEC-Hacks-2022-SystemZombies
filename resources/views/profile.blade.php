@extends('layouts.app')

@section('title')
    CodeMate | Profile
@endsection

@section('styles')
    <style>
        body {
            background: #eee;
        }

        .border-bottom {
            border-bottom: 2px solid #eee
        }

        .font-weight-300{
            font-weight: 300;
        }

        .font-weight-500{
            font-weight: 500;
        }

        .font-weight-600{
            font-weight: 600;
        }
    </style>
@endsection

@section('content')
        {{-- Profile details --}}
        <div class="container mt-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-9">
                    <div class="card p-3 py-4">
                        <div class="text-center"> <img src="{{ asset('images/profile.png'); }}" width="100"
                                class="rounded-circle"> </div>
                        <div class="text-center mt-3">
                            <h5 class="mt-2 mb-0">Tushar Budhwani</h5> <span>Front-end Engineer</span>
                            <div class="px-4 mt-1">
                                <p class="fonts">Here we are putting headlines like linkedIn. eg.
                                    CEO at META.
                                </p>
                                <div class="container">
                                    <span class="badge bg-secondary">Web Development</span>
                                    <span class="badge bg-secondary">HTML</span>
                                    <span class="badge bg-secondary">CSS</span>
                                    <span class="badge bg-secondary">PHP</span>
                                    <span class="badge bg-secondary">Laravel</span>
                                    <span class="badge bg-secondary">Bootstrap</span>
                                </div>
                            </div>

                            <div class="p-3">
                                <button class="btn btn-outline-primary px-4">Message</button>
                                <button class="btn btn-primary px-4 ms-3">Contact</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Projects --}}
        <div class="container mt-5">
            <div class="row d-flex justify-content-center ">
                <div class="col-md-9">
                    <div class="card p-3">
                        <h2>Projects</h2>
                        <div class="list border-bottom p-3">
                            <div class="d-flex flex-column ml-3 font-weight-600"><h4>Foodie</h4></div>
                        </div>
                        <div class="list border-bottom p-3">
                            <div class="d-flex flex-column ml-3 font-weight-600"> <h4>Foodie</h4></div>
                        </div>
                        <div class="list p-3 border-bottom">
                            <div class="d-flex flex-column ml-3 font-weight-600"> <h4>Offensive Web Application Security Framework</h4></div>
                        </div>
                        <div class="list border-bottom p-3">
                            <div class="d-flex flex-column ml-3 font-weight-600"><h4>Foodie</h4></div>
                        </div>
                        <div class="list border-bottom p-3">
                            <div class="d-flex flex-column ml-3 font-weight-600"> <h4>Foodie</h4></div>
                        </div>
                        <div class="list p-3 border-bottom">
                            <div class="d-flex flex-column ml-3 font-weight-600"> <h4>Offensive Web Application Security Framework</h4></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
