/**
Template Name: Ubold Dashboard
Author: CoderThemes
Email: coderthemes@gmail.com
File: Chartjs
*/


!function($) {
    "use strict";

    var ChartJs = function() {};

    ChartJs.prototype.respChart = function respChart(selector,type,data, options) {
        // get selector by context
        var ctx = selector.get(0).getContext("2d");
        // pointing parent container to make chart js inherit its width
        var container = $(selector).parent();

        // enable resizing matter
        $(window).resize( generateChart );

        // this function produce the responsive Chart JS
        function generateChart(){
            // make chart width fit with its container
            var ww = selector.attr('width', $(container).width() );
            switch(type){
                case 'Doughnut':
                    new Chart(ctx).Doughnut(data, options);
                    break;
            }
            // Initiate new chart or Redraw

        };
        // run function - render chart at first load
        generateChart();
    },
    //init
    ChartJs.prototype.init = function() {
        

        //donut chart
        var DonutChart = [
            {
                value: 300,
                color: "#5fbeaa",
                highlight: "#51dbbe",
                label: "Ventas"
            }, {
                value: 80,
                color: "#F18A02",
                highlight: "#ff5a00",
                label: "En Ruta"
            }, {
                value: 3,
                color: "#d00000",
                highlight: "#FE0000",
                label: "Cancelados"
            }
            , {
                value: 60,
                color: "#5D9CEC",
                highlight: "#3d92ff",
                label: "MexiPuntos (Entregas Pendientes)"
            }

        ]
        this.respChart($("#doughnut"),'Doughnut',DonutChart);
        
       

    },
    $.ChartJs = new ChartJs, $.ChartJs.Constructor = ChartJs

}(window.jQuery),

//initializing 
function($) {
    "use strict";
    $.ChartJs.init()
}(window.jQuery);

