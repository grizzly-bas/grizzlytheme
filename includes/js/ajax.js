jQuery(document).ready(function () {

    jQuery(".search-button").click(function (e) {
        e.preventDefault();
        post_id = jQuery(this).attr("data-post_id");
        nonce = jQuery(this).attr("data-nonce");
        term = jQuery( '.search-input' ).val();

        jQuery.ajax({
            type: "post",
            dataType: "json",
            url: myAjax.ajaxurl,
            data: {
                action: "my_user_vote",
                post_id: post_id,
                nonce: nonce,
                term: term
            },
            success: function (response) {
                if (response.type == "success") {
                    jQuery(".ajax-result").html(response.vote_count)
                } else {
                    alert("Your vote could not be added")
                }
            }
        })
    })
})