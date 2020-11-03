$(document).ready(function () {
    $("#load-more").on("click",function (event) {

        event.preventDefault(); //Ngăn cho thẻ a or button chuyển hướng

        var params = {};

        params.current = $("div.ajax-box").children('div.col-md-3').length;
        params.limit = 8;

        console.log(params);

        $.ajax({
            url:"http://localhost/banhang2/ajax.php",
            data: params,
            type: "POST",
            dataType: "json",
            success: function (data) {
                console.log(data);
                $(".ajax-box").append(data.html);
            },
            error: function (xhr) {
                console.log("Lỗi Ajax")
            },
            complete: function (xhr,status) {
                console.log("Ajax hoàn tất");
            }
        })
    })
});

function Displaynonebutton() {
    document.getElementById("load-more").style.display ="none";
}