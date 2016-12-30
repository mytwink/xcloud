var inputNumber = 1;

window.onload = WindowOnLoad;

function HandleChanges(id)
{
    file = document.getElementById(id).value;
 
    
     reWin = /.*\\(.*)/;
    var fileTitle = file.replace(reWin, "$1"); //выдираем название файла для w*s
    reUnix = /.*\/(.*)/;
    fileTitle = fileTitle.replace(reUnix, "$1"); //выдираем название для *nix
    
    fileName = document.getElementById('name'+id);
    fileName.innerHTML = fileTitle;
    var RegExExt =/.*\.(.*)/;
    var ext = fileTitle.replace(RegExExt, "$1");//и его расширение
    
    var pos;
    if (ext){
        switch (ext.toLowerCase())
        {
            case 'doc': pos = '0'; break;
            case 'bmp': pos = '16'; break;                       
            case 'jpg': pos = '32'; break;
            case 'jpeg': pos = '32'; break;
            case 'png': pos = '48'; break;
            case 'gif': pos = '64'; break;
            case 'psd': pos = '80'; break;
            case 'mp3': pos = '96'; break;
            case 'wav': pos = '96'; break;
            case 'ogg': pos = '96'; break;
            case 'avi': pos = '112'; break;
            case 'wmv': pos = '112'; break;
            case 'flv': pos = '112'; break;
            case 'pdf': pos = '128'; break;
            case 'exe': pos = '144'; break;
            case 'txt': pos = '160'; break;
            default: pos = '176'; break;
        };
        fileName.style.display = 'block';
        fileName.style.background = 'url(assets/images/file/icons.png) no-repeat 0 -'+pos+'px';
      
    };
};

function WrapEverything()
{
    inputs = getElementsByClassName('customFileInput');
    for (var i = 0 ; i < inputs.length; i++)
        wrap(inputs[i]);
    
};

function wrap(element)
{
    wraper = document.createElement('div');
    wraper.className = 'wrapper';
    fileInput = document.createElement('input');
    fileInput.value = '';
    fileInput.setAttribute('type','file');
    var id = element.getAttribute('id');
    wraper.setAttribute('id','wrapper'+id);
    fileInput.setAttribute('id',id);
    fileInput.className = 'customFile';
    fileInput.onchange = function(){ HandleChanges(id) };
    fileInput.onmouseover = function() { MakeActive(id) };
    fileInput.onmouseout = function() { UnMakeActive(id) };
    fileName = document.createElement('div');
    fileName.style.display = 'none';
    fileName.style.background = 'url(assets/images/file/icons.png)';
    fileName.setAttribute('id','name'+id);
    fileName.className = "FileName";
    bb = document.createElement('div');
    bb.setAttribute('id','bb' + id);
    bb.className = 'fakeButton';
    bl = document.createElement('div');
    bl.setAttribute('id','bl' + id);
    bl.className = 'blocker';
    wraper.appendChild(bb);
    wraper.appendChild(bl);
    wraper.appendChild(fileInput);
    wraper.appendChild(fileName);
    x = element.parentNode;
    x.replaceChild(wraper,element);
};
function AddInput(container)
{            
    wraper = document.createElement('div');
    wraper.className = 'wrapper';
    fileInput = document.createElement('input');
    fileInput.value = '';
    fileInput.setAttribute('type','file');
    var id = 'customFileInput'+inputNumber;
    wraper.setAttribute('id','wrapper'+id);
    fileInput.setAttribute('id',id);
    fileInput.className = 'customFile';
    fileInput.onchange = function(){ HandleChanges(id) };
    fileInput.onmouseover = function() { MakeActive(id) };
    fileInput.onmouseout = function() { UnMakeActive(id) };
    fileName = document.createElement('div');
    fileName.style.display = 'none';
    fileName.style.background = 'url(assets/images/file/icons.png)';
    fileName.setAttribute('id','name'+id);
    fileName.className = "FileName";
    bb = document.createElement('div');
    bb.setAttribute('id','bb' + id);
    bb.className = 'fakeButton';
    bl = document.createElement('div');
    bl.setAttribute('id','bl' + id);
    bl.className = 'blocker';
    deleteButton = document.createElement('div');
    deleteButton.className = 'minus';
    deleteButton.onclick = function() { DeleteCustomInput(id) };
    wraper.appendChild(bb);
    wraper.appendChild(bl);
    wraper.appendChild(fileInput);
    wraper.appendChild(fileName);
    wraper.appendChild(deleteButton);
    container.appendChild(wraper);
    inputNumber++;

};

function DeleteCustomInput(id)
{
    i = document.getElementById('wrapper'+id);
    i.parentNode.removeChild(i);
}
function WindowOnLoad()
{
    WrapEverything();
};


function MakeActive(id)
{
    bb = document.getElementById('bb'+id);
    bb.style.backgroundPosition = '0 -21px';
};
function UnMakeActive(id)
{
    bb = document.getElementById('bb'+id);
    bb.style.backgroundPosition = '0 0';
};

function getElementsByClassName(searchClass) {
    var classElements = new Array();
    var els = document.getElementsByTagName('*');
    var elsLen = els.length;
    var pattern = new RegExp("(^|\\\\s)"+searchClass+"(\\\\s|$)");
    for (i = 0, j = 0; i < elsLen; i++) {
        if ( pattern.test(els[i].className) ) {
	        classElements[j] = els[i];
	        j++;
        }
    }
    return classElements;
};
function addCustomFileInput(container)
{
    w = document.getElementById(container);
    AddInput(w);
};