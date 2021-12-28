@extends('layouts.frontend.master')

@section('title', 'CMS')

@section('css')
@endsection
@section('style')
@endsection

@section('content')

    <!--=================================
cms -->
    <section class="space-ptb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {!! $cms->description !!}
                </div>
            </div>
        </div>
    </section>
    <!--=================================
    cms -->

@endsection

@section('script-js-last')
@endsection

@section('script')
@endsection

