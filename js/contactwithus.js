function CreateContactWindow(){
    var Parent = document.getElementById('headlogin');
    var mainwindow = document.createElement('div');
    var hidebutton = document.createElement('div');
    var sendbutton = document.createElement('button');
    var Namefield = document.createElement('input');
    var Emaildfield = document.createElement('input');
    var Phonefield = document.createElement('input');
    var TextField = document.createElement('textarea');
    var form = document.createElement('form')
    
    hidebutton.id = 'hidelogin';
    hidebutton.className = 'remove';
    
    
    Namefield.setAttribute("placeholder", "ИМЯ");
    Namefield.setAttribute("class", "input");
    Emaildfield.setAttribute("placeholder", "E-MAIL");
    Emaildfield.setAttribute("class", "input");
    Phonefield.setAttribute("placeholder", "Телефон");
    Phonefield.setAttribute("class", "input");
    TextField.setAttribute("placeholder", "Текст");
    TextField.setAttribute("class", "textarea");
    
    
    sendbutton.id = 'enterbutton';
    sendbutton.className = 'enterbutton';
    sendbutton.innerHTML = "Надіслати";
    
    mainwindow.innerHTML = 'Напишіть нам ';
    mainwindow.className = 'avtorisation';
    mainwindow.id = 'loginwindow';
    
    form.setAttribute("method", "POST");
    form.setAttribute("id", "formx");
    
    form.appendChild(Namefield);
    form.appendChild(Emaildfield);
    form.appendChild(Phonefield);
    form.appendChild(TextField);
    form.appendChild(sendbutton);

    mainwindow.appendChild(hidebutton);
    mainwindow.appendChild(form);
    

    
    Parent.appendChild(mainwindow)
    };


$(document).on( "click", '#contactForm', function() {
    var test = document.getElementById('loginwindow');
    if (!test){
        CreateContactWindow();
    }
    
    $(document).on( "click", '#hidelogin', function() {
        $('#loginwindow').remove();
    });

});


