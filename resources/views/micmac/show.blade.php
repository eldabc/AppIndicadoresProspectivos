@extends('layouts.layouts')

@section('title', 'MICMAC Variables Clave')

@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-10">
            <h4 style= "text-align:center; padding: 5%;">INDICADORES DE GESTION</h4>
         

            <div class="panel panel-default">
                <div class="panel-heading" style= "background-color:SkyBlue;">
                </div>

                    <div class="center">
                        <div style="overflow-x:auto;">
                            <table id="table" class="table table-bordered table-hover dataTable" role="grid" >
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>VARIABLE CLAVE</th>
                                        <th>% INFLUENCIA</th>
                                        <th>% DEPENDENCIA</th>
                                        <th>ACCIONES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($variable as $var)
                                        <?php $var3=$var3 + $var->influencia ?>
                                        <?php $var2=$var2 + $var->dependencia ?>

                                        @if ( $var->influencia > $max )
                                            <?php $max= $var->influencia ?>
                                        @endif
                                        @if ( $var->dependencia > $max )
                                            <?php $max= $var->dependencia ?>
                                        @endif
                                    @endforeach

                                    @foreach($variable as $var)
                                        @php($porInfluencia = number_format(($var->influencia / $var3) * 100, 2, ',', ' '))
                                        @php($porDependencia = number_format(($var->dependencia / $var2) * 100, 2, ',', ' '))

                                    @if ($var->influencia > ($max/2))
                                    <tr>
                                        <td>{{$numero}} </td>
                                        <td>{{$var->variable}}  </td>
                                        <td>{{$porInfluencia}}     </td>
                                        <td>{{$porDependencia}}  </td>
                                        <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#chartVariables" onclick="loadChart('{{$var->variable}}',{{str_replace(',', '.', $porInfluencia)}},{{str_replace(',', '.', $porDependencia)}},'{{$var->descripcion}}')">
                                                Detalles
                                            </button> 
                                        </td>   
                                    </tr>
                                     <?php $numero++ ?>
                                     @endif
                                     @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>

                  <h4 style= "text-align:left;">NUMERO TOTAL DE VARIABLES: {{$numero-1}}</h4>
                  <br>
                  <a href="{{ route('micmac.showVariables') }}"  class="btn btn-danger" onclick="mostrar3()">Listado total de variables</a>
                   {{-- <a  class="btn btn-warning" href="{{ route('micmac.graficasVariables') }}" onclick="mostrar1()">Gráficas de indicadores</a> --}}
                   <a href="{{ route('micmac.index') }}"  class="btn btn-primary")">Atrás</a>
        </div>
    </div>
    <!-- ********** Modal ************ -->
    <div class="modal fade" id="chartVariables" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Detalles</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                <h4 id="nomVar" style= "text-align:center;"></h4> 
                    
                <p  id="desVar" class="st-variable"></p> 

                  <div>
                    <canvas id="myChart" width="400" height="400"></canvas>
                  </div>


               <div class="cont-por"><h5 class="text-left t-in"></h5> % influencia</div> 
               <div class="cont-por"><h5 class="text-left t-de"></h5>  % dependencia</div> 

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    <!-- ********** END Modal ************ -->

</div>   
<script src="{{ asset('js/Chart.min.js') }}"></script>
<script src="{{ asset('js/chartVariablesClave.js') }}"></script>
@endsection
