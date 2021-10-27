@extends('app')

@section('title',"Home | ". env('APP_NAME'))


@section('content')
<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg">
        <h1>Hello World !</h1>
        <p>Today is {{ date('D M j') }} </p>
        <p>It's {{ date('G:i') }} </p>
    </div>
</div>
@endsection