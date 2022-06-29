jQuery.datetimepicker.setLocale('en');




var today = new Date();
var endDay = new Date();



jQuery('#my-schedule').datetimepicker({
    inline:true,
    minDate: today,
    // maxDate: endDay.setDate(today.getDate()+90),
    timepicker: false,
    allowTimes:[
        '10:00','11:00', '12:00', '14:00', '15:00',
        '16:00', '17:00', '18:00', '19:00', '20:00'
    ],
    multidate: true,

    // allowDates: ['2022-06-28', '2022-06-30'],
    formatDate:'Y-m-d',
    // weekends:['01.01.2014','02.01.2014','03.01.2014','04.01.2014','05.01.2014','27.06.2022'],
    onGenerate:function(ct) {
        $(this).css({
            'width': '800px',
            'height': '530px'
        });
        $(this).find('.xdsoft_calendar table').css({
            'width': '780px',
            'height': '470px'
        });

        $(this).find('.xdsoft_date div').css({
            'font-size': '32px',
            'text-align': 'center'
        });
        $(this).find('.xdsoft_current').css({'background-color': '#f886e6', 'box-shadow': 'none'});
        $(this).find('.xdsoft_time.xdsoft_current').css({'background-color': '#f886e6', 'box-shadow': 'none'});
    },

    onShow:function(ct,$i){
        $(this).find('.xdsoft_date').addClass("xdsoft_current");
    }
});
