$(function(){
    $("#start_coupon").datepicker({
        prevText: "Tháng trước",
        nextText: "Tháng sau",
        dateFormat: "dd/mm/yy",
        dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ Nhật"],
        duration: "slow"
    });

    $("#end_coupon").datepicker({
        prevText: "Tháng trước",
        nextText: "Tháng sau",
        dateFormat: "dd/mm/yy",
        dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ Nhật"],
        duration: "slow"
    });
});

$(function(){
    $("#datepicker").datepicker({
        prevText: "Tháng trước",
        nextText: "Tháng sau",
        dateFormat: "yy-dd-mm",
        dayNamesMins: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ Nhật"],
        duration: "slow"
    });

    $("#datepicker2").datepicker({
        prevText: "Tháng trước",
        nextText: "Tháng sau",
        dateFormat: "yy-dd-mm",
        dayNamesMins: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ Nhật"],
        duration: "slow"
    });
});

$(document).ready(function (){

    chart30daysorder();

    var chart = new Morris.Bar({

        element: 'chart',

        lineColors: ['#819C79', '#FC8710', '#FF6541', '#A4ADD3', '#766B56'],

        hideHover: 'auto',
        parseTime: false,


        xkey: 'period',
        ykeys: ['order', 'sales', 'profit', 'quantity'],
        labels: ['đơn hàng', 'doanh số', 'lợi nhuận', 'số lượng']
    });



    function chart30daysorder(){
        var _token = $('input[name="_token"]').val();

        $.ajax({
            url: "admin/dashboard/days-order",
            method: "POST",
            dataType: "json",
            data: {_token:_token},

            success:function (data){
                chart.setData(data);
            }
        });
    }

    $('.dashboard-filter').change(function (){
        var dashboard_value = $(this).val();
        var _token = $('input[name="_token"]').val();

        $.ajax({
            url: "admin/dashboard/dashboard-filter",
            method: "POST",
            dataType: "json",
            data: {dashboard_value:dashboard_value, _token:_token},

            success:function (data){
                chart.setData(data);
            }
        });
    });

    $('#btn-dashboard-filter').click(function (){

        var _token = $('input[name="_token"]').val();

        var from_date = $('#datepicker').val();
        var to_date = $('#datepicker2').val();

        $.ajax({
            url: "admin/dashboard/filter-by-date",
            method: "POST",
            dataType: "json",

            data: {from_date:from_date, to_date:to_date, _token:_token},

            success:function(data){
                chart.setData(data);
            }
        });
    });
});


