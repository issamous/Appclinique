@extends('layouts.masterBack')

@section('content')

<div class="row">
    
  @if(session()->has('success'))
   <div class="col-lg-12">
        <div class="ibox-content alert alert-success" style="background-color: #dff0d8 !important;">
        <p style="text-align:center"> {{ session()->get('success') }}
        </div>
   </div>  
  @endif

    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Ajouter un Administrateurs  <small></small></h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
    
            <div class="ibox-content">
            <form method="post" class="form-horizontal " action="{{ url('administrateurs') }}">
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
                    <div class="form-group"><label class="col-sm-2 control-label">Prenom: </label>
                        <div class="col-sm-10">
                            <input type="prenom" class="form-control" name="prenom" value="{{ old('prenom') }}"> 
                            @if ($errors->has('prenom'))
                            <span class="help-block">
                                <strong class="text-danger">{{ $errors->first('prenom') }}</strong>
                            </span>
                           @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Role: </label>
                        <div class="col-sm-10">
                          
                            <select class="form-control m-b" name="role" value="{{ old('role') }}">
                              
                                <option  @if (old('role') == 1)  selected  @endif value="1" >Administrateur </option>
                                <option  @if (old('role') == 2)  selected  @endif value="2" >Editeur</option>
                                <option  @if (old('role') == 3)  selected  @endif value="3" >Analytics</option>
                              
                            </select>
                            @if ($errors->has('role'))
                            <span class="help-block">
                                <strong class="text-danger">{{ $errors->first('role') }}</strong>
                            </span>
                           @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                     <!-- <div class="form-group"><label class="col-sm-2 control-label">Photo: </label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="photo"  value="{{ old('photo') }}">

                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <span class="btn btn-default btn-file"><span class="fileinput-new">Select file</span>
                                <span class="fileinput-exists">Change</span><input type="file" name="photo"/></span>
                                <span class="fileinput-filename"></span>
                                <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">×</a>
                            </div> 

                            @if ($errors->has('photo'))
                            <span class="help-block">
                                <strong class="text-danger">{{ $errors->first('photo') }}</strong>
                            </span>
                           @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>-->
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
                    toastr.success( 'l\'administrateur a étè bien enrgistre !!','Creation'  );

                }, 1000);

            @endif  

        });
</script>   
  
@endsection



@section('cssSup')

@endsection