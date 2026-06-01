@extends('Layout.master')
    @section('content')
    <div class="container-fluid px-4 mt-5">
        {{-- <h1 class="mt-4">Dashboard</h1> --}}
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card text-white mb-4 bg-card">
                    <div class="card-body">Men Official <span class="ml-3 text-warning fw-bolder">{{$men_official_count}}</span></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{route('showMenOfficial')}}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card text-white mb-4 bg-card">
                    <div class="card-body">Women Official <span class="ml-3 text-warning fw-bolder">{{$women_official_count}}</span></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{route('showWomenOfficial')}}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card text-white mb-4 bg-card">
                    <div class="card-body">Children Official <span class="ml-3 text-warning fw-bolder">{{$children_official_count}}</span></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{route('showChildrenOfficial')}}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card text-white mb-4 bg-card">
                    <div class="card-body">Men Lifestyle <span class="ml-3 text-warning fw-bolder">{{$men_lifestyle_count}}</span></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{route('showMenLifestyle')}}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card text-white mb-4 bg-card">
                    <div class="card-body">Women Lifestyle <span class="ml-3 text-warning fw-bolder">{{$women_lifestyle_count}}</span></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{route('showWomenLifestyle')}}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card text-white mb-4 bg-card">
                    <div class="card-body">Children Lifestyle <span class="ml-3 text-warning fw-bolder">{{$children_lifestyle_count}}</span></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{route('showChildLifestyle')}}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card text-white mb-4 bg-card">
                    <div class="card-body">Men Shoes <span class="ml-3 text-warning fw-bolder">{{$men_shoes_count}}</span></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{route('showMenShoes')}}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card text-white mb-4 bg-card">
                    <div class="card-body">Women Shoes <span class="ml-3 text-warning fw-bolder">{{$women_shoes_count}}</span></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{route('showWomenShoes')}}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card text-white mb-4 bg-card">
                    <div class="card-body">Children Shoes <span class="ml-3 text-warning fw-bolder">{{$children_shoes_count}}</span></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{route('showChildrenShoes')}}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
