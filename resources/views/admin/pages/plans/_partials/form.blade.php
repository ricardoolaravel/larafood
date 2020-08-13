@include('admin.includes.alerts')

<div class="form-group">
    <label for="">Nome</label>
    <input type="text" name="name" id="" class="form-control" value="{{ $plan->name ?? old('name') }}">
</div>


<div class="form-group">
    <label for="">Preço</label>
    <input type="text" name="price" id="" class="form-control" value="{{ $plan->price ?? old('price')}}">
</div>

<div class="form-group">
    <label for="">Descrição</label>
    <input type="text" name="description" id="" class="form-control" value="{{ $plan->description ?? old('description')}}">
</div>