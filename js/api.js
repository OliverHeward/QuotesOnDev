/* eslint-disable no-unused-vars */
/* eslint-disable camelcase */
(function($) {

    /* Ajax-based random post fetching. */
    $(function() {
        $('#new-quote-button').on('click', function(event) {
            event.preventDefault();

            // fetch a new quote
            // get the first and only post array
            // update the quote content and name of the quoted person
            // display quote source if available 
            $.ajax({
                method: 'GET',
                url: api_vars.root_url +
                    'wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=1',
                cache: false
            }).done(function(data) {
                const post = data.shift(),
                    title = post.title.rendered,
                    content = post.content.rendered,
                    quoteSource = post._qod_quote_source,
                    quoteSourceUrl = post._qod_quote_source_url;
                $('.entry-title').text(title);
                $('.entry-content').html(content);
                $('.source').html('<a href="' + quoteSourceUrl + '">' + quoteSource + '</a>');
                $('#tweetlink').attr('href', "http://twitter.com/intent/tweet?url=" + quoteSourceUrl + "&via=quotesondev&text=" + content).unwrap(content); 

                // update the URL using history
                let url = 'http://localhost:8888/quotesondev/' + post.slug;
                // history.pushState(null, null, url)
                console.log(post)
                // Make the back and forward nav work with the history API
                // window.addEventListener('popstate', function(event) {
                // let LastPage = document.URL;
                // window.location.replace(LastPage);
                // })
            })
        })
    });
    /* Ajax-based front-end post submissions */
    $(function() {
        $('#submitQuote').on('submit', function(event) {
            event.preventDefault();
            // Event on submit of the form
            const data = {
                title: $('#update-title').val(),
                content: $('#quote').val(),
                _qod_quote_source: $('#quote-where').val(),
                _qod_quote_source_url: $('#quote-url').val(),
                post_status: 'pending'
            }

            $.ajax({
                method: 'POST',
                url: api_vars.root_url + 'wp/v2/posts',
                data,
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('X-WP-Nonce', api_vars.nonce);
                    //get the code to add a nonce from the documentation,
                }

            }).done(function(data, statusText, xhr) {
                $('#submitQuote')
                    .slideUp()
                    .find('input[type=“submit”], input[type=“text”], textarea')
                    .val('');

                var status = xhr.status;
                if (status === 200) {
                    $('.submit-success').text(api_vars.success)
                }
                // clear the form fields and hide the form
                //Use jquery so hide the form in a slidey way

                //show success message using the var from functions.php


            }).fail(function() {
                $('#submitQuote').slideUp()
                $('.submit-failure').text(api_vars.failure);
                //Post and alert with failure var from function.php
            })
        })

    });

})(jQuery);