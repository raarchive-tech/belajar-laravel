@extends('layouts.app')

@section('title', 'Data Member')
@section('content')

    <h3>Data Member</h3>
        
    <ul>
        @foreach($members as $member)
            <li>{{ $member }}</li>
        @endforeach
    </ul>
    
@endsection