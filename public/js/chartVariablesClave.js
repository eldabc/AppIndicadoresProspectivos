function loadChart($nombreVar, $porInfluencia, $porDependencia, $descripcion) {
    // alert($nombreVar+' '+$porInfluencia+' '+$porDependencia+' '+$descripcion);
    $("#nomVar").text($nombreVar);
    $("#desVar").html("<b> Descripcion: </b> " + $descripcion);
    $(".t-in").html("<b> " + $porInfluencia + " </b> ");
    $(".t-de").html("<b> " + $porDependencia + " </b> ");

    var ctx = document.getElementById("myChart").getContext("2d");
    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: ["% Influencia", "% Dependencia"],
            datasets: [
                {
                    label: "# of Votes",
                    data: [$porInfluencia, $porDependencia],
                    backgroundColor: [
                        "rgba(255, 99, 132, 0.2)",
                        "rgba(54, 162, 235, 0.2)",
                    ],
                    borderColor: [
                        "rgba(255, 99, 132, 1)",
                        "rgba(54, 162, 235, 1)",
                    ],
                    borderWidth: 1,
                    weight: 0.5,
                },
            ],
        },
        options: {
            scales: {
                yAxes: [
                    {
                        ticks: {
                            beginAtZero: true,
                        },
                    },
                ],
            },
        },
    });
}

function chartIndicadores(
    $totalVar,
    $totalVarClave,
    $vPoder,
    $vConflicto,
    $vAutonomia,
    $vResultados,
    $vPeloton
) {
    $("#varTotales").html("<b> " + $totalVar + " </b> ");
    $("#varClaves").html("<b> " + $totalVarClave + " </b> ");

    var $porcentaje = ($totalVarClave / $totalVar) * 100;
    $("#porcentaje").html("<b> " + $porcentaje + " </b> ");

    var ctx = document.getElementById("chartIndicadores").getContext("2d");
    var myChart = new Chart(ctx, {
        type: "doughnut",
        data: {
            labels: ["Variables Totales", "Variables Claves"],
            datasets: [
                {
                    label: "# of Votes",
                    data: [$totalVar, $totalVarClave],
                    backgroundColor: ["#8063f580", "#ffc10791"],
                    borderColor: ["8914fe", "#ffc107"],
                    borderWidth: 1,
                    weight: 0.5,
                },
            ],
        },
        options: {
            scales: {
                yAxes: [
                    {
                        ticks: {
                            beginAtZero: true,
                        },
                    },
                ],
            },
        },
    });

    $("#vPoder").html("<b> " + $vPoder + " </b> ");
    $("#vConflicto").html("<b> " + $vConflicto + " </b> ");
    $("#vAutonomia").html("<b> " + $vAutonomia + " </b> ");
    $("#vResultados").html("<b> " + $vResultados + " </b> ");
    $("#vPeloton").html("<b> " + $vPeloton + " </b> ");

    var ctxZonas = document.getElementById("chartZonas").getContext("2d");
    var myChartZonas = new Chart(ctxZonas, {
        type: "pie",
        data: {
            labels: [
                "Variables Poder",
                "Variables Conflicto",
                "Variables Autonomía",
                "Variables Resultados",
                "Variables Pelotón",
            ],
            datasets: [
                {
                    label: "# of Votes",
                    data: [
                        $vPoder,
                        $vConflicto,
                        $vAutonomia,
                        $vResultados,
                        $vPeloton,
                    ],
                    backgroundColor: [
                        "#8063f580",
                        "#ffc10791",
                        "#007bffba",
                        "#0caae0cc",
                        "#ff1d017d",
                    ],
                    borderColor: [
                        "8914fe",
                        "#ffc107",
                        "#007bff",
                        "#fff",
                        "#fff",
                    ],
                    borderWidth: 1,
                    weight: 0.5,
                },
            ],
        },
        options: {
            scales: {
                yAxes: [
                    {
                        ticks: {
                            beginAtZero: true,
                        },
                    },
                ],
            },
        },
    });
}
