function admin_login(){
    user = document.querySelector('#validationCustomUsername').value;
    pass = document.querySelector('#form123').value;
    if(user == 'admin@auctionzone.com' && pass == 'pass123'){
        window.open('admin_home.php', '_self');
    }else{
        alert('Wrong Inputs.....!');
    }
}