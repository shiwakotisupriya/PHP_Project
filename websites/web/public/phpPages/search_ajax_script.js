$(document).ready(function() {
    $('#searchForm').submit(function(e) {
        e.preventDefault(); 

        var customerName = $('#customerName').val();

        $.ajax({
            type: 'POST',
            url: 'search_result.php', 
            data: { customerName: customerName },
            success: function(data) {
                $('#searchResults').html(data);
            }
        });
    });
});
