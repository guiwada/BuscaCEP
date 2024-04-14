@extends('app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('buscar') }}" method="GET">
                <div class="card">
                    <div class="card-body">
                        <h1 class="mb-4 text-center">Buscar CEP</h1>
                        <div class="form-group">
                            <label for="cep">CEP</label>
                            <input type="text" class="form-control" id="cep" name="cep" placeholder="Digite o CEP">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
