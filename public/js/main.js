const Path = 'http://127.0.0.1:8000/';
function ajaxNewSection(url){
    fetch(url, {
        method: 'get',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
        }
    }).then((response) => {
        response.text().then((text) => {
            document.getElementById("section").innerHTML = text;
            return false;
        })
    })
}

function ajaxNewSectionPost(url, formData){
    document.getElementById("section").innerHTML = '<h1> LOADING </h1>';
    fetch(url, {
        method: 'post',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }).then((response) => {
        response.text().then((text) => {
            document.getElementById("section").innerHTML = text;
            return false;
        })
    })
}

function morePagination(){
    let count = document.getElementById("page-content").getAttribute('dir') - 0;
    count+=6;
    let url = new URL(window.location);
    url.searchParams.set('count', count+'');
    ajaxNewSection(url);
}


function formSubmit(){
    let formData = new FormData();
    formData.append('name', document.getElementById('registration-name').value);
    formData.append('email', document.getElementById('registration-email').value);
    formData.append('phone', document.getElementById('registration-phone').value);
    formData.append('position_id', document.getElementById('registration-position-id').value);
    formData.append('photo', document.getElementById('registration-photo').files[0]);
    ajaxNewSectionPost(window.location, formData);
    return false;
}
