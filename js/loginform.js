function CreateLoginWindow(){
    var Parent = document.getElementById('headlogin');
    var mainwindow = document.createElement('div');
    var hidebutton = document.createElement('div');
    var enterbutton = document.createElement('button');
    var loginfield = document.createElement('input');
    var passwordfield = document.createElement('input');
    var form = document.createElement('form')
    
    hidebutton.id = 'hidelogin';
    hidebutton.className = 'remove';
    
    
    
    loginfield.setAttribute("placeholder", "LOGIN");
    loginfield.setAttribute("class", "input");
    passwordfield.setAttribute("placeholder", "PASSWORD");
    passwordfield.setAttribute("class", "input");
    
    enterbutton.id = 'enterbutton';
    enterbutton.className = 'enterbutton';
    enterbutton.innerHTML = "ENTER";
    
    mainwindow.innerHTML = 'Avtorisation';
    mainwindow.className = 'avtorisation';
    mainwindow.id = 'loginwindow';

    form.appendChild(loginfield);
    form.appendChild(passwordfield);
    form.appendChild(enterbutton);

    mainwindow.appendChild(hidebutton);
    mainwindow.appendChild(form);
    

    
    Parent.appendChild(mainwindow)
    };


$(document).on( "click", '#Author', function() {
    var test = document.getElementById('loginwindow');
    if (!test){
        CreateLoginWindow();
    }
    
    $(document).on( "click", '#hidelogin', function() {
        $('#loginwindow').remove();
    });

});