/* eslint-disable no-unused-vars */
/* eslint-disable camelcase */
(function($) {

    /* Ajax-Based Random Quote Fetch */
    $(function() {
        $('#new-quote-button').on('click', function(event) {
            event.preventDefault();

            // Fetch a New Quote
            // Get the First and Only Array
            // Update the Quote Content and Name of the Quote Author
            // Display Quote Source if Avaliable
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
                $('.entry-title').text(' - ' + title);
                $('.entry-content').html(content);
                $('.source').html('<a href="' + quoteSourceUrl + '">' + quoteSource + '</a>');

                // Entry-Content saved into Variable with encoeURIcomponent passed through it
                const encodedUrl = encodeURIComponent($('.entry-content').text());

                // On each Quote load - the Retweet button is given the Source URL and the Content Automatically
                $('#tweetlink').attr('href', "http://twitter.com/intent/tweet?url=" + quoteSourceUrl + "&via=quotesondev&text=" + encodedUrl);




                // Update the URL using History
                let url = 'http://localhost:8888/quotesondev/' + post.slug;
                history.pushState(null, null, url)

                // Make the Back and Forward Nav Work With the History API
                window.addEventListener('popstate', function(event) {
                    let LastPage = document.URL;
                    window.location.replace(LastPage);
                })
            })
        })
    });
    /* AJAX - Based Front-End Post Submissions */
    $(function() {
        $('#submitQuote').on('submit', function(event) {
            event.preventDefault();
            // Event on Submit Form
            // Saving Data from Title, Quote, Quote Source and Quote URL
            // Setting Post Status to 'Pending'
            const data = {
                title: $('#update-title').val(),
                content: $('#quote').val(),
                _qod_quote_source: $('#quote-where').val(),
                _qod_quote_source_url: $('#quote-url').val(),
                post_status: 'pending'
            }
            // AJAX POST Data Request
            $.ajax({
                method: 'POST',
                url: api_vars.root_url + 'wp/v2/posts',
                data,
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('X-WP-Nonce', api_vars.nonce);
                    // Get The Code to Add a Nonce from the Documentation
                }
                // Done Function
            }).done(function(data, statusText, xhr) {
                $('#submitQuote')
                    .slideUp()
                    .find('input[type=“submit”], input[type=“text”], textarea')
                    .val('');
                // On Success - Clear and Hide the Form
                var status = xhr.status;
                if (status === 201) {
                    $('.submit-success').text(api_vars.success);
                }
                // On Success - Show Success Message set using the var from Functions.php 

                // Fail Function
            }).fail(function() {
                $('#submitQuote').slideUp()
                $('.submit-failure').text(api_vars.failure);
                // On Failure - Show Failure Message set using the var from Functions.php
            })
        })

    });

})(jQuery);