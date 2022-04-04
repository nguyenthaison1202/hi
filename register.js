// Gọi Dom thẻ input để validate
let userName = document.getElementById('usr');
let phone = document.getElementById('phone');
let address = document.getElementById('address');
let birth = document.getElementById('birthday');
let idResident_before = document.getElementById('file-before');
let idResident_after = document.getElementById('file-after');
let email = document.getElementById('email');



// Gọi DOM các cái message lỗi
let userName_error = document.querySelector('.userName-error');
let phone_error = document.querySelector('.phone-error');
let address_error = document.querySelector('.address-error');
let birth_error = document.querySelector('.birth-error');
let idResident_before_error = document.querySelector('.idResident-before-error');
let idResident_after_error = document.querySelector('.idResident-after-error');
let email_error = document.querySelector('.email-error');


let btnSignup = document.querySelector('.btn-signup');
//Khi nhấn nút submit sẽ thực hiện validate

btnSignup.addEventListener('click',function Handle(){
    errorMessage();
});

let signUp_form = document.getElementById('signUp_form');
signUp_form.addEventListener('submit',function(e){
    if(!(errorMessage()===true)){
        e.preventDefault();
    }
})



// Hàm hiển thị ra các thông tin lỗi khi nhập
const errorMessage = function(){
    let userNameValue = userName.value;
    let emailValue = email.value;
    let phoneValue = phone.value;
    let addressValue = address.value;
    let idResident_beforeValue = idResident_before.value;
    let idResident_afterValue = idResident_after.value;
  
    if(!(userNameValue.match(/^[a-z0-9]+$/gi))){
        userName_error.innerHTML = 'Tên đăng nhập không có chứa kí tự đặc biệt và không được viết in hoa';
        userName.classList.add('error-input');
        return false;
    }
    else if(userNameValue === ''){
        userName_error.innerHTML = 'Vui lòng điền tên đăng nhập';
        userName.classList.add('error-input');
        return false;
    }
    
    else if(emailValue === ''){
        email_error.innerHTML = 'Vui lòng nhập email của bạn';
        email.classList.add('error-input');
        return false;
    }
    else if(!emailValue.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)){
        email_error.innerHTML = 'Vui lòng nhập email hợp lệ';
        email.classList.add('error-input');
        return false;
    }
    else if(addressValue ===''){
        address_error.innerHTML = 'Vui lòng nhập địa chỉ';
        address.classList.add('error-input');
        return false;
    }
    else if(birth.value ===''){
        birth_error.innerHTML = 'Vui lòng chọn ngày sinh';
        birth.classList.add('error-input');
        return false;
    }
    else if(phoneValue ==='')
    {
        phone_error.innerHTML = 'Vui lòng nhập số điện thoại';
        phone.classList.add('error-input');
        return false;
    }
    else if(phoneValue.length <10 || phoneValue.length >11){
        phone_error.innerHTML = 'Số điện thoại không hợp lệ';
        phone.classList.add('error-input');
        return false;
    }
    else if(idResident_beforeValue === ''){
        idResident_before_error.innerHTML = 'Vui lòng tải ảnh mặt trước CMND của bạn';
        return false;
    }
    else if(idResident_afterValue === ''){
        idResident_after_error.innerHTML = 'Vui lòng tải ảnh mặt sau CMND của bạn';
        return false;
    }
    return true;
};


//Hàm sau khi nhập sẽ xóa thông báo lỗi
const successMessage = function(){
    let userNameValue = userName.value;
    if(userNameValue !== ''){
        userName_error.innerHTML = '';
        if(userName.classList.contains('error-input')){
            userName.classList.remove('error-input');
        }

    }

    let phoneValue = phone.value;
    if(phoneValue.length >0){
        phone_error.innerHTML = '';
        if(phone.classList.contains('error-input')){
            phone.classList.remove('error-input');
        }

    }

    let addressValue = address.value;
    if(addressValue!==''){
        address_error.innerHTML = '';
        if(address.classList.contains('error-input')){
            address.classList.remove('error-input');
        }

    }

    if(birth.value !==''){
        birth_error.innerHTML = '';
        if(birth.classList.contains('error-input')){
            birth.classList.remove('error-input');
        }

    }

    let idResident_beforeValue = idResident_before.value;
    if(idResident_beforeValue !==''){
        idResident_before_error.innerHTML = '';
    }

    let idResident_afterValue = idResident_after.value;
    if(idResident_afterValue !==''){
        idResident_after_error.innerHTML = '';
    }

    let emailValue = email.value;
    if(emailValue !== ''){
        email_error.innerHTML = '';
        if(email.classList.contains('error-input')){
            email.classList.remove('error-input');
        }
    }
};

let MenuItems = document.querySelector(".menuItems");
    MenuItems.style.maxHeight ="0px";
    function Handle()
    {
        if (MenuItems.style.maxHeight == "0px") {
            MenuItems.style.maxHeight = "400px";
        }
        else {
            MenuItems.style.maxHeight = "0px";
        }
}