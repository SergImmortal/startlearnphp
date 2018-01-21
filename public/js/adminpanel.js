console.log('adminpanel connected!'); 
// создать блок админки
function createDiv(parentId, className, id, data=''){
	var parent = document.getElementById(parentId);
	var div = document.createElement('div');
	div.className = className;
	div.setAttribute("id", id);
	div.innerHTML = data
	parent.appendChild(div)

};
//oчистить блок
function Clean(parent){
	    while (parent.firstChild) {
    parent.removeChild(parent.firstChild);
}};

//Создать окно, добавить основные пункты
function createWindow(baseWidth, response){
    createDiv('mainBlock', 'admindiv', 'sideBar');
	createDiv('mainBlock', 'admindiv', 'firstList');
	createDiv('mainBlock', 'admindiv', 'secondList');
	var parent = document.getElementById('sideBar');
	for (var i in response){
	    var block = document.createElement('div');
	    block.className = 'adminsidebarelem';
	    block.setAttribute("id", i);
	    block.innerHTML = response[i]
	    parent.appendChild(block)
	}
    }
    
function createGaleryList(response, parent){
    for (i in response){
        var block = document.createElement('div');
	    block.className = 'galeryElem';
	    block.setAttribute("id", response[i]['galleryTitle']);
	    block.innerHTML = response[i]['galleryTitle']
	    parent.appendChild(block)
    }
}


function createToolList(response, parent){
    for (i in response){
        var block = document.createElement('div');
	    block.className = 'toolelem';
	    block.setAttribute("id", response[i]);
	    block.innerHTML = i;
	    parent.appendChild(block)
    }
}



// если страница полностью загружена 
$(document).ready(function(){
    var baseWidth = $(window).width()/10;
	createDiv('body', 'admindiv', 'mainBlock');
//запрос на отображение категрий меню
    ajaxRequestPost('/admin/change-section', baseWidth, function(data){
        var response = data;
        createWindow(baseWidth, response)
        })
        
    $(document.body).on( "click", '.adminsidebarelem', function() {
        var alias = $(this).attr('id');
        alias = '/admin/'+alias
            ajaxRequestPost(alias, ' ', function(data){
            var response = data;
            var parent = document.getElementById('firstList');
            Clean(parent)
            if(alias == '/admin/gallery'){
                createGaleryList(response, parent)
            }else if(alias == '/admin/tools'){
                createToolList(response, parent)
            }
        })
        
        
    })
    
    $(document.body).on( "click", '.galeryElem', function() {
        var data = $(this).attr('id');
//        console.log(data)
        var val = {'value':data}
        ajaxRequestPost('/admin/get-gallery', val, function(data){
            var response = data;
            var aboutImage = response['aboutimage'];
            var aboutGallery = response['aboutgallery'][0];
            //создать описание галереи
            var parent = document.getElementById('secondList');
            Clean(parent);
            var galleryblock = document.createElement('div');
            var imagesblock = document.createElement('div');
            galleryblock.className = 'admingaleryview';
            galleryblock.setAttribute('id', aboutGallery['id'])

            var content = '<p>Детальна інформація що до галереї</p>\
            	<p class = "galtitle" id = "' + aboutGallery["id"] + '"><strong>Назва: </strong>' + aboutGallery["galleryTitle"] + '</p>\
            	<img class = "gallogo" src="' + aboutGallery["galleryLogoImage"].substr(22) + '">\
            	<p class = "galdescr" ><strong>Опис :</strong>' + aboutGallery["galleryDescription"] + '</p>\
            	<p class = "galtag" ><strong>Теги :</strong>' + aboutGallery["galleryMetaTag"] + '</p>\
            	<p class = "galauthor" ><strong>Автор :</strong>' + aboutGallery["galleryAuthor"] + '</p>\
            	<p class = "galdata" ><strong>Дата :</strong>' + aboutGallery["galleryCreatedTime"] + '</p>\
            	';
            	
            galleryblock.innerHTML = content;
            parent.appendChild(galleryblock);
            imagesblock.className = 'adminimagwview';
            imagesblock.setAttribute('id', aboutGallery['id'])
            imagesblock.innerHTML = '<p>Фотографії</p>'
            function renderIMG(data, parent){
                var div = document.createElement('div');
                div.className = 'photo';
                    var context = 	'\
                	<p class = "imgtitle" id = "'+ data["id"] +'"><strong>Назва: </strong>'+ data["imageTitle"] +'</p>\
                	<img class = "imglogo" src="'+ data["wayToImage"] +'">\
                	<div class = "imginfoblok2" style = "height: 200px;">\
                	<p class = "imgdescr" ><strong>Опис :</strong>'+ data["imageDescription"] +'</p>\
                	<p class = "imgtag" ><strong>Теги :</strong>'+ data["imageMetaTag"] +'</p>\
                	<p class = "imgauthor" ><strong>Автор :</strong>'+ data["imageAuthor"] +'</p>\
                	<p class = "imgdata" ><strong>Дата :</strong>'+ data["imageCreatedDate"] +'</p>\
                	</div>\
                	';
                div.innerHTML = context;
                parent.appendChild(div);
                }   
            
            for(var img in aboutImage){
                var data = aboutImage[img];
                renderIMG(data, imagesblock);
            }
            
            parent.appendChild(imagesblock);
        })
        
    })
    
        $(document.body).on( "click", '.toolelem', function() {
        var data = $(this).attr('id');
        parent = document.getElementById('secondList');
        if(data == 'add-gallery'){
            Clean(parent);            
            var div = document.createElement('div');
            div.className = 'galery_administration'
            context = '\
                    <span> Додати галерею </span>\
                    <form action = "add" method="post" id="my_form" enctype="multipart/form-data">\
                        <table>\
                        <tr><td><span class = "name">Назва: </span></td><td><input type="text" name="galery_title" id="galery_title" placeholder = "galery_title"/></td></tr>\
                        <tr><td><span class = "name">Логотип:</span></td><td><input type="file" name="file" id="file" name="upload" placeholder = "file_path"/></td></tr>\
                        <tr><td><span class = "name">Автор:</span></td><td><input type="text" name="author" id="author" placeholder = "author"/></td></tr>\
                        <tr><td><span class = "name">Опис: </span></td><td><input type="text" name="descrip" id="descrip" placeholder = "descrip"/></td></tr>\
                        <tr><td><span class = "name">Метатеги:</span></td><td><input type="text" name="meta" id="meta" placeholder = "meta"/></td></tr>\
                        </table><br>\
                        <input type="submit" id="submit" value="ADD">\
                    </form>\
            '
            div.innerHTML = context;
            parent.appendChild(div);
        }else if(data == 'add-image'){
            //аякс
            var select = '<select id = "targetGalleryTitle" name = "targetGalleryTitle">';
            
            ajaxRequestPost('/admin/gallery', ' ', function(data){
                for(var i in data){
                    select = select + '<option>' + data[i]['galleryTitle'] + '</option>';
                };
            select = select + '</select>';
            Clean(parent);            
            var div = document.createElement('div');
            div.className = 'image_administration'
            context = '\
                    <span> Завантажити зображення </span>\
                    <form action = "add" method="post" id="my_form_imm" enctype="multipart/form-data">\
                        <table>\
                        <tr><td><span class = "name">Назва: </span></td><td><input type="text" id="imageTitle" name = "imageTitle" placeholder = "galery_title"/></td></tr>\
                        <tr><td><span class = "name">Логотип:</span></td><td><input type="file" id="file" name = "file" placeholder = "file_path"/></td></tr>\
                        <tr><td><span class = "name">Автор:</span></td><td><input type="text" id="imageAuthor" name = "imageAuthor" placeholder = "author"/></td></tr>\
                        <tr><td><span class = "name">Галерея:</span></td><td>'+ select +'</td></tr>\
                        <tr><td><span class = "name">Опис: </span></td><td><input type="text" id="imageDescription" name = "imageDescription" placeholder = "descrip"/></td></tr>\
                        <tr><td><span class = "name">Метатеги:</span></td><td><input type="text" id="imageMetaTag" name = "imageMetaTag" placeholder = "meta"/></td></tr>\
                        </table>\
                        <input type="submit" id="submit2" value="ADD">\
                    </form>\
            '
            div.innerHTML = context;
            parent.appendChild(div);
        
            })
            }
        })


    $(document).on('submit', function(e){
        e.preventDefault();
        if($('#my_form')[0]){
            var form = $('#my_form')[0]
            var formData = new FormData(form);
            ajaxRequestUpload('/admin/add-gallery', formData, function(data){
                console.log(data)
                $('#my_form')[0].reset();
        })            
        } else if($('#my_form_imm')[0]){
            var form = $('#my_form_imm')[0]
            var formData = new FormData(form);
            ajaxRequestUpload('/admin/add-image', formData, function(data){
                console.log(data)
                $('#my_form_imm')[0].reset();
        })
        };

    });

});