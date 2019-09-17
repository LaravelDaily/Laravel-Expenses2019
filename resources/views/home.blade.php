@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="{{ $chart1->options['column_class'] }}">
                    <h3>{!! $chart1->options['chart_title'] !!}</h3>
                    {!! $chart1->renderHtml() !!}
                </div>
                <div class="{{ $chart2->options['column_class'] }}">
                    <h3>{!! $chart2->options['chart_title'] !!}</h3>
                    {!! $chart2->renderHtml() !!}
                </div>
                <div class="{{ $settings3['column_class'] }}">
                    <div class="card text-white bg-primary">
                        <div class="card-body pb-0">
                            <div class="text-value">{{ number_format($settings3['total_number']) }}</div>
                            <div>{{ $settings3['chart_title'] }}</div>
                            <br />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>{!! $chart1->renderJs() !!}{!! $chart2->renderJs() !!}
@endsection