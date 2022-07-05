window.$ = window.jQuery = require('jquery');

require('./bootstrap');
require('./calendar');


import 'jquery/dist/jquery.min.js';
import 'jquery-datetimepicker/build/jquery.datetimepicker.full';
window.$ = window.jQuery = require('jquery');

jQuery.datetimepicker.setLocale('en');

var today = new Date();
var endDay = new Date();
const mastersSelect = document.getElementById("masters");

jQuery('#datetimepicker').datetimepicker({
    inline:true,
    timepicker: false,
    beforeShowDay: date => [false, ''],
    onGenerate:function(ct) {
        $(this).find('.xdsoft_datepicker').css({'width': '400px'});
        $(this).find('.xdsoft_date').css({'height': '50px', 'text-align': 'center', 'font-size': '20px'});
    },
});

if(mastersSelect) {
mastersSelect.addEventListener("change", function () {

        var id = JSON.parse(this.value).id;
        var master = $(`#masters option#${id}`)[0];
        var plusAvailabilityDays = 0;

        var availabilityDates = JSON.parse(this.value).master_bookings.filter(v => {
            if(v.date_type == 'SCHEDULE') return v;
        }).map(d => d.date.split(" ").shift());
        plusAvailabilityDays = availabilityDates.length ? 32 : 0;

        jQuery('#datetimepicker').datetimepicker('destroy');
        jQuery('#datetimepicker').datetimepicker({

            inline:true,
            minDate: today,
            maxDate: endDay.setDate(today.getDate() + plusAvailabilityDays),
            allowTimes: ['10:00','11:00', '12:00', '14:00', '15:00', '17:00', '19:00'],
            timepicker: !!availabilityDates.length,
            allowDates: availabilityDates,
            formatDate:'Y-m-d',
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
                                }); // foreach
                            } // if
                        } // if check date_type
                    }); // loop
                } // if

                // styles
                $(this).find('.xdsoft_datepicker').css({'width': '400px'});
                $(this).find('.xdsoft_date').css({'height': '50px', 'text-align': 'center', 'font-size': '20px'});
                $(this).find('.xdsoft_date:not(.xdsoft_disabled)').css({'background-color': '#000', 'color': '#fff'});
                $(this).find('.xdsoft_current').css({'background-color': '#f886e6', 'box-shadow': 'none'});

                // hour slot style
                $(this).find('.xdsoft_timepicker').css({'width': '80px'});
                $(this).find('.xdsoft_time_box').css({'height': '346px'});
                $(this).find('.xdsoft_time').css({'height': '50px', 'font-size': '20px'});
                $(this).find('.xdsoft_time.xdsoft_current').css({'background-color': '#f886e6', 'box-shadow': 'none'});
            }
        });
    });
}





