@extends('layouts.masterBack')

@section('content')

<div class="row">
 
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Ajouter des clinique  <small></small></h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
    
            <div class="ibox-content">
            <form method="post" class="form-horizontal " action="{{ url('cliniques') }}">
                      {{ csrf_field() }}
                    <div class="form-group"><label class="col-sm-2 control-label">Nom: </label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="nom" value="{{ old('nom') }}">
                          @if ($errors->has('nom'))
                            <span class="help-block">
                                <strong class="text-danger">{{ $errors->first('nom') }}</strong>
                            </span>
                           @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Email: </label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}"> 
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
                            </span>
                           @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Address: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="address" value="{{ old('address') }}"> 
                            @if ($errors->has('address'))
                            <span class="help-block">
                                <strong class="text-danger">{{ $errors->first('address') }}</strong>
                            </span>
                           @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Tel: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="tel"  value="{{ old('tel') }}">
                            @if ($errors->has('tel'))
                            <span class="help-block">
                                <strong class="text-danger">{{ $errors->first('tel') }}</strong>
                            </span>
                           @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Login: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name"  value="{{ old('name') }}"> 
                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong class="text-danger">{{ $errors->first('name') }}</strong>
                            </span>
                           @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Mot de passe: </label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password"  > 
                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong class="text-danger">{{ $errors->first('password') }}</strong>
                            </span>
                           @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group"><label class="col-sm-2 control-label">confirmation Mot de passe: </label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control"  name="password_confirmation"  > 
                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong class="text-danger">{{ $errors->first('password') }}</strong>
                            </span>
                           @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <button class="btn btn-primary" type="submit">enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection


@section('jsSup')
<script src="{{ asset('assets/js/plugins/toastr/toastr.min.js')}}"></script>
<script>
        $(document).ready(function(){
           
      
            @if(session()->has('successCreate'))
                setTimeout(function() {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 6000
                    };
                    toastr.success( 'le clinique a étè bien enrgistre !!','Creation'  );

                }, 1000);

            @endif  

        });
</script>   
  
@endsection



@section('cssSup')

@endsection