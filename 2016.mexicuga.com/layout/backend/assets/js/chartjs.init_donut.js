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
                case 'Line':
                    new Chart(ctx).Line(data, options);
                    break;
                case 'Doughnut':
                    new Chart(ctx).Doughnut(data, options);
                    break;
                case 'Pie':
                    new Chart(ctx).Pie(data, options);
                    break;
                case 'Bar':
                    new Chart(ctx).Bar(data, options);
                    break;
                case 'Radar':
                    new Chart(ctx).Radar(data, options);
                    break;
                case 'PolarArea':
                    new Chart(ctx).PolarArea(data, options);
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
                value: 20,
                color: "#5fbeaa",
                highlight: "#5fbeaa",
                label: "Chrome"
            }, {
                value: 50,
                color: "#36404a",
                highlight: "#36404a",
                label: "IE"
            }, {
                value: 40,
                color: "#ebeff2",
                highlight: "#ebeff2",
                label: "Other"
            }, {
                value: 100,
                color: "#5d9cec",
                highlight: "#5d9cec",
                label: "Firefox"
            },
            {
                value: 20,
                color: "#5d9cec",
                highlight: "#5d9cec",
                label: "Hola"
            }

        ]
        this.respChart($("#doughnut"),'Doughnut',DonutChart);
        
        //Pie chart
        var PieChart = [
            {
                value: 40,
                color:"#ebeff2",
                label: "IE"
            },
            {
                value : 80,
                color : "#5fbeaa",
                label: "Chrome"
            },
            {
                value : 70,
                color : "#5d9cec",
                label: "Safari"
            }
        ]
        this.respChart($("#pie"),'Pie',PieChart);


    },
    $.ChartJs = new ChartJs, $.ChartJs.Constructor = ChartJs

}(window.jQuery),

//initializing 
function($) {
    "use strict";
    $.ChartJs.init()
}(window.jQuery);

