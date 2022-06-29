window.$ = window.jQuery = require('jquery');

require('./bootstrap');
require('./calendar');


import 'jquery/dist/jquery.min.js';
import 'jquery-datetimepicker/build/jquery.datetimepicker.full';
window.$ = window.jQuery = require('jquery');

jQuery.datetimepicker.setLocale('en');




var today = new Date();
var endDay = new Date();



var master = $(`#masters option[data-bookings="[]"]`)[0];
const element = document.getElementById("masters");


if(element != null) {
    element.addEventListener("change", function () {
        var id = JSON.parse(this.value).id;
        master = $(`#masters option#${id}`)[0];

    });
}


jQuery('#datetimepicker').datetimepicker({
    inline:true,
    minDate: today,
    maxDate: endDay.setDate(today.getDate()+90),
    allowTimes:[
        '10:00','11:00', '12:00', '14:00', '15:00',
        // '16:00', '17:00', '18:00', '19:00', '20:00'
    ],
    // allowDates: ['2022-06-28', '2022-06-30'],
    formatDate:'Y-m-d',
    // weekends:['01.01.2014','02.01.2014','03.01.2014','04.01.2014','05.01.2014','27.06.2022'],
    onGenerate:function(ct) {
            if(JSON.parse(master.dataset.bookings).length) {
                JSON.parse(master.dataset.bookings).forEach(booking => {
                    if(booking.date_type == "BOOKING") {

                        var year = new Date(booking.date).getFullYear();
                        var month = new Date(booking.date).getMonth();
                        var day = new Date(booking.date).getDate();
                        var hour = new Date(booking.date).getHours();

                        if (new Date(ct).getFullYear() == year && new Date(ct).getMonth() == month && new Date(ct).getDate() == day) {
                            $(this).find('.xdsoft_time').each((index, timeSlot) => {
                                if (timeSlot.dataset.hour == hour) {
                                    $(timeSlot).css('display', 'none');
                                }
                            }); // loop
                        } // if
                    } // if check date_type
                }); // loop
            } // if
        $(this).find('.xdsoft_current').css({'background-color': '#f886e6', 'box-shadow': 'none'});
        $(this).find('.xdsoft_time.xdsoft_current').css({'background-color': '#f886e6', 'box-shadow': 'none'});
    },
});


