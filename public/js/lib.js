/*$(document).ready(function(){
console.log('js.lib was conected!')
var parent = document.getElementById('body');;
console.log(parent);
var cotext;
function createDiv(parent, context){
    var div = document.createElement('div');
    
    div.innerHTML = context;
    div.className = 'created';
    
    parent.appendChild(div);
    
}
*/
function ajaxRequestPost(alias, data, callback){
            $.ajax({
                url: alias,
                type: 'POST',
                data: data,
                success: function(data){
                    var response = JSON.parse(data);
                    callback(response);
                },
            });
        };

function ajaxRequestUpload(alias, data, callback){
            $.ajax({
                url: alias,
                type: 'POST',
                dataType: 'json',
                contentType: false,
                processData: false,
                data: data,
                success: function(data){
                    callback(data);
                },
            });
        };

 
 
 /*      
//test
    $('#authorisationForm').click(function() {
        ajaxRequestPost('/ajax/test-ajax', function(data1){
        console.log(data1)
        createDiv(parent, data1)
        });
    });
});*/

