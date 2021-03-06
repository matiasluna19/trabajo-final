
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
<link rel="stylesheet" href="styles.css">
<title>Registro</title>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-header">{{ __('Registro') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirme contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Pais') }}</label>

                            <div class="col-md-6" id="pais">
                              <select id="country" onchange="admSelectCheck(this);" name="country" required>
                                <option>Seleccionar</option>
                                <option id="argentina">Argentina</option>
                              </select>
                            </div>
                        </div>

                        <div  class="form-group row" id="provincia" style="display:none;">
                            <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Provincia') }}</label> <select id="state" name="state" ></select>


                        </div>




                        <div class="form-group row">
                            <label for="avatar" class="col-md-4 col-form-label text-md-right">Avatar</label>

                            <div class="col-md-6">
                                <input id="avatar" type="file" class="form-control" name="avatar" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrarse') }}
                                </button>
                                <a class="btn btn-link" href="{{ url('') }}">
                                    {{ __('Volver al sitio') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mb-10">
</div>


{{-- script api paises--}}

<script type="text/javascript">
window.addEventListener("load", function() {
fetch('https://restcountries.eu/rest/v2/all')
 .then(function(response){
   return response.json();
})
 .then(function(data){
   let paises = data;
   let miSelected = document.getElementById('country');
   for (let i = 0; i < paises.length; i++){
     miSelected.innerHTML += '<option id='+paises[i].name+'>'+paises[i].name+'</option>';
   }
 })

})
</script>

{{-- script comprobar si es argentina--}}



{{-- script api provincias--}}
<script type="text/javascript">

let dropdown = document.getElementById('state');

window.addEventListener("load", function() {
fetch('https://apis.datos.gob.ar/georef/api/provincias?campos=nombre')
 .then(function(response){
   return response.json();
})
 .then(function(data){
   let provincias = data.provincias;
   let miSelect = document.getElementById('state');
   for (let i = 0; i < provincias.length; i++){
     miSelect.innerHTML += '<option>'+provincias[i].nombre+'</option>';
   }
 })
})
</script>

<script type="text/javascript">
function admSelectCheck(nameSelect)
{
  if(nameSelect){
      admOptionValue = document.getElementById("argentina").value;
      if(admOptionValue == nameSelect.value){
          document.getElementById("provincia").style.display = "block";
      }
      else{
          document.getElementById("provincia").style.display = "none";
      }
  }
  else{
      document.getElementById("provincia").style.display = "none";
  }
}

</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
