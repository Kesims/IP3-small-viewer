<h1>Upravit místnost</h1>
<form method="POST" action="/rooms/{{$room->id}}/update">
    @csrf
    <label for="name">Název</label>
    <input type="text" name="name" id="name" class="form-control"
           value="@if(old("name") !== null){{old(('name'))}}@else{{$room->name}}@endif"><br>
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <label for="no">Číslo</label>
    <input type="text" name="no" id="no" class="form-control"
           value="@if(old("no") !== null){{old(('no'))}}@else{{$room->no}}@endif"><br>
    @error('no')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <label for="phone">Telefon</label>
    <input type="text" name="phone" id="phone" class="form-control"
           value="@if(old("phone") !== null){{old(('phone'))}}@elseif(isset($room->phone)){{$room->phone}}@endif"><br>
    @error('phone')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button type="submit" class="btn btn-primary mt-3">Uložit</button>
</form>
