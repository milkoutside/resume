@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row home-container">
            <div class="col-12 col-lg-4">
                <div class="photo-container mt-3">
                    <span class="photo-frame"></span>
                    <span class="photo"></span>
                </div>
            </div>
            <div class="col mt-3 text-white fs-2 resume-main-info text-start">
                <p class="fs-1 text-center">@lang('main.name')</p>
                <p>@lang('main.my_age') @lang('main.age')</p>
                <p>@lang('main.city') @lang('main.city_value')</p>
                <p>@lang('main.search_job')</p>
            </div>
        </div>
        <div class="mt-3 text-white fs-2 resume d-inline-block px-3">
            <span class="fs-1 text-start">@lang('main.technical_skills')</span>
            <span class="text-start">
            @lang('main.technical_skills_value')
        </span>

            <p class="fs-1 mt-2">@lang('main.education') <span class="fs-2">@lang('main.education_value')</span></p>
            <p class="fs-1">@lang('main.about')<span class="fs-2"> @lang('main.about_value')</span></p>

                <p class="fs-1 text-center">@lang('main.work')</p>
                <p>@lang('main.kitgroup')</p>
                <p>@lang('main.expert_sol')</p>
                <p class="fs-1 text-center">@lang('main.contacts')</p>
                <p>@lang('main.phone') +380997953783</p>
                <p>@lang('main.email') alexanderyevenok@gmail.com
                </p>
        </div>
    </div>
@endsection
