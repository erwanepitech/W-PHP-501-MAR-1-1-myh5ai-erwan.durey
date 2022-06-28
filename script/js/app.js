$(".close").children(".folder_content").css("display", "none")
$(".open").children(".folder_content").css("display", "block")

$("span#folder").click(function () {
    if ($(this).parent().attr('class') == "close") {
        $(this).parent().attr('class', "open")
        $(this).children().children('img#rotate').attr('class', 'rotate')
        $(this).parent().children(".folder_content").toggle("fast")
        // $(this).parent().children(".folder_content").toggle(function() {
        //     $(this).parent().children(".folder_content").animate({width:"280px"})
        // })
    } else {
        $(this).parent().attr('class', "close")
        $(this).children().children('img#rotate').removeClass('rotate')
        $(this).parent().children(".folder_content").toggle("fast")

    }
})

$("span.files").click(function () {
    var value = $(this).attr("id")
    var seize = $(this).parent("div.files").children("span#size").html()
    var date = $(this).parent("div.files").children("span#date").html()
    var array = value.split("/")
    var str = (array.length) - 1

    $.ajax({
        url: "files.php",
        data: "files=" + value,
        success: function (data) {
            if (array[str].substr(-4) == ".png") {
                $("#content").html(data)
                $('#modal_files').modal('show')
            } else if (array[str].substr(-4) == ".pdf") {
                $("#content").html(data)
                $('#modal_files').modal('show')
            } else {
                $("#file_name").text(array[str])
                $("pre#content").html('<code id="content"></code>')
                $("code#content").text(data)
                hljs.highlightAll()
                $("#file_size").html("taille : " + seize)
                $("#file_path").html("path : " + value)
                $("#file_date").html("dernière modif : " + date)
                $('#modal_files').modal('show')
            }
        },
        dataType: "text"
    });

})

// $("span.folder").click(function () {
//     var value = $(this).attr("id")
//     $.ajax({
//         url: "folder.php",
//         data: "folder=" + value,
//         success: function (data) {
//             console.log(data)
//             $("div#folder-content").html(data)
//             // $("#file_name").text(array[str])
//             // $("pre#content").html('<code id="content"></code>')
//             // $("code#content").text(data)
//             // hljs.highlightAll()
//             // $("#file_size").html("taille : " + seize)
//             // $("#file_path").html("path : " + value)
//             // $("#file_date").html("dernière modif : " + date)
//             // $('#modal_files').modal('show')
//         },
//         dataType: "text"
//     });
// })

$("button#close").click(function () {
    $('#modal_files').modal('hide')
})