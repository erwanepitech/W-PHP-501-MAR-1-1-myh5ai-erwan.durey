$(".close").children(".files").css("display", "none")
$(".open").children(".files").css("display", "block")
$("span#folder").click(function () {
    if ($(this).parent().attr('class') == "close") {
        $(this).parent().attr('class', "open")
        $(this).children().children('img#rotate').attr('class', 'rotate')
        $(this).parent().children(".files").toggle("fast")
    } else {
        $(this).parent().attr('class', "close")
        // $('img#rotate').removeClass("rotate")
        $(this).children().children('img#rotate').removeClass('rotate')
        $(this).parent().children(".files").toggle("fast")
    }
})

$("#search").click(function () {
    var value = $("#path").val()
    // console.log(value);
    $.ajax({
        url: "script.php",
        data: "path=" + value,
        success: function (data) {
            window.location.href = "http://localhost:8080/h5ai.php?path=" + value
            console.log(data);
        },
        dataType: "text"
    });
})

$("span.files").click(function () {
    var value = $(this).attr("id")
    var seize = $(this).parent("div.files").children("span#size").html()
    var date = $(this).parent("div.files").children("span#date").html()
    var array = value.split("/")
    var str = (array.length) - 1
    console.log(seize)
    if (array[str].substr(-4) == ".png") {
        $("#content").html('<img src="file://' + value + '">')
        $('#modal_files').modal('show')
    } else {
        $.ajax({
            url: "files.php",
            data: "files=" + value,
            success: function (data) {
                $("#file_name").text(array[str])
                $("#content").text(data)
                $("#file_size").html("taille : " + seize)
                $("#file_path").html("path : " + value)
                $("#file_date").html("derniere modif : " + date)
                $('#modal_files').modal('show')
                // console.log(data);
            },
            dataType: "text"
        });
    }

})

$("button#close").click(function () {
    $('#modal_files').modal('hide')
})