function validateAmount(amount, product_id){
    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : $('meta[name=csrf_token]').attr('content')
        }
    });
    
    $.ajax({
        url : '/product_details/validateAmount',
        data : {
            'qty' : amount,
            'pid' : product_id
        },
        async : false,
        type : 'POST'
    }).done(function(data){

    })
}