$(document).ready(function(){
    $('#sort_category_quizzes').change(function(){
        var selected_val = $(this).val();
        if(selected_val)
        {
            if(window.location.href.indexOf("?sort=") > -1){
                var url = window.location.href;
                var q_url = url.indexOf("?");
                var url_str =  url.substring(q_url);
                var f_url = url.replace(url_str,'?sort='+selected_val);
                window.location.href = f_url;
            }else{
                
                var url = window.location.href;
                var url = url+'?sort='+selected_val;
                window.location.href = url;
            }
        }else{
            $("#flash-message").find('.message').text("Something went wrong");
                $("#flash-message").show();
                setTimeout(function() {
                $("#flash-message").hide();
            }, 3000);
        }
    });
});
