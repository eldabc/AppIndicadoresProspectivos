@extends('layouts.layouts')

@section('title', 'MICMAC listado Total Variables')

@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-10">
            <h4 style= "text-align:center; padding: 5%;">LISTADO TOTAL DE VARIABLES</h4>
         

            <div class="panel panel-default">
                <div class="panel-heading" style= "background-color:SkyBlue;">
                </div>

                    <div class="center">
                        <div style="overflow-x:auto;">
                            <table id="table" class="table table-bordered table-hover dataTable" role="grid" >
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>VARIABLE </th>
                                        <th>% INFLUENCIA</th>
                                        <th>% DEPENDENCIA</th>
                                        <th>Zona I/D</th>
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

                                    @php($proyecto = $var->proyecto)

                                    @endforeach

                                {{-- Calculando las zonas --}}
                                @php($zona = "")
                                <?php
                                  $vPoder= 0;
                                  $vConflicto= 0;
                                  $vAutonomia= 0;
                                  $vResultados= 0;
                                  $vPeloton= 0;
                                  $countVarClave= 0;
                                  ?>
                                 
                                    
                                @foreach($variable as $var)
                                    @php($porInfluencia = number_format(($var->influencia / $var3) * 100, 2, ',', ' '))
                                    @php($porDependencia = number_format(($var->dependencia / $var2) * 100, 2, ',', ' '))

                                @if ($x<> $var->variable)

                                        @if($var->influencia > ($max/2) && $var->dependencia < ($max/2) )    
                                            @php($zona = "Zona de Poder")
                                            @php($vPoder++)
                                        @elseif($var->influencia > ($max/2) && $var->dependencia > ($max/2) )    
                                            @php($zona = "Zona de Conflicto")
                                            @php($vConflicto++)

                                        @elseif($var->influencia < ($max/2) && $var->dependencia < ($max/2) )    
                                            @php($zona = "Zona de Autonomía")
                                            @php($vAutonomia++)
                                        
                                        @elseif($var->influencia < ($max/2) && $var->dependencia > ($max/2) )    
                                            @php($zona = "Zona de Resultados")
                                            @php($vResultados++)
                                        
                                        @elseif( ( $var->influencia == ($max/2)  && $var->dependencia <= ($max/2) ) or ( $var->influencia <= ($max/2)  && $var->dependencia == ($max/2) ) )    
                                            @php($zona = "Zona de Pelotón")
                                            @php($vPeloton++)
                                        @endif
                                        @if ($var->influencia > ($max/2))
                                          @php($countVarClave++)
                                        @endif
                                        <tr>
                                            <td>{{$numero}} </td>
                                            <td>{{$var->variable}}  </td>
                                            <td>{{$porInfluencia}}     </td>
                                            <td>{{$porDependencia}}  </td>
                                            <td>{{ $zona }}</td>
                                            <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#chartVariables" onclick="loadChart('{{$var->variable}}',{{str_replace(',', '.', $porInfluencia)}},{{str_replace(',', '.', $porDependencia)}},'{{$var->descripcion}}')">
                                                Detalles
                                            </button> </td>   
                                        </tr>
                                        
                                        <?php $numero++ ?>
                                        @php( $x=$var->variable )
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>

                  <h4 style= "text-align:left;">NUMERO TOTAL DE VARIABLES: {{$numero-1}}</h4>
                    <br>
                        <a href="{{ route('micmac.show', $proyecto) }}"  class="btn btn-primary")">Atrás</a>
                   <a  class="btn btn-warning" data-toggle="modal" data-target="#ModalchartIndicadores" onclick="chartIndicadores({{$numero-1}},'{{$countVarClave}}','{{$vPoder}}','{{$vConflicto}}','{{$vAutonomia}}','{{$vResultados}}','{{$vPeloton}}')">Gráficas de indicadores</a>
        </div>
    </div>
</div>

<!-- ********** Modal Char PorInfluencia && PorDependencia ************ -->
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
<!-- ********** END Modal Char PorInfluencia && PorDependencia ************ -->


<!-- ********** Modal Char Indicadores ************ -->
<div class="modal fade bd-example-modal-lg" id="ModalchartIndicadores" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg"  role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detalles</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body"> 
              <div class="row">
                <div class="col-md-6">
                  <canvas id="chartIndicadores" width="400" height="400"></canvas>
                </div>
                <div class="col-md-6">
                  <table class="table">
                    <tr>
                      <td class="leyenda">LEYENDA</td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>Variables Totales: </td>
                      <td id="varTotales"></td>
                    </tr>
                    <tr>
                      <td>Variables Claves: </td>
                      <td id="varClaves"></td>
                    </tr>
                    <tr>
                      <td>Porcentaje: </td>
                      <td id="porcentaje"></td>
                    </tr>
                  </table>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-6">
                  <canvas id="chartZonas" width="400" height="400"></canvas>
                </div>
                <div class="col-md-6">
                  <table class="table">
                    <tr>
                      <td class="leyenda">LEYENDA</td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>Variables Poder: </td>
                      <td id="vPoder"></td>
                    </tr>
                    <tr>
                      <td>Variables Conflicto: </td>
                      <td id="vConflicto"></td>
                    </tr>
                    <tr>
                      <td>Variables Autonomía: </td>
                      <td id="vAutonomia"></td>
                    </tr>
                    <tr>
                      <td>Variables Resultados: </td>
                      <td id="vResultados"></td>
                    </tr>
                    <tr>
                      <td>Variables Pelotón: </td>
                      <td id="vPeloton"></td>
                    </tr>
                  </table>
                </div>
              </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<!-- ********** END Modal Char Indicadores ************ -->
<script src="{{ asset('js/Chart.min.js') }}"></script>
<script src="{{ asset('js/chartVariablesClave.js') }}"></script>
@endsection
