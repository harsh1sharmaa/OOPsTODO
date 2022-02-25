$(document).ready(function () {
    $("#upbtn").hide();
    console.log("hello")
    $.ajax({
        method: "GET",
        url: "config.php",
        data: { action: "start" },
        dataType: "JSON"
    }).done(function (data) {
        console.log(data);
        disply(data);
    });
})

$("#adbtn").click(function () {
    let tsk = $("#tsk").val();
    $.ajax({
        method: "GET",
        url: "config.php",
        data: { action: "add", task: tsk },
        dataType: "JSON"
    }).done(function (data) {
        console.log(data);
        disply(data);
    });
    $("#tsk").val("");

})
$("#incompleteTask").on("click", ".delbtn", function (e) {
    e.preventDefault();
    let pid = $(this).data('pid');
    // let price = $(this).data('price');
    console.log("add click" + pid);
    $.ajax({
        method: "GET",
        url: "config.php",
        data: { id: pid, action: "delete" },
        dataType: "JSON"
    }).done(function (data) {
        console.log(data);
        disply(data);

    });

})

$("#incompleteTask").on("click", ".editbtn", function (e) {

    $("#adbtn").hide();
    $("#upbtn").show();
    e.preventDefault();
    console.log("edit click")
    let pid = $(this).data('pid');
    let text = $(this).data('text');
    $("#tsk").val(text);
    $("#id").val(pid);
})

$("#incompleteTask").on("click", ".check", function (e) {
    e.preventDefault();
    let pid = $(this).val();
    // let price = $(this).data('price');
    console.log("add click" + pid);
    $.ajax({
        method: "GET",
        url: "config.php",
        data: { id: pid, action: "check" },
        dataType: "JSON"
    }).done(function (data) {
        console.log(data);
        disply(data);
    });

})

$("#upbtn").click(update);
function update() {

    $("#adbtn").show();
    $("#upbtn").hide();
    let pid = $("#id").val();
    let text = $("#tsk").val();
    console.log("add click" + pid);
    $.ajax({
        method: "GET",
        url: "config.php",
        data: { id: pid, action: "edit", upTask: text },
        dataType: "JSON"
    }).done(function (data) {
        console.log(data);
        disply(data);
    });
    $("#tsk").val("");

}

function disply(data) {
    // $("#alllist").val("hello");
    // var arrItems = [];
    // arrItems = JSON.parse(data);
    console.log("in dis")
    let list = "<ul>";
    let completedList = "<ul>";
    for (let i = 0; i < data.length; i++) {
        let obj = data[i];
        console.log(i);
        if (obj['check'] == "f") {
            list += "<li><input class=check value=" + obj['id'] + " type=checkbox >" + obj['name'] + "<a href=# data-pid=" + obj['id'] + " data-text=" + obj['name'] + " class=editbtn >edit</a><a href=# data-pid=" + obj['id'] + " data-text=" + obj['name'] + "  class=delbtn >delete</a></li>"

        }
        if (obj['check'] == "t") {
            completedList += "<li><input class=check value=" + obj['id'] + " type=checkbox >" + obj['name'] + "<a href=# data-pid=" + obj['id'] + " data-text=" + obj['name'] + " class=editbtn >edit</a><a href=# data-pid=" + obj['id'] + " data-text=" + obj['name'] + "  class=delbtn >delete</a></li>"

        }

    }
    // console.log(list)
    list += "</ul>";
    // console.log(list)
    $("#incompleteTask").html(list);
    $("#completeTask").html(completedList);
    // $("#tskid").val("");
}