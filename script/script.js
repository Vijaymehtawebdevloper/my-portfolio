
$(document).ready(function(){
    
    $("#user").submit(function(e){
        e.preventDefault();
        $('#card').hide();
        let name = $('#name').val();
        let phoneNumber = $('#phonenumber').val();
        let email = $('#email').val();
        let massage = $('#massage').val();

        if(name ==""){
            $('#user').prepend("<div class='card mb-2 py-2 p-2 bg-danger text-light' id = 'card'>Name fiels is empty</div>");
        }else if(phoneNumber == ""){
            $('#user').prepend("<div class='card mb-2 py-2 p-2 bg-danger text-light' id = 'card'>Phone number fiels is empty</div>");
        }else if(email == ""){
            $('#user').prepend("<div class='card mb-2 py-2 p-2 bg-danger text-light' id = 'card'>Email fiels is empty</div>");
        }else if(massage == ""){
            $('#user').prepend("<div class='card mb-2 py-2 p-2 bg-danger text-light' id = 'card'>Massage fiels is empty</div>");
        }else{
            let fd = new FormData();
            fd.append('name', name);
            fd.append('phoneNumber', phoneNumber);
            fd.append('email', email);
            fd.append('massage', massage);
            fd.append('user', 1);

            $.ajax({
                url : "user.php",
                type : "POST",
                cache : false,
                processData : false,
                contentType : false,
                data : fd,
                dataType : "json",

                success:function(response){
                    $("#card").hide();
                    let res = response;
                    if(res.hasOwnProperty("success")){
                        $('#user').prepend("<div class ='card mb-2 py-2 p-2 bg-success text-light' id = 'card'>Send information</div>");
                        setTimeout(function(){
                            $("#card").hide();
                            location.reload();
                    }, 1000)
                    }else if(res.hasOwnProperty("error")){
                        $("#service-section").prepend("<div class = 'card mb-2 py-2 p-2 bg-danger text-light' id = 'card'> Here some error" +res.response +  "</div>");
                    }
                }
            })
        }
    })

})


let nav = document.querySelector(".navbar");
window.onscroll = function(){
    if(document.documentElement.scrollTop > 20){
        nav.classList.add("header-scrolled");
    }else{
        nav.classList.remove("header-scrolled");
    }
}
// console.log("vijay")

let navBar = document.querySelectorAll(".nav-link");
let navCollapse = document.querySelector(".navbar-collapse.collapse");
navBar.forEach(function(a){
    a.addEventListener("click",function(){
        navCollapse.classList.remove("show");
    })
})

// typing

const TypeWriter = function(textElement, words, wait=1000){
    this.textElement = textElement;
    this.words = words;
    this.txt = '';
    this.wordsIndex = 0;
    this.wait = parseInt(wait, 10);
    this.type();
    this.isDeleting = false;
}

// type mothod
TypeWriter.prototype.type = function(){
    // cutentIndex of words
    const current = this.wordsIndex % this.words.length;
    // full text of corrent words
    const fullText = this.words[current];


    // console.log(fullText)
    if(this.isDeleting){
        this.txt = fullText.substring(0, this.txt.length - 1)
    }else{
        this.txt = fullText.substring(0, this.txt.length + 1)
    }

    this.textElement.innerHTML = `<span class = 'txt'>${this.txt}</span>`;

    // type speed
    let typeSpeed = 200;
    if(this.isDeleting){
        typeSpeed /= 2;
    }

    // is words is compleate
    if(!this.isDeleting && this.txt==fullText){
        typeSpeed = this.wait;
        // Set delete to true
        this.isDeleting = true;
    }else if(this.isDeleting && this.txt === ''){
        this.isDeleting = false;
        this.wordsIndex++;
        // pause before typing
        typeSpeed = 100;
    }

    setTimeout(() =>this.type(), typeSpeed)
}

// Init on Dom load
document.addEventListener("DOMContentLoaded",init);

// init app

function init(){
    const textElement = document.querySelector(".maintitle");
    const words = JSON.parse(textElement.getAttribute("data-words"));
    const wait = textElement.getAttribute("data-wait");

    // Init Typer writer

    new TypeWriter(textElement, words, wait);
}

 