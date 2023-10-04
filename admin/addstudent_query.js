const form = document.getElementById('form');
form.addEventListener('submit', function (e) {
    e.preventDefault();
    formSubmit();
    form.reset();
})

function formSubmit() {
    let formData = new FormData(form);
    $.ajax({
        url: 'addstudent.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (res) {
            alert("Submitted Successfully");

        }
    })
}