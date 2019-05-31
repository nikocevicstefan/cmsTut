function toggleCheckboxes(source) {
    var checkboxes = document.getElementsByClassName('checkboxes');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}

$(document).ready(function () {
    var div_box = "<div id='load-screen'> <div id='loading'></div> </div>";
    $("body").prepend(div_box);

    $('#load-screen').delay(700).fadeOut(600, function () {
        $(this).remove();
    })
});
