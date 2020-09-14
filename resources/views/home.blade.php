@extends('layouts.admin')
@section('content')
<div class="max-w w-full bg-white shadow-md rounded-md overflow-hidden border">
    <div class="flex justify-between items-center px-5 py-3 text-gray-700 border-b">
        <h3 class="text-sm">Dashboard</h3>
    </div>

    <div class="px-5 py-6 bg-gray-200 text-gray-700 border-b">
        @if(session('status'))
            <div class="flex max-w w-full bg-green-300 shadow-md rounded-lg overflow-hidden mb-4 py-4 px-6 text-green-700 font-medium">
                {{ session('status') }}
            </div>
        @endif

        You are logged in!
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection