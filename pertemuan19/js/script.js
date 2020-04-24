var keyword = document.getElementById('keyword');
var tombolCari = document.getElementById('tombolCari');
var container = document.getElementById('container');

// tombolCari.addEventListener('click', function(){
//     alert('berhasil');
// })

keyword.addEventListener('keyup', function(){
    // console.log(keyword.value);

    //buat object ajax
    var xhr = new XMLHttpRequest();

    // mnegecek kesiapan ajax

    xhr.onreadystatechange = function() {
        if( xhr.readyState == 4 && xhr.status == 200){
            container.innerHTML = xhr.responseText;
        }
    }

    //eksekusi ajax, tru maksydnya asynchronus, parameter ke 2 = sumber
    xhr.open('GET','ajax/cars.php?keyword=' + keyword.value, true);
    xhr.send();

});