@extends('layout.main')
@section('content')
    <section class="content home">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Selamat datang,{{ auth()->user()->name }}
                </h2>
            </div>
        </div>
    </section>
@endsection
