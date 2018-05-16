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
            <form method="post" class="form-horizontal " action="{{ url('dossiers') }}">
                      {{ csrf_field() }}
                    <div class="form-group"><label class="col-sm-2 control-label">Patient: </label>
                        <div class="col-sm-10"><input type="text" class="form-control patient" name="patient" value="{{ old('patient') }}">
                            <input type="hidden" id="idpatient" name="idpatient" />
                         
                          @if ($errors->has('patient'))
                            <span class="help-block">
                                <strong class="text-danger">{{ $errors->first('patient') }}</strong>
                            </span>
                           @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Laboratoire: </label>
                        <div class="col-sm-10">
                         
                            <input type="text" placeholder="nom de laboratoire" name="Laboratoire" class="typeahead form-control" />
                            @if ($errors->has('Laboratoire'))
                            <span class="help-block">
                                <strong class="text-danger">{{ $errors->first('Laboratoire') }}</strong>
                            </span>
                           @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">medcien(s): </label>
                        <div class="col-sm-10">
                            <input type="text" class=" form-control" name="medcien" id="tags-input"  value=""> 

                            @if ($errors->has('medcien'))
                            <span class="help-block">
                                <strong class="text-danger">{{ $errors->first('medcien') }}</strong>
                            </span>
                           @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <button class="btn btn-primary" id="someButton" type="submit">enregistrer</button>
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
   <script src="{{ asset('assets/js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<script>
        $(document).ready(function(){
           
      var tabjava=[];
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


var tabjava=[
        @foreach($medcien as $itemmedcien ) 
         '{{ $itemmedcien }}',
        @endforeach
            ]
    $( "#nomMedcien" ).autocomplete({
      source: tabjava
    });


    $('.typeahead_1').typeahead({
                source:  [
                    {"name": "Afghanistan", "id": "AF", "ccn0": "040"},
                    {"name": "Land Islands", "id": "AX", "ccn0": "050"},
                    {"name": "Albania", "code": "id","ccn0": "060"},
                    {"name": "Algeria", "code": "id","ccn0": "070"}
                ]
            });

       
            $('.typeahead_3').typeahead({
                source: [
                            {
                                "Id": "d99d4138-640d-4a2c-a1a5-0269ed817f9d",
                                "Name": "Ben Gibbard"
                            },
                            {
                                "Id": "43f19a29-7980-4ed1-af41-538244477d1a",
                                "Name": "Breaking Benjamin"
                            },
                            {
                                "Id": "13d34403-12af-4aab-97b7-a712c2ac83c4",
                                "Name": "The Bends"
                            }
                        ]
            });



        });
</script>   




<script src="{{ asset('assets/js/plugins/typehead/typeahead.js')}}"></script>


<script src="{{ asset('assets/js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>


<script>
	
    
   
var data = [ @foreach($medcien as $itemmedcien )  "{{ $itemmedcien }}",  @endforeach ];

var citynames = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    local: $.map(data, function (city) {
        return {
            name: city,
            id:5
        };
    })
});
citynames.initialize();

$('#tags-input').tagsinput({
    typeaheadjs: [{
          minLength: 1,
          highlight: true,
    },{
        minlength: 1,
        name: 'citynames',
        displayKey: 'name',
        valueKey: 'name',
        source: citynames.ttAdapter()
    }],
    freeInput: true
});







var substringMatcher = function(strs) {
  return function findMatches(q, cb) {
    var matches, substringRegex;

    // an array that will be populated with substring matches
    matches = [];

    // regex used to determine if a string contains the substring `q`
    substrRegex = new RegExp(q, 'i');

    // iterate through the pool of strings and for any string that
    // contains the substring `q`, add it to the `matches` array
    $.each(strs, function(i, str) {
      if (substrRegex.test(str)) {
        matches.push(str);
      }
    });

    cb(matches);
  };
};

var states = [ @foreach($laboratoire as $itemlabo )  '{ id = {{ $itemlabo->id }} , name = {{ $itemlabo->nom }}   }' ,  @endforeach ]

$('.typeahead').typeahead({
  hint: true,
  highlight: true,
  minLength: 1
},
{
  name: 'states',
  source: substringMatcher(states)
}

);


var statesPatient = [@foreach($patient as $itemPatient )  "{{ $itemPatient->nom }} {{ $itemPatient->prenom }}" ,  @endforeach] ;

$('.patient').typeahead({
  hint: true,
  highlight: true,
  minLength: 1
},
{
  name: 'statesPatient',
  source: substringMatcher(statesPatient),
  afterSelect: function(){
                    alert('dd');
                }
});





$(document).on("click", "#someButton", function (e) {
          // e.preventDefault();
            //alert( $('.typeahead').typeahead('val'));
            console.log($(".typeahead"))
        });




</script>

@endsection



@section('cssSup')
<!--<link rel="stylesheet" href="{{ asset('assets/css/plugins/jQueryUI/jquery-ui-1.10.4.custom.min.css')}}" />-->
<link rel="stylesheet" href="{{ asset('assets/css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" />
<link rel="stylesheet" href="{{ asset('assets/css/plugins/typeahead/typeahead.css')}}" />
@endsection