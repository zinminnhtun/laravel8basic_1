<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h3>Update Info</h3>
<form action="{{ route('update',$contact->id) }}" method="post">
    @csrf
    @method("put")
    <input type="text" name="name" placeholder="Contact" value="{{ old('name',$contact->name) }}">
    <input type="number" name="phone" placeholder="Phone Number" value="{{ old('phone',$contact->phone) }}">
    <button type="summit">Update</button>
    @if(session('create'))
        <small class=""> {{ session('create') }}</small>
    @elseif(session('contactDelete'))
        <small class=""> {{ session('contactDelete') }}</small>
    @endif

</form>

<ul>
    @foreach(\App\Models\Contact::all() as $contact)
        <li>[
            <form action="{{ route("destroy",$contact->id) }}" method="post" style="display: inline">
                @csrf
                @method('delete')
                <button>delete</button>
            </form> ,
            <a href="{{ route('edit',$contact->id) }}">update</a>]{{ $contact->name }} - {{$contact->phone }}</li>
    @endforeach
</ul>

{{ Js::from(\App\Models\Contact::all()) }}

</body>
</html>
