
<x-layout>
    <x-nav headerImage="img/camions-contact.jpg" headerPhrase="Page en construction"/>
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="imgEnConstruction">
        <img src="{{ asset('img/placeHolder.png') }}" alt="">
    </div>
</x-layout>
