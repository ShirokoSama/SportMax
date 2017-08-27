/**
 * Created by Srf on 2016/11/30.
 */
function personal_highcharts_init($walk_miles, $run_miles, $bike_miles) {
    $('#chartC').highcharts({

        title: {
            text: '各项运动占比',
            align: 'center',
            verticalAlign: 'middle',
            y: -15,
            style: {
                fontFamily: 'Microsoft JhengHei',
                fontWeight: 600,
                color: '#616161'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    distance: -20,
                    style: {
                        fontWeight: 500,
                        color: '#616161'
                    }
                },
                showInLegend: true,
                startAngle: -90,
                endAngle: 270,
                center: ['50%', '50%']
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            innerSize: '70%',
            data: [
                ['Walk', $walk_miles],
                ['Run', $run_miles],
                ['Ride', $bike_miles]
        ]
}],
    credits: {
        enabled: false
    }
});
};