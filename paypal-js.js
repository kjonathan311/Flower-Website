paypal.Buttons({
    style:{
        color:'blue',
        shape:'pill'
    },
    createOrder:function(data,actions){
        return actions.order.create({
            purchase_units:[{
                amount:{
                    value:document.getElementById("total").value
                }
            }]
        });
    },
    onApprove:function(data,actions){
        return actions.order.capture().then(function(details){
            window.location.replace("success.php");
        })
    },
    onCancel:function(data){
        window.location.replace("cancel.php");
    }
}).render('#paypal-payment-button');