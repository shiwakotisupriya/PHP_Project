<h4 class="name">Welcome User:<?=$pass?></h4>
<img src="../images/customer.jpg"class="img" alt="Image">
<h2 class="customer">Welcome to Customer Service, where exceptional customer service is not just a commitment 
    but a way of life. Founded on the belief that every customer deserves unparalleled support,
     we have dedicated ourselves to setting the gold standard in the realm of customer care.

At Customer Service, we understand that each interaction with a customer is an opportunity 
to exceed expectations. Our team of highly trained professionals is passionate about providing
 not just solutions, but memorable experiences. With years of collective expertise, we pride 
 ourselves on being the reliable ally that businesses and individuals can depend on.

What sets us apart is our unwavering commitment to responsiveness and accessibility. 
We believe that great customer service should be seamless, 
whether you're reaching out to us through a traditional phone call, email, or 
the latest digital channels. Our 24/7 availability ensures that support is just a 
click or call away whenever you need it.

We don't just solve problems; we anticipate needs and strive to create proactive solutions
 that enhance your overall experience. Your satisfaction is our priority, and we take pride 
 in going above and beyond to ensure you feel valued and heard.

At Customer Service, we don't see ourselves just as a 
customer service company; we see ourselves as your dedicated partner in success.
 Our journey is intertwined with the satisfaction and success of our clients, and we
  look forward to the opportunity to serve you with excellence. Welcome to a world where 
  customer service isn't just a department-it's a passion. 

We have been providing our service from five years.</h2>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $.ajax({
            url: 'dashboard.php', 
            type: 'GET',
            success: function (response) {
                var userDetails = JSON.parse(response);
                $('#user-name').text('Welcome, ' + userDetails.name + '!');
            },
            error: function () {
                console.log('Error fetching user details via AJAX');
            }
        });
    });
</script>






