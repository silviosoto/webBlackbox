window.onload = function () {
    var dataLength = 0;
    var data = [];
    var updateInterval = 500;
    updateChart();
    
    function updateChart() {
        
        $.getJSON("/bitacora/create", function (result) {
            if (dataLength !== result.length) {
                for (var i = dataLength; i < result.length; i++) {
                    data.push({
                        x: parseInt(result[i].valorx),
                        y: parseInt(result[i].valory)
                    });

                }
                dataLength = result.length;
                chart.render();
            }
        });
    }

    var chart = new CanvasJS.Chart("chart", {
        title: {
            text: "Velocidades"
        },
        axisX: {
            title: "Valores X",
        },
        axisY: {
            title: "Valores Y",
        },
        
        data: [{type: "line", dataPoints: data}],
    });
    
    setInterval(function () {
        updateChart()
    }, updateInterval);
}