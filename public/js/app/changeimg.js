var scripts = document.getElementsByTagName('script')
var lastScript = scripts[scripts.length - 1];
var scriptName = lastScript;

var imgId = scriptName.getAttribute('img-id')
var imgClass = scriptName.getAttribute('img-class')

document.getElementById(imgId).addEventListener('change', function () {

    var file = new FileReader();

    file.onload = function () {

        document.getElementById(imgClass).src = file.result;

    }

    file.readAsDataURL(this.files[0]);

});