@extends('layouts.admin')

@section('content')
<div class="container">
    <button type="button" class="btn btn-info btn-round" data-toggle="modal" onclick="registrarClientModal()">
        Registrar
    </button>
</div>

<div class="modal fade" id="clientModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
       
            <div class="modal-header border-bottom-0">
            <div id="title-modal" class="form-title text-center "></div>
                   
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                
            </div>

          
            <div class="modal-body">
              
<hr>
                <div class="d-flex flex-column text-center">

                    <form method="POST" id="formRegisterClient" action="" novalidate>
                        @csrf

                        <div class="form-group row">
                            <label for="identification" class="col-md-4 col-form-label text-md-right">{{ __('Identificación') }}</label>

                            <div class="col-md-7">
                                <input id="identification" type="number" class="form-control @error('identification') is-invalid @enderror" name="identification" value="{{ old('identification') }}" required autocomplete="identification" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-7">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Dirección') }}</label>

                            <div class="col-md-7">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Celular') }}</label>

                            <div class="col-md-7">
                                <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

                            <div class="col-md-7">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
<hr>
                        <div class="container">
                            <div class="row">
                               
                                <div class="col-sm">

                                </div>
                                <div class="col-sm">
                                    <button type="button" class="btn btn-secundary" id="btn-cerrar">
                                        {{ __('Cerrar') }}
                                    </button>
                                    <button type="submit" class="btn btn-info">
                                        {{ __('Guardar') }}
                                    </button>
                                </div>

                            </div>
                        </div>

                    </form>


                </div>
            </div>
        </div>

    </div>
</div>
<!-- modal -->


<div class="row justify-content-center">
    <div class="table-responsive" style="padding: 20px">
        <div class="row" id="proyectos">
            <div class="col-md-12">

                <table class="table table-bordered table-striped table-hover toggle-circle default footable-loaded footable table table-striped table-class" id="client_table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Identificación</th>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Celular</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="informacion">

                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <br>


    </div>
</div>
<!-- table -->



@endsection

@section('js')
<script src="{{ asset('js/funciones.js') }}"></script>
@endsection