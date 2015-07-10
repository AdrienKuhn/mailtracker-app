// Media manager
function mediaManager(type, e){

    if(type == 'cover'){ // When we launch Media Manage for choosing cover

        // Show Media Manager
        $('#media-manager').modal('show');

        // When we select an image
        $('#media-manager .modal-body img').click(function(event) {

            // Remove border if an item is already selected
            selected = $("input#cover_id" ).val()
            $("#"+selected).css('border', "solid 2px transparent");

            // Add current item border
            $(this).css('border', "solid 2px red");

            // On "Save" click
            $('#save-media-button').click(function() {
                // Update input
                $("input#cover_id" ).val(event.target.id);
                // Remove click listener on Media Manager items
                $("#media-manager .modal-body img").unbind( "click" );
                // Remove click listen save button
                $("#save-media-button").unbind( "click" );
                // Remove click listener on close button
                $("#close-media-button").unbind( "click" );
                // Remove selected item border
                selected = $("input#cover_id" ).val()
                $("#"+selected).css('border', "solid 2px transparent");
            });

            // On "Close" click
            $('#close-media-button').click(function() {
                // Remove click listener on Media Manager items
                $("#media-manager .modal-body img").unbind( "click" );
                // Remove click listen save button
                $("#save-media-button").unbind( "click" );
                // Remove click listener on close button
                $("#close-media-button").unbind( "click" );
                // Remove selected item border
                selected = $("input#cover_id" ).val()
                $("#"+selected).css('border', "solid 2px transparent");
            });
        });

    }else if(type == 'media'){ // When we launch Media Manage to add Media in content
        var filename,
            cursor,
            selected = e.getSelection(), content = e.getContent();

        // Show Media Manager
        $('#media-manager').modal('show');

        // Select element
        $('#media-manager .modal-body img').click(function(event) {
            // Remove previous selected border
            $(".selected-media").css('border', "solid 2px transparent");
            $(".selected-media").removeClass("selected-media");

            // Add current media border
            $(this).addClass("selected-media");
            $(this).css('border', "solid 2px red");
        });


        $('#save-media-button').click(function() {
            // Get selected element data
            filename = $(".selected-media").data('filename');
            title = $(".selected-media").data('title');
            alt = $(".selected-media").data('alt');
            url = window.location.origin+"/imagecache/cover/";

            // Remove selected element
            $(".selected-media").css('border', "solid 2px transparent");
            $(".selected-media").removeClass("selected-media");

            // Add url to textarea
            markdown_link = '!['+alt+']('+url+filename+' "'+title+'")';
            e.replaceSelection(markdown_link);
            cursor = selected.start;

            // Set the cursor
            e.setSelection(cursor,cursor+url.length);

            // Remove click listener on Media Manager items
            $("#media-manager .modal-body img").unbind( "click" );
            // Remove click listen save button
            $("#save-media-button").unbind( "click" );
            // Remove click listener on Media Manager items
            $("#media-manager .modal-body img").unbind( "click" );
            // Remove click listener on close button
            $("#close-media-button").unbind( "click" );
        });

        // On "Close" click
        $('#close-media-button').click(function() {
            // Remove click listener on Media Manager items
            $("#media-manager .modal-body img").unbind( "click" );
            // Remove click listen save button
            $("#save-media-button").unbind( "click" );
            // Remove click listener on close button
            $("#close-media-button").unbind( "click" );
            // Remove selected item border
            selected = $("input#cover_id" ).val()
            $("#"+selected).css('border', "solid 2px transparent");
        });
    }
}

// Bind choose cover button to Media Manager
$('#choose-cover-button').click(function(e){
    var type = $(this).data('type');
    mediaManager(type, e);
});