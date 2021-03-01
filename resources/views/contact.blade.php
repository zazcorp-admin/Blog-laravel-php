@extends('layouts.main')


@section('content')
<div class="container">
    <h1>This is contacts</h1> 
    @if (count($people))
        <ul>
            @foreach ($people as $person)
                <li>
                    {{$person}}
                </li>
            @endforeach    
        </ul>        
    @endif
</div>       
@endsection

{{-- @section('footer')
    <script>
        alert("How are you?")
    </script>
@endsection --}}