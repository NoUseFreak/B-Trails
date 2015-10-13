$(function() {
    $('div[data-gpx-location]').each(function() {
        var mapOptions = {
            zoom: 8,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map($(this).get(0), mapOptions);
        loadGPXFileIntoGoogleMap(map, $(this).data('gpx-location'));
    });

    function loadGPXFileIntoGoogleMap(map, filename) {
        jQuery.ajax({url: filename,
            dataType: "xml",
            success: function(data) {
                var parser = new GPXParser(data, map);
                parser.setTrackColour("#ff0000");     // Set the track line colour
                parser.setTrackWidth(4);          // Set the track line width
                parser.setMinTrackPointDelta(0.001);      // Set the minimum distance between track points
                parser.centerAndZoom(data);
                parser.addTrackpointsToMap();         // Add the trackpoints
                parser.addWaypointsToMap();           // Add the waypoints
            }
        });
    }
});