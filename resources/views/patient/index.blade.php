@extends('layouts.masterBack')

@section('content')
   <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Tables des Patients</h5>
                        <div class="ibox-tools">
                            <a href="{{ url('patients/create') }}" class="btn btn-primary" role="button" >Ajouter</a>

                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                    <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Age</th>
                        <th>Tel</th>
                        <th>Cin</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                            @foreach($Patients as $item)
                            <tr class="gradeX">
                                <td>{{$item->cin}}</td>
                                <td>{{$item->nom}}</td>
                                <td>{{$item->prenom}}</td>
                                <td class="center">{{$item->age}}</td>
                                <td class="center">{{$item->tel}}</td>
                                <td class="center" style="padding-left:10px;"> 
                                    <a  href="{{ url('patients/'.$item->id.'/edit') }}" class="btn btn-warning btn-xs">Modifier</a> 
                                    <a  data-toggle="modal" data-target="#myModal" data-id="{{ $item->id }}" class="btn btn-danger btn-xs delete">Supprimer</a>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Age</th>
                        <th>Date Naissance</th>
                        <th>Cin</th>
                    </tr>
                    </tfoot>
                    </table>
                        </div>

                    </div>
                </div>
            </div>
            </div>
        </div>


          <!-- Modal -->
     
          <div class="modal" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content">
              
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Confirmation de suppression</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
              
                    <!-- Modal body -->
                    <div class="modal-body">
                        <p>Etes-vous sûr de vouloir supprimer cet élément ?</p>
                    </div>
              
                    <!-- Modal footer -->
                    <div class="modal-footer">
                    
                      <form method="post" name="suppelement"   >
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                     <button  type="submit"  class="btn btn-primary" >Oui</button>
                     <button type="button" class="btn btn-danger" data-dismiss="modal">Non</button>
                    </form>
        
               
                    </div>
              
                  </div>
                </div>
            </div>
      
@endsection


@section('jsSup')
<script src="{{ asset('assets/js/plugins/toastr/toastr.min.js')}}"></script>

<script src="{{ asset('assets/js/plugins/dataTables/datatables.min.js')}}"></script>
<!-- Page-Level Scripts -->
<script>
    $(document).ready(function(){
        $('.dataTables-example').DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            "language": {
            "url": "{{ asset('assets/js/plugins/dataTables/French.json')}} "
            },
            buttons: [
                { extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},

                {extend: 'print',
                 customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                }
                }
            ]

        });


        $('.delete').click((e) => {
            $target=$(e.target);
            const id=$target.attr('data-id');
            console.log(id)
            $(".modal-footer form").attr("action", "patients/"+id);
        });
 
        
        @if(session()->has('successSupp'))
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 6000
                };
                toastr.success( 'le Patient a étè bien supprimeé !!','Suppersion'  );

            }, 1000);

        @endif  
  });    
</script>
@endsection

@section('cssSup')
<link href="{{ asset('assets/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
@endsection

