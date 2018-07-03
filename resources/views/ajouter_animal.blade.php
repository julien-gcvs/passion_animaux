@extends('template')

@section('contenu')
    <br>
    <div class="col-sm-offset-3 col-sm-6"> {{-- Cette Vue sert à la fois pour l'ajout mais aussi la modification des animaux. --}}
      <div class="panel panel-{{((isset($animalUpdate)) ? $animalUpdate->getType()->getBootstrapCouleur() : "success")}}"> {{-- $animalUpdate permet de savoir si on a un animal à update --}}
        <div class="panel-heading">{{ ((isset($animalUpdate)) ? "Modifier l'" : "Ajouter le nouvel ") }}animal :</div>
            <div class="panel-body">
                {!! Form::open(['url' => ((isset($animalUpdate)) ? "animals/".$animalUpdate->getId() : "animals")]) !!}
                    <div class="form-group {!! $errors->has('type') ? 'has-error' : '' !!}">
                        {!! Form::select('type', $typesNoms, ((isset($animalUpdate)) ? $animalUpdate->getType()->getId() : null), ['class' => 'form-control', 'onchange' => 'changePlaceHolder()']) !!}
                        {!! $errors->first('type', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
                        {!! Form::text('nom', ((isset($animalUpdate)) ? $animalUpdate->getNom() : null), ['class' => 'form-control', 'placeholder' => 'Le nom de l\'animal']) !!}
                        {!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
                    </div>
                    @if (isset($animalUpdate))
                      <label for="peau" id="peau"></label>
                    @endif
                    <div class="form-group {!! $errors->has('peau') ? 'has-error' : '' !!}">
                        {!! Form::text('peau', ((isset($animalUpdate)) ? $animalUpdate->getSkin() : null), ['class' => 'form-control', 'placeholder' => 'Comment décrivez vous sa peau?']) !!}
                        {!! $errors->first('peau', '<small class="help-block">:message</small>') !!}
                    </div>
                    {!! Form::submit('Envoyer !', ['class' => 'btn btn-'.((isset($animalUpdate)) ? $animalUpdate->getType()->getBootstrapCouleur() : "success") .' pull-right']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@section('js')
<script type="text/javascript">
  function changePlaceHolder() {
    var skinType = [
      @foreach ($types as $type)
        '{{ $type->getSkinType() }}',
      @endforeach
    ];
    {{-- On change le placeholder pour qu'il convienne avec le type d'animal --}}

    document.getElementsByName('peau')[0].placeholder='S' + skinType[(document.getElementsByName("type")[0].value-1)] + "...";
    @if (isset($animalUpdate))
      document.getElementById('peau').innerHTML = 'S' + skinType[(document.getElementsByName("type")[0].value-1)] + "...";
    @endif
  }
  changePlaceHolder();
</script>

@endsection
