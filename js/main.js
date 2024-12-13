document.addEventListener("DOMContentLoaded", () => {
    $('.slider').slick({
        dots: true,
        appendDots: $('.main-services'),
        infinite: false,
        dotsClass: 'dots',
        arrows: true
    })
    App.init()
})

const App = {
    buttons : document.querySelectorAll('.open-modal'),
    modal:  document.querySelector('.modal'),
    close : document.querySelector('.close'),
    modalForm : document.querySelector('.modal-form'),
    bottomForm : document.querySelector('.bottom-form'),
    modalHandler(){
        this.buttons.forEach(button => {
            button.addEventListener('click', (event) => {
                event.preventDefault()
                this.modal.classList.add('active-modal')
            })
        })
        this.close.addEventListener('click', () => this.modal.classList.remove('active-modal'))
    },
    formHandler(form){
        const userName = form.querySelector('[name="user-name"]');
        const phoneNumber = form.querySelector('[name="user-phone"]');
        form.addEventListener('submit', (event) => {
            event.preventDefault()
            if(!userName.value || !phoneNumber.value){
                alert('Пожалуйста, заполните все поля');
                return;
            }
            if (userName.value.trim().length === 0 || phoneNumber.value.trim() === 0){
                alert('Пожалуйста, заполните все поля');
                return;
            }
            form.submit()
        })
    },
    init(){
        this.modalHandler()
        this.formHandler(this.modalForm)
        this.modalHandler(this.bottomForm)
    }
}

