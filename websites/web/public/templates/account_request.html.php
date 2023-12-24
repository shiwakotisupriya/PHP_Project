<h3 class="request"><?=$pass?></h3>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function(){
        $(".btn_click").click(function(){
            var customerId = $(this).data('customer-id');
            verifyCustomer(customerId);
        });

        $(".btn_clickk").click(function(){
            var customerId = $(this).data('customer-id');
            declineCustomer(customerId);
        });

        function verifyCustomer(customerId) {
            $.ajax({
                type: "POST",
                url: "verify_customer.php", 
                data: { customer_id: customerId },
                success: function(response) {
                    alert(response); 
                    window.location.reload();
                }
            });
        }

        function declineCustomer(customerId) {
            $.ajax({
                type: "POST",
                url: "decline_customer.php", 
                data: { customer_id: customerId },
                success: function(response) {
                    alert(response); 
                    window.location.reload();
                }
            });
        }
    });
</script>


