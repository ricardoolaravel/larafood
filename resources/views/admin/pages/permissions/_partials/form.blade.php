@include('admin.includes.alerts')

<div class="form-group">
    <label for="">* Nome</label>
    <input type="text" name="name" id="" class="form-control" value="{{ $permission->name ?? old('name') }}" placeholder="Nome é obrigatório">
</div>


<div class="form-group">
    <label for="">Descrição</label>
    <input type="text" name="description" id="" class="form-control" value="{{ $permission->description ?? old('description')}}" placeholder="Uma breve descrição do plano">
</div>

