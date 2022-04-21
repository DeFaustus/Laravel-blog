@extends('dashboard.layout')
@section('dashboard')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    {{ 'Sdf' }}
@endsection
