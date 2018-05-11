@extends('layouts.masterBack')

@section('content')

<div class="row">
   
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Ajouter un medcien</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#">Config option 1</a>
                        </li>
                        <li><a href="#">Config option 2</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <form method="post" class="form-horizontal " action="{{url('medciens')}}">
                    {{ csrf_field() }}
                    <div class="form-group"><label class="col-sm-2 control-label">Nom</label>

                        <div class="col-sm-10"><input type="text" class="form-control" name="nom" value="{{ old('nom') }}">
                            @if ($errors->has('nom'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('nom') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Prenom</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="prenom" value="{{ old('prenom') }}"> 
                             @if ($errors->has('prenom'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('prenom') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                      <div class="form-group"><label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10"><input type="email" class="form-control" name="email" value="{{ old('email') }}"> 
                             @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Specialite</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="specialite" value="{{ old('specialite') }}"> 
                             @if ($errors->has('specialite'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('specialite') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Cin</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="cin" value="{{ old('cin') }}">
                         @if ($errors->has('cin'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('cin') }}</strong>
                                    </span>
                                @endif 
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">tel</label>
                        <div class="col-sm-10"><input type="number" class="form-control" name="tel" value="{{ old('tel') }}"> 
                             @if ($errors->has('tel'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('tel') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Login</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="login" value="{{ old('login') }}"> 
                             @if ($errors->has('login'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('login') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Mot de passe</label>
                        <div class="col-sm-10"><input type="password" class="form-control" name="password"> 
                             @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"> confirm Mot de passe</label>
                            <div class="col-md-10">
                                <input  placeholder="password-confirm"  type="password" class="form-control" name="password_confirmation" >
                            </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <button class="btn btn-primary" type="submit">Enregistrer</button>
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
                    toastr.success( 'le Medcien a étè bien enrgistre !!','Creation'  );

                }, 1000);

            @endif  

        });
</script>   
  
@endsection



@section('cssSup')

@endsection