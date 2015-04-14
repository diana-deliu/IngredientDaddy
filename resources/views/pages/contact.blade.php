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
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @include('_partials.flash')
                        <form role="form" method="POST" action="{{ url('/contact') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="f-row">
                                <input type="text" placeholder="Name" name="name"/>
                            </div>
                            <div class="f-row">
                                <input type="email" placeholder="E-mail" name="email"/>
                            </div>
                            <div class="f-row">
                                <input type="number" placeholder="Phone number" name="phone"/>
                            </div>
                            <div class="f-row">
                                <textarea placeholder="Message" name="message"></textarea>
                            </div>
                            <div class="f-row bwrap">
                                <input type="submit" value="Send" class="button"/>
                            </div>
                        </form>
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