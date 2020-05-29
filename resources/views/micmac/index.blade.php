@extends('layouts.layouts')

@section('title', 'MICMAC Listado')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-10  "style= "text-align:center; padding: 5%;" >
           <h2> <i class="ti-receipt" ></i>
              Proyectos Micmac</h2> 
        </br>
                
        <div class="center">
            <div style="overflow-x:auto;">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th class="text-center">NOMBRE</th>
                            <th class="text-center">FECHA</th>
                            <th class="text-center">METODO(S)</th> 
                            <th>ACCIONES</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($proy as $proys)

                                    @if ($x<> $proys->proyecto)
                                        <tr>
                                            <td>{{$proys->proyecto}} </td>
                                            <td>{{ date('d-m-y', strtotime($proys->created_at)) }}  </td>
                                            <td> 
                                                @foreach($proy as $proys_m)

                                                    @if ($proys_m->proyecto_id == $proys->id)
                                                       {{ $proys_m->name_method}}
                                                         <br>
                                                    @endif

                                                @endforeach
                                            </td>
                                            <td> <a href="{{ route('micmac.show', $proys->proyecto) }}" class="btn btn-success" >Ver</a></td>
                                        </tr>    
                                        <?php $x=$proys->proyecto ?>
                                @endif

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection