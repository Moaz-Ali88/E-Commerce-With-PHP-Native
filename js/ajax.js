var form = document.querySelector('.leave-comment');


form.onsubmit = function(event){
    event.preventDefault();

    var username = document.querySelector('.name').value;
    var email = document.querySelector('.email').value;
    var phone = document.querySelector('.phone').value;
    var message = document.querySelector('.message').value;

    // get input value
    let data = {
        username , email , phone , message
    }

    $.post('functions/add_message.php' , data , (res)=>{
        handleRes(res , this)
    })
}


function handleRes(res , form){
    resMess.classList.add('alert');
    resMess.classList.add('alert-success');
    resMess.innerHTML = res ;

    setTimeout(()=> {
        form.reset();
    } , 1400)
}