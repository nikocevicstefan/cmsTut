function toggleCheckboxes(source) {
    var checkboxes = document.getElementsByClassName('checkboxes');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}