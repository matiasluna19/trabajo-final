
@extends('layout')
@section('title')
  Contacto - Didi Tienda Deportiva
@endsection

@section('main')

<div class="container">
	<div class="row">
      <div class="col-md-6 col-md-offset-3" style="margin-top: 15px; margin-left: 20%;">
        <div class="well well-sm">
          <ul class="errores alert" style="color:red">
            @foreach ($errors->all() as $error)
              <li>
                {{$error}}
              </li>
            @endforeach
          </ul>
          <form class="form-horizontal" action="/contacto" method="post">
            {{csrf_field()}}
          <fieldset>
            <legend class="text-center">Contactanos</legend>

            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Nombre</label>
              <div class="col-md-9">
                <input id="name" name="nombre" type="text" placeholder="Ignacio" class="form-control" value="{{old("title")}}">
              </div>
            </div>

            <!-- Email input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="email">Tu mail</label>
              <div class="col-md-9">
                <input id="email" name="email" type="text" placeholder="ignacio@info.com.ar" class="form-control">
              </div>
            </div>

            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message">Tu mensaje</label>
              <div class="col-md-9">
                <textarea class="form-control" id="message" name="mensaje" placeholder="Me contacto para..." rows="5"></textarea>
              </div>
            </div>

            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-right">
                <button type="submit" id="enviarContacto" class="btn btn-primary btn-lg">Enviar</button>
              </div>
            </div>
          </fieldset>
          </form>
        </div>
      </div>
	</div>
</div>

@endsection
