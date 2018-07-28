<html>
<head>
    <title>Mail Verification</title>
</head>
<body>
<h3 style="color: red">
    Error in Mail Verification
</h3>
<span style="color: red">

    @if(isset($errorMessage))
        {{$errorMessage}}

        {{--@foreach($errorMessage as $value)--}}
            {{--{{$errorMessage}}--}}
        {{--@endforeach--}}

    @endif
</span>


</body>
</html>