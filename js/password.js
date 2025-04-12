let base_url = 'http://localhost/CarForest/';

// set dropdown
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

//add favourite car
function add_fav(cid) {
    let data = {cid: cid};
    let url = base_url + 'backend/add_fav/';

    $.post(url, data, function (output) {
        if (output == 1) {
            let surl = base_url + 'member-my-favourite-car';
            $("#fav-"+cid).html('<a href="'+surl+'" id="fav-'+cid+'" class="btn m-btn m-infoBtn">ADDED IN LIST<span class="fa fa-angle-right"></span></a>');
        }
    });
}

// change package
function change_package(pid) {
    let data = {pid: pid};
    let url = base_url + 'backend/change_package/';

    $.post(url, data , function (output) {
        //alert(output);
        $("#package_data").html(output);
    });
}

// add review
function add_review(pid){
    $rate = $("#rate-value").val();
    $msg = $("#review-msg").val();
    
    if( $rate > 0 && $msg != "" ){
        let url = base_url + 'backend/add_review';
        let data = {pid:pid , msg:$msg , rate:$rate };
        $.post(url, data, function (output) {
            if( output == 1 ){
                $("#review-output").html("<span style='color:green;'>Thank You For Giving Review To This Car.</span>");
                    $msg = $("#review-msg").val('');
            }else{
                $("#review-output").html("<span style='color:red;'>You Already Add Review to This Car.</span>")
            }
        });
    }
    else{
        $("#review-output").html("<span style='color:red;'>Please Enter Rate and Review.</span>")
    }
}

// find car
function find_car(){
    let type = $("#type").val();
    let company = $("#company").val();
    let model = $("#model").val();
    let submodel = $("#submodel").val();
    
//    alert( type + " - " + company + " - " + model + " - " + submodel );

    if( type === "" && company === "" && model === "" && submodel === "" ){
        $("#error").html("Please Select Atleast One Type to Find Car.");
    }
    else{
        
        let search_type = "";
        let search_id = "";
        
        if( type !== "" && company === "" && model === "" && submodel === "" ){
            search_type = "type";
            search_id = type;
        }
        else if( type !== "" && company !== "" && model === "" && submodel === "" ){
            search_type = "company";
            search_id = company;
        }
        else if( type !== "" && company !== "" && model !== "" && submodel === "" ){
            search_type = "model";
            search_id = model;
        }
        else if( type !== "" && company !== "" && model !== "" && submodel !== "" ){
            search_type = "submodel";
            search_id = submodel;
        }
        
        //  alert( search_type + " - " + search_id );
        
        let url = base_url + "car-list/" + search_type + "/" + search_id;
        window.location.href = url;
    }
}

// car filter
function cardata(type , id , limit) {
//    alert();
    let filter_data = $("#filter-data").serializeArray();
    let data = {type:type, id:id, limit:limit,filter_data:filter_data};
    let url = base_url + 'backend/cardata/';

    $.post(url, data, function (output) {
        $("#cardata").html(output);
    });
}

// Password Hide/Show
document.getElementById('password').addEventListener('click', function () {
    let c_type = document.getElementById('carmela-login-password').getAttribute('type');

    if (c_type === "password") {
        document.getElementById('carmela-login-password').type = 'text';
        document.getElementById('password').className = 'fa-solid fa-eye-slash eye_icon_2';
    } else {
        document.getElementById('carmela-login-password').type = 'password';
        document.getElementById('password').className = 'fa-solid fa-eye eye_icon_2';
    }
});

document.getElementById('password').addEventListener('click', function () {
    let c_type = document.getElementById('user-login-password').getAttribute('type');

    if (c_type === "password") {
        document.getElementById('user-login-password').type = 'text';
        document.getElementById('password').className = 'fa-solid fa-eye-slash eye_icon_3';
    } else {
        document.getElementById('user-login-password').type = 'password';
        document.getElementById('password').className = 'fa-solid fa-eye eye_icon_3';
    }
});

document.getElementById('password').addEventListener('click', function () {
    let c_type = document.getElementById('user-password').getAttribute('type');

    if (c_type === "password") {
        document.getElementById('user-password').type = 'text';
        document.getElementById('password').className = 'fa-solid fa-eye-slash eye_icon';
    } else {
        document.getElementById('user-password').type = 'password';
        document.getElementById('password').className = 'fa-solid fa-eye eye_icon';
    }
});

document.getElementById('c_password').addEventListener('click', function () {
    let c_type = document.getElementById('user-c_password').getAttribute('type');

    if (c_type === "password") {
        document.getElementById('user-c_password').type = 'text';
        document.getElementById('c_password').className = 'fa-solid fa-eye-slash eye_icon';
    } else {
        document.getElementById('user-c_password').type = 'password';
        document.getElementById('c_password').className = 'fa-solid fa-eye eye_icon';
    }
});

document.getElementById('password').addEventListener('click', function () {
    let c_type = document.getElementById('carmela-password').getAttribute('type');

    if (c_type === "password") {
        document.getElementById('carmela-password').type = 'text';
        document.getElementById('password').className = 'fa-solid fa-eye-slash eye_icon_1';
    } else {
        document.getElementById('carmela-password').type = 'password';
        document.getElementById('password').className = 'fa-solid fa-eye eye_icon_1';
    }
});

document.getElementById('c_password').addEventListener('click', function () {
    let c_type = document.getElementById('carmela-c_password').getAttribute('type');

    if (c_type === "password") {
        document.getElementById('carmela-c_password').type = 'text';
        document.getElementById('c_password').className = 'fa-solid fa-eye-slash eye_icon_1';
    } else {
        document.getElementById('carmela-c_password').type = 'password';
        document.getElementById('c_password').className = 'fa-solid fa-eye eye_icon_1';
    }
});

