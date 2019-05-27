$(document).ready(function () {

    $('#selectAllBoxes').on('click', function () {
        if (this.checked) {
            $('.checkboxes').each(function () {
                this.checked = true;
            });
        } else {
            $('.checkboxes').each(function () {
                this.checked = false;
            });
        }
    });
});
