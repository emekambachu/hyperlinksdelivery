//Ajax Scripts

//Update Applicant Limit
$(document).ready(function(e){
    $("#form_limit").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'ajax/ajax_update_limit.php',
            data: new FormData(this),
            dataType: "html",
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submit').attr("disabled","disabled");
                $('#form_limit').css("opacity",".5");
            },

            //success after submission
            success: function(status){
                $('#status_limit').html(status)

                //quick transparency after submission
                $('#form_limit').css("opacity","");

                //clear all fields after submission
                $(".submit").removeAttr("disabled");
            }
        });
    });
});


// load all ajax functions
function loadFunctions() {
    setInterval(function(){

        ajax_display_applicants();
        ajax_display_application_limit();
        ajax_display_todayviews();
        ajax_display_totalviews();
        ajax_display_applicants_row();

    }, 1000);

}

//load functions on page load
window.onload = loadFunctions;


// Ajax Display applicants
function ajax_display_applicants(){
    var req = new XMLHttpRequest();
    req.onreadystatechange = function(){

        if(req.readyState == 4 && req.status == 200){
            document.getElementById('applicants').innerHTML = req.responseText;
        }
    };

    req.open('GET', 'ajax/ajax_display_applicants.php', true);
    req.send();
}

// Ajax Display today views
function ajax_display_todayviews(){
    var req = new XMLHttpRequest();
    req.onreadystatechange = function(){

        if(req.readyState == 4 && req.status == 200){
            document.getElementById('todayviews').innerHTML = req.responseText;
        }
    };

    req.open('GET', 'ajax/ajax_display_todayviews.php', true);
    req.send();
}

// Ajax Display total views
function ajax_display_totalviews(){
    var req = new XMLHttpRequest();
    req.onreadystatechange = function(){

        if(req.readyState == 4 && req.status == 200){
            document.getElementById('totalviews').innerHTML = req.responseText;
        }
    };

    req.open('GET', 'ajax/ajax_display_totalviews.php', true);
    req.send();
}

// Ajax Display applicants row
function ajax_display_applicants_row(){
    var req = new XMLHttpRequest();
    req.onreadystatechange = function(){

        if(req.readyState == 4 && req.status == 200){
            document.getElementById('applicants_row').innerHTML = req.responseText;
        }
    };

    req.open('GET', 'ajax/ajax_display_applicants_row.php', true);
    req.send();
}

// Ajax Display limit
function ajax_display_application_limit(){
    var req = new XMLHttpRequest();
    req.onreadystatechange = function(){

        if(req.readyState == 4 && req.status == 200){
            document.getElementById('application_limit').innerHTML = req.responseText;
        }
    };

    req.open('GET', 'ajax/ajax_display_application_limit.php', true);
    req.send();
}