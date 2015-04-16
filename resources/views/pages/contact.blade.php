@extends('layouts.master')

@section('content')
    <!--main-->
    <main class="main" role="main">
        <!--wrap-->
        <div class="wrap clearfix">
            <!--row-->
            <div class="row">
                <!--content-->
                <section class="content center full-width wow fadeInUp">
                    <div class="modal container">
                        <h3>Contact us</h3>
                        @include('_partials.flash_error')
                        @include('_partials.flash')
                        {!! Form::model($user) !!}
                            <div class="f-row">
                                {!! Form::text('name', null, ['placeholder' => 'Name']) !!}
                            </div>
                            <div class="f-row">
                                {!! Form::email('email', null, ['placeholder' => 'E-mail']) !!}
                            </div>
                            <div class="f-row">
                                {!! Form::input('number', 'phone', null, ['placeholder' => 'Phone number']) !!}
                            </div>
                            <div class="f-row">
                                {!! Form::textarea('message', null, ['placeholder' => 'Message']) !!}
                            </div>
                            <div class="f-row bwrap">
                                {!! Form::submit('Send', ['class' => 'button']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </section>
                <!--//content-->
            </div>
            <!--//row-->
        </div>
        <!--//wrap-->
    </main>
    <!--//main-->
@endsection