let base_url = 'http://localhost/CarForest/';

function delete_record(action, id) {
    let url = base_url + 'delete/' + action + '/' + id;
    $('#delete_link').attr('href', url);
}

//set dropdown
function set_combo(action, id) {
    let data = {id: id};
    let url = base_url + 'backend/' + action;

    $("#" + action).html('<option>Loading..</option>');
    setTimeout(function () {
        $.post(url, data, function (output) {
            $("#" + action).html(output);
        });
    }, 1000);
}

//change status
function change_status(action, id) {

    if ($("#status_" + id + " i").hasClass('fa-toggle-on')) {
        $("#status_" + id + " i")
                .removeClass('fa-toggle-on')
                .addClass('fa-toggle-off')
                .css('color', '');
    } else {
        $("#status_" + id + " i")
                .removeClass('fa-toggle-off')
                .addClass('fa-toggle-on')
                .css('color', '');
    }

    let url = base_url + 'backend/change_status/';
    let data = {action: action, id: id};

    $.post(url, data);
}

function change_test_drive_status(test_drive_id, status) {
    
    let data = {id: test_drive_id, status: status};
    let url = base_url + 'backend/test_drive_status';

    $.post(url, data , function(output){
//        alert(output);
          $("#test_data").html(output);  
    });
}

(function () {

    /*------------------------------------
     1. password hide/show code
     -------------------------------------*/
    document.getElementById('eye').addEventListener('click', function () {
        let type = document.getElementById('box').getAttribute('type');

        if (type == "password")
        {
            document.getElementById('box').type = 'text';
            document.getElementById('eye').className = 'mdi mdi-eye-off-outline';
        } else
        {
            document.getElementById('box').type = 'password';
            document.getElementById('eye').className = 'mdi mdi-eye-outline';
        }
    });

    /*------------------------------------
     2. password hide/show code
     -------------------------------------*/
    document.getElementById('eye1').addEventListener('click', function () {
        let type = document.getElementById('box1').getAttribute('type');

        if (type == "password")
        {
            document.getElementById('box1').type = 'text';
            document.getElementById('eye1').className = 'mdi mdi-eye-off-outline';
        } else
        {
            document.getElementById('box1').type = 'password';
            document.getElementById('eye1').className = 'mdi mdi-eye-outline';
        }
    });
    /*------------------------------------
     3. password hide/show code
     -------------------------------------*/
    document.getElementById('eye2').addEventListener('click', function () {
        let type = document.getElementById('box2').getAttribute('type');

        if (type == "password")
        {
            document.getElementById('box2').type = 'text';
            document.getElementById('eye2').className = 'mdi mdi-eye-off-outline';
        } else
        {
            document.getElementById('box2').type = 'password';
            document.getElementById('eye2').className = 'mdi mdi-eye-outline';
        }
    });

})(jQuery);
