$(document).ready(function(){
    paypal.button.render({
        env: 'sandbox',

        style: {
            label: 'Paypal',
            size: 'medium',
            shape: 'rect',
            color: 'blue',
            tagline: false
        },
        client:{
        sandbox: 'EAcuTZo1gD3osmC6XoWoG5z60wYkhLu-wMUbpTgtBwsjlhkevVKJV9qaPZNYKKYSa2QzD8Uj2nFh_9x1',
        production: 'AZDzDdp-ohTWJinSE8ZZMjq5smGqScKjFsAsgOXD4qGBgoybkG4XMnS3g1lZWSZVd46VhI3DwkumCXnE'
        },
        commit: true,
        payment: function (data, actions){
            return actions.payment.create({
                payment: {
                    transactions: [
                        {
                        amount: {total: '200', currency: 'USD'}
                        }
                    ]
                }
            });
        },
//onAuthorize() is called when the buyer approves the request
        onAuthorize: function(data, actions){
            //make a call to the rest api to execute the payment
            return actions.payment.execute().then(function (payment){
                var path = "http://localhost/chelsea/payment";
                $.ajax({
                    type: 'POST',
                    url: path,
                    data: {
                        tid: payment.id,
                        state: payment.state
                    },
                    success: function (response){
                        console.log(response);

                            if(response == "success"){
                                $('#payment-success').html('<h2>Payment done, Thanks, please wait...')
                                setTimeout(function(){
                                    window.location.href = "http://localhost/chelsea/";
                                }, 2500);
                            }
                    }

                });
            });
        }
    }, '#btn-paypal');
});