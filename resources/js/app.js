import './bootstrap';


let input = document.querySelector('.search')
let btn = document.querySelector('#button-addon2')

input.addEventListener('input', function(e){
    let value = this.value

    if (value.length === 0) {
        btn.setAttribute('disabled', true)
    }else{
        btn.removeAttribute('disabled')
    }
})