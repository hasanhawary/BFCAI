@if ($errors->any())
    <div class="alert alert-danger" style=" line-height: .8; padding-top:20px; font-size:27px">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif